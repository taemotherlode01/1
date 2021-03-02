<?php
	session_start();
	require_once("connect.php");

	if(!isset($_SESSION['id_teacher']))
	{
		echo "Please Login!";
		exit();
	}
	
	$sql = "UPDATE teacher SET LastUpdate = NOW() WHERE id_teacher = '".$_SESSION["id_teacher"]."' ";
	$query = mysqli_query($conn,$sql);

	$strSQL = "SELECT * FROM teacher WHERE id_teacher = '".$_SESSION['id_teacher']."' ";
	$objQuery = mysqli_query($conn,$strSQL);
	$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

  $rr = "SELECT * FROM club WHERE id_teacher = '".$_SESSION['id_teacher']."' ";
	$ww = mysqli_query($conn,$rr);
?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="frontst/gg.css">
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
      <table id="myTable" style="width: 100%;" class="customers">
        <thead>
            <tr>
                <th>ชื่อชุมนุม</th>
                <th>รายละเอียด</th>
                <th>ปีการศึกษา</th>
                <th>รับจำนวน</th>
                <th>ชั้นที่รับ</th>
                <th>ครูประจำชุมนุม</th>
                <th>จัดการ</th>
            </tr>
        </thead>
        <?php
                        while ($rs = mysqli_fetch_assoc($ww)){
                             
                        ?>
                        <tr>
        <tbody>
       
            <tr>
                <td><?php echo $rs['name_club']?></td>
                <td><?php echo $rs['detail_club']?></td>
                <td><?php echo $rs['year_school']?></td>
                <td><?php echo $rs['amount_im']?></td>
                <td><?php echo $rs['cl_im']?></td>
                <td><?php echo $rs['teacher_club']?></td>
                <td>
                <a href="edit_club_teacher.php?id=<?php echo $rs["id_club"];?>" class="btn btn-primary"tabindex="-1" role="button" aria-disabled="true" >แก้ไข</a>
                <a href="delete_club.php?id=<?php echo $rs["id_club"]; ?>" class="btn btn-danger" tabindex="-1" role="button" aria-disabled="true">ลบ</a>
                </td>
            </tr>
            <?php    
                         }
                        ?>
    </table>
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