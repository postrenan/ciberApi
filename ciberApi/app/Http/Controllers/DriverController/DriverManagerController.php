<?php

namespace App\Http\Controllers\DriverController;

use App\Http\Controllers\Controller;
use App\Http\Requests\DriverPostRequest;
use App\Http\Requests\DriverUpdateRequest;
use App\Models\DriverCar;
use Illuminate\Http\Request;
use App\Models\Driver;
use Illuminate\Http\JsonResponse;

class DriverManagerController extends Controller
{
        public function post(DriverPostRequest $request): JsonResponse
    {
        $driverData = $request->validated();
        $newDriver = Driver::create($driverData);
        $newDriver->save();

        return response()->json(["data" => $newDriver]);
    }

    public function patch(DriverUpdateRequest $request, int $id): jsonResponse
    {
        $driverData = $request->validated();

        $driverUpdate= Driver::query()
            ->where('driver_id', '=', $id)
            ->update($driverData);

        if ($driverUpdate === 0) return response()->json(['errors' => ['status: 404', 'title: not found', 'detail : Diver with id not found:' => $id ]]);

        return response()->json(["data_updated" => $driverData, 'id' => $id]);
    }

    public function delete(int $id): jsonResponse
    {
        $driverDrop = Driver::query()
            ->where('driver_id', '=', $id)
            ->delete();

        DriverCar::query()
            ->where('driver_id', '=', $id)
            ->delete();

        if ($driverDrop === 0) return response()->json(['errors' => ['status:' , 'title: not found', 'detail : Driver with id not found: ' => $id]]);

        return response()->json(["data_deleted" => $id]);
    }
}
