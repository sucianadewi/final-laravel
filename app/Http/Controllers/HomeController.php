<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Keluhan;
use App\Models\Servis;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // $countServis = DB::table('servis')
        //         ->select([
        //             DB::raw('DATE(tgl_servis) as tanggal')
        //         ])
        //         ->whereRaw('DATE(tgl_servis) >= ?', [date('Y-m-d', strtotime('-7 days'))])
        //         ->count();
        $tanggal = Carbon::now()->format('Y-m-d');
        $now = Carbon::now();
        $tahun = $now->year;
        $bulan = $now->month;
        $countServis = DB::table('servis')
                ->select('id_servis')
                ->whereRaw('EXTRACT(MONTH from tgl_servis) = ?', $bulan)
                ->whereRaw('EXTRACT(YEAR from tgl_servis) = ?', $tahun)
                // ->orderBy('tanggal','desc')
                ->count();
        $countKeluhan = DB::table('keluhan')
                ->select('id_keluhan')
                ->whereRaw('EXTRACT(MONTH from tgl_keluhan) = ?', $bulan)
                ->whereRaw('EXTRACT(YEAR from tgl_keluhan) = ?', $tahun)
                // ->orderBy('tanggal','desc')
                ->count();
        $countTindakLanjut = DB::table('tindak_lanjut')
                ->select('id_tindak_lanjut')
                ->whereRaw('EXTRACT(MONTH from tgl_penanganan) = ?', $bulan)
                ->whereRaw('EXTRACT(YEAR from tgl_penanganan) = ?', $tahun)
                // ->orderBy('tanggal','desc')
                ->count();
        $sumPendapatan = DB::table('servis')
                ->select('id_servis')
                ->whereRaw('EXTRACT(MONTH from tgl_servis) = ?', $bulan)
                ->whereRaw('EXTRACT(YEAR from tgl_servis) = ?', $tahun)
                // ->orderBy('tanggal','desc')
                ->sum('total_biaya');
        $keluhanData = Keluhan::select(DB::raw("COUNT(*) as count"))
                    ->whereYear("tgl_keluhan",date('Y'))
                    ->groupBy(DB::raw("Month(tgl_keluhan)"))
                    ->pluck('count');
        $bulan = Keluhan::select(DB::raw("MONTHNAME(tgl_keluhan) as bulan"))
                ->groupBy(DB::raw("MONTHNAME(tgl_keluhan)"))
                ->pluck('bulan');
        $keluhanterbaru = Keluhan::orderBy('id_keluhan', 'DESC')->take(5)->get();
        
        return view('home.index', compact(
            'countServis', 'countKeluhan', 'countTindakLanjut', 'sumPendapatan', 'tahun', 'keluhanData', 'bulan', 'keluhanterbaru'
        ));

        
    }

    public function countPerhari(Request $request)
    {
        $data = DB::table('servis')
                ->select([
                    DB::raw('count(*) as jumlah'),
                    DB::raw('DATE(tgl_servis) as tanggal')
                ])
                ->groupBy('tanggal')
                ->orderBy('tanggal','desc')
                ->whereRaw('DATE(tgl_servis) >= ?', [date('Y-m-d', strtotime('-7 days'))])
                ->get()
                ->toArray();
        
        return view('home.index', compact('data'));
    }

    public function sumPerBulan(Request $request)
    {
        $now = Carbon::now();
        $tahun = $now->year;
        $bulan = $now->month;
        $data = DB::table('servis')
                ->select([
                    DB::raw('count(id_servis) as jumlah'),
                    DB::raw('EXTRACT(MONTH from tgl_servis) as bulan'),
                    DB::raw('EXTRACT(YEAR from tgl_servis) as tahun')
                ])
                ->groupBy(['bulan', 'tahun'])
                ->whereRaw('EXTRACT(MONTH from tgl_servis) = ?', $bulan)
                ->whereRaw('EXTRACT(YEAR from tgl_servis) = ?', $tahun)
                // ->orderBy('tanggal','desc')
                ->get('jumlah')
                ->toArray();
                dd($data);
    }

}
