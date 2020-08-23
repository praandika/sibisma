<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Unit;
use App\Warna;
use DB;
use Carbon;

class UnitController extends Controller
{
    public function index(){
    	if (!Session::get('login')) {
            alert('Login Gagal!','Anda harus login!', 'warning')->persistent('OK');
            return redirect('/');
        }else{
        	$title = "Daftar Unit";
            $now = \Carbon\Carbon::now('GMT+8')->format('Y-m-d');
        	$data = Unit::orderBy('nama_unit','asc')->get();
        	$warna = Warna::orderBy('warna','asc')->get();
        	return view('unit.data_unit', compact('title','data','warna','now'));
        }
    }

    public function store(Request $req){
    	if (!Session::get('login')) {
            alert('Login Gagal!','Anda harus login!', 'warning')->persistent('OK');
            return redirect('/');
        }else{
        	DB::table('units')->insert([
                'nama_unit' => $req->nama,
                'jenis_unit' => $req->jenis,
            ]);
            toast('Data berhasil di tambah','success');
            return redirect('unit/');
        }
    }

    public function update(Request $req){
    	if (!Session::get('login')) {
            alert('Login Gagal!','Anda harus login!', 'warning')->persistent('OK');
            return redirect('/');
        }else{
        	DB::table('units')->where('id_unit',$req->id)->update([
                'nama_unit' => $req->nama,
                'jenis_unit' => $req->jenis,
            ]);
            toast('Data berhasil di tambah','success');
            return redirect('unit/');
        }
    }

    public function delete(Request $req){
        if (!Session::get('login')) {
            alert('Login Gagal!','Anda harus login!', 'warning')->persistent('OK');
            return redirect('/');
        }else{
            $delid = $req->input('pilih');
            DB::table('units')->whereIn('id_unit',$delid)->delete();
            toast('Data berhasil di hapus','success');
            return redirect('unit/');
        }
    }
}
