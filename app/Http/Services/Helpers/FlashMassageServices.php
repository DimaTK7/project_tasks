<?php

namespace App\Http\Services\Helpers;

class FlashMassageServices
{
    public function setSuccessSavedState()
    {
        request()->session()->flash('successSave', true);
    }

    public function setSuccessUpdateState()
    {
        request()->session()->flash('successUpdate', true);
    }
}
