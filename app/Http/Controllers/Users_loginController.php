<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class Users_loginController extends Controller
{

    function index()
    {
        return view('login');
    }

}