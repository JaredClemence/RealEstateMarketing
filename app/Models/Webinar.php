<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Property;

/**
 * @property string link
 * @property string day_of_week
 * @property Carbon time
 */
class Webinar extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'link',
        'day_of_week',
        'time',
    ];
    
    protected $cast = [
        'time'=>'date',
    ];
    
    public function property(){
        return $this->belongsTo(Property::class);
    }
}
