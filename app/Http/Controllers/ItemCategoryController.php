<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ResponseHelper;
use App\Http\Helpers\Validator;
use App\Models\Item;
use App\Models\ItemCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ItemCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $items = ItemCategory::all();
        return response()->json([
            'status'=>200,
            'data'=>$items]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        Validator::validate(new ItemCategory(),$request);

        $category = new ItemCategory($request->all());
        $category->save();
        if($category) {
            return ResponseHelper::renderResponse(200,"Category created successfully",$category->toArray());
        }

        return ResponseHelper::renderResponse(500, "Something went wrong");
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function getItemById($id): \Illuminate\Http\JsonResponse
    {
        $category = ItemCategory::find($id);
        if ($category === null) {
            return ResponseHelper::renderResponse(404, "Category does not exist");
        }
        return ResponseHelper::renderResponse(200, "sucessfully fetched", $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $category = ItemCategory::find($id);
        if ($category === null) {
            return ResponseHelper::renderResponse(400, "Category not found");
        }

        $category->delete();
        return ResponseHelper::renderResponse(200, "Successfully deleted category");
    }
}
