<?php

namespace App\Http\Controllers;

use App\Http\Requests\DishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Http\Resources\DishList;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    public function store(DishRequest $request)
    {
        //Create Dish
        if ($request->validated()){
            $createDish = Dish::create(
                $request->only('name','calories','ingredients','image','price')
            );

            if ($createDish){
                $data = $createDish;
                $message = 'Dish Created Successfully!';
            }else{
                $message = 'Unexpected Error';
                $data = [];
            }

            return response()->json([
                'date' => $data,
                'message' => $message
            ]);

        }
    }


    public function show($id)
    {

        //Read Dish
        $dish = Dish::find($id);

        if ($dish){
            $singleDish = new DishList($dish); //new resource from app/Http/Resources/Api/SmsSurvey/SurveyList.php
            $message = '';
        }else{
            $singleDish = [];
            $message = 'Dish Does not exist';
        }
        return response()->json([
            'date' => $singleDish,
            'message' => $message
        ]);

    }

    public function update(UpdateDishRequest $request, $id)
    {
        //Update Dish
        $dish = Dish::find($id);
        if ($dish){
            if ($request->has('name')){
                $dish->name = $request->name;
            }
            if ($request->has('calories')){
                $dish->calories = $request->calories;
            }
            if ($request->has('ingredients')){
                $dish->ingredients = $request->ingredients;
            }
            if ($request->has('image')){
                $dish->image = $request->image;
            }
            if ($request->has('price')){
                $dish->price = $request->price;
            }
            $dish->save();

            $updatedDish = new DishList(Dish::find($id));
            $message = 'Dish of id: '.$id.' Updated Successfully!';
        }else{
            $updatedDish = [];
            $message = 'Dish Not Found!';
        }

        return response()->json([
            'date' => $updatedDish,
            'message' => $message
        ]);
    }

    public function destroy($id)
    {
        //Delete Dish
        $dish = Dish::find($id);
        if ($dish){
            $dish->delete();
            $message = 'Dish of id: '.$id.' deleted successfully!';
        }else{
            $message = 'Dish not found!';
        }
        return response()->json([
            'date' => [],
            'message' => $message
        ]);
    }

}
