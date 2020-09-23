<?php

namespace App\Http\Services\Helpers;

class FlashMassageService
{
    /**
     *  Flesh massage: data success save
     */
    public function setSuccessSavedState()
    {
        request()->session()->flash('successSave', true);
    }

    /**
     *  Flesh massage: data success update
     */
    public function setSuccessUpdateState()
    {
        request()->session()->flash('successUpdate', true);
    }

    /**
     *  Flesh massage: user doesn't have access
     */
    public function setAccessDenied()
    {
        request()->session()->flash('accessDenied', true);
    }
}
