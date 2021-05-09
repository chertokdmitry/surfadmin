<?php

namespace App\Http\Controllers\Admin\Cameras;

use App\Http\Controllers\Controller;
use App\Models\Cameras\Camera;
use App\Services\CamerasService;
use Illuminate\Http\Request;

class CamerasController extends Controller
{
    private $camerasService;

    public function __construct(CamerasService $camerasService)
    {
        $this->camerasService = $camerasService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->camerasService->index();

        return view('admin.cameras.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cameras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->camerasService->store($request);

        return redirect('/cameras')->with('success', 'Spot Saved');

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

        return view('admin.cameras.edit', ['model' => Camera::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Camera $camera
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Camera $camera)
    {
        $this->camerasService->update($request, $camera);

        return redirect('/cameras')->with('success', 'Camera Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Camera $camera
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy(Camera $camera)
    {
        $this->camerasService->destroy($camera);

        return redirect('/cameras')->with('success', 'Spot Deleted');
    }
}
