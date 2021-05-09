<?php


namespace App\Services\Repositories;

use App\Models\Spots\Spot;

/**
 * Class SpotsRepository
 * @package App\Services\Repositories
 */

class SpotsRepository implements RepositoryInterface
{
    public function index()
    {

        return Spot::with(['camera'])->paginate(10);
    }

    public function store(array $data)
    {
        $model              = new Spot;
        $model->title       = $data['title'];
        $model->title_ru    = $data['title_ru'];
        $model->lat         = $data['lat'];
        $model->lon         = $data['lon'];
        $model->region_id   = $data['region_id'];
        $model->save();
    }

    public function update(array $data, $model)
    {
        $model->title       = $data['title'];
        $model->title_ru    = $data['title_ru'];
        $model->lat         = $data['lat'];
        $model->lon         = $data['lon'];
        $model->region_id   = $data['region_id'];
        $model->save();

        if ($data['cameraId'] != $data['camera']) {
            $model->camera()->detach($data['cameraId']);
            $model->camera()->attach($data['camera']);
        }
    }

    public function destroy($model)
    {
        $model->delete();
    }
}
