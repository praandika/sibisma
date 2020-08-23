<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\FakturService;
use DB;
use Carbon;

class FSController extends Controller
{
	public function index($home = null){
		if (!Session::get('login')) {
            alert('Login Gagal!','Anda harus login!', 'warning')->persistent('OK');
            return redirect('/');
        }else{
        	$title = "Catat Faktur dan Service";
            $now = \Carbon\Carbon::now('GMT+8')->format('Y-m-d');
            if ($home != null) {
                $data = FakturService::orderBy('tanggal_fs','desc')
                ->where('dealer_kode',$home)->get();
            }else{
                $data = FakturService::orderBy('tanggal_fs','desc')->get();
            }
        	
        	return view('fs.data_fs', compact('title','data','now'));
        }
	}

	public function store(Request $req){
    	if (!Session::get('login')) {
            alert('Login Gagal!','Anda harus login!', 'warning')->persistent('OK');
            return redirect('/');
        }else{
        	DB::table('faktur_services')->insert([
                'tanggal_fs' => $req->tanggal,
                'faktur' => $req->faktur,
                'service' => $req->service,
                'dealer_kode' => $req->dealer
            ]);
            toast('Data berhasil di tambah','success');
            return redirect('fands/');
        }
    }

    public function update(Request $req){
    	if (!Session::get('login')) {
            alert('Login Gagal!','Anda harus login!', 'warning')->persistent('OK');
            return redirect('/');
        }else{
        	DB::table('faktur_services')->where('id_fs',$req->id)->update([
                'tanggal_fs' => $req->tanggal,
                'faktur' => $req->faktur,
                'service' => $req->service,
                'dealer_kode' => $req->dealer
            ]);
            toast('Data berhasil di tambah','success');
            return redirect('fands/');
        }
    }

    public function delete(Request $req){
        if (!Session::get('login')) {
            alert('Login Gagal!','Anda harus login!', 'warning')->persistent('OK');
            return redirect('/');
        }else{
            $delid = $req->input('pilih');
            DB::table('faktur_services')->whereIn('id_fs',$delid)->delete();
            toast('Data berhasil di hapus','success');
            return redirect('fands/');
        }
    }
}
