<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'photo',
        'member_category_id',
    ];

    public function memberCategory()
    {
        return $this->belongsTo(MemberCategory::class);
    }
}