<?php

namespace App\Http\Controllers\CarController;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarListRequest;
use App\Models\Car;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CarListController extends Controller
{
    public function index(CarListRequest $request): JsonResponse
    {
        $data = $request->validated();
        $size = $data['page']['size'] ?? null;
        $offset = $data['page']['offset'] ?? null;
        $filter = $data['filter'] ?? null;

        $query = Car::query()
            ->when(
                $filter['model'] ?? false,
                fn(Builder $q, string $model) => $q->where('model', 'LIKE', '%' . $model . '%')
            )
            ->when(
                $filter['class'] ?? false,
                fn(Builder $q, string $class) => $q->where('class', 'LIKE', '%' . $class . '%')
            );

        $total = $query->count();

        $cars = $query
            ->limit($size)
            ->offset($offset)
            ->get();

        return response()->json(['data' => $cars, 'pagination' => ['current' => $offset, 'size' => $size, 'total' => $total]]);
    }

    public function show(int $id): JsonResponse
    {
        $car = Car::query()
            ->where('car_id', '=', $id)
            ->first();

        if ($car === null) return response()->json(['errors' => ['status: 404', 'title: invalid request', 'detail: car not found']], status: 404);

        return response()->json(['data' => $car]);
    }
}
