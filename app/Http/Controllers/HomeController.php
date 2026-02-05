<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public function index()
     {

        $cars = Car::get();

        // $cars=Car::where('published_at','!=',null)->get();

        $cars = Car::orderBy('published_at', 'desc')->get();

        // dump($cars);

        // $car = new Car();
        // $car ->maker_id = 1;
        // $car ->model_id = 1;
        // $car ->year = 1900;
        // $car ->price = 123;
        // $car ->vin = 123;
        // $car ->mileage = 123;
        // $car ->car_type_id = 1;
        // $car ->fuel_type_id = 1;
        // $car ->user_id = 1;
        // $car ->city_id = 1;
        // $car ->address = 'loewm ee';
        // $car ->phone = 123;
        // $car ->description = null;
        // $car ->published_at = now();
        // $car->save();

        $carData = [
            'maker_id '=>1,
            'model_id '=>1,
            'year '=>2024,
            'price'=>1200,
            'vin '=>123,
            'mileage'=>124,
            'car_type_id'=>1,
            'fuel_type_id'=>1,
            'user_id '=>1,
            'city_id'=>1,
            'address'=>'efeg4g',
            'phone'=>123,
            'description'=>'regregr',
            'published_at'=>1,
        ];

        // $car = Car::create($carData);

        // $car2 = new Car;
        // $car2->fillable($carData);
        // $car2->save();

        // $car3 = new Car($carData);
        // $car3->save();

        // $car = Car::updateOrCreate([
        //     'vin ' => '999', 'price' => 20000],
        //     ['price' => 25000]
        // );

        // dump($car);

        return View::make('home.index');

    }
}
