<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::get();
        return view('user.index', compact('data'));
    }

    public function indexUserBaru(){
        if (isset($_GET['q'])) {
            // mengambil data user apps
            $dataUP = User::query()->where('is_personil', 1)->where('is_personil_active', NULL)->where('nama', 'LIKE', "%{$_GET['q']}%")->get();
        } else {
            // mengambil data user apps
            $dataUP = User::where('is_personil', 1)->where('is_personil_active', NULL)->get();
        }
        
        //mengirim data user apps ke view
        return view('user_baru.index', ['dataUP' => $dataUP]);
    }

    public function confirmUser(Request $request, $id)
    {
        User::find($id)->update(['is_personil_active' => 1]);

        return back();
    }

    public function destroyUserBaru($id)
    {
        User::destroy($id);

        return back();
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
