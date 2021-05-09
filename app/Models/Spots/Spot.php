<?php

namespace App\Models\Spots;

use App\Models\Cameras\Camera;
use App\Models\CameraSpot\CameraSpot;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Spot
 * @package App\Models\Spots
 */

class Spot extends Model
{
    public function spot()
    {
    }

    public function camera()
    {
        return $this->belongsToMany(Camera::class)->using(CameraSpot::class);
    }


}
