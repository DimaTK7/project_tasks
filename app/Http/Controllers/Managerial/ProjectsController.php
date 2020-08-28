<?php

namespace App\Http\Controllers\Managerial;

use App\Http\Controllers\Controller;
use App\Http\Queries\Managerial\ProjectQuery;
use App\Http\Requests\Managerial\ProjectRequest;
use App\Http\Services\Helpers\FlashMassageServices;
use App\Http\Services\Managerial\ProjectServices;

class ProjectsController extends Controller
{
    private $projectServices;
    private $flashMassageServices;

    public function __construct(
        ProjectServices $projectServices,
        FlashMassageServices $flashMassageServices
    )
    {
        $this->projectServices = $projectServices;
        $this->flashMassageServices = $flashMassageServices;
    }
    /**
     * Получить список проектов в файле вида
     */
    public function index(ProjectQuery $query)
    {
        return view('managerial.projects.list', ['projects' => $query->get()]);
    }

    /**
     * Страница создания проекта
     */
    public function create()
    {
        return view('managerial.projects.create');
    }

    /**
     * Запись проекта в БД
     * @param  ProjectRequest $request валидация данных
     */
    public function store(ProjectRequest $request)
    {
        $this->projectServices->create($request->all());
        $this->flashMassageServices->setSuccessSavedState();
        return redirect(route('project.create'));
    }

    /**
     * Страница редактирования проекта
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
     * @param  ProjectRequest  $request валидация данных
     * @param  int  $id ключ
     */
    public function update(ProjectRequest $request, $id)
    {
        //
    }

    /**
     * Удаление проета с БД
     *
     * @param  int  $id ключ
     */
    public function destroy($id)
    {
        //
    }
}
