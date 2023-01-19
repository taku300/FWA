<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Affiliation;

class Lifter extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'first_name_kana',
        'last_name_kana',
        'gender',
        'category',
        'affiliation_id',
        'weight_class',
        'image_path',
        'performance',
        'birthday',
        'comment',
        'top_post_flag'
    ];

    public function affiliation()
    {
        return $this->hasOne(Affiliation::class);
    }
}
