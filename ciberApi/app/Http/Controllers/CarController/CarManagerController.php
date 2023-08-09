<?php

namespace App\Http\Controllers\CarController;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarPostRequest;
use App\Http\Requests\CarUpdateRequest;
use App\Models\Car;
use App\Models\DriverCar;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CarManagerController extends Controller
{
    public function post(CarPostRequest $request): jsonResponse
    {
        $data = $request->validated();
        $car = Car::create($data);
        $car->save();

        return response()->json(['data' => $car]);
    }

    public function patch(CarUpdateRequest $request, $id): jsonResponse
    {
        $data = $request->validated();

        $carFind = Car::query()
            ->where('car_id', '=', $id)
            ->update($data);

        if ($carFind === 0)  return response()->json(['errors' => ['status: 404', 'title: not found', 'detail : Car with id not found:' => $id ]]);

        return response()->json(['data_updated' => $data, 'id' => $id]);
    }

    public function delete($id): jsonResponse
    {
        $dropCar = Car::query()
            ->where('car_id', '=', $id)
            ->delete();

        DriverCar::query()
            ->where('car_id', '=', $id)
            ->delete();

        if ($dropCar === 0) return response()->json(['errors' => ['status: 404', 'title: not found', 'detail : Car with id ' . $id . ' not found']]);

        return response()->json(['data_deleted' => $id]);
    }
}
