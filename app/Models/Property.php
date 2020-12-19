<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lead;

/**
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $beds
 * @property string $baths
 * @property string $sqft
 * @property string $image1
 * @property string $image2
 * @property string $brochure
 * @property string $virtual_embed
 * @property string $virtual_tour
 * 
 */
class Property extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'status',
        'status_date',
        'address',
        'city',
        'state',
        'zip',
        'beds',
        'baths',
        'sqft',
        "image1",
        "image2",
        "teaser_prompt",
        "teaser_text",
        "brochure",
        "virtual_embed",
        "virtual_tour",
    ];
    
    public function leads(){
        return $this->hasMany(Lead::class);
    }
}
