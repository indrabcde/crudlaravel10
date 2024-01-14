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
            <h1 class="m-0">Data Jabatan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Jabatan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div class="container">
    




<br>
<a href="/tambahagama" class="btn btn-success">Tambah</a>
<!-- {{ Session::get('halaman_url')}} -->

<!-- Button trigger modal -->


<!-- Modal -->

<div class="row">

<table class="table mt-2">
<thead>
    <tr>
    <th scope="col">No</th>
    <th scope="col">Jabatan</th>
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
<
 <!-- </body> -->
@endpush