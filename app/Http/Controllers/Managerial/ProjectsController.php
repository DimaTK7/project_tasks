<?php

namespace App\Http\Controllers\Managerial;

use App\Http\Controllers\Controller;
use App\Http\Queries\Managerial\ProjectQuery;
use App\Http\Requests\Managerial\ProjectRequest;
use App\Http\Services\Helpers\FlashMassageService;
use App\Http\Services\Managerial\ProjectsService;

class ProjectsController extends Controller
{
    private $projectServices;
    private $flashMassageServices;
    private $projectQuery;

    public function __construct(
        ProjectsService $projectServices,
        FlashMassageService $flashMassageServices,
        ProjectQuery $projectQuery
    )
    {
        $this->projectServices = $projectServices;
        $this->flashMassageServices = $flashMassageServices;
        $this->projectQuery =$projectQuery;
    }

    public function index()
    {
        return view('managerial.projects.list', [
            'projects' => $this->projectQuery->get()
        ]);
    }

    public function create()
    {
        return view('managerial.projects.create');
    }

    public function store(ProjectRequest $request)
    {
        $this->projectServices->create($request->all());
        $this->flashMassageServices->setSuccessSavedState();
        return redirect(route('project.create'));
    }

    public function edit(int $id)
    {
        return view('managerial.projects.edit', [
            'project' => $this->projectQuery->one($id)
        ]);
    }

    public function update(ProjectRequest $request, $id)
    {
        $this->flashMassageServices->setSuccessUpdateState();
        $this->projectServices->update($id, $request->all());
        return redirect(route('project.index'));
    }

    public function destroy($id)
    {
        $this->projectServices->delete($id);
        return redirect(route('project.index'));
    }
}
