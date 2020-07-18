<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function allcars(){
        $cars = Car::all();
        $title = "Cars";
        $data = [
            'cars'=>$cars,
            'title'=>$title
        ];
        return view('allcars')->with('data',$data);
    }

    public function particularCar($id){
        $car = Car::find($id);
        return view('particularCar',['cars' => $car]);
        
    }

    public function newCar(Request $request){
        $this->validate($request,['make' => 'required', 'model' => 'required','produced_on'=>'required','image'=>'required']);
        
        
       /*  $this->validate(
            request(), 
        ['make' => 'required', 'car_model' => 'required|unique:cars,model',
        'produced_on'=>'required','image'=>'required']) */
        $car = new Car;
        $car->make = request('make');
        $car ->model = request('model');
        $car ->produced_on =request('produced_on');
        $car ->image = request()->file('image')->store('public/images');
        $car ->save();
        request()->session()->flash("form_submit","Car saved successfully");
        return ("Record has been added!");

    }
    
    public function newCarForm(){
        return view('newcar');
    }
public function carreviews($id){
       $car = Car::find($id);
       $reviews = $car->reviews;
       return $reviews;
}


    public function show($id)
    {
        $car = Car::find($id);

        //return view('cars.pages.show', compact('car'));
    }

}
