<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use DB;

class LaporanController extends Controller
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

    public function index(){
        $center = ['-6.921685', '107.607142'];
        $zoom = '14';

        //get laporan
        $reports = DB::table('report')->join('users', 'users.id', '=', 'report.user_id')->where('users.is_masyarakat', '=', 1)->select('report.*', 'users.nama', 'users.lat', 'users.long')->orderBy('report.created_at', 'desc')->get();

        return view('laporan.laporanBiasa', compact('reports', 'center', 'zoom'));
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
