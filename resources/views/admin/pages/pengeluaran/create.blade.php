@extends('admin.layouts.app')

@section('breadcrumb')
<a href="{{route('admin.pengeluaran.index')}}">Pengeluaran</a> /
<a href="{{route('admin.pengeluaran.create')}}">Tambah</a>
@endsection

@section('pages')
<h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Pengeluaran</h3> 
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
                    <h4 class="card-title">Input Pengeluaran</h4>
                    <form class="mt-3" action="{{route('admin.pengeluaran.store')}}" method="post">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <br>
                            <input type="text" class="form-control" id="nametext" aria-describedby="name"
                                placeholder="keterangan" name="keterangan">
                            <br>
                            <input type="date" class="form-control" id="nametext" aria-describedby="name"
                                placeholder="tanggal" name="tanggal">
                            <br>
                            <input type="number" class="form-control" id="nametext" aria-describedby="name"
                                placeholder="pengeluaran" name="pengeluaran">
                        </div>
                        <input class="btn btn-primary" type="submit" value="Tambah">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
