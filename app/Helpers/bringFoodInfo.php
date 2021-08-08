<?php

namespace App\Helpers;

use Carbon\Carbon;
use App\Models\SevenDayPlan;
use GuzzleHttp\Client as GuzzleHttpClient;

class bringFoodInfo
{

    public static function bringFoodInfo($foodId)
    {

        $api = 'b1a2074e56b54ccf99262f978245803f';
        $requestContent = [
            'headers' => [
                'content-Type' => 'application/json',
            ],
        ];

        try {
            $client = new GuzzleHttpClient();
            //will bring 7 day plan for user according to his target calorie
            $apiRequest = $client->request('GET','https://api.spoonacular.com/recipes/'.$foodId.'/summary?apiKey='.$api);
            $response = json_decode($apiRequest->getBody());

        } catch (\GuzzleHttp\Exception\RequestException $e) {
            echo ($e);
        }
        //html of the card

        echo ( '
        <div class="card" style="width: 18rem;">
            <img class="card-img-top mobile" src="https://spoonacular.com/recipeImages/'.$foodId.'-312x231.jpg" alt="Card image cap">
            <img class="card-img-top desktop" src="https://spoonacular.com/recipeImages/'.$foodId.'-636x393.jpg" alt="Card image cap">
            <div class="card-body">
            <h4 class="cardTittle">'. $response->title.'</h4>
            <a href="#" class="btn btn-primary">See Recipe</a>
            </div>
        </div>
        ');
    }
}
