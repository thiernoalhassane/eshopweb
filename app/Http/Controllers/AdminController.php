<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdminController extends BaseController
{

    public function show()
    {
        return view('administration/administration ');
    }

    public function showProfile()
    {
        return view('administration/profile ');
    }

    public function showProduct()
    {
        return view('administration/listeproduit');
    }


}
