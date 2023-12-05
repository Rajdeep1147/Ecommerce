<?php 
namespace  Modules\Country\app\Repositories\Classes;

use App\Repositories\RepositoryClasses\BaseRepository;
use Modules\Country\app\Models\Country;
use Modules\Country\app\Repositories\Interfaces\CountryInterface;

class CountryClass extends BaseRepository implements CountryInterface
{
     public function __construct(Country $model)
    {
        $this->model = $model;
    }

    public function index(array $relation =[])
    {
        $country =  Country::whereHas('posts',function($query){
            $query->where('is_active',True);
        })->get();
           return $country;
    }
}
?>