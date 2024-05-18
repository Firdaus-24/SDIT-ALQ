<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['permission:roles.index|roles.list|roles.create|roles.edit'], ['only' => ['index', 'dataTable']]);
        $this->middleware(['permission:roles.create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:roles.edit|roles.update'], ['only' => ['edit', 'update']]);
    }
    public function index()
    {
        return view('roles.index');
    }

    public function dataTable()
    {
        $roles = Role::with('permissions')->get();
        $dataTable = DataTables::of($roles)
            ->addIndexColumn()
            ->addColumn('name', function ($roles) {
                return $roles['name'];
            })
            ->addColumn('total_users', function ($roles) {
                return User::role($roles->name)->count();
            })
            ->addColumn('permissions', function ($roles) {
                return $roles->permissions->map(function ($permission) {
                    return $permission->name;
                })->join(', ');
            })
            ->addColumn('actions', function ($roles) {
                $url = route('roles.edit',  $roles->id);

                return "
                    <div class='flex flex-row'>
                        <button id='btn-teacher' class='p-2 text-xs text-white rounded lg:text-sm bg-sky-700' onclick='window.location.href=\"{$url}\"'>
                            Update
                        </button>
                    </div>
                ";
            })->rawColumns(['actions']);

        return $dataTable->make(true);
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('roles.rolesAdd', compact('permissions'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'txtroles' => 'required|string|max:100',
            'permissions' => 'array',
        ]);


        $permissions = $request->input('permissions', []);

        DB::beginTransaction();
        try {
            $role = Role::where('name', $request->txtroles)->first();
            if ($role === null) {
                $newRole = Role::create(['name' => $request->txtroles, 'guard_name' => 'web']);

                foreach ($permissions as $permission) {
                    $data = Permission::findById($permission);
                    $newRole->givePermissionTo($data->name);
                }
                DB::commit();
                return back()->with('msg', 'Data berhasil disimpan');
            } else {
                return back()->with('msg', 'Nama data sudah terdaftar');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('msg', $th->getMessage());
        }
    }

    public function edit($id)
    {
        $role = Role::where('id', $id)->with('permissions')->first();
        $permissions = Permission::all();

        return view('roles.rolesUpdate', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Validasi input
            $request->validate([
                'txtroles' => 'required|string|max:100',
                'permissions' => 'array',
                'permissions.*' => 'exists:permissions,id'
            ]);

            // Temukan role yang akan diupdate
            $role = Role::findOrFail($id);

            // Update nama role
            $role->name = $request->input('txtroles');
            $role->save();

            // Ambil permissions dari input form
            $newPermissions = $request->input('permissions', []);

            // Sinkronisasi permissions (jika di check bertambah jiga tidak mengurang)
            $role->permissions()->sync($newPermissions);

            return redirect()->back()->with('msg', 'Role berhasil di update');
        } catch (\Throwable $th) {
            return redirect()->back()->with('msg', $th->getMessage());
        }
    }
}
