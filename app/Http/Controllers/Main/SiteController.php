<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Queries\Admin\ProjectQuery;
use App\Http\Queries\Admin\TaskQuery;
use App\Model\Admin\User;

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
        $user = User::find(137);
//        var_dump($user->hasRole('web-developer')); //вернёт true
//        var_dump($user->hasRole('project-manager')); //вернёт false
//       // var_dump($user->givePermissionsTo('web-developer'));
//        var_dump($user->hasPermission('manage-users')); //вернёт true
        dd($user->can('manage-users')); // вернёт true
//        dd();
        return view('site.index', [
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
