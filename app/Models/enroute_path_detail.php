<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enroute_path_detail extends Model
{
    use HasFactory;
    protected $table='enroute_path_details';
    protected $guarded = [];

    function pathData(){
        return $this->belongsTo(enroute::class,'enroute_id','id');
    }
}
