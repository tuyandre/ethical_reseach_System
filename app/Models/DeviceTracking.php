<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceTracking extends Model
{
    use HasFactory;
    protected $table = 'device_trackings';
    protected $fillable = ['device_id','user_id','received_date','returned_date'];
    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function Device()
    {
        return $this->belongsTo('App\Models\Device');
    }
}
