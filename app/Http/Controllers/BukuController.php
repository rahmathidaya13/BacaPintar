<?php

namespace App\Http\Controllers;


use App\Models\BukuModel;
use Illuminate\Http\Request;
use App\Models\KategoriModel;
use Intervention\Image\Image;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = BukuModel::all();
        return view('books.view-books', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = KategoriModel::all();
        return view('books.form-books.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048', // validasi untuk photo
            'kategori' => 'required', // validasi untuk kategori
            'judul' => 'required|string|max:255', // validasi untuk judul
            'pengarang' => 'required|string|max:255', // validasi untuk pengarang
            'penerbit' => 'required|string|max:255', // validasi untuk penerbit
            'thunterbit' => 'required|date', // validasi untuk tahun terbit sebagai tanggal
            'stok' => 'required|integer|min:0', // validasi untuk stok buku
            'harga' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/', // validasi untuk harga buku
        ], [
            'photo.image' => 'Foto harus berupa gambar',
            'photo.mimes' => 'Foto harus berformat: jpeg, png, jpg, atau gif',
            'photo.max' => 'Ukuran foto tidak boleh lebih dari 2048 kilobyte',
            'kategori.required' => 'Kategori wajib diisi',
            'kategori.exists' => 'Kategori yang dipilih tidak valid',
            'judul.required' => 'Judul buku wajib diisi',
            'judul.string' => 'Judul buku harus berupa teks',
            'judul.max' => 'Judul buku tidak boleh lebih dari 255 karakter',
            'pengarang.required' => 'Nama pengarang wajib diisi',
            'pengarang.string' => 'Nama pengarang harus berupa teks',
            'pengarang.max' => 'Nama pengarang tidak boleh lebih dari 255 karakter',
            'penerbit.required' => 'Nama penerbit wajib diisi',
            'penerbit.string' => 'Nama penerbit harus berupa teks',
            'penerbit.max' => 'Nama penerbit tidak boleh lebih dari 255 karakter',
            'thunterbit.required' => 'Tahun terbit wajib diisi',
            'thunterbit.date' => 'Tahun terbit harus berupa tanggal yang valid',
            'stok.required' => 'Jumlah stok buku wajib diisi',
            'stok.integer' => 'Jumlah stok buku harus berupa angka',
            'stok.min' => 'Jumlah stok buku tidak boleh kurang dari 0',
            'harga.required' => 'Harga wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'harga.min' => 'Harga tidak boleh kurang dari 0.',
            'harga.regex' => 'Harga harus dalam format yang benar, dengan maksimal dua angka desimal',
        ]);

        $photo = $request->file('photo');
        $namafile = time() . '.' . $photo->getClientOriginalExtension();
        $photo->move('assets/image/', $namafile);

        $buku = new BukuModel();
        $buku->id_kategori = $request->input('kategori');
        $buku->judul = $request->input('judul');
        $buku->pengarang = $request->input('pengarang');
        $buku->penerbit = $request->input('penerbit');
        $buku->tahun_terbit = $request->input('thunterbit');
        $buku->stok_buku = $request->input('stok');
        $buku->harga = $request->input('harga');
        $buku->photo = $namafile;
        $buku->save();
        return back()->with('success', 'Buku baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = BukuModel::findOrFail($id);
        $kategori = KategoriModel::all();
        return view('books.form-books.edit', compact('buku', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'photo' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048', // validasi untuk photo
            'kategori' => 'required', // validasi untuk kategori
            'judul' => 'required|string|max:255', // validasi untuk judul
            'pengarang' => 'required|string|max:255', // validasi untuk pengarang
            'penerbit' => 'required|string|max:255', // validasi untuk penerbit
            'thunterbit' => 'required|date', // validasi untuk tahun terbit sebagai tanggal
            'stok' => 'required|integer|min:0', // validasi untuk stok buku
            'harga' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/', // validasi untuk harga buku

        ], [
            'photo.image' => 'Foto harus berupa gambar',
            'photo.mimes' => 'Foto harus berformat: jpeg, png, jpg, atau gif',
            'photo.max' => 'Ukuran foto tidak boleh lebih dari 2048 kilobyte',
            'kategori.required' => 'Kategori wajib diisi',
            'kategori.exists' => 'Kategori yang dipilih tidak valid',
            'judul.required' => 'Judul buku wajib diisi',
            'judul.string' => 'Judul buku harus berupa teks',
            'judul.max' => 'Judul buku tidak boleh lebih dari 255 karakter',
            'pengarang.required' => 'Nama pengarang wajib diisi',
            'pengarang.string' => 'Nama pengarang harus berupa teks',
            'pengarang.max' => 'Nama pengarang tidak boleh lebih dari 255 karakter',
            'penerbit.required' => 'Nama penerbit wajib diisi',
            'penerbit.string' => 'Nama penerbit harus berupa teks',
            'penerbit.max' => 'Nama penerbit tidak boleh lebih dari 255 karakter',
            'thunterbit.required' => 'Tahun terbit wajib diisi',
            'thunterbit.date' => 'Tahun terbit harus berupa tanggal yang valid',
            'stok.required' => 'Jumlah stok buku wajib diisi',
            'stok.integer' => 'Jumlah stok buku harus berupa angka',
            'stok.min' => 'Jumlah stok buku tidak boleh kurang dari 0',
            'harga.required' => 'Harga wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'harga.min' => 'Harga tidak boleh kurang dari 0.',
            'harga.regex' => 'Harga harus dalam format yang benar, dengan maksimal dua angka desimal'
        ]);

        $buku = BukuModel::findOrFail($id);
        if ($request->has('photo')) {
            $photo = $request->file('photo');
            $namafile = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move('assets/image/', $namafile);

            // cek kondisi photo jika ada photo yang lama maka akan dihapus dan diganti dengan yang baru
            if ($buku->photo) {
                $oldFile = public_path('assets/image/' . $buku->photo);
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }

            $buku->id_kategori = $request->input('kategori');
            $buku->judul = $request->input('judul');
            $buku->pengarang = $request->input('pengarang');
            $buku->penerbit = $request->input('penerbit');
            $buku->tahun_terbit = $request->input('thunterbit');
            $buku->stok_buku = $request->input('stok');
            $buku->photo = $namafile;
            $buku->harga = $request->input('harga');
        }

        $buku->id_kategori = $request['kategori'];
        $buku->judul = $request['judul'];
        $buku->pengarang = $request['pengarang'];
        $buku->penerbit = $request['penerbit'];
        $buku->tahun_terbit = $request['thunterbit'];
        $buku->stok_buku = $request['stok'];
        $buku->harga = $request['harga'];

        $buku->update();
        return redirect()->route('books.index')->with('success', 'Data Buku berhasil terubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = BukuModel::findOrFail($id);
        $buku->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus');
    }
}
