<?php

namespace App\Controllers;

use App\Models\BiografijaModel;
use App\Models\TemaModel;
use App\Models\UsersModel;


class Student extends BaseController
{
    protected $user;

    public function __construct()
    {
        $this->user = new UsersModel();
    }

    public function home()
    {
        return view('student/home');
    }

    public function prijava()
    {
        $query = $this->user->builder()
            ->select('id, username')
            ->join('auth_groups_users', 'auth_groups_users.user_id=users.id')
            ->where('group_id', 200)
            ->orderBy('username')
            ->get();

        $data['mentor'] = $query->getResult();
        return view('student/prijava', $data);
    }

    public function prijava_sacuvaj()
    {
        if ($this->validate([
            'ime' => 'required|min_length[5]',
            'index' => 'required|min_length[5]',
            'ipms' => 'required|min_length[5]',
            'rukRada' => 'required|min_length[5]',
            'izbor' => 'required|min_length[5]',
            'naslov_sr' => 'required|min_length[5]',
            'naslov_en' => 'required|min_length[5]',
            'clan2' => 'required|min_length[5]',
            'clan3' => 'required|min_length[5]',
            'date' => 'required',

        ])) {
            $rukRada = $this->request->getPost('rukRada');
            $query = $this->user->builder()
                ->where('username', $rukRada)
                ->get();
            $idMentor = $query->getResultArray();
            $tema = [
                'id_student' => user_id(),
                'id_mentor' => $idMentor[0]['id'],
                'id_modul' => '',
                'status' => '',
                'deleted_at' => '',
            ];

            $temaModel = new TemaModel();
            $temaModel->insert($tema);
            return redirect()->to('student/home')->with('message', 'Успешно сачувана пријава');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
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
            $bioModel = new BiografijaModel();
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