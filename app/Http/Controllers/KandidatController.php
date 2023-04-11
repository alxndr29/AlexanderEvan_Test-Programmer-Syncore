<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Biodata;
use App\User;
use App\Pendidikan;
use App\Pekerjaan;
use App\Pelatihan;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class KandidatController extends Controller
{
    //
    public function index()
    {
        try {
            $user = User::find(Auth::user()->id)->first();
            $biodata = Biodata::where('users_id', Auth::user()->id)->count();
            if ($biodata == 0) {
                return view('kandidat.create_biodata');
            } else {
                return view('kandidat.detail_biodata', compact('user'));
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function storeBiodata(Request $request)
    {
        try {
            $biodata = new Biodata();
            $biodata->nama = $request->nama;
            $biodata->tempat_lahir = $request->tempat_lahir;
            $biodata->tanggal_lahir = $request->tanggal_lahir;
            $biodata->posisi_lamaran = $request->posisi_lamaran;
            $biodata->users_id = Auth::user()->id;
            $biodata->save();
            return  redirect()->back()->with('sukses', 'Berhasil');
        } catch (\Exception $e) {
            return  redirect()->back()->with('gagal', $e->getMessage());
        }
    }
    public function storePendidikan(Request $request)
    {

        try {
            $user = User::find(Auth::user()->id);
            $pendidikan = new Pendidikan();
            $pendidikan->nama = $request->nama;
            $pendidikan->tahun_masuk = $request->tanggal_masuk;
            $pendidikan->tahun_keluar = $request->tanggal_keluar;
            $pendidikan->jenjang = $request->jenjang;
            $pendidikan->biodata_idbiodata = $user->biodata->idbiodata;
            $pendidikan->save();
            return  redirect()->back()->with('sukses', 'Berhasil');
        } catch (\Exception $e) {
            return  redirect()->back()->with('gagal', $e->getMessage());
        }
    }
    public function storePelatihan(Request $request)
    {
        try {
            $user = User::find(Auth::user()->id);
            $pelatihan = new Pelatihan();
            $pelatihan->nama = $request->nama;
            $pelatihan->tanggal_mulai = $request->tanggal_mulai;
            $pelatihan->tanggal_akhir = $request->tanggal_akhir;
            $pelatihan->biodata_idbiodata = $user->biodata->idbiodata;
            $pelatihan->save();
            return redirect()->back()->with('sukses', 'Berhasil');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
    public function storePekerjaan(Request $request)
    {
        try {
            $user = User::find(Auth::user()->id);
            $pekerjaan = new Pekerjaan();
            $pekerjaan->nama_perusahaan = $request->nama;
            $pekerjaan->tanggal_masuk = $request->tanggal_masuk;
            $pekerjaan->tanggal_keluar = $request->tanggal_keluar;
            $pekerjaan->posisi = $request->posisi;
            $pekerjaan->alasan_keluar = $request->alasan_keluar;
            $pekerjaan->biodata_idbiodata = $user->biodata->idbiodata;
            $pekerjaan->save();
            return redirect()->back()->with('sukses', 'Berhasil');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', $e->getMessage());
        }
    }
}
