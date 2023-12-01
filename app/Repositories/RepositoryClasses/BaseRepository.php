<?php 
namespace App\Repositories\RepositoryClasses;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface{

    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index(
        array $relations = []
    )
    {
        return $this->model::query()
        ->with($relations)
        ->latest();
        
    }
}
?>