<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ModelKontak;
use Validator;

class Kontak extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
       $this->middleware('cek_login');
     }

    public function index()
    {
      $data = modelKontak::all();

      return view('kontak', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kontak_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'nama' => 'required',
          'email' => 'required',
          'nohp' => 'required',
          'alamat' => 'required',
        ]);

        $data = new modelKontak();
        $data->nama = $request->nama;
          $data->email = $request->email;
            $data->nohp = $request->nohp;
              $data->alamat = $request->alamat;
              $data->save();

              return redirect()->route('kontak.index')->with('alert_message', 'Berhasil menambah data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = modelKontak::where('id', $id)->get();
        return view('kontak_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'nama' => 'required',
        'email' => 'required',
        'nohp' => 'required',
        'alamat' => 'required',
      ]);

      $data = modelKontak::where('id', $id)->first();
      $data->nama = $request->nama;
        $data->email = $request->email;
          $data->nohp = $request->nohp;
            $data->alamat = $request->alamat;
            $data->save();

            return redirect()->route('kontak.index')->with('alert_message', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = modelKontak::where('id', $id)->first();
        $data->delete();

        return redirect()->route('kontak.index')->with('alert_message', 'Berhasil menghapus data!');
    }
}
