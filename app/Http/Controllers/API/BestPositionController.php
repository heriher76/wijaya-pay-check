<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Node;


class BestPositionController extends Controller
{
    // public function getBestRoute(Request $request)
    // {
    //     //
    //     return $this->getBestRoute;
    // }

    public function getBestPositionController(Request $request)
    {
        //inisiasi start
        $startLat = -6.9248772;
        $startLong = 107.6068223;

        //inisiasi Finish
        $finishLat = -6.9262631;
        $finishLong = 107.605926;

        //ambil semua node
        $initialNode = Node::query()->select('id', 'latitude', 'longitude',)->get();

        //openListNode & close List
        $openList = [];
        $closeList = [];

        //cek start apakah ada di node apa tidak
        $isAvailible = null;
        foreach ($initialNode as $index => $availibleNode) {
            if ($startLat == $availibleNode->latitude && $startLong == $availibleNode->longitude) {
                $isAvailible = $index;
                break;
            }
        }

        // dd($isAvailible);

        $openList = json_decode($initialNode);
        if ($isAvailible >= 0 && $isAvailible != null) {
            array_push($closeList, $initialNode[$isAvailible]);
            unset($openList[$isAvailible]);
        } else {
            array_push($closeList, (object) array('latitude' => $startLat, 'longitude' => $startLong));
        }
        //set active node
        $activeNode = [];
        foreach ($openList as $availableList) {
            //

            foreach ($openList as $hintCost) {
                $gn = sqrt(pow(($startLat - $hintCost->latitude), 2) + pow($startLong - $hintCost->longitude, 2)) * 111.319;
                $hn = sqrt(pow(($finishLat - $hintCost->latitude), 2) + pow($finishLong - $hintCost->longitude, 2)) * 111.319;
                $fn = $gn + $hn;
                array_push($activeNode, (object) array('id' => $hintCost->id, $startLat, $startLong, 'latitude' => $hintCost->latitude, 'longidute' => $hintCost->longitude, 'Gn' => $gn, 'Hn' => $hn, 'Fn' => $fn));
            }

            //setBestNode
            $bestNode = [];
            $temp_branch = [];
            //- inisiasi condition node position
            $branching = null;
            if ($isAvailible >= 0 && $isAvailible != null) {
                $branching = 'Fn';
            } else {
                $branching = 'Gn';
            }

            // dd($branching);

            for ($i = 0; $i < count($activeNode); $i++) {
                $temp_branch[$i] = $activeNode[$i]->$branching;
            }
            sort($temp_branch);
            foreach ($temp_branch as $key => $value) {
                for ($j = 0; $j < count($temp_branch); $j++) {
                    if ($activeNode[$j]->$branching == $value) {
                        array_push($bestNode, $activeNode[$j]);
                        break;
                    }
                }
            }

            $temp_bestNode = [];
            array_push($temp_bestNode, $bestNode[0]);
            array_push($closeList, $temp_bestNode);

            // * 
            foreach ($temp_bestNode  as $changeStart) {
                $startLat = $changeStart->latitude;
                $startLong = $changeStart->longidute;
            }
            //*

            //push temp_bestNode to openlist
            $idDelete = null;
            foreach ($temp_bestNode as $initialIdDelete) {
                $idDelete = $initialIdDelete->id;
                break;
            }
            $initialDelete = null;
            foreach ($openList  as $index => $deleteNode) {
                if ($deleteNode->id == $idDelete) {
                    $initialDelete = $index;
                    break;
                }
            }
            if ($initialIdDelete != null) {
                unset($openList[$initialDelete]);
            }

            //
        }


        //
        return $closeList;
    }
}