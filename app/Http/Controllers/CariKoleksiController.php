<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CariKoleksiController extends Controller
{
    public function index(){
        return view('cari_koleksi');
    }

    public function koleksiCari(Request $request){
        return $request->all();

        $messages = [
            'required' => ':attribute harus diisi',
        ];
        $attributes = [
            'cari_berdasarkan'   =>  'Kategori Berdasarkan',
            'judul'    =>  'judul',
        ];
        $this->validate($request, [
            'cari_berdasarkan'    =>  'required',
            'judul'    =>  'required',
        ],$messages,$attributes);
        if ($request->cari_berdasarkan == "pengarang") {
            $data = DB::table('pkoleksi')->where('PENULASLI', 'like','%'.$request->judul . '%')
                    ->select('JUD','PENULASLI','PENERBIT','KOTA','EDISI','TOTKOLEK','TOTKOLEK','POSIRAK','LANTAI','dokumen')->get();
            if (count($data)>0) {
                return view('cari_koleksi',compact('data'))->with(['success'    =>  'Alhamdulillah, buku berhasil ditemukan ']);
            }
            else{
                return redirect()->route('cari_koleksi')->with(['error'   =>  'Mohon Maaf Buku Tidak Ditemukan']);
            }
        } elseif ($request->cari_berdasarkan == "penerbit") {
            $data = DB::table('pkoleksi')->where('PENERBIT', 'like','%'.$request->judul . '%')
                    ->select('JUD','PENULASLI','PENERBIT','KOTA','EDISI','TOTKOLEK','TOTKOLEK','POSIRAK','LANTAI','dokumen')->get();
            if (count($data)>0) {
                return view('cari_koleksi',compact('data'))->with(['success'    =>  'Alhamdulillah, buku berhasil ditemukan ']);
            }
            else{
                return redirect()->route('cari_koleksi')->with(['error'   =>  'Mohon Maaf Buku Tidak Ditemukan']);
            }
        } elseif ($request->cari_berdasarkan == "tahun") {
            $data = DB::table('pkoleksi')->where('TAHUN', 'like','%'.$request->judul . '%')
                    ->select('JUD','PENULASLI','PENERBIT','KOTA','EDISI','TOTKOLEK','TOTKOLEK','POSIRAK','LANTAI','dokumen')->get();
            if (count($data)>0) {
                return view('cari_koleksi',compact('data'))->with(['success'    =>  'Alhamdulillah, buku berhasil ditemukan ']);
            }
            else{
                return redirect()->route('cari_koleksi')->with(['error'   =>  'Mohon Maaf Buku Tidak Ditemukan']);
            }
        } elseif ($request->cari_berdasarkan == "subyek") {
            $data = DB::table('pkoleksi')->where('SUBYEK', 'like','%'.$request->judul . '%')
                    ->select('JUD','PENULASLI','PENERBIT','KOTA','EDISI','TOTKOLEK','TOTKOLEK','POSIRAK','LANTAI','dokumen')->get();
            if (count($data)>0) {
                return view('cari_koleksi',compact('data'))->with(['success'    =>  'Alhamdulillah, buku berhasil ditemukan ']);
            }
            else{
                return redirect()->route('cari_koleksi')->with(['error'   =>  'Mohon Maaf Buku Tidak Ditemukan']);
            }
        } else{
            $data = DB::table('pkoleksi')->where('ISBN', 'like','%'.$request->judul . '%')
                    ->select('JUD','PENULASLI','PENERBIT','KOTA','EDISI','TOTKOLEK','TOTKOLEK','POSIRAK','LANTAI','dokumen')->get();
            if (count($data)>0) {
                return view('cari_koleksi',compact('data'))->with(['success'    =>  'Alhamdulillah, buku berhasil ditemukan ']);
            }
            else{
                return redirect()->route('cari_koleksi')->with(['error'   =>  'Mohon Maaf Buku Tidak Ditemukan']);
            }
        }
    
    }

    public function index2(){
        return view('cari_koleksi2');
    }

    public function koleksiCari2(Request $request){
        $messages = [
            'required' => ':attribute harus diisi',
        ];
        $attributes = [
            'cari_berdasarkan'   =>  'Kategori Berdasarkan',
            'judul'    =>  'judul',
        ];
        $this->validate($request, [
            'cari_berdasarkan'    =>  'required',
            'judul'    =>  'required',
        ],$messages,$attributes);
    
        if ($request->cari_berdasarkan == "pengarang") {
            $data = DB::table('pkoleksi')->where('PENULASLI', 'like','%'.$request->judul . '%')
                    ->select('JUD','PENULASLI','PENERBIT','KOTA','EDISI','TOTKOLEK','TOTKOLEK','POSIRAK','LANTAI','dokumen')->get();
                    if (count($data)>0) {
                return view('cari_koleksi2',compact('data'))->with(['success'    =>  'Alhamdulillah, buku berhasil ditemukan ']);
            }
            else{
                return redirect()->route('cari_koleksi2')->with(['error'   =>  'Mohon Maaf Buku Tidak Ditemukan']);
            }
        } elseif ($request->cari_berdasarkan == "judul") {
            $data = DB::table('pkoleksi')->where('JUD', 'like','%'.$request->judul . '%')
                    ->select('JUD','PENULASLI','PENERBIT','KOTA','EDISI','TOTKOLEK','TOTKOLEK','POSIRAK','LANTAI','dokumen')->get();
            if (count($data)>0) {
                return view('cari_koleksi2',compact('data'))->with(['success'    =>  'Alhamdulillah, buku berhasil ditemukan ']);
            }
            else{
                return redirect()->route('cari_koleksi2')->with(['error'   =>  'Mohon Maaf Buku Tidak Ditemukan']);
            }
        } elseif ($request->cari_berdasarkan == "penerbit") {
            $data = DB::table('pkoleksi')->where('PENERBIT', 'like','%'.$request->judul . '%')
                    ->select('JUD','PENULASLI','PENERBIT','KOTA','EDISI','TOTKOLEK','TOTKOLEK','POSIRAK','LANTAI','dokumen')->get();
            if (count($data)>0) {
                return view('cari_koleksi2',compact('data'))->with(['success'    =>  'Alhamdulillah, buku berhasil ditemukan ']);
            }
            else{
                return redirect()->route('cari_koleksi2')->with(['error'   =>  'Mohon Maaf Buku Tidak Ditemukan']);
            }
        } elseif ($request->cari_berdasarkan == "tahun") {
            $data = DB::table('pkoleksi')->where('TAHUN', 'like','%'.$request->judul . '%')
                    ->select('JUD','PENULASLI','PENERBIT','KOTA','EDISI','TOTKOLEK','TOTKOLEK','POSIRAK','LANTAI','dokumen')->get();
            if (count($data)>0) {
                return view('cari_koleksi2',compact('data'))->with(['success'    =>  'Alhamdulillah, buku berhasil ditemukan ']);
            }
            else{
                return redirect()->route('cari_koleksi2')->with(['error'   =>  'Mohon Maaf Buku Tidak Ditemukan']);
            }
        } elseif ($request->cari_berdasarkan == "subyek") {
            $data = DB::table('pkoleksi')->where('SUBYEK', 'like','%'.$request->judul . '%')
                    ->select('JUD','PENULASLI','PENERBIT','KOTA','EDISI','TOTKOLEK','TOTKOLEK','POSIRAK','LANTAI','dokumen')->get();
            if (count($data)>0) {
                return view('cari_koleksi2',compact('data'))->with(['success'    =>  'Alhamdulillah, buku berhasil ditemukan ']);
            }
            else{
                return redirect()->route('cari_koleksi2')->with(['error'   =>  'Mohon Maaf Buku Tidak Ditemukan']);
            }
        } else{
            $data = DB::table('pkoleksi')->where('ISBN', 'like','%'.$request->judul . '%')
                    ->select('JUD','PENULASLI','PENERBIT','KOTA','EDISI','TOTKOLEK','TOTKOLEK','POSIRAK','LANTAI','dokumen')->get();
            if (count($data)>0) {
                return view('cari_koleksi2',compact('data'))->with(['success'    =>  'Alhamdulillah, buku berhasil ditemukan ']);
            }
            else{
                return redirect()->route('cari_koleksi2')->with(['error'   =>  'Mohon Maaf Buku Tidak Ditemukan']);
            }
        }
    
    }
}
