<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SantriModel;
use Barryvdh\DomPDF\Facade\PDF;

class SantriController extends Controller
{
    public function index()
    {
        // Ambil semua data santri dari database
        $santris = SantriModel::all();

        // Kirim data santri ke tampilan
        return view('admin.santri.home', ['santris' => $santris]);
    }

    public function dashboard()
    {
        $santris = SantriModel::all();
        return view('dashboard', ['santris'=> $santris]);
    }

    public function input()
    {
        return view('admin.santri.input');
    }

    public function simpan(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama_santri' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        // Menyimpan data ke database
        $data = SantriModel::create($validatedData);

        // Jika data berhasil disimpan
        if ($data) {
            session()->flash('success', 'Data berhasil disimpan');
            return redirect()->route('dashboard');
        } else {
            session()->flash('error', 'Data gagal disimpan');
            return redirect()->route('admin/santri/input');
        }
    }

    // Edit data santri
    public function edit($id_santri)
    {
        // Ambil data santri berdasarkan id
        $santri = SantriModel::findOrFail($id_santri);

        // Kirim data santri ke tampilan
        return view('admin.santri.update', compact('santri'));
    }

    // Update data santri
    public function update(Request $request, $id_santri)
    {
        // Validasi data yang diinput dari form
        $validatedData = $request->validate([
            'nama_santri' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
        ]);

        // Ambil data santri dari database berdasarkan id_santri
        $santri = SantriModel::findOrFail($id_santri);

        // Update data santri dengan data yang baru dari form
        $santri->update($validatedData);

        // Cek apakah data berhasil diupdate
        if ($santri->wasChanged()) {
            session()->flash('success', 'Data berhasil diupdate');
        } else {
            session()->flash('info', 'Tidak ada perubahan data');
        }

        // Redirect ke halaman daftar santri atau halaman lain sesuai kebutuhan
        return redirect()->route('dashboard');
    }

    // Hapus data santri
    public function delete($id_santri)
    {
        // Hapus data santri berdasarkan id santri
        $santri = SantriModel::findOrFail($id_santri)->delete();

        // Redirect ke halaman daftar santri
        if ($santri) {
            session()->flash('success', 'Data berhasil dihapus');
            return redirect()->route('dashboard');
        } else {
            session()->flash('error', 'Data gagal dihapus');
            return redirect()->route('dashboard');
        }
    }

    // Cetak data santri ke PDF
    public function generatePDF()
    {
        // Ambil semua data santri
        $santris = SantriModel::all();

        // Cetak data santri ke PDF
        $pdf = PDF::LoadView('admin.santri.laporan', ['santris' => $santris]);

        // Generate judul laporan-santri dengan tanggal
        $judul = 'laporan-santri-' . date('d-m-Y') . '.pdf';

        // Download file PDF dengan judul yang telah digenerate
        return $pdf->download($judul);
    }
}