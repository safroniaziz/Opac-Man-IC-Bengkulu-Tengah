<?php

namespace App\Http\Controllers;

use App\Models\Subyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ManajemenKoleksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $koleksis = DB::table('pkoleksi')
        ->select('JUD','PENULASLI','PENERBIT','KOTA','EDISI','TOTKOLEK','TOTKOLEK','POSIRAK','LANTAI','dokumen')
        ->orderBy('TGLINPUT','desc')
        ->get();
        return view('operator/koleksi.index',compact('koleksis'));
    }

    public function add(){
        return view('operator/koleksi.add');
    }

    public function post(Request $request){
        $this->validate($request, [
            'judul'  =>  'required',
            'jumlah_eksemplar'  =>  'required',
            'penulis'  =>  'required',
            'ketersediaan'  =>  'required',
            'penerbit'  =>  'required',
            'posisi_rak'  =>  'required',
            'kota'    =>  'required',
            'lantai'    =>  'required',
            'edisi'    =>  'required',
        ]);

        $model['dokumen'] = null;
        $model = $request->all();
        $kdkolek = Subyek::max('KDKOLEK');

        if ($request->hasFile('dokumen')){
            $model['dokumen'] = Str::slug($model['judul'], '-').'.'.$request->dokumen->getClientOriginalExtension();
            $request->dokumen->move(public_path('/upload_file/'), $model['dokumen']);
            $subyek = new Subyek();
            $subyek->KDKOLEK = $kdkolek+1;
            $subyek->JUD = $request->judul;
            $subyek->PENULASLI = $request->penulis;
            $subyek->PENERBIT = $request->penerbit;
            $subyek->KOTA = $request->kota;
            $subyek->EDISI = $request->edisi;
            $subyek->TOTKOLEK = $request->edisi;
            $subyek->POSIRAK = $request->posisi_rak;
            $subyek->LANTAI = $request->lantai;
            $subyek->dokumen = $model['dokumen'];
            $subyek->TGLINPUT = date('Y-m-d H:i:s');
            $subyek->save();
        }
        else{
            $subyek = new Subyek();
            $subyek->KDKOLEK = $kdkolek+1;
            $subyek->JUD = $request->judul;
            $subyek->PENULASLI = $request->penulis;
            $subyek->PENERBIT = $request->penerbit;
            $subyek->KOTA = $request->kota;
            $subyek->EDISI = $request->edisi;
            $subyek->TOTKOLEK = $request->edisi;
            $subyek->POSIRAK = $request->posisi_rak;
            $subyek->LANTAI = $request->lantai;
            $subyek->TGLINPUT = date('Y-m-d H:i:s');
            $subyek->save();
        }
        

        return redirect()->route('operator.koleksi')->with(['success'   =>  'Data Koleksi Baru Berhasil Ditambahkan !!']);
    }

    // public function aktifkanStatus($id){
    //     Anggota::where('id',$id)->update([
    //         'status_anggota'    =>  '1'
    //     ]);
    //     return redirect()->route('operator.manajemen_anggota')->with(['success' =>  'Status Anggota Berhasil Di Aktifkan !!']);
    // }

    // public function nonaktifkanStatus($id){
    //     Anggota::where('id',$id)->update([
    //         'status_anggota'    =>  '0'
    //     ]);
    //     return redirect()->route('operator.manajemen_anggota')->with(['success' =>  'Status Anggota Berhasil Di Nonaktifkan !!']);
    // }

    // public function edit($id){
    //     $data = Anggota::find($id);
    //     return $data;
    // }

    // public function update(Request $request){
    //     $this->validate($request, [
    //         'nm_anggota'  =>  'required',
    //         'nik'  =>  'required',
    //         'alamat'  =>  'required',
    //         'tahun_keanggotaan'  =>  'required',
    //         'email'  =>  'required|email',
    //         'jabatan'   =>  'required',
    //         // 'simpanan_pokok'   =>  'required',
    //     ]);
    //     $anggota = Anggota::find($request->id);


    //     $model = $request->all();
    //     if ($request->hasFile('foto')){
    //         $model['foto'] = $anggota->foto;
    //         if (!$anggota->foto == NULL){
    //             unlink(public_path($anggota->foto));
    //         }
    //         $model['foto'] = '/upload/foto_anggota/'.Str::slug($model['nm_anggota'], '-').'.'.$request->foto->getClientOriginalExtension();
    //         $request->foto->move(public_path('/upload/foto_anggota/'), $model['foto']);

    //         Anggota::where('id',$request->id)->update([
    //             'nm_anggota'  =>  $request->nm_anggota,
    //             'nik'    =>  $request->nik,
    //             'alamat'    =>  $request->alamat,
    //             'tahun_keanggotaan'    =>  $request->tahun_keanggotaan,
    //             'email'    =>  $request->email,
    //             'gambar'    =>  $model['foto'],
    //             'jabatan_id'   =>  $request->jabatan,
    //             'simpanan_pokok'   =>  $request->simpanan_pokok,
    //         ]);
    //     }
    //     else{
    //         Anggota::where('id',$request->id)->update([
    //             'nm_anggota'  =>  $request->nm_anggota,
    //             'nik'    =>  $request->nik,
    //             'alamat'    =>  $request->alamat,
    //             'tahun_keanggotaan'    =>  $request->tahun_keanggotaan,
    //             'email'    =>  $request->email,
    //             'jabatan_id'   =>  $request->jabatan,
    //             'simpanan_pokok'   =>  $request->simpanan_pokok,
    //         ]);
    //     }

    //     return redirect()->route('operator.manajemen_anggota')->with(['success'   =>  'Data Anggota Berhasil Diubah !!']);
    // }

    // public function delete(Request $request){
    //     Anggota::where('id',$request->id)->delete();
    //     return redirect()->route('operator.manajemen_anggota')->with(['success'   =>  'Data Anggota Berhasil Dihapus !!']);
    // }

    // public function updatePassword(Request $request){
    //     Anggota::where('id',$request->id)->update([
    //         'password'  =>  bcrypt($request->password_baru),
    //     ]);

    //     return redirect()->route('operator.manajemen_anggota')->with(['success'   =>  'Password Anggota Berhasil Diubah !!']);
    // }
}
