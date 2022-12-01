<?php

namespace App\Http\Controllers\API;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Node;

use function GuzzleHttp\Promise\all;

class NodeController extends Controller
{
    //
    public function postNode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'latitude' => 'required',
            'longitude' => 'required',
        ]);
        if ($validator->fails()) {
            return ResponseHelper::badRequest($validator->errors()->all(), "validation required");
        }
        Node::create([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude
        ]);
        return ResponseHelper::ok(true);
    }
}