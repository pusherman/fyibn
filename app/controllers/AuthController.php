<?php

class AuthController extends BaseController 
{
	public function showLogin()
	{
		return View::make('auth.login');
	}
	
	public function postLogin()
	{
	    $credentials = array(
	        'username' => Input::get('username'), 
	        'password' => Input::get('password')
        );

        $remember = (bool)Input::get('remember', false);

        if (Auth::attempt($credentials, $remember))
        {
            return Redirect::intended('/');
        }

        return Redirect::to('login')
                ->withInput(Input::except('password'))
                ->with('error', 'idk who you think you are');
    }
    
    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}