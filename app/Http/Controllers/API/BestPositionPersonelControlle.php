<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Node;

class BestPositionPersonelControlle extends Controller
{
    public function getBestPositionController(Request $request)
    {
        $latLong = preg_replace('/\s+/', '', $request->latLong);
        $latLong = explode(',', $latLong);

        //titik start sebagai titik tkp
        $startLat = $latLong[0];
        $startLong = $latLong[1];

        //ambil semua node
        $initialNode = User::query()->where('is_masyarakat', 1)->select('id', 'lat', 'long')->get();
        
        //cek start apakah ada di node apa tidak ,jika iya maka dihapus dari openlist
        $isAvailible = [];
        foreach ($initialNode as $index => $availibleNode) {
            if ($startLat == $availibleNode->lat && $startLong == $availibleNode->long) {
                $isAvailible = $index;
                break;
            }
        }
        $openList = [];
        $closeList = [];
        $openList = json_decode($initialNode);
        // array_push($openList, (object) array('id' => 'finish', 'lat' => $finishLat, 'long' => $finishLong));
        if ($isAvailible != []) {
            array_push($closeList, $initialNode[$isAvailible]);
            array_splice($openList, $isAvailible, 1);
        } else {
            array_push($closeList, (object) array('lat' => $startLat, 'long' => $startLong));
        }

        //set active node
        foreach ($openList as $searchBest) {
            $bestNode = [];
            $activeNode = [];
            $temp_branch = [];
            foreach ($openList as $hintCost) {
                $startIninitialLat = $startLat;
                $startIninitialLng = $startLong;
                $gn = sqrt(pow(($startIninitialLat - $hintCost->lat), 2) + pow($startIninitialLng - $hintCost->long, 2)) * 111.319;
                $hn = sqrt(pow(($startIninitialLat - $hintCost->lat), 2) + pow($startIninitialLng - $hintCost->long, 2)) * 111.319;
                $fn = $gn + $hn;
                array_push($activeNode, (object) array('id' => $hintCost->id, $startIninitialLat, $startIninitialLng, 'lat' => $hintCost->lat, 'long' => $hintCost->long, 'Gn' => $gn, 'Hn' => $hn, 'Fn' => $fn));
            }

            //setBestNode
            for ($i = 0; $i < count($activeNode); $i++) {
                $temp_branch[$i] = $activeNode[$i]->Fn;
            }
            sort($temp_branch);
            foreach ($temp_branch as $key => $value) {
                for ($j = 0; $j < count($activeNode); $j++) {
                    if ($activeNode[$j]->Fn == $value) {
                        array_push($bestNode, $activeNode[$j]);
                        break;
                    }
                }
            }
            // dd($activeNode);

            // dd($bestNode);
            $temp_bestNode = [];
            array_push($closeList, $bestNode[0]);
            $startIninitialLat = $bestNode[0]->lat;
            $startIninitialLng = $bestNode[0]->long;
            // dd($startIninitialLat);
            array_push($temp_bestNode, $bestNode[0]);

            $personil = User::where('lat', $bestNode[0]->lat)->where('long', $bestNode[0]->long)->first();
            
            return response()->json(['map' => $closeList, 'personil' => $personil]);
        }
    }
}