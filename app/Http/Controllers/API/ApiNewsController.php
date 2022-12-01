<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use DB;

class ApiNewsController extends Controller
{
    public function index(){
    	if (isset($_GET['q'])) {
            $listNews = News::query()->where('title', 'LIKE', "%{$_GET['q']}%")->orderBy('created_at', 'DESC')->get();
        } else {
            $listNews = News::orderBy('created_at', 'DESC')->get();
        }
        
        return response()->json(['data' => $listNews, 'message' => 'Berhasil Ambil Data Berita'], 200);
    }

    public function show($id)
    {
        $news = DB::table('news')->where('id', $id)->first();

        return response()->json(['data' => $news, 'message' => 'Berhasil Ambil Data Berita'], 200);
    }
}
