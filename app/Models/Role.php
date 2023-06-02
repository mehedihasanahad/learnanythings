<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $appends = ['boolstatus'];

    public function getBoolStatusAttribute()
    {
        if($this->attributes['status']) return 'Active';
        else return 'Inactive';
    }
}
