<?php

namespace App\Http\Controllers;

use App\Http\Requests\MealRequest;
use App\Http\Resources\MealResource;
use App\Libraries\Meals;
use App\Models\Meal;
use Illuminate\Support\Facades\App;

class MealController extends Controller
{
    public function show(MealRequest $request)
    {
        return MealResource::collection(Meals::getMeals($request));
    }
}
