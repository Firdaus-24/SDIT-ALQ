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
        $this->middleware(['permission:roles.index|roles.list'], ['only' => ['index', 'dataTable']]);
        $this->middleware(['permission:roles.create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:roles.edit|roles.update'], ['only' => ['edit', 'update']]);
    }
    public function index()
    {
        // Ambil data permissions dari database
        $permissions = DB::table('permissions')
            ->selectRaw("SUBSTRING_INDEX(name, '.', 1) as category, name, id")
            ->orderBy('id')
            ->get()
            ->groupBy('category');

        // Format ulang data permissions
        $permissionList = $permissions->map(function ($items, $category) {
            return $items->map(function ($item, $index) {
                return [
                    'id' => $item->id,
                    'permission' => $item->name,
                ];
            });
        });

        // Kirim data ke view
        return view('roles.index', compact('permissionList'));
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
                $badge = '<span class="badge badge-outline badge-primary">' . User::role($roles->name)->count() . '</span>';
                return $badge;
            })
            ->addColumn('permissions', function ($roles) {
                $listPermission = '<div class="table-permission">
                    <ul class="space-y-2">';

                $listPermission .= $roles->permissions->map(function ($permission) {
                    return '<li class="flex items-center">
                                <span class="mr-2 text-green-500">✔</span>
                                <span class="hidden permission-id">' . $permission->id . '</span>
                                <span>' . $permission->name . '</span>
                            </li>';
                })->join('');

                $listPermission .= '</ul></div>';

                return $listPermission;
            })
            ->addColumn('aksi', function ($roles) {
                $buttons = [];

                if (auth()->user()->hasPermissionTo('roles.update')) {
                    $editButton = '<button type="button" class="p-2 btn btn-clear btn-info btn-edit" data-id="' . e($roles->id) . '">
                                        <i class="ki-filled ki-pencil"></i>
                                        </button>';
                    $buttons[] = $editButton;
                }

                // if (auth()->user()->hasPermissionTo('roles.delete')) {
                // $deleteButton = '<a href="javascript:void(0)" type="button" id="btn-delete" class="btn btn-clear btn-danger"><i class="ki-filled ki-trash"></i></a>';
                // $buttons[] = $deleteButton;
                // }

                return '<div class="flex flex-row items-center justify-center">' . implode(' ', $buttons) . '</div>';
            })->rawColumns(['aksi', 'total_users', 'permissions']);

        return $dataTable->make(true);
    }

    public function create()
    {
        // 
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
        // 
    }

    public function update(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'txtroles' => 'required|string|max:100',
                'permissions' => 'array',
                'permissions.*' => 'exists:permissions,id'
            ]);

            // Temukan role yang akan diupdate
            $role = Role::findOrFail($request->id);

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

    public function destroy()
    {
        // 
    }
}
