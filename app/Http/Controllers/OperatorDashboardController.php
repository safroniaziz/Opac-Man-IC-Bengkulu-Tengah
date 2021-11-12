<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Subyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OperatorDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $perTahun = Absensi::select(DB::raw('count(NOURT) as jumlah'),DB::raw('year(TGL) as tahun'))->groupBy(DB::raw('year(TGL)'))->get();
        $perJenisKelamin = Absensi::join('panggota','panggota.NOANG','pabsen.NOANG')->select('JENKEL',DB::raw('count(NOURT) as jumlah'))->groupBy('JENKEL')->get();
        $subyek = Subyek::select('TAHUN',DB::raw('count(KDKOLEK) as jumlah'))->groupBy('TAHUN')->get();
        return view('operator/dashboard',compact('subyek','perTahun','perJenisKelamin'));
    }
}
