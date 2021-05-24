<?php

  include('connect.php');
  

  $num_row = mysqli_num_rows(mysqli_query($con,"SELECT * FROM data_movie"));
  $limit_page = 8;
  $page = @$_GET['Page'] ? $_GET['Page'] : 1 ;
  $num_page = $num_row/$limit_page;

  if (!($num_page == (int)$num_page))
    $num_page = (int)$num_page + 1 ;

  
  $limit_start = ($limit_page)-$limit_page


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wanna See Movie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>  
 

<!--เมนูด้านบน-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light " style="background-color:#3d464c!important;">
    <div class="container-fluid">
      <a class="navbar-brand" href="./">SeaMovie</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">หน้าแรก</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">หนังใหม่</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              หมวดหมู่
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">หนังต่อสู้</a></li>
              <li><a class="dropdown-item" href="#">หนังรัก</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">หนังผี</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link href="#">ติดต่อเรา</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="ค้นหาหนัง" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">ค้นหา</button>
        </form>
      </div>
    </div>
  </nav>

    <!-- ส่วนบอดี รายชื่อหนัง -->
    <div class="album py-5" style="background-image: url(https://cdn.pixabay.com/photo/2017/06/24/14/27/smoke-2437886_960_720.jpg); background-size: 100%;" >

    <div class="container">
        <nav aria-lable="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./" style="color: #e8102e; text-decoration: unset;">หน้าแรก</a></li>
            <li class="breadcrumb-item active" aeia-current="page">ล่าสุด</li>
          </nav>
          </ol>

      <!--เริ่มต้นบอดี้หนัง-->

      <div class="row">

      <?php 
          $query = mysqli_query($con, "SELECT * FROM data_movie ORDER BY id DESC LIMIT $limit_start,$limit_page"); /* ดึงข้อมูลแค่ 8 เรื่อง*/ 
            while ( $result = mysqli_fetch_array($query))  {
           
      ?>


        <div class="col-md-3">
          <div class="card mb-4 shadow-sm">
          <a href="<?php if($result['status_list'] == 'YES'){?>list<?php }else{?>play<?php } ?>.php?id=<?=$result['id'] ?>"> <!--เช็คว่าหนังเป็น ซีรี่ย์หรือไม่-->
           <img src="<?=$result['img'] ?>" while="100%" height="395" class="card-img-top"/>
            <div class="card-body">
              <p class="card-text text-center "><?=$result['name'] ?></p>
              <div class="d-flex justify-content-between align-items-center">
              </div>
            </div>
            </a>
          </div>         
        </div>
      <?php } ?>
    </div>

    <br>
    <!--ส่วนของปุ่มเลื่อนหน้า-->
    <nav aria-label="...">
  <ul class="pagination justify-content-center">
  <!--------------------------------------------------------->
  <?php
    if($page <= 1){
    
  ?>

   <li class="page-item disabled">
      <a class="page-link">ก่อน</a>
  </li>

  <?php
    }else{
  ?>

  <li class="page-item ">
      <a class="page-link" href="?Page=<?=$page-1?>">ก่อน</a>
  </li>

  <?php
    }
  ?>
   
  <!--------------------------------------------------------->
    <?php
      $num_start  = 1;
      $num_stop = 3;

      for($i=$num_start;$i<=$num_stop;$i++){
        if($page == $i ){
      ?>

      <li class="page-item active" aria-current="page">
        <span class="page-link"><?=$i?><span class="sr-only"></span></span>
      </li>   
    <?php
      }
     else
      {    
    ?>
      <li class="page-item"><a class="page-link" href="?Page=<?=$i?>"><?=$i?></a></li>
        
    <?php
      }
    }
    ?>
  <!--------------------------------------------------------->
  <?php
    if($page >= $num_page){
    
  ?>

   <li class="page-item disabled">
      <span class="page-link">หลัง</span>
  </li>

  <?php
    }else{
  ?>

  <li class="page-item ">
      <a class="page-link" href="?Page=<?=$page+1?>">หลัง</a>
  </li>

  <?php
    }
  ?>

  </ul>
</nav>
    </div>
    </div>


<center>
    <footer class="blog-footer" style="padding: 20px; background-color: #3d464c!important;">
      <p style="margin:0; "> ดูหนังฟรี ที่นี่เลย <a href="./ " >  SeaMovie</a></p>
    </footer>
</center>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>