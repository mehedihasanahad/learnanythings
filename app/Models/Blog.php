<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $appends = ['boolstatus', 'boolfeatured', 'boolcontenttype', 'booltemplate'];

    protected $casts = [
        'tag_ids' => 'array',
    ];

    public function getBoolStatusAttribute()
    {
        if($this->attributes['status']) return 'Active';
        else return 'Inactive';
    }

    public function getBoolFeaturedAttribute()
    {
        if($this->attributes['is_featured']) return 'Yes';
        else return 'No';
    }

    public function getBoolContentTypeAttribute()
    {
        if($this->attributes['content_type'] === 1) return 'Default';
        elseif($this->attributes['content_type'] === 2) return 'List';
    }

    public function getBoolTemplateAttribute()
    {
        if($this->attributes['template'] === 1) return 'Default';
        elseif($this->attributes['template'] === 2) return 'List';
    }
}
