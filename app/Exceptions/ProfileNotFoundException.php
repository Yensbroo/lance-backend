<?php

namespace App\Exceptions;

use Exception;

class ProfileNotFoundException extends Exception
{
    public function report() {
        dd('test');
    }
}
