<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jabatan.index', ['data' => Jabatan::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function dataTable()
    {
        $data = Jabatan::all();
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
            ->addColumn('is_active', function ($data) {
                if ($data->is_active == "T") {
                    $active = "Active";
                } else {
                    $active = "Off";
                }
                return $active;
            })
            ->addColumn('actions', function ($data) {
                if ($data->is_active == 'T') {
                    $str = "<a href='javascript:void(0)' type='button' id='btn-delete-jabatan' class='text-xs lg:text-sm text-white rounded p-2' style='background-color:red' onclick='deleteJabatan({$data->id})'>Off</a>";
                } else {
                    $str = "<a href='javascript:void(0)' type='button' id='btn-delete-jabatan' class='text-xs lg:text-sm  rounded p-2' style='background-color:#FFDF00' onclick='deleteJabatan({$data->id})'>Active</a>";
                }
                return "
                        <div class='flex flex-row '>
                        <button id='openModal' class='text-xs lg:text-sm bg-sky-700 text-white rounded p-2' onclick='openModal({$data->id}, \"{$data->name}\")'>
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
        $request->validate([
            'txtnama' => 'required|max:100|min:2|unique:jabatans,name'
        ]);

        Jabatan::create([
            'name' => $request->txtnama,
            'is_active' => 'T'
        ]);


        return back()->with('msg', 'data saved successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        $request->validate([
            'txtid' => 'required',
            'txtnama' => 'required|max:100|min:2|unique:jabatans,name,'
        ]);

        try {
            $data = Jabatan::findOrFail($request->txtid);

            // cek jika nama nya sama
            $data->name = $request->txtnama;
            $data->updated_at = now();

            $data->save();

            return back()->with('msg', 'data updated succesfully');
        } catch (\Throwable $th) {
            $th = "error euy";
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan, Request $request)
    {
        $data = Jabatan::where('id', $request->id)->first();

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
