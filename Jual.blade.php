@extends('template')
@section('content')
<section class="main-section">
  <div class="content">
    <h1>Data Penjualan</h1>
    @if(Session::has('alert_message'))
    <div class="alert alert-success">
      <strong>{{ Session::get('alert_message') }}</strong>
    </div>
    @endif
    <hr>
    <div>
    <button class="btn-sm btn-warning"> <a href="{{url('/jual/create')}}">Create</a></button>
    <button class="btn-sm btn-warning"> <a href="{{url('/bara/')}}">Barang</a></button>
    <button class="btn-sm btn-warning"> <a href="{{url('/beli/')}}">Pembelian</a></button>
   </div>
    <table class="table table-bordered">
       <thead>
         <tr>
           <th>ID</th>
           <th>Barang</th>
           <th>Jumlah</th>
           <th>Total Harga</th>
           <th>Opsi</th>
         </tr>
       </thead>
       <tbody>
         @php $no = 1; @endphp
         @foreach($data as $datas)
         <tr>
           <td>{{ $no++ }}</td>
           <td>{{ $datas->barang }}</td>
           <td>{{ $datas->jumlah }}</td>
           <td>{{ $datas->total_harga }}</td>
           <td>
             <?php if (Session::get('hak_akses')=="admin") { ?>
              <form action="{{ route('jual.destroy', $datas->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <a href="{{ route('jual.edit',$datas->id) }}" class=" btn btn-sm btn-primary">Edit</a>
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
