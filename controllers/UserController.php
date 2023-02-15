<?php

namespace Web;

class UserController extends BaseController
{
    public function showSignIn(){
        $path = '../';
        $this->render('logIn.signIn',compact('path'));
    }
    public function showSignUp(){
        $path = '../';
        $this->render('logIn.signUp',compact('path'));
    }
}