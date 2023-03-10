<?php

namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //create data
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_user'=>'required',
            'foto'=>'required',
            'email'=>'required',
            'password'=>'required',
            'role'=>'required'
        ]);
        if($validator->fails()){
            return Response()->json($validator->errors());
        }
        $save =user::create([
            'nama_user'=>$request->nama_user,
            'foto'=>$request->foto,
            'email'=>$request->email,
            'password'=>$request->password,
            'role'=>$request->role
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
        return user::all();
    }

    //show detail data
    public function detail($id)
    {
        if(user::where('id_user', $id)->exists()){
            $data_user= user::select('user.id_user', 'nama_user', 'foto', 'email', 'password', 'role')->where('id_user', '=', $id)->get();
            return Response()->json($data_user2);
        }
        else{
            return Response()->json(['message' => 'Tidak ditemukan']);
        }
    }

    //show update data
    public function update($id, Request $request) {         
        $validator=Validator::make($request->all(),         
        [   
            'nama_user'=>'required',
            'foto'=>'required',
            'email'=>'required',
            'password'=>'required',
            'role'=>'required'
        ]); 

        if($validator->fails()) {             
            return Response()->json($validator->errors());         
        } 

        $ubah = user::where('id_user', $id)->update([             
            'nama_user'=>$request->nama_user,
            'foto'=>$request->foto,
            'email'=>$request->email,
            'password'=>$request->password,
            'role'=>$request->role
              
        ]); 

        if($ubah) {             
            return Response()->json(['status' => 1]);         
        }         
        else {             
            return Response()->json(['status' => 0]);         
        }     
    }

    //delete data
    public function delete($id)
    {
        $hapus = user::where('id_user', $id)->delete();

        if($hapus) {
            return Response()->json(['status' => 1]);
        }

        else {
            return Response()->json(['status' => 0]);
        }
    }
}