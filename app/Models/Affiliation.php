<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Lifter;

class Affiliation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function lifter()
    {
        return $this->hasOne(Lifter::class);
    }
}
