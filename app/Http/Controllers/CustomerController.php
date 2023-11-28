<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ResponseHelper;
use App\Http\Helpers\Validator;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $customer = Customer::all();
        return response()->json([
            'status'=>200,
            'data'=>$customer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        Validator::validate(new Customer(),$request);

        $customer = new Customer($request->all());
        $customer->save();
        if($customer) {
            return ResponseHelper::renderResponse(200,"Customer created successfully",$customer->toArray());
        }
        return ResponseHelper::renderResponse(500, "Something went wrong");
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function getItemById($id): JsonResponse
    {
        $customer = Customer::find($id);
        if ($customer === null) {
            return ResponseHelper::renderResponse(404, "Customer does not exist");
        }
        return ResponseHelper::renderResponse(200, "successfully fetched", $customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        if ($customer === null) {
            return ResponseHelper::renderResponse(400, "Customer not found");
        }

        $customer->delete();
        return ResponseHelper::renderResponse(200, "Successfully deleted Customer");
    }
}
