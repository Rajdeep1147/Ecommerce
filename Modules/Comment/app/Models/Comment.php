<?php

namespace Modules\Comment\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Comment\database\factories\CommentFactory;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['user_id','product_id','body','is_active'];
    
    protected static function newFactory()
    {
        return CommentFactory::new();
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id');
    } 
}
