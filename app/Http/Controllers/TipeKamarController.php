<?php

namespace App\Http\Controllers;
use App\Models\tipe_kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class TipeKamarController extends Controller
{
    //create data
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_tipe_kamar'=>'required',
            'harga'=>'required',
            'deskripsi'=>'required',
            'foto'=>'required'
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $save =tipe_kamar::create([
            'nama_tipe_kamar'=>$request->nama_tipe_kamar,
            'harga'=>$request->harga,
            'deskripsi'=>$request->deskripsi,
            'foto'=>$request->foto
        ]);
        if($save){
            return Response()->json(['status'=>1]);
        } else {
            return Response()->json(['status'=>0]);
        }
    }

    //show data
    public function show()
    {
        return tipe_kamar::all();
    }

    //show detail data
    public function detail($id)
    {
        if(tipe_kamar::where('id_tipe_kamar', $id)->exists()){
            $data_tipe_kamar= tipe_kamar::select('tipe_kamar.id_tipe_kamar', 'nama_tipe_kamar', 'harga', 'deskripsi', 'foto')->where('id_tipe_kamar', '=', $id)->get();
            return Response()->json($data_tipe_kamar);
        }
        else{
            return Response()->json(['message' => 'Tidak ditemukan']);
        }
    }

    //show update data
    public function update(Request $req, $id){
        $validator = Validator::make($req->all(),[
            'nama_tipe_kamar' => 'required',
            'harga'           => 'required',
            'deskripsi'       => 'required',
            'foto'            => 'required',
        ]);

        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $update=tipe_kamar::where('id_tipe_kamar',$id)->update([
            'nama_tipe_kamar' => $req->nama_tipe_kamar,
            'harga'           => $req->harga,
            'deskripsi'       => $req->deskripsi,
            'foto'            => $req->foto,
        ]);
        
        $data=tipe_kamar::where('id_tipe_kamar', '=', $id)->get();
        
        if($update){
            return Response() -> json([
                'status' => 1,
                'message' => 'Success updating data!',
                'data' => $data  
            ]);
        } else {
            return Response() -> json([
                'status' => 0,
                'message' => 'Failed updating data!'
            ]);
        }
    }

    //delete data
    public function delete($id)
    {
        $hapus = tipe_kamar::where('id_tipe_kamar', $id)->delete();

        if($hapus) {
            return Response()->json(['status' => 1]);
        }

        else {
            return Response()->json(['status' => 0]);
        }
    }
}