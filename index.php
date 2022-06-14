<?php
    include("structure/core.php");
    include("structure/schedule.php");
    include("structure/function.php");
    echo "
    <!DOCTYPE html>
    <html dir='rtl' lang='ar'>
    <head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='css/styleMain.css'>
    <link rel='stylesheet' href='css/style.css'>
    <link rel='stylesheet' href='css/slideShow.css'>
    <link rel='stylesheet' href='css/textbox.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script class='u-script' type='text/javascript' src='js/function.js' defer=''></script>
    <script class='u-script' type='text/javascript' src='js/main.js' defer=''></script>
        <title>Neat schedule 2.0</title>
    </head>";
?>
<body>
    <?php
        if (!isset($_POST['ty'])) {
        echo "<form method='post'>";
        echo"<div class='container'>";
        echo"<h1>مولد برنامج الفحص الخاص بكلية الهندسة المعلوماتية بجامعة حلب</h1>";
        echo"</div>";

        echo"<div class='container'>";
        echo "
            <!-- Slideshow container -->
            <div class='slideshow-container'>";

        slideshow_con("7 / 1","ex1","اللون الأزرق (الجديد) + الخط رقم 2 (Bold)");
        slideshow_con("7 / 2","ex2","اللون التركوازي + الخط رقم 2 (Light)");
        slideshow_con("7 / 3","ex3","اللون الأزرق (قديم) + الخط رقم 1 (Regular)");
        slideshow_con("7 / 4","ex4","اللون البنفسجي + الخط رقم 3 (Light)");
        slideshow_con("7 / 5","ex5","اللون الفستقي + الخط رقم 3 (Bold)");
        slideshow_con("7 / 6","ex6","اللون الأحضر (جديد) + الخط رقم 4");
        slideshow_con("7 / 7","ex7","اللون الأحمر + الخط رقم 5");

        echo "
            <a class='prev' onclick='plusSlides(-1)'>&#10094;</a>
            <a class='next' onclick='plusSlides(1)'>&#10095;</a>
            
            </div> ";
        echo"</div>";

        echo"<div class='container'>";
        echo"<div class='subjects'>";
        echo"<h2 class='h2-1' aria-hidden='true' type='button'>اختر المواد</h2>";

        echo"<h2 class='h2-2' aria-hidden='true' type='button' onclick='DropDown(FirstYear,1)'>السنة الأولى</h2>";
        echo"<div id='FirstYear'>";
        print_labels(1,1,200,7);
        echo"</div>";
        
        echo"<h2 class='h2-2' aria-hidden='true' type='button' onclick='DropDown(SecondYear,1)'>السنة الثانية</h2>";
        echo"<div id='SecondYear'>";
        print_labels(2,3,202,21);
        echo"</div>";

        echo"<h2 class='h2-2' aria-hidden='true' type='button' onclick='DropDown(ThirdYear,1)'>السنة الثالثة</h2>";
        echo"<div id='ThirdYear'>";
            print_labels(3,5,204,35);
        echo"</div>";

        echo"<h2 class='h2-2' aria-hidden='true' type='button' onclick='DropDown(FourthYear,1)'>السنة الرابعة</h2>";
        echo"<div id='FourthYear'>";
        print_labels(4,7,206,50);
        echo"</div>";

        echo"<h2 class='h2-2' aria-hidden='true' type='button' onclick='DropDown(FifthYear,1)'>السنة الخامسة</h2>";
        echo"<div id='FifthYear'>";
        print_labels(5,9,208,64);
        echo"</div>";
        echo"<h2 class='Select_Count h2-1' aria-hidden='true' id='Count_Uni'>عدد المواد المحددة</h2>";

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
        
        /*
        echo"<div class='container'>";
        echo"<div class='table_state'>";
        echo"<h2 class='h2-1'>اختر طبيعة الجدول</h2>";
        print_na_label();
        echo"</div>";
        echo"</div>";
        */

        echo"<div class='container motivational'>";
        echo"<h2 class='h2-1'>اختر حالة العبارة التحفيزية</h2>";
        
        echo"<input type='radio' input id='700' name='motivational' value='1' checked='checked' onclick='mot_text(1)'>";
        echo"<label for='700'>بدون عبارة تحفيزية</label>";

        echo"<input type='radio' id='701' name='motivational' value='2' onclick='mot_text(2)'>";
        echo"<label for='701'>إضافة عبارة تحفيزية</label>";

        echo "
        <div id='tb'>
            <div class='input-container'>
                <input type='text' id='mot' name='motn' value='' class='input-field placeholder='اكتب العبارة...' >
            </div>

            <div class = 'row'>
                <div class = 'column left'>
                    <button type='button' class='button-18 button-19 input-button' onclick='last_mot()' style='font-size:12px'>العبارة السابقة</button>
                </div>

                <div class = 'column middle'>
                    <p class='h2-3'> عبارات جاهزة </p>
                </div>

                <div class = 'column right'>
                    <button type='button' class='button-18 button-19 input-button' onclick='next_mot()' style='font-size:12px'>العبارة التالية</button>
                </div>  
            </div>
        </div>";
        
        echo"</div>";

        echo"<div class='container'>";
        echo"<div class='sub_button'>";
        echo"<button input type='submit' class='button-18'>توليد الجدول</button>";

        echo"</div>";
        echo"</div>";
        echo"</form>";
/*
        echo"<div class='container'>";
        echo"
                <div class='container-1'>
                <div class='footer'>
                <footer>
                <p>Back End developer: IT Eng. Hasan Jaddouh</p>
                <p>Front End developer: Zohir Boshi</p>
                </footer>
                </div>
                </div>";
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

            if (array_key_exists('motivational', $_POST)) {
                $motivational = intval($_POST['motivational']);

                if ($motivational == 2){
                    $motn = $_POST['motn'];
                }
                else {
                    $motn = null;
                }
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

            mysqli_query($res, "INSERT INTO `schedule_2_2022` VALUES (NULL,'" . $cd . "', '" . time() . "','" . $_SERVER['REMOTE_ADDR'] . "','" . implode(',', $selected) . "','" . $design . "','" . $ty . "','" . $font . "','" . $na . "','" . $motn . "')");
            //echo mysqli_error($res);
            header('location: structure/create.php?code=' . $cd);
        }
        ?>
    </body>
</html>
