<?php namespace App\Repositories\Image;

/**
 * Interface ImageRepositoryContract
 * @package App\Repositories\Image
 */
interface ImageRepositoryContract {

    /**
     * @param $model
     * @param $image
     * @return mixed
     */
    public function store($model,$image);

    /**
     * @param $model
     * @param $image
     * @return mixed
     */
    public function update($model,$image);

    /**
     * @param $model
     * @return mixed
     */
    public function delete($model);

    /**
     * @param $model
     * @return mixed
     */
    public function show($model);

}