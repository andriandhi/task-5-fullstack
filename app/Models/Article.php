<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $guard = ['id'];
    protected $fillable = [
        'title', 'content', 'image', 'user_id', 'category_id'
    ];
    /* public function category(){
        return $this->hasOne(Category::class);
    }  */
}
