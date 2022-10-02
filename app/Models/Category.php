<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guard = ['id'];
    protected $fillable = [
        'name', 'user_id', 'article_id'
    ];
    /* public function article(){
        return $this->belongsTo(Article::class);
    }  */
}
