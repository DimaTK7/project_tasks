<?php

namespace App\Http\Controllers\Managerial;

use App\Enums\TasksStatus;
use App\Http\Controllers\Controller;
use App\Http\Queries\Managerial\ProjectQuery;
use App\Http\Queries\Managerial\TaskQuery;
use App\Http\Requests\Managerial\TaskRequest;
use App\Http\Services\Helpers\FlashMassageService;
use App\Http\Services\Managerial\TasksService;

class TasksController extends Controller
{
    private $taskServices;
    private $flashMassageServices;
    private $taskQuery;
    private $projectQuery;

    public function __construct(
        TasksService $taskServices,
        FlashMassageService $flashMassageServices,
        TaskQuery $taskQuery,
        ProjectQuery $projectQuery
    )
    {
        $this->taskServices = $taskServices;
        $this->flashMassageServices = $flashMassageServices;
        $this->taskQuery = $taskQuery;
        $this->projectQuery = $projectQuery;
    }

    public function index()
    {
        return view('managerial.tasks.list', [
            'tasks' => $this->taskQuery->get()
        ]);
    }

    public function create()
    {
        return view('managerial.tasks.create', [
            'projects' => $this->projectQuery->all(),
            'status' =>  TasksStatus::toArray(),
            ]);
    }

    public function store(TaskRequest $request)
    {
        $this->taskServices->create($request->all());
        $this->flashMassageServices->setSuccessSavedState();
        return redirect(route('task.create'));
    }

    public function edit(int $id)
    {
        return view('managerial.tasks.edit', [
            'task' => $this->taskQuery->one($id),
            'projects' => $this->projectQuery->all(),
            'status' =>  TasksStatus::toArray(),
        ]);
    }

    public function update(TaskRequest $request,int $id)
    {
        $this->taskServices->update($id, $request->all());
        $this->flashMassageServices->setSuccessUpdateState();
        return redirect(route('task.index'));
    }

    public function destroy(int $id)
    {
        $this->taskServices->delete($id);
        return redirect(route('task.index'));
    }

    public function downloadFile($name)
    {
       return response()->download("storage/$name");
    }
}
