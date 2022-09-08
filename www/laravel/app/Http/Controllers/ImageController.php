<?php

namespace App\Http\Controllers;
use App\File;
use App\Image;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ログインしてる前提
        if(Auth::id()){
          $login_user_id = Auth::id();
          $images = User::find($login_user_id)->upload_image()->get();
          return view('image.index')->with('images', $images);          
        }else{
          return view('image.index');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $upload_file = $request->file('file');
        $file = new Image();
        // 第一引数はディレクトリの指定。S3上のimagesディレクトリにアップロード
        // 第二引数はファイル
        // 第三引数はpublicを指定することで、URLによるアクセスが可能となる
        $path = Storage::disk('s3')->putFile('/images', $upload_file, 'public');
        $file->user_id = Auth::id();
        $file->filename = Storage::disk('s3')->url($path);
        $file->save();
        return redirect()->action('ImageController@index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
