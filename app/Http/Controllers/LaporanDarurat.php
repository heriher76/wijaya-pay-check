<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmergencyReport;
use App\User;
use DB;

class LaporanDarurat extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('laporan.laporanDarurat');
    // }

    public function map(){
        $center = ['-6.921685', '107.607142'];
        $zoom = '14';

        //get laporan
        $reports = DB::table('emergency_report')->join('users', 'users.id', '=', 'emergency_report.user_id')->where('users.is_personil_active', '=', 1)->select('emergency_report.*', 'users.nama', 'users.lat', 'users.long', 'users.no_hp')->orderBy('emergency_report.created_at', 'desc')->get();
        $list_agen = User::where('is_masyarakat', 1)->get();
        $list_petugas = User::where('is_personil_active', 1)->get();

        $agen_locations = [];
        foreach($list_agen as $key => $user) {
            array_push($agen_locations, [$user->nama, $user->lat, $user->long, $key+1]);
        }

        $petugas_locations = [];
        foreach($list_petugas as $key => $user) {
            array_push($petugas_locations, [$user->nama, $user->lat, $user->long, $key+1]);
        }

        return view('laporan.laporanDarurat', compact('reports', 'center', 'zoom', 'agen_locations', 'petugas_locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
