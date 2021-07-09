@extends('admin.layouts.app')

@section('breadcrumb')
<a href="{{route('admin.building.index')}}">Gedung</a>
@endsection

@section('pages')
<h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Gedung</h3>
@endsection

@section('content')

<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- basic table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('admin.building.create')}}" class="btn btn-primary float-right"><i
                            class="fas fa-plus"></i>
                        Tambah</a>
                    <br><br>
                    <h4 class="card-title">Zero Configuration</h4>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Gedung</th>
                                    <th>Deskripsi</th>
                                    <th>Harga Gedung</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($gedung as $key=>$data_gedung)
                                <tr role="row" class="odd">
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <div class="thumbnail">
                                            <img class="img-thumbnail" src="{{ asset($data_gedung->showImage()) }}"
                                                alt="">
                                        </div>
                                        <span class="text-muted">Publish :
                                            {{ $data_gedung->created_at }}</span>
                                    </td>
                                    <td>{{$data_gedung->nama_gedung}}</td>
                                    <td>{{$data_gedung->description}}</td>
                                    <td>{{$data_gedung->harga_sewa}}</td>
                                    <form action="{{ route('admin.building.destroy', $data_gedung->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <td>
                                            <center><button class="btn btn-danger"><i class="fas fa-delete"></i>
                                                    Hapus</button></center>
                                        </td>
                                    </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->
<footer class="footer text-center text-muted">
    All Rights Reserved by Adminmart. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->

@endsection
