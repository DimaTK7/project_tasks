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

    public function __construct(
        ProjectsService $projectServices,
        FlashMassageService $flashMassageServices
    )
    {
        $this->projectServices = $projectServices;
        $this->flashMassageServices = $flashMassageServices;
    }

    /**
     * Project list
     *
     * @param  ProjectQuery $query
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index(ProjectQuery $query)
    {
        return view('managerial.projects.list', ['projects' => $query->get()]);
    }

    /**
     * Create project
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('managerial.projects.create');
    }

    /**
     * Add project in database
     *
     * @param  ProjectRequest $request validate data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ProjectRequest $request)
    {
        $this->projectServices->create($request->all());
        $this->flashMassageServices->setSuccessSavedState();
        return redirect(route('project.create'));
    }

    /**
     * Change project
     *
     * @param ProjectQuery $query get project
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(ProjectQuery $query, $id)
    {
        return view('managerial.projects.edit', ['project' => $query->one($id)]);
    }

    /**
     * Update data in database
     *
     * @param  ProjectRequest  $request validate data
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(ProjectRequest $request, $id)
    {
        $this->flashMassageServices->setSuccessUpdateState();
        $this->projectServices->update($id, $request->all());
        return redirect(route('project.index'));
    }

    /**
     *  Delete data with database
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function destroy($id)
    {
        $this->projectServices->delete($id);
        return redirect(route('project.index'));
    }
}
