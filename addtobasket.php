
<?php
session_start();

if (!isset($_SESSION["tuck"])){
$_SESSION["tuck"]=array();
}

$found=FALSE;
foreach ($_SESSION["tuck"] as &$entry){
    
    if ($entry["tuck"]===$_POST["TuckId"]){
        $found=TRUE;
        $entry["qty"]=$entry["qty"]+$_POST["qty"];
        
        
    }
}
if ($found===FALSE){
    array_push($_SESSION["tuck"],array("tuck"=>$_POST["TuckId"],"qty"=>$_POST["qty"]));
}
header('Location: buytuck.php')
?>