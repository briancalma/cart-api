<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meal;
use App\Http\Resources\Meal as MealResource;

class MealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TODO: Create a controller for meals api  
        // $meals = Meal::paginate(15);
        // return MealResource::collection($meals);
        
        $meals = Meal::all();;
        
        return view('meal.index')->with(compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('meal.addmealform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # Getting all input data
        $meal = new Meal;
        $meal->name = $request->input('name');
        $meal->price = $request->input('price');
        $meal->description = $request->input('description');

        # TODO: Make all the letter of the meal type lowercase 
        $meal->menu_type =  $request->input('meal_type');
        $meal->banner = '/assets/imgs/thumbs/default.jpg';

        if ( $meal->save() ) {
            return redirect('meal');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $meal = Meal::find($id);

       return view('meal.editmealform')->with(compact('meal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $meal = Meal::find($id);
        
        $meal->name = $request->input('name');
        $meal->price = $request->input('price');
        $meal->description = $request->input('description');

        # TODO: Make all the letter of the meal type lowercase 
        $meal->menu_type =  $request->input('meal_type');
        
        if ( $meal->save() ) {
            return redirect('meal');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meal = Meal::find($id);

        if( $meal->delete() ){
            return redirect('meal');
        }
    }

    
}
