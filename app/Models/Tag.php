<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $appends = ['boolstatus', 'featured'];

    public function getBoolStatusAttribute()
    {
        if($this->attributes['status']) return 'Active';
        else return 'Inactive';
    }

    public function getFeaturedAttribute()
    {
        if($this->attributes['is_featured']) return 'Yes';
        else return 'No';
    }
}
