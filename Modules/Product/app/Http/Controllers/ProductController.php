<?php

namespace Modules\Product\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Comment\app\Repository\Interfaces\CommentRepositoryInterface;
use Modules\Product\Repositories\Interfaces\ProductRepositoryInterface;

// use Modules/Product/app/Repositories/Interfaces;

class ProductController extends Controller
{

    public function __construct(
        private ProductRepositoryInterface $productRepo,
        private CommentRepositoryInterface $commentRepo
    )
    {
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return  $this->productRepo->index();
        // return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('product::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('product::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
