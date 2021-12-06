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
        ->select('KDKOLEK','JUD','PENULASLI','PENERBIT','KOTA','EDISI','TOTKOLEK','TOTKOLEK','POSIRAK','LANTAI','dokumen')
        ->orderBy('TGLINPUT','desc')
        ->get();
        return view('operator/koleksi.index',compact('koleksis'));
    }

    public function add(){
        return view('operator/koleksi.add');
    }

    public function post(Request $request){
        $messages = [
            'required' => ':attribute harus diisi',
            'numeric' => ':attribute harus angka',
            'unique'    =>  ':attribute sudah digunakan',
            'max'    =>  ':attribute tidak boleh lebih dari :max',
        ];
        $attributes = [
            'judul'               =>  'Judul',
            'subyek'               =>  'Subyek',
            'penulis'             =>  'penulis',
            'penerbit'      =>  'penerbit',
            'isbn'          =>  'isbn',
            'tahun'        =>  'tahun',
            'KDKOLEK'       =>  'Kode Koleksi',
            'edisi' =>  'Edisi',
            'lantai' =>  'Lantai',
            'seri' =>  'Seri',
            'jumlah_jilid' =>  'Jumlah Jilid',
            'BIB' =>  'Bibliografi',
        ];
        $this->validate($request, [
            'judul'               =>  'required',
            'penulis'             =>  'required',
            'penerbit'      =>  'required',
            'tahun'         =>  'required|numeric',
            'subyek'         =>  'required',
            'isbn'         =>  'required',
            'KDKOLEK'       =>  'required|numeric|unique:pkoleksi,KDKOLEK',
            'jumlah_eksemplar'  =>  'numeric',
            'jumlah_halaman'  =>  'numeric',
            'lantai'  =>  'numeric|max:99',
            'jumlah_jilid'  =>  'numeric|max:99',
            'edisi'  =>  'numeric|max:99',
            'tinggi'  =>  'numeric',
            'seri' =>  'numeric|max:99',
            'BIB' =>  'max:8',
            'Tahun' =>  'max:9999',
        ],$messages,$attributes);

        $model['dokumen'] = null;
        $model = $request->all();

        if ($request->hasFile('dokumen')){
            $model['dokumen'] = Str::slug($model['judul'], '-').'.'.$request->dokumen->getClientOriginalExtension();
            $request->dokumen->move(public_path('/upload_file/'), $model['dokumen']);
            $subyek = new Subyek();
            $subyek->KDKOLEK = $request->KDKOLEK;
            $subyek->PKDKLS = $request->no_kls;
            $subyek->JUD = $request->judul;
            $subyek->SUBJUD = $request->SUBJUD;
            $subyek->PENULASLI = $request->penulis;
            $subyek->PENERBIT = $request->penerbit;
            $subyek->KOTA = $request->kota;
            $subyek->EDISI = $request->edisi;
            $subyek->TOTKOLEK = $request->jumlah_eksemplar;
            $subyek->POSIRAK = $request->posisi_rak;
            $subyek->LANTAI = $request->lantai;
            $subyek->JUDASLI = $request->judul_asli;
            $subyek->ISBN = $request->isbn;
            $subyek->BHS = $request->bahasa;
            $subyek->TERJEMAH = $request->terjemahan;
            $subyek->PENULIS1 = $request->penulis1;
            $subyek->PENULIS2 = $request->penulis2;
            $subyek->PENULIS3 = $request->penulis3;
            $subyek->PENULIS4 = $request->penulis4;
            $subyek->EDITOR = $request->editor;
            $subyek->TAHUN = $request->tahun;
            $subyek->SERI = $request->seri;
            $subyek->TINGGI = $request->tinggi;
            $subyek->ILUSTRASI = $request->ilustrasi;
            $subyek->JLHAL = $request->jumlah_halaman;
            $subyek->JLINDEKS = $request->jumlah_indeks;
            $subyek->KATEGORI = $request->kategori;
            $subyek->JLHJILID = $request->jumlah_jilid;
            $subyek->JLHPINJAM = $request->jumlah_pinjam;
            $subyek->SISAKOLEK = $request->sisa_koleksi;
            $subyek->BADANKORP = $request->badan_korporasi;
            $subyek->CATATAN = $request->catatan;
            $subyek->RESUME = $request->resume;
            $subyek->KDUSER = $request->kode_user;
            $subyek->SUBJUD = $request->sub_judul;
            $subyek->DIGITPENLS = $request->digitpens;
            $subyek->DIGITJUD = $request->digitjud;
            $subyek->BIB = $request->bib;
            $subyek->ASALBUKU = $request->asalbuku;
            $subyek->SUBYEK = $request->subyek;
            $subyek->PKDKLS = $request->pkdkls;
            $subyek->dokumen = $model['dokumen'];
            $subyek->TGLINPUT = date('Y-m-d H:i:s');
            $subyek->save();
        }
        else{
            $subyek = new Subyek();
            $subyek->KDKOLEK = $request->KDKOLEK;
            $subyek->PKDKLS = $request->no_kls;
            $subyek->JUD = $request->judul;
            $subyek->PENULASLI = $request->penulis;
            $subyek->PENERBIT = $request->penerbit;
            $subyek->KOTA = $request->kota;
            $subyek->EDISI = $request->edisi;
            $subyek->TOTKOLEK = $request->edisi;
            $subyek->POSIRAK = $request->posisi_rak;
            $subyek->LANTAI = $request->lantai;
            $subyek->JUDASLI = $request->judul_asli;
            $subyek->ISBN = $request->isbn;
            $subyek->BHS = $request->bahasa;
            $subyek->TERJEMAH = $request->terjemahan;
            $subyek->PENULIS1 = $request->penulis1;
            $subyek->PENULIS2 = $request->penulis2;
            $subyek->PENULIS3 = $request->penulis3;
            $subyek->PENULIS4 = $request->penulis4;
            $subyek->EDITOR = $request->editor;
            $subyek->TAHUN = $request->tahun;
            $subyek->SERI = $request->seri;
            $subyek->TINGGI = $request->tinggi;
            $subyek->ILUSTRASI = $request->ilustrasi;
            $subyek->JLHAL = $request->jumlah_halaman;
            $subyek->JLINDEKS = $request->jumlah_indeks;
            $subyek->ASALBUKU = $request->asalbuku;
            $subyek->KATEGORI = $request->kategori;
            $subyek->JLHJILID = $request->jumlah_jilid;
            $subyek->JLHPINJAM = $request->jumlah_pinjam;
            $subyek->SISAKOLEK = $request->sisa_koleksi;
            $subyek->BADANKORP = $request->badan_korporasi;
            $subyek->CATATAN = $request->catatan;
            $subyek->RESUME = $request->resume;
            $subyek->KDUSER = $request->kode_user;
            $subyek->SUBJUD = $request->sub_judul;
            $subyek->DIGITPENLS = $request->digitpens;
            $subyek->DIGITJUD = $request->digitjud;
            $subyek->BIB = $request->bib;
            $subyek->PKDKLS = $request->pkdkls;
            $subyek->SUBJUD = $request->SUBJUD;
            $subyek->SUBYEK = $request->subyek;
            $subyek->TGLINPUT = date('Y-m-d H:i:s');
            $subyek->save();
        }
        

        return redirect()->route('operator.koleksi')->with(['success'   =>  'Data Koleksi Baru Berhasil Ditambahkan !!']);
    }
    public function edit($KDKOLEK){
        $koleksi = Subyek::where('KDKOLEK',$KDKOLEK)->first();
        return view('operator/koleksi.edit',compact('koleksi'));
    }

    public function update(Request $request){
        $this->validate($request, [
            // 'nm_anggota'  =>  'required',
            // 'nik'  =>  'required',
            // 'alamat'  =>  'required',
            // 'tahun_keanggotaan'  =>  'required',
            // 'email'  =>  'required|email',
            // 'jabatan'   =>  'required',
            // 'simpanan_pokok'   =>  'required',
        ]);
        $anggota = Pkoleksi::find($request->id);


        $model = $request->all();
        if ($request->hasFile('foto')){
            $model['foto'] = $anggota->foto;
            if (!$anggota->foto == NULL){
                unlink(public_path($anggota->foto));
            }
            $model['foto'] = '/upload/foto_anggota/'.Str::slug($model['nm_anggota'], '-').'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('/upload/foto_anggota/'), $model['foto']);

            Pkoleksi::where('id',$request->id)->update([
                'nm_anggota'  =>  $request->nm_anggota,
                'nik'    =>  $request->nik,
                'alamat'    =>  $request->alamat,
                'tahun_keanggotaan'    =>  $request->tahun_keanggotaan,
                'email'    =>  $request->email,
                'gambar'    =>  $model['foto'],
                'jabatan_id'   =>  $request->jabatan,
                'simpanan_pokok'   =>  $request->simpanan_pokok,
            ]);
        }
        else{
            Anggota::where('id',$request->id)->update([
                'nm_anggota'  =>  $request->nm_anggota,
                'nik'    =>  $request->nik,
                'alamat'    =>  $request->alamat,
                'tahun_keanggotaan'    =>  $request->tahun_keanggotaan,
                'email'    =>  $request->email,
                'jabatan_id'   =>  $request->jabatan,
                'simpanan_pokok'   =>  $request->simpanan_pokok,
            ]);
        }

        return redirect()->route('operator.manajemen_anggota')->with(['success'   =>  'Data Anggota Berhasil Diubah !!']);
    }

    public function delete($KDKOLEK){
        Subyek::where('KDKOLEK',$KDKOLEK)->delete();
        return redirect()->route('operator.koleksi')->with(['success'   =>  'Data Koleksi Berhasil Dihapus !!']);
    }

    // public function updatePassword(Request $request){
    //     Anggota::where('id',$request->id)->update([
    //         'password'  =>  bcrypt($request->password_baru),
    //     ]);

    //     return redirect()->route('operator.manajemen_anggota')->with(['success'   =>  'Password Anggota Berhasil Diubah !!']);
    // }
}
