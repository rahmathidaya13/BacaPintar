@section('title', 'Halaman Tambah Buku')
@section('breadcumb-title', 'Tambah Buku')
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
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold"> <i class="fas fa-file"></i> Form Tambah Buku</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('books.update', $buku->id_buku) }}" method="post" role="form"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id_buku" value="{{ $buku->id_buku }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select
                                        class="form-control @error('kategori')
                                        is-invalid
                                    @enderror"
                                        name="kategori" id="kategori">
                                        @foreach ($kategori as $key => $rows)
                                            <option value="{{ $rows->id_kategori }}"
                                                @if ($rows->id_kategori == $buku->id_kategori) @selected(true) @endif>
                                                {{ $key + 1 . '. ' . $rows->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="judul">Judul Buku</label>
                                    <input
                                        class="form-control @error('judul')
                                        is-invalid
                                    @enderror"
                                        type="text" name="judul" id="judul" value="{{ $buku->judul }}">
                                    @error('judul')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pengarang">Pengarang</label>
                                    <input
                                        class="form-control @error('pengarang')
                                        is-invalid
                                    @enderror"
                                        type="text" name="pengarang" id="pengarang" value="{{ $buku->pengarang }}">
                                    @error('pengarang')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="penerbit">Penerbit</label>
                                    <input
                                        class="form-control @error('penerbit')
                                        is-invalid
                                    @enderror"
                                        type="text" name="penerbit" id="penerbit" value="{{ $buku->penerbit }}">
                                    @error('penerbit')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="thunterbit">Tahun Terbit</label>
                                    <input
                                        class="form-control @error('thunterbit')
                                       is-invalid
                                   @enderror"
                                        type="date" name="thunterbit" id="thunterbit" value="{{ $buku->tahun_terbit }}">
                                    @error('thunterbit')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="harga">Harga Buku</label>
                                        <input
                                            class="form-control @error('harga')
                                            is-invalid
                                        @enderror"
                                            type="number" name="harga" id="harga">
                                        @error('harga')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="stok">Stok Buku</label>
                                    <input
                                        class="form-control @error('stok')
                                        is-invalid
                                    @enderror"
                                        type="number" name="stok" id="stok" value="{{ $buku->stok_buku }}">
                                    @error('stok')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <div class="mb-3">
                                        <img id="preview" class="img-fluid img-thumbnail"
                                            src="{{ asset('assets/image/' . $buku->photo) }}" alt="" width="100"
                                            height="100">
                                    </div>
                                    <input accept="image/*"
                                        class="form-control @error('photo')
                                        is-invalid
                                    @enderror"
                                        type="file" name="photo" id="photo">
                                    @error('photo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-warning"><i class="fas fa-sync-alt"></i> Reset</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i> Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
