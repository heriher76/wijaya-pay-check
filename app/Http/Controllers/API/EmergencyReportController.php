<?php

namespace App\Http\Controllers\API;

use App\Helper\ResponseHelper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;

class EmergencyReportController extends Controller
{
    // kirim laporan darurat
    public function postEmergencyReport(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'foto' => 'required'
        ]);

        if ($validator->fails()) {
            return ResponseHelper::badRequest($validator->errors()->all(), "validator required");
        }
        $file = $request->foto;
        $image_path = 'img/emergency-report/';
        $file_name = $image_path . Carbon::now()->timestamp . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($image_path), $file_name);
        
        DB::table('users')->where('id', Auth::user()->id)->update([
            'lat' => $request->lat,
            'long' => $request->long,
        ]);

        Auth::user()->emergencyReport()->create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'foto' => $file_name
        ]);

        return ResponseHelper::ok(true);
    }
}