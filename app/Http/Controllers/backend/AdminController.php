<?php

namespace App\Http\Controllers\backend;

use App\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    public function home()
    {        
        $total_clients = User::where('type', 'C')->where('status', 'Y')->count();
        $total_partner = User::where('type', 'P')->where('status', 'Y')->count();
        $total_employee = User::where('type', 'E')->where('status', 'Y')->count();   
        $total_visitor = User::where('type', 'V')->where('status', 'Y')->count();   
        return view('backend.home', compact('total_clients', 'total_partner', 'total_employee', 'total_visitor'));        
    }
    
}
