<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use Illuminate\Support\Facades\Hash;

class CheckAPI extends Controller
{
    function getdata(Data $data){
        $data = Data::all();
        return ['datas' => $data];
    }

    function adddata(Request $request){
        
        $request->validate([
            'title'=>'required',
            'email'=>'required|email',
            'author'=>'required',
            'password'=>'required|min:6',
        ]);

        $data = new Data;
        $data->title = $request->get('title');
        $data->email = $request->get('email');
        $data->author = $request->get('author');
        $data->password = Hash::make($request->get('password'));
        $data->save();

        if($data){
            return "Save Successfully";
        }else{
            return "Something went wrong";
        }
    }

    function delete(Data $data, Request $request, $id){
        $data = Data::find($id);
        $data->delete();
        return "Deleted Successfully";
    }

    function update(Data $data, Request $request, $id){
        $data = Data::find($id);
        $data->title = $request->get('title');
        $data->email = $request->get('email');
        $data->author = $request->get('author');
        $data->password = Hash::make($request->get('password'));
        $data->save();
        return "Updated Successfully";
    }

}
