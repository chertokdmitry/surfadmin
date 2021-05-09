<?php

namespace App\Http\Controllers;

use App\Models\Spots\Spot;
use App\Services\WeatherService;


class WeatherController extends Controller
{
    private $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function index()
    {
        $spots = Spot::with(['camera'])->paginate(9);
        $result = $this->weatherService->getWeatherSpots($spots);

        return view('weather.index', ['items' => $spots, 'weather' => $result['weather'], 'cameras' => $result['cameras']]);
    }

    public function show($id)
    {
        $spot = Spot::with(['camera'])->find($id);

//        dd($spots);
//        die();

        $result = $this->weatherService->getWeatherSpot($spot);

        return view('weather.spot', ['item' => $spot, 'weather' => $result['weather'], 'cameras' => $result['cameras']]);
    }
}
