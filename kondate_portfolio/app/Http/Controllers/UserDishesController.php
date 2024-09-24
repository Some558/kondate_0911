<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserDishesRequest;
use App\Http\Requests\UpdateUserDishesRequest;
use App\Models\UserDishes;

class UserDishesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserDishesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserDishes $userDishes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserDishes $userDishes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserDishesRequest $request, UserDishes $userDishes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserDishes $userDishes)
    {
        //
    }
}
