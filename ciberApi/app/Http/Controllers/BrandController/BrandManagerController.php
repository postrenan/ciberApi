<?php

namespace App\Http\Controllers\BrandController;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandPostRequest;
use App\Models\Brand;
use App\Models\Car;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BrandManagerController extends Controller
{
    public function post(BrandPostRequest $request): JsonResponse
    {
        $data = $request->validated();
        $brand = Brand::create($data);
        $brand->save();

        return response()->json(['data' => $brand]);
    }

    public function patch(Request $request, int $id): JsonResponse
    {

        $brandFind = Brand::query()
            ->where('brand_id', '=', $id)
            ->update($request->all());

        if ($brandFind === 0) return response()->json(['errors' => ['status: 404', 'title: not found', 'detail : Brand with id ' . $id . ' not found']]);

        return response()->json(['data_updated' => $request->all(), 'id' => $id]);
    }

    public function delete(int $id): JsonResponse
    {
        $dropBrand = Brand::query()
            ->where('brand_id', '=', $id)
            ->delete();

        if ($dropBrand === 0) return response()->json(['errors' => ['status: 404', 'title: not found', 'detail : Brand with id ' . $id . ' not found']]);

        return response()->json(['data_deleted' => $id]);
    }
}
