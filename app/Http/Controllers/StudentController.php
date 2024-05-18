<?php

namespace App\Http\Controllers;

use Excel;
use Exception;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Imports\StudentImport;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['permission:siswa.list|siswa.create|siswa.edit|siswa.delete'], ['only' => ['index', 'show', 'dataTable', 'searchName']]);
        $this->middleware(['permission:siswa.create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:siswa.edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:siswa.delete'], ['only' => ['destroy']]);
        $this->middleware(['permission:siswa.import'], ['only' => ['importFile', 'prosesImport']]);
        $this->middleware(['permission:siswa.kenaikan-kelas'], ['only' => ['kenaikanKelas', 'prosesStudentKenaikan', 'getStudentKenaikan']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('student.index');
    }
    public function dataTable()
    {
        $data = Student::where('is_lulus', 'F')->get();
        $dataTable = DataTables::of($data)
            ->addColumn('name', function ($data) {
                return $data->name;
            })
            ->addColumn('nisn', function ($data) {
                return $data->nisn;
            })
            ->addColumn('jenis_kelamin', function ($data) {
                return $data->jenis_kelamin;
            })
            ->addColumn('tempat_lahir', function ($data) {
                return $data->tempat_lahir;
            })
            ->addColumn('tgl_lahir', function ($data) {
                return $data->tgl_lahir;
            })
            ->addColumn('agama', function ($data) {
                return $data->agama;
            })
            ->addColumn('kelas', function ($data) {
                return $data->kelas;
            })
            ->addColumn('wali', function ($data) {
                return $data->wali;
            })
            ->addColumn('actions', function ($data) {
                $url = route('siswa.show', $data->id);
                $str = "<a href='javascript:void(0)' type='button' id='btn-delete' class='p-2 text-xs text-white rounded lg:text-sm' onclick='studentDelete({$data->id})' " . ($data->is_active == 1 ? 'style=background-color:red' : 'style=background-color:#FFDF00;') . ">" . ($data->is_active == 1 ? 'Off' : 'Active') . "</a>";

                return "
                        <div class='flex flex-row '>
                        <button id='btn-teacher' class='p-2 text-xs text-white rounded lg:text-sm bg-sky-700' onclick='window.location.href=\"{$url}\"'>
                            Detail
                            </button>
                           {$str}
                        </div>
                        ";
            })->rawColumns(['actions']);;
        return $dataTable->make(true);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.studentAdd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $validate = $request->validated();

        $student = new Student;
        if ($request->file('image')) {
            $student->images = $request->file('image')->store('student-images');
        }

        $student->name = $request->txtname;
        $student->nisn = $request->txtnisn;
        $student->jenis_kelamin = $request->txtjk;
        $student->tempat_lahir = $request->txttmptlahir;
        $student->tgl_lahir = $request->txttgllahir;
        $student->agama = $request->txtagama;
        $student->kelas = $request->txtkelas;
        $student->wali = $request->txtwali;
        $student->is_lulus = "F";
        $student->is_active = 1;
        $student->save();

        return back()->with('msg', 'data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(student $student, Request $request, $id)
    {
        $data = Student::findOrFail($id);
        return view('student.studentDetail', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student $student, $id)
    {
        $data = Student::findOrFail($id);
        try {
            return view('student.studentEdit', ['data' => $data]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student, $id)
    {
        $validatedData = $request->validate([
            'txtname' => 'required|max:100|min:3',
            'txtnisn' => [
                'required',
                'max:10',
                Rule::unique('students', 'nisn')->ignore($id, 'id'),
            ],
            'txtjk' => 'required',
            'txttmptlahir' => 'required|max:100',
            'txttgllahir' => 'required',
            'txtagama' => 'required|max:10',
            'txtkelas' => 'numeric|min:1|max:6',
            'txtwali' => 'required|min:3|max:200',
            'image' => 'image|file|max:5000',
        ]);

        $student = Student::findOrFail($id);

        if ($request->file('image')) {
            if (Storage::exists(strval($student->images))) {
                Storage::delete(strval($student->images));
            }
            $student->images = $request->file('image')->store('student-images');
        }

        $student->name = $request->txtname;
        $student->nisn = $request->txtnisn;
        $student->jenis_kelamin = $request->txtjk;
        $student->tempat_lahir = $request->txttmptlahir;
        $student->tgl_lahir = $request->txttgllahir;
        $student->agama = $request->txtagama;
        $student->kelas = $request->txtkelas;
        $student->wali = $request->txtwali;
        $student->save();

        return back()->with('msg', 'data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student, Request $request)
    {
        $data = Student::where('id', $request->id)->first();

        if ($data->is_active == 1) {
            $data->is_active = 0;
            $data->save();
        } else {
            $data->is_active = 1;
            $data->save();
        }
        return Response()->json($data);
    }

    public function searchName($name)
    {
        return response()->json(
            Student::where('is_active', 1)
                ->where('is_lulus', 1)
                ->where('name', 'LIKE', '%' . $name . '%')
                ->get()
        );
    }

    // import file excel view
    public function importFile()
    {
        return view('student.studentImport');
    }

    public function prosesImport(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        try {
            Excel::import(new StudentImport(), $request->file('file'));

            return redirect()->back()->with('msg', 'Gagal mengunggah file.');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    // kenaikan kelas
    public function kenaikanKelas()
    {
        return view('student.kenaikanKelas');
    }

    public function getStudentKenaikan(Request $request)
    {
        if ($request->ajax()) {
            $data = Student::where('kelas', $request->kelas)->get();
            $returnHTML = view('student.listKenaikan', compact('data'))->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        } else {
            return response()->json([
                'error' => 'Page not found!!'
            ], 404);
        }
    }

    public function prosesStudentKenaikan(Request $request)
    {
        $txtidstudents = $request->input('txtidstudent', []);

        try {
            DB::beginTransaction();
            foreach ($txtidstudents as $txtidstudent) {
                $student = Student::findOrFail($txtidstudent);
                if ($request->kelas < 7) {
                    $student->update([
                        'kelas' => (int)$request->kelas
                    ]);
                } else if ($request->kelas == 7) {
                    $student->update([
                        'is_lulus' => 1
                    ]);
                }
            }
            DB::commit();
            return redirect()->back()->with('msg', 'Kelas berhasil di perbaharui');
        } catch (\Throwable $th) {
            DB::rollBack();
            return response("User with id {$txtidstudent} not found", Response::HTTP_NOT_FOUND);
        }
    }
}
