<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function dataTable()
    {
        $data = User::with('roles')->get();
        $dataTable = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function ($data) {
                return $data->name;
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
            ->addColumn('actions', function ($data) {
                $url = route('userEdit', ['id' => $data->id]);
                $str = "<a href='javascript:void(0)' type='button' id='btn-delete-users' class='p-2 text-xs text-white rounded lg:text-sm' onclick='userDelete({$data->id},\"{$data->is_active}\")' " . ($data->is_active == 1 ? 'style=background-color:red' : 'style=background-color:#FFDF00;') . ">" . ($data->is_active == 1 ? 'Off' : 'Active') . "</a>";

                return "
                        <div class='flex flex-row'>
                        <button id='btn-teacher' class='p-2 text-xs text-white rounded lg:text-sm bg-sky-700' onclick='window.location.href=\"{$url}\"'>
                            Update
                            </button>
                           {$str}
                        </div>
                        ";
            })->rawColumns(['actions']);
        return $dataTable->make(true);
    }

    public function create(): View
    {
        $roles = Role::all();
        return view('users.userAdd', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed',  Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'uuid' => Str::uuid(),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_active' => 1
        ]);

        // event(new Registered($user));
        $user->assignRole($request->role);

        return redirect()->back()->with('msg', 'user berhasil di tambahkan');
    }

    public function edit($id)
    {
        try {
            $user = User::with('roles')->findOrFail($id);
            $roleNames = $user->roles->pluck('name');

            $roles = Role::all();
            return view('users.userUpdate', compact('user', 'roleNames', 'roles'));
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('msg', $th->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($id)],
            'role' => ['required', 'string'], // Menambahkan validasi untuk role
            'status' => ['required', 'boolean']
        ]);

        $user = User::findOrFail($id);
        // Validasi password jika ada
        if ($request->filled('password')) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_active' => $request->filled('status') ? $request->status : $user->is_active
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'is_active' => $request->filled('status') ? $request->status : $user->is_active
            ]);
        }


        // Menghapus semua role yang ada dan menambahkan role baru
        $user->syncRoles([$request->role]);

        return redirect()->back()->with('msg', 'user berhasil di update');
    }

    public function destroy(User $user, Request $request)
    {
        $data = User::where('id', $request->id)->first();

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
