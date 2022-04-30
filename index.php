<?php
    include("core.php");
    include("schedule.php");
    include("function.php");
?>

<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/stylemain.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/style_qm.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script class="u-script" type="text/javascript" src="JavaScript/function.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="JavaScript/main.js" defer=""></script>
    <title>Neat schedule 2.0</title>
</head>
<body>
    <?php
        if (!isset($_POST['ty'])) {
        echo "<form method='post'>";
        echo"<div class='container'>";
        echo"<h1>مولد برنامج الفحص الخاص بكلية الهندسة المعلوماتية بجامعة حلب</h1>";
/*
        echo"<div class='subjects'>";
        echo"<div id='arrow-left' class='arrow'></div>";
        echo"<div class='slide slide1'></div>";
        echo"<div class='slide slide2'></div>";
        echo"<div class='slide slide3'></div>";
        echo"<div id='arrow-right' class='arrow'></div>";
        echo"</div>";
        echo"</div>";
*/        
        echo"<div class='container'>";
        echo"<div class='subjects'>";
        echo"<h2 class='h2-1' aria-hidden='true' type='button'>اختر المواد</h2>";

        echo"<h2 class='h2-2' aria-hidden='true' type='button' onclick='DropDown(FirstYear)'>السنة الأولى</h2>";
        echo"<div id='FirstYear'>";
        print_labels(1,1,200,7);
        echo"</div>";
        
        echo"<h2 class='h2-2' aria-hidden='true' type='button' onclick='DropDown(SecondYear)'>السنة الثانية</h2>";
        echo"<div id='SecondYear'>";
        print_labels(2,3,202,21);
        echo"</div>";

        echo"<h2 class='h2-2' aria-hidden='true' type='button' onclick='DropDown(ThirdYear)'>السنة الثالثة</h2>";
        echo"<div id='ThirdYear'>";
            print_labels(3,5,204,35);
        echo"</div>";

        echo"<h2 class='h2-2' aria-hidden='true' type='button' onclick='DropDown(FourthYear)'>السنة الرابعة</h2>";
        echo"<div id='FourthYear'>";
        print_labels(4,7,206,50);
        echo"</div>";

        echo"<h2 class='h2-2' aria-hidden='true' type='button' onclick='DropDown(FifthYear)'>السنة الخامسة</h2>";
        echo"<div id='FifthYear'>";
        print_labels(5,9,208,64);
        echo"</div>";
        echo"<h2 class='Select_Count h2-1' aria-hidden='true' id='crazyoutput'>عدد المواد المحددة</h2>";

        echo"</div>";
        echo"</div>";

        echo"<div class='container'>";
        echo"<div class='format'>";
        echo"<h2 class='h2-1'>اختر تنسيق الجدول</h2>";

        echo"<input type='radio' input id='144' name='ty' value='1' checked='checked'>";
        echo"<label for='144'>تنسيق يوم-مادة</label>";

        echo"<input type='radio' id='145' name='ty' value='2'>";
        echo"<label for='145'>تنسيق يوم-ساعة</label>";
        echo"</div>";
        echo"</div>";

        echo"<div class='container'>";   
        echo"<div class='fonti'>";
        echo"<h2 class='h2-1' aria-hidden='true' type='button'>اختر تنسيق الخط</h2>";
        print_font_label();
        echo"</div>";
        echo"</div>";

        echo"<div class='container'>";
        echo"<div class='theme'>";
        echo"<h2 class='h2-1'>اختر لون الجدول</h2>";
        print_design_label();
        echo"</div>";
        echo"</div>";

        echo"<div class='container'>";
        echo"<div class='cl'>";
        echo"<h2 class='h2-1'>اختر طبيعة الجدول</h2>";
        print_na_label();
        echo"</div>";
        echo"</div>";

        echo"<div class='container'>";
        echo"<div class='sub_button'>";
        echo"<button input type='submit' class='button-18'>توليد الجدول</button>";

        echo"</div>";
        echo"</div>";
        echo"</form>";

/*      
        echo"<div class='container-1'>";
        echo"<div class='footer'>";
        echo "<footer>";
        echo "<p>Idea and Build Up By: Hasan</p>";
        echo "<p>Developed By: Zohir</p>";
        echo "</footer>";
        echo"</div>";
        echo"</div>";
*/
        } else {
            $ty = 2;
            $design = 1;
            $font = 1;
            $na = 1;
            if (array_key_exists('ty', $_POST)) {
                $ty = intval($_POST['ty']);
            }
            if (array_key_exists('design', $_POST)) {
                $design = intval($_POST['design']);
            }
            if (array_key_exists('font', $_POST)) {
                $font = intval($_POST['font']);
            }
            if (array_key_exists('na', $_POST)) {
                $na = intval($_POST['na']);
            }
            $res = mysqli_connect($db_host, $db_user, $db_pass);
            mysqli_select_db($res, $db_name);
            //$res = mysqli_connect('localhost','root','');  
            //mysqli_select_db($res,"neatschedule"); 
            $cd = md5(rand(1, 1000000000));
            $selected = array();
            if (array_key_exists('subject', $_POST)) {
                foreach ($_POST['subject'] as $key => $val) {
                    $selected[] = intval($val);
                }
            }
            mysqli_query($res, "INSERT INTO `schedule` VALUES (NULL,'" . $cd . "', '" . time() . "','" . $_SERVER['REMOTE_ADDR'] . "','" . implode(',', $selected) . "','" . $design . "','" . $ty . "','" . $font . "','" . $na . "')");
            //echo mysqli_error($res);
            header('location: create.php?code=' . $cd);
        }
        ?>
    </body>
</html>
