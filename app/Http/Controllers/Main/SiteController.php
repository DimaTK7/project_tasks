<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Queries\Managerial\ProjectQuery;
use App\Http\Queries\Managerial\TaskQuery;

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

    public function taskNew()
    {
        return view('site.task', [
            'tasks' => $this->taskQuery->new()
        ]);
    }

    public function taskProgress()
    {
        return view('site.task', [
            'tasks' => $this->taskQuery->progress()
        ]);
    }

    public function taskDone()
    {
        return view('site.task', [
            'tasks' => $this->taskQuery->done()
        ]);
    }

    public function taskShow(int $id)
    {
        return view('site.show', [
            'task' => $this->taskQuery->one($id)
        ]);
    }

    public function taskList(int $id, string $status)
    {
        return view('site.task', [
            'tasks' => $this->taskQuery->status($id, $status)
        ]);
    }

    public function projectShow()
    {
        return view('site.project', [
            'projects' => $this->projectQuery->get()
        ]);
    }
}
