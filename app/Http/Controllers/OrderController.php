<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ResponseHelper;
use App\Http\Helpers\Validator;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $order = Order::all();
        return response()->json([
            'status'=>200,
            'data'=>$order]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        Validator::validate(new Order(),$request);

        $order = new Order($request->all());
        $order->save();
        if($order) {
            return ResponseHelper::renderResponse(200,"Order created successfully",$order->toArray());
        }
        return ResponseHelper::renderResponse(500, "Something went wrong");
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getItemById($id): \Illuminate\Http\JsonResponse
    {
        $order = Order::find($id);
        if ($order === null) {
            return ResponseHelper::renderResponse(404, "Order does not exist");
        }
        return ResponseHelper::renderResponse(200, "successfully fetched", $order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        if ($order === null) {
            return ResponseHelper::renderResponse(400, "Order not found");
        }

        $order->delete();
        return ResponseHelper::renderResponse(200, "Successfully deleted Order");
    }
}
