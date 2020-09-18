<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Queries\Admin\ProjectQuery;
use App\Http\Queries\Admin\TaskQuery;
use App\Model\Admin\User;
use App\Model\Role;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    private $taskQuery;
    private $projectQuery;
    public function __construct(
        TaskQuery $taskQuery,
        ProjectQuery $projectQuery
    )
    {
        $this->taskQuery = $taskQuery;
        $this->projectQuery = $projectQuery;
    }

    public function index()
    {
        return view('site.index',[
            'projects' => $this->projectQuery->get()
        ]);
    }

    public function taskList(int $id, string $status)
    {
        return view('site.task', [
            'tasks' => $this->taskQuery->status($id, $status)
        ]);
    }

    public function taskShow(int $id)
    {
        return view('site.show', [
            'task' => $this->taskQuery->one($id)
        ]);
    }

    public function projectShow()
    {
        return view('site.project', [
            'projects' => $this->projectQuery->get()
        ]);
    }

}
