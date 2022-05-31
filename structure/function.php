<?php
    include("schedule.php");

    function slideshow_con($nt,$fn,$t){
        echo "
            <div class='mySlides fade'>
                <div class='numbertext'>".$nt."</div>
                <img src='css/examples/".$fn.".jpg' style='width:100%'>
                <div class='text'>".$t."</div>
            </div>";
    }

    function check_mul_label($in_id,$to){
        if ($to%2 != 0){
            echo "<input id='".$in_id."' type='checkbox' onclick='toggle(this,".$to.");checkboxes_inc();'>";
            echo "<label for='".$in_id."'>تحديد مواد الفصل الأول </label>";
        }
        else{
            echo "<input id='".$in_id."' type='checkbox' onclick='toggle(this,".$to.");checkboxes_inc();'>";
            echo "<label for='".$in_id."'>تحديد مواد الفصل الثاني </label>";
        }
    }
    
    function checkbox_subject_label($key,$val){
        echo "<input id='" . $key . "' type='checkbox' value='" . $key . "' onclick='checkboxes_inc();' name='subject[]'>";
        echo "<label for='" . $key . "'>" . $val['name2'] . "</label>";
    }

    function print_labels($s_year,$to,$in_id,$co_id){
        check_mul_label($in_id,$to);
        $in_id++;
        $to++;
        $co = 0;    
        foreach ($GLOBALS['data'] as $key => $val) {
            if ($val['year'] == $s_year && $co != $co_id) {
                checkbox_subject_label($key,$val);
            }
            if ($co == $co_id && $val['year'] == $s_year){
                check_mul_label($in_id,$to);
                checkbox_subject_label($key,$val);
            }
            else if ($val['year'] > $s_year){
                break;
            }     
            $co++;
        } 
    }
    function checkbox_design_label($id,$value,$name){
        echo"<input type='radio' id='".$id."' name='design' value='".$value."'>";
        echo"<label for='".$id."'>".$name."</label>";
    }
    function print_design_label(){
        echo"<h2 class='h2-2' aria-hidden='true' type='button' onclick='DropDown(New_design,3)'>الألوان الجديدة</h2>";
        echo"<div id='New_design'>";
        echo"<input type='radio' id='505' name='design' value='5' checked='checked'>";
        echo"<label for='505'>اللون البنفسجي</label>";
        checkbox_design_label(506,6,"اللون التركوازي");
        checkbox_design_label(507,7,"اللون الأزرق");
        checkbox_design_label(508,8,"اللون الفستقي");
        checkbox_design_label(509,9,"اللون الأخضر");
        checkbox_design_label(510,10,"اللون الأحمر");

        /*
        echo"   <div class='sub_button'>
                <a href='structure/colorReq.php'>
                <button type='button' class='button-18'>تقديم طلب إضافة لون جديد</button>
                </a> 
                </div>";
        */
        echo"</div>";

        echo"<h2 class='h2-2' aria-hidden='true' type='button' onclick='DropDown(Old_design,3)'>الألوان القديمة</h2>";
        echo"<div id='Old_design'>";
        checkbox_design_label(501,1,"اللون الأزرق");
        checkbox_design_label(502,2,"اللون الأسود");
        checkbox_design_label(503,3,"اللون الزهري");
        checkbox_design_label(504,4,"اللون الأخضر");
        echo"</div>";
    }

    // font section
    function createNewFontH2($fontNum,$fontName){
        echo"<h2 class='h2-2' aria-hidden='true' type='button' onclick='DropDown(".$fontNum.",2)'>".$fontName."</h2>";
    }

    function createNewFontLabel($labelId,$val,$fontName,$labelClass){
        echo"<input type='radio' input id='".$labelId."' name='font' value='".$val."'>";
        echo"<label for='".$labelId."' class='".$labelClass."'>".$fontName."</label>";
    }

    function print_font_label(){
        createNewFontH2("Font_1","الخط رقم 1");
        echo"<div id='Font_1'>";
        echo"<input type='radio' input id='401' name='font' value='1' checked='checked'>";
        echo"<label for='401' class='font1'>الخط رقم 1 (Regular)</label>";
        echo"</div>";

        createNewFontH2("Font_2","الخط رقم 2");
        echo"<div id='Font_2'>";
        createNewFontLabel(402,2,"الخط رقم 2 (Light)","font2");
        createNewFontLabel(403,3,"الخط رقم 2 (Bold)","font3");
        echo"</div>";

        createNewFontH2("Font_3","الخط رقم 3");
        echo"<div id='Font_3'>";
        createNewFontLabel(404,4,"الخط رقم 3 (Light)","font4");
        createNewFontLabel(405,5,"الخط رقم 3 (Bold)","font5");
        echo"</div>";

        
        createNewFontH2("Font_4","الخط رقم 4");
        echo"<div id='Font_4'>";
        createNewFontLabel(406,6,"الخط رقم 4 (Regular)","font6");
        echo"</div>";

        createNewFontH2("Font_5","الخط رقم 5");
        echo"<div id='Font_5'>";
        createNewFontLabel(407,7,"الخط رقم 5 (Regular)","font7");
        echo"</div>";
        
    }

    function print_na_label(){
        echo"<input type='radio' input id='601' name='na' value='1' checked='checked'>";
        echo"<label for='601'>جدول مختصر</label>";
        echo"<input type='radio' input id='602' name='na' value='2'>";
        echo"<label for='602'>جدول مفصل</label>";
    }
?>