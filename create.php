<?php
include("core.php");
include("schedule.php");
$options['widthmargin']=300;
$options['heightmargin']=75;
$options['betweenmargin']=5;
$options['titletablemargin']=50;
$options['cellwidthmargin']=100;
$options['cellheightmargin']=25;
$options['subjectwidthmargin']=50;
$options['linethickness']=4;
$options['textsize']=20;
$options['headertextsize']=33;
$options['titlesize']=40;
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
$r = mysqli_query($res,"SELECT * FROM `schedule` WHERE `code`='".$_GET['code']."'");

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


if($design == 1){
    $options['backgroundcolor']=array(0xa9,0xc2,0xeF);
    $options['linecolor']=array(0x32,0x5D,0xeF);
    $options['textcolor']=array(0,0,100);
    $options['headertextcolor']=array(0xff,0xff,0xff);
    $options['cellcolor']=    array(0xef,0xef,0xef);
    $options['headercolor']=array(0x32,0x5D,0xeF);
    $options['titlecolor']=array(0x00,0x49,0x98);
} else if($design == 2){
    $options['backgroundcolor']=array(0x18,0x18,0x18);
    $options['linecolor']=array(0x35,0x35,0x35);
    $options['textcolor']=array(0xff,0xff,0xff);
    $options['headertextcolor']=array(0xfc,0xfc,0xff);
    $options['cellcolor']=   array(0x70,0x70,0x70);
    $options['headercolor']=array(0x35,0x35,0x35);
    $options['titlecolor']=array(0xcc,0xcc,0xff);
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
    $options['cellcolor']=   array(0xf0,0xFF,0xf0);
    $options['headercolor']=array(0x00,0x6B,0x02);
    $options['titlecolor']=array(0x00,0x4B,0x02);

} else if ($design == 6){
    $options['backgroundcolor']=array(0xA4,0xA4,0xBF); //array(0x16,0x23,0x5A)
    $options['cellcolor']=array(0xF2,0xEA,0xED); //array(0xA4,0xA4,0xBF)
    $options['headercolor']=array(0x2A,0x34,0x57);
    $options['linecolor']=array(0x2A,0x34,0x57);
    $options['titlecolor']=array(0xFF,0xFF,0xFF);//array(0x88,0xC4,0x64)
    $options['headertextcolor']=array(0xFF,0xFF,0xFF);
    $options['textcolor']=array(0x16,0x23,0x5A); //array(0xF2,0xEA,0xED)
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

    $col[0]=gettextwidth($subjecttext,$options['headertextsize']);
    $col[1]=gettextwidth($datetext,$options['headertextsize']);
    $totwidth=array();
    $begin = new DateTime($startdate );
    $end   = new DateTime( $enddate );
    $row=array();
    $row[0]=max(gettextheight($subjecttext,$options['headertextsize']),gettextheight($datetext,$options['headertextsize']));
    $totwidth[0]=$col[0];
    $cnt=1;
    for($i = $begin; $i <= $end; $i->modify('+1 day')){
        $subject = findbydate($i);
        if($options['isremoveempty'] and $subject == false)continue;
        if($options['isremoveweekend'] and ($i->format("w") == 5))continue;
        $row[$cnt]=gettextheight($i->format("Y/m/d"),$options['textsize']) + $options['betweenmargin'] + gettextheight($dayweek[$i->format("w")],$options['textsize']);

        $col[1]=max($col[1],gettextwidth($i->format("Y/m/d"),$options['textsize']));
        $col[1]=max($col[1],gettextwidth($dayweek[$i->format("w")],$options['textsize']));
        $currow=0;
        $curcol=0;
        foreach($subject as $key=>$val){
            $crow=gettextheight($val['name'],$options['textsize'])+ gettextheight($period[$val['time']],$options['textsize']) + $options['betweenmargin'];
            $ccol=gettextwidth($val['name'],$options['textsize']);
            $ccol=max($ccol,gettextwidth($period[$val['time']],$options['textsize']));
            $curcol += $ccol;
            $currow = max($currow,$crow);
        }
        $curcol += (count($subject)-1)*$options['subjectwidthmargin'];

        $row[$cnt]=max($row[$cnt],$currow);
        $col[0]=max($col[0],$curcol);
        $totwidth[$cnt]= $curcol;
        $cnt++;
    }
    $titlewidth = gettextwidth($title,$options['titlesize']);
    $titleheight = gettextheight($title,$options['titlesize']);
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


    $image = imagecreate($totalwidth,$totalheight);
    $options['backgroundcolor']=imagecolorallocate($image,$options['backgroundcolor'][0],$options['backgroundcolor'][1],$options['backgroundcolor'][2]);
    $options['linecolor']=imagecolorallocate($image,$options['linecolor'][0],$options['linecolor'][1],$options['linecolor'][2]);
    $options['cellcolor']=imagecolorallocate($image,$options['cellcolor'][0],$options['cellcolor'][1],$options['cellcolor'][2]);
    $options['textcolor']=imagecolorallocate($image,$options['textcolor'][0],$options['textcolor'][1],$options['textcolor'][2]);
    $options['headercolor']=imagecolorallocate($image,$options['headercolor'][0],$options['headercolor'][1],$options['headercolor'][2]);
    $options['headertextcolor']=imagecolorallocate($image,$options['headertextcolor'][0],$options['headertextcolor'][1],$options['headertextcolor'][2]);
    $options['titlecolor']=imagecolorallocate($image,$options['titlecolor'][0],$options['titlecolor'][1],$options['titlecolor'][2]);
    imagefill($image,0,0,$options['backgroundcolor']);
    writetext($image,($totalwidth - $titlewidth)/2,$options['heightmargin'],$title,$options['titlesize'],$options['titlecolor']);
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
    $w = gettextwidth($subjecttext,$options['headertextsize']) ;
    $h = gettextheight($subjecttext,$options['headertextsize']) ;
    writetext($image,$curx + $options['cellwidthmargin'] + ($col[0] - $w) / 2, $cury + $options['cellheightmargin'] + ($row[0] - $h - $options['betweenmargin']) / 2,$subjecttext,$options['headertextsize'],$options['headertextcolor']);
    $w = gettextwidth($datetext,$options['headertextsize']) ;
    $h = gettextheight($datetext,$options['headertextsize']) ;
    writetext($image,$curx2 + $options['cellwidthmargin'] + ($col[1] - $w) / 2, $cury + $options['cellheightmargin'] + ($row[0] - $h  - $options['betweenmargin']) / 2,$datetext,$options['headertextsize'],$options['headertextcolor']);
    $cury += $row[0] + $options['linethickness'] + 2*$options['cellheightmargin'];
    $begin = new DateTime($startdate );
    for($i=1,$j= $begin;$j<=$end;$j->modify("+1 day")){
        $subject = findbydate($j);
        if($options['isremoveempty'] and $subject == false)continue;
        if($options['isremoveweekend'] and ($j->format("w") == 5))continue;
        imagefill($image,$curx+1,$cury+1,$options['cellcolor']);
        imagefill($image,$curx2+1,$cury+1,$options['cellcolor']);
        $w2 = gettextwidth($j->format("Y/m/d"),$options['textsize']) ;
        $w = gettextwidth($dayweek[$j->format("w")],$options['textsize']);
        $h2 = gettextheight($j->format("Y/m/d"),$options['textsize']);
        $h = gettextheight($dayweek[$j->format("w")],$options['textsize']);
        writetext($image,$curx2 + $options['cellwidthmargin'] + ($col[1] - $w) / 2, $cury + $options['cellheightmargin'] + ($row[$i] - $h - $h2 - $options['betweenmargin']) / 2,$dayweek[$j->format("w")],$options['textsize'],$options['textcolor']);
        writetext($image,$curx2 + $options['cellwidthmargin'] + ($col[1] - $w2) / 2, $cury + $options['cellheightmargin'] + ($row[$i] - $h - $h2 - $options['betweenmargin']) / 2 + $h + $options['betweenmargin'] ,$j->format("Y/m/d"),$options['textsize'],$options['textcolor']);
        $cx= $curx + $options['cellwidthmargin'] + ($col[0] - $totwidth[$i]) / 2;
        $cy= $cury + $options['cellheightmargin'];
        foreach($subject as $key=>$val){
            $w = gettextwidth($val['name'],$options['textsize']);
            $w2 = gettextwidth($period[$val['time']],$options['textsize']);
            $h = gettextheight($val['name'],$options['textsize']);
            $h2 = gettextheight($period[$val['time']],$options['textsize']);
            writetext($image,$cx + (max($w,$w2)-$w)/2, $cy ,$val['name'],$options['textsize'],$options['textcolor']);
            writetext($image,$cx + (max($w,$w2)-$w2)/2, $cy + $h + $options['betweenmargin'] ,$period[$val['time']],$options['textsize'],$options['textcolor']);
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
    $row[0]=gettextheight($datetext,$options['headertextsize']);

    for($i =0 ;$i<$cntcol;$i++){
        $col[$i]=max(gettextwidth($periodtext,$options['headertextsize']),gettextwidth($period[$colind[$cntcol - $i]],$options['headertextsize']));
        $row[0]=max($row[0],gettextheight($periodtext,$options['headertextsize'])+ $options['betweenmargin'] +gettextheight($period[$colind[$cntcol - $i]],$options['headertextsize']));
    }

    $col[$cntcol]=gettextwidth($datetext,$options['textsize']);
    $row[0]=max($row[0],gettextheight($datetext,$options['textsize']));
    $totwidth=array();
    $begin = new DateTime($startdate );
    $end   = new DateTime( $enddate );
    $totwidth[0]=$col[0];
    $cnt=1;

    for($i = $begin; $i <= $end; $i->modify('+1 day')){
        $subject = findbydate2($i);
        if($options['isremoveempty'] and $subject == false)continue;
        if($options['isremoveweekend'] and ($i->format("w") == 5))continue;
        $row[$cnt]=gettextheight($i->format("Y/m/d"),$options['textsize']) + $options['betweenmargin'] + gettextheight($dayweek[$i->format("w")],$options['textsize']);
        $col[$cntcol]=max($col[$cntcol],gettextwidth($i->format("Y/m/d"),$options['textsize']));
        $col[$cntcol]=max($col[$cntcol],gettextwidth($dayweek[$i->format("w")],$options['textsize']));

        for($j = 0;$j <$cntcol;$j++){
            $subject = findbydate($i, $colind[$cntcol -  $j ]);
            $currow=0;
            $curcol=0;
            foreach($subject as $key=>$val){
                $crow=gettextheight($val['name'],$options['textsize']);
                $ccol=gettextwidth($val['name'],$options['textsize']);
                $ccol=max($ccol,gettextwidth($period[$val['time']],$options['textsize']));
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
    $titlewidth = gettextwidth($title,$options['titlesize']);
    $titleheight = gettextheight($title,$options['titlesize']);
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


    $image = imagecreate($totalwidth,$totalheight);
    $options['backgroundcolor']=imagecolorallocate($image,$options['backgroundcolor'][0],$options['backgroundcolor'][1],$options['backgroundcolor'][2]);
    $options['linecolor']=imagecolorallocate($image,$options['linecolor'][0],$options['linecolor'][1],$options['linecolor'][2]);
    $options['cellcolor']=imagecolorallocate($image,$options['cellcolor'][0],$options['cellcolor'][1],$options['cellcolor'][2]);
    $options['textcolor']=imagecolorallocate($image,$options['textcolor'][0],$options['textcolor'][1],$options['textcolor'][2]);
    $options['headercolor']=imagecolorallocate($image,$options['headercolor'][0],$options['headercolor'][1],$options['headercolor'][2]);
    $options['headertextcolor']=imagecolorallocate($image,$options['headertextcolor'][0],$options['headertextcolor'][1],$options['headertextcolor'][2]);
    $options['titlecolor']=imagecolorallocate($image,$options['titlecolor'][0],$options['titlecolor'][1],$options['titlecolor'][2]);
    $black=imagecolorallocate($image,0,0,0);
    imagefill($image,0,0,$options['backgroundcolor']);
    writetext($image,($totalwidth - $titlewidth)/2,$options['heightmargin'],$title,$options['titlesize'],$options['titlecolor']);
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
        $w = gettextwidth($periodtext,$options['headertextsize']) ;
        $h = gettextheight($periodtext,$options['headertextsize']) ;
        $h2 = gettextheight($period[$colind[$cntcol-$i]],$options['headertextsize']);
        $w2 = gettextwidth($period[$colind[$cntcol-$i]],$options['headertextsize']);
        writetext($image,$curx + $options['cellwidthmargin'] + ($col[$i] - $w) / 2, $cury + $options['cellheightmargin'] + ($row[0] - $h - $h2 - $options['betweenmargin']) / 2,$periodtext,$options['headertextsize'],$options['headertextcolor']);
        writetext($image,$curx + $options['cellwidthmargin'] + ($col[$i] - $w2) / 2, $cury + $options['cellheightmargin'] + ($row[0] - $h - $h2 - $options['betweenmargin']) / 2 + $h + $options['betweenmargin'],$period[$colind[$cntcol-$i]],$options['headertextsize'],$options['headertextcolor']);
        $curx += $col[$i] + 2*$options['cellwidthmargin'] + $options['linethickness'];
    }
    imagefill($image,$curx+1,$cury+1,$options['headercolor']);
    $w = gettextwidth($datetext,$options['headertextsize']) ;
    $h = gettextheight($datetext,$options['headertextsize']) ;
    writetext($image,$curx + $options['cellwidthmargin'] + ($col[$cntcol] - $w) / 2, $cury + $options['cellheightmargin'] + ($row[0] - $h) / 2,$datetext,$options['headertextsize'],$options['headertextcolor']);


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
                $w = gettextwidth($val['name'],$options['textsize']);
                $h = gettextheight($val['name'],$options['textsize']);
                writetext($image,$cx , $cy + ($row[$i] - $h)/2 ,$val['name'],$options['textsize'],$options['textcolor']);
                $cx += $w + $options['subjectwidthmargin'];

            }
            $curx += $col[$k] + 2 * $options['cellwidthmargin'] + $options['linethickness'];
        }
        imagefill($image,$curx+1,$cury+1,$options['cellcolor']);
        $w2 = gettextwidth($j->format("Y/m/d"),$options['textsize']) ;
        $w = gettextwidth($dayweek[$j->format("w")],$options['textsize']);
        $h2 = gettextheight($j->format("Y/m/d"),$options['textsize']);
        $h = gettextheight($dayweek[$j->format("w")],$options['textsize']);
        writetext($image,$curx + $options['cellwidthmargin'] + ($col[$cntcol] - $w) / 2, $cury + $options['cellheightmargin'] + ($row[$i] - $h - $h2 - $options['betweenmargin']) / 2,$dayweek[$j->format("w")],$options['textsize'],$options['textcolor']);
        writetext($image,$curx + $options['cellwidthmargin'] + ($col[$cntcol] - $w2) / 2, $cury + $options['cellheightmargin'] + ($row[$i] - $h - $h2 - $options['betweenmargin']) / 2 + $h + $options['betweenmargin'] ,$j->format("Y/m/d"),$options['textsize'],$options['textcolor']);


        $cury += $row[$i] + $options['linethickness'] + 2*$options['cellheightmargin'];
        $i++;
    }
    header('Content-Disposition: inline; filename="schedule.png"');
    header("Content-type: image/png");
    imagepng($image);
}
?>