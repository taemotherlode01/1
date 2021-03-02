<?php
	session_start();
	require_once("connect.php");
  $id=$_GET["id"];

  $sql="SELECT * FROM club WHERE id_club = $id";
  $result=mysqli_query($conn,$sql);
  
  $row=mysqli_fetch_assoc($result);
  $cl_im_arr=array("ม.1","ม.2","ม.3","ม.4","ม.5","ม.6"); 

  $strSQL = "SELECT * FROM teacher WHERE id_teacher = '".$_SESSION['id_teacher']."' ";
	$objQuery = mysqli_query($conn,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
  ?>

  
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>เลือกชุมนุมออนไลน์โรงเรียนหรองกรดพิทยาคม</title>


  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">CLUB NKP.</div>
      <div class="list-group list-group-flush">
        <a href="teacher_page.php" class="list-group-item list-group-item-action bg-light">เพิ่มข่าวสาร</a>
        <a href="openclub.php" class="list-group-item list-group-item-action bg-light">เปิดชุมนุม</a>
        <a href="manage_club_teacher.php" class="list-group-item list-group-item-action bg-light">จัดการชุดนุม</a>
      </div>
    </div>

    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $objResult["prefix_teacher"];?> <?php echo $objResult["name_surename_teacher"];?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="logout_teacher.php">ออกจากระบบ</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
      <div class="container">
      <form action="saveedit_teacher.php" method="post">
  
  <div class="form-group">
    <label for="name_club">ชื่อชุมนุม</label>
    <input type="text" class="form-control" id="name_club" placeholder="ชื่อชุมนุม" name="name_club" value="<?php echo $row["name_club"];?>">
    <div class="form-group">
    <label for="detail_club">รายละเอียดชุมนุม</label>
    <textarea class="form-control" id="detail_club" rows="3" name="detail_club"><?php echo $row["detail_club"];?> </textarea>
    <label for="year_school">ปีการศึกษา</label>
    <input type="text" class="form-control" id="year_school" placeholder="ปีการศึกษา" name="year_school" value="<?php echo $row["year_school"];?>">
    <label for="amount_im">รับจำนวน</label>
    <input type="text" class="form-control" id="amount_im" placeholder="รับจำนวน" name="amount_im" value="<?php echo $row["amount_im"];?>">
    <?php
     $cl_im=explode(",",$row["cl_im"]); 
                
     foreach($cl_im_arr as $value){
         if(in_array($value,$cl_im)){
          echo "<input type='checkbox' name='cl_im[]' value='$value' checked> $value";
         }else{
          echo "<input type='checkbox' name='cl_im[]' value='$value'> $value";



         }

        }


?><br>
  <label for="teacher_club">ครูประจำชุมนุม</label>
    <textarea class="form-control" id="teacher_club" rows="3" name="teacher_club"><?php echo $row["teacher_club"];?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">แก้ไขชุมนุม</button>
  <input type="hidden" name="id_teacher" value="<?=$row["id_teacher"];?>">
  <?php
  mysqli_close($conn);
  ?>
</form>
</div>
      </div>
    </div>


  </div>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>