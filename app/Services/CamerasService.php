<?php


namespace App\Services;

use Illuminate\Http\Request;
use App\Services\Repositories\CamerasRepository;

class CamerasService
{
    const RULES = [
        'title' => 'required|max:255',
    ];

    private $camerasRepository;
    private $validationService;

    public function __construct(CamerasRepository $camerasRepository, ValidationService $validationService)
    {
        $this->camerasRepository = $camerasRepository;
        $this->validationService = $validationService;
    }

    public function index()
    {
        return $this->camerasRepository->index();
    }

    public function validate(Request $request)
    {
        return $this->validationService->validate($request, self::RULES);
    }

    public function store(Request $request)
    {
        if ($this->validate($request)) {
            $data['title'] = $request->title;

            $this->camerasRepository->store($data);
        }
    }

    public function edit($id)
    {
        $this->camerasRepository->edit($id);
    }

    public function update(Request $request, $model)
    {
        if ($this->validate($request)) {
            $data['title'] = $request->title;

            $this->camerasRepository->update($data, $model);
        }
    }

    public function destroy($model)
    {
        $this->camerasRepository->destroy($model);
    }
}
