<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		if (in_groups('student')) {
			return view('student/home');
		}
		if (in_groups('mentor')) {
			return view('mentor/home');
		}
		if (in_groups('rukovodilac')) {
			return view('rukovodilac/home');
		}
		if (in_groups('studentska_sluzba
		')) {
			return view('stsluzba/home');
		}
		if (in_groups('komisija')) {
			return view('komisija/home');
		}
		return view('index');
	}
}