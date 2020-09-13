<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Queries\Admin\ProjectQuery;
use App\Http\Requests\Admin\ProjectRequest;
use App\Http\Services\Helpers\FlashMassageService;
use App\Http\Services\Admin\ProjectsService;
use App\Jobs\SendMessage;

class ProjectController extends Controller
{
    private $projectServices;
    private $flashMassageServices;
    private $projectQuery;

    public function __construct(
        ProjectsService $projectServices,
        FlashMassageService $flashMassageServices,
        ProjectQuery $projectQuery
    ) {
        $this->projectServices = $projectServices;
        $this->flashMassageServices = $flashMassageServices;
        $this->projectQuery = $projectQuery;
    }

    public function index()
    {
        SendMessage::dispatch('ProjectController@Index');
        return view('admin.projects.list', [
            'projects' => $this->projectQuery->get()
        ]);
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(ProjectRequest $request)
    {
        $this->projectServices->create($request->all());
        $this->flashMassageServices->setSuccessSavedState();
        return redirect(route('project.create'));
    }

    public function edit(int $id)
    {
        return view('admin.projects.edit', [
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
