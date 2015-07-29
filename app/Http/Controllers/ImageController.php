<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\Image\ImageRepositoryContract;

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

        $content = $this->image->show($id,'thumb');
        $img = file_get_contents($content);
        return response($img, 200)->header('Content-Type', 'image/png');
    }
}
