<?php
    // Membangkitkan bilangan acak k, x, g
    function _k($p){
            return rand(1,$p-2);
    }
    function _x($p){
            return rand(1,$p-1);
    }
    function _g($p){
            return rand(1,$p-1);    
    }
    // Algoritma pemangkatan modular, menghitung y = g^x mod p
    function _y($g, $x, $p){
        
        if ($x == 0) return 1%$p;
        $tmp = _y($g,$x/2,$p);
        if ($x%2 == 0) return $tmp*$tmp%$p;
        return (($tmp*$tmp%$p)*$g)%$p;
    }

    //Pencarian Modulus
    function rekursifMod($basis,$pangkat,$mod){
            if ($pangkat <= 2)
                return ((pow($basis,$pangkat)) % $mod);
            else{
                $s = $pangkat % 2;
                if ($s == 0){
                    $b = $pangkat / 2;
                    $b1 = $b; $b2 = $b;         
                }
                else{
                    $b = floor($pangkat/2);
                    $b1 = $b; $b2 = $b + 1;
                }
                return (((rekursifMod($basis,$b1,$mod)) * (rekursifMod($basis,$b2,$mod))) % $mod);
            }       
    }

    //Ubah teks ke Ascii
    function toAscii($teks){
            $ascii = "";
            for ($i=0;$i<(strlen($teks));$i++){

                $char = substr($teks,$i,1);
                $a = ord($char); 
                if (strlen($a)==1) $a = "00".$a;
                if (strlen($a)==2) $a = "0".$a;
                if (strlen($a)==3) $a = "".$a;
                $ascii .= $a;       
            }
            return $ascii;
    }

    //Ubah Ascii ke teks
    function toteks($ascii){
            $time_start = microtime(true);
            $teks = "";
            for ($i=0;$i<(strlen($ascii));$i+=3){
                $bil = substr($ascii,$i,3);
                $teks .= chr($bil);     
            }
            return $teks;
    } 
        
    //Enkripsi Plainteks
    function enkripsi($teks,$p,$g,$y,$k){
            $ascii = toAscii($teks);
            $hasil = "";
            for ($i=0;$i<(strlen($ascii));$i+=3){
                $tmp = substr($ascii,$i,3);
                if (strlen($tmp)==1) $tmp = "00".$tmp;
                if (strlen($tmp)==2) $tmp = "0".$tmp;
                $r = rekursifMod($g,$k,$p);
                $s = (((rekursifMod($y,$k,$p))*(rekursifMod($tmp,1,$p))) % $p);
                $hasil.= $r." ".$s." ";   
            }
            return $hasil;    
    }

    //Dekripsi Chiperteks
    function dekripsi($teks, $x, $p){
            $t = explode(" ",$teks);
            $ascii = "";
            for ($i=0;$i<(count($t));$i+=2){
                $pkt = $p - 1 - $x;
                $a = rekursifMod($t[$i],$pkt,$p);
                $b = (($t[$i+1]*$a) % $p);
                if (strlen($b)==1) $b = "00".$b;
                if (strlen($b)==2) $b = "0".$b;
                $ascii .= $b;
            }
            return toteks($ascii);
    }

    //Menghapus spasi ganda
    function trimed($txt){
        $txt = trim($txt);
        while( strpos($txt, '  ') ){
        $txt = str_replace('  ', ' ', $txt);
        }
        return $txt;
    }

    // Jika Button Enkripsi ditekan
    if(!empty($_POST['enkripsi'])){
        $time_start = microtime(true); // Timer mulai eksekusi
        $p=$_POST['p'];
        $teks=$_POST['teks'];
        $g=_g($p);
        $x=_x($p);
        $k=_k($p);
        $y = _y($g, $x, $p);
        $hasilenkripsi = enkripsi($teks,$p,$g,$y,$k);
        $hasilenkripsi = trimed($hasilenkripsi);
        $time_end = microtime(true); // Timer stop eksekusi
        // Waktu Eksekusi
        $duration = $time_end - $time_start;
    }

    // Jika Button Deskripsi ditekan
    if(!empty($_POST['dekripsi'])){
        $time_start = microtime(true); // Timer mulai eksekusi
        $x=$_POST['x'];
        $p=$_POST['p'];
        $teks=$_POST['teks'];
        $hasildekripsi = dekripsi($teks, $x, $p);
        $time_end = microtime(true); // Timer stop eksekusi
        // Waktu Eksekusi
        $duration = $time_end - $time_start;
    }
    // Jika Button Deskripsi ditekan
    if(!empty($_POST['prima'])){
        $n=$_POST['n'];
        $prima = true;
        for($i=2; $i<=($n/2); $i++) {
            if(($n%$i)==0) {
                $prima = false;
                break; //untuk menghentikan looping pada program
            }
        }
    }
?>
