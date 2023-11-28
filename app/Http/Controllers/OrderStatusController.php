<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ResponseHelper;
use App\Http\Helpers\Validator;
use App\Models\OrderStatus;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $orderStatus = OrderStatus::all();
        return response()->json([
            'status'=>200,
            'data'=>$orderStatus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        Validator::validate(new OrderStatus(),$request);

        $orderStatus = new OrderStatus($request->all());
        $orderStatus->save();
        if($orderStatus) {
            return ResponseHelper::renderResponse(200,"OrderStatus created successfully",$orderStatus->toArray());
        }
        return ResponseHelper::renderResponse(500, "Something went wrong");
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function getItemById($id): JsonResponse
    {
        $orderStatus = OrderStatus::find($id);
        if ($orderStatus === null) {
            return ResponseHelper::renderResponse(404, "OrderStatus does not exist");
        }
        return ResponseHelper::renderResponse(200, "successfully fetched", $orderStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $orderStatus = OrderStatus::find($id);
        if ($orderStatus === null) {
            return ResponseHelper::renderResponse(400, "OrderStatus not found");
        }

        $orderStatus->delete();
        return ResponseHelper::renderResponse(200, "Successfully deleted OrderStatus");
    }
}
