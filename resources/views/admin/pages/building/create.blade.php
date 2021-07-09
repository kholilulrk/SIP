@extends('admin.layouts.app')

@section('breadcrumb')
<a href="{{route('admin.building.index')}}">Gedung</a> /
<a href="{{route('admin.building.create')}}">Tambah</a>
@endsection

@section('pages')
<h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Gedung</h3> 
@endsection

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-12">
            <div class="card">
                @if (Session::has('status'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ session('status') }} - </strong>{{ session('message') }}
                    </div>
                @endif
                <div class="card-body">
                    <h4 class="card-title">Input Gedung</h4>
                    <form class="mt-3" action="{{route('admin.building.store')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <br>
                            <input type="text" class="form-control" id="nametext" aria-describedby="name"
                                placeholder="Nama Gedung" name="nama_gedung" required>
                            <br>
                            <input type="text" class="form-control" id="nametext" aria-describedby="name"
                                placeholder="Deskripsi" name="description" required>
                            <br>
                            {{-- <div class="form-group">
                                <label class="col-form-label" for="editor">Deskripsi</label>
                                <div class="controls">
                                    <div id="editor"></div>
                                    <input type="hidden" name="description">
                                </div>
                            </div> --}}
                            <input type="number" class="form-control" id="nametext" aria-describedby="name"
                                placeholder="Harga Sewa" name="harga_sewa" required>
                            <br>
                            <div class="form-group">
                                <label class="col-form-label" for="img-container">Image</label>
                                <div class="controls">
                                    <img class="img-fluid" id="img-container" alt="Gambar Gedung" width="100" height="100"
                                        src="{{ asset('admin/assets/images/img3.jpg') }}" />
                                    <input type="file"
                                        onchange="document.getElementById('img-container').src = window.URL.createObjectURL(this.files[0])"
                                        name="icon" required>
                                </div>
                            </div>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Tambah">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

