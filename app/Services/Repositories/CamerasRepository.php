<?php


namespace App\Services\Repositories;

use App\Models\Cameras\Camera;

/**
 * Class SpotsRepository
 * @package App\Services\Repositories
 */

class CamerasRepository implements RepositoryInterface
{
    public function index()
    {
        return Camera::paginate(10);
    }

    public function store(array $data)
    {
        $model        = new Camera;
        $model->title = $data['title'];
        $model->save();
    }

    public function update(array $data, $model)
    {
        $model->title = $data['title'];
        $model->save();
    }

    public function destroy($model)
    {
        $model->delete();
    }
}
