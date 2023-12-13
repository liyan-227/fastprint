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
                                <select name="status_id" id="" class="form-select" aria-label="Default select example">
                                    @foreach ($status as $status)
                                    @if ($status->id==1)
                                    <option selected></option>
                                    @endif
                                    <option value="{{$status->id}}">{{$status->status}}</option>
                                    @endforeach
                                  </select>
                            </div>
                            </div>
                            <div class="col-6">
                                <label for="title">kategori</label>
                              <select name="kategori_id" id="" class="form-select" aria-label="Default select example">
                                @foreach ($kategori as $kategori)
                                @if ($kategori->id==1)
                                    <option selected></option>
                                    @endif
                                <option value="{{$kategori->id}}">{{$kategori->kategori}}</option>
                                @endforeach
                              </select>
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


@endsection

