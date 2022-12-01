<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class MasyarakatController extends Controller
{
    public function index(){
        if (isset($_GET['q'])) {
            // mengambil data user apps
            $dataUP = User::query()->where('is_masyarakat', 1)->where('nama', 'LIKE', "%{$_GET['q']}%")->get();
        } else {
            // mengambil data user apps
            $dataUP = User::where('is_masyarakat', 1)->get();
        }
        
        //mengirim data user apps ke view
        return view('masyarakat.index', ['dataUP' => $dataUP]);
    }
}
