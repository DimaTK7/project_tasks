<?php

namespace App\Http\Services\Managerial;

use App\Model\Managerial\Tasks;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TasksService
{

    public function create(array $fields, $file)
    {
       $task = new Tasks();
       $task->fill($fields);
       if ($file) $task->file = $this->uploadFile($file);
       $task->save();
    }

    public function update($id, array $fields, $file)
    {
        $task = Tasks::find($id);
        $task->fill($fields);
        if ($file){
            $this->removeFile($task->file);
            $task->file = $this->uploadFile($file);
        }
        $task->save();
    }

    public function delete($id)
    {
        return Tasks::find($id)->delete();
    }

    public function uploadFile($file)
    {
        if($file == null) { return false; }

        $fileName = Str::random(10) . '.' . $file->extension();
        $file->storeAs('public', $fileName);
        return $fileName;
    }

    public function removeFile($file)
    {
        if($file != null)
        {
            Storage::delete('public/' . $file);
        }
    }
}
