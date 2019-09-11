<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembelian;
use App\Barang;
use Validator;
class Beli extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = Pembelian::all();

      return view('Beli', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data = Barang::all();
      return view('beli_create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      {
          $this->validate($request, [
            'barang' => 'required',
            'jumlah' => 'required',
            'total_harga' => 'required',

          ]);
         //ini yang menambah data pembelian
          $data = new Pembelian();
          $data->barang = $request->barang;
          $data->jumlah = $request->jumlah;
          $data->total_harga = $request->total_harga;
          $data->save();

          $data1 = Barang::where('kd_barang', $request->barang)->first();
          $data1->stok = $data1->stok + $request->jumlah;
          $data1->save();

          return redirect()->route('beli.index')->with('alert_message', 'Berhasil menambah data!');
      }

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
      $data = Pembelian::where('id', $id)->get();
      return view('Beli_edit', compact('data'));
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
        'barang' => 'required',
        'jumlah' => 'required',
        'total_harga' => 'required',
      ]);

      $data = Pembelian::where('id', $id)->first();
      $data->barang = $request->barang;
      $data->jumlah = $request->jumlah;
      $data->total_harga = $request->total_harga;

      $data->save();

            return redirect()->route('beli.index')->with('alert_message', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      {
        $data = Pembelian::where('id', $id)->first();
        $data->delete();

        return redirect()->route('beli.index')->with('alert_message', 'Berhasil menghapus data!');
      }
    }
}
