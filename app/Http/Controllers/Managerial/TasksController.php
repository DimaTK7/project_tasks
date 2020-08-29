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

    public function __construct(
        TasksService $taskServices,
        FlashMassageService $flashMassageServices
    )
    {
        $this->taskServices = $taskServices;
        $this->flashMassageServices = $flashMassageServices;
    }

    /**
     * Task list
     *
     * @param  TaskQuery $query
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(TaskQuery $query)
    {
        return view('managerial.tasks.list', ['tasks' => $query->get()]);
    }

    /**
     * Create task
     *
     * @param ProjectQuery $query get projects
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(ProjectQuery $query)
    {
        return view('managerial.tasks.create', [
            'projects' => $query->all(),
            'status' =>  TasksStatus::toArray(),
            ]);
    }

    /**
     * Add task in database
     *
     * @param  TaskRequest $request validate data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(TaskRequest $request)
    {
        $this->taskServices->create($request->all(), $request->file('file'));
        $this->flashMassageServices->setSuccessSavedState();
        return redirect(route('task.create'));
    }

    /**
     * Change task
     *
     * @param TaskQuery $taskQuery get task
     * @param ProjectQuery $projectQuery get projects
     * @param  int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(TaskQuery $taskQuery, ProjectQuery $projectQuery, $id)
    {
        return view('managerial.tasks.edit', [
            'task' => $taskQuery->one($id),
            'projects' => $projectQuery->all(),
            'status' =>  TasksStatus::toArray(),
        ]);
    }

    /**
     * Update data in database
     *
     * @param  TaskRequest  $request validate data
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(TaskRequest $request, $id)
    {
        $this->flashMassageServices->setSuccessUpdateState();
        $this->taskServices->update($id, $request->all(), $request->file('file'));
        return redirect(route('task.index'));
    }

    /**
     * Delete data with database
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $this->taskServices->delete($id);
        return redirect(route('task.index'));
    }

    /**
     * Download file
     *
     * @param $name
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function downloadFile($name)
    {
       return response()->download("storage/$name");
    }
}
