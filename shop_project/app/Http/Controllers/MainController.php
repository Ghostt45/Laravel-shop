<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        return view('index');
    }
    public function product() {
        return view('product');
    }
    public function login() {
        return view('login');
    }
    public function signup() {
        return view('signup');
    }
    public function admin() {
        return view('admin');
    }
    public function confirmation() {
        return view('confirmation');
    }
    
}
