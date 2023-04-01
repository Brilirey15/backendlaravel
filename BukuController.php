<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BukuController extends Controller


{
    public function getbuku()
    {
        $dt_buku=buku::get();
        return response()->json($dt_buku);
    }

    public function getid($id_buku)
    {
        $dt_buku=buku::where('id_buku','=',$id_buku)->get();
        return response()->json($dt_buku);
    }

    public function createbuku(Request $req){
        $validate = Validator::make($req->all(),[
            'judul_buku'=>'required',
            'jenis_buku'=>'required',
            'pengarang'=>'required',
        ]);
        if($validate->fails()){
            return response()->json($validate->errors()->toJson());
        }
        $create = buku::create([
            'judul_buku'=>$req->judul_buku,
            'jenis_buku'=>$req->jenis_buku,
            'pengarang'=>$req->pengarang,
            
        ]);    
         if($create){
            return response()->json(['status'=>true, 'message'=>'Sukses menambah data buku.']);
        }else{
            return response()->json(['status'=>false, 'message'=>'Gagal menambah data buku.']);
        }
    }

    public function updatebuku (Request $req, $id_buku)
    {
        $validate = Validator::make($req->all(),[
            'judul_buku'=>'required',
            'jenis_buku'=>'required',
            'pengarang'=>'required',
        ]);
    if($validate->fails()){
            return response()->json($validate->errors()->toJson());
        }
        $update = buku::where('id_buku',$id_buku)->update([
            'judul_buku'=>$req->get('judul_buku'),
            'jenis_buku'=>$req->get('jenis_buku'),
            'pengarang'=>$req->get('pengarang'),
            
        ]);
    if($update){
            return response()->json(['status'=>true, 'message'=>'Sukses update data buku.']);
        }else{
            return response()->json(['status'=>false, 'message'=>'Gagal update data buku.']);
        }   
    }
    public function deletebuku($id_buku)
    {
         $delete = buku::where('id_buku',$id_buku)->delete();
         
         if($delete){
            return response()->json(['status'=>true, 'message'=>'Sukses hapus data buku.']);
        }else{
            return response()->json(['status'=>false, 'message'=>'Gagal hapus data buku.']);
        }
    }


}
