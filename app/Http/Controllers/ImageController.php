<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Image\ImageRepositoryContract;
use JD\Cloudder\Facades\Cloudder;

/**
 * Class ImageController
 * @package App\Http\Controllers
 */
class ImageController extends Controller
{
    /**
     * @var ImageRepositoryContract
     */
    protected $image;

    /**
     * @param ImageRepositoryContract $image
     */
    public function __construct(ImageRepositoryContract $image){
        $this->image = $image;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        if($id == 'placeholder.png')
        {
            $img = \Image::canvas(1, 1);
            $img = \Response::make($img->encode('png'));
            $img->header('Content-Type', 'image/png');
            return $img;
        }
        $content = Cloudder::show($id);
        $img = file_get_contents($content);
        return response($img, 200)->header('Content-Type', 'image/png');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function showSmall($id)
    {
        if($id == 'placeholder.png')
        {
            $img = \Image::canvas(1, 1);
            $img = \Response::make($img->encode('png'));
            $img->header('Content-Type', 'image/png');
            return $img;
        }
        $content = Cloudder::show($id,['width' => '100','height'=>'100','crop'=>'fit']);
        $img = file_get_contents($content);
        return response($img, 200)->header('Content-Type', 'image/png');
    }

}
