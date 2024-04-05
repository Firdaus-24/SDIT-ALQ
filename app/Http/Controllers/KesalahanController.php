<?php

namespace App\Http\Controllers;

use App\Models\Kesalahan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KesalahanController extends Controller
{
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
                if ($data->is_active == "T") {
                    $active = "Active";
                } else {
                    $active = "Off";
                }
                return $active;
            })
            ->addColumn('actions', function ($data) {
                $str = "<a href='javascript:void(0)' type='button' id='btn-delete' class='text-xs lg:text-sm text-white rounded p-2' onclick='deleteKesalahan({$data->id})' " . ($data->is_active == 'T' ? 'style=background-color:red' : 'style=background-color:#FFDF00;') . ">" . ($data->is_active == 'T' ? 'Off' : 'Active') . "</a>";

                return "
                        <div class='flex flex-row '>
                        <button id='openModal' class='text-xs lg:text-sm bg-sky-700 text-white rounded p-2' onclick='openModalKesalahan({$data->id}, \"{$data->name}\", {$data->score})'>
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
            'is_active' => "T",
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
    public function destroy(Kesalahan $kesalahan, Request $request)
    {
        $data = Kesalahan::where('id', $request->id)->first();

        if ($data->is_active == 'T') {
            $data->is_active = "F";
            $data->save();
        } else {
            $data->is_active = "T";
            $data->save();
        }
        return Response()->json($data);
    }
}
