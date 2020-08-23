<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Charts\ChartJs;
use Carbon;

class InventoryController extends Controller
{
    public function index(){
    	if (!Session::get('login')) {
    		alert('Login Gagal!','Anda harus login!', 'warning')->persistent('OK');
    		return redirect('/');
    	}else{
    		$title = "Dashboard";
    		$now = \Carbon\Carbon::now('GMT+8')->format('Y-m-d');
            $tahun = \Carbon\Carbon::now('GMT+8')->format('Y');
            $bulan = \Carbon\Carbon::now('GMT+8')->format('m');
            $bln = \Carbon\Carbon::now('GMT+8')->format('F');
            $hari = \Carbon\Carbon::now('GMT+8')->format('d');
            $LY = $tahun - 1;
            // Unit Terjual TAHUN
            $yearSale = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->sum('qty');

            /**
            * Unit Terjual Per DEALER
            */
            $YS01 = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty');
            $YS02 = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty');
            $YS04 = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty');
            $YS05 = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty');
            $YS06 = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty');
            $YS07 = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty');
            $YS08 = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty');
            $YS09 = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty');
            $YS04F = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            // Unit Terjual BULAN
            $monthSale = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->whereMonth('tanggal_jual',$bulan)
            ->sum('qty');

            /**
            * Unit Terjual per DEALER
            */
            $MS01 = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->whereMonth('tanggal_jual',$bulan)
            ->where('dealer_kode','AA0101')
            ->sum('qty');
            $MS02 = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->whereMonth('tanggal_jual',$bulan)
            ->where('dealer_kode','AA0102')
            ->sum('qty');
            $MS04 = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->whereMonth('tanggal_jual',$bulan)
            ->where('dealer_kode','AA0104')
            ->sum('qty');
            $MS05 = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->whereMonth('tanggal_jual',$bulan)
            ->where('dealer_kode','AA0105')
            ->sum('qty');
            $MS06 = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->whereMonth('tanggal_jual',$bulan)
            ->where('dealer_kode','AA0106')
            ->sum('qty');
            $MS07 = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->whereMonth('tanggal_jual',$bulan)
            ->where('dealer_kode','AA0107')
            ->sum('qty');
            $MS08 = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->whereMonth('tanggal_jual',$bulan)
            ->where('dealer_kode','AA0108')
            ->sum('qty');
            $MS09 = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->whereMonth('tanggal_jual',$bulan)
            ->where('dealer_kode','AA0109')
            ->sum('qty');
            $MS04F = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->whereMonth('tanggal_jual',$bulan)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            // Unit Terjual HARI
            $daySale = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->whereMonth('tanggal_jual',$bulan)
            ->whereDay('tanggal_jual',$hari)
            ->sum('qty');

            /**
            * Unit Terjual Per DEALER
            */
            $DS01 = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->whereMonth('tanggal_jual',$bulan)
            ->whereDay('tanggal_jual',$hari)
            ->where('dealer_kode','AA0101')
            ->sum('qty');
            $DS02 = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->whereMonth('tanggal_jual',$bulan)
            ->whereDay('tanggal_jual',$hari)
            ->where('dealer_kode','AA0102')
            ->sum('qty');
            $DS04 = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->whereMonth('tanggal_jual',$bulan)
            ->whereDay('tanggal_jual',$hari)
            ->where('dealer_kode','AA0104')
            ->sum('qty');
            $DS05 = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->whereMonth('tanggal_jual',$bulan)
            ->whereDay('tanggal_jual',$hari)
            ->where('dealer_kode','AA0105')
            ->sum('qty');
            $DS06 = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->whereMonth('tanggal_jual',$bulan)
            ->whereDay('tanggal_jual',$hari)
            ->where('dealer_kode','AA0106')
            ->sum('qty');
            $DS07 = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->whereMonth('tanggal_jual',$bulan)
            ->whereDay('tanggal_jual',$hari)
            ->where('dealer_kode','AA0107')
            ->sum('qty');
            $DS08 = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->whereMonth('tanggal_jual',$bulan)
            ->whereDay('tanggal_jual',$hari)
            ->where('dealer_kode','AA0108')
            ->sum('qty');
            $DS09 = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->whereMonth('tanggal_jual',$bulan)
            ->whereDay('tanggal_jual',$hari)
            ->where('dealer_kode','AA0109')
            ->sum('qty');
            $DS04F = DB::table('juals')
            ->whereYear('tanggal_jual',$tahun)
            ->whereMonth('tanggal_jual',$bulan)
            ->whereDay('tanggal_jual',$hari)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            /*
            * CHART PENJUALAN UNIT
            */
            $jan = DB::table('juals')
            ->whereMonth('tanggal_jual','01')
            ->whereYear('tanggal_jual',$tahun)
            ->sum('qty');

            $feb = DB::table('juals')
            ->whereMonth('tanggal_jual','02')
            ->whereYear('tanggal_jual',$tahun)
            ->sum('qty');

            $mar = DB::table('juals')
            ->whereMonth('tanggal_jual','03')
            ->whereYear('tanggal_jual',$tahun)
            ->sum('qty');

            $apr = DB::table('juals')
            ->whereMonth('tanggal_jual','04')
            ->whereYear('tanggal_jual',$tahun)
            ->sum('qty');

            $may = DB::table('juals')
            ->whereMonth('tanggal_jual','05')
            ->whereYear('tanggal_jual',$tahun)
            ->sum('qty');

            $jun = DB::table('juals')
            ->whereMonth('tanggal_jual','06')
            ->whereYear('tanggal_jual',$tahun)
            ->sum('qty');

            $jul = DB::table('juals')
            ->whereMonth('tanggal_jual','07')
            ->whereYear('tanggal_jual',$tahun)
            ->sum('qty');

            $aug = DB::table('juals')
            ->whereMonth('tanggal_jual','08')
            ->whereYear('tanggal_jual',$tahun)
            ->sum('qty');

            $sep = DB::table('juals')
            ->whereMonth('tanggal_jual','09')
            ->whereYear('tanggal_jual',$tahun)
            ->sum('qty');

            $oct = DB::table('juals')
            ->whereMonth('tanggal_jual','10')
            ->whereYear('tanggal_jual',$tahun)
            ->sum('qty');

            $nov = DB::table('juals')
            ->whereMonth('tanggal_jual','11')
            ->whereYear('tanggal_jual',$tahun)
            ->sum('qty');

            $dec = DB::table('juals')
            ->whereMonth('tanggal_jual','12')
            ->whereYear('tanggal_jual',$tahun)
            ->sum('qty');

            //LAST YEAR 

            $janLY = DB::table('juals')
            ->whereMonth('tanggal_jual','01')
            ->whereYear('tanggal_jual',$LY)
            ->sum('qty');

            $febLY = DB::table('juals')
            ->whereMonth('tanggal_jual','02')
            ->whereYear('tanggal_jual',$LY)
            ->sum('qty');

            $marLY = DB::table('juals')
            ->whereMonth('tanggal_jual','03')
            ->whereYear('tanggal_jual',$LY)
            ->sum('qty');

            $aprLY = DB::table('juals')
            ->whereMonth('tanggal_jual','04')
            ->whereYear('tanggal_jual',$LY)
            ->sum('qty');

            $mayLY = DB::table('juals')
            ->whereMonth('tanggal_jual','05')
            ->whereYear('tanggal_jual',$LY)
            ->sum('qty');

            $junLY = DB::table('juals')
            ->whereMonth('tanggal_jual','06')
            ->whereYear('tanggal_jual',$LY)
            ->sum('qty');

            $julLY = DB::table('juals')
            ->whereMonth('tanggal_jual','07')
            ->whereYear('tanggal_jual',$LY)
            ->sum('qty');

            $augLY = DB::table('juals')
            ->whereMonth('tanggal_jual','08')
            ->whereYear('tanggal_jual',$LY)
            ->sum('qty');

            $sepLY = DB::table('juals')
            ->whereMonth('tanggal_jual','09')
            ->whereYear('tanggal_jual',$LY)
            ->sum('qty');

            $octLY = DB::table('juals')
            ->whereMonth('tanggal_jual','10')
            ->whereYear('tanggal_jual',$LY)
            ->sum('qty');

            $novLY = DB::table('juals')
            ->whereMonth('tanggal_jual','11')
            ->whereYear('tanggal_jual',$LY)
            ->sum('qty');

            $decLY = DB::table('juals')
            ->whereMonth('tanggal_jual','12')
            ->whereYear('tanggal_jual',$LY)
            ->sum('qty');

            $chartJual = new ChartJs;
            $chartJual->title('Penjualan Unit By Months');
            $chartJual->displaylegend(true);
            $chartJual->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartJual->dataset($tahun, 'line', [
                $jan, $feb, $mar, $apr, $may, $jun,
                $jul, $aug, $sep, $oct, $nov, $dec
            ])
            ->color("#233699")
            ->backgroundcolor("rgba(17,55,192,0.4)")
            ->linetension(0.0);

            $chartJual->dataset($LY, 'line', [
                $janLY, $febLY, $marLY, $aprLY, $mayLY, $junLY,
                $julLY, $augLY, $sepLY, $octLY, $novLY, $decLY
            ])
            ->color("#EB9D22")
            ->backgroundcolor("rgba(231,180,24,0.4)")
            ->linetension(0.0);
            // END -----------------------------








             /*
            * CHART PENJUALAN UNIT SENTRAL
            */
            $jan01 = DB::table('juals')
            ->whereMonth('tanggal_jual','01')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty');

            $feb01 = DB::table('juals')
            ->whereMonth('tanggal_jual','02')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty');

            $mar01 = DB::table('juals')
            ->whereMonth('tanggal_jual','03')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty');

            $apr01 = DB::table('juals')
            ->whereMonth('tanggal_jual','04')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty');

            $may01 = DB::table('juals')
            ->whereMonth('tanggal_jual','05')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty');

            $jun01 = DB::table('juals')
            ->whereMonth('tanggal_jual','06')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty');

            $jul01 = DB::table('juals')
            ->whereMonth('tanggal_jual','07')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty');

            $aug01 = DB::table('juals')
            ->whereMonth('tanggal_jual','08')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty');

            $sep01 = DB::table('juals')
            ->whereMonth('tanggal_jual','09')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty');

            $oct01 = DB::table('juals')
            ->whereMonth('tanggal_jual','10')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty');

            $nov01 = DB::table('juals')
            ->whereMonth('tanggal_jual','11')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty');

            $dec01 = DB::table('juals')
            ->whereMonth('tanggal_jual','12')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty');

            //LAST YEAR 

            $janLY01 = DB::table('juals')
            ->whereMonth('tanggal_jual','01')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0101')
            ->sum('qty');

            $febLY01 = DB::table('juals')
            ->whereMonth('tanggal_jual','02')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0101')
            ->sum('qty');

            $marLY01 = DB::table('juals')
            ->whereMonth('tanggal_jual','03')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0101')
            ->sum('qty');

            $aprLY01 = DB::table('juals')
            ->whereMonth('tanggal_jual','04')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0101')
            ->sum('qty');

            $mayLY01 = DB::table('juals')
            ->whereMonth('tanggal_jual','05')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0101')
            ->sum('qty');

            $junLY01 = DB::table('juals')
            ->whereMonth('tanggal_jual','06')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0101')
            ->sum('qty');

            $julLY01 = DB::table('juals')
            ->whereMonth('tanggal_jual','07')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0101')
            ->sum('qty');

            $augLY01 = DB::table('juals')
            ->whereMonth('tanggal_jual','08')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0101')
            ->sum('qty');

            $sepLY01 = DB::table('juals')
            ->whereMonth('tanggal_jual','09')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0101')
            ->sum('qty');

            $octLY01 = DB::table('juals')
            ->whereMonth('tanggal_jual','10')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0101')
            ->sum('qty');

            $novLY01 = DB::table('juals')
            ->whereMonth('tanggal_jual','11')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0101')
            ->sum('qty');

            $decLY01 = DB::table('juals')
            ->whereMonth('tanggal_jual','12')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0101')
            ->sum('qty');

            $chartJual01 = new ChartJs;
            $chartJual01->title('Penjualan Sentral By Months');
            $chartJual01->displaylegend(true);
            $chartJual01->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartJual01->dataset($tahun, 'line', [
                $jan01, $feb01, $mar01, $apr01, $may01, $jun01,
                $jul01, $aug01, $sep01, $oct01, $nov01, $dec01
            ])
            ->color("#233699")
            ->backgroundcolor("rgba(17,55,192,0.4)")
            ->linetension(0.0);

            $chartJual01->dataset($LY, 'line', [
                $janLY01, $febLY01, $marLY01, $aprLY01, $mayLY01, $junLY01,
                $julLY01, $augLY01, $sepLY01, $octLY01, $novLY01, $decLY01
            ])
            ->color("#EB9D22")
            ->backgroundcolor("rgba(231,180,24,0.4)")
            ->linetension(0.0);
            // END -----------------------------




            /*
            * CHART PENJUALAN UNIT BMM
            */
            $jan02 = DB::table('juals')
            ->whereMonth('tanggal_jual','01')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty');

            $feb02 = DB::table('juals')
            ->whereMonth('tanggal_jual','02')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty');

            $mar02 = DB::table('juals')
            ->whereMonth('tanggal_jual','03')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty');

            $apr02 = DB::table('juals')
            ->whereMonth('tanggal_jual','04')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty');

            $may02 = DB::table('juals')
            ->whereMonth('tanggal_jual','05')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty');

            $jun02 = DB::table('juals')
            ->whereMonth('tanggal_jual','06')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty');

            $jul02 = DB::table('juals')
            ->whereMonth('tanggal_jual','07')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty');

            $aug02 = DB::table('juals')
            ->whereMonth('tanggal_jual','08')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty');

            $sep02 = DB::table('juals')
            ->whereMonth('tanggal_jual','09')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty');

            $oct02 = DB::table('juals')
            ->whereMonth('tanggal_jual','10')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty');

            $nov02 = DB::table('juals')
            ->whereMonth('tanggal_jual','11')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty');

            $dec02 = DB::table('juals')
            ->whereMonth('tanggal_jual','12')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty');

            //LAST YEAR 

            $janLY02 = DB::table('juals')
            ->whereMonth('tanggal_jual','01')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0102')
            ->sum('qty');

            $febLY02 = DB::table('juals')
            ->whereMonth('tanggal_jual','02')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0102')
            ->sum('qty');

            $marLY02 = DB::table('juals')
            ->whereMonth('tanggal_jual','03')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0102')
            ->sum('qty');

            $aprLY02 = DB::table('juals')
            ->whereMonth('tanggal_jual','04')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0102')
            ->sum('qty');

            $mayLY02 = DB::table('juals')
            ->whereMonth('tanggal_jual','05')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0102')
            ->sum('qty');

            $junLY02 = DB::table('juals')
            ->whereMonth('tanggal_jual','06')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0102')
            ->sum('qty');

            $julLY02 = DB::table('juals')
            ->whereMonth('tanggal_jual','07')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0102')
            ->sum('qty');

            $augLY02 = DB::table('juals')
            ->whereMonth('tanggal_jual','08')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0102')
            ->sum('qty');

            $sepLY02 = DB::table('juals')
            ->whereMonth('tanggal_jual','09')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0102')
            ->sum('qty');

            $octLY02 = DB::table('juals')
            ->whereMonth('tanggal_jual','10')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0102')
            ->sum('qty');

            $novLY02 = DB::table('juals')
            ->whereMonth('tanggal_jual','11')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0102')
            ->sum('qty');

            $decLY02 = DB::table('juals')
            ->whereMonth('tanggal_jual','12')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0102')
            ->sum('qty');

            $chartJual02 = new ChartJs;
            $chartJual02->title('Penjualan BMM By Months');
            $chartJual02->displaylegend(true);
            $chartJual02->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartJual02->dataset($tahun, 'line', [
                $jan02, $feb02, $mar02, $apr02, $may02, $jun02,
                $jul02, $aug02, $sep02, $oct02, $nov02, $dec02
            ])
            ->color("#233699")
            ->backgroundcolor("rgba(17,55,192,0.4)")
            ->linetension(0.0);

            $chartJual02->dataset($LY, 'line', [
                $janLY02, $febLY02, $marLY02, $aprLY02, $mayLY02, $junLY02,
                $julLY02, $augLY02, $sepLY02, $octLY02, $novLY02, $decLY02
            ])
            ->color("#EB9D22")
            ->backgroundcolor("rgba(231,180,24,0.4)")
            ->linetension(0.0);
            // END -----------------------------



            /*
            * CHART PENJUALAN UNIT UD HASANUDDIN
            */
            $jan04 = DB::table('juals')
            ->whereMonth('tanggal_jual','01')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty');

            $feb04 = DB::table('juals')
            ->whereMonth('tanggal_jual','02')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty');

            $mar04 = DB::table('juals')
            ->whereMonth('tanggal_jual','03')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty');

            $apr04 = DB::table('juals')
            ->whereMonth('tanggal_jual','04')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty');

            $may04 = DB::table('juals')
            ->whereMonth('tanggal_jual','05')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty');

            $jun04 = DB::table('juals')
            ->whereMonth('tanggal_jual','06')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty');

            $jul04 = DB::table('juals')
            ->whereMonth('tanggal_jual','07')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty');

            $aug04 = DB::table('juals')
            ->whereMonth('tanggal_jual','08')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty');

            $sep04 = DB::table('juals')
            ->whereMonth('tanggal_jual','09')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty');

            $oct04 = DB::table('juals')
            ->whereMonth('tanggal_jual','10')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty');

            $nov04 = DB::table('juals')
            ->whereMonth('tanggal_jual','11')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty');

            $dec04 = DB::table('juals')
            ->whereMonth('tanggal_jual','12')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty');

            //LAST YEAR 

            $janLY04 = DB::table('juals')
            ->whereMonth('tanggal_jual','01')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0104')
            ->sum('qty');

            $febLY04 = DB::table('juals')
            ->whereMonth('tanggal_jual','02')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0104')
            ->sum('qty');

            $marLY04 = DB::table('juals')
            ->whereMonth('tanggal_jual','03')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0104')
            ->sum('qty');

            $aprLY04 = DB::table('juals')
            ->whereMonth('tanggal_jual','04')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0104')
            ->sum('qty');

            $mayLY04 = DB::table('juals')
            ->whereMonth('tanggal_jual','05')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0104')
            ->sum('qty');

            $junLY04 = DB::table('juals')
            ->whereMonth('tanggal_jual','06')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0104')
            ->sum('qty');

            $julLY04 = DB::table('juals')
            ->whereMonth('tanggal_jual','07')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0104')
            ->sum('qty');

            $augLY04 = DB::table('juals')
            ->whereMonth('tanggal_jual','08')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0104')
            ->sum('qty');

            $sepLY04 = DB::table('juals')
            ->whereMonth('tanggal_jual','09')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0104')
            ->sum('qty');

            $octLY04 = DB::table('juals')
            ->whereMonth('tanggal_jual','10')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0104')
            ->sum('qty');

            $novLY04 = DB::table('juals')
            ->whereMonth('tanggal_jual','11')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0104')
            ->sum('qty');

            $decLY04 = DB::table('juals')
            ->whereMonth('tanggal_jual','12')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0104')
            ->sum('qty');

            $chartJual04 = new ChartJs;
            $chartJual04->title('Penjualan Hasanuddin By Months');
            $chartJual04->displaylegend(true);
            $chartJual04->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartJual04->dataset($tahun, 'line', [
                $jan04, $feb04, $mar04, $apr04, $may04, $jun04,
                $jul04, $aug04, $sep04, $oct04, $nov04, $dec04
            ])
            ->color("#233699")
            ->backgroundcolor("rgba(17,55,192,0.4)")
            ->linetension(0.0);

            $chartJual04->dataset($LY, 'line', [
                $janLY04, $febLY04, $marLY04, $aprLY04, $mayLY04, $junLY04,
                $julLY04, $augLY04, $sepLY04, $octLY04, $novLY04, $decLY04
            ])
            ->color("#EB9D22")
            ->backgroundcolor("rgba(231,180,24,0.4)")
            ->linetension(0.0);
            // END -----------------------------





            /*
            * CHART PENJUALAN UNIT TTS
            */
            $jan05 = DB::table('juals')
            ->whereMonth('tanggal_jual','01')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty');

            $feb05 = DB::table('juals')
            ->whereMonth('tanggal_jual','02')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty');

            $mar05 = DB::table('juals')
            ->whereMonth('tanggal_jual','03')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty');

            $apr05 = DB::table('juals')
            ->whereMonth('tanggal_jual','04')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty');

            $may05 = DB::table('juals')
            ->whereMonth('tanggal_jual','05')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty');

            $jun05 = DB::table('juals')
            ->whereMonth('tanggal_jual','06')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty');

            $jul05 = DB::table('juals')
            ->whereMonth('tanggal_jual','07')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty');

            $aug05 = DB::table('juals')
            ->whereMonth('tanggal_jual','08')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty');

            $sep05 = DB::table('juals')
            ->whereMonth('tanggal_jual','09')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty');

            $oct05 = DB::table('juals')
            ->whereMonth('tanggal_jual','10')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty');

            $nov05 = DB::table('juals')
            ->whereMonth('tanggal_jual','11')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty');

            $dec05 = DB::table('juals')
            ->whereMonth('tanggal_jual','12')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty');

            //LAST YEAR 

            $janLY05 = DB::table('juals')
            ->whereMonth('tanggal_jual','01')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0105')
            ->sum('qty');

            $febLY05 = DB::table('juals')
            ->whereMonth('tanggal_jual','02')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0105')
            ->sum('qty');

            $marLY05 = DB::table('juals')
            ->whereMonth('tanggal_jual','03')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0105')
            ->sum('qty');

            $aprLY05 = DB::table('juals')
            ->whereMonth('tanggal_jual','04')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0105')
            ->sum('qty');

            $mayLY05 = DB::table('juals')
            ->whereMonth('tanggal_jual','05')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0105')
            ->sum('qty');

            $junLY05 = DB::table('juals')
            ->whereMonth('tanggal_jual','06')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0105')
            ->sum('qty');

            $julLY05 = DB::table('juals')
            ->whereMonth('tanggal_jual','07')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0105')
            ->sum('qty');

            $augLY05 = DB::table('juals')
            ->whereMonth('tanggal_jual','08')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0105')
            ->sum('qty');

            $sepLY05 = DB::table('juals')
            ->whereMonth('tanggal_jual','09')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0105')
            ->sum('qty');

            $octLY05 = DB::table('juals')
            ->whereMonth('tanggal_jual','10')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0105')
            ->sum('qty');

            $novLY05 = DB::table('juals')
            ->whereMonth('tanggal_jual','11')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0105')
            ->sum('qty');

            $decLY05 = DB::table('juals')
            ->whereMonth('tanggal_jual','12')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0105')
            ->sum('qty');

            $chartJual05 = new ChartJs;
            $chartJual05->title('Penjualan TTS By Months');
            $chartJual05->displaylegend(true);
            $chartJual05->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartJual05->dataset($tahun, 'line', [
                $jan05, $feb05, $mar05, $apr05, $may05, $jun05,
                $jul05, $aug05, $sep05, $oct05, $nov05, $dec05
            ])
            ->color("#233699")
            ->backgroundcolor("rgba(17,55,192,0.4)")
            ->linetension(0.0);

            $chartJual05->dataset($LY, 'line', [
                $janLY05, $febLY05, $marLY05, $aprLY05, $mayLY05, $junLY05,
                $julLY05, $augLY05, $sepLY05, $octLY05, $novLY05, $decLY05
            ])
            ->color("#EB9D22")
            ->backgroundcolor("rgba(231,180,24,0.4)")
            ->linetension(0.0);
            // END -----------------------------




            /*
            * CHART PENJUALAN UNIT IMBO
            */
            $jan06 = DB::table('juals')
            ->whereMonth('tanggal_jual','01')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty');

            $feb06 = DB::table('juals')
            ->whereMonth('tanggal_jual','02')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty');

            $mar06 = DB::table('juals')
            ->whereMonth('tanggal_jual','03')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty');

            $apr06 = DB::table('juals')
            ->whereMonth('tanggal_jual','04')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty');

            $may06 = DB::table('juals')
            ->whereMonth('tanggal_jual','05')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty');

            $jun06 = DB::table('juals')
            ->whereMonth('tanggal_jual','06')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty');

            $jul06 = DB::table('juals')
            ->whereMonth('tanggal_jual','07')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty');

            $aug06 = DB::table('juals')
            ->whereMonth('tanggal_jual','08')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty');

            $sep06 = DB::table('juals')
            ->whereMonth('tanggal_jual','09')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty');

            $oct06 = DB::table('juals')
            ->whereMonth('tanggal_jual','10')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty');

            $nov06 = DB::table('juals')
            ->whereMonth('tanggal_jual','11')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty');

            $dec06 = DB::table('juals')
            ->whereMonth('tanggal_jual','12')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty');

            //LAST YEAR 

            $janLY06 = DB::table('juals')
            ->whereMonth('tanggal_jual','01')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0106')
            ->sum('qty');

            $febLY06 = DB::table('juals')
            ->whereMonth('tanggal_jual','02')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0106')
            ->sum('qty');

            $marLY06 = DB::table('juals')
            ->whereMonth('tanggal_jual','03')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0106')
            ->sum('qty');

            $aprLY06 = DB::table('juals')
            ->whereMonth('tanggal_jual','04')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0106')
            ->sum('qty');

            $mayLY06 = DB::table('juals')
            ->whereMonth('tanggal_jual','05')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0106')
            ->sum('qty');

            $junLY06 = DB::table('juals')
            ->whereMonth('tanggal_jual','06')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0106')
            ->sum('qty');

            $julLY06 = DB::table('juals')
            ->whereMonth('tanggal_jual','07')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0106')
            ->sum('qty');

            $augLY06 = DB::table('juals')
            ->whereMonth('tanggal_jual','08')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0106')
            ->sum('qty');

            $sepLY06 = DB::table('juals')
            ->whereMonth('tanggal_jual','09')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0106')
            ->sum('qty');

            $octLY06 = DB::table('juals')
            ->whereMonth('tanggal_jual','10')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0106')
            ->sum('qty');

            $novLY06 = DB::table('juals')
            ->whereMonth('tanggal_jual','11')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0106')
            ->sum('qty');

            $decLY06 = DB::table('juals')
            ->whereMonth('tanggal_jual','12')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0106')
            ->sum('qty');

            $chartJual06 = new ChartJs;
            $chartJual06->title('Penjualan Imbo By Months');
            $chartJual06->displaylegend(true);
            $chartJual06->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartJual06->dataset($tahun, 'line', [
                $jan06, $feb06, $mar06, $apr06, $may06, $jun06,
                $jul06, $aug06, $sep06, $oct06, $nov06, $dec06
            ])
            ->color("#233699")
            ->backgroundcolor("rgba(17,55,192,0.4)")
            ->linetension(0.0);

            $chartJual06->dataset($LY, 'line', [
                $janLY06, $febLY06, $marLY06, $aprLY06, $mayLY06, $junLY06,
                $julLY06, $augLY06, $sepLY06, $octLY06, $novLY06, $decLY06
            ])
            ->color("#EB9D22")
            ->backgroundcolor("rgba(231,180,24,0.4)")
            ->linetension(0.0);
            // END -----------------------------





            /*
            * CHART PENJUALAN UNIT MANDIRI
            */
            $jan07 = DB::table('juals')
            ->whereMonth('tanggal_jual','01')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty');

            $feb07 = DB::table('juals')
            ->whereMonth('tanggal_jual','02')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty');

            $mar07 = DB::table('juals')
            ->whereMonth('tanggal_jual','03')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty');

            $apr07 = DB::table('juals')
            ->whereMonth('tanggal_jual','04')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty');

            $may07 = DB::table('juals')
            ->whereMonth('tanggal_jual','05')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty');

            $jun07 = DB::table('juals')
            ->whereMonth('tanggal_jual','06')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty');

            $jul07 = DB::table('juals')
            ->whereMonth('tanggal_jual','07')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty');

            $aug07 = DB::table('juals')
            ->whereMonth('tanggal_jual','08')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty');

            $sep07 = DB::table('juals')
            ->whereMonth('tanggal_jual','09')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty');

            $oct07 = DB::table('juals')
            ->whereMonth('tanggal_jual','10')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty');

            $nov07 = DB::table('juals')
            ->whereMonth('tanggal_jual','11')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty');

            $dec07 = DB::table('juals')
            ->whereMonth('tanggal_jual','12')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty');

            //LAST YEAR 

            $janLY07 = DB::table('juals')
            ->whereMonth('tanggal_jual','01')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0107')
            ->sum('qty');

            $febLY07 = DB::table('juals')
            ->whereMonth('tanggal_jual','02')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0107')
            ->sum('qty');

            $marLY07 = DB::table('juals')
            ->whereMonth('tanggal_jual','03')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0107')
            ->sum('qty');

            $aprLY07 = DB::table('juals')
            ->whereMonth('tanggal_jual','04')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0107')
            ->sum('qty');

            $mayLY07 = DB::table('juals')
            ->whereMonth('tanggal_jual','05')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0107')
            ->sum('qty');

            $junLY07 = DB::table('juals')
            ->whereMonth('tanggal_jual','06')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0107')
            ->sum('qty');

            $julLY07 = DB::table('juals')
            ->whereMonth('tanggal_jual','07')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0107')
            ->sum('qty');

            $augLY07 = DB::table('juals')
            ->whereMonth('tanggal_jual','08')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0107')
            ->sum('qty');

            $sepLY07 = DB::table('juals')
            ->whereMonth('tanggal_jual','09')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0107')
            ->sum('qty');

            $octLY07 = DB::table('juals')
            ->whereMonth('tanggal_jual','10')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0107')
            ->sum('qty');

            $novLY07 = DB::table('juals')
            ->whereMonth('tanggal_jual','11')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0107')
            ->sum('qty');

            $decLY07 = DB::table('juals')
            ->whereMonth('tanggal_jual','12')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0107')
            ->sum('qty');

            $chartJual07 = new ChartJs;
            $chartJual07->title('Penjualan Mandiri By Months');
            $chartJual07->displaylegend(true);
            $chartJual07->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartJual07->dataset($tahun, 'line', [
                $jan07, $feb07, $mar07, $apr07, $may07, $jun07,
                $jul07, $aug07, $sep07, $oct07, $nov07, $dec07
            ])
            ->color("#233699")
            ->backgroundcolor("rgba(17,55,192,0.4)")
            ->linetension(0.0);

            $chartJual07->dataset($LY, 'line', [
                $janLY07, $febLY07, $marLY07, $aprLY07, $mayLY07, $junLY07,
                $julLY07, $augLY07, $sepLY07, $octLY07, $novLY07, $decLY07
            ])
            ->color("#EB9D22")
            ->backgroundcolor("rgba(231,180,24,0.4)")
            ->linetension(0.0);
            // END -----------------------------





            /*
            * CHART PENJUALAN UNIT WR
            */
            $jan08 = DB::table('juals')
            ->whereMonth('tanggal_jual','01')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty');

            $feb08 = DB::table('juals')
            ->whereMonth('tanggal_jual','02')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty');

            $mar08 = DB::table('juals')
            ->whereMonth('tanggal_jual','03')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty');

            $apr08 = DB::table('juals')
            ->whereMonth('tanggal_jual','04')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty');

            $may08 = DB::table('juals')
            ->whereMonth('tanggal_jual','05')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty');

            $jun08 = DB::table('juals')
            ->whereMonth('tanggal_jual','06')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty');

            $jul08 = DB::table('juals')
            ->whereMonth('tanggal_jual','07')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty');

            $aug08 = DB::table('juals')
            ->whereMonth('tanggal_jual','08')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty');

            $sep08 = DB::table('juals')
            ->whereMonth('tanggal_jual','09')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty');

            $oct08 = DB::table('juals')
            ->whereMonth('tanggal_jual','10')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty');

            $nov08 = DB::table('juals')
            ->whereMonth('tanggal_jual','11')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty');

            $dec08 = DB::table('juals')
            ->whereMonth('tanggal_jual','12')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty');

            //LAST YEAR 

            $janLY08 = DB::table('juals')
            ->whereMonth('tanggal_jual','01')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0108')
            ->sum('qty');

            $febLY08 = DB::table('juals')
            ->whereMonth('tanggal_jual','02')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0108')
            ->sum('qty');

            $marLY08 = DB::table('juals')
            ->whereMonth('tanggal_jual','03')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0108')
            ->sum('qty');

            $aprLY08 = DB::table('juals')
            ->whereMonth('tanggal_jual','04')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0108')
            ->sum('qty');

            $mayLY08 = DB::table('juals')
            ->whereMonth('tanggal_jual','05')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0108')
            ->sum('qty');

            $junLY08 = DB::table('juals')
            ->whereMonth('tanggal_jual','06')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0108')
            ->sum('qty');

            $julLY08 = DB::table('juals')
            ->whereMonth('tanggal_jual','07')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0108')
            ->sum('qty');

            $augLY08 = DB::table('juals')
            ->whereMonth('tanggal_jual','08')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0108')
            ->sum('qty');

            $sepLY08 = DB::table('juals')
            ->whereMonth('tanggal_jual','09')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0108')
            ->sum('qty');

            $octLY08 = DB::table('juals')
            ->whereMonth('tanggal_jual','10')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0108')
            ->sum('qty');

            $novLY08 = DB::table('juals')
            ->whereMonth('tanggal_jual','11')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0108')
            ->sum('qty');

            $decLY08 = DB::table('juals')
            ->whereMonth('tanggal_jual','12')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0108')
            ->sum('qty');

            $chartJual08 = new ChartJs;
            $chartJual08->title('Penjualan WR By Months');
            $chartJual08->displaylegend(true);
            $chartJual08->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartJual08->dataset($tahun, 'line', [
                $jan08, $feb08, $mar08, $apr08, $may08, $jun08,
                $jul08, $aug08, $sep08, $oct08, $nov08, $dec08
            ])
            ->color("#233699")
            ->backgroundcolor("rgba(17,55,192,0.4)")
            ->linetension(0.0);

            $chartJual08->dataset($LY, 'line', [
                $janLY08, $febLY08, $marLY08, $aprLY08, $mayLY08, $junLY08,
                $julLY08, $augLY08, $sepLY08, $octLY08, $novLY08, $decLY08
            ])
            ->color("#EB9D22")
            ->backgroundcolor("rgba(231,180,24,0.4)")
            ->linetension(0.0);
            // END -----------------------------






            /*
            * CHART PENJUALAN UNIT SUNSET
            */
            $jan09 = DB::table('juals')
            ->whereMonth('tanggal_jual','01')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty');

            $feb09 = DB::table('juals')
            ->whereMonth('tanggal_jual','02')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty');

            $mar09 = DB::table('juals')
            ->whereMonth('tanggal_jual','03')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty');

            $apr09 = DB::table('juals')
            ->whereMonth('tanggal_jual','04')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty');

            $may09 = DB::table('juals')
            ->whereMonth('tanggal_jual','05')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty');

            $jun09 = DB::table('juals')
            ->whereMonth('tanggal_jual','06')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty');

            $jul09 = DB::table('juals')
            ->whereMonth('tanggal_jual','07')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty');

            $aug09 = DB::table('juals')
            ->whereMonth('tanggal_jual','08')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty');

            $sep09 = DB::table('juals')
            ->whereMonth('tanggal_jual','09')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty');

            $oct09 = DB::table('juals')
            ->whereMonth('tanggal_jual','10')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty');

            $nov09 = DB::table('juals')
            ->whereMonth('tanggal_jual','11')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty');

            $dec09 = DB::table('juals')
            ->whereMonth('tanggal_jual','12')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty');

            //LAST YEAR 

            $janLY09 = DB::table('juals')
            ->whereMonth('tanggal_jual','01')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0109')
            ->sum('qty');

            $febLY09 = DB::table('juals')
            ->whereMonth('tanggal_jual','02')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0109')
            ->sum('qty');

            $marLY09 = DB::table('juals')
            ->whereMonth('tanggal_jual','03')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0109')
            ->sum('qty');

            $aprLY09 = DB::table('juals')
            ->whereMonth('tanggal_jual','04')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0109')
            ->sum('qty');

            $mayLY09 = DB::table('juals')
            ->whereMonth('tanggal_jual','05')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0109')
            ->sum('qty');

            $junLY09 = DB::table('juals')
            ->whereMonth('tanggal_jual','06')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0109')
            ->sum('qty');

            $julLY09 = DB::table('juals')
            ->whereMonth('tanggal_jual','07')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0109')
            ->sum('qty');

            $augLY09 = DB::table('juals')
            ->whereMonth('tanggal_jual','08')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0109')
            ->sum('qty');

            $sepLY09 = DB::table('juals')
            ->whereMonth('tanggal_jual','09')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0109')
            ->sum('qty');

            $octLY09 = DB::table('juals')
            ->whereMonth('tanggal_jual','10')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0109')
            ->sum('qty');

            $novLY09 = DB::table('juals')
            ->whereMonth('tanggal_jual','11')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0109')
            ->sum('qty');

            $decLY09 = DB::table('juals')
            ->whereMonth('tanggal_jual','12')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0109')
            ->sum('qty');

            $chartJual09 = new ChartJs;
            $chartJual09->title('Penjualan Sunset By Months');
            $chartJual09->displaylegend(true);
            $chartJual09->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartJual09->dataset($tahun, 'line', [
                $jan09, $feb09, $mar09, $apr09, $may09, $jun09,
                $jul09, $aug09, $sep09, $oct09, $nov09, $dec09
            ])
            ->color("#233699")
            ->backgroundcolor("rgba(17,55,192,0.4)")
            ->linetension(0.0);

            $chartJual09->dataset($LY, 'line', [
                $janLY09, $febLY09, $marLY09, $aprLY09, $mayLY09, $junLY09,
                $julLY09, $augLY09, $sepLY09, $octLY09, $novLY09, $decLY09
            ])
            ->color("#EB9D22")
            ->backgroundcolor("rgba(231,180,24,0.4)")
            ->linetension(0.0);
            // END -----------------------------



            /*
            * CHART PENJUALAN UNIT FLAGSHIP
            */
            $jan04F = DB::table('juals')
            ->whereMonth('tanggal_jual','01')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            $feb04F = DB::table('juals')
            ->whereMonth('tanggal_jual','02')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            $mar04F = DB::table('juals')
            ->whereMonth('tanggal_jual','03')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            $apr04F = DB::table('juals')
            ->whereMonth('tanggal_jual','04')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            $may04F = DB::table('juals')
            ->whereMonth('tanggal_jual','05')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            $jun04F = DB::table('juals')
            ->whereMonth('tanggal_jual','06')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            $jul04F = DB::table('juals')
            ->whereMonth('tanggal_jual','07')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            $aug04F = DB::table('juals')
            ->whereMonth('tanggal_jual','08')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            $sep04F = DB::table('juals')
            ->whereMonth('tanggal_jual','09')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            $oct04F = DB::table('juals')
            ->whereMonth('tanggal_jual','10')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            $nov04F = DB::table('juals')
            ->whereMonth('tanggal_jual','11')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            $dec04F = DB::table('juals')
            ->whereMonth('tanggal_jual','12')
            ->whereYear('tanggal_jual',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            //LAST YEAR 

            $janLY04F = DB::table('juals')
            ->whereMonth('tanggal_jual','01')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            $febLY04F = DB::table('juals')
            ->whereMonth('tanggal_jual','02')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            $marLY04F = DB::table('juals')
            ->whereMonth('tanggal_jual','03')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            $aprLY04F = DB::table('juals')
            ->whereMonth('tanggal_jual','04')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            $mayLY04F = DB::table('juals')
            ->whereMonth('tanggal_jual','05')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            $junLY04F = DB::table('juals')
            ->whereMonth('tanggal_jual','06')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            $julLY04F = DB::table('juals')
            ->whereMonth('tanggal_jual','07')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            $augLY04F = DB::table('juals')
            ->whereMonth('tanggal_jual','08')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            $sepLY04F = DB::table('juals')
            ->whereMonth('tanggal_jual','09')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            $octLY04F = DB::table('juals')
            ->whereMonth('tanggal_jual','10')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            $novLY04F = DB::table('juals')
            ->whereMonth('tanggal_jual','11')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            $decLY04F = DB::table('juals')
            ->whereMonth('tanggal_jual','12')
            ->whereYear('tanggal_jual',$LY)
            ->where('dealer_kode','AA0104F')
            ->sum('qty');

            $chartJual04F = new ChartJs;
            $chartJual04F->title('Penjualan Flagship By Months');
            $chartJual04F->displaylegend(true);
            $chartJual04F->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartJual04F->dataset($tahun, 'line', [
                $jan04F, $feb04F, $mar04F, $apr04F, $may04F, $jun04F,
                $jul04F, $aug04F, $sep04F, $oct04F, $nov04F, $dec04F
            ])
            ->color("#233699")
            ->backgroundcolor("rgba(17,55,192,0.4)")
            ->linetension(0.0);

            $chartJual04F->dataset($LY, 'line', [
                $janLY04F, $febLY04F, $marLY04F, $aprLY04F, $mayLY04F, $junLY04F,
                $julLY04F, $augLY04F, $sepLY04F, $octLY04F, $novLY04F, $decLY04F
            ])
            ->color("#EB9D22")
            ->backgroundcolor("rgba(231,180,24,0.4)")
            ->linetension(0.0);
            // END -----------------------------






            /*
            * CHART MASUK UNIT
            */
            $janM = DB::table('masuks')
            ->whereMonth('tanggal_masuk','01')
            ->whereYear('tanggal_masuk',$tahun)
            ->sum('qty_in');

            $febM = DB::table('masuks')
            ->whereMonth('tanggal_masuk','02')
            ->whereYear('tanggal_masuk',$tahun)
            ->sum('qty_in');

            $marM = DB::table('masuks')
            ->whereMonth('tanggal_masuk','03')
            ->whereYear('tanggal_masuk',$tahun)
            ->sum('qty_in');

            $aprM = DB::table('masuks')
            ->whereMonth('tanggal_masuk','04')
            ->whereYear('tanggal_masuk',$tahun)
            ->sum('qty_in');

            $mayM = DB::table('masuks')
            ->whereMonth('tanggal_masuk','05')
            ->whereYear('tanggal_masuk',$tahun)
            ->sum('qty_in');

            $junM = DB::table('masuks')
            ->whereMonth('tanggal_masuk','06')
            ->whereYear('tanggal_masuk',$tahun)
            ->sum('qty_in');

            $julM = DB::table('masuks')
            ->whereMonth('tanggal_masuk','07')
            ->whereYear('tanggal_masuk',$tahun)
            ->sum('qty_in');

            $augM = DB::table('masuks')
            ->whereMonth('tanggal_masuk','08')
            ->whereYear('tanggal_masuk',$tahun)
            ->sum('qty_in');

            $sepM = DB::table('masuks')
            ->whereMonth('tanggal_masuk','09')
            ->whereYear('tanggal_masuk',$tahun)
            ->sum('qty_in');

            $octM = DB::table('masuks')
            ->whereMonth('tanggal_masuk','10')
            ->whereYear('tanggal_masuk',$tahun)
            ->sum('qty_in');

            $novM = DB::table('masuks')
            ->whereMonth('tanggal_masuk','11')
            ->whereYear('tanggal_masuk',$tahun)
            ->sum('qty_in');

            $decM = DB::table('masuks')
            ->whereMonth('tanggal_masuk','12')
            ->whereYear('tanggal_masuk',$tahun)
            ->sum('qty_in');

            $chartMasuk = new ChartJs;
            $chartMasuk->title('Unit Masuk By Months');
            $chartMasuk->displaylegend(true);
            $chartMasuk->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartMasuk->dataset($tahun, 'line', [
                $janM, $febM, $marM, $aprM, $mayM, $junM,
                $julM, $augM, $sepM, $octM, $novM, $decM
            ])
            ->color("#233699")
            ->backgroundcolor("#2CBD99");

            /*
            * CHART KELUAR UNIT
            */
            $janK = DB::table('keluars')
            ->whereMonth('tanggal_keluar','01')
            ->whereYear('tanggal_keluar',$tahun)
            ->sum('qty_out');

            $febK = DB::table('keluars')
            ->whereMonth('tanggal_keluar','02')
            ->whereYear('tanggal_keluar',$tahun)
            ->sum('qty_out');

            $marK = DB::table('keluars')
            ->whereMonth('tanggal_keluar','03')
            ->whereYear('tanggal_keluar',$tahun)
            ->sum('qty_out');

            $aprK = DB::table('keluars')
            ->whereMonth('tanggal_keluar','04')
            ->whereYear('tanggal_keluar',$tahun)
            ->sum('qty_out');

            $mayK = DB::table('keluars')
            ->whereMonth('tanggal_keluar','05')
            ->whereYear('tanggal_keluar',$tahun)
            ->sum('qty_out');

            $junK = DB::table('keluars')
            ->whereMonth('tanggal_keluar','06')
            ->whereYear('tanggal_keluar',$tahun)
            ->sum('qty_out');

            $julK = DB::table('keluars')
            ->whereMonth('tanggal_keluar','07')
            ->whereYear('tanggal_keluar',$tahun)
            ->sum('qty_out');

            $augK = DB::table('keluars')
            ->whereMonth('tanggal_keluar','08')
            ->whereYear('tanggal_keluar',$tahun)
            ->sum('qty_out');

            $sepK = DB::table('keluars')
            ->whereMonth('tanggal_keluar','09')
            ->whereYear('tanggal_keluar',$tahun)
            ->sum('qty_out');

            $octK = DB::table('keluars')
            ->whereMonth('tanggal_keluar','10')
            ->whereYear('tanggal_keluar',$tahun)
            ->sum('qty_out');

            $novK = DB::table('keluars')
            ->whereMonth('tanggal_keluar','11')
            ->whereYear('tanggal_keluar',$tahun)
            ->sum('qty_out');

            $decK = DB::table('keluars')
            ->whereMonth('tanggal_keluar','12')
            ->whereYear('tanggal_keluar',$tahun)
            ->sum('qty_out');

            $chartKeluar = new ChartJs;
            $chartKeluar->title('Unit Keluar By Months');
            $chartKeluar->displaylegend(true);
            $chartKeluar->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartKeluar->dataset($tahun, 'line', [
                $janK, $febK, $marK, $aprK, $mayK, $junK,
                $julK, $augK, $sepK, $octK, $novK, $decK
            ])
            ->color("#AC1616")
            ->backgroundcolor("#DC2F4B");



            /*
            * CHART MASUK UNIT
            */
            $janM01 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','01')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty_in');

            $febM01 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','02')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty_in');

            $marM01 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','03')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty_in');

            $aprM01 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','04')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty_in');

            $mayM01 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','05')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty_in');

            $junM01 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','06')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty_in');

            $julM01 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','07')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty_in');

            $augM01 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','08')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty_in');

            $sepM01 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','09')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty_in');

            $octM01 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','10')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty_in');

            $novM01 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','11')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty_in');

            $decM01 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','12')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty_in');

            $chartMasuk01 = new ChartJs;
            $chartMasuk01->title('Unit Masuk Sentral By Months');
            $chartMasuk01->displaylegend(true);
            $chartMasuk01->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartMasuk01->dataset($tahun, 'line', [
                $janM01, $febM01, $marM01, $aprM01, $mayM01, $junM01,
                $julM01, $augM01, $sepM01, $octM01, $novM01, $decM01
            ])
            ->color("#233699")
            ->backgroundcolor("#2CBD99");

            /*
            * CHART KELUAR UNIT
            */
            $janK01 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','01')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty_out');

            $febK01 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','02')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty_out');

            $marK01 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','03')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty_out');

            $aprK01 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','04')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty_out');

            $mayK01 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','05')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty_out');

            $junK01 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','06')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty_out');

            $julK01 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','07')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty_out');

            $augK01 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','08')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty_out');

            $sepK01 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','09')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty_out');

            $octK01 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','10')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty_out');

            $novK01 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','11')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty_out');

            $decK01 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','12')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('qty_out');

            $chartKeluar01 = new ChartJs;
            $chartKeluar01->title('Unit Keluar Sentral By Months');
            $chartKeluar01->displaylegend(true);
            $chartKeluar01->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartKeluar01->dataset($tahun, 'line', [
                $janK01, $febK01, $marK01, $aprK01, $mayK01, $junK01,
                $julK01, $augK01, $sepK01, $octK01, $novK01, $decK01
            ])
            ->color("#AC1616")
            ->backgroundcolor("#DC2F4B");





            /*
            * CHART MASUK UNIT
            */
            $janM02 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','01')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty_in');

            $febM02 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','02')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty_in');

            $marM02 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','03')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty_in');

            $aprM02 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','04')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty_in');

            $mayM02 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','05')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty_in');

            $junM02 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','06')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty_in');

            $julM02 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','07')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty_in');

            $augM02 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','08')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty_in');

            $sepM02 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','09')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty_in');

            $octM02 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','10')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty_in');

            $novM02 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','11')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty_in');

            $decM02 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','12')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty_in');

            $chartMasuk02 = new ChartJs;
            $chartMasuk02->title('Unit Masuk BMM By Months');
            $chartMasuk02->displaylegend(true);
            $chartMasuk02->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartMasuk02->dataset($tahun, 'line', [
                $janM02, $febM02, $marM02, $aprM02, $mayM02, $junM02,
                $julM02, $augM02, $sepM02, $octM02, $novM02, $decM02
            ])
            ->color("#233699")
            ->backgroundcolor("#2CBD99");

            /*
            * CHART KELUAR UNIT
            */
            $janK02 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','01')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty_out');

            $febK02 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','02')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty_out');

            $marK02 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','03')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty_out');

            $aprK02 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','04')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty_out');

            $mayK02 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','05')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty_out');

            $junK02 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','06')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty_out');

            $julK02 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','07')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty_out');

            $augK02 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','08')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty_out');

            $sepK02 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','09')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty_out');

            $octK02 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','10')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty_out');

            $novK02 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','11')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty_out');

            $decK02 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','12')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('qty_out');

            $chartKeluar02 = new ChartJs;
            $chartKeluar02->title('Unit Keluar BMM By Months');
            $chartKeluar02->displaylegend(true);
            $chartKeluar02->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartKeluar02->dataset($tahun, 'line', [
                $janK02, $febK02, $marK02, $aprK02, $mayK02, $junK02,
                $julK02, $augK02, $sepK02, $octK02, $novK02, $decK02
            ])
            ->color("#AC1616")
            ->backgroundcolor("#DC2F4B");




            /*
            * CHART MASUK UNIT
            */
            $janM04 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','01')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty_in');

            $febM04 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','02')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty_in');

            $marM04 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','03')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty_in');

            $aprM04 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','04')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty_in');

            $mayM04 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','05')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty_in');

            $junM04 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','06')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty_in');

            $julM04 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','07')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty_in');

            $augM04 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','08')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty_in');

            $sepM04 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','09')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty_in');

            $octM04 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','10')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty_in');

            $novM04 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','11')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty_in');

            $decM04 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','12')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty_in');

            $chartMasuk04 = new ChartJs;
            $chartMasuk04->title('Unit Masuk Hasanuddin By Months');
            $chartMasuk04->displaylegend(true);
            $chartMasuk04->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartMasuk04->dataset($tahun, 'line', [
                $janM04, $febM04, $marM04, $apr04, $may04, $junM04,
                $julM04, $augM04, $sepM04, $octM04, $novM04, $decM04
            ])
            ->color("#233699")
            ->backgroundcolor("#2CBD99");

            /*
            * CHART KELUAR UNIT
            */
            $janK04 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','01')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty_out');

            $febK04 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','02')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty_out');

            $marK04 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','03')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty_out');

            $aprK04 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','04')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty_out');

            $mayK04 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','05')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty_out');

            $junK04 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','06')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty_out');

            $julK04 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','07')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty_out');

            $augK04 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','08')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty_out');

            $sepK04 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','09')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty_out');

            $octK04 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','10')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty_out');

            $novK04 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','11')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty_out');

            $decK04 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','12')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('qty_out');

            $chartKeluar04 = new ChartJs;
            $chartKeluar04->title('Unit Keluar Hasanuddin By Months');
            $chartKeluar04->displaylegend(true);
            $chartKeluar04->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartKeluar04->dataset($tahun, 'line', [
                $janK04, $febK04, $marK04, $aprK04, $mayK04, $junK04,
                $julK04, $augK04, $sepK04, $octK04, $novK04, $decK04
            ])
            ->color("#AC1616")
            ->backgroundcolor("#DC2F4B");




            /*
            * CHART MASUK UNIT
            */
            $janM05 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','01')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty_in');

            $febM05 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','02')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty_in');

            $marM05 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','03')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty_in');

            $aprM05 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','04')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty_in');

            $mayM05 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','05')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty_in');

            $junM05 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','06')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty_in');

            $julM05 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','07')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty_in');

            $augM05 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','08')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty_in');

            $sepM05 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','09')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty_in');

            $octM05 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','10')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty_in');

            $novM05 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','11')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty_in');

            $decM05 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','12')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty_in');

            $chartMasuk05 = new ChartJs;
            $chartMasuk05->title('Unit Masuk TTS By Months');
            $chartMasuk05->displaylegend(true);
            $chartMasuk05->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartMasuk05->dataset($tahun, 'line', [
                $janM05, $febM05, $marM05, $aprM05, $mayM05, $junM05,
                $julM05, $augM05, $sepM05, $octM05, $novM05, $decM05
            ])
            ->color("#233699")
            ->backgroundcolor("#2CBD99");

            /*
            * CHART KELUAR UNIT
            */
            $janK05 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','01')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty_out');

            $febK05 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','02')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty_out');

            $marK05 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','03')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty_out');

            $aprK05 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','04')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty_out');

            $mayK05 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','05')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty_out');

            $junK05 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','06')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty_out');

            $julK05 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','07')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty_out');

            $augK05 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','08')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty_out');

            $sepK05 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','09')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty_out');

            $octK05 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','10')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty_out');

            $novK05 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','11')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty_out');

            $decK05 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','12')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('qty_out');

            $chartKeluar05 = new ChartJs;
            $chartKeluar05->title('Unit Keluar TTS By Months');
            $chartKeluar05->displaylegend(true);
            $chartKeluar05->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartKeluar05->dataset($tahun, 'line', [
                $janK05, $febK05, $marK05, $aprK05, $mayK05, $junK05,
                $julK05, $augK05, $sepK05, $octK05, $novK05, $decK05
            ])
            ->color("#AC1616")
            ->backgroundcolor("#DC2F4B");




            /*
            * CHART MASUK UNIT
            */
            $janM06 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','01')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty_in');

            $febM06 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','02')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty_in');

            $marM06 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','03')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty_in');

            $aprM06 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','04')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty_in');

            $mayM06 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','05')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty_in');

            $junM06 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','06')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty_in');

            $julM06 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','07')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty_in');

            $augM06 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','08')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty_in');

            $sepM06 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','09')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty_in');

            $octM06 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','10')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty_in');

            $novM06 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','11')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty_in');

            $decM06 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','12')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty_in');

            $chartMasuk06 = new ChartJs;
            $chartMasuk06->title('Unit Masuk Imbo By Months');
            $chartMasuk06->displaylegend(true);
            $chartMasuk06->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartMasuk06->dataset($tahun, 'line', [
                $janM06, $febM06, $marM06, $aprM06, $mayM06, $junM06,
                $julM06, $augM06, $sepM06, $octM06, $novM06, $decM06
            ])
            ->color("#233699")
            ->backgroundcolor("#2CBD99");

            /*
            * CHART KELUAR UNIT
            */
            $janK06 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','01')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty_out');

            $febK06 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','02')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty_out');

            $marK06 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','03')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty_out');

            $aprK06 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','04')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty_out');

            $mayK06 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','05')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty_out');

            $junK06 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','06')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty_out');

            $julK06 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','07')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty_out');

            $augK06 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','08')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty_out');

            $sepK06 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','09')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty_out');

            $octK06 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','10')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty_out');

            $novK06 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','11')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty_out');

            $decK06 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','12')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('qty_out');

            $chartKeluar06 = new ChartJs;
            $chartKeluar06->title('Unit Keluar Imbo By Months');
            $chartKeluar06->displaylegend(true);
            $chartKeluar06->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartKeluar06->dataset($tahun, 'line', [
                $janK06, $febK06, $marK06, $aprK06, $mayK06, $junK06,
                $julK06, $augK06, $sepK06, $octK06, $novK06, $decK06
            ])
            ->color("#AC1616")
            ->backgroundcolor("#DC2F4B");



            /*
            * CHART MASUK UNIT
            */
            $janM07 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','01')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty_in');

            $febM07 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','02')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty_in');

            $marM07 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','03')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty_in');

            $aprM07 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','04')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty_in');

            $mayM07 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','05')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty_in');

            $junM07 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','06')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty_in');

            $julM07 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','07')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty_in');

            $augM07 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','08')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty_in');

            $sepM07 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','09')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty_in');

            $octM07 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','10')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty_in');

            $novM07 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','11')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty_in');

            $decM07 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','12')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty_in');

            $chartMasuk07 = new ChartJs;
            $chartMasuk07->title('Unit Masuk Mandiri By Months');
            $chartMasuk07->displaylegend(true);
            $chartMasuk07->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartMasuk07->dataset($tahun, 'line', [
                $janM07, $febM07, $marM07, $aprM07, $mayM07, $junM07,
                $julM07, $augM07, $sepM07, $octM07, $novM07, $decM07
            ])
            ->color("#233699")
            ->backgroundcolor("#2CBD99");

            /*
            * CHART KELUAR UNIT
            */
            $janK07 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','01')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty_out');

            $febK07 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','02')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty_out');

            $marK07 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','03')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty_out');

            $aprK07 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','04')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty_out');

            $mayK07 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','05')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty_out');

            $junK07 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','06')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty_out');

            $julK07 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','07')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty_out');

            $augK07 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','08')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty_out');

            $sepK07 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','09')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty_out');

            $octK07 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','10')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty_out');

            $novK07 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','11')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty_out');

            $decK07 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','12')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('qty_out');

            $chartKeluar07 = new ChartJs;
            $chartKeluar07->title('Unit Keluar Mandiri By Months');
            $chartKeluar07->displaylegend(true);
            $chartKeluar07->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartKeluar07->dataset($tahun, 'line', [
                $janK07, $febK07, $marK07, $aprK07, $mayK07, $junK07,
                $julK07, $augK07, $sepK07, $octK07, $novK07, $decK07
            ])
            ->color("#AC1616")
            ->backgroundcolor("#DC2F4B");




            /*
            * CHART MASUK UNIT
            */
            $janM08 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','01')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty_in');

            $febM08 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','02')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty_in');

            $marM08 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','03')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty_in');

            $aprM08 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','04')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty_in');

            $mayM08 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','05')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty_in');

            $junM08 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','06')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty_in');

            $julM08 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','07')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty_in');

            $augM08 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','08')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty_in');

            $sepM08 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','09')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty_in');

            $octM08 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','10')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty_in');

            $novM08 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','11')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty_in');

            $decM08 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','12')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty_in');

            $chartMasuk08 = new ChartJs;
            $chartMasuk08->title('Unit Masuk WR By Months');
            $chartMasuk08->displaylegend(true);
            $chartMasuk08->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartMasuk08->dataset($tahun, 'line', [
                $janM08, $febM08, $marM08, $aprM08, $mayM08, $junM08,
                $julM08, $augM08, $sepM08, $octM08, $novM08, $decM08
            ])
            ->color("#233699")
            ->backgroundcolor("#2CBD99");

            /*
            * CHART KELUAR UNIT
            */
            $janK08 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','01')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty_out');

            $febK08 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','02')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty_out');

            $marK08 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','03')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty_out');

            $aprK08 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','04')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty_out');

            $mayK08 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','05')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty_out');

            $junK08 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','06')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty_out');

            $julK08 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','07')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty_out');

            $augK08 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','08')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty_out');

            $sepK08 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','09')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty_out');

            $octK08 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','10')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty_out');

            $novK08 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','11')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty_out');

            $decK08 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','12')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('qty_out');

            $chartKeluar08 = new ChartJs;
            $chartKeluar08->title('Unit Keluar WR By Months');
            $chartKeluar08->displaylegend(true);
            $chartKeluar08->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartKeluar08->dataset($tahun, 'line', [
                $janK08, $febK08, $marK08, $aprK08, $mayK08, $junK08,
                $julK08, $augK08, $sepK08, $octK08, $novK08, $decK08
            ])
            ->color("#AC1616")
            ->backgroundcolor("#DC2F4B");




            /*
            * CHART MASUK UNIT
            */
            $janM09 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','01')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty_in');

            $febM09 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','02')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty_in');

            $marM09 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','03')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty_in');

            $aprM09 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','04')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty_in');

            $mayM09 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','05')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty_in');

            $junM09 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','06')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty_in');

            $julM09 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','07')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty_in');

            $augM09 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','08')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty_in');

            $sepM09 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','09')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty_in');

            $octM09 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','10')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty_in');

            $novM09 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','11')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty_in');

            $decM09 = DB::table('masuks')
            ->whereMonth('tanggal_masuk','12')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty_in');

            $chartMasuk09 = new ChartJs;
            $chartMasuk09->title('Unit Masuk Sunset By Months');
            $chartMasuk09->displaylegend(true);
            $chartMasuk09->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartMasuk09->dataset($tahun, 'line', [
                $janM09, $febM09, $marM09, $aprM09, $mayM09, $junM09,
                $julM09, $augM09, $sepM09, $octM09, $novM09, $decM09
            ])
            ->color("#233699")
            ->backgroundcolor("#2CBD99");

            /*
            * CHART KELUAR UNIT
            */
            $janK09 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','01')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty_out');

            $febK09 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','02')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty_out');

            $marK09 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','03')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty_out');

            $aprK09 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','04')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty_out');

            $mayK09 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','05')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty_out');

            $junK09 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','06')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty_out');

            $julK09 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','07')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty_out');

            $augK09 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','08')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty_out');

            $sepK09 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','09')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty_out');

            $octK09 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','10')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty_out');

            $novK09 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','11')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty_out');

            $decK09 = DB::table('keluars')
            ->whereMonth('tanggal_keluar','12')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('qty_out');

            $chartKeluar09 = new ChartJs;
            $chartKeluar09->title('Unit Keluar Sunset By Months');
            $chartKeluar09->displaylegend(true);
            $chartKeluar09->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartKeluar09->dataset($tahun, 'line', [
                $janK09, $febK09, $marK09, $aprK09, $mayK09, $junK09,
                $julK09, $augK09, $sepK09, $octK09, $novK09, $decK09
            ])
            ->color("#AC1616")
            ->backgroundcolor("#DC2F4B");


            /*
            * CHART MASUK UNIT
            */
            $janM04F = DB::table('masuks')
            ->whereMonth('tanggal_masuk','01')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty_in');

            $febM04F = DB::table('masuks')
            ->whereMonth('tanggal_masuk','02')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty_in');

            $marM04F = DB::table('masuks')
            ->whereMonth('tanggal_masuk','03')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty_in');

            $aprM04F = DB::table('masuks')
            ->whereMonth('tanggal_masuk','04')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty_in');

            $mayM04F = DB::table('masuks')
            ->whereMonth('tanggal_masuk','05')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty_in');

            $junM04F = DB::table('masuks')
            ->whereMonth('tanggal_masuk','06')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty_in');

            $julM04F = DB::table('masuks')
            ->whereMonth('tanggal_masuk','07')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty_in');

            $augM04F = DB::table('masuks')
            ->whereMonth('tanggal_masuk','08')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty_in');

            $sepM04F = DB::table('masuks')
            ->whereMonth('tanggal_masuk','09')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty_in');

            $octM04F = DB::table('masuks')
            ->whereMonth('tanggal_masuk','10')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty_in');

            $novM04F = DB::table('masuks')
            ->whereMonth('tanggal_masuk','11')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty_in');

            $decM04F = DB::table('masuks')
            ->whereMonth('tanggal_masuk','12')
            ->whereYear('tanggal_masuk',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty_in');

            $chartMasuk04F = new ChartJs;
            $chartMasuk04F->title('Unit Masuk Flagship By Months');
            $chartMasuk04F->displaylegend(true);
            $chartMasuk04F->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartMasuk04F->dataset($tahun, 'line', [
                $janM04F, $febM04F, $marM04F, $aprM04F, $mayM04F, $junM04F,
                $julM04F, $augM04F, $sepM04F, $octM04F, $novM04F, $decM04F
            ])
            ->color("#233699")
            ->backgroundcolor("#2CBD99");

            /*
            * CHART KELUAR UNIT
            */
            $janK04F = DB::table('keluars')
            ->whereMonth('tanggal_keluar','01')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty_out');

            $febK04F = DB::table('keluars')
            ->whereMonth('tanggal_keluar','02')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty_out');

            $marK04F = DB::table('keluars')
            ->whereMonth('tanggal_keluar','03')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty_out');

            $aprK04F = DB::table('keluars')
            ->whereMonth('tanggal_keluar','04')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty_out');

            $mayK04F = DB::table('keluars')
            ->whereMonth('tanggal_keluar','05')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty_out');

            $junK04F = DB::table('keluars')
            ->whereMonth('tanggal_keluar','06')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty_out');

            $julK04F = DB::table('keluars')
            ->whereMonth('tanggal_keluar','07')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty_out');

            $augK04F = DB::table('keluars')
            ->whereMonth('tanggal_keluar','08')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty_out');

            $sepK04F = DB::table('keluars')
            ->whereMonth('tanggal_keluar','09')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty_out');

            $octK04F = DB::table('keluars')
            ->whereMonth('tanggal_keluar','10')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty_out');

            $novK04F = DB::table('keluars')
            ->whereMonth('tanggal_keluar','11')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty_out');

            $decK04F = DB::table('keluars')
            ->whereMonth('tanggal_keluar','12')
            ->whereYear('tanggal_keluar',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('qty_out');

            $chartKeluar04F = new ChartJs;
            $chartKeluar04F->title('Unit Keluar Flagship By Months');
            $chartKeluar04F->displaylegend(true);
            $chartKeluar04F->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartKeluar04F->dataset($tahun, 'line', [
                $janK04F, $febK04F, $marK04F, $aprK04F, $mayK04F, $junK04F,
                $julK04F, $augK04F, $sepK04F, $octK04F, $novK04F, $decK04F
            ])
            ->color("#AC1616")
            ->backgroundcolor("#DC2F4B");




            // CHART SERVICE
            $Sjan = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','01')
            ->whereYear('tanggal_fs',$tahun)
            ->sum('service');
            $Sfeb = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','02')
            ->whereYear('tanggal_fs',$tahun)
            ->sum('service');
            $Smar = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','03')
            ->whereYear('tanggal_fs',$tahun)
            ->sum('service');
            $Sapr = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','04')
            ->whereYear('tanggal_fs',$tahun)
            ->sum('service');
            $Smay = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','05')
            ->whereYear('tanggal_fs',$tahun)
            ->sum('service');
            $Sjun = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','06')
            ->whereYear('tanggal_fs',$tahun)
            ->sum('service');
            $Sjul = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','07')
            ->whereYear('tanggal_fs',$tahun)
            ->sum('service');
            $Saug = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','08')
            ->whereYear('tanggal_fs',$tahun)
            ->sum('service');
            $Ssep = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','09')
            ->whereYear('tanggal_fs',$tahun)
            ->sum('service');
            $Soct = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','10')
            ->whereYear('tanggal_fs',$tahun)
            ->sum('service');
            $Snov = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','11')
            ->whereYear('tanggal_fs',$tahun)
            ->sum('service');
            $Sdec = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','12')
            ->whereYear('tanggal_fs',$tahun)
            ->sum('service');

            // LAST YEAR

            $SjanLY = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','01')
            ->whereYear('tanggal_fs',$LY)
            ->sum('service');
            $SfebLY = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','02')
            ->whereYear('tanggal_fs',$LY)
            ->sum('service');
            $SmarLY = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','03')
            ->whereYear('tanggal_fs',$LY)
            ->sum('service');
            $SaprLY = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','04')
            ->whereYear('tanggal_fs',$LY)
            ->sum('service');
            $SmayLY = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','05')
            ->whereYear('tanggal_fs',$LY)
            ->sum('service');
            $SjunLY = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','06')
            ->whereYear('tanggal_fs',$LY)
            ->sum('service');
            $SjulLY = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','07')
            ->whereYear('tanggal_fs',$LY)
            ->sum('service');
            $SaugLY = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','08')
            ->whereYear('tanggal_fs',$LY)
            ->sum('service');
            $SsepLY = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','09')
            ->whereYear('tanggal_fs',$LY)
            ->sum('service');
            $SoctLY = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','10')
            ->whereYear('tanggal_fs',$LY)
            ->sum('service');
            $SnovLY = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','11')
            ->whereYear('tanggal_fs',$LY)
            ->sum('service');
            $SdecLY = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','12')
            ->whereYear('tanggal_fs',$LY)
            ->sum('service');

            $chartService = new ChartJs;
            $chartService->title('Service By Months');
            $chartService->displaylegend(true);
            $chartService->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartService->dataset($tahun, 'bar', [
                $Sjan, $Sfeb, $Smar, $Sapr, $Smay, $Sjun,
                $Sjul, $Saug, $Ssep, $Soct, $Snov, $Sdec
            ])
            ->color([
                "#171791","#484FE1","#227DE3","#234C8A","#436ABA","#162FAB",
                "#2581B0","#5939D0","#4F3BB6","#2E3875","#253BDD","#1E36C6"
            ])
            ->backgroundcolor([
                "#171791","#484FE1","#227DE3","#234C8A","#436ABA","#162FAB",
                "#2581B0","#5939D0","#4F3BB6","#2E3875","#253BDD","#1E36C6"
            ]);

            $chartService->dataset($LY, 'bar', [
                $SjanLY, $SfebLY, $SmarLY, $SaprLY, $SmayLY, $SjunLY,
                $SjulLY, $SaugLY, $SsepLY, $SoctLY, $SnovLY, $SdecLY
            ])
            ->color("#010101")
            ->backgroundcolor("#010101");
            // END -------------------------------



            // CHART SERVICE
            $Sjan01 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','01')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('service');
            $Sfeb01 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','02')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('service');
            $Smar01 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','03')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('service');
            $Sapr01 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','04')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('service');
            $Smay01 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','05')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('service');
            $Sjun01 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','06')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('service');
            $Sjul01 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','07')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('service');
            $Saug01 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','08')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('service');
            $Ssep01 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','09')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('service');
            $Soct01 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','10')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('service');
            $Snov01 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','11')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('service');
            $Sdec01 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','12')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0101')
            ->sum('service');

            // LAST YEAR

            $SjanLY01 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','01')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0101')
            ->sum('service');
            $SfebLY01 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','02')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0101')
            ->sum('service');
            $SmarLY01 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','03')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0101')
            ->sum('service');
            $SaprLY01 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','04')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0101')
            ->sum('service');
            $SmayLY01 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','05')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0101')
            ->sum('service');
            $SjunLY01 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','06')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0101')
            ->sum('service');
            $SjulLY01 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','07')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0101')
            ->sum('service');
            $SaugLY01 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','08')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0101')
            ->sum('service');
            $SsepLY01 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','09')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0101')
            ->sum('service');
            $SoctLY01 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','10')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0101')
            ->sum('service');
            $SnovLY01 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','11')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0101')
            ->sum('service');
            $SdecLY01 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','12')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0101')
            ->sum('service');

            $chartService01 = new ChartJs;
            $chartService01->title('Service Sentral By Months');
            $chartService01->displaylegend(true);
            $chartService01->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartService01->dataset($tahun, 'bar', [
                $Sjan01, $Sfeb01, $Smar01, $Sapr01, $Smay01, $Sjun01,
                $Sjul01, $Saug01, $Ssep01, $Soct01, $Snov01, $Sdec01
            ])
            ->color([
                "#171791","#484FE1","#227DE3","#234C8A","#436ABA","#162FAB",
                "#2581B0","#5939D0","#4F3BB6","#2E3875","#253BDD","#1E36C6"
            ])
            ->backgroundcolor([
                "#171791","#484FE1","#227DE3","#234C8A","#436ABA","#162FAB",
                "#2581B0","#5939D0","#4F3BB6","#2E3875","#253BDD","#1E36C6"
            ]);

            $chartService01->dataset($LY, 'bar', [
                $SjanLY01, $SfebLY01, $SmarLY01, $SaprLY01, $SmayLY01, $SjunLY01,
                $SjulLY01, $SaugLY01, $SsepLY01, $SoctLY01, $SnovLY01, $SdecLY01
            ])
            ->color("#010101")
            ->backgroundcolor("#010101");
            // END -------------------------------




            // CHART SERVICE
            $Sjan02 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','01')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('service');
            $Sfeb02 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','02')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('service');
            $Smar02 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','03')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('service');
            $Sapr02 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','04')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('service');
            $Smay02 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','05')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('service');
            $Sjun02 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','06')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('service');
            $Sjul02 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','07')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('service');
            $Saug02 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','08')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('service');
            $Ssep02 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','09')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('service');
            $Soct02 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','10')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('service');
            $Snov02 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','11')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('service');
            $Sdec02 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','12')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('service');

            // LAST YEAR

            $SjanLY02 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','01')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0102')
            ->sum('service');
            $SfebLY02 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','02')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0102')
            ->sum('service');
            $SmarLY02 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','03')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0102')
            ->sum('service');
            $SaprLY02 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','04')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0102')
            ->sum('service');
            $SmayLY02 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','05')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0102')
            ->sum('service');
            $SjunLY02 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','06')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0102')
            ->sum('service');
            $SjulLY02 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','07')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0102')
            ->sum('service');
            $SaugLY02 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','08')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0102')
            ->sum('service');
            $SsepLY02 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','09')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0102')
            ->sum('service');
            $SoctLY02 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','10')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0102')
            ->sum('service');
            $SnovLY02 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','11')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0102')
            ->sum('service');
            $SdecLY02 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','12')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0102')
            ->sum('service');

            $chartService02 = new ChartJs;
            $chartService02->title('Service BMM By Months');
            $chartService02->displaylegend(true);
            $chartService02->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartService02->dataset($tahun, 'bar', [
                $Sjan02, $Sfeb02, $Smar02, $Sapr02, $Smay02, $Sjun02,
                $Sjul02, $Saug02, $Ssep02, $Soct02, $Snov02, $Sdec02
            ])
            ->color([
                "#171791","#484FE1","#227DE3","#234C8A","#436ABA","#162FAB",
                "#2581B0","#5939D0","#4F3BB6","#2E3875","#253BDD","#1E36C6"
            ])
            ->backgroundcolor([
                "#171791","#484FE1","#227DE3","#234C8A","#436ABA","#162FAB",
                "#2581B0","#5939D0","#4F3BB6","#2E3875","#253BDD","#1E36C6"
            ]);

            $chartService02->dataset($LY, 'bar', [
                $SjanLY02, $SfebLY02, $SmarLY02, $SaprLY02, $SmayLY02, $SjunLY02,
                $SjulLY02, $SaugLY02, $SsepLY02, $SoctLY02, $SnovLY02, $SdecLY02
            ])
            ->color("#010101")
            ->backgroundcolor("#010101");
            // END -------------------------------




            // CHART SERVICE
            $Sjan04 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','01')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('service');
            $Sfeb04 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','02')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('service');
            $Smar04 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','03')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('service');
            $Sapr04 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','04')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('service');
            $Smay04 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','05')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('service');
            $Sjun04 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','06')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('service');
            $Sjul04 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','07')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('service');
            $Saug04 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','08')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('service');
            $Ssep04 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','09')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('service');
            $Soct04 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','10')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('service');
            $Snov04 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','11')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('service');
            $Sdec04 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','12')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0104')
            ->sum('service');

            // LAST YEAR

            $SjanLY04 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','01')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0104')
            ->sum('service');
            $SfebLY04 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','02')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0104')
            ->sum('service');
            $SmarLY04 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','03')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0104')
            ->sum('service');
            $SaprLY04 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','04')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0104')
            ->sum('service');
            $SmayLY04 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','05')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0104')
            ->sum('service');
            $SjunLY04 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','06')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0104')
            ->sum('service');
            $SjulLY04 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','07')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0104')
            ->sum('service');
            $SaugLY04 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','08')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0104')
            ->sum('service');
            $SsepLY04 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','09')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0104')
            ->sum('service');
            $SoctLY04 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','10')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0104')
            ->sum('service');
            $SnovLY04 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','11')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0104')
            ->sum('service');
            $SdecLY04 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','12')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0104')
            ->sum('service');

            $chartService04 = new ChartJs;
            $chartService04->title('Service Hasanuddin By Months');
            $chartService04->displaylegend(true);
            $chartService04->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartService04->dataset($tahun, 'bar', [
                $Sjan04, $Sfeb04, $Smar04, $Sapr04, $Smay04, $Sjun04,
                $Sjul04, $Saug04, $Ssep04, $Soct04, $Snov04, $Sdec04
            ])
            ->color([
                "#171791","#484FE1","#227DE3","#234C8A","#436ABA","#162FAB",
                "#2581B0","#5939D0","#4F3BB6","#2E3875","#253BDD","#1E36C6"
            ])
            ->backgroundcolor([
                "#171791","#484FE1","#227DE3","#234C8A","#436ABA","#162FAB",
                "#2581B0","#5939D0","#4F3BB6","#2E3875","#253BDD","#1E36C6"
            ]);

            $chartService04->dataset($LY, 'bar', [
                $SjanLY04, $SfebLY04, $SmarLY04, $SaprLY04, $SmayLY04, $SjunLY04,
                $SjulLY04, $SaugLY04, $SsepLY04, $SoctLY04, $SnovLY04, $SdecLY04
            ])
            ->color("#010101")
            ->backgroundcolor("#010101");
            // END -------------------------------




            // CHART SERVICE
            $Sjan05 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','01')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('service');
            $Sfeb05 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','02')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('service');
            $Smar05 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','03')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('service');
            $Sapr05 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','04')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('service');
            $Smay05 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','05')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0102')
            ->sum('service');
            $Sjun05 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','06')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('service');
            $Sjul05 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','07')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('service');
            $Saug05 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','08')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('service');
            $Ssep05 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','09')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('service');
            $Soct05 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','10')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('service');
            $Snov05 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','11')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('service');
            $Sdec05 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','12')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0105')
            ->sum('service');

            // LAST YEAR

            $SjanLY05 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','01')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0105')
            ->sum('service');
            $SfebLY05 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','02')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0105')
            ->sum('service');
            $SmarLY05 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','03')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0105')
            ->sum('service');
            $SaprLY05 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','04')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0105')
            ->sum('service');
            $SmayLY05 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','05')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0105')
            ->sum('service');
            $SjunLY05 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','06')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0105')
            ->sum('service');
            $SjulLY05 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','07')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0105')
            ->sum('service');
            $SaugLY05 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','08')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0105')
            ->sum('service');
            $SsepLY05 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','09')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0105')
            ->sum('service');
            $SoctLY05 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','10')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0105')
            ->sum('service');
            $SnovLY05 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','11')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0105')
            ->sum('service');
            $SdecLY05 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','12')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0105')
            ->sum('service');

            $chartService05 = new ChartJs;
            $chartService05->title('Service TTS By Months');
            $chartService05->displaylegend(true);
            $chartService05->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartService05->dataset($tahun, 'bar', [
                $Sjan05, $Sfeb05, $Smar05, $Sapr05, $Smay05, $Sjun05,
                $Sjul05, $Saug05, $Ssep05, $Soct05, $Snov05, $Sdec05
            ])
            ->color([
                "#171791","#484FE1","#227DE3","#234C8A","#436ABA","#162FAB",
                "#2581B0","#5939D0","#4F3BB6","#2E3875","#253BDD","#1E36C6"
            ])
            ->backgroundcolor([
                "#171791","#484FE1","#227DE3","#234C8A","#436ABA","#162FAB",
                "#2581B0","#5939D0","#4F3BB6","#2E3875","#253BDD","#1E36C6"
            ]);

            $chartService05->dataset($LY, 'bar', [
                $SjanLY05, $SfebLY05, $SmarLY05, $SaprLY05, $SmayLY05, $SjunLY05,
                $SjulLY05, $SaugLY05, $SsepLY05, $SoctLY05, $SnovLY05, $SdecLY05
            ])
            ->color("#010101")
            ->backgroundcolor("#010101");
            // END -------------------------------




            // CHART SERVICE
            $Sjan06 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','01')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('service');
            $Sfeb06 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','02')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('service');
            $Smar06 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','03')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('service');
            $Sapr06 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','04')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('service');
            $Smay06 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','05')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('service');
            $Sjun06 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','06')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('service');
            $Sjul06 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','07')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('service');
            $Saug06 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','08')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('service');
            $Ssep06 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','09')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('service');
            $Soct06 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','10')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('service');
            $Snov06 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','11')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('service');
            $Sdec06 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','12')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0106')
            ->sum('service');

            // LAST YEAR

            $SjanLY06 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','01')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0106')
            ->sum('service');
            $SfebLY06 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','02')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0106')
            ->sum('service');
            $SmarLY06 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','03')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0106')
            ->sum('service');
            $SaprLY06 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','04')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0106')
            ->sum('service');
            $SmayLY06 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','05')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0106')
            ->sum('service');
            $SjunLY06 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','06')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0106')
            ->sum('service');
            $SjulLY06 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','07')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0106')
            ->sum('service');
            $SaugLY06 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','08')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0106')
            ->sum('service');
            $SsepLY06 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','09')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0106')
            ->sum('service');
            $SoctLY06 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','10')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0106')
            ->sum('service');
            $SnovLY06 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','11')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0106')
            ->sum('service');
            $SdecLY06 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','12')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0106')
            ->sum('service');

            $chartService06 = new ChartJs;
            $chartService06->title('Service Imbo By Months');
            $chartService06->displaylegend(true);
            $chartService06->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartService06->dataset($tahun, 'bar', [
                $Sjan06, $Sfeb06, $Smar06, $Sapr06, $Smay06, $Sjun06,
                $Sjul06, $Saug06, $Ssep06, $Soct06, $Snov06, $Sdec06
            ])
            ->color([
                "#171791","#484FE1","#227DE3","#234C8A","#436ABA","#162FAB",
                "#2581B0","#5939D0","#4F3BB6","#2E3875","#253BDD","#1E36C6"
            ])
            ->backgroundcolor([
                "#171791","#484FE1","#227DE3","#234C8A","#436ABA","#162FAB",
                "#2581B0","#5939D0","#4F3BB6","#2E3875","#253BDD","#1E36C6"
            ]);

            $chartService06->dataset($LY, 'bar', [
                $SjanLY06, $SfebLY06, $SmarLY06, $SaprLY06, $SmayLY06, $SjunLY06,
                $SjulLY06, $SaugLY06, $SsepLY06, $SoctLY06, $SnovLY06, $SdecLY06
            ])
            ->color("#010101")
            ->backgroundcolor("#010101");
            // END -------------------------------



            // CHART SERVICE
            $Sjan07 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','01')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('service');
            $Sfeb07 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','02')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('service');
            $Smar07 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','03')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('service');
            $Sapr07 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','04')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('service');
            $Smay07 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','05')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('service');
            $Sjun07 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','06')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('service');
            $Sjul07 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','07')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('service');
            $Saug07 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','08')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('service');
            $Ssep07 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','09')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('service');
            $Soct07 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','10')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('service');
            $Snov07 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','11')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('service');
            $Sdec07 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','12')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0107')
            ->sum('service');

            // LAST YEAR

            $SjanLY07 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','01')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0107')
            ->sum('service');
            $SfebLY07 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','02')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0107')
            ->sum('service');
            $SmarLY07 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','03')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0107')
            ->sum('service');
            $SaprLY07 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','04')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0107')
            ->sum('service');
            $SmayLY07 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','05')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0107')
            ->sum('service');
            $SjunLY07 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','06')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0107')
            ->sum('service');
            $SjulLY07 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','07')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0107')
            ->sum('service');
            $SaugLY07 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','08')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0107')
            ->sum('service');
            $SsepLY07 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','09')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0107')
            ->sum('service');
            $SoctLY07 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','10')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0107')
            ->sum('service');
            $SnovLY07 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','11')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0107')
            ->sum('service');
            $SdecLY07 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','12')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0107')
            ->sum('service');

            $chartService07 = new ChartJs;
            $chartService07->title('Service Mandiri By Months');
            $chartService07->displaylegend(true);
            $chartService07->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartService07->dataset($tahun, 'bar', [
                $Sjan07, $Sfeb07, $Smar07, $Sapr07, $Smay07, $Sjun07,
                $Sjul07, $Saug07, $Ssep07, $Soct07, $Snov07, $Sdec07
            ])
            ->color([
                "#171791","#484FE1","#227DE3","#234C8A","#436ABA","#162FAB",
                "#2581B0","#5939D0","#4F3BB6","#2E3875","#253BDD","#1E36C6"
            ])
            ->backgroundcolor([
                "#171791","#484FE1","#227DE3","#234C8A","#436ABA","#162FAB",
                "#2581B0","#5939D0","#4F3BB6","#2E3875","#253BDD","#1E36C6"
            ]);

            $chartService07->dataset($LY, 'bar', [
                $SjanLY07, $SfebLY07, $SmarLY07, $SaprLY07, $SmayLY07, $SjunLY07,
                $SjulLY07, $SaugLY07, $SsepLY07, $SoctLY07, $SnovLY07, $SdecLY07
            ])
            ->color("#010101")
            ->backgroundcolor("#010101");
            // END -------------------------------




            // CHART SERVICE
            $Sjan08 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','01')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('service');
            $Sfeb08 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','02')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('service');
            $Smar08 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','03')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('service');
            $Sapr08 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','04')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('service');
            $Smay08 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','05')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('service');
            $Sjun08 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','06')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('service');
            $Sjul08 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','07')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('service');
            $Saug08 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','08')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('service');
            $Ssep08 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','09')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('service');
            $Soct08 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','10')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('service');
            $Snov08 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','11')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('service');
            $Sdec08 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','12')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0108')
            ->sum('service');

            // LAST YEAR

            $SjanLY08 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','01')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0108')
            ->sum('service');
            $SfebLY08 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','02')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0108')
            ->sum('service');
            $SmarLY08 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','03')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0108')
            ->sum('service');
            $SaprLY08 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','04')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0108')
            ->sum('service');
            $SmayLY08 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','05')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0108')
            ->sum('service');
            $SjunLY08 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','06')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0108')
            ->sum('service');
            $SjulLY08 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','07')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0108')
            ->sum('service');
            $SaugLY08 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','08')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0108')
            ->sum('service');
            $SsepLY08 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','09')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0108')
            ->sum('service');
            $SoctLY08 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','10')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0108')
            ->sum('service');
            $SnovLY08 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','11')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0108')
            ->sum('service');
            $SdecLY08 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','12')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0108')
            ->sum('service');

            $chartService08 = new ChartJs;
            $chartService08->title('Service WR By Months');
            $chartService08->displaylegend(true);
            $chartService08->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartService08->dataset($tahun, 'bar', [
                $Sjan08, $Sfeb08, $Smar08, $Sapr08, $Smay08, $Sjun08,
                $Sjul08, $Saug08, $Ssep08, $Soct08, $Snov08, $Sdec08
            ])
            ->color([
                "#171791","#484FE1","#227DE3","#234C8A","#436ABA","#162FAB",
                "#2581B0","#5939D0","#4F3BB6","#2E3875","#253BDD","#1E36C6"
            ])
            ->backgroundcolor([
                "#171791","#484FE1","#227DE3","#234C8A","#436ABA","#162FAB",
                "#2581B0","#5939D0","#4F3BB6","#2E3875","#253BDD","#1E36C6"
            ]);

            $chartService08->dataset($LY, 'bar', [
                $SjanLY08, $SfebLY08, $SmarLY08, $SaprLY08, $SmayLY08, $SjunLY08,
                $SjulLY08, $SaugLY08, $SsepLY08, $SoctLY08, $SnovLY08, $SdecLY08
            ])
            ->color("#010101")
            ->backgroundcolor("#010101");
            // END -------------------------------



            // CHART SERVICE
            $Sjan09 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','01')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('service');
            $Sfeb09 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','02')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('service');
            $Smar09 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','03')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('service');
            $Sapr09 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','04')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('service');
            $Smay09 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','05')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('service');
            $Sjun09 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','06')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('service');
            $Sjul09 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','07')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('service');
            $Saug09 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','08')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('service');
            $Ssep09 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','09')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('service');
            $Soct09 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','10')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('service');
            $Snov09 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','11')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('service');
            $Sdec09 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','12')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0109')
            ->sum('service');

            // LAST YEAR

            $SjanLY09 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','01')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0109')
            ->sum('service');
            $SfebLY09 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','02')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0109')
            ->sum('service');
            $SmarLY09 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','03')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0109')
            ->sum('service');
            $SaprLY09 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','04')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0109')
            ->sum('service');
            $SmayLY09 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','05')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0109')
            ->sum('service');
            $SjunLY09 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','06')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0109')
            ->sum('service');
            $SjulLY09 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','07')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0109')
            ->sum('service');
            $SaugLY09 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','08')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0109')
            ->sum('service');
            $SsepLY09 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','09')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0109')
            ->sum('service');
            $SoctLY09 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','10')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0109')
            ->sum('service');
            $SnovLY09 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','11')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0109')
            ->sum('service');
            $SdecLY09 = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','12')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0109')
            ->sum('service');

            $chartService09 = new ChartJs;
            $chartService09->title('Service Sunset By Months');
            $chartService09->displaylegend(true);
            $chartService09->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartService09->dataset($tahun, 'bar', [
                $Sjan09, $Sfeb09, $Smar09, $Sapr09, $Smay09, $Sjun09,
                $Sjul09, $Saug09, $Ssep09, $Soct09, $Snov09, $Sdec09
            ])
            ->color([
                "#171791","#484FE1","#227DE3","#234C8A","#436ABA","#162FAB",
                "#2581B0","#5939D0","#4F3BB6","#2E3875","#253BDD","#1E36C6"
            ])
            ->backgroundcolor([
                "#171791","#484FE1","#227DE3","#234C8A","#436ABA","#162FAB",
                "#2581B0","#5939D0","#4F3BB6","#2E3875","#253BDD","#1E36C6"
            ]);

            $chartService09->dataset($LY, 'bar', [
                $SjanLY09, $SfebLY09, $SmarLY09, $SaprLY09, $SmayLY09, $SjunLY09,
                $SjulLY09, $SaugLY09, $SsepLY09, $SoctLY09, $SnovLY09, $SdecLY09
            ])
            ->color("#010101")
            ->backgroundcolor("#010101");
            // END -------------------------------



            // CHART SERVICE
            $Sjan04F = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','01')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('service');
            $Sfeb04F = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','02')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('service');
            $Smar04F = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','03')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('service');
            $Sapr04F = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','04')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('service');
            $Smay04F = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','05')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('service');
            $Sjun04F = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','06')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('service');
            $Sjul04F = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','07')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('service');
            $Saug04F = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','08')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('service');
            $Ssep04F = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','09')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('service');
            $Soct04F = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','10')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('service');
            $Snov04F = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','11')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('service');
            $Sdec04F = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','12')
            ->whereYear('tanggal_fs',$tahun)
            ->where('dealer_kode','AA0104F')
            ->sum('service');

            // LAST YEAR

            $SjanLY04F = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','01')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0104F')
            ->sum('service');
            $SfebLY04F = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','02')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0104F')
            ->sum('service');
            $SmarLY04F = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','03')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0104F')
            ->sum('service');
            $SaprLY04F = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','04')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0104F')
            ->sum('service');
            $SmayLY04F = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','05')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0104F')
            ->sum('service');
            $SjunLY04F = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','06')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0104F')
            ->sum('service');
            $SjulLY04F = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','07')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0104F')
            ->sum('service');
            $SaugLY04F = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','08')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0104F')
            ->sum('service');
            $SsepLY04F = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','09')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0104F')
            ->sum('service');
            $SoctLY04F = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','10')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0104F')
            ->sum('service');
            $SnovLY04F = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','11')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0104F')
            ->sum('service');
            $SdecLY04F = DB::table('faktur_services')
            ->whereMonth('tanggal_fs','12')
            ->whereYear('tanggal_fs',$LY)
            ->where('dealer_kode','AA0104F')
            ->sum('service');

            $chartService04F = new ChartJs;
            $chartService04F->title('Service Flagship By Months');
            $chartService04F->displaylegend(true);
            $chartService04F->labels([
                'Jan','Feb','Mar','Apr','May','Jun',
                'Jul','Aug','Sep','Oct','Nov','Des'
            ]);

            $chartService04F->dataset($tahun, 'bar', [
                $Sjan04F, $Sfeb04F, $Smar04F, $Sapr04F, $Smay04F, $Sjun04F,
                $Sjul04F, $Saug04F, $Ssep04F, $Soct04F, $Snov04F, $Sdec04F
            ])
            ->color([
                "#171791","#484FE1","#227DE3","#234C8A","#436ABA","#162FAB",
                "#2581B0","#5939D0","#4F3BB6","#2E3875","#253BDD","#1E36C6"
            ])
            ->backgroundcolor([
                "#171791","#484FE1","#227DE3","#234C8A","#436ABA","#162FAB",
                "#2581B0","#5939D0","#4F3BB6","#2E3875","#253BDD","#1E36C6"
            ]);

            $chartService04F->dataset($LY, 'bar', [
                $SjanLY04F, $SfebLY04F, $SmarLY04F, $SaprLY04F, $SmayLY04F, $SjunLY04F,
                $SjulLY04F, $SaugLY04F, $SsepLY04F, $SoctLY04F, $SnovLY04F, $SdecLY04F
            ])
            ->color("#010101")
            ->backgroundcolor("#010101");
            // END -------------------------------

            // TOP 5 STOK TERBANYAK
            $dataStok = DB::table('stoks')
            ->select(DB::raw('SUM(stok) as jumlah'), 'nama_motor')
            ->orderBy('jumlah','desc')
            ->groupBy('nama_motor')
            ->limit(5)
            ->get();

            // TOP 5 STOK TERBANYAK
            $dataStok01 = DB::table('stoks')
            ->select(DB::raw('SUM(stok) as jumlah'), 'nama_motor')
            ->where('dealer_kode','AA0101')
            ->orderBy('jumlah','desc')
            ->groupBy('nama_motor')
            ->limit(5)
            ->get();

            // TOP 5 STOK TERBANYAK
            $dataStok02 = DB::table('stoks')
            ->select(DB::raw('SUM(stok) as jumlah'), 'nama_motor')
            ->where('dealer_kode','AA0102')
            ->orderBy('jumlah','desc')
            ->groupBy('nama_motor')
            ->limit(5)
            ->get();

            // TOP 5 STOK TERBANYAK
            $dataStok04 = DB::table('stoks')
            ->select(DB::raw('SUM(stok) as jumlah'), 'nama_motor')
            ->where('dealer_kode','AA0104')
            ->orderBy('jumlah','desc')
            ->groupBy('nama_motor')
            ->limit(5)
            ->get();

            // TOP 5 STOK TERBANYAK
            $dataStok05 = DB::table('stoks')
            ->select(DB::raw('SUM(stok) as jumlah'), 'nama_motor')
            ->where('dealer_kode','AA0105')
            ->orderBy('jumlah','desc')
            ->groupBy('nama_motor')
            ->limit(5)
            ->get();

            // TOP 5 STOK TERBANYAK
            $dataStok06 = DB::table('stoks')
            ->select(DB::raw('SUM(stok) as jumlah'), 'nama_motor')
            ->where('dealer_kode','AA0106')
            ->orderBy('jumlah','desc')
            ->groupBy('nama_motor')
            ->limit(5)
            ->get();

            // TOP 5 STOK TERBANYAK
            $dataStok07 = DB::table('stoks')
            ->select(DB::raw('SUM(stok) as jumlah'), 'nama_motor')
            ->where('dealer_kode','AA0107')
            ->orderBy('jumlah','desc')
            ->groupBy('nama_motor')
            ->limit(5)
            ->get();

            // TOP 5 STOK TERBANYAK
            $dataStok08 = DB::table('stoks')
            ->select(DB::raw('SUM(stok) as jumlah'), 'nama_motor')
            ->where('dealer_kode','AA0108')
            ->orderBy('jumlah','desc')
            ->groupBy('nama_motor')
            ->limit(5)
            ->get();

            // TOP 5 STOK TERBANYAK
            $dataStok09 = DB::table('stoks')
            ->select(DB::raw('SUM(stok) as jumlah'), 'nama_motor')
            ->where('dealer_kode','AA0109')
            ->orderBy('jumlah','desc')
            ->groupBy('nama_motor')
            ->limit(5)
            ->get();

            // TOP 5 STOK TERBANYAK
            $dataStok04F = DB::table('stoks')
            ->select(DB::raw('SUM(stok) as jumlah'), 'nama_motor')
            ->where('dealer_kode','AA0104F')
            ->orderBy('jumlah','desc')
            ->groupBy('nama_motor')
            ->limit(5)
            ->get();

            // ====================================================================

            // TOP 5 UNIT PENJUALAN
            $data = DB::table('juals')
            ->join('stoks','juals.stok_id','=','stoks.id_stok')
            ->select(DB::raw('SUM(qty) as jumlah'), 'nama_motor')
            ->orderBy('jumlah','desc')
            ->groupBy('nama_motor')
            ->limit(5)
            ->get();

            // TOP 5 UNIT PENJUALAN
            $data01 = DB::table('juals')
            ->join('stoks','juals.stok_id','=','stoks.id_stok')
            ->select(DB::raw('SUM(qty) as jumlah'), 'nama_motor')
            ->where('juals.dealer_kode','AA0101')
            ->orderBy('jumlah','desc')
            ->groupBy('nama_motor')
            ->limit(5)
            ->get();

            $data02 = DB::table('juals')
            ->join('stoks','juals.stok_id','=','stoks.id_stok')
            ->select(DB::raw('SUM(qty) as jumlah'), 'nama_motor')
            ->where('juals.dealer_kode','AA0102')
            ->orderBy('jumlah','desc')
            ->groupBy('nama_motor')
            ->limit(5)
            ->get();

            $data04 = DB::table('juals')
            ->join('stoks','juals.stok_id','=','stoks.id_stok')
            ->select(DB::raw('SUM(qty) as jumlah'), 'nama_motor')
            ->where('juals.dealer_kode','AA0104')
            ->orderBy('jumlah','desc')
            ->groupBy('nama_motor')
            ->limit(5)
            ->get();

            $data05 = DB::table('juals')
            ->join('stoks','juals.stok_id','=','stoks.id_stok')
            ->select(DB::raw('SUM(qty) as jumlah'), 'nama_motor')
            ->where('juals.dealer_kode','AA0105')
            ->orderBy('jumlah','desc')
            ->groupBy('nama_motor')
            ->limit(5)
            ->get();

            $data06 = DB::table('juals')
            ->join('stoks','juals.stok_id','=','stoks.id_stok')
            ->select(DB::raw('SUM(qty) as jumlah'), 'nama_motor')
            ->where('juals.dealer_kode','AA0106')
            ->orderBy('jumlah','desc')
            ->groupBy('nama_motor')
            ->limit(5)
            ->get();

            $data07 = DB::table('juals')
            ->join('stoks','juals.stok_id','=','stoks.id_stok')
            ->select(DB::raw('SUM(qty) as jumlah'), 'nama_motor')
            ->where('juals.dealer_kode','AA0107')
            ->orderBy('jumlah','desc')
            ->groupBy('nama_motor')
            ->limit(5)
            ->get();

            $data08 = DB::table('juals')
            ->join('stoks','juals.stok_id','=','stoks.id_stok')
            ->select(DB::raw('SUM(qty) as jumlah'), 'nama_motor')
            ->where('juals.dealer_kode','AA0108')
            ->orderBy('jumlah','desc')
            ->groupBy('nama_motor')
            ->limit(5)
            ->get();

            $data09 = DB::table('juals')
            ->join('stoks','juals.stok_id','=','stoks.id_stok')
            ->select(DB::raw('SUM(qty) as jumlah'), 'nama_motor')
            ->where('juals.dealer_kode','AA0109')
            ->orderBy('jumlah','desc')
            ->groupBy('nama_motor')
            ->limit(5)
            ->get();

            $data04F = DB::table('juals')
            ->join('stoks','juals.stok_id','=','stoks.id_stok')
            ->select(DB::raw('SUM(qty) as jumlah'), 'nama_motor')
            ->where('juals.dealer_kode','AA0104F')
            ->orderBy('jumlah','desc')
            ->groupBy('nama_motor')
            ->limit(5)
            ->get();

    		return view('inventory.dashboard', compact(
                'title','now','yearSale','monthSale','daySale','tahun','bln',
                'YS01','YS02','YS04','YS05','YS06','YS07','YS08','YS09','YS04F',
                'MS01','MS02','MS04','MS05','MS06','MS07','MS08','MS09','MS04F',
                'DS01','DS02','DS04','DS05','DS06','DS07','DS08','DS09','DS04F',
                'chartJual','chartService','chartMasuk','chartKeluar','dataStok',
                'chartJual01','chartJual02','chartJual04','chartJual05','chartJual05',
                'chartJual06','chartJual07','chartJual08','chartJual09','chartJual04F',
                'chartMasuk01','chartMasuk02','chartMasuk04','chartMasuk05','chartMasuk06',
                'chartMasuk07','chartMasuk08','chartMasuk09','chartMasuk04F',
                'chartKeluar01','chartKeluar02','chartKeluar04','chartKeluar05','chartKeluar06',
                'chartKeluar07','chartKeluar08','chartKeluar09','chartKeluar04F',
                'chartService01','chartService02','chartService04','chartService05','chartService06',
                'chartService07','chartService08','chartService09','chartService04F',
                'dataStok01','dataStok02','dataStok04','dataStok05','dataStok06','dataStok07',
                'dataStok08','dataStok09','dataStok04F',
                'data','data01','data02','data04','data05','data06','data07','data08','data09','data04F'
            ));
    	}
    }

    public function cariUnit(Request $req){
        if (!Session::get('login')) {
            alert('Login Gagal!','Anda harus login!', 'warning')->persistent('OK');
            return redirect('/');
        }else{
            $title = "Dashboard";
            $cariUnit = $req->cariUnit;
            $now = \Carbon\Carbon::now('GMT+8')->format('Y-m-d');
            $data = DB::table('stoks')
            ->join('dealers','stoks.dealer_kode','=','dealers.kode_dealer')
            ->where([ ['stok','>','0'],['nama_motor','like','%'.$cariUnit.'%'], ])
            ->get();
            return view('inventory.cari_unit', compact('title','now','data','cariUnit'));
        }
    }
}
