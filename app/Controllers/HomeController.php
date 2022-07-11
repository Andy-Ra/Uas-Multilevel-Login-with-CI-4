<?php

namespace App\Controllers;

use App\Models\MengloginModel;

class HomeController extends BaseController
{   
    public function index()
    {
        return redirect()->route('Login');

    }
    public function login()
    {
        return view('Login');
    }

    public function processlogin(){
        $mengloginmodel = new MengloginModel();
        $mail = $this->request->getVar('email');
        $pass = $this->request->getVar('password');
        $datalogin = $mengloginmodel->where([
            'email' => $mail,
        ])->first();
        if ($datalogin) {
            if (password_verify($pass, $datalogin->Password)) {
                session()->set([
                    'email' => $datalogin->Email,
                    'role' => $datalogin->Role,
                    'menglogin' => TRUE
                ]);
                if(session()->get('role') == "Admin"){
                    return redirect()->to(base_url('Admin'));
                }
                else if(session()->get('role') == "Karyawan"){
                    return redirect()->to(base_url('home_dosen'));
                }
                else{
                    return redirect()->to(base_url('login'));
                }
            } else {
                session()->setFlashdata('error', 'Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Email & Password Salah');
            return redirect()->back();
        }
    }

    
    public function logout() {
        session()->destroy();
        return redirect()->to('/');
    }
}
