<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Penjualan;
use App\Barang;
use Validator;

class Jual extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = Penjualan::all();

      return view('Jual', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data = Barang::all();
      return view('jual_create', compact('data'));
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

          $data = new Penjualan();
          $data->barang = $request->barang;
          $data->jumlah = $request->jumlah;
          $data->total_harga = $request->total_harga;
          $data->save();

          $data1 = Barang::where('kd_barang', $request->barang)->first();
          $data1->stok = $data1->stok - $request->jumlah;
          $data1->save();

          return redirect()->route('beli.index')->with('alert_message', 'Berhasil menambah data!');

                return redirect()->route('jual.index')->with('alert_message', 'Berhasil menambah data!');
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
      $data = Penjualan::where('id', $id)->get();
      return view('Jual_edit', compact('data'));
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

      $data = Penjualan::where('id', $id)->first();
      $data->barang = $request->barang;
      $data->jumlah = $request->jumlah;
      $data->total_harga = $request->total_harga;

      $data->save();

            return redirect()->route('jual.index')->with('alert_message', 'Berhasil mengubah data!');
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
        $data = Penjualan::where('id', $id)->first();
        $data->delete();

        return redirect()->route('jual.index')->with('alert_message', 'Berhasil menghapus data!');
      }
    }
}
