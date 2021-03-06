<?php

namespace App\Core;

class Dumper
{
    public static function dump()
    {
        $data = '';
        $data .= '<style>.accordion{background-color:#eee;color:#444;cursor:pointer;padding:18px;width:100%;border:none;text-align:left;font-size:15px;transition:0.4s}.drpDwn{cursor:pointer;color:#aaa}.panel-data{padding:0 18px;display:block;background-color:transparent;overflow:hidden;border:0}.panel-data1{padding:0 18px;display:block;background-color:transparent;overflow:hidden;border:0}.collections{font-size:12px!important;font-family:monospace;font-weight:300;background:#18171B;color:#FF8400;padding:5px;word-break:break-word;margin-top:10px}.array_color{color:#4e9cde}.data-color{color:#56DB3A}</style>';

        foreach (func_get_args() as $x) {
            if (is_array($x)) {
                $countArray = count($x);
                $data .= "<div class='collections'>";
                if ($countArray < 1) {
                    $data .= "<span class='array_color'>array:{$countArray}</span> []";
                } else {
                    $data .= "<span class='array_color'>array:{$countArray}</span> [<span class='drpDwn'></span>";
                    $data .= static::dumpChild($x);
                }
                $data .= "</div>";
            } else {
                if (is_object($x)) {
                    $countArray = count((array)$x);
                    $data .= "<div class='collections'>";
                    $theObject = get_class($x);
                    if ($countArray < 1) {
                        $data .= "<span class='array_color'>object({$theObject}):{$countArray}</span> []";
                    } else {
                        $data .= "<span class='array_color'>object({$theObject}):{$countArray}</span> [<span class='drpDwn'></span>";
                        $data .= static::dumpChild($x);
                    }
                    $data .= "</div>";
                } else {
                    $data .= "<div class='collections'>";
                    $data .= "\"<span class='data-color'>{$x}</span>\"<br>";
                    $data .= "</div>";
                }
            }
        }

        $data .= '<script>var i,acc=document.getElementsByClassName("drpDwn");for(i=0;i<acc.length;i++){acc[i].innerHTML="&#9658;";var panel1=acc[i].nextElementSibling;acc[i].classList.toggle("active"),panel1.style.display="block",acc[i].innerHTML="&#9660;",acc[i].addEventListener("click",function(){var i=this.nextElementSibling;"block"===i.style.display?(i.style.display="none",this.innerHTML="&#9658;"):(i.style.display="block",this.innerHTML="&#9660;")})}</script>';

        return $data;
    }


    public static function dumpChild($x)
    {
        $data = '';
        $counterTest = 1;
        $data .= '<div class="panel-data1">';
        foreach ($x as $key => $value) {
            if (is_array($value)) {
                $numberOfArray = count($value);
                if ($numberOfArray < 1) {
                    $data .= "\"<span class='data-color'>{$key}</span>\" => []<br>";
                } else {
                    $data .= "\"<span class='data-color'>{$key}</span>\" => <span class='array_color'>array:{$numberOfArray}</span> [<span class='drpDwn'" . $counterTest . ">&#9658;</span>";
                    $data .= static::dumpChild($value);
                }
            } else {
                if (is_callable($value)) {
                    $data .= "\"<span class='data-color'>{$key}</span>\" => \"<span class='data-color'>callable()</span>\"<br>";
                } else {
                    if (is_object($value)) {
                        $numberOfOject = count((array)$value);
                        $theObject = get_class($value);
                        if ($numberOfOject < 1) {
                            $data .= "\"<span class='data-color'>{$key}</span>\" => []<br>";
                        } else {
                            $data .= "\"<span class='data-color'>{$key}</span>\" => <span class='array_color'>object({$theObject}):{$numberOfOject}</span> [<span class='drpDwn'" . $counterTest . ">&#9658;</span>";
                            $data .= static::dumpChild($value);
                        }
                    } else {
                        $data .= "\"<span class='data-color'>{$key}</span>\" => \"<span class='data-color'>{$value}</span>\"<br>";
                    }
                }
            }

            $counterTest++;
        }

        $data .= '</div>]<br>';

        return $data;
    }
}
