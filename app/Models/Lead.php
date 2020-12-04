<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;

/**
 * @property Property $property
 * @property string $email
 * @property string $name
 * @property string $phone
 */
class Lead extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'property_id',
        'email',
        'name',
        'phone'
    ];
    
    public function property(){
        return $this->belongsTo(Property::class);
    }
}
