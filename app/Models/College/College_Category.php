<?php

namespace App\Models\College;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College_Category extends Model
{
    use HasFactory;

    protected $table = 'college_categories';

    protected $fillable = ['category_id','college_id'];
}
