<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\Middleware\ErrorBinder;

class UserAppsController extends Controller
{
    public function index(){
        if (isset($_GET['q'])) {
            // mengambil data user apps
            $dataUP = User::query()->where('is_personil_active', 1)->where('nama', 'LIKE', "%{$_GET['q']}%")->get();
        } else {
            // mengambil data user apps
            $dataUP = User::where('is_personil_active', 1)->get();
        }
        
        //mengirim data user apps ke view
        return view('user_apps.index', ['dataUP' => $dataUP]);
    }
    
    public function create(){
        //to view add
        return view('user_apps.add');
    }

    public function store(Request $request){
        //Validasi form
        $this->validate($request, [
            'nrp' => 'required',
            'nama' => 'required',
            'pangkat' => 'required',
            'jabatan' => 'required',
            'email' => 'required',
            'password' => 'min:6',
            'no_hp' => 'required',
            'lat' => 'required',
            'long' => 'required'
        ]);

        $input = $request->all();

        (isset($input['image'])) ? $namaImage = str_random().'.'.$input['image']->getClientOriginalExtension() : $namaImage = null;

        //insert into database
        DB::table('users')->insert([
            'nrp' => $input['nrp'],
            'nama' => $input['nama'],
            'pangkat' => $input['pangkat'],
            'jabatan' => $input['jabatan'],
            'email' => $input['email'],
            'password' => \Hash::make($input['password']),
            'image' => $namaImage,
            'no_hp' => $input['no_hp'],
            'lat' => $input['lat'],
            'long' => $input['long'],
            'is_personil' => 1,
            'is_personil_active' => 1
        ]);

        (isset($input['image'])) ? $input['image']->move(public_path('img/personil'), $namaImage) : null ;

        //go to user_apps View
        return redirect('/user_apps')->with('status', 'Personil Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        return view('user_apps.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $user = User::where('id', $id)->first();

        if (isset($input['image'])) {
            $namaImage = str_random().'.'.$input['image']->getClientOriginalExtension();
            
            if (isset($user->image)) {
                unlink(public_path('img/personil/'.$user->image));
            }
            $input['image']->move(public_path("img/personil/"), $namaImage);  

            $user->update([
                'nrp' => $input['nrp'],
                'nama' => $input['nama'],
                'pangkat' => $input['pangkat'],
                'jabatan' => $input['jabatan'],
                'email' => $input['email'],
                'image' => $namaImage,
                'no_hp' => $input['no_hp'],
                'lat' => $input['lat'],
                'long' => $input['long'],
            ]);
        }else{
            $user->update([
                'nrp' => $input['nrp'],
                'nama' => $input['nama'],
                'pangkat' => $input['pangkat'],
                'jabatan' => $input['jabatan'],
                'email' => $input['email'],
                'no_hp' => $input['no_hp'],
                'lat' => $input['lat'],
                'long' => $input['long'],
            ]);
        }
        if (isset($input['new_password'])) {
            $user->update([
                'password' => \Hash::make($input['new_password'])
            ]);
        }
        return redirect('/user_apps')->with('status', 'Personil Berhasil Diubah');
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        if (isset($user->image)) {
            unlink(public_path('img/personil/'.$user->image));
        }

        User::destroy($id);

        return redirect('/user_apps')->with('status', 'Personil Berhasil Dihapus');
    }
}
