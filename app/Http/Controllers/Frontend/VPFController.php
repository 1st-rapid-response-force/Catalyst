<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class VPFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $user = \Auth::user();
        return view('frontend.vpf.index')
            ->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function buildCACCard($steam_id)
    {
        $user = User::where('steam_id','=',$steam_id)->first();

        $faces_array = [
            'default_face.png',
            'athanasiadas.png',
            'bahadur.png',
            'baros.png',
            'bayh.png',
            'burr.png',
            'byrne.png',
            'campbell.png',
            'christou.png',
            'coburns.png',
            'collns.png',
            'constantinou.png',
            'costas.png',
            'dayton.png',
            'dorgan.png',
            'doukas.png',
            'gikas.png',
            'halliwell.png',
            'hasan.png',
            'jalai.png',
            'jeoung.png',
            'jesus.png',
            'johnson.png',
            'kenelloupou.png',
            'kelly.png',
            'kirby.png',
            'martinez.png',
            'obrien.png',
            'oconnor.png',
            'osullivan.png',
            'reed.png',
            'sabet.png',
            'santorum.png',
            'savalas.png',
            'smith.png',
            'snowe.png',
            'tung.png',
            'walsh.png',
            'williams.png',
            'ximi.png',
        ];
        $images = public_path().'/frontend/images/faces/';

        $face=\Image::make($images.$faces_array[$user->vpf->face_id])->resize(106,139);

        // Create Image
        $img = \Image::canvas(223,340);

        $img->insert($images.'background.png');
        $img->insert($face,'top-left',13,16);

        // Name Field
        $img->text($user->vpf->last_name.',',15,175,function($font){
            $images = public_path().'/frontend/images/faces/';
            $font->file($images.'slc.ttf');
            $font->size(16);
        });
        $img->text($user->vpf->first_name,15,190,function($font){
            $images = public_path().'/frontend/images/faces/';
            $font->file($images.'slc.ttf');
            $font->size(16);
        });

        // Paygrade
        $img->text($user->vpf->rank->pay_grade,140,270,function($font){
            $images = public_path().'/frontend/images/faces/';
            $font->file($images.'slc.ttf');
            $font->size(12);
        });

        // Rank
        $img->text($user->vpf->rank->abbreviation,180,270,function($font){
            $images = public_path().'/frontend/images/faces/';
            $font->file($images.'slc.ttf');
            $font->size(12);
        });


        // create response and add encoded image data
        $img = \Response::make($img->encode('png'));

        // set content-type
        $img->header('Content-Type', 'image/png');

        // output
        return $img;

    }
}
