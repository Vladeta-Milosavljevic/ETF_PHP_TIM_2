<?php

namespace App\Controllers;

use App\Models\BiografijaModel;
use App\Models\KomisijaModel;
use App\Models\ModulModel;
use App\Models\ObrazlozenjeTemeModel;
use App\Models\PrijavaModel;
use App\Models\StatusPrijaveModel;
use App\Models\TemaModel;
use App\Models\UsersModel;
use App\Models\KomentariModel;

class Student extends BaseController
{
    protected $user;
    protected $temaModel;
    protected $prijavaModel;
    protected $obrazlozenjeModel;
    protected $komisijaModel;
    protected $modulModel;
    protected $bioModel;
    protected $komentariModel;
    protected $statusPrijaveModel;

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
        $this->statusPrijaveModel = new StatusPrijaveModel();
    }

    public function home()
    {
        $upit = $this->temaModel->builder()->select('status')->where('id_student', user_id())->get()->getResultArray();
        $tema = $upit[0] ?? '';
        $tema_status = $tema['status'] ?? '';
        $status = '';

        if ($tema || $tema_status !== 0) {
            $upit1 = $this->statusPrijaveModel->builder()->where('id', $tema_status)->get()->getResultArray();
            $status = $upit1[0] ?? '';
        }
        $data['status'] = $status;
        return view('student/home', $data);
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
                return redirect()->back()->withInput()->with('message', 'Не можете више пута одабрати истог професора');
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

    public function prijava_azuriraj()
    {
        $query = $this->user->builder()
            ->select('id, username')
            ->join('auth_groups_users', 'auth_groups_users.user_id=users.id')
            ->where('group_id', 200)
            ->orderBy('username')
            ->get();
        $data['mentor'] = $query->getResultArray();

        // tema
        $temaUpit = $this->temaModel->builder()->where('id_student', user_id())
            ->get()->getResultArray()[0];
        $data['tema'] = $temaUpit;


        // prijava
        $id_teme = $temaUpit['id'];
        $prijavaUpit = $this->prijavaModel->builder()->where('id_rad', $id_teme)
            ->where('autor', 'student')->get()->getResultArray()[0];
        $data['prijava'] = $prijavaUpit;


        // komisija
        $komisijaUpit = $this->komisijaModel->builder()->where('id_rad', $id_teme)
            ->get()->getResultArray()[0];
        $data['komisija'] = $komisijaUpit;

        $komentariUpit = $this->komentariModel->builder()->where('id_rad', $id_teme)->get()->getResultArray();
        $komentari = '';

        foreach ($komentariUpit as $komentar) {
            if ($komentar['mentor_komentar'] != '') {
                $komentari .= 'Komentar mentora: ';
                $komentari .= $komentar['mentor_komentar'];
                $komentari .= ".\r\n";
            }
            if ($komentar['ruk_komentar'] != '') {
                $komentari .= 'Komentar rukovodioca: ';
                $komentari .= $komentar['ruk_komentar'];
                $komentari .= ".\r\n";
            }
            if ($komentar['st_sluz_komentar'] != '') {
                $komentari .= 'Komentar sluzbe: ';
                $komentari .= $komentar['st_sluz_komentar'];
                $komentari .= ".\r\n";
            }
        }
        $data['prethodni_komentari'] = $komentari;

        return view('student/prijava_azuriraj', $data);
    }

    public function prijava_azuriraj_sacuvaj()
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
                return redirect()->back()->withInput()->with('message', 'Не можете више пута одабрати истог професора');
            }

            $tema = [
                'id_student' => user_id(),
                'id_mentor' => $rukRada,
                'id_modul' => '',
                'status' => '',
                'deleted_at' => '',
            ];
            $tema_id = $this->request->getPost('tema_id');

            $tema_status = $this->temaModel->builder()->select('status')->where('id', $tema_id)->get()->getResultArray()[0]['status'];
            if ($tema_status !== '0') {
                return redirect()->to('student/home')->with('message', 'Тема је прослеђена, не можете је ажурирати');
            }


            $this->temaModel->update($tema_id, $tema);
            $id = $tema_id;
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

            return redirect()->to('student/home')->with('message', 'Успешно ажурирана пријава');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function obrazlozenje()
    {
        $modul = $this->modulModel->findAll();
        $data['modul'] = $modul;
        $id_rad = $this->temaModel->builder()->select('id')->where('id_student', user_id())
            ->get()->getResultArray();
        $test = $id_rad[0] ?? '';
        if (!$test) {
            return redirect()->to('student/home')->with('message', 'Морате прво да попуните пријаву');
        }
        $testProvera = $this->obrazlozenjeModel->builder()->where('id_rad', $id_rad[0]['id'])
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

    public function obrazlozenje_azuriraj()
    {
        $modul = $this->modulModel->findAll();
        $data['modul'] = $modul;

        // tema
        $temaUpit = $this->temaModel->builder()->where('id_student', user_id())
            ->get()->getResultArray()[0];
        $data['tema'] = $temaUpit;

        //prijava
        $id_teme = $temaUpit['id'];
        $prijavaUpit = $this->prijavaModel->builder()->where('id_rad', $id_teme)
            ->where('autor', 'student')->get()->getResultArray()[0];
        $data['prijava'] = $prijavaUpit;

        //obrazlozenje
        $obrazlozenjeUpit = $this->obrazlozenjeModel->builder()->where('id_rad', $id_teme)
            ->where('autor', 'student')->get()->getResultArray()[0];
        $data['obrazlozenje'] = $obrazlozenjeUpit;
        return view('student/obrazlozenje_azuriraj', $data);
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

            $tema_id = $this->request->getPost('tema_id');

            $tema_status = $this->temaModel->builder()->select('status')->where('id', $tema_id)->get()->getResultArray()[0]['status'];
            if ($tema_status !== '0') {
                return redirect()->to('student/home')->with('message', 'Тема је прослеђена, не можете је ажурирати');
            }


            $obrazlozenje_id_upit = $this->obrazlozenjeModel->builder()->where('id_rad', $tema_id)->get()->getResultArray()[0];
            $obrazlozenje_id = $obrazlozenje_id_upit['id'];

            $this->obrazlozenjeModel->update($obrazlozenje_id, $obrazlozenje);

            return redirect()->to('student/home')->with('message', 'Успешно ажурирано образложење');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function biografija()
    {
        $temaUpit = $this->temaModel->builder()->select('id')->where('id_student', user_id())->get()->getResultArray();

        $test = $temaUpit[0] ?? '';
        if (!$test) {
            return redirect()->to('student/home')->with('message', 'Морате прво да попуните пријаву');
        }

        $testProvera = $this->bioModel->builder()->where('id_rad', $temaUpit[0]['id'])->get()->getResultArray();

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

    public function biografija_azuriraj()
    {
        // tema
        $temaUpit = $this->temaModel->builder()->where('id_student', user_id())->get()->getResultArray()[0];
        $tema_id = $temaUpit['id'];
        $data['tema'] = $temaUpit;

        // biografija
        $biografijaUpit = $this->bioModel->builder()->where('id_rad', $tema_id)
            ->where('autor', 'student')->get()->getResultArray()[0];
        $data['biografija'] = $biografijaUpit;
        return view('student/biografija_azuriraj', $data);
    }
    public function biografija_azuriraj_sacuvaj()
    {
        if ($this->validate([
            'tekst' => 'required|min_length[15]',
        ])) {

            $query = $this->temaModel->builder()
                ->select('id')
                ->where('id_student', user_id())
                ->get();
            $idr = $query->getResultArray()[0];
            $id_rad = $idr['id'];
            $obrazlozenjeUpit = $this->bioModel->builder()->where('id_rad', $id_rad)->get()->getResultArray()[0];
            $obrazlozenje_id = $obrazlozenjeUpit['id'];

            $tema_status = $this->temaModel->builder()->select('status')->where('id', $id_rad)->get()->getResultArray()[0];
            if ($tema_status['status'] !== '0') {
                return redirect()->to('student/home')->with('message', 'Тема је прослеђена, не можете је ажурирати');
            }

            $data = [
                'id_rad' => $id_rad,
                'autor' => 'student',
                'tekst' => $this->request->getPost('tekst'),
            ];
            $this->bioModel->update($obrazlozenje_id, $data);
            return redirect()->to('student/home')->with('message', 'Успешно ажурирана биографија');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function brisanje_teme()
    {
        // tema
        $temaUpit = $this->temaModel->builder()->where('id_student', user_id())
            ->get()->getResultArray();
        $id_teme = $temaUpit[0]['id'] ?? '';

        if ($id_teme) {
            $this->temaModel->delete($id_teme);
            return redirect()->to('student/home')->with('message', 'Успешно обрисана тема');
        } else {
            return redirect()->to('student/home')->with('message', 'Немате пријављену тему');
        }
    }

    public function prosledi_mentoru()
    {
        // tema
        $temaUpit = $this->temaModel->builder()->where('id_student', user_id())
            ->get()->getResultArray();
        $tema_id = $temaUpit[0]['id'] ?? '';

        if (!$tema_id) {
            return redirect()->to('student/home')->with('message', 'Немате пријављену тему');
        }
        $tema_status = $temaUpit[0]['status'] - 0;

        if ($tema_status !== 0) {
            return redirect()->to('student/home')->with('message', 'Тема је већ прослеђена');
        }

        // prijava
        $prijavaUpit = $this->prijavaModel->builder()->where('id_rad', $tema_id)
            ->where('autor', 'student')->get()->getResultArray()[0];
        $idp = $prijavaUpit['id'];
        $prijava_id = $idp ?? '';


        // biografija
        $biografijaUpit = $this->bioModel->builder()->where('id_rad', $tema_id)->get()->getResultArray();
        $biografija_id = $biografijaUpit[0]['id'] ?? '';


        $data['status'] = 1;
        if ($tema_id && $prijava_id && $biografija_id) {
            $this->temaModel->update($tema_id, $data);
            return redirect()->to('student/home')->with('message', 'Тема је прослеђена ментору');
        } else {
            return redirect()->to('student/home')->with('message', 'Нисте попунили сва документа');
        }
    }

    public function prijava_verzije()
    {
        $query = $this->user->builder()
            ->select('id, username')
            ->join('auth_groups_users', 'auth_groups_users.user_id=users.id')
            ->where('group_id', 200)
            ->orderBy('username')
            ->get();
        $data['mentor_ime'] = $query->getResultArray();

        // tema
        $temaUpit = $this->temaModel->builder()->where('id_student', user_id())
            ->get()->getResultArray();
        $tema_id = $temaUpit[0]['id'] ?? '';
        $data['tema'] = $temaUpit[0];
        if (!$tema_id) {
            return redirect()->to('student/home')->with('message', 'Тема није пријављена или није прослеђена');
        }

        // prijava upit za sve verzije
        $prijavaUpit = $this->prijavaModel->builder()->where('id_rad', $tema_id)
            ->get()->getResultArray();

        // komisija
        $komisijaUpit = $this->komisijaModel->builder()->where('id_rad', $tema_id)
            ->get()->getResultArray()[0];
        $data['komisija'] = $komisijaUpit;


        // prosledjivanje podataka
        foreach ($prijavaUpit as $priU) {
            $data[$priU['autor']] = $priU;
        }


        return view('student/prijava_verzije', $data);
    }

    public function obrazlozenje_verzije()
    {
        $modul = $this->modulModel->findAll();
        $data['modul'] = $modul;

        // tema
        $temaUpit = $this->temaModel->builder()->where('id_student', user_id())
            ->get()->getResultArray();
        $tema_id = $temaUpit[0]['id'] ?? '';
        $data['tema'] = $temaUpit[0];
        if (!$tema_id) {
            return redirect()->to('student/home')->with('message', 'Тема није пријављена  или није прослеђена');
        }

        // prijava upit za sve verzije
        $prijavaUpit = $this->prijavaModel->builder()->where('id_rad', $tema_id)
            ->get()->getResultArray();


        // prosledjivanje podataka 
        foreach ($prijavaUpit as $priU) {
            $data[$priU['autor'] . '_prijava'] = $priU;
        }

        //obrazlozenje
        $obrazlozenjeUpit = $this->obrazlozenjeModel->builder()->where('id_rad', $tema_id)
            ->get()->getResultArray();

        // prosledjivanje podataka
        foreach ($obrazlozenjeUpit as $obrU) {
            $data[$obrU['autor']] = $obrU;
        }

        return view('student/obrazlozenje_verzije', $data);
    }

    public function biografija_verzije()
    {
        // tema
        $temaUpit = $this->temaModel->builder()->where('id_student', user_id())->get()->getResultArray();
        $tema_id = $temaUpit[0]['id'] ?? '';
        $data['tema'] = $temaUpit[0];
        if (!$tema_id) {
            return redirect()->to('student/home')->with('message', 'Тема није пријављена  или није прослеђена');
        }
        // biografija
        $biografijaUpit = $this->bioModel->builder()->where('id_rad', $tema_id)
            ->get()->getResultArray();

        // prosledjivanje podataka
        foreach ($biografijaUpit as $bioU) {
            $data[$bioU['autor']] = $bioU;
        }

        return view('student/biografija_verzije', $data);
    }
    public function pdf_prijava()
    {

        // tema
        $temaUpit = $this->temaModel->builder()->where('id_student', user_id())
            ->get()->getResultArray();
        $temaProvera = $temaUpit[0] ?? '';
        if (!$temaProvera) {
            return redirect()->to('student/home')->with('message', 'Тема није сачувана');
        }
        $data['tema'] = $temaUpit[0];


        // prijava
        $id_teme = $temaUpit[0]['id'];
        $prijavaUpit = $this->prijavaModel->builder()->where('id_rad', $id_teme)
            ->where('autor', 'student')->get()->getResultArray();
        $data['prijava'] = $prijavaUpit[0];


        // komisija
        $komisijaUpit = $this->komisijaModel->builder()->where('id_rad', $id_teme)
            ->get()->getResultArray()[0];
        $data['komisija'] = $komisijaUpit;



        $mentorUpit = $this->user->builder()
            ->select('username')
            ->where('id', $komisijaUpit['id_pred_kom'])
            ->get()->getResultArray()[0];
        $data['mentor'] = $mentorUpit;

        $clan2 = $this->user->builder()
            ->select('username')
            ->where('id', $komisijaUpit['id_clan_2'])
            ->get()->getResultArray()[0];
        $data['clan2'] = $clan2;

        $clan3 = $this->user->builder()
            ->select('username')
            ->where('id', $komisijaUpit['id_clan_3'])
            ->get()->getResultArray()[0];
        $data['clan3'] = $clan3;

        return view('student/pdf_prijava', $data);
    }

    public function pdf_obrazlozenje()
    {

        // tema
        $temaUpit = $this->temaModel->builder()->where('id_student', user_id())
            ->get()->getResultArray();
        $temaProvera = $temaUpit[0] ?? '';
        if (!$temaProvera) {
            return redirect()->to('student/home')->with('message', 'Тема није сачувана');
        }
        $data['tema'] = $temaUpit[0];

        //prijava
        $id_teme = $temaUpit[0]['id'];
        $prijavaUpit = $this->prijavaModel->builder()->where('id_rad', $id_teme)
            ->where('autor', 'student')->get()->getResultArray()[0];
        $data['prijava'] = $prijavaUpit;

        //obrazlozenje
        $obrazlozenjeUpit = $this->obrazlozenjeModel->builder()->where('id_rad', $id_teme)
            ->where('autor', 'student')->get()->getResultArray();
        $obrazlozenjeProvera = $obrazlozenjeUpit[0] ?? '';
        if (!$obrazlozenjeProvera) {
            return redirect()->to('student/home')->with('message', 'Образложење није сачувано');
        }


        $data['obrazlozenje'] = $obrazlozenjeUpit[0];

        $modul = $this->modulModel->builder()->select('naziv')->where('id', $obrazlozenjeUpit[0]['id_modul'])->get()->getResultArray()[0];
        $data['modul'] = $modul;

        return view('student/pdf_obrazlozenje', $data);
    }
    public function pdf_biografija()
    {
        // tema
        $temaUpit = $this->temaModel->builder()->where('id_student', user_id())->get()->getResultArray();
        $temaProvera = $temaUpit[0] ?? '';
        if (!$temaProvera) {
            return redirect()->to('student/home')->with('message', 'Тема није сачувана');
        }
        $data['tema'] = $temaUpit[0];
        $data['tema'] = $temaUpit;

        // biografija
        $biografijaUpit = $this->bioModel->builder()->where('id_rad', $temaUpit[0]['id'])
            ->where('autor', 'student')->get()->getResultArray();
        $biografijaProvera = $biografijaUpit[0] ?? '';
        if (!$biografijaProvera) {
            return redirect()->to('student/home')->with('message', 'Образложење није сачувано');
        }

        $data['biografija'] = $biografijaUpit[0];

        return view('student/pdf_biografija', $data);
    }
}