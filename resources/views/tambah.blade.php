@extends('layout.master')
@section('title','tambah')
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
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">

            </div><!-- /.col -->
            <div class="col-sm-6">
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit produk</h3>
            </div>
            <!-- /.card-header -->
            <form action="{{ route('tambah') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="title">produk</label>
                      <input type="text" name="produk" class="form-control @error('produk') is-invalid @enderror">
                      <small class="text-danger">@error('produk') {{$message}} @enderror</small>
                    </div>
                  </div>
                <div class="col-6">
                    <div class="form-group">
                      <label for="title">harga</label>
                      <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror">
                      <small class="text-danger">@error('harga') {{$message}} @enderror</small>
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-6 mt-3">
                        <div class="form-group">
                            <label for="title">id</label>
                            <input type="number" name="id" class="form-control @error('id') is-invalid @enderror" >
                            <small class="text-danger">@error('id') {{$message}} @enderror</small>
                          </div>

                        </div>
                        <div class="col-6 mt-3">
                            <div class="list-group">
                                <label for="title">status</label>
                                <input  onclick="btntersedia()" id="tersedia" class="btn list-group-item list-group-item-action" name="status" value="tersedia">
                                <input  onclick="tidaktersedia()" id="tidak_tersedia" class="btn list-group-item list-group-item-action" name="status" value="tidak tersedia">
                            </div>
                            </div>
                            <div class="col-6">
                                <label for="title">kategori</label>
                                    <input onclick="QUEENLY()" id="queenly" class="btn list-group-item list-group-item-action" name="kategori" value="L QUEENLY" value="L QUEENLY" name="kategori">
                                    <input onclick="AKSESORIS()" id="aksesoris" class="btn list-group-item list-group-item-action" name="kategori" value="L MTH AKSESORIS (IM)" value="L MTH AKSESORIS (IM)" name="kategori">
                                    <input onclick="TABUNG()" id="tabung" class="btn list-group-item list-group-item-action" name="kategori" value="L MTH TABUNG (LK)" value="L MTH TABUNG (LK)" name="kategori">
                                    <input onclick="SPAREPART()" id="sparepart"  class="btn list-group-item list-group-item-action" name="kategori" value="SP MTH SPAREPART (LK)" value="SP MTH SPAREPART (LK)" name="kategori">
                                    <input onclick="TINTA()" id="tinta" class="btn list-group-item list-group-item-action" name="kategori" value="CI MTH TINTA LAIN (IM)" value="CI MTH TINTA LAIN (IM)" name="kategori">
                                    <input onclick="STEMPEL()" id="stempel" class="btn list-group-item list-group-item-action" name="kategori" value="S MTH STEMPEL (IM)" value="S MTH STEMPEL (IM)" name="kategori">

                            </div>
                </div>

                  </div>
                </div>
              </div>
              <!-- /.row -->

              <div class="card-footer">
                <div class="d-flex justify-content-end">
                  <a href="{{route('home')}}" class="m-1 btn btn-outline-danger">Kembali</a>
                  <button type="submit" class="m-1 btn btn-success">Tambah</button>
                  @if(session('berhasil'))
                  <script>
                    alert("data berhasil ditambahkan");
                  </script>
                  @endif<!-- /.container-fluid -->
                </div>
              </div>
            </form>
          </div>
      </section>
</div>


<script>
    const ada = document.querySelector('#tersedia');
    const tidak_ada = document.querySelector('#tidak_tersedia');
    const queenly = document.querySelector('#queenly');
    const aksesoris = document.querySelector('#aksesoris');
    const tabung = document.querySelector('#tabung');
    const sparepart = document.querySelector('#sparepart');
    const tinta = document.querySelector('#tinta');
    const stempel = document.querySelector('#stempel');



    //fungsi kategori
    function QUEENLY() {
    queenly.classList.add('active');
    aksesoris.classList.remove('active');
    tabung.classList.remove('active');
    sparepart.classList.remove('active');
    tinta.classList.remove('active');
    stempel.classList.remove('active');
    }
    function AKSESORIS() {
    queenly.classList.remove('active');
    aksesoris.classList.add('active');
    tabung.classList.remove('active');
    sparepart.classList.remove('active');
    tinta.classList.remove('active');
    stempel.classList.remove('active');
    }
    function TABUNG() {
    queenly.classList.remove('active');
    aksesoris.classList.remove('active');
    tabung.classList.add('active');
    sparepart.classList.remove('active');
    tinta.classList.remove('active');
    stempel.classList.remove('active');
    }
    function SPAREPART() {
    queenly.classList.remove('active');
    aksesoris.classList.remove('active');
    tabung.classList.remove('active');
    sparepart.classList.add('active');
    tinta.classList.remove('active');
    stempel.classList.remove('active');
    }
    function TINTA() {
    queenly.classList.remove('active');
    aksesoris.classList.remove('active');
    tabung.classList.remove('active');
    sparepart.classList.remove('active');
    tinta.classList.add('active');
    stempel.classList.remove('active');
    }
    function STEMPEL() {
    queenly.classList.remove('active');
    aksesoris.classList.remove('active');
    tabung.classList.remove('active');
    sparepart.classList.remove('active');
    tinta.classList.remove('active');
    stempel.classList.add('active');
    }
    function btntersedia() {
    ada.classList.add('active');
    tidak_ada.classList.remove('active');
    }
    function tidaktersedia() {
    tidak_ada.classList.add('active');
    ada.classList.remove('active');
    }


    </script>
@endsection

