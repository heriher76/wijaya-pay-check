<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReportMasyarakat;
use App\User;

class LaporanMasyarakat extends Controller
{
    public function map(){
        $center = ['-6.921685', '107.607142'];
        $zoom = '14';

        //get laporan
        $reports = ReportMasyarakat::orderBy('created_at', 'desc')->get();
        $users = User::all();

        $locations = [];
        foreach($users as $key => $user) {
            array_push($locations, [$user->nama, $user->lat, $user->long, $key+1]);
        }

        return view('laporan.laporanMasyarakat', compact('reports', 'center', 'zoom', 'locations'));
    }
}
