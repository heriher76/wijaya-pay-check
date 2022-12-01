<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserAdminController extends Controller
{
    public function index(){
        if (isset($_GET['q'])) {
            // mengambil data user apps
            $dataUP = User::query()->where('is_admin', 1)->where('nama', 'LIKE', "%{$_GET['q']}%")->get();
        } else {
            // mengambil data user apps
            $dataUP = User::where('is_admin', 1)->get();
        }
        
        //mengirim data user apps ke view
        return view('admin.index', ['dataUP' => $dataUP]);
    }
    
    public function create(){
        //to view add
        return view('admin.add');
    }

    public function store(Request $request){
        //Validasi form
        $this->validate($request, [
            'nrp' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'password' => 'min:6'
        ]);

        $input = $request->all();

        //insert into database
        DB::table('users')->insert([
            'nrp' => $input['nrp'],
            'nama' => $input['nama'],
            'email' => $input['email'],
            'password' => \Hash::make($input['password']),
            'is_admin' => 1
        ]);

        //go to admins View
        return redirect('/admins')->with('status', 'Admin Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $user = User::where('id', $id)->first();

        $user->update([
            'nrp' => $input['nrp'],
            'nama' => $input['nama'],
            'email' => $input['email']
        ]);

        if (isset($input['new_password'])) {
            $user->update([
                'password' => \Hash::make($input['new_password'])
            ]);
        }

        return redirect('/admins')->with('status', 'Admin Berhasil Diubah');
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->first();

        User::destroy($id);

        return redirect('/admins')->with('status', 'Admin Berhasil Dihapus');
    }
}
