<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['permission:prestasi-siswa.list|prestasi-siswa.create|prestasi-siswa.edit|prestasi-siswa.delete'], ['only' => ['index', 'show', 'dataTable']]);
        $this->middleware(['permission:prestasi-siswa.create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:prestasi-siswa.edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:prestasi-siswa.delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('prestasi.index');
    }
    // data table 
    public function dataTable()
    {
        $data = Prestasi::all();
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
                $route = route('prestasi-siswa.update', $data->id);
                $str = "<a href='javascript:void(0)' type='button' id='btn-delete' class='p-2 text-xs text-white rounded lg:text-sm' onclick='deletePrestasi({$data->id})' " . ($data->is_active == 1 ? 'style=background-color:red' : 'style=background-color:#FFDF00;') . ">" . ($data->is_active == 1 ? 'Off' : 'Active') . "</a>";

                return "
                        <div class='flex flex-row '>
                            <button id='openModal' class='p-2 text-xs text-white rounded lg:text-sm bg-sky-700' onclick='openModalPrestasi({$data->id}, \"{$data->name}\", {$data->score}, \"$route\")'>
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
        Prestasi::create([
            'name' => $request->txtname,
            'score' => $request->txtscore,
            'is_active' => 1,
        ]);

        return back()->with('msg', 'data berhasil di simpan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestasi $Prestasi, $id)
    {
        $request->validate([
            'txtid' => 'required',
            'updateTxtname' => 'required|max:100|min:2|unique:prestasis,name,',
            'updateTxtscore' => 'required|numeric'
        ]);

        try {
            $data = Prestasi::findOrFail($id);

            // cek jika nama nya sama
            $data->name = $request->updateTxtname;
            $data->score = $request->updateTxtscore;
            $data->updated_at = now();

            $data->save();

            return back()->with('msg', 'data berhasil di update');
        } catch (\Throwable $th) {
            return back()->with('msg', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestasi $Prestasi, Request $request, $id)
    {
        $data = Prestasi::findOrFail('id', $id)->first();

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
