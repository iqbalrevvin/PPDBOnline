<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sekolah;
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
            'nama_lengkap' => 'required|min:3'
        ]);

        
    }
}
