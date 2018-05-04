<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
     public function imagesUpload()

    {

        return view('imageUpload');

    }



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function imagesUploadPost(Request $request)

    {

        request()->validate([

            'uploadFile' => 'required',

        ]);



        foreach ($request->file('uploadFile') as $key => $value) {

            $imageName = time(). $key . '.' . $value->getClientOriginalExtension();

            $value->move(public_path('images'), $imageName);

        }

       // dd($value);



        return response()->json(['success'=>'Images Uploaded Successfully.']);

    }
}
