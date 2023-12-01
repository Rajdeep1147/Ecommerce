<?php 
namespace Modules\Product\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    public function index(array $relations = []);
}

?>