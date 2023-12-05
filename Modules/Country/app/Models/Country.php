<?php

namespace Modules\Country\app\Models;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Modules\Country\database\factories\CountryFactory;

class Country extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['name'];
    
    protected static function newFactory()
    {
        return CountryFactory::new();
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
    
    public function posts(): HasManyThrough
    {
        return $this->hasManyThrough(Post::class,User::class);
    }
}
