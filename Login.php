<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loginAkun;
use Session;
use Validator;

class Login extends Controller

{
  public function index()
  {
    return view('login');
  }

  public function logout()
  {
    Session::flush();
    return redirect('login');
  }



  public function cek(Request $req)
  {
    $this->validate($req,[
      'usr'=>'required',
       'psw'=>'required'
    ]);

    $proses=loginAkun::where('username' ,$req->usr)->where('password' ,$req->psw)->first();
    if($proses){
      Session::put('id' ,$proses->id);
      Session::put('username' ,$proses->username);
      Session::put('password' ,$proses->password);
      Session::put('nama' ,$proses->nama);
      Session::put('hak_akses' ,$proses->hak_akses);
      Session::put('login_status',true);
      return redirect('/');
    } else {
      Session::flash('alert_pesan', 'Username dan password tidak cocok');
      return redirect('login');
    }
  }
}
