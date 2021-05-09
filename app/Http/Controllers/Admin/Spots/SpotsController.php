<?php

namespace App\Http\Controllers\Admin\Spots;

use App\Http\Controllers\Controller;
use App\Models\Cameras\Camera;
use App\Models\Spots\Spot;
use App\Services\SpotsService;
use Illuminate\Http\Request;

class SpotsController extends Controller
{
    private $spotsService;

    public function __construct(SpotsService $spotsService)
    {
        $this->spotsService = $spotsService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->spotsService->index();

        return view('admin.spots.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.spots.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->spotsService->store($request);

        return redirect('/spots')->with('success', 'Spot Saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Spot::with(['camera'])->find($id);
        $cameras = Camera::select('title', 'id')->get();
        $cameraId = '';

        $camerasList = [];

        foreach ($cameras as $camera) {
            $camerasList[$camera->id] = $camera->title;
        }

        foreach ($model->camera as $camera) {
          $cameraId = $camera->id;
        }

        return view('admin.spots.edit', ['model' => $model, 'cameraId' => $cameraId, 'cameras' => $camerasList]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Spot $spot
     * @param $cameraId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Spot $spot)
    {
        $this->spotsService->update($request, $spot);

        return redirect('/spots')->with('success', 'Spot Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Spot $spot
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Spot $spot)
    {
        $this->spotsService->destroy($spot);

        return redirect('/spots')->with('success', 'Spot Deleted');
    }

    public function link(Request $request, Spot $spot)
    {
        echo 'hello link';
    }
}
