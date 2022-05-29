<?php
include("core.php");
include("schedule.php");

$options['heightmargin']=75;
$options['betweenmargin']=5;
$options['titletablemargin']=50;
$options['cellwidthmargin']=110;
$options['cellheightmargin']=25;
$options['subjectwidthmargin']=50;
$options['linethickness']=4;
$options['isremoveempty']=true;
$options['isremoveweekend']=true;

//$selected=array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36);
if(!isset($_GET['code'])){
    exit;
}
function isValidMd5($md5 ='') {
    return strlen($md5) == 32 && ctype_xdigit($md5);
}
if(!isValidMd5($_GET['code'])){
    exit;
}
$res = mysqli_connect($db_host,$db_user,$db_pass);
mysqli_select_db($res,$db_name);

//$res = mysqli_connect('localhost','root','');
//mysqli_select_db($res,"neatschedule");
$r = mysqli_query($res,"SELECT * FROM `schedule_2_2022` WHERE `code`='".$_GET['code']."'");

$r = mysqli_fetch_assoc($r);
$selected=explode(',',$r['selected']);
if(!is_array($selected)){
    $selected=array();
}
if($selected[0]==""){
    $selected=array();
}
//$selected= array(0,12,20,21,26,32,16);

$design =$r['design'] ;
$ty=$r['format'];
$font=$r['font'];
$na=$r['na'];
$motn=$r['motn'];

if($design == 1){
    $options['backgroundcolor']=array(0xa9,0xc2,0xeF);
    $options['linecolor']=array(0x32,0x5D,0xeF);
    $options['textcolor']=array(0,0,100);
    $options['headertextcolor']=array(0xff,0xff,0xff);
    $options['cellcolor']=    array(0xef,0xef,0xef);
    $options['headercolor']=array(0x32,0x5D,0xeF);
    $options['titlecolor']=array(0x00,0x49,0x98);
    $options['endtitlecolor']=array(0x32,0x5D,0xeF);
} else if($design == 2){
    $options['backgroundcolor']=array(0x18,0x18,0x18);
    $options['linecolor']=array(0x35,0x35,0x35);
    $options['textcolor']=array(0xff,0xff,0xff);
    $options['headertextcolor']=array(0xfc,0xfc,0xff);
    $options['cellcolor']=   array(0x70,0x70,0x70);
    $options['headercolor']=array(0x35,0x35,0x35);
    $options['titlecolor']=array(0xcc,0xcc,0xff);
    $options['endtitlecolor']=array(0x35,0x35,0x35);
} else if ($design == 3){
    /*
    $options['backgroundcolor']=array(0xFF,0xB2,0xC8);
    $options['linecolor']=array(0xC6,0x00,0xFF);
    $options['textcolor']=array(0xFF,0x00,0xb6);
    $options['headertextcolor']=array(0xfc,0xfc,0xff);
    $options['cellcolor']=   array(0xff,0xee,0xee);
    $options['headercolor']=array(0xC6,0x00,0xFF);
    $options['titlecolor']=array(0xcc,0x00,0x90);
    */
    $options['backgroundcolor']=array(0xFF,0xB2,0xC8);
    $options['linecolor']=array(0x66,0x33,0x99);
    $options['textcolor']=array(0x44,0x33,0x77);//array(0xFF,0x00,0xb6);
    $options['headertextcolor']=array(0xfc,0xfc,0xff);
    $options['cellcolor']=   array(0xff,0xf0,0xf0);
    $options['headercolor']=array(0x66,0x33,0x99);
    $options['titlecolor']=array(0x44,0x33,0x77); //array(0xcc,0x00,0x90);
    $options['endtitlecolor']=array(0x66,0x33,0x99);
} else if($design == 4){
    /*
    $options['backgroundcolor']=array(0xa5,0xdF,0x9B);
    $options['linecolor']=array(0x0D,0xCC,0x00);
    $options['textcolor']=array(0x00,0x6B,0x02);
    $options['headertextcolor']=array(0xfc,0xfc,0xff);
    $options['cellcolor']=   array(0xe4,0xFF,0xe5);
    $options['headercolor']=array(0x0D,0xCC,0x00);
    $options['titlecolor']=array(0x00,0x6B,0x02);
    */
    $options['backgroundcolor']=array(0x33,0x99,0x66);
    $options['linecolor']=array(0x00,0x6B,0x02);
    $options['textcolor']=array(0x00,0x3B,0x02);
    $options['headertextcolor']=array(0xfc,0xfc,0xff);
    $options['cellcolor']= array(0xf0,0xFF,0xf0);
    $options['headercolor']=array(0x00,0x6B,0x02);
    $options['titlecolor']=array(0x00,0x4B,0x02);
    $options['endtitlecolor']=array(0x00,0x6B,0x02);
} else if ($design == 5){
    $options['backgroundcolor']=array(0xA4,0xA4,0xBF); //array(0x16,0x23,0x5A)
    $options['cellcolor']=array(0xF2,0xEA,0xED); //array(0xA4,0xA4,0xBF)
    $options['headercolor']=array(0x2A,0x34,0x57);
    $options['linecolor']=array(0x2A,0x34,0x57);
    $options['titlecolor']=array(0xFF,0xFF,0xFF);//array(0x88,0xC4,0x64)
    $options['headertextcolor']=array(0xFF,0xFF,0xFF);
    $options['textcolor']=array(0x16,0x23,0x5A); //array(0xF2,0xEA,0xED)
    $options['endtitlecolor']=array(0x2A,0x34,0x57);
} else if ($design == 6){  //005555,069A8E
    $options['backgroundcolor']=array(0x06,0x9a,0x8e); //5c868d
    $options['cellcolor']=array(0xff,0xff,0xff); 
    $options['headercolor']=array(0x00,0x55,0x55);
    $options['linecolor']=array(0x00,0x55,0x55); //005555
    $options['titlecolor']=array(0xff,0xff,0xff); 
    $options['headertextcolor']=array(0xFF,0xFF,0xFF); 
    $options['textcolor']=array(0x03,0x35,0x3e); 
    $options['endtitlecolor']=array(0xff,0xff,0xff); 
} else if ($design == 7){  //3F72AF,112D4E,DBE2EF
    $options['backgroundcolor']=array(0x3f,0x72,0xaf); //EAEA7F
    $options['cellcolor']=array(0xF2,0xEA,0xED); 
    $options['headercolor']=array(0x11,0x2d,0x4e);
    $options['linecolor']=array(0x11,0x2d,0x4e); //333C83
    $options['titlecolor']=array(0xff,0xff,0xff); 
    $options['headertextcolor']=array(0xFF,0xFF,0xFF); //c1403d
    $options['textcolor']=array(0x11,0x2d,0x4e); //04060f//a79c93
    $options['endtitlecolor']=array(0xff,0xff,0xff);
} else if ($design == 8){  //62D2A2,1FAB89,65C18C
    $options['backgroundcolor']=array(0x62,0xd2,0xa2); 
    $options['cellcolor']=array(0xF2,0xEA,0xED); 
    $options['headercolor']=array(0x1f,0xab,0x89);
    $options['linecolor']=array(0x1f,0xab,0x89);
    $options['titlecolor']=array(0xff,0xff,0xff); 
    $options['headertextcolor']=array(0xFF,0xFF,0xFF);
    $options['textcolor']=array(0x0d,0x73,0x77); 
    $options['endtitlecolor']=array(0xff,0xff,0xff);
}

/*
    أزرق نص غامق
    $options['backgroundcolor']=array(0x02,0x94,0xa5); //0294a5
    $options['cellcolor']=array(0xF2,0xEA,0xED); 
    $options['headercolor']=array(0x03,0x35,0x3e);
    $options['linecolor']=array(0x03,0x35,0x3e); //03353e
    $options['titlecolor']=array(0xff,0xff,0xff); 
    $options['headertextcolor']=array(0xFF,0xFF,0xFF); //c1403d
    $options['textcolor']=array(0x04,0x06,0x0f); //04060f//a79c93
*/

$local = $_SERVER['SCRIPT_FILENAME'];
$pos   = strrpos($local, '/');
$path  = substr($local, 0, $pos);

if ($font == 1){
    $font  = $path.'/../css/fonts/font_php/1.ttf';
    $options['widthmargin']=300;
    $options['textsize']=20;
    $options['headertextsize']=33;
    $options['titlesize']=40;  
    $options['endtitlesize']=30;
} else if ($font == 2){
    $font  = $path.'/../css/fonts/font_php/2.ttf';
    $options['widthmargin']=400;
    $options['textsize']=25;
    $options['headertextsize']=37;
    $options['titlesize']=45;  
    $options['endtitlesize']=35;
} else if ($font == 3){
    $font  = $path.'/../css/fonts/font_php/3.ttf';
    $options['widthmargin']=400;
    $options['textsize']=25;
    $options['headertextsize']=37;
    $options['titlesize']=45; 
    $options['endtitlesize']=35; 
} else if ($font == 4){
    $font  = $path.'/../css/fonts/font_php/4.ttf';
    $options['widthmargin']=350;
    $options['textsize']=30;
    $options['headertextsize']=40;
    $options['titlesize']=55;  
    $options['endtitlesize']=40;
} else if ($font == 5){
    $font  = $path.'/../css/fonts/font_php/5.ttf';
    $options['widthmargin']=400;
    $options['textsize']=28;
    $options['headertextsize']=38;
    $options['titlesize']=49;  
    $options['endtitlesize']=40;
} else if ($font == 6){
    $font  = $path.'/../css/fonts/font_php/6.ttf';
    $options['widthmargin']=400;
    $options['textsize']=25;
    $options['headertextsize']=37;
    $options['titlesize']=45;
    $options['endtitlesize']=35;  
}

if ($na == 1){
    $options['isremoveempty']=true;
    $options['isremoveweekend']=false;
} else if ($na == 2) {
    $options['isremoveempty']=false;
    $options['isremoveweekend']=false;
}

if($ty == 1){
    function findbydate($date){
        global $selected;
        $ret = array();
        foreach($selected as $key=>$val){
            if($date == new DateTime($val['date'])){
                $ret[] = $val;
            }
        }
        return $ret;
    }
    $temp=array();
    foreach($selected as $key=>$val){
        $temp[$key]=$data[$val];
    }
    for($i=0;$i<count($temp);$i++){
        for($j=0;$j<count($temp)-1;$j++){

            if(strtotime($temp[$j]['date'])  > strtotime($temp[$j + 1]['date'])   or (strtotime($temp[$j]['date'])  ==  strtotime($temp[$j + 1]['date'])  and $temp[$j]['time'] < $temp[$j+1]['time'])  )    {
                $t=$temp[$j];
                $temp[$j]=$temp[$j+1];
                $temp[$j+1]=$t;
            }
        }
    }
    $selected = $temp;

    $col[0]=gettextwidth($font,$subjecttext,$options['headertextsize']);
    $col[1]=gettextwidth($font,$datetext,$options['headertextsize']);
    $totwidth=array();
    $begin = new DateTime($startdate );
    $end   = new DateTime( $enddate );
    $row=array();
    $row[0]=max(gettextheight($font,$subjecttext,$options['headertextsize']),gettextheight($font,$datetext,$options['headertextsize']));
    $totwidth[0]=$col[0];
    $cnt=1;
    for($i = $begin; $i <= $end; $i->modify('+1 day')){
        $subject = findbydate($i);
        if($options['isremoveempty'] and $subject == false)continue;
        if($options['isremoveweekend'] and ($i->format("w") == 5))continue;
        $row[$cnt]=gettextheight($font,$i->format("Y/m/d"),$options['textsize']) + $options['betweenmargin'] + gettextheight($font,$dayweek[$i->format("w")],$options['textsize']);

        $col[1]=max($col[1],gettextwidth($font,$i->format("Y/m/d"),$options['textsize']));
        $col[1]=max($col[1],gettextwidth($font,$dayweek[$i->format("w")],$options['textsize']));
        $currow=0;
        $curcol=0;
        foreach($subject as $key=>$val){
            $crow=gettextheight($font,$val['name'],$options['textsize'])+ gettextheight($font,$period[$val['time']],$options['textsize']) + $options['betweenmargin'];
            $ccol=gettextwidth($font,$val['name'],$options['textsize']);
            $ccol=max($ccol,gettextwidth($font,$period[$val['time']],$options['textsize']));
            $curcol += $ccol;
            $currow = max($currow,$crow);
        }
        $curcol += (count($subject)-1)*$options['subjectwidthmargin'];

        $row[$cnt]=max($row[$cnt],$currow);
        $col[0]=max($col[0],$curcol);
        $totwidth[$cnt]= $curcol;
        $cnt++;
    }
    $titlewidth = gettextwidth($font,$title,$options['titlesize']);
    $titleheight = gettextheight($font,$title,$options['titlesize']);

    $endtitlewidth = gettextwidth($font,$motn,$options['endtitlesize']); 
    $endtitleheight = gettextheight($font,$motn,$options['endtitlesize']); 

    $totalwidth=0;
    $totalheight=0;

    $totalwidth += 3*$options['linethickness'];
    $totalwidth += 4*$options['cellwidthmargin'];
    $totalwidth += $col[0] + $col[1];
    $totalwidth += 2*$options['widthmargin'];

    $totalheight += 2*$options['heightmargin'];
    $totalheight += ($cnt+1)*$options['linethickness'];
    $totalheight += 2*$cnt*$options['cellheightmargin'];
    $totalheight += $titleheight + $options['titletablemargin'];
    for($i=0;$i<$cnt;$i++){
        $totalheight += $row[$i];
    }

    $options['endheightmargin']= $totalheight - ($endtitleheight/2);

    $image = imagecreate($totalwidth,$totalheight + $endtitleheight); 
    $options['backgroundcolor']=imagecolorallocate($image,$options['backgroundcolor'][0],$options['backgroundcolor'][1],$options['backgroundcolor'][2]);
    $options['linecolor']=imagecolorallocate($image,$options['linecolor'][0],$options['linecolor'][1],$options['linecolor'][2]);
    $options['cellcolor']=imagecolorallocate($image,$options['cellcolor'][0],$options['cellcolor'][1],$options['cellcolor'][2]);
    $options['textcolor']=imagecolorallocate($image,$options['textcolor'][0],$options['textcolor'][1],$options['textcolor'][2]);
    $options['headercolor']=imagecolorallocate($image,$options['headercolor'][0],$options['headercolor'][1],$options['headercolor'][2]);
    $options['headertextcolor']=imagecolorallocate($image,$options['headertextcolor'][0],$options['headertextcolor'][1],$options['headertextcolor'][2]);
    $options['titlecolor']=imagecolorallocate($image,$options['titlecolor'][0],$options['titlecolor'][1],$options['titlecolor'][2]);
    $options['endtitlecolor']=imagecolorallocate($image,$options['endtitlecolor'][0],$options['endtitlecolor'][1],$options['endtitlecolor'][2]);
    imagefill($image,0,0,$options['backgroundcolor']);
    writetext($font,$image,($totalwidth - $titlewidth)/2,$options['heightmargin'],$title,$options['titlesize'],$options['titlecolor']);

    writetext($font,$image,($totalwidth - $endtitlewidth)/2,$options['endheightmargin'],$motn,$options['endtitlesize'],$options['endtitlecolor']); 
    $curx=0;
    $cury=0;
    $curx += $options['widthmargin'];
    $cury += $options['heightmargin'] +  $titleheight + $options['titletablemargin'];
    imagefilledrectangle($image,$curx,$cury,$curx+ $options['linethickness'],$totalheight - $options['heightmargin'],$options['linecolor']);
    $curx += $col[0] + 2*$options['cellwidthmargin'] + $options['linethickness'];
    imagefilledrectangle($image,$curx,$cury,$curx+ $options['linethickness'],$totalheight - $options['heightmargin'],$options['linecolor']);
    $curx += $col[1] + 2*$options['cellwidthmargin'] + $options['linethickness'];
    imagefilledrectangle($image,$curx,$cury,$curx+ $options['linethickness'],$totalheight - $options['heightmargin'],$options['linecolor']);
    $curx = $options['widthmargin'];
    imagefilledrectangle($image,$curx,$cury,$totalwidth - $options['widthmargin'],$cury + $options['linethickness'],$options['linecolor']);
    for($i=0;$i<$cnt;$i++){
        $cury += $row[$i] + 2*$options['cellheightmargin'] + $options['linethickness'];
        imagefilledrectangle($image,$curx,$cury,$totalwidth - $options['widthmargin'],$cury + $options['linethickness'],$options['linecolor']);
    }

    $curx = $options['widthmargin'] + $options['linethickness'] ;
    $cury = $options['heightmargin'] + $options['linethickness'] +  $titleheight + $options['titletablemargin'];
    $curx2 = $curx + $col[0] + 2*$options['cellwidthmargin'] +  $options['linethickness'];

    imagefill($image,$curx+1,$cury+1,$options['headercolor']);
    imagefill($image,$curx2+1,$cury+1,$options['headercolor']);
    $w = gettextwidth($font,$subjecttext,$options['headertextsize']) ;
    $h = gettextheight($font,$subjecttext,$options['headertextsize']) ;
    writetext($font,$image,$curx + $options['cellwidthmargin'] + ($col[0] - $w) / 2, $cury + $options['cellheightmargin'] + ($row[0] - $h - $options['betweenmargin']) / 2,$subjecttext,$options['headertextsize'],$options['headertextcolor']);
    $w = gettextwidth($font,$datetext,$options['headertextsize']) ;
    $h = gettextheight($font,$datetext,$options['headertextsize']) ;
    writetext($font,$image,$curx2 + $options['cellwidthmargin'] + ($col[1] - $w) / 2, $cury + $options['cellheightmargin'] + ($row[0] - $h  - $options['betweenmargin']) / 2,$datetext,$options['headertextsize'],$options['headertextcolor']);
    $cury += $row[0] + $options['linethickness'] + 2*$options['cellheightmargin'];
    $begin = new DateTime($startdate );
    for($i=1,$j= $begin;$j<=$end;$j->modify("+1 day")){
        $subject = findbydate($j);
        if($options['isremoveempty'] and $subject == false)continue;
        if($options['isremoveweekend'] and ($j->format("w") == 5))continue;
        imagefill($image,$curx+1,$cury+1,$options['cellcolor']);
        imagefill($image,$curx2+1,$cury+1,$options['cellcolor']);
        $w2 = gettextwidth($font,$j->format("Y/m/d"),$options['textsize']) ;
        $w = gettextwidth($font,$dayweek[$j->format("w")],$options['textsize']);
        $h2 = gettextheight($font,$j->format("Y/m/d"),$options['textsize']);
        $h = gettextheight($font,$dayweek[$j->format("w")],$options['textsize']);
        writetext($font,$image,$curx2 + $options['cellwidthmargin'] + ($col[1] - $w) / 2, $cury + $options['cellheightmargin'] + ($row[$i] - $h - $h2 - $options['betweenmargin']) / 2,$dayweek[$j->format("w")],$options['textsize'],$options['textcolor']);
        writetext($font,$image,$curx2 + $options['cellwidthmargin'] + ($col[1] - $w2) / 2, $cury + $options['cellheightmargin'] + ($row[$i] - $h - $h2 - $options['betweenmargin']) / 2 + $h + $options['betweenmargin'] ,$j->format("Y/m/d"),$options['textsize'],$options['textcolor']);
        $cx= $curx + $options['cellwidthmargin'] + ($col[0] - $totwidth[$i]) / 2;
        $cy= $cury + $options['cellheightmargin'];
        foreach($subject as $key=>$val){
            $w = gettextwidth($font,$val['name'],$options['textsize']);
            $w2 = gettextwidth($font,$period[$val['time']],$options['textsize']);
            $h = gettextheight($font,$val['name'],$options['textsize']);
            $h2 = gettextheight($font,$period[$val['time']],$options['textsize']);
            writetext($font,$image,$cx + (max($w,$w2)-$w)/2, $cy ,$val['name'],$options['textsize'],$options['textcolor']);
            writetext($font,$image,$cx + (max($w,$w2)-$w2)/2, $cy + $h + $options['betweenmargin'] ,$period[$val['time']],$options['textsize'],$options['textcolor']);
            $cx += max($w,$w2) + $options['subjectwidthmargin'];
        }
        $cury += $row[$i] + $options['linethickness'] + 2*$options['cellheightmargin'];
        $i++;
    }
    header('Content-Disposition: inline; filename="schedule.png"');
    header("Content-type: image/png");
    imagepng($image);
} else {

    function findbydate($date,$period){
        global $selected;
        $ret = array();
        foreach($selected as $key=>$val){
            if($date == new DateTime($val['date']) && $val['time'] == $period){
                $ret[] = $val;
            }
        }
        return $ret;
    }

    function findbydate2($date){
        global $selected;
        $ret = array();
        foreach($selected as $key=>$val){
            if($date == new DateTime($val['date'])){
                $ret[] = $val;
            }
        }
        return $ret;
    }
    function hasperiod($period){
        global $selected;
        foreach($selected as $key=>$val){
            if($val['time'] == $period){
                return true;
            }
        }
        return false;
    }
    $temp=array();
    foreach($selected as $key=>$val){
        $temp[$key]=$data[$val];
    }
    for($i=0;$i<count($temp);$i++){
        for($j=0;$j<count($temp)-1;$j++){

            if(strtotime($temp[$j]['date'])  > strtotime($temp[$j + 1]['date'])   or (strtotime($temp[$j]['date'])  ==  strtotime($temp[$j + 1]['date'])  and $temp[$j]['time'] < $temp[$j+1]['time'])  )    {
                $t=$temp[$j];
                $temp[$j]=$temp[$j+1];
                $temp[$j+1]=$t;
            }
        }
    }
    $selected = $temp;
    $cntcol=0;
    $colind=array();
    $colind[]= "erg";
    foreach($period as $key=>$val){
        if(hasperiod($key)){
            $cntcol ++;
            $colind[]= $key;
        }
    }
    #$colind = array_reverse($colind);
    $row=array();
    $row[0]=gettextheight($font,$datetext,$options['headertextsize']);

    for($i =0 ;$i<$cntcol;$i++){
        $col[$i]=max(gettextwidth($font,$periodtext,$options['headertextsize']),gettextwidth($font,$period[$colind[$cntcol - $i]],$options['headertextsize']));
        $row[0]=max($row[0],gettextheight($font,$periodtext,$options['headertextsize'])+ $options['betweenmargin'] +gettextheight($font,$period[$colind[$cntcol - $i]],$options['headertextsize']));
    }

    $col[$cntcol]=gettextwidth($font,$datetext,$options['textsize']);
    $row[0]=max($row[0],gettextheight($font,$datetext,$options['textsize']));
    $totwidth=array();
    $begin = new DateTime($startdate );
    $end   = new DateTime( $enddate );
    $totwidth[0]=$col[0];
    $cnt=1;

    for($i = $begin; $i <= $end; $i->modify('+1 day')){
        $subject = findbydate2($i);
        if($options['isremoveempty'] and $subject == false)continue;
        if($options['isremoveweekend'] and ($i->format("w") == 5))continue;
        $row[$cnt]=gettextheight($font,$i->format("Y/m/d"),$options['textsize']) + $options['betweenmargin'] + gettextheight($font,$dayweek[$i->format("w")],$options['textsize']);
        $col[$cntcol]=max($col[$cntcol],gettextwidth($font,$i->format("Y/m/d"),$options['textsize']));
        $col[$cntcol]=max($col[$cntcol],gettextwidth($font,$dayweek[$i->format("w")],$options['textsize']));

        for($j = 0;$j <$cntcol;$j++){
            $subject = findbydate($i, $colind[$cntcol -  $j ]);
            $currow=0;
            $curcol=0;
            foreach($subject as $key=>$val){
                $crow=gettextheight($font,$val['name'],$options['textsize']);
                $ccol=gettextwidth($font,$val['name'],$options['textsize']);
                $ccol=max($ccol,gettextwidth($font,$period[$val['time']],$options['textsize']));
                $curcol += $ccol;
                $currow = max($currow,$crow);
            }
            $curcol += max((count($subject)-1),0)*$options['subjectwidthmargin'];
            $row[$cnt]=max($row[$cnt],$currow);
            $col[$j]=max($col[$j],$curcol);
            $totwidth[$cnt][$j]= $curcol;

        }
        $cnt++;
    }
    $titlewidth = gettextwidth($font,$title,$options['titlesize']);
    $titleheight = gettextheight($font,$title,$options['titlesize']);

    $endtitlewidth = gettextwidth($font,$motn,$options['endtitlesize']);
    $endtitleheight = gettextheight($font,$motn,$options['endtitlesize']);

    $totalwidth=0;
    $totalheight=0;

    $totalwidth += ($cntcol + 1)*$options['linethickness'];
    $totalwidth += 2*($cntcol + 1)*$options['cellwidthmargin'];
    for($i =0 ;$i<=$cntcol;$i++){
        $totalwidth += $col[$i];
    }
    $totalwidth += 2*$options['widthmargin'];

    $totalheight += 2*$options['heightmargin'];
    $totalheight += ($cnt+1)*$options['linethickness'];
    $totalheight += 2*$cnt*$options['cellheightmargin'];
    $totalheight += $titleheight + $options['titletablemargin'];
    for($i=0;$i<$cnt;$i++){
        $totalheight += $row[$i];
    }

    $options['endheightmargin']= $totalheight - ($endtitleheight/2);

    $image = imagecreate($totalwidth,$totalheight + $endtitleheight);
    $options['backgroundcolor']=imagecolorallocate($image,$options['backgroundcolor'][0],$options['backgroundcolor'][1],$options['backgroundcolor'][2]);
    $options['linecolor']=imagecolorallocate($image,$options['linecolor'][0],$options['linecolor'][1],$options['linecolor'][2]);
    $options['cellcolor']=imagecolorallocate($image,$options['cellcolor'][0],$options['cellcolor'][1],$options['cellcolor'][2]);
    $options['textcolor']=imagecolorallocate($image,$options['textcolor'][0],$options['textcolor'][1],$options['textcolor'][2]);
    $options['headercolor']=imagecolorallocate($image,$options['headercolor'][0],$options['headercolor'][1],$options['headercolor'][2]);
    $options['headertextcolor']=imagecolorallocate($image,$options['headertextcolor'][0],$options['headertextcolor'][1],$options['headertextcolor'][2]);
    $options['titlecolor']=imagecolorallocate($image,$options['titlecolor'][0],$options['titlecolor'][1],$options['titlecolor'][2]);
    $options['endtitlecolor']=imagecolorallocate($image,$options['endtitlecolor'][0],$options['endtitlecolor'][1],$options['endtitlecolor'][2]);
    $black=imagecolorallocate($image,0,0,0);
    imagefill($image,0,0,$options['backgroundcolor']);
    writetext($font,$image,($totalwidth - $titlewidth)/2,$options['heightmargin'],$title,$options['titlesize'],$options['titlecolor']);
    writetext($font,$image,($totalwidth - $endtitlewidth)/2,$options['endheightmargin'],$motn,$options['endtitlesize'],$options['endtitlecolor']); 
    $curx=0;
    $cury=0;
    $curx += $options['widthmargin'];
    $cury += $options['heightmargin'] +  $titleheight + $options['titletablemargin'];
    imagefilledrectangle($image,$curx,$cury,$curx+ $options['linethickness'],$totalheight - $options['heightmargin'],$options['linecolor']);
    for($i=0;$i<$cntcol+1;$i++){
        $curx += $col[$i] + 2*$options['cellwidthmargin'] + $options['linethickness'];
        imagefilledrectangle($image,$curx,$cury,$curx+ $options['linethickness'],$totalheight - $options['heightmargin'],$options['linecolor']);

    }
    $curx = $options['widthmargin'];
    imagefilledrectangle($image,$curx,$cury,$totalwidth - $options['widthmargin'],$cury + $options['linethickness'],$options['linecolor']);
    for($i=0;$i<$cnt;$i++){
        $cury += $row[$i] + 2*$options['cellheightmargin'] + $options['linethickness'];
        imagefilledrectangle($image,$curx,$cury,$totalwidth - $options['widthmargin'],$cury + $options['linethickness'],$options['linecolor']);
    }

    $curx = $options['widthmargin'] + $options['linethickness'] ;
    $cury = $options['heightmargin'] + $options['linethickness'] +  $titleheight + $options['titletablemargin'];
    for($i=0;$i<$cntcol;$i++){
        imagefill($image,$curx+1,$cury+1,$options['headercolor']);
        $w = gettextwidth($font,$periodtext,$options['headertextsize']) ;
        $h = gettextheight($font,$periodtext,$options['headertextsize']) ;
        $h2 = gettextheight($font,$period[$colind[$cntcol-$i]],$options['headertextsize']);
        $w2 = gettextwidth($font,$period[$colind[$cntcol-$i]],$options['headertextsize']);
        writetext($font,$image,$curx + $options['cellwidthmargin'] + ($col[$i] - $w) / 2, $cury + $options['cellheightmargin'] + ($row[0] - $h - $h2 - $options['betweenmargin']) / 2,$periodtext,$options['headertextsize'],$options['headertextcolor']);
        writetext($font,$image,$curx + $options['cellwidthmargin'] + ($col[$i] - $w2) / 2, $cury + $options['cellheightmargin'] + ($row[0] - $h - $h2 - $options['betweenmargin']) / 2 + $h + $options['betweenmargin'],$period[$colind[$cntcol-$i]],$options['headertextsize'],$options['headertextcolor']);
        $curx += $col[$i] + 2*$options['cellwidthmargin'] + $options['linethickness'];
    }
    imagefill($image,$curx+1,$cury+1,$options['headercolor']);
    $w = gettextwidth($font,$datetext,$options['headertextsize']) ;
    $h = gettextheight($font,$datetext,$options['headertextsize']) ;
    writetext($font,$image,$curx + $options['cellwidthmargin'] + ($col[$cntcol] - $w) / 2, $cury + $options['cellheightmargin'] + ($row[0] - $h) / 2,$datetext,$options['headertextsize'],$options['headertextcolor']);


    $cury += $row[0] + $options['linethickness'] + 2*$options['cellheightmargin'];
    $begin = new DateTime($startdate );
    for($i=1,$j= $begin;$j<=$end;$j->modify("+1 day")){
        $subject = findbydate2($j);
        if($options['isremoveempty'] and $subject == false)continue;
        if($options['isremoveweekend'] and ($j->format("w") == 5))continue;
        $curx = $options['widthmargin'] + $options['linethickness'] ;
        for($k=0;$k<$cntcol;$k++){
            $subject = findbydate($j,$colind[$cntcol- $k]);
            imagefill($image,$curx+1,$cury+1,$options['cellcolor']);
            $cx= $curx + $options['cellwidthmargin'] + ($col[$k] - $totwidth[$i][$k]) / 2;
            $cy= $cury + $options['cellheightmargin'];
            foreach($subject as $key=>$val){
                $w = gettextwidth($font,$val['name'],$options['textsize']);
                $h = gettextheight($font,$val['name'],$options['textsize']);
                writetext($font,$image,$cx , $cy + ($row[$i] - $h)/2 ,$val['name'],$options['textsize'],$options['textcolor']);
                $cx += $w + $options['subjectwidthmargin'];

            }
            $curx += $col[$k] + 2 * $options['cellwidthmargin'] + $options['linethickness'];
        }
        imagefill($image,$curx+1,$cury+1,$options['cellcolor']);
        $w2 = gettextwidth($font,$j->format("Y/m/d"),$options['textsize']) ;
        $w = gettextwidth($font,$dayweek[$j->format("w")],$options['textsize']);
        $h2 = gettextheight($font,$j->format("Y/m/d"),$options['textsize']);
        $h = gettextheight($font,$dayweek[$j->format("w")],$options['textsize']);
        writetext($font,$image,$curx + $options['cellwidthmargin'] + ($col[$cntcol] - $w) / 2, $cury + $options['cellheightmargin'] + ($row[$i] - $h - $h2 - $options['betweenmargin']) / 2,$dayweek[$j->format("w")],$options['textsize'],$options['textcolor']);
        writetext($font,$image,$curx + $options['cellwidthmargin'] + ($col[$cntcol] - $w2) / 2, $cury + $options['cellheightmargin'] + ($row[$i] - $h - $h2 - $options['betweenmargin']) / 2 + $h + $options['betweenmargin'] ,$j->format("Y/m/d"),$options['textsize'],$options['textcolor']);


        $cury += $row[$i] + $options['linethickness'] + 2*$options['cellheightmargin'];
        $i++;
    }
    header('Content-Disposition: inline; filename="schedule.png"');
    header("Content-type: image/png");
    imagepng($image);
}
?>