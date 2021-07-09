@extends('admin.layouts.app')

@section('breadcrumb')
<a href="{{route('admin.pemasukan.index')}}">Pemasukan</a>
@endsection

@section('pages')
<h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Pemasukan</h3>
@endsection

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if (Session::has('status'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ session('status') }} - </strong>{{ session('message') }}
                    </div>
                @endif
                <div class="card-body">
                    <a href="{{route('admin.pemasukan.create')}}" class="btn btn-primary float-right"><i
                            class="fas fa-plus"></i>
                        Tambah</a>
                    <br><br>
                    <div class="table-responsive">
                        <div id="default_order_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="default_order"
                                        class="table table-striped table-bordered display no-wrap dataTable"
                                        style="width: 100%;" role="grid" aria-describedby="default_order_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="default_order"
                                                    rowspan="1" colspan="1" style="width: 130.333px;"
                                                    aria-label="Name: activate to sort column ascending">No</th>
                                                <th class="sorting" tabindex="0" aria-controls="default_order"
                                                    rowspan="1" colspan="1" style="width: 196.333px;"
                                                    aria-label="Position: activate to sort column ascending">Keterangan
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="default_order"
                                                    rowspan="1" colspan="1" style="width: 92.3333px;"
                                                    aria-label="Office: activate to sort column ascending">Tanggal</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="default_order"
                                                    rowspan="1" colspan="1" style="width: 32.3333px;"
                                                    aria-sort="descending"
                                                    aria-label="Age: activate to sort column ascending">Pengeluaran</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="default_order"
                                                    rowspan="1" colspan="1" style="width: 32.3333px;"
                                                    aria-sort="descending"
                                                    aria-label="Age: activate to sort column ascending">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data_pemasukan as $key=>$data)
                                            <tr role="row" class="odd">
                                                <td>{{$key+1}}</td>
                                                <td>{{$data->keterangan}}</td>
                                                <td>{{$data->tanggal}}</td>
                                                <td>{{$data->pemasukan}}</td>
                                                <form action="{{ route('admin.pemasukan.destroy', $data->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                    <td>
                                                        <center><button class="btn btn-danger"><i
                                                                    class="fas fa-delete"></i>
                                                                Hapus</button></center>
                                                    </td>
                                                </form>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">No</th>
                                                <th rowspan="1" colspan="1">Keterangan</th>
                                                <th rowspan="1" colspan="1">Tanggal</th>
                                                <th rowspan="1" colspan="1">Pengeluaran</th>
                                                <th rowspan="1" colspan="1">Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Cetak Pengeluaran</h4>
                    <form class="mt-3">
                        <div class="form-group">
                            <br>
                            <div class="col-md-12S">
                                <input type="date" class="form-control" id="nametext" aria-describedby="name"
                                    placeholder="keterangan" name="tanggal">
                            </div>
                            <br>
                            <button type="button" class="btn waves-effect waves-light btn-rounded btn-info">PDF</button>
                            <button type="button"
                                class="btn waves-effect waves-light btn-rounded btn-info">Excel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
