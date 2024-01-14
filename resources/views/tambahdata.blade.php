@extends('layout.admin')

@section('content')

<body>
  <br>
    <h1 class="text-center mb-4 mt-5">Tambah Data Pegawai</h1>

        <div class="container">
            <div class="row justify-content-center">
              <div class="col-8">
              <div class="card">
                <div class="card-body">
                <form action="/insertdata" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                    <input type="text" name='nama' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                    <input type="date" name='tanggal_lahir' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name='jeniskelamin' aria-label="Default select example">
                      <option selected>Pilih Jenis Kelamin</option>
                      <option value="cowo">cowo</option>
                      <option value="cewe">cewe</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Jabatan</label>
                    <select class="form-select" name='id_religions' aria-label="Default select example">
                      <option selected>Pilih Jabatan</option>

                      @foreach ($dataagama as $data)
                        <option value="{{ $data->id }}">{{$data->nama}}</option>

                      @endforeach
                      <!-- <option value="cowo">cowo</option>
                      <option value="cewe">cewe</option> -->
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">No Telpon</label>
                    <input type="number" name='notelpon' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Masukkan Foto</label>
                    <input type="file" name='foto' class="form-control">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
              </div>
              </div>
              

            </div>
        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>


@endsection