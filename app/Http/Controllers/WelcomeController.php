<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FarhanWazir\GoogleMaps\GMaps;

class WelcomeController extends Controller
{
    //
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
        return view('welcome',compact('map'));
    }


}
