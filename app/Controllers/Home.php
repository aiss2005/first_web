<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function belajar_segment()
    {
        $uri = service('uri');
        $parameter1 = $uri->getSegment(3) ;        
        $parameter2 = $uri->getSegment(4) ;        
        $parameter3 = $uri->getSegment(5) ;        

        $data['p1'] = $parameter1;
        $data['p2'] = $parameter2;
        $data['p3'] = $parameter3;

        return view('segment_view', $data);
    }

    public function gita(): string
    {
        return "Nama saya najma bilqisth";
    }

    public function tryy()
    {
        $uri = service('uri');
        $oshi1 = $uri->getSegment(3);
        $oshi2 = $uri->getSegment(4);
        $oshi3 = $uri->getSegment(5);

        $message = ($oshi1 == 'gita')? "Lu sirkel gua!" : "Ganti gita cepet!";

        $data['oshi1'] = $oshi1;
        $data['oshi2'] = $oshi2;
        $data['oshi3'] = $oshi3;
        $data['head'] = 'Ini headnya ya bos';
        $data['pesan'] = $message;

        return view('mencoba',$data);
    }

    public function tirismang(){
        $uri = service('uri');
        $kata1 = $uri->getSegment(3);
        #$id = $uri->getSegment(4);
        $coba = ($kata1 == '1')? "GITA" : 
        (($kata1 == '2')? "SHANI":
        (($kata1 == '3')? "GRACIA" :"apallah"));
        

        $data['nama'] = $coba;
        $data['foto'] = $kata1;
        #$data['id'] = $id;
        $data['iniheader'] = 'ini adalah header';

        return view('tirisss',$data);
    }

    public function kelarr(){
        return "NAMA SAYA NAJMA BILQISTHHHH KELASSS";
    }

    public function looping()
    {
        return view('looping');
    }

    public function percabangan(){
        return view('percabangan');
    }

    public function hashh(){
        return password_hash('kami', PASSWORD_BCRYPT);

    }

    public function info(){
        return view('info');
    }

    public function gd(){
        return view('gd');
    }

    public function gdh(){
        
$img = imagecreatetruecolor(100, 100);
$warna = imagecolorallocate($img, 255, 0, 0);
imagefilledrectangle($img, 0, 0, 100, 100, $warna);
header('Content-Type: image/png');
imagepng($img);
imagedestroy($img);

    }
    
}
