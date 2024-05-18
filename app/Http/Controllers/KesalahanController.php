<?php

namespace App\Http\Controllers;

use App\Models\Kesalahan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KesalahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['permission:kesalahan-siswa.list|kesalahan-siswa.create|kesalahan-siswa.edit|kesalahan-siswa.delete'], ['only' => ['index', 'show', 'dataTable']]);
        $this->middleware(['permission:kesalahan-siswa.create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:kesalahan-siswa.edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:kesalahan-siswa.delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kesalahan.index');
    }

    // data table 
    public function dataTable()
    {
        $data = Kesalahan::all();
        $datatables = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function ($data) {
                return $data->name;
            })
            ->addColumn('created_at', function ($data) {
                return $data->created_at;
            })
            ->addColumn('updated_at', function ($data) {
                return $data->updated_at;
            })
            ->addColumn('score', function ($data) {
                return $data->score;
            })
            ->addColumn('is_active', function ($data) {
                if ($data->is_active == 1) {
                    $active = "Active";
                } else {
                    $active = "Off";
                }
                return $active;
            })
            ->addColumn('actions', function ($data) {
                $route = route('kesalahan-siswa.update', $data->id);
                $str = "<a href='javascript:void(0)' type='button' id='btn-delete' class='p-2 text-xs text-white rounded lg:text-sm' onclick='deleteKesalahan({$data->id})' " . ($data->is_active == 1 ? 'style=background-color:red' : 'style=background-color:#FFDF00;') . ">" . ($data->is_active == 1 ? 'Off' : 'Active') . "</a>";

                return "
                        <div class='flex flex-row '>
                        <button id='openModal' class='p-2 text-xs text-white rounded lg:text-sm bg-sky-700' onclick='openModalKesalahan({$data->id}, \"{$data->name}\", {$data->score}, \"$route\")'>
                            Edit
                            </button>
                           {$str}
                        </div>
                        ";
            })->rawColumns(['actions']);

        return $datatables->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Kesalahan::create([
            'name' => $request->txtname,
            'score' => $request->txtscore,
            'is_active' => 1,
        ]);

        return back()->with('msg', 'data berhasil disimpan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kesalahan $kesalahan)
    {
        $request->validate([
            'txtid' => 'required',
            'updateTxtname' => 'required|max:100|min:2|unique:kesalahans,name,',
            'updateTxtscore' => 'required|numeric'
        ]);

        try {
            $data = Kesalahan::findOrFail($request->txtid);

            // cek jika nama nya sama
            $data->name = $request->updateTxtname;
            $data->score = $request->updateTxtscore;
            $data->updated_at = now();

            $data->save();

            return back()->with('msg', 'data berhasil di update');
        } catch (\Throwable $th) {
            $th = "error euy";
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kesalahan $kesalahan, Request $request, $id)
    {
        $data = Kesalahan::where('id', $id)->first();

        if ($data->is_active == 1) {
            $data->is_active = 0;
            $data->save();
        } else {
            $data->is_active = 1;
            $data->save();
        }
        return Response()->json($data);
    }
}
