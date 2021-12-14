<?php

namespace App\Http\Controllers;

use App\Models\Subyek;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


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
            $subyek->PKDKLS = $request->PKDKLS;
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
            $subyek->DIGITPENLS = $request->digitpens;
            $subyek->DIGITJUD = $request->digitjud;
            $subyek->BIB = $request->bib;
            $subyek->ASALBUKU = $request->asalbuku;
            $subyek->SUBYEK = $request->subyek;
            $subyek->dokumen = $model['dokumen'];
            $subyek->TGLINPUT = date('Y-m-d H:i:s');
            $subyek->save();
        }
        else{
            $subyek = new Subyek();
            $subyek->KDKOLEK = $request->KDKOLEK;
            $subyek->PKDKLS = $request->PKDKLS;
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
            $subyek->DIGITPENLS = $request->digitpens;
            $subyek->DIGITJUD = $request->digitjud;
            $subyek->BIB = $request->bib;
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

    public function update(Request $request,$KDKOLEK){
        $this->validate($request, [
         
        ]);
       
       
      
   
        $model = $request->all();
        $model['dokumen'] = null;
        $slug_user = Str::slug(Auth::user()->name);
        $dokumen = Subyek::where('KDKOLEK',$KDKOLEK)->first();
       

        if ($request->hasFile('dokumen')){
            if (!$dokumen->dokumen == NULL){
                unlink(public_path('/upload_file/'.'/'.$dokumen->dokumen));
            }
            $model['dokumen'] = '-'.Auth::user()->name.'-'.date('now').'.'.$request->dokumen->getClientOriginalExtension();
            $request->dokumen->move(public_path('/upload_file/'), $model['dokumen']);
           
            
            Subyek::where('KDKOLEK',$KDKOLEK)->update([
                'KDKOLEK' => $request->KDKOLEK,
                'PKDKLS' => $request->PKDKLS,
                'JUD' => $request->judul,
                'PENULASLI' => $request->penulis,
                'PENERBIT' => $request->penerbit,
                'KOTA' => $request->kota,
                'EDISI' => $request->edisi,
                'TOTKOLEK' => $request->edisi,
                'POSIRAK' => $request->posisi_rak,
                'LANTAI' => $request->lantai,
                'JUDASLI' => $request->judul_asli,
                'ISBN' => $request->isbn,
                'BHS' => $request->bahasa,
                'TERJEMAH' => $request->terjemahan,
                'PENULIS1' => $request->penulis1,
                'PENULIS2' => $request->penulis2,
                'PENULIS3' => $request->penulis3,
                'PENULIS4' => $request->penulis4,
                'EDITOR' => $request->editor,
                'TAHUN' => $request->tahun,
                'SERI' => $request->seri,
                'TINGGI' => $request->tinggi,
                'ILUSTRASI' => $request->ilustrasi,
                'JLHAL' => $request->jumlah_halaman,
                'JLINDEKS' => $request->jumlah_indeks,
                'ASALBUKU' => $request->asalbuku,
                'KATEGORI' => $request->kategori,
                'JLHJILID' => $request->jumlah_jilid,
                'JLHPINJAM' => $request->jumlah_pinjam,
                'SISAKOLEK' => $request->sisa_koleksi,
                'BADANKORP' => $request->badan_korporasi,
                'CATATAN' => $request->catatan,
                'RESUME' => $request->resume,
                'KDUSER' => $request->kode_user,
                'DIGITPENLS' => $request->digitpens,
                'DIGITJUD' => $request->digitjud,
                'BIB' => $request->bib,
                'SUBJUD' => $request->SUBJUD,
                'SUBYEK' => $request->subyek,
                'TGLINPUT' => date('Y-m-d H:i:s'),
           'dokumen' => $model['dokumen'],
            
            ]);

        }
        else{
            Subyek::where('KDKOLEK',$KDKOLEK)->update([
            'KDKOLEK' => $request->KDKOLEK,
            'PKDKLS' => $request->PKDKLS,
            'JUD' => $request->judul,
            'PENULASLI' => $request->penulis,
            'PENERBIT' => $request->penerbit,
            'KOTA' => $request->kota,
            'EDISI' => $request->edisi,
            'TOTKOLEK' => $request->edisi,
            'POSIRAK' => $request->posisi_rak,
            'LANTAI' => $request->lantai,
            'JUDASLI' => $request->judul_asli,
            'ISBN' => $request->isbn,
            'BHS' => $request->bahasa,
            'TERJEMAH' => $request->terjemahan,
            'PENULIS1' => $request->penulis1,
            'PENULIS2' => $request->penulis2,
            'PENULIS3' => $request->penulis3,
            'PENULIS4' => $request->penulis4,
            'EDITOR' => $request->editor,
            'TAHUN' => $request->tahun,
            'SERI' => $request->seri,
            'TINGGI' => $request->tinggi,
            'ILUSTRASI' => $request->ilustrasi,
            'JLHAL' => $request->jumlah_halaman,
            'JLINDEKS' => $request->jumlah_indeks,
            'ASALBUKU' => $request->asalbuku,
            'KATEGORI' => $request->kategori,
            'JLHJILID' => $request->jumlah_jilid,
            'JLHPINJAM' => $request->jumlah_pinjam,
            'SISAKOLEK' => $request->sisa_koleksi,
            'BADANKORP' => $request->badan_korporasi,
            'CATATAN' => $request->catatan,
            'RESUME' => $request->resume,
            'KDUSER' => $request->kode_user,
            'DIGITPENLS' => $request->digitpens,
            'DIGITJUD' => $request->digitjud,
            'BIB' => $request->bib,
            'SUBJUD' => $request->SUBJUD,
            'SUBYEK' => $request->subyek,
            'TGLINPUT' => date('Y-m-d H:i:s'),
            ]);

        }
        return redirect()->route('operator.koleksi')->with(['success'   =>  'Data Koleksi Baru Berhasil Ditambahkan !!']);
    }

    public function delete($KDKOLEK){
        Subyek::where('KDKOLEK',$KDKOLEK)->delete();
        return redirect()->route('operator.koleksi')->with(['success'   =>  'Data Koleksi Berhasil Dihapus !!']);
    }

 
}
