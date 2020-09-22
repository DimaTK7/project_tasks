<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Http\Queries\Admin\ProjectQuery;
use App\Http\Queries\Role\PermissionQuery;
use App\Http\Queries\Role\RoleQuery;
use App\Http\Requests\Role\PermissionRequest;
use App\Http\Requests\Role\RoleRequest;
use App\Http\Services\Helpers\FlashMassageService;
use App\Http\Services\Role\PermissionService;
use App\Http\Services\Role\RoleService;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    private $flashMassageServices;
    private $permissionQuery;
    private $permissionService;

    public function __construct(
        PermissionQuery $permissionQuery,
        PermissionService $permissionService,
        FlashMassageService $flashMassageServices
    ) {
        $this->flashMassageServices = $flashMassageServices;
        $this->permissionQuery = $permissionQuery;
        $this->permissionService = $permissionService;
    }

    public function index()
    {
        return view('admin.permissions.list', [
            'permissions' => $this->permissionQuery->get()
        ]);
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(PermissionRequest $request)
    {
        $this->permissionService->create($request->all());
        $this->flashMassageServices->setSuccessSavedState();
        return redirect(route('permission.create'));
    }

    public function edit($id)
    {
        return view('admin.permissions.edit', [
            'permission' => $this->permissionQuery->one($id)
        ]);
    }

    public function update(PermissionRequest $request, $id)
    {
        $this->flashMassageServices->setSuccessUpdateState();
        $this->permissionService->update($id, $request->all());
        return redirect(route('permission.index'));
    }

    public function destroy($id)
    {
        $this->permissionService->delete($id);
        return redirect(route('permission.index'));
    }
}
