<?php namespace App\Repositories\Image;

use App\Exceptions\GeneralException;
use App\Award;
use App\Operation;
use App\Qualification;
use App\Ribbon;
use App\School;
use Storage;

/**
 * Class FlysystemImageRepository
 * @package App\Repositories\Image
 */
class FlysystemImageRepository implements ImageRepositoryContract {

    /**
     * @param $model
     * @param $type
     * @param $image
     * @return bool
     * @throws GeneralException
     */
    public function store($model,$type,$image)
    {
        $fileName = snake_case($model->name).'_'.str_random(4).'.'.$image->getClientOriginalExtension();
        $storagePath = 'milpac/'.$type.'/'.$fileName;
        // Try to Save File
        Storage::put($storagePath,file_get_contents($image));
        //No errors
        $publicPath = '/images/'.$type.'/'.$model->id;
        $model->storage_image = $storagePath;
        $model->public_image = $publicPath;
        if ($model->save())
        {
            return true;
        }
        throw new GeneralException('Image did not store correctly.');
    }

    /**
     * @param $model
     * @param $type
     * @param $image
     * @return bool
     * @throws GeneralException
     */
    public function update($model,$type,$image)
    {
        // Delete old one
        $this->delete($model);
        if($this->store($model,$type,$image))
        {
            return true;
        }

        throw new GeneralException('Could not update image. Please try again');

    }

    /**
     * @param $model
     * @return mixed
     */
    public function delete($model)
    {
        // Deals with no image cases, if there is no image, there is nothing to delete
        if (($model->storage_image == 'false'))
        {
            return true;
        }
        // Deals with deleting an actual image
        Storage::delete($model->storage_image);
        return true;

    }

    /**
     * @param $type
     * @param $id
     * @return mixed
     */
    public function show($type,$id)
    {
        $image = $this->getStoragePath($type,$id);

        if ($image == '') {
            $content = Storage::get('Placeholder.png');
            return $content;
        } else {
            $content = Storage::get($image);
            return $content;
        }
    }

    /**
     * @param $type
     * @param $id
     * @return string
     */
    private function getStoragePath($type,$id)
    {
        switch ($type) {
            case 'ribbons':
                $ribbon = Ribbon::find($id);
                $image = $ribbon->storage_image;
                break;
            case 'qualifications':
                $qualification = Qualification::find($id);
                $image = $qualification->storage_image;
                break;
            case 'awards':
                $award = Award::find($id);
                $image = $award->storage_image;
                break;
            case 'schools':
                $school = School::find($id);
                $image = $school->storage_image;
                break;
            case 'operations':
                $operation = Operation::find($id);
                $image = $operation->storage_image;
                break;
            default:
                $image = '';
        }
        return $image;
    }
}