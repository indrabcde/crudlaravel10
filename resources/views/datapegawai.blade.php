@extends('layout.admin')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pegawai</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div class="container">
    

<a href="/exportpdf" class="btn btn-warning mb-4">Export PDF</a>

<a href="/exportexcel" class="btn btn-success mb-4">Export Excel</a>

<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Import Data</button>




<br>
<a href="/tambahpegawai" class="btn btn-success">Tambah</a>
<!-- {{ Session::get('halaman_url')}} -->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="/importexcel" method="POST" enctype="multipart/form-data">
        @csrf
    
    <div class="modal-body">
        <div class="form-group">
            <input type="file" name="file" required>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
    </div>
    </form>
</div>
</div>

<div class="row">

<table class="table mt-2">
<thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">Nama</th>
    <th scope="col">Foto</th>
    <th scope="col">Jenis Kelamin</th>
    <th scope="col">No Telpon</th>
    <th scope="col">Tanggal Lahir</th>
    <th scope="col">Jabatan</th>
    <th scope="col">Dibuat</th>
    <th scope="col">Aksi</th>
    </tr>
</thead>
<tbody>
    @php
        $no = 1;
    @endphp
    @foreach ($data as $index => $row)
    <tr>
    <th scope="row">{{$index + $data->firstItem()}}</th>
    <td>{{ $row->nama }}</td>
    <td>
        <img src="{{ asset('fotopegawai/'.$row->foto) }}" alt="" style="width: 40px;">
    </td>
    <td>{{ $row->jeniskelamin }}</td>
    <td>{{ $row->notelpon }}</td>
    <td>{{ $row->tanggal_lahir}}</td>
    <td>{{ optional($row->religions)->nama }}</td>
    <td>{{ $row->created_at }}</td>
    <td>
        <a href="/tampilkandata/{{ $row->id }}" class="btn btn-info">Edit</a>
        <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">Delete</a>
    </td>
    </tr>
    @endforeach
</tbody>
</table>
{{ $data->links() }}
</div>
</div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <!-- </body> -->
  <script>

    $('.delete').click(function(){
        var pegawaiid = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');
        swal({
    title: "APAKAH ANDA YAKIN ?", 
    text: "ANDA AKAN MENGHAPUS DATA "+nama+" ?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {
        window.location = "/delete/"+pegawaiid+""
        swal("DATA BERHASIL DIHAPUS", {
        icon: "success",
        });
    } else {
        swal("HAPUS DATA BATAL.");
    }
    });
    });
       
  </script>

  <script>
    @if (Session::has('success'))
    toastr.success('{{ Session::get('success')}}')
    @endif
  </script>

@endpush