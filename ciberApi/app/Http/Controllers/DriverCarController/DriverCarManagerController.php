<?php

namespace App\Http\Controllers\DriverCarController;

use App\Http\Controllers\Controller;
use App\Http\Requests\DriverCarPostRequest;
use App\Models\DriverCar;
use http\Env\Request;
use Illuminate\Http\JsonResponse;

class DriverCarManagerController extends Controller
{
    public function post(DriverCarPostRequest $request): jsonResponse
    {
        $data = $request ->validated();
        $junction = DriverCar::query()
            ->create($data)
            ->save();

        return response()->json(['data:' => $junction]);
    }

    public function delete(int $car_id, int $driver_id): JsonResponse
    {
        $deleteJunction = DriverCar::query()
            ->where([
                ['driver_id', '=', $driver_id],
                ['car_id', '=', $car_id]])
            ->delete();

        if ($deleteJunction === 0) return response()->json(['errors' => ['status: 404', 'title: invalid request', 'detail: ids not found']], status: 404);

        return response()->json($deleteJunction);
    }

}
