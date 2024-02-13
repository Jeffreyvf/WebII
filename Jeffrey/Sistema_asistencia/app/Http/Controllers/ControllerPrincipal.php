<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use View;
use DB;
use Session;

class ControllerPrincipal extends BaseController
{
    public function principal(){
        
        if (Session()->has("usuariologin")) {

           return View::make('panelprincipal');

        }else{
            
            return View::make('login');
        }

        

    }
     


}