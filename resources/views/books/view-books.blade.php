@section('title', 'Halaman Buku')
@section('breadcumb-title', 'Daftar Buku')
@extends('template.index')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-info btn-sm" href="{{ route('books.create') }}"><i class="fas fa-plus-circle"></i> Tambah
                        buku</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Photo</th>
                                <th>Kategori</th>
                                <th>Judul</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Th.Terbit</th>
                                <th>Harga Sewa</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buku as $rows)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle"><img width="80" height="80" class="img-thumbnail" src="{{asset('assets/image/'.$rows->photo)}}" alt=""></td>
                                <td class="align-middle">{{ $rows->Kategori->nama }}</td>
                                <td class="align-middle">{{ $rows->judul }}</td>
                                <td class="align-middle">{{ $rows->pengarang }}</td>
                                <td class="align-middle">{{ $rows->penerbit }}</td>
                                <td class="align-middle">{{ $rows->tahun_terbit }}</td>
                                <td class="align-middle">{{ 'Rp. '.number_format($rows->harga,0, ',','.') }}</td>
                                <td class="align-middle">{{ $rows->stok_buku }}</td>
                                <td class="align-middle">
                                    <div class="btn-group dropleft">
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <div class="dropdown-menu bg-light">
                                            <a class="dropdown-item" href="{{route('books.edit', $rows->id_buku)}}"><i class="fas fa-edit" ></i> Ubah</a>
                                            <form method="POST" action="{{route('books.destroy', $rows->id_buku)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"><i class="fas fa-trash" ></i> Hapus</button>
                                            </form>
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
