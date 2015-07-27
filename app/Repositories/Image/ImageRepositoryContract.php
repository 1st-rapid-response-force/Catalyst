<?php namespace App\Repositories\Image;

/**
 * Interface ImageRepositoryContract
 * @package App\Repositories\Image
 */
interface ImageRepositoryContract {

    /**
     * @param $model
     * @param $type
     * @param $image
     * @return mixed
     */
    public function store($model,$type,$image);

    /**
     * @param $model
     * @param $type
     * @param $image
     * @return mixed
     */
    public function update($model,$type,$image);

    /**
     * @param $model
     * @return mixed
     */
    public function delete($model);

    /**
     * @param $type
     * @param $id
     * @return mixed
     */
    public function show($type,$id);

}