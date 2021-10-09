<?php

namespace App\Controllers;

use App\Models\BiografijaModel;
use App\Models\KomisijaModel;
use App\Models\ModulModel;
use App\Models\ObrazlozenjeTemeModel;
use App\Models\PrijavaModel;
use App\Models\TemaModel;
use App\Models\UsersModel;
use App\Models\KomentariModel;


class Mentor extends BaseController
{
    protected $user;
    protected $temaModel;
    protected $prijavaModel;
    protected $obrazlozenjeModel;
    protected $komisijaModel;
    protected $modulModel;
    protected $bioModel;
    protected $komentariModel;

    public function __construct()
    {
        $this->user = new UsersModel();
        $this->temaModel = new TemaModel();
        $this->prijavaModel = new PrijavaModel();
        $this->obrazlozenjeModel = new ObrazlozenjeTemeModel();
        $this->bioModel = new BiografijaModel();
        $this->komisijaModel = new KomisijaModel();
        $this->modulModel = new ModulModel();
        $this->komentariModel = new KomentariModel();
    }

    public function home()
    {
        return view('mentor/home');
    }
    public function odluka()
    {
        return view('mentor/odluka');
    }
    public function izbor_studenta()
    {
        return view('mentor/izbor_studenta');
    }

    public function prijava()
    {
        $query = $this->user->builder()
            ->select('id, username')
            ->join('auth_groups_users', 'auth_groups_users.user_id=users.id')
            ->where('group_id', 200)
            ->orderBy('username')
            ->get();
        $data['mentor'] = $query->getResultArray();
        $testProvera = $this->temaModel->builder()->where('id_student', user_id())
            ->get()->getResultArray();
        $test = $testProvera ?? '';
        if ($test) {
            return redirect()->to('student/prijava_azuriraj');
        } else {
            return view('student/prijava', $data);
        }
    }

    public function prijava_sacuvaj()
    {
        if ($this->validate([
            'ime' => 'required|min_length[5]',
            'indeks' => 'required|min_length[5]',
            'ipms' => 'required|min_length[5]',
            'rukRada' => 'required',
            'izbor' => 'required|min_length[5]',
            'naslov_sr' => 'required|min_length[5]',
            'naslov_en' => 'required|min_length[5]',
            'clan2' => 'required',
            'clan3' => 'required',
            'date' => 'required',

        ])) {
            $rukRada = $this->request->getPost('rukRada');
            $clan2 = $this->request->getPost('clan2');
            $clan3 = $this->request->getPost('clan3');
            if ($rukRada == $clan2 || $rukRada == $clan3 || $clan2 == $clan3) {
                return redirect()->back()->withInput()->with('message_danger', 'Не можете више пута одабрати истог професора');
            }

            $tema = [
                'id_student' => user_id(),
                'id_mentor' => $rukRada,
                'id_modul' => '',
                'status' => '',
                'deleted_at' => '',
            ];


            $id = $this->temaModel->insert($tema, true);
            $predmet = $this->request->getPost('predmet') ?? '';
            $prijava = [
                'id_rad' => $id,
                'ime_prezime' => $this->request->getPost('ime'),
                'indeks' => $this->request->getPost('indeks'),
                'izborno_podrucje_MS' => $this->request->getPost('ipms'),
                'autor' => 'student',
                'ruk_predmet' => $predmet,
                'naslov' => $this->request->getPost('naslov_sr'),
                'naslov_eng' => $this->request->getPost('naslov_en'),
                'datum' => $this->request->getPost('date'),
            ];


            $this->prijavaModel->insert($prijava);

            $komisija = [
                'id_rad' => $id,
                'id_pred_kom' => $rukRada,
                'id_clan_2' => $clan2,
                'id_clan_3' => $clan3,
            ];

            $this->komisijaModel->insert($komisija);

            return redirect()->to('student/home')->with('message', 'Успешно сачувана пријава');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    // Mentor azurira vec postojecu prijavu odredjenog studenta

    public function prijava_azuriraj($id)
    {
       $mentorUpit = $this->user->builder()->where('id', user_id())->get()->getResultArray()[0];
       $data['mentor'] = $mentorUpit;
       $mentorId = $mentorUpit['id'];
    
        // prijava
        $prijavaUpit = $this->prijavaModel->builder()->where('id', $id)
        ->get()->getResultArray()[0];
        $data['prijava'] = $prijavaUpit;
 
        // tema
        $tema_id = $prijavaUpit['id_rad'];
        $temaUpit = $this->temaModel->builder()->where('id',  $tema_id)->get()->getResultArray()[0];
        $data['tema'] = $temaUpit;

        $id_student = $temaUpit['id_student'];
        $data['id_student'] = $id_student;

        // komisija
        $komisijaUpit = $this->komisijaModel->builder()->where('id_rad', $tema_id)->get()->getResultArray()[0];
        $data['komisija'] = $komisijaUpit;
        $id_clan2 = $komisijaUpit['id_clan_2'];
        $id_clan3 = $komisijaUpit['id_clan_3'];
 
        $clan2Upit = $this->user->builder()->where('id', $id_clan2)->get()->getResultArray()[0];
        $data['clan2'] = $clan2Upit;
 
        $clan3Upit = $this->user->builder()->where('id', $id_clan3)->get()->getResultArray()[0];
        $data['clan3'] = $clan3Upit;
 
        $query = $this->user->builder()
        ->select('id, username')
        ->join('auth_groups_users', 'auth_groups_users.user_id=users.id')
        ->where('group_id', 200)
        ->orderBy('username')
        ->get();
        $data['mentori'] = $query->getResultArray();
        
        $komentariUpit = $this->komentariModel->builder()->where('id_rad', $tema_id)->get()->getResultArray();
        $komentari = '';

        foreach( $komentariUpit as $komentar){
            if($komentar['mentor_komentar'] != ''){
             $komentari .= 'Komentar mentora: ';
             $komentari .= $komentar['mentor_komentar'];
             $komentari .= ' ' ."\n";
            }
            if($komentar['ruk_komentar'] != ''){
             $komentari .= 'Komentar rukovodioca: ';
             $komentari .= $komentar['ruk_komentar'];
             $komentari .= ' '."\n";
            }
            if($komentar['st_sluz_komentar'] != ''){
             $komentari .= 'Komentar sluzbe: ';
             $komentari .= $komentar['st_sluz_komentar'];
             $komentari .= ' '."\n";
            }
        }
        $data['prethodni_komentari'] = $komentari;
        return view('mentor/prijava_azuriraj', $data);
    }
    // Mentor - azuriraj prijavu

    public function prijava_azuriraj_sacuvaj()
    {
        if ($this->validate([
            'ime' => 'required|min_length[5]',
            'indeks' => 'required|min_length[5]',
            'ipms' => 'required|min_length[5]',
            'izbor' => 'required|min_length[5]',
            'naslov_sr' => 'required|min_length[5]',
            'naslov_en' => 'required|min_length[5]',
            'clan2' => 'required',
            'clan3' => 'required',
            'date' => 'required'
        ])) {
 
            $rukRada = user_id();
            $clan2 = $this->request->getPost('clan2');
            $clan3 = $this->request->getPost('clan3');
            if ($rukRada == $clan2 || $rukRada == $clan3 || $clan2 == $clan3) {
                return redirect()->back()->withInput()->with('message', 'Не можете више пута одабрати истог професора');
            }
 
            $id_student = $this->request->getPost('student_id');
 
            $tema = [
                'id_student' => $id_student,
                'id_mentor' => $rukRada,
                'id_modul' => '',
                'status' => '2',
                'deleted_at' => '',
            ];
            $tema_id = $this->request->getPost('tema_id');
            $this->temaModel->update($tema_id, $tema);
            $id = $tema_id;
             
            $predmet = $this->request->getPost('predmet') ?? '';
            $prijava = [
                'id_rad' => $id,
                'ime_prezime' => $this->request->getPost('ime'),
                'indeks' => $this->request->getPost('indeks'),
                'izborno_podrucje_MS' => $this->request->getPost('ipms'),
                'autor' => 'mentor',
                'ruk_predmet' => $predmet,
                'naslov' => $this->request->getPost('naslov_sr'),
                'naslov_eng' => $this->request->getPost('naslov_en'),
                'datum' => $this->request->getPost('date'),
            ];
 
            $prijava_id_upit = $this->prijavaModel->builder()->where('id_rad', $id)
                ->get()->getResultArray()[0];
            $prijava_id = $prijava_id_upit['id'];
 
            $this->prijavaModel->update($prijava_id, $prijava);
 
            $komisija = [
                'id_rad' => $id,
                'id_pred_kom' => $rukRada,
                'id_clan_2' => $clan2,
                'id_clan_3' => $clan3,
            ];
            $komisija_id_upit = $this->komisijaModel->builder()->where('id_rad', $id)
                ->get()->getResultArray()[0];
            $komisija_id = $komisija_id_upit['id'];
 
            $this->komisijaModel->update($komisija_id, $komisija);
 
            $komentari = $this->request->getPost('komentari');
   
            $komentar = [
                'id_rad' => $id,
                'mentor_komentar' => $komentari,
                'ruk_komentar' => '',
                'st_sluz_komentar' => '',
            ];
            $this->komentariModel->insert($komentar);
 
            return redirect()->to('mentor/home')->with('message', 'Успешно ажурирана пријава');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function obrazlozenje()
    {
        $modul = $this->modulModel->findAll();
        $data['modul'] = $modul;
        $id_rad = $this->temaModel->builder()->select('id')->where('id_student', user_id())
            ->get()->getResultArray()[0];

        $testProvera = $this->obrazlozenjeModel->builder()->where('id_rad', $id_rad['id'])
            ->get()->getResultArray();
        $test = $testProvera ?? '';
        if ($test) {
            return redirect()->to('student/obrazlozenje_azuriraj');
        } else {
            return view('student/obrazlozenje', $data);
        }
    }

    public function obrazlozenje_sacuvaj()
    {
        if ($this->validate([
            'ime' => 'required|min_length[5]',
            'indeks' => 'required|min_length[5]',
            'modul' => 'required',
            'predmet' => 'required|min_length[5]',
            'oblast' => 'required|min_length[5]',
            'pcmm' => 'required|min_length[15]',
            'sorm' => 'required|min_length[15]',
        ])) {


            $query = $this->temaModel->builder()
                ->select('id')
                ->where('id_student', user_id())
                ->get();
            $id_rad = $query->getResultArray()[0];
            $modul_id = (int)$this->request->getPost('modul');

            $obrazlozenje = [
                'id_rad' => $id_rad['id'],
                'id_modul' => $modul_id,
                'predmet' => $this->request->getPost('predmet'),
                'autor' => 'student',
                'oblast_rada' => $this->request->getPost('oblast'),
                'predmet_cilj_metode' => $this->request->getPost('pcmm'),
                'sadrzaj_ocekivani_rezultat' => $this->request->getPost('sorm'),
            ];


            $this->obrazlozenjeModel->insert($obrazlozenje);

            return redirect()->to('student/home')->with('message', 'Успешно сачувано образложење');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function obrazlozenje_azuriraj($id_student)
    {

        $data['id_student'] = $id_student;


        $modul = $this->modulModel->findAll();
        $data['modul'] = $modul;

        // tema
        $temaUpit = $this->temaModel->builder()->where('id_student', $id_student)
            ->get()->getResultArray()[0];
        $data['tema'] = $temaUpit;

        //prijava
        $id_teme = $temaUpit['id'];
        $prijavaUpit = $this->prijavaModel->builder()->where('id_rad', $id_teme)
            ->get()->getResultArray()[0];
        $data['prijava'] = $prijavaUpit;

        //obrazlozenje
        $obrazlozenjeUpit = $this->obrazlozenjeModel->builder()->where('id_rad', $id_teme)
            ->get()->getResultArray()[0];
        $data['obrazlozenje'] = $obrazlozenjeUpit;
        return view('mentor/obrazlozenje_azuriraj', $data);
    }

    public function obrazlozenje_azuriraj_sacuvaj()
    {
        if ($this->validate([
            'ime' => 'required|min_length[5]',
            'indeks' => 'required|min_length[5]',
            'modul' => 'required',
            'predmet' => 'required|min_length[5]',
            'oblast' => 'required|min_length[5]',
            'pcmm' => 'required|min_length[15]',
            'sorm' => 'required|min_length[15]',
        ])) {
            $id_student = $this->request->getPost('id_student');

            $query = $this->temaModel->builder()
                ->select('id')
                ->where('id_student', $id_student)
                ->get();
            $id_rad = $query->getResultArray()[0];
            $modul_id = (int)$this->request->getPost('modul');

            $obrazlozenje = [
                'id_rad' => $id_rad['id'],
                'id_modul' => $modul_id,
                'predmet' => $this->request->getPost('predmet'),
                'autor' => 'student',
                'oblast_rada' => $this->request->getPost('oblast'),
                'predmet_cilj_metode' => $this->request->getPost('pcmm'),
                'sadrzaj_ocekivani_rezultat' => $this->request->getPost('sorm'),
            ];

            $tema_id = $this->request->getPost('tema_id');

            $tema_status = $this->temaModel->builder()->select('status')->where('id', $tema_id)->get()->getResultArray()[0];
            if ($tema_status['status'] != 0) {
                return redirect()->to('mentor/home')->with('message', 'Тема је прослеђена, не можете је ажурирати');
            }


            $obrazlozenje_id_upit = $this->obrazlozenjeModel->builder()->where('id_rad', $tema_id)->get()->getResultArray()[0];
            $obrazlozenje_id = $obrazlozenje_id_upit['id'];

            $this->obrazlozenjeModel->update($obrazlozenje_id, $obrazlozenje);

            $komentari = $this->request->getPost('komentari');
   
            $komentar = [
                'id_rad' => $id_rad['id'],
                'mentor_komentar' => $komentari,
                'ruk_komentar' => '',
                'st_sluz_komentar' => '',
            ];
            $this->komentariModel->insert($komentar, true);

            return redirect()->to('mentor/home')->with('message', 'Успешно ажурирано образложење');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function biografija()
    {
        $temaUpit = $this->temaModel->builder()->select('id')->where('id_student', user_id())->get()->getResultArray()[0];
        $testProvera = $this->bioModel->builder()->where('id_rad', $temaUpit['id'])->get()->getResultArray();

        $test = $testProvera ?? '';
        if ($test) {
            return redirect()->to('student/biografija_azuriraj');
        } else {
            return view('student/biografija');
        }
    }


    public function biografija_sacuvaj()
    {
        if ($this->validate([
            'tekst' => 'required|min_length[15]',
        ])) {

            $query = $this->temaModel->builder()
                ->select('id')
                ->where('id_student', user_id())
                ->get();
            $id_rad = $query->getResultArray()[0];
            $data = [
                'id_rad' => $id_rad['id'],
                'autor' => 'student',
                'tekst' => $this->request->getPost('tekst'),
            ];
            $this->bioModel->insert($data);
            return redirect()->to('student/home')->with('message', 'Успешно сачувана биографија');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function biografija_azuriraj($id_student)
    {
        // tema
        $temaUpit = $this->temaModel->builder()->where('id_student', $id_student)->get()->getResultArray()[0];
        $tema_id = $temaUpit['id'];
        $data['tema'] = $temaUpit;
 
        // biografija
        $biografijaUpit = $this->bioModel->builder()->where('id_rad', $tema_id)->get()->getResultArray()[0];
        $data['biografija'] = $biografijaUpit;
 
        $data['id_student'] = $id_student;
 
        return view('mentor/biografija_azuriraj', $data);
    }

    
    public function biografija_azuriraj_sacuvaj()
    {
        if ($this->validate([
            'tekst' => 'required|min_length[15]',
        ])) {
 
            $id_student = $this->request->getPost('id_student');
 
            $query = $this->temaModel->builder()
                ->select('id')
                ->where('id_student', $id_student)
                ->get();
            $idr = $query->getResultArray()[0];
            $id_rad = $idr['id'];
 
            $tema_status = $this->temaModel->builder()->select('status')->where('id', $id_rad)->get()->getResultArray()[0];
            if ($tema_status['status'] != 0) {
                return redirect()->to('mentor/home')->with('message', 'Тема је прослеђена, не можете је ажурирати');
            }
 
            $biografijaUpit = $this->bioModel->builder()->where('id_rad', $id_rad)->get()->getResultArray()[0];
 
            $data = [
                'id_rad' => $id_rad,
                'autor' => 'student',
                'tekst' => $this->request->getPost('tekst'),
            ];
 
            $this->bioModel->update($biografijaUpit['id'], $data);
 
            $komentari = $this->request->getPost('komentari');
   
            $komentar = [
                'id_rad' => $id_rad,
                'mentor_komentar' => $komentari,
                'ruk_komentar' => '',
                'st_sluz_komentar' => '',
            ];
            $this->komentariModel->insert($komentar);
 
            return redirect()->to('mentor/home')->with('message', 'Успешно ажурирана биографија');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function brisanje_teme()
    {
        // tema
        $temaUpit = $this->temaModel->builder()->where('id_student', user_id())
            ->get()->getResultArray()[0];
        $idt = $temaUpit['id'];
        $id_teme = $idt ?? '';

        if ($id_teme) {
            $this->temaModel->delete($id_teme);
            return redirect()->to('student/home')->with('message', 'Успешно обрисана тема');
        } else {
            return redirect()->to('student/home')->with('message', 'Немате пријављену тему');
        }
    }

    public function prosledi_rukovodiocu($id_student)
    {
        $rukRada = user_id();
        // tema
        $tema = [
            'id_student' => $id_student,
            'id_mentor' => $rukRada,
            'status' => '3',
            'deleted_at' => '',
        ];
        $temaUpit = $this->temaModel->builder()->where('id_student', $id_student)->get()->getResultArray()[0];
        $tema_id = $temaUpit['id'];
        $this->temaModel->update($tema_id, $tema);
        
        // prijava
        $prijavaUpit = $this->prijavaModel->builder()->where('id_rad', $tema_id)
            ->get()->getResultArray()[0];
        $idp = $prijavaUpit['id'];
        $prijava_id = $idp ?? '';

        // biografija
        $biografijaUpit = $this->bioModel->builder()->where('id_rad', $tema_id)->get()->getResultArray()[0];
        $idb = $biografijaUpit['id'];
        $biografija_id = $idb ?? '';

        if ($tema_id && $prijava_id && $biografija_id) {
            return redirect()->to('mentor/home')->with('message', 'Тема је прослеђена руководиоцу');
        } else {
            return redirect()->to('mentor/home')->with('message', 'Немате пријављену тему или нисте попунили сва документа');
        }
    }

    public function vrati_studentu($id_student)
    { 
        print_r($id_student);
        $rukRada = user_id();
        // tema
        $tema = [
            'id_student' => $id_student,
            'id_mentor' => $rukRada,
            'status' => '0',
            'deleted_at' => '',
        ];
        $temaUpit = $this->temaModel->builder()->where('id_student', $id_student)->get()->getResultArray()[0];
        if($temaUpit['status'] == 0){
          return redirect()->to('mentor/home')->with('message', 'Пријава је већ враћена студенту!');
        }else{
           $this->temaModel->update($temaUpit['id'], $tema);
           return redirect()->to('mentor/home')->with('message', 'Успешно враћена пријава студенту!');
        }
    }  
}



   