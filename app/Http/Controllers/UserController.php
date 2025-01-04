<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['permission:user.list'], ['only' => ['index', 'dataTable']]);
        $this->middleware(['permission:user.create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:user.edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:user.delete'], ['only' => ['destroy']]);
    }

    public function index()
    {
        $roles = Role::all();
        return view('users.index', compact('roles'));
    }

    public function dataTable()
    {
        $data = User::with('roles', 'guru')->get();
        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('nama', function ($data) {
                if ($data->guru_id) {
                    $imagePath = $data->images ? 'storage/' . $data->images : 'plugins/assets/media/avatars/blank.png';
                } else {
                    $imagePath = 'plugins/assets/media/avatars/blank.png';
                }
                $imageUrl = asset($imagePath);
                return '
                    <div class="flex items-center gap-2.5">
                        <img alt="User Image" class="object-cover rounded-full h-9 w-9" src="' . $imageUrl . '" />
                        <div class="flex flex-col gap-0.5">
                            <p class="text-sm text-gray-500 ">
                                ' . e($data->name) . '
                            </p>
                        </div>
                    </div>
                ';
            })
            ->addColumn('email', function ($data) {
                return $data->email;
            })
            ->addColumn('created_at', function ($data) {
                return $data->created_at;
            })
            ->addColumn('role', function ($user) {
                return $user->roles->pluck('name')->join(', ');
            })
            ->addColumn('aksi', function ($data) {
                $buttons = [];
                // Tombol edit (jika ada izin)
                if (auth()->user()->hasPermissionTo('user.edit')) {
                    $editButton = '<button 
                            type="button" 
                            class="p-2 btn btn-clear btn-info btn-edit" 
                            data-id="' . e($data->id) . '">
                            <i class="ki-filled ki-pencil"></i>
                        </button>';
                    $buttons[] = $editButton;
                }

                // Tombol delete (jika ada izin)
                if (auth()->user()->hasPermissionTo('user.delete')) {
                    $deleteButton = '<a href="javascript:void(0)" type="button" id="btn-delete" class="btn btn-clear btn-danger"><i class="ki-filled ki-trash"></i></a>';
                    $buttons[] = $deleteButton;
                }

                // Gabungkan semua tombol
                return '<div class="flex flex-row items-center justify-center gap-2">' . implode(' ', $buttons) . '</div>';
            })->rawColumns(['aksi', 'nama']);
        return $dataTable->make(true);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed',  Rules\Password::defaults()],
            'role' => ['required', 'string', 'exists:roles,name'],
        ]);

        try {
            // Cek apakah email sudah terdaftar di data guru
            $guru = Guru::where('email', $request->email)->first();

            // Gunakan data dari Guru jika tersedia, atau gunakan input dari request
            $nama = $guru ? $guru->nama : $request->nama;
            $email = $guru ? $guru->email : $request->email;
            $guru_id = $guru ? $guru->id : null;

            // Gunakan transaksi database untuk memastikan semua proses berhasil
            DB::transaction(function () use ($request, $nama, $email, $guru_id) {
                $user = User::create([
                    'name' => $nama,
                    'email' => $email,
                    'password' => Hash::make($request->password),
                    'guru_id' => $guru_id,
                ]);

                // Assign role ke user
                $user->assignRole($request->role);
            });

            return redirect()->back()->with('msg', 'User berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('msg', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($id)],
            'role' => ['required', 'string', 'exists:roles,name'], // Menambahkan validasi untuk role
        ]);

        $user = User::findOrFail($id);
        $guru = Guru::where('email', $request->email)->first();

        // Gunakan data dari Guru jika tersedia, atau gunakan input dari request
        $nama = $guru ? $guru->nama : $request->nama;
        $email = $guru ? $guru->email : $request->email;
        $guru_id = $guru ? $guru->id : null;
        // Validasi password jika ada
        if ($request->filled('password')) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user->update([
                'name' => $nama,
                'email' => $email,
                'password' => Hash::make($request->password),
                'guru_id' => $guru_id,
            ]);
        } else {
            $user->update([
                'name' => $nama,
                'email' => $email,
                'guru_id' => $guru_id,
            ]);
        }


        // Menghapus semua role yang ada dan menambahkan role baru
        $user->syncRoles([$request->role]);

        return redirect()->back()->with('msg', 'user berhasil di update');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'msg' => 'Data berhasil di hapus',
        ]);
    }
}
