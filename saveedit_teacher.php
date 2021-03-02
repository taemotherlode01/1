<?php 
require_once "connect.php";

$id=$_POST["id"];
$name_club=$_POST["name_club"]; 
$detail_club= $_POST["detail_club"];
$year_school=$_POST["year_school"];
$amount_im=$_POST["amount_im"];
$teacher_club=$_POST["teacher_club"];

$cl_im=implode(",",$_POST["cl_im"]); 

$sql ="UPDATE club SET name_club = '$name_club',detail_club='$detail_club' 
, year_school = '$year_school' , amount_im = '$amount_im' , cl_im = '$cl_im' 
, teacher_club = '$teacher_club'  WHERE id_club = $id";

$result=mysqli_query($conn, $sql);

if($result){
    header("location:manage_club_teacher.php");
    exit(0);
}else{
    echo "เกิดข้อผิดพลาดเกิดขึ้น".mysqli_error($conn);
   
}
?>