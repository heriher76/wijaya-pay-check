<?php

namespace App\Http\Controllers\API;

use App\Helper\ResponseHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;

class Report extends Controller
{
    public function history()
    {
        $reports = ['laporan_biasa' => Auth::user()->report, 'laporan_darurat' => Auth::user()->emergencyReport];

        return response()->json(['data' => $reports]);
    }

    //kirim laporan biasa
    public function postReport(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'isi' => 'required',
            'foto' => 'required'
        ]);

        if ($validator->fails()) {
            return ResponseHelper::badRequest($validator->errors()->all(), "validator required");
        }
        $file = $request->foto;
        $image_path = 'img/report/';
        $file_name = $image_path . Carbon::now()->timestamp . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($image_path), $file_name);

        DB::table('users')->where('id', Auth::user()->id)->update([
            'lat' => $request->lat,
            'long' => $request->long,
        ]);

        Auth::user()->report()->create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'foto' => $file_name
        ]);

        return ResponseHelper::ok(true);
    }
}