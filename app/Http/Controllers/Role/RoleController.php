<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Http\Queries\Role\RoleQuery;
use App\Http\Requests\Role\RoleRequest;
use App\Http\Services\Helpers\FlashMassageService;
use App\Http\Services\Role\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private $flashMassageServices;
    private $roleQuery;
    private $roleService;

    public function __construct(
        RoleQuery $roleQuery,
        RoleService $roleService,
        FlashMassageService $flashMassageServices
    ) {
         $this->flashMassageServices = $flashMassageServices;
         $this->roleQuery = $roleQuery;
         $this->roleService = $roleService;
    }

    public function index()
    {
        return view('admin.roles.list', [
            'roles' => $this->roleQuery->get()
        ]);
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(RoleRequest $request)
    {
        $this->roleService->create($request->all());
        $this->flashMassageServices->setSuccessSavedState();
        return redirect(route('role.create'));
    }

    public function edit($id)
    {
        return view('admin.roles.edit', [
            'role' => $this->roleQuery->one($id)
        ]);
    }

    public function update(RoleRequest $request, $id)
    {
        $this->flashMassageServices->setSuccessUpdateState();
        $this->roleService->update($id, $request->all());
        return redirect(route('role.index'));
    }

    public function destroy($id)
    {
        $this->roleService->delete($id);
        return redirect(route('role.index'));
    }
}
