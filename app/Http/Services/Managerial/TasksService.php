<?php

namespace App\Http\Services\Managerial;

use App\Model\Managerial\Task;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TasksService
{
    public function create(array $data)
    {
        $task = Task::create($data);

           if (isset($data['file'])) {
               $task->file = $this->uploadFile($data['file']);
               $task->save();
           }
    }

    public function update(int $id, array $data)
    {
        $task = Task::find($id)->fill($data);
        if (isset($data['file'])) {
            $this->removeFile($task->file);
            $task->file = $this->uploadFile($data['file']);
            $task->save();
        }
    }

    public function delete($id)
    {
        return Task::find($id)->delete();
    }

    public function uploadFile($file)
    {
        if ($file == null) { return false; }

        $fileName = Str::random(10) . '.' . $file->extension();
        $file->storeAs('public', $fileName);
        return $fileName;
    }

    public function removeFile($file)
    {
        if ($file != null) {
            Storage::delete('public/' . $file);
        }
    }
}
