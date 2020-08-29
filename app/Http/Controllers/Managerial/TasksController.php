<?php

namespace App\Http\Controllers\Managerial;

use App\Enums\TasksStatus;
use App\Http\Controllers\Controller;
use App\Http\Queries\Managerial\ProjectQuery;
use App\Http\Queries\Managerial\TaskQuery;
use App\Http\Requests\Managerial\TaskRequest;
use App\Http\Services\Helpers\FlashMassageServices;
use App\Http\Services\Managerial\TaskServices;

class TasksController extends Controller
{
    private $taskServices;
    private $flashMassageServices;

    public function __construct(
        TaskServices $taskServices,
        FlashMassageServices $flashMassageServices
    )
    {
        $this->taskServices = $taskServices;
        $this->flashMassageServices = $flashMassageServices;
    }

    /**
     * Получить список проектов в файле вида
     * @param  TaskQuery $query список проектов
     */
    public function index(TaskQuery $query)
    {
        return view('managerial.tasks.list', ['tasks' => $query->get()]);
    }

    /**
     * Страница создания проекта
     * @param ProjectQuery $query получаем все проекты
     */
    public function create(ProjectQuery $query)
    {
        return view('managerial.tasks.create', [
            'projects' => $query->all(),
            'status' =>  TasksStatus::toArray(),
            ]);
    }

    /**
     * Запись проекта в БД
     * @param  TaskRequest $request валидация данных
     */
    public function store(TaskRequest $request)
    {
        $this->taskServices->create($request->all());
        $this->flashMassageServices->setSuccessSavedState();
        return redirect(route('task.create'));
    }

    /**
     * Страница редактирования проекта
     * @param TaskQuery $query получить проект
     * @param  int  $id ключ
     */
    public function edit(TaskQuery $query, $id)
    {
        return view('managerial.task.edit', ['task' => $query->one($id)]);
    }

    /**
     * Обновляем данные и записываем в ДБ
     *
     * @param  TaskRequest  $request валидация данных
     * @param  int  $id ключ
     */
    public function update(TaskRequest $request, $id)
    {
        $this->flashMassageServices->setSuccessUpdateState();
        $this->taskServices->update($id, $request->all());
        return redirect(route('task.index'));
    }

    /**
     * Удаление проета с БД
     *
     * @param  int  $id ключ
     */
    public function destroy($id)
    {
        $this->taskServices->delete($id);
        return redirect(route('task.index'));
    }
}
