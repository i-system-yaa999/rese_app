<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AreaRequest;
use App\Models\Area;

class AreaController extends Controller
{
    public function create(Request $request)
    {
        $data = Area::create([
            'name' => '',
        ]);
        return $data;
    }
    public function update(AreaRequest $request)
    {
        Area::where('id', $request->area_id)->update([
            'name' => $request->input('area_name' . $request->area_id),
        ]);
        return;
    }
}
