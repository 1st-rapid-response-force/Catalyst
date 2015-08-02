<?php namespace App\Repositories\Image;

use App\Exceptions\GeneralException;
use App\Operation;
use App\Qualification;
use App\Ribbon;
use App\School;
use App\Rank;
use Storage;
use Cloudder;

/**
 * Class FlysystemImageRepository
 * @package App\Repositories\Image
 */
class CloudImageRepository implements ImageRepositoryContract {

    /**
     * @param $model
     * @param $image
     * @return bool
     * @throws GeneralException
     */
    public function store($model,$image)
    {
        //Upload to Cloud
        $image = Cloudder::upload($image);

        //No errors
        $model->storage_image = 'cloud';
        $model->public_image = $image->getPublicId();

        if ($model->save())
        {
            return true;
        }
        throw new GeneralException('Image did not store correctly.');
    }

    /**
     * @param $model
     * @param $image
     * @return bool
     * @throws GeneralException
     */
    public function update($model,$image)
    {
        // Delete old one
        $this->delete($model);
        if($this->store($model,$image))
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
        Cloudder::destroyImages($model->public_image);
        return true;

    }

    /**
     * @param $model
     * @return mixed
     */
    public function show($model)
    {
        return Cloudder::show($model);
    }

}