<?php

use App\Http\Controllers\CariKoleksiController;
use App\Http\Controllers\ManajemenKoleksiController;
use App\Http\Controllers\OperatorDashboardController;
use App\Http\Controllers\SatuAtapController;
use App\Models\Absensi;
use App\Models\Subyek;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $semuaBuku = count(DB::table('pkoleksi')->get());
    $perTahun = Absensi::select(DB::raw('count(NOURT) as jumlah'),DB::raw('year(TGL) as tahun'))->groupBy(DB::raw('year(TGL)'))->get();
    $perJenisKelamin = Absensi::join('panggota','panggota.NOANG','pabsen.NOANG')->select('JENKEL',DB::raw('count(NOURT) as jumlah'))->groupBy('JENKEL')->get();
    $subyek = Subyek::select('TAHUN',DB::raw('count(KDKOLEK) as jumlah'))->groupBy('TAHUN')->get();
    return view('welcome2',compact('subyek','perTahun','perJenisKelamin','semuaBuku'));
})->name('welcome2');

Route::get('/welcome', function () {
    $semuaBuku = count(DB::table('pkoleksi')->get());
    $perTahun = Absensi::select(DB::raw('count(NOURT) as jumlah'),DB::raw('year(TGL) as tahun'))->groupBy(DB::raw('year(TGL)'))->get();
    $perJenisKelamin = Absensi::join('panggota','panggota.NOANG','pabsen.NOANG')->select('JENKEL',DB::raw('count(NOURT) as jumlah'))->groupBy('JENKEL')->get();
    $subyek = Subyek::select('TAHUN',DB::raw('count(KDKOLEK) as jumlah'))->groupBy('TAHUN')->get();
    return view('welcome',compact('subyek','perTahun','perJenisKelamin','semuaBuku'));
})->name('welcome');

Route::get('/cari_koleksi',[CariKoleksiController::class, 'index'])->name('cari_koleksi');
Route::get('/cari_koleksi_buku',[CariKoleksiController::class, 'index2'])->name('cari_koleksi2');
Route::post('/kolaksi/daftar_pencarian',[CariKoleksiController::class, 'koleksiCari'])->name('koleksi.cari');
Route::post('/kolaksi/daftar_pencarian_buku',[CariKoleksiController::class, 'koleksiCari2'])->name('koleksi.cari2');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/operator/dashboard',[OperatorDashboardController::class, 'index'])->name('operator.dashboard');

Route::group(['prefix' => 'operator/manajemen_koleksi'], function () {
    Route::get('/',[ManajemenKoleksiController::class, 'index'])->name('operator.koleksi');
    Route::get('/tambah',[ManajemenKoleksiController::class, 'add'])->name('operator.koleksi.add');
    Route::post('/tambah',[ManajemenKoleksiController::class, 'post'])->name('operator.koleksi.post');
    Route::get('/edit/{KDKOLEK}',[ManajemenKoleksiController::class, 'edit'])->name('operator.koleksi.edit');
    Route::patch('update/{KDKOLEK}',[ManajemenKoleksiController::class, 'update'])->name('operator.koleksi.update');
    Route::get('/cari_bulan',[ManajemenKoleksiController::class, 'cariBulan'])->name('admin.koleksi.cari_bulan');
    Route::delete('{KDKOLEK}/delete',[ManajemenKoleksiController::class, 'delete'])->name('operator.koleksi.delete');
});

Route::get('/satuatap',[SatuAtapController::class, 'index'])->name('satu_atap');
