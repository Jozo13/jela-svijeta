<?php

namespace App\Libraries;

use App\Models\Language;
use App\Models\Meal;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class Meals
{


    public static function checkLanguage($lang)
    {
        if (Language::where('lang', $lang)->exists()) {
            return $lang;
        } else {
            return 'en';
        }
    }

    public static function getMeals($request)
    {
        $lang = Meals::checkLanguage($request->lang ?? '');
        App::setLocale($lang);

        $meals = new Meal();

        if ($request->category) {
            $meals = $meals->where('category_id', $request->category);
        }

        if ($request->tags) {
            $tags = explode(',', $request->tags);

            $meals = $meals->whereHas('tags', function ($q) use ($tags) {
                $q->whereIn('tags.id', $tags);
            });
        }

        if ($request->diff_time) {
            $meals = $meals->whereDate('created_at', '>', Carbon::createFromTimestamp($request->diff_time))->withTrashed();
        }

        if ($request->with) {
            $with = explode(',', $request->with);
            foreach ($with as $keyword) {
                if ($keyword == Meal::INGREDIENTS) {
                    $meals = $meals->with('ingredients');
                }
                if ($keyword == Meal::TAGS) {
                    $meals = $meals->with('tags');
                }
                if ($keyword == Meal::CATEGORY) {
                    $meals = $meals->with('category');
                }
            }
        }

        return $meals->paginate($request->get('per_page', Meal::PERPAGE), ['*'], 'page', $request->get('page', Meal::PAGE));
    }
}
