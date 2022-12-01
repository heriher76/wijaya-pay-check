<?php

namespace App\Http\Controllers;

use FarhanWazir\GoogleMaps\GMaps;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function map()
    {

        $lat = '6.9271';
        $long = '79.9612';
        $config = array();
        $config['center'] = '-6.921685, 107.607142';
        $config['zoom'] = '14';
        $config['map_height'] = '400px';

        $gmap = new GMaps();
        $gmap->initialize($config);

        $marker['position'] = 'Sydney Airport,Sydney';
        $marker['infowindow_content'] = 'Sydney Airport,Sydney';

        $gmap->add_marker($marker);
        $map = $gmap->create_map();
        return view('laporan.laporanDarurat', compact('map'));
    }
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
