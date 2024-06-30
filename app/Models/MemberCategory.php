<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'period',
        'background',
        'member_category_id'
    ];

    public function members()
    {
        return $this->hasMany(Member::class);
    }
}