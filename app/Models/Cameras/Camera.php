<?php

namespace App\Models\Cameras;

use App\Models\CameraSpot\CameraSpot;
use App\Models\Spots\Spot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camera extends Model
{
    public function spot()
    {
        return $this->belongsToMany(Spot::class)->using(CameraSpot::class);
    }

}
