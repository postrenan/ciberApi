<?php

namespace App\Http\Controllers\BrandController;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandListRequest;
use App\Models\Brand;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class BrandListController extends Controller
{
    public function index(BrandListRequest $request): JsonResponse
    {

        $data = $request->validated();
        $size = $data['page']['size'] ?? null;
        $offset = $data['page']['offset'] ?? null;
        $filter = $data['filter'] ?? null;

        $query = Brand::query()
            ->when(
                $filter['name'] ?? false,
                fn(Builder $q, string $name) => $q->where('name', 'LIKE', '%' . $name . '%')
            )
            ->when(
                $filter['country'] ?? false,
                fn(Builder $q, string $country) => $q->where('country', 'LIKE', '%' . $country . '%')
            );

        $total = $query
            ->count();

        $brand = $query
            ->limit($size)
            ->offset($offset)
            ->get();

        return response()->json(['data' => $brand, 'pagination' => ['current' => $offset, 'size' => $size, 'total' => $total]]);

    }

    public function show(int $id): JsonResponse
    {
        $brand = Brand::query()
            ->where('brand_id', '=', $id)
            ->first();

        if ($brand === null) return response()->json(['errors' => ['status: 404', 'title: invalid request', 'detail: brand not found']], status: 404);

        return response()->json(['data' => $brand]);
    }
}
