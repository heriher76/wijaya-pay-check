<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Helper\ResponseHelper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DB;

class MasyarakatReportController extends Controller
{
    // kirim laporan masyarakat
    public function postMasyarakatReport(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'foto' => 'required'
        ]);

        if ($validator->fails()) {
            return ResponseHelper::badRequest($validator->errors()->all(), "validator required");
        }
        $file = $request->foto;
        $image_path = 'img/masyarakat-report/';
        $file_name = $image_path . Carbon::now()->timestamp . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($image_path), $file_name);

        DB::table('users')->where('id', Auth::user()->id)->update([
            'lat' => $request->lat,
            'long' => $request->long,
        ]);

        Auth::user()->reportMasyarakat()->create([
            'judul' => $request->judul,
            'foto' => $file_name
        ]);

        return ResponseHelper::ok(true);
    }
}
