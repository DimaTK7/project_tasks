<?php

namespace App\Http\Controllers\Managerial;

use App\Http\Controllers\Controller;
use App\Http\Requests\Managerial\TaskRequest;
use App\Http\Services\Managerial\TaskServices;

class TasksController extends Controller
{
    private $services;
    public function __construct(TaskServices $services)
    {
        $this->services = $services;
    }
    /**
     * Получить список задач в файле вида
     */
    public function index()
    {
        //
    }

    /**
     * Страница создания задачи
     */
    public function create()
    {
        return view('managerial.projects.create');
    }

    /**
     * Запись задачи в БД
     * @param  TaskRequest $request валидация данных
     */
    public function store(TaskRequest $request)
    {
        $this->services->create($request->all());
        $this->flashMassageServices->setSuccessSavedState();
        return redirect(route('task.create'));
    }

    /**
     * Страница редактирования задачи
     *
     * @param  int  $id ключ
     */
    public function edit($id)
    {
        //
    }

    /**
     * Обновляем данные и записываем в ДБ
     *
     * @param  TaskRequest  $request валидация данных
     * @param  int  $id ключ
     */
    public function update(TaskRequest $request, $id)
    {
        //
    }

    /**
     * Удаление задачи с БД
     *
     * @param  int  $id ключ
     */
    public function destroy($id)
    {
        //
    }
}
