@extends('admin.layouts.app')

@section('breadcrumb')
<a href="{{route('admin.penyewa.index')}}">Penyewa</a>
@endsection

@section('pages')
<h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Penyewa</h3>
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
                    <a href="{{route('admin.penyewa.create')}}" class="btn btn-primary float-right"><i
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
                                                    aria-label="Position: activate to sort column ascending">Nama Penyewa
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="default_order"
                                                    rowspan="1" colspan="1" style="width: 92.3333px;"
                                                    aria-label="Office: activate to sort column ascending">No Telp</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="default_order"
                                                    rowspan="1" colspan="1" style="width: 32.3333px;"
                                                    aria-sort="descending"
                                                    aria-label="Age: activate to sort column ascending">Email</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="default_order"
                                                    rowspan="1" colspan="1" style="width: 32.3333px;"
                                                    aria-sort="descending"
                                                    aria-label="Age: activate to sort column ascending">Tgl Sewa</th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="default_order"
                                                    rowspan="1" colspan="1" style="width: 32.3333px;"
                                                    aria-sort="descending"
                                                    aria-label="Age: activate to sort column ascending">Konfirmasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data_penyewa as $key=>$data)
                                            <tr role="row" class="odd">
                                                <td>{{$key+1}}</td>
                                                <td>{{$data->nama_penyewa}}</td>
                                                <td>{{$data->no_telp}}</td>
                                                <td>{{$data->email_Penyewa }}</td>
                                                <td>{{$data->email_verified_at_Penyewa }}</td>
                                                <td>{{$data->tgl_sewa }}</td>
                                                <form action="{{ route('admin.pengeluaran.destroy', $data->id) }}"
                                                    method="post">
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
                                                <th rowspan="1" colspan="1">Nama Penyewa</th>
                                                <th rowspan="1" colspan="1">No Telp</th>
                                                <th rowspan="1" colspan="1">Email</th>
                                                <th rowspan="1" colspan="1">Tgl Sewa</th>
                                                <th rowspan="1" colspan="1">Konfirmasi</th>
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
</div>
@endsection
