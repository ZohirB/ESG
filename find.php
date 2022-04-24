<?php
include ("core.php");
$t = microtime(true);
$res = mysqli_connect($db_host,$db_user,$db_pass);
mysqli_select_db($res,$db_name);

$r = mysqli_query($res,$_GET['sql']);
echo "<table>";
while($g = mysqli_fetch_assoc($r)){
    echo "<tr>";
    foreach($g as $k=>$v){
        echo "<td>".$k.":".$v."</td>";
    }
    echo "</tr>\n";
}
echo "</table>";
$g = microtime(true);
echo $g- $t;
?>