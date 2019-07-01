<?php
use App\Sekolah;

    function telp($noHP){
        $noHP = $noHP;
        $noHP1 = substr($noHP,0,4);
        $noHP2 = substr($noHP,4,4);
        $noHP3 = substr($noHP,8,5);
        $handphone = $noHP1."-".$noHP2."-".$noHP3;
        return "$handphone";
    }

    function site(){
        $sekolah = Sekolah::find(1);
        return $sekolah;
    }