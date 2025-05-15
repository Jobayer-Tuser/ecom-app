<?php

namespace App\Solid\LiskovSubstitution;

interface UserFetchApi
{
    public function fetch() : array;
}
