<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'duration',
        'is_single',
        'cover_img',
    ];

    protected $appends = [
        'full_cover_img'
    ];

    public function getFullCoverImgAttribute()
    {
        if ($this->cover_img) {
            return asset('storage/'.$this->cover_img);
        }
        else {
            return null;
        }
    }
}
