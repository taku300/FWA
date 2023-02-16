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
        return $this->belongsTo(Affiliation::class);
    }

    /**
     * トップページ用 選手情報
     * top_post_flag = 0 非掲載
     * top_post_flag = 1 掲載
     * 
     * @return array
     */
    public function getTopLifter(): array
    {
        return Lifter::with('affiliation')->where('top_post_flag', 1)->orderBy('updated_at', 'DESC')->get()->toArray();
    }

    /**
     * Lifters用 選手情報
     */
    public function getLifters()
    {
        return Lifter::with('affiliation');
    }
}
