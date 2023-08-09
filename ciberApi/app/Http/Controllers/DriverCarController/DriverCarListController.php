<?php

namespace App\Http\Controllers\DriverCarController;

use App\Http\Requests\DriverCarListRequest;
use App\Models\Driver;
use App\Models\DriverCar;
use Illuminate\Http\JsonResponse;

class DriverCarListController
{
    public function index(DriverCarListRequest $request, int $car_id, int $driver_id): jsonResponse
    {
        $data = $request->validated();
        $size = $data['page']['size'] ?? null;
        $offset = $data['page']['offset'] ?? null;

        $query = DriverCar::query()
            ->Where('driver_id', '=', $driver_id)
            ->orWhere('car_id', '=', $car_id);

        $total = $query
            ->count();

        $junction = $query
            ->limit($size)
            ->offset($offset)
            ->get();

        return response()->json(['data' => $junction, 'pagination' => ['current' => $offset, 'size' => $size, 'total' => $total]]);
    }
}
