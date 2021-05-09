<?php


namespace App\Services;

use Illuminate\Http\Request;
use App\Services\Repositories\SpotsRepository;

class SpotsService
{
    const RULES = [
        'title' => 'required|max:255',
        'title_ru' => 'required|max:255',
        'lat' => 'required',
        'lon' => 'required',
        'region_id' => 'required',
    ];

    private $spotsRepository;
    private $validationService;

    public function __construct(SpotsRepository $spotsRepository, ValidationService $validationService)
    {
        $this->spotsRepository = $spotsRepository;
        $this->validationService = $validationService;
    }

    public function index()
    {
        return $this->spotsRepository->index();
    }

    public function validate(Request $request)
    {
        return $this->validationService->validate($request, self::RULES);
    }

    public function store(Request $request)
    {
        if ($this->validate($request)) {
            $data['title'] = $request->title;
            $data['title_ru'] = $request->title_ru;
            $data['lat'] = $request->lat;
            $data['lon'] = $request->lon;
            $data['region_id'] = $request->region_id;

            $this->spotsRepository->store($data);
        }
    }

    public function edit($id)
    {
        $this->spotsRepository->edit($id);
    }

    public function update(Request $request, $model)
    {
        if ($this->validate($request)) {
            $data['title'] = $request->title;
            $data['title_ru'] = $request->title_ru;
            $data['lat'] = $request->lat;
            $data['lon'] = $request->lon;
            $data['region_id'] = $request->region_id;
            $data['camera'] = $request->camera;
            $data['cameraId'] = $request->cameraId;

            $this->spotsRepository->update($data, $model);
        }
    }

    public function destroy($model)
    {
        $this->spotsRepository->destroy($model);
    }
}
