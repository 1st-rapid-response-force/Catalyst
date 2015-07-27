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
     * @param $type
     * @param $id
     * @return mixed
     */
    public function show($type,$id)
    {
        $content = $this->image->show($type,$id);
        return response($content, 200)->header('Content-Type', 'image/png');
    }



}
