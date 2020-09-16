<?php

namespace Ashique\T9Search;



class T9Search
{
    public function Search($number, $names)
    {
        $strings = $this->cari_kombinasi($number);
        $ret = [];

        // dd($strings);

        foreach($strings as $str)
        {   
            foreach($names as $name)
            {
                $rawName = str_replace(' ', '', $name);
                
                if(strpos($rawName, $str) !== false)
                {
                    array_push($ret, $name); 
                }
            }
        }
        return $ret;
    }
    

    public function cari_kombinasi($angka)
    {
        $t9 = array(
            2 => array('a', 'b', 'c'),
            3 => array('d', 'e', 'f'),
            4 => array('g', 'h', 'i'),
            5 => array('j', 'k', 'l'),
            6 => array('m', 'n', 'o'),
            7 => array('p', 'q', 'r', 's'),
            8 => array('t', 'u', 'v'),
            9 => array('w', 'x', 'y', 'z')
        );
        
        
        if (!is_numeric($angka))
            return false;
        $arr = str_split($angka);
        $total = 1;
        for ($a = count($arr) - 1; $a >= 0; $a--) {
            $total *= count($t9[$arr[$a]]);
            $t[$a] = $total;
        }

        $ret = array_fill(0, $total, "");

        sort($t);
        for ($b = 0; $b < count($arr); $b++) {
            $k = $l = 0;
            $j = count($arr) - ($b + 2);
            for ($c = 0; $c < $total; $c++) {
                $ret[$c] .= $t9[$arr[$b]][$l];
                if ($j >= 0 && $c == ($t[$j] * ($k + 1)) - 1 || $j < 0) {
                    $k++;
                    if ($l < count($t9[$arr[$b]]) - 1)
                        $l++;
                    else
                        $l = 0;
                }
            }
        }
        return $ret;
    }
}
