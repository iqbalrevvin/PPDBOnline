<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sekolah;
use App\Siswa;
class SiteController extends Controller
{
    public function homepage()
    {
        $title = 'Beranda';
        $data = [
            'title' => $title,
        ];
        
        return view('homepage',$data);
    }

    public function register()
    {
        $title = 'Pendaftaran';
        $data = [
            'title' => $title,
        ];
        return view('frontend.register', $data);
    }

    public function postregister(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email|unique:cms_users',
            'password' => 'required|min:5',
            'nama_lengkap' => 'required|min:3',
            'jenis_kelamin' => 'required'
        ]);
        
        $user = new \App\cms_users;
        $user->id_cms_privileges = 3;
        $user->name = $request->nama_lengkap;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = 'Active';
        $user->save();

        // $request->request->add(['user_id' => $user->id]);
        $siswa = new Siswa;
        $siswa->user_id = $user->id;
        $siswa->nama_lengkap = $request->nama_lengkap;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->save();
        //return dd($siswa);
        return redirect('/register')->with('success', 'test');
        
    }

    public function about()
    {
        $title = 'Tentang PPDBOnline';
        $data = [
            'title' => $title,
        ];
        return view('frontend.about', $data);
    }
}
