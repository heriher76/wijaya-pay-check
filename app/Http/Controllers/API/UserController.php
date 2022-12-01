<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    public $successStatus = 200;

    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            if ($user->is_personil && $user->is_personil_active || $user->is_masyarakat) {
                $success['token'] =  $user->createToken('nApp')->accessToken;
                return response()->json(['success' => $success], $this->successStatus);
            }
            return response()->json(['message' => 'Silahkan Tunggu Konfirmasi Akun Oleh Admin!'], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nrp' => 'required',
            'nama' => 'required',
            'pangkat' => 'required',
            'jabatan' => 'required',
            'no_hp' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'role' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $input = $request->all();
        
        if ($input['role'] == 'personil') { // Untuk Personil
            $input['password'] = bcrypt($input['password']);
            $input['is_personil'] = 1;
            $user = User::create($input);
            
            return response()->json(['success' => 'true', 'message' => 'Silahkan Tunggu Konfirmasi Data User Anda!', 'dataUser' => $user], $this->successStatus);

        }else if ($input['role'] == 'masyarakat') { // Untuk Masyarakat
            $input['password'] = bcrypt($input['password']);
            $input['is_masyarakat'] = 1;
            $user = User::create($input);
            $success['token'] =  $user->createToken('nApp')->accessToken;
            $success['name'] =  $user->nama;

            return response()->json(['success' => 'true', 'message' => 'Berhasil Register Masyarakat!', 'dataUser' => $user, 'dataLogin' => $success], $this->successStatus);
        }
    }

    public function my()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    public function edit()
    {
    }
}