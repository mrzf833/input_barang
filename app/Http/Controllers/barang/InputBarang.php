<?php

namespace App\Http\Controllers\barang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\barang;
use DateTime;
use Carbon\Carbon;
use function GuzzleHttp\json_encode;

class InputBarang extends Controller
{
    public function index($kondisi){
        
        $kondisi_sebelum_dirubah = $kondisi;
        //dd($kondisi_sebelum_dirubah);
        $kondisis = $this->kondisi($kondisi)[0];
        $kondisi = $this->kondisi($kondisi)[1];
        $barangs = $this->kondisi($kondisi)[2];
        return view('barang.bycondition')->with([
            'barangs' => $barangs,
            'kondisi' => $kondisi,
            'kondisi_sebelum_dirubah' => $kondisi_sebelum_dirubah
        ]);
    }

    public function kondisi($kondisi){
        $kondisis =[
            ['kondisi' => 'semua'],
            ['kondisi' => '3 hari lagi'],
            ['kondisi' => 'id']
            
        ];
        $kondisi = str_replace("_"," ",$kondisi);
        $kondisis = json_decode(json_encode($kondisis));
        $kondisis = collect($kondisis);
        $kondisis = $kondisis->where('kondisi', $kondisi)->isEmpty();
        if($kondisis){
            return abort(404);
        }else if($kondisi == '3 hari lagi'){
            $barangs = $this->expbarang();
        }else if($kondisi == 'semua'){
            $barangs = $this->semua();
        }else if($kondisi == 'id'){
            $barangs = $this->id();
        }
        return [$kondisis,$kondisi,$barangs];
    }

    public function id(){
        $barangs = $this->messageBarang();
        return collect($barangs)->sortBy('id');
    }

    public function semua(){
        $barangs = $this->messageBarang();
        return collect($barangs)->sortBy('nama');
    }

    public function expbarang(){
        $barangs = $this->messageBarang();
        return collect($barangs)->sortBy('nama')->sortBy('exp_barang');
    }

    public function messageBarang(){
        $barangs = barang::all();
        foreach($barangs as $barang){
            $hari_ini = Carbon::now()->setTime(0,0,0);
            //$hari_ini = Carbon::createFromFormat('Y-m-d','2020-04-07');
            $exp = Carbon::parse($barang->exp_barang);
            //$exp = Carbon::createFromFormat('Y-m-d','2020-04-07');
            $diff_in_days = $hari_ini->diffInDays($exp);
            if( $diff_in_days <= '3'){
                if($hari_ini == $exp){
                    $barang['message'] = "barang hari ini kadaluarsa";
                    $barang['bg_alert'] = "btn-danger";
                }
                else if($hari_ini > $exp){
                    $barang['message'] = "barang sudah kadaluarsa";
                    $barang['bg_alert'] = "btn-dark";
                }
                else{
                    $barang['message'] = "barang akan kadaluarsa $diff_in_days hari lagi";
                    $barang['bg_alert'] = "btn-danger";
                }
            }else{
                $barang['message'] = "barang belum kadaluarsa";
                $barang['bg_alert'] = "btn-success";
            }
        }
        return $barangs;
    }

    public function create(){
        return view('barang.input');
    }

    public function store(Request $request){
        $this->validate($request,[
            'nama' => 'required',
            'exp' => 'required|date'
        ]);

        try{
            $barang = barang::create([
                'nama' => $request->nama,
                'exp_barang' => $request->exp
            ]);
            return back()->with('sukses','barang berhasil di simpan');
        }catch(Exception $e){
            DB::rollback();
            return back()->with('error',$e->getMessage());
        }
    }

    public function edit($id,$kondisi){
        //dd($kondisi);
        $this->kondisi($kondisi); // memanggil pengecakan untuk kondisi ada atau tidak di dalama array
        $barang = barang::findOrfail($id);
        return view('barang.edit')->with([
            'barang' => $barang,
            'kondisi' => $kondisi
        ]);
    }

    public function update(Request $request,$id,$kondisi){
        $this->validate($request,[
            'nama' => 'required',
            'exp' => 'required|date'
        ]);

        $this->kondisi($kondisi);
        try{
            $barang = barang::findOrfail($id);
            $barang->update([
                'nama' => $request->nama,
                'exp_barang' => $request->exp
            ]); 
            return redirect(route('barang.index',$kondisi))->with('sukses','data berhasil di UPDATE');
        }catch(Exception $e){
            DB::rollback();
            return back()->with('error',$e->getMessage());
        }
    }

    public function destroy($id){
        try{
            $barang = barang::destroy($id);
            return back()->with('sukses','data berhasil di hapus');
        }catch(Exception $e){
            return back()->with('error',$e->getMessage());
        }
    }
}
