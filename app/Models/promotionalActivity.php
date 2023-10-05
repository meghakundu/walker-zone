<?php
namespace App\Models;

use Conner\Likeable\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class promotionalActivity extends Model
{
    use HasFactory, Likeable;
    protected $table='promotionalactivities';
    protected $guarded = [];

    function enrouteData(){
        return $this->belongsTo(enroute::class,'enroute_id','id');
    }
    function userData(){
        return $this->belongsTo(User::class,'enroute_id','enroute_id');
    }
}
