<?php 
namespace Modules\Product\Repositories\Classes;

use App\Repositories\RepositoryClasses\BaseRepository;
use Modules\Product\app\Models\Product;
use Modules\Product\Repositories\Interfaces\ProductRepositoryInterface;

class ProductClass extends BaseRepository implements ProductRepositoryInterface
{
     public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function index(array $relation =[])
    {
       $products = Product::with(['comments' => fn($query)=>
        $query->where('is_active', true)
    ])->get();
   
    $products = Product::find(3);
    //     $create = $products->comments()->create([
    //         'user_id'=>1,
    //         'body' =>'tets',
    //         'is_active' => true
    //     ]);

    // $products->comments()->delete();
      
        return $products;
    }
}
?>