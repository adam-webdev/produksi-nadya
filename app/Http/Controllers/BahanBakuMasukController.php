<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\BahanBakuMasuk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BahanBakuMasukController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Admin|Direktur|Gudang');
    }

    public function index()
    {
        $bahanbaku = Bahanbaku::all();
        $bahanbaku_masuk = BahanBakuMasuk::with('bahanbaku')->get();
        return view('gudang.bahanbaku_masuk.index', compact("bahanbaku_masuk", "bahanbaku"));
    }

    public function create()
    {
    }


    public function store(Request $request)
    {

        $bahanbaku_masuk = new BahanBakuMasuk;
        // $bahanbaku_masuk->bahanbaku_id = 22;
        $bahanbaku_masuk->bahanbaku_id = $request->bahanbaku_id;
        $bahanbaku_masuk->jumlah = $request->jumlah;
        $bahanbaku_masuk->tanggal = $request->tanggal;
        $bahanbaku_masuk->save();
        Alert::success("Tersimpan", "Data Berhasil Disimpan");
        return redirect()->route('bahanbaku-masuk.index');
    }

    public function show($id)
    {
        //
    }

    // public function edit($id)
    // {
    //     $bahanbaku_masuk = BahanBakuMasuk::findOrFail($id);
    //     $bahanbaku = BahanBaku::all();
    //     return view("bahanbaku_masuk.edit", compact("bahanbaku_masuk", "bahanbaku"));
    // }

    // public function update(Request $request, $id)
    // {
    //     $bahanbaku_masuk = BahanBakuMasuk::findOrFail($id);
    //     $bahanbaku_masuk->stok_id = $request->stok_id;
    //     $bahanbaku_masuk->jumlah = $request->jumlah;
    //     $bahanbaku_masuk->save();
    //     Alert::success("Terupdate", "Data Berhasil Diupdate");
    //     return redirect()->route('bahanbaku-masuk.index');
    // }

    public function delete($id)
    {
        $bahanbaku_masuk = BahanBakuMasuk::findOrFail($id);
        $bahanbaku_masuk->delete();
        Alert::success("Terhapus", "Data Berhasil Dihapus");
        return redirect()->route('bahanbaku-masuk.index');
    }
}