<?php

namespace App\Http\Controllers\DriverController;

use App\Http\Controllers\Controller;
use App\Http\Requests\DriverListRequest;
use App\Models\Driver;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Builder;


class DriverListController extends Controller
{
    public function index(DriverListRequest $request): JsonResponse
    {
        $data = $request->validated();
        $size = $data['page']['size'] ?? null;
        $offset = $data['page']['offset'] ?? null;
        $filter = $data['filter'] ?? null;

        $query = Driver::query()
            ->when(
                $filter['first_name'] ?? false,
                fn(Builder $q, string $first_name) => $q->where('first_name', 'LIKE',  '%' . $first_name . '%')
            )
            ->when(
                $filter['last_name'] ?? false,
                fn(Builder $q, string $last_name) => $q->where('last_name', 'LIKE', '%' . $last_name . '%')
            );

        $total = $query
            ->count();

        $driver = $query
            ->limit($size)
            ->offset($offset)
            ->get();

        return response()->json(['data' => $driver, 'pagination' => ['current' => $offset, 'size' => $size, 'total' => $total]]);

    }

    public function show(int $id): JsonResponse
    {
        $driver = Driver::query()
            ->where('driver_id', '=', $id)
            ->first();

        if ($driver === null) return response()->json(['errors' => ['status: 404', 'title: invalid request', 'detail: driver not found']], status: 404);

        return response()->json(['data' => $driver]);
    }
}
