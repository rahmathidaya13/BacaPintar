@section('title', 'Halaman Buku')
@section('breadcumb-title', 'Kategori Buku')
@extends('template.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-info btn-sm" href="{{ route('category.create') }}"><i class="fas fa-plus-circle"></i>
                        Tambah Kategori</a>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->deskripsi }}</td>
                                    <td>
                                        <div class="btn-group dropleft">
                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <div class="dropdown-menu bg-light">
                                                <a class="dropdown-item"  href="#"><i class="fas fa-edit" ></i> Ubah</a>
                                                <a class="dropdown-item" href="#"><i class="fas fa-trash" ></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
