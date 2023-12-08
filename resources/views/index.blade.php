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
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="card">
            <div class="card-header">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">List Produk</h3>


                  <a href="" class="btn btn-sm btn-info pt-2"><i class="fas fa-plus "></i>
                    Bisa dijual</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="table-suppliers" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
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
                    <td>{{$produks['id_produk']}}</td>
                    <td>{{$produks['nama_produk']}}</td>
                    <td>{{$produks['harga']}}</td>
                    <td>{{$produks['kategori']}}</td>
                    <td>{{$produks['status']}}</td>
                    <td>
                      <a href="{{route('home-tambah')}}" class="btn btn-success float-left m-1">tambah</a>
                      <a href=" {{route('edit')}}" class="btn btn-warning float-left m-1">Edit</a>
                      <a href="{{route('hapus')}}" class="btn btn-danger float-left m-1">Hapus</a>
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
@endsection
