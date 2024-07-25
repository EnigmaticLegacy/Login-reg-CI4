<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class AuthController extends BaseController
{

    public function index()
    {
        $data['title'] = 'Dashboard';
        return view('dashboard',$data);
        
    }

    public function login()
    {
        $data = view('login');
        echo $data;
    }

    public function register()
    {
        $data = view('register');
        echo $data;
    }

    public function logout_view()
    {
        $data = view('logout');
        echo $data;
    }

    public function content(){
        $data["content"] = view('content');
        $data["session_name"] = session()->get('name');
        echo json_encode($data);
    }

    public function authenticate()
    {
        $session = session();
        $user = new UserModel();
        $request = $this->request->getPost();
        $email = $request['email'];
        $password = $request['password'];
        $data = $user->where('email',$email)->first();
        if(is_null($data))
        {
            echo('error');
        }
        if(password_verify($password,$data['password'])){
            $session_data = [
                'name' => $data['name'],
                'email' => $data['email'],
                'isLoggedIn' => TRUE
            ];
            $session->set($session_data);
            echo('success');
        }
        else{
            echo('error');
        }


    }

    
    public function register_user()
    {
        $session = session();
        $user = new UserModel();
        $request = $this->request->getPost();
        $request['password'] = password_hash($request['password'] ,PASSWORD_DEFAULT);
        unset($request['password2']);
        unset($request['newsletter']);
        $user->save($request);
        $session_data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'isLoggedIn' => TRUE
        ];
        $session->set($session_data);
        echo "success";
    }

    public function logout() {
        session()->destroy();
        ob_clean();
    }

    
}
