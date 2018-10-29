<?php

namespace MartinCamen\GetANewsletter;

use Illuminate\Support\Facades\Facade;

class GetANewsletter extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'getanewsletter';
    }
}
