<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TasksStatus;
use App\Http\Controllers\Controller;
use App\Http\Queries\Admin\ProjectQuery;
use App\Http\Queries\Admin\TaskQuery;
use App\Http\Requests\Admin\TaskRequest;
use App\Http\Services\Helpers\FlashMassageService;
use App\Http\Services\Admin\TasksService;

class TaskController extends Controller
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
    ) {
        $this->taskServices = $taskServices;
        $this->flashMassageServices = $flashMassageServices;
        $this->taskQuery = $taskQuery;
        $this->projectQuery = $projectQuery;
    }

    public function index()
    {
        return view('admin.tasks.list', [
            'tasks' => $this->taskQuery->get()
        ]);
    }

    public function create()
    {
        return view('admin.tasks.create', [
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
        return view('admin.tasks.edit', [
            'task' => $this->taskQuery->one($id),
            'projects' => $this->projectQuery->all(),
            'status' =>  TasksStatus::toArray(),
        ]);
    }

    public function update(TaskRequest $request, int $id)
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
