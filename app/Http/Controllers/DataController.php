<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('insert');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
      */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'=>'required',
            'email'=>'required|email',
            'author'=>'required',
            'password'=>'required|confirmed|min:6',
            'password_confirmation'=>'required',
        ]);

        $data = new Data;
        $data->title = $request->get('title');
        $data->email = $request->get('email');
        $data->author = $request->get('author');
        $data->password = Hash::make($request->get('password'));
        $data->save();

        
        return redirect()->back()->with('message', 'Success');
        //return view('display',$success);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        $datas = Data::all();
            return view('display',['datas'=>$datas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data,$id)
    {
        $datas = Data::find($id);
        return view('update',['datas'=>$datas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data $data, $id)
    {
        $datas = Data::find($id);
        $datas->title = $request->get('title');
        $datas->email = $request->get('email');
        $datas->author = $request->get('author');
        $datas->password = $request->get('password');

        $datas->save();

        return redirect('display');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data,$id)
    {
        $data = Data::find($id);
        $data->delete();
        return redirect('display');
    }
}
