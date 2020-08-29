<?php

namespace App\Http\Services\Managerial;

use App\Model\Managerial\Tasks;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TaskServices
{
    private $tasks;

    public function __construct(Tasks $tasks)
    {
        $this->tasks = $tasks;
    }

    public function create(array $fields)
    {
        $this->tasks->fill($fields)->save();
        if($fields['file']){
            $this->uploadFile($fields['file']);
        }

    }

    public function update($id, array $fields)
    {

    }

    public function delete($id)
    {

    }

    public function uploadFile($file)
    {

        $path = Storage::putFile('dist', $file->file('file'));

     //   $this->removeImage();
//        $filename = Str::random(10) . '.' . $file->extension();
//        $file->storeAs('public', $filename);
//        $this->tasks->file = $filename;
//        $this->tasks->save();
    }
}
