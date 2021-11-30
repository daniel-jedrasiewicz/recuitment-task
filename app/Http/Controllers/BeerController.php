<?php

namespace App\Http\Controllers;

use App\Models\Beer;

use Illuminate\Http\Request;

class BeerController extends Controller
{
    public function index()
    {
        $beers = Beer::paginate(40);
        return view('beers', ['beers' => $beers]);
    }

    public function import()
    {
        $json = file_get_contents('https://api.sampleapis.com/beers/ale');
        $beers = json_decode($json);

        foreach ($beers as $beer) {

            $price = $beer->price;
            $price = str_replace('$', '', $price);
            $price = (float)$price;

            if (empty($price)) {
                continue;
            }

            $exist_beer = Beer::where('id_api', $beer->id)->get();

            if ($exist_beer->count() === 0) {
                $beer_model = new Beer();
                $beer_model->price = $price;
                $beer_model->name = $beer->name;
                $beer_model->rating_average = $beer->rating->average ?? 0;
                $beer_model->rating_reviews = $beer->rating->reviews ?? 0;
                $beer_model->image = $beer->image;
                $beer_model->id_api = $beer->id;
                $beer_model->save();
            }
        }

        return redirect(route('beers'))->with('message', 'tabela została zaktualizowana' );;
    }
}
