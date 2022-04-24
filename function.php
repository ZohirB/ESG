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
    
    function checkbox_label($key,$val){
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
                checkbox_label($key,$val);
            }
            if ($co == $co_id && $val['year'] == $s_year){
                check_mul_label($in_id,$to);
                checkbox_label($key,$val);
            }
            else if ($val['year'] > $s_year){
                break;
            }     
            $co++;
        } 
    }
?>