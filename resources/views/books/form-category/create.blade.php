@section('title', 'Halaman Tambah Kategori')
@section('breadcumb-title', 'Buat Kategori')
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
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold"><i class="fas fa-file-alt"></i> Form Tambah Kategori</h3>
                </div>
                <form action="{{ route('category.store') }}" method="POST" role="form">
                    @csrf
                    <div class="card-body col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama Kategori</label>
                            <input type="text" class="form-control @error('nama')
                                is-invalid
                            @enderror" id="nama" name="nama"
                                placeholder="Masukan nama kategori misalkan: Fiksi atau Non Fiksi dll">
                                @error('nama')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea placeholder="Tulis deskripsi yang menggambar nama kategori" class="form-control @error('deskripsi')
                                is-invalid
                            @enderror" name="deskripsi"
                                id="deskripsi" cols="30" rows="4"></textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback">
                                   {{$message}}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group ">
                            <button type="reset" class="btn btn-warning"><i class="fas fa-sync-alt"></i> Reset</button>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
