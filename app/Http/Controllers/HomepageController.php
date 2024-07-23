<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Misc\JsonController;
use Illuminate\Contracts\View\View;

class HomepageController extends Controller
{
    public function index() : View
    {
        /*for ($i = 1; $i < 40; $i++){
            dispatch(new SendEmailJob($i));
        }*/

        return view('front.home');
    }

    public function checkJson(): JsonController
    {
        return self::convertJson(name: "Jobayer", email: "email", phone: "01770301202");
    }

    private static function convertJson(mixed ...$args) : JsonController
    {
        return new JsonController($args);
    }
}
