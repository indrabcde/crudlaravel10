@extends('layout.admin')

@section('content')

<body>
  <br>
    <h1 class="text-center mb-4 mt-5">Data Jabatan</h1>

        <div class="container">
            <div class="row justify-content-center">
              <div class="col-8">
              <div class="card">
                <div class="card-body">
                <form action="/insertdatareligion" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Jabatan</label>
                    <input type="text" name='nama' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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