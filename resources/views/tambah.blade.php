@extends('layout.master')
@section('title','tambah')
@section('content')
<div class="container">
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
              <h3 class="card-title">Tambah produk</h3>
            </div>
            <!-- /.card-header -->
            <form action="{{ route('tambah') }}" method="POST" enctype="multipart/form-data">
              @CSRF
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="title">produk</label>
                      <input type="text" name="produk" class="form-control @error('produk') is-invalid @enderror" placeholder="Masukkan produk">
                      <small class="text-danger">@error('produk') {{$message}} @enderror</small>
                    </div>
                  </div>

                <div class="col-6">
                    <div class="form-group">
                      <label for="title">harga</label>
                      <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="Masukkan harga">
                      <small class="text-danger">@error('harga') {{$message}} @enderror</small>
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-6 mt-3">
                        <div class="list-group">
                            <label for="title">kategori</label>
                            <div class="btn btn1 list-group-item list-group-item-action">cat</div>
                            <div class="btn btn2 list-group-item list-group-item-action">tinta</div>
                           <small class="text-danger">@error('kategori') {{$message}} @enderror</small>
                        </div>
                        </div>
                        <div class="col-6 mt-3">
                            <div class="list-group">
                                <label for="title">status</label>
                                <div class="btn list-group-item list-group-item-action">tersedia</div>
                                <div class="btn list-group-item list-group-item-action">tidak tersedia</div>
                               <small class="text-danger">@error('kategori') {{$message}} @enderror</small>
                            </div>
                            </div>
                </div>

                  </div>
                </div>
              </div>
              <!-- /.row -->

              <div class="card-footer">
                <div class="d-flex justify-content-end">
                  <a href="" class="m-1 btn btn-outline-danger">Kembali</a>
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

@section('js')


document.addEventListener('click', function handleClick(event) {
    event.target.classList.add('bg-yellow');
  });

@endsection
