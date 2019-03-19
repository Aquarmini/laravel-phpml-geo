<?php

namespace App\Http\Controllers;

use App\PoiDistricts;
use App\PoiDistrictService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $lon = $request->input('lon');
        $lat = $request->input('lat');

        // 查询对应数据
        $client = app()->get(PoiDistrictService::class)->getClassifier();
        $id = $client->predict([$lon, $lat]);

        $model = PoiDistricts::query()->where('oid', $id)->first();
        return $model->toArray();
    }
}
