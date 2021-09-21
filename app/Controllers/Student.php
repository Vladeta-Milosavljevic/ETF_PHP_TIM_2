<?php

namespace App\Controllers;

use App\Models\Biografija;

class Student extends BaseController
{
    public function home()
    {
        return view('student/home');
    }

    public function prijava()
    {
        return view('student/prijava');
    }
    public function biografija()
    {

        return view('student/biografija');
    }


    public function biografija_posalji()
    {
        if ($this->validate([
            'tekst' => 'required',
        ])) {
            $bioModel = new Biografija();
            $data = [
                'id_rad' => '15',
                'autor' => 'student',
                'tekst' => $this->request->getPost('tekst'),
            ];
            $bioModel->insert($data);
            return redirect()->to('student/home')->with('message', 'Успешно сачувана биографија');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }
    public function obrazlozenje()
    {
        return view('student/obrazlozenje');
    }
}