<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ResponseHelper;
use App\Http\Helpers\Validator;
use App\Models\Reservation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $reservation = Reservation::all();
        return response()->json([
            'status'=>200,
            'data'=>$reservation]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        Validator::validate(new Reservation(),$request);

        $reservation = new Reservation($request->all());
        $reservation->save();
        if($reservation) {
            return ResponseHelper::renderResponse(200,"Reservation created successfully",$reservation->toArray());
        }
        return ResponseHelper::renderResponse(500, "Something went wrong");
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function getItemById($id): JsonResponse
    {
        $reservation = Reservation::find($id);
        if ($reservation === null) {
            return ResponseHelper::renderResponse(404, "Reservation does not exist");
        }
        return ResponseHelper::renderResponse(200, "successfully fetched", $reservation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        if ($reservation === null) {
            return ResponseHelper::renderResponse(400, "Reservation not found");
        }

        $reservation->delete();
        return ResponseHelper::renderResponse(200, "Successfully deleted Reservation");
    }
}
