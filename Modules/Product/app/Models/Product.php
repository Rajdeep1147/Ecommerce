<?php

namespace Modules\Product\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Comment\app\Models\Comment;
use Modules\Product\database\factories\ProductFactory as FactoriesProductFactory;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title','price', 'quantity','views','is_active'];
    
     protected static function newFactory()
    {
        return FactoriesProductFactory::new();
    }

    // Comment Relationship
    public function comments():HasMany
    {
        return $this->hasMany(Comment::class,'product_id');
    }
}
