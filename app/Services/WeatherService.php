<?php


namespace App\Services;


use App\Models\Weather\Weather;
use Illuminate\Support\Facades\Cache;

class WeatherService
{
    public function __construct()
    {
        date_default_timezone_set("Europe/Moscow");
    }

    /**
     * @param $spot
     * @return string
     */
    private function getCameraId($spot): string
    {
        $cameraId = '';

        foreach ($spot->camera as $camera) {
            $cameraId  = $camera->id;
        }

        return $cameraId;
    }

    /**
     * @param $spot
     * @return mixed
     */
    private function getWeatherData($spot)
    {
        Cache::remember('weather_' . $spot->id, 1800, function() use ($spot) {
            return Weather::select('hourly')->where('spot_id', $spot->id)->orderByDesc('created_at')->limit(1)->get();
        });

        $data = Cache::get('weather_' . $spot->id);
        $data = $data->toArray();
        $data = json_decode($data[0]['hourly']);

        return $data;
    }

    /**
     * @param array $spots
     * @return array[]
     */
    public function getWeatherSpots($spots): array
    {
        $weather = [];
        $cameras = [];

        foreach ($spots as $spot) {
            $data = $this->getWeatherData($spot);
            $counter = 0;
            $hour = date("H");
            $weather[$spot->id] = [];
            $step = 2;

            foreach ($data as $d) {
                if ($counter % 2 == 0) {
                    $weather[$spot->id][] = [
                        'hour'  => $hour,
                        'temp'  => round($d->temp),
                        'speed' => round($d->wind_speed, 1),
                        'deg'   => $d->wind_deg,
                    ];

                    $hour =   date("H", strtotime('+' . $step . ' hours'));
                    $step += 2;
                }

                $counter++;
                if ($counter == 24) {
                    break;
                }
            }

            $cameras[$spot->id] = $this->getCameraId($spot);
        }

        return ['weather' => $weather, 'cameras' => $cameras];
    }

    /**
     * @param $spot
     * @return array[]
     */
    public function getWeatherSpot($spot): array
    {
        $weather = [];
        $data = $this->getWeatherData($spot);
        $counter = 0;
        $hour = date("H");
        $weather[$spot->id] = [];
        $step = 2;

        foreach ($data as $d) {
            if ($counter % 2 == 0) {
                $weather[$spot->id][] = [
                    'hour'      => $hour,
                    'temp'      => round($d->temp),
                    'speed'     => round($d->wind_speed, 1),
                    'deg'       => $d->wind_deg,
                    'humidity'  => $d->humidity,
                    'clouds'    => $d->clouds
                ];

                $hour = date("H", strtotime('+' . $step . ' hours'));
                $step += 2;
            }

            $counter++;
        }

        $cameras[$spot->id] = $this->getCameraId($spot);

        return ['weather' => $weather, 'cameras' => $cameras];
    }
}
