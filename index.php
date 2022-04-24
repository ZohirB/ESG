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
  <link rel="stylesheet" href="CSS/stylemain.css">
  <link rel="stylesheet" href="CSS/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script class="u-script" type="text/javascript" src="JavaScript/function.js" defer=""></script>
    <title>Neat schedule 2.0</title>
</head>
<body>
    <?php
        if (!isset($_POST['ty'])) {
        echo "<form method='post'>";
        echo"<div class='container'>";
        echo"<h1>مولد برنامج الفحص الخاص بكلية الهندسة المعلوماتية بجامعة حلب</h1>";

        echo"<div class='subjects'>";
        echo"<h2 class='First_Year' aria-hidden='true' type='button' onclick='DropDown(FirstYear)'>السنة الأولى</h2>";
        echo"<div id='FirstYear'>";
        print_labels(1,1,200,7);
        echo"</div>";
        
        echo"<h2 class='Second_Year' aria-hidden='true' type='button' onclick='DropDown(SecondYear)'>السنة الثانية</h2>";
        echo"<div id='SecondYear'>";
        print_labels(2,3,202,21);
        echo"</div>";

        echo"<h2 class='Third_Year' aria-hidden='true' type='button' onclick='DropDown(ThirdYear)'>السنة الثالثة</h2>";
        echo"<div id='ThirdYear'>";
        print_labels(3,5,204,35);
        echo"</div>";

        echo"<h2 class='Fourth_Year' aria-hidden='true' type='button' onclick='DropDown(FourthYear)'>السنة الرابعة</h2>";
        echo"<div id='FourthYear'>";
        print_labels(4,7,206,50);
        echo"</div>";

        echo"<h2 class='Fifth_Year' aria-hidden='true' type='button' onclick='DropDown(FifthYear)'>السنة الخامسة</h2>";
        echo"<div id='FifthYear'>";
        print_labels(5,9,208,64);
        echo"</div>";
        echo"<h2 class='Select_Count' aria-hidden='true' id='crazyoutput'>عدد المواد المحددة</h2>";

        echo"</div>";
        echo"</div>";

        echo"<div class='container'>";
        echo"<div class='format'>";
        echo"<h2>اختر تنسيق الجدول</h2>";

        echo"<input type='radio' input id='144' name='ty' value='1' checked='checked'>";
        echo"<label for='144'>تنسيق يوم-مادة</label>";

        echo"<input type='radio' id='145' name='ty' value='2'>";
        echo"<label for='145'>تنسيق يوم-ساعة</label>";
        echo"</div>";
        echo"</div>";

        echo"<div class='container'>";
        echo"<div class='theme'>";
        echo"<h2>اختر لون الجدول</h2>";

        echo"<input type='radio' id='150' name='design' value='1' checked='checked'>";
        echo"<label for='150'>اللون الازرق</label>";

        echo"<input type='radio' id='151' name='design' value='2'>";
        echo"<label for='151'>اللون الاسود</label>";

        echo"<input type='radio' id='152' name='design' value='3'>";
        echo"<label for='152'>اللون الزهري</label>";
        
        echo"<input type='radio' id='153' name='design' value='4'>";
        echo"<label for='153'>اللون الاخضر</label>";
        
        echo"<input type='radio' id='154' name='design' value='5'>";
        echo"<label for='154'>اللون البنفسجي</label>";

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
            if (array_key_exists('ty', $_POST)) {
                $ty = intval($_POST['ty']);
            }
            if (array_key_exists('design', $_POST)) {
                $design = intval($_POST['design']);
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
            mysqli_query($res, "INSERT INTO `schedule` VALUES (NULL,'" . $cd . "', '" . time() . "','" . $_SERVER['REMOTE_ADDR'] . "','" . implode(',', $selected) . "','" . $design . "','" . $ty . "')");
            //echo mysqli_error($res);
            header('location: create.php?code=' . $cd);
        }
        ?>
    </body>
</html>
