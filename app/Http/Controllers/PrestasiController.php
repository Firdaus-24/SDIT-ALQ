<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        $this->middleware(['permission:prestasi-siswa.list'], ['only' => ['index', 'show', 'dataTable']]);
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
            ->addColumn('nama', function ($data) {
                return $data->nama;
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
                $active = ($data->is_active == 1) ? '<span class="badge badge-sm badge-outline badge-success">Active</span>' : '<span class="badge badge-sm badge-outline badge-danger">Deleted</span>';
                return $active;
            })
            ->addColumn('actions', function ($data) {
                $buttons = [];

                if (auth()->user()->hasPermissionTo('prestasi-siswa.edit')) {
                    $editButton = '<button type="button" class="p-2 btn btn-clear btn-info btn-edit" data-id="' . e($data->id) . '">
                                        <i class="ki-filled ki-pencil"></i>
                                        </button>';
                    $buttons[] = $editButton;
                }

                if (auth()->user()->hasPermissionTo('kelas.delete')) {
                    $deleteButton = '<a href="javascript:void(0)" type="button" id="btn-delete"'
                        . ($data->is_active == 1 ? 'class="btn btn-clear btn-danger"' : 'class="btn btn-clear btn-warning"') . '>'
                        . ($data->is_active == 1 ? '<i class="ki-filled ki-trash"></i>' : '<i class="ki-filled ki-arrows-circle"></i>') .
                        '</a>';
                    $buttons[] = $deleteButton;
                }

                return '<div class="flex flex-row items-center justify-center">' . implode(' ', $buttons) . '</div>';

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
            })->rawColumns(['actions', 'is_active']);

        return $datatables->make(true);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function show(Request $request) {}
    public function store(Request $request)
    {
        Prestasi::create([
            'nama' => $request->txtnama,
            'score' => $request->txtscore,
            'is_active' => 1,
        ]);

        return back()->with('msg', 'data berhasil di simpan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestasi $Prestasi,)
    {
        $request->validate([
            'id' => 'required',
            'txtnama' => 'required|max:100|min:2|unique:prestasis,nama,' . $request->id,
            'txtscore' => 'required|numeric'
        ]);

        try {
            $data = Prestasi::findOrFail($request->id);

            // cek jika nama nya sama
            $data->nama = $request->txtnama;
            $data->score = $request->txtscore;

            $data->save();

            return back()->with('msg', 'data berhasil di update');
        } catch (\Throwable $th) {
            return back()->with('msg', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Prestasi $Prestasi, $id)
    {
        try {
            // Cari data berdasarkan ID
            $data = Prestasi::findOrFail($id);

            // Toggle status is_active
            $data->is_active = $data->is_active == 1 ? 0 : 1;
            $data->save();

            return response()->json([
                'success' => true,
                'message' => 'Status berhasil diperbarui.',
                'data' => $data,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $th->getMessage(),
            ], 500);
        }
    }
}
