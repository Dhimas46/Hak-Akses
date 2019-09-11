@extends('template')
@section('content')
<section class="main-section">
  <div class="content">
    <h1>Data Barang</h1>
    @if(Session::has('alert_message'))
    <div class="alert alert-success">
      <strong>{{ Session::get('alert_message') }}</strong>
    </div>
    @endif
    <hr>
    <div>

    <button class="btn-sm btn-warning"> <a href="{{url('/bara/create')}}">Create</a></button>
    <button class="btn-sm btn-warning"> <a href="{{url('/beli')}}">Pembelian</a></button>
    <button class="btn-sm btn-warning"> <a href="{{url('/jual')}}">Penjualan</a></button>
   </div>
    <table class="table table-bordered">
       <thead>
         <tr>
           <th>ID</th>
           <th>Kode Barang</th>
           <th>Nama Barang</th>
           <th>Stok</th>
           <th>Harga</th>
           <th>Opsi</th>
         </tr>
       </thead>
       <tbody>
         @php $no = 1; @endphp
         @foreach($data as $datas)
         <tr>
           <td>{{ $no++ }}</td>
           <td>{{ $datas->kd_barang }}</td>
           <td>{{ $datas->nama_barang }}</td>
           <td>{{ $datas->stok }}</td>
           <td>{{ $datas->harga }}</td>
           <td>
             <?php if (Session::get('hak_akses')=="admin") { ?>
              <form action="{{ route('bara.destroy', $datas->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <a href="{{ route('bara.edit',$datas->id) }}" class=" btn btn-sm btn-primary">Edit</a>
                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin
                            menghapus data?')">Delete</button>
              </form>
              <?php } ?>
           </td>
         </tr>
         @endforeach
       </tbody>
    </table>

    <footer class="sticky-footer bg-white">

          <span>

          <button class=""> <a href="{{url('/logout')}}">Sign Out</span> </button>


    </footer>


  </div>

</section>

@endsection
