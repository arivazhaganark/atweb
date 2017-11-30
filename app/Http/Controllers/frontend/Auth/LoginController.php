<?php

namespace App\Http\Controllers\frontend\Auth;
use App\Model\frontend\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    
    public function getLoginForm()
    {
        return view('frontend/auth/login');
    }	
    
    public function authenticate(Request $request)
    {        
        $email = $request->input('email');
        $password = $request->input('password');
         
        if(auth()->guard('user')->attempt(['email' => $email, 'password' => $password, 'type' => 'C', 'status' => 'Y' ])) 
        {            
            return 'client';
        }
        else if(auth()->guard('user')->attempt(['email' => $email, 'password' => $password, 'type' => 'P', 'status' => 'Y' ])) 
        {            
            return 'partner';
        }
        else if(auth()->guard('user')->attempt(['email' => $email, 'password' => $password, 'type' => 'E', 'status' => 'Y' ])) 
        {            
            return 'employee';
        }
        else if(auth()->guard('user')->attempt(['email' => $email, 'password' => $password, 'type' => 'V', 'status' => 'Y' ])) 
        {            
            return 'visitor';
        }
        else if(auth()->guard('user')->attempt(['email' => $email, 'password' => $password, 'type' => 'C', 'status' => 'N' ]))
        {            
            echo 'User is InActive.';
        }
        else if(auth()->guard('user')->attempt(['email' => $email, 'password' => $password, 'type' => 'P', 'status' => 'N' ]))
        {            
            echo 'User is InActive.';
        }
        else if(auth()->guard('user')->attempt(['email' => $email, 'password' => $password, 'type' => 'E', 'status' => 'N' ]))
        {            
            echo 'User is InActive.';
        }
        else if(auth()->guard('user')->attempt(['email' => $email, 'password' => $password, 'type' => 'V', 'status' => 'N' ]))
        {            
            echo 'User is InActive.';
        }
        else
        {
           echo 'Invalid Login Credentials !';
        }
    }

    public function partner_authenticate(Request $request)
    {        
        $email = $request->input('email');
        $password = $request->input('password');

        if(auth()->guard('user')->attempt(['email' => $email, 'password' => $password, 'type' => 'P', 'status' => 'Y'])) 
        {   
            echo 'success';
        }
        else if(auth()->guard('user')->attempt(['email' => $email, 'password' => $password, 'type' => 'P', 'status' => 'N' ]))
        {            
            echo 'User is InActive.';
        }
        else
        {
           echo 'Invalid Login Credentials !';
        }
    }
    
    public function visitor_authenticate(Request $request)
    {      
        $email = $request->input('visitors_email');
        $password = $request->input('visitors_password');

        if(auth()->guard('user')->attempt(['email' => $email, 'password' => $password, 'type' => 'V', 'status' => 'Y'])) 
        {   
            echo 'success';
        }
        else if(auth()->guard('user')->attempt(['email' => $email, 'password' => $password, 'type' => 'V', 'status' => 'N' ]))
        {            
            echo 'User is InActive.';
        }
        else
        {
           echo 'Invalid Login Credentials !';
        }
    }
    
    public function getLogout() 
    {
        auth()->guard('user')->logout();
        return redirect()->intended('/');
    }
    
}
