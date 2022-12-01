<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ApiUserAppsController extends Controller
{
    public function index(){
        if (isset($_GET['q'])) {
            // mengambil data user apps
            $dataUP = User::query()->where('is_admin', 0)->where('nama', 'LIKE', "%{$_GET['q']}%")->get();
        } else {
            // mengambil data user apps
            $dataUP = User::where('is_admin', 0)->get();
        }
        
        //mengirim data user apps ke view
        return response()->json(['data' => $dataUP, 'message' => 'Berhasil Ambil Data User Apps'], 200);
    }

    public function show($id){
        $user = User::where('is_admin', 0)->where('id', $id)->first();
        
        //mengirim data user apps ke view
        return response()->json(['data' => $user, 'message' => 'Berhasil Ambil Data User Apps'], 200);
    }
}
