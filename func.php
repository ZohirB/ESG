<?php
    include("schedule.php");
    
    function pr_f($s_year,$to,$in_id,$co_id){
        echo "<input id='".$in_id."' type='checkbox' onclick='toggle(this,".$to.");checkboxes_inc();'>";
        echo "<label for='".$in_id."'>تحديد مواد الفصل الأول </label>";
        $in_id++;
        $to++;
        $co = 0;    
        foreach ($GLOBALS['data'] as $key => $val) {
            if ($val['year'] == $s_year && $co != $co_id) {
                echo "<input id='" . $key . "' type='checkbox' value='" . $key . "' onclick='checkboxes_inc();' name='subject[]'>";
                echo "<label for='" . $key . "'>" . $val['name2'] . "</label>";
            }
            if ($co == $co_id && $val['year'] == $s_year){
                echo "<input id='".$in_id."' type='checkbox' onclick='toggle(this,".$to.");checkboxes_inc();'>";
                echo "<label for='".$in_id."'>تحديد مواد الفصل الثاني </label>";

                echo "<input id='" . $key . "' type='checkbox' value='" . $key . "' onclick='checkboxes_inc();' name='subject[]'>";
                echo "<label for='" . $key . "'>" . $val['name2'] . "</label>";
            }
            else if ($val['year'] > $s_year){
                break;
            }     
            $co++;
        } 
    }
?>