@extends('layout.master')
@section('title','home')
@section('content')

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container-fluid">
          <img src="{{asset('img/fastprint.jpg')}}" class="img-fluid" alt="" width="60px" height="60px">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      @if ($message = Session::get('update'))
      <div id="alert" class="alert alert-success" role="alert">
       <strong>{{$message}}</strong>
      </div>
      <meta http-equiv=refresh content=2; url='{{route('home')}}'>
      @endif
      @if ($message = Session::get('success'))
      <div id="alert" class="alert alert-success" role="alert">
       <strong>{{$message}}</strong>
      </div>
      <meta http-equiv=refresh content=2; url='{{route('home')}}'>
      @endif

      @if ($message = Session::get('delete'))
      <div id="alert" class="alert alert-danger" role="alert">
       <strong>{{$message}}</strong>
      </div>
      <meta http-equiv=refresh content=2; url='{{route('home')}}'>
      @endif

      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="card">
            <div class="card-header">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">List Produk</h3>
                <form class="d-flex" action="{{route('cari')}}" method="GET">
                    <input class="form-control me-2" type="search" name="cari" placeholder="cari produk ...."  aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Pencarian</button>
                  </form>

                <div class="row">
                    <a href="{{route('dijual',['status'=>$status['status']])}}" class="btn col btn-sm btn-info me-3 text-white"><i class="fas fa-plus "></i>
                        Bisa dijual</a>
                        <a href="{{route('home-tambah')}}"  class="btn col btn-success pt-2">tambah</a>
                </div>

              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="table-suppliers" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>kategori</th>
                    <th>status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($produk as $produks)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$produks['id']}}</td>
                    <td>{{$produks['produk']}}</td>
                    <td>{{$produks['harga']}}</td>
                    <td>{{$produks['kategori']}}</td>
                    <td>{{$produks['status']}}</td>
                    <td>
                      <a href=" {{route('edit',["id"=> $produks['id']])}}" class="btn btn-warning float-left m-1">Edit</a>
                      <form action="{{route('hapus',["id"=>$produks['id']])}}" method="POST">
                        <button onclick="konfirmasi()" href="" class="btn konfirmasi btn-danger float-left m-1">Hapus</button>
                        @method('DELETE')
                        @csrf
                      </form>

                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
      </section>
</div>


<script>


window.setTimeout(function() {
    $("#alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 5000);


    function konfirmasi() {
        confirm('Apakah Anda ingin menghapus ?');
        e.preventDefault();

    }


</script>
@endsection

