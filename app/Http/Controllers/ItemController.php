<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ResponseHelper;
use App\Models\Item;
use App\Models\ItemCategory;
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
        if($item === null) {
            return ResponseHelper::renderResponse(404, "Item does not exist");
        }
        return ResponseHelper::renderResponse(200, "successfully fetched", $item);
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
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->storeAs('public/images', $imageName);

        Validator::validate(new Item(),$request);

        $item = new Item($request->all());
        $item->image = $imageName;
        $item->save();
        if($item) {
            return ResponseHelper::renderResponse(200,"Item created successfully",$item->toArray());
        }
        return ResponseHelper::renderResponse(500, "Something went wrong");

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Item $item): \Illuminate\Http\JsonResponse
    {
        $customer = Item::find($item);
        if ($customer === null) {
            return ResponseHelper::renderResponse(404, "Item does not exist");
        }
        return ResponseHelper::renderResponse(200, "successfully fetched", $item);
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

    public function getItemsByCategoryId($id): \Illuminate\Http\JsonResponse
    {
        $items = Item::where('item_category_id',$id)->get();
//dd($items);
        if ($items === null) {
            return ResponseHelper::renderResponse(404, "Items does not exist");
        }
        return ResponseHelper::renderResponse(200, "successfully fetched", $items);
    }
}
