<?php
    include("schedule.php");

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
        echo"<h2 class='h2-2' aria-hidden='true' type='button' onclick='DropDown_design(New_design)'>الألوان الجديدة</h2>";
        echo"<div id='New_design'>";
        echo"<input type='radio' id='505' name='design' value='5' checked='checked'>";
        echo"<label for='505'>اللون البنفسجي</label>";
        checkbox_design_label(506,6,"اللون التركوازي");
        checkbox_design_label(507,7,"اللون الأزرق");
        checkbox_design_label(508,8,"اللون الفستقي");
        echo"</div>";

        echo"<h2 class='h2-2' aria-hidden='true' type='button' onclick='DropDown_design(Old_design)'>الألوان القديمة</h2>";
        echo"<div id='Old_design'>";
        checkbox_design_label(501,1,"اللون الأزرق");
        checkbox_design_label(502,2,"اللون الأسود");
        checkbox_design_label(503,3,"اللون الزهري");
        checkbox_design_label(504,4,"اللون الأخضر");
        echo"</div>";
    }

    function print_font_label(){
        echo"<h2 class='h2-2' aria-hidden='true' type='button' onclick='DropDown_Font(Font_1)'>الخط رقم 1</h2>";
        echo"<div id='Font_1'>";
        echo"<input type='radio' input id='401' name='font' value='1' checked='checked'>";
        echo"<label for='401'>الخط رقم 1 (Regular)</label>";
        echo"</div>";


        echo"<h2 class='h2-2' aria-hidden='true' type='button' onclick='DropDown_Font(Font_2)'>الخط رقم 2</h2>";
        echo"<div id='Font_2'>";
        echo"<input type='radio' id='402' name='font' value='2'>";
        echo"<label for='402'>الخط رقم 2 (Light)</label>";
        echo"<input type='radio' id='403' name='font' value='3'>";
        echo"<label for='403'>الخط رقم 2 (Bold)</label>";
        echo"</div>";

        echo"<h2 class='h2-2' aria-hidden='true' type='button' onclick='DropDown_Font(Font_3)'>الخط رقم 3</h2>";
        echo"<div id='Font_3'>";
        echo"<input type='radio' id='404' name='font' value='4'>";
        echo"<label for='404'>الخط رقم 3 (Light)</label>";
        echo"<input type='radio' id='405' name='font' value='5'>";
        echo"<label for='405'>الخط رقم 3 (Bold)</label>";
        echo"</div>";
        /*
        echo"<h2 class='h2-2' aria-hidden='true' type='button' onclick='DropDown_Font(Font_4)'>الخط رقم 4</h2>";
        echo"<div id='Font_4'>";
        echo"<input type='radio' id='406' name='font' value='6'>";
        echo"<label for='406'>الخط رقم 4 (Bold)</label>";
        echo"</div>";
        */
    }
?>