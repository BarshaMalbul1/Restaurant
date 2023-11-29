<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Helpers\Validator;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        $items = Item::all();
        return response()->json([
            'status'=>200,
            'data'=>$items]);
    }

    public function getItemById($id)
    {
        $item=Item::find($id);
        if($item) {
            return response()->json($item,200);
        } else{
            return response()->json(['message'=>'item not found'],404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {

        Validator::validate(new Item(),$request);

        $items= DB::table('items')->insert([
           'name' =>$request['name'],
           'price' =>$request['price'],
           'description' =>$request['description'],
           'item_category_id' =>$request['categoryId'],
           'image' =>$request['image'],
           'created_at' =>Carbon::now(),
           'updated_at' =>Carbon::now(),
       ]);
       if($items) {
            return response()->json([
                'status' => 200,
                'message' => "items created successfully"
            ],200);
       } else {
           return response()->json([
               'status' => 500,
               'message' => "something went wrong"
           ],500);
       }

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return Item::find($item['id']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Item $item)
    {
       $item->name = $request['name']??$item->name;
       $item->price = $request['price']??$item->price;
       $item->description = $request['description']??$item->description;
       $item->item_category_id = $request['categoryId']??$item->item_category_id;
       $item->image = $request['image']??$item->image;
       $item->updated_at = Carbon::now();

        try {
            $item->save();
            return response()->json([
                'status' => 200,
                'message' => "something went wrong"
            ]);
        }
        catch (\Exception $e)
        {
            return response()->json([
                'status' => 500,
                'message' => "something went wrong"
            ],500);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $item = Item::find($id);
        if($item === null) {
            return response()->json([
                'status' => 404,
                'message' => "item does not exist"
            ],404);
        }

        $item->delete();
        return response()->json([
            'status' => 200,
            'message' => "deleted item"
        ],200);
    }
}
