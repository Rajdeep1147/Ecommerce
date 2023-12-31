<?php

namespace Modules\Country\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Country\app\Repositories\Interfaces\CountryInterface;

class CountryController extends Controller
{
    public function __construct(private CountryInterface $countryRepo)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->countryRepo->index();

        // return view('country::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('country::create');
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
        return view('country::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('country::edit');
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
