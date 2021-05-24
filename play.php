<?php

  include('connect.php');
  $id = @$_GET['id'];
  if (!$id){
    echo 'No ID';
    exit;
  }

  $list = @$_GET['list'];
  if(!$list){
    $query = mysqli_query($con, "SELECT * FROM data_movie WHERE id = $id");  
    $result = mysqli_fetch_array($query);
  }else{
    $query = mysqli_query($con, "SELECT * FROM data_list WHERE main_id = $id and part = $list ");  
    $result = mysqli_fetch_array($query);
    $num_list = mysqli_num_rows(mysqli_query($con, "SELECT * FROM data_list WHERE main_id = $id "));

    
  }
  
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$result['name']?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>  
 

<!--เมนูด้านบน-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light " style="background-color:#6f7fc3!important">
    <div class="container-fluid">
      <a class="navbar-brand" href="./">SeaMovie</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./">หน้าแรก</a>
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
        </form>
      </div>
    </div>  
  </nav>

    <!-- ส่วนบอดี รายชื่อหนัง -->
    <div class="album py-5 bg-light" style="background-image: url(https://a-static.besthdwallpaper.com/naamthrrmkhwanthiimiisiisan-wx-ll-pepexr-2560x2048-28576_33.jpg);background-size: 100%;">
     <div class="container">
   
    <!--เริ่มต้นตัวเล่นหนัง ธรรมดา-->
     <?php if(!$list){
    
    ?>
        <nav aria-lable="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item" ><a href="./" style="color: #e8102e; text-decoration: unset;">หน้าแรก</a></li>
            <li class="breadcrumb-item active" aeia-current="page" style="color: #e4ff00; "><?=$result['name']?></li>
          </ol>
         </nav>

    <!--รูปภาพปก และแสดงตัวอย่างหนัง-->
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-4 shadow-sm">
                <img src="<?=$result['img']?>" while="100%" height="395" class="card-img-top"/>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card mb-4 shadow-sm">
                <iframe width="100%" height="395" src="https://www.youtube.com/embed/<?=$result['video_ex']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>      
    </div>
    
    <!--ตัวหลักเล่นหนัง-->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm text-center" style="background-color: #1df547;"><h3>Play</h3></div>
              
                <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="play1" >  
                    <div class="card mb-4 shadow-sm">
                      <iframe width="100%" height="623" src="https://www.youtube.com/embed/<?=$result['video_main']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                  </div>
                <div class="tab-pane fade " id="play2" >
                    <div class="card mb-4 shadow-sm">
                      <iframe width="100%" height="623" src="https://www.youtube.com/embed/<?=$result['video_main2']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>              
                </div>
                <div class="tab-pane fade " id="play3" >
                    <div class="card mb-4 shadow-sm">
                      <iframe width="100%" height="623" src="https://www.youtube.com/embed/<?=$result['video_main3']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div> 
                </div>
                </div>
        </div> 

              <div class="col-12">
          <div class="list-group list-group-horizontal-sm text-center" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active"  data-bs-toggle="list" href="#play1" >Player 1</a>
            <a class="list-group-item list-group-item-action "  data-bs-toggle="list" href="#play2" >Player 2</a>
            <a class="list-group-item list-group-item-action "  data-bs-toggle="list" href="#play3" >Player 3</a>   
          </div>   
        </div>  
    </div>

   

    <?php 
    }else{
    ?>
<!--เริ่มต้นตัวเล่นหนัง ลิส-->
    
        <nav aria-lable="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item" ><a href="./" style="color: #e8102e; text-decoration: unset;">หน้าแรก</a></li>
            <li class="breadcrumb-item" ><a href="./list.php?id=<?=$id?>" style="color: #e4ff00; text-decoration: unset;">ดูตอนอื่นๆ <?=$result['name']?></a></li>
            <li class="breadcrumb-item active" aeia-current="page" style="color: #e4ff00; "><?=$result['name']?></li>
          </ol>
         </nav>
    
    <!--ตัวหลักเล่นหนัง-->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm text-center" style="background-color: #1df547;"><h4>ตอนที่ <?=$result['part']?></h4></div>
                <div class="card mb-4 shadow-sm">
                    <iframe width="100%" height="623" src="https://www.youtube.com/embed/<?=$result['vdo']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
        </div>      
    </div>

   <!--ปุ่มหนังก่อนหน้า ถัดไป-->
   <div class="row">
        <div class="col-md-4">
            <a class="btn shadow-sm text-center <?php if($list <=1){echo "disabled";}?>" style="background-color: #1df547; padding: 10px; width: 100%;" href="play.php?id=<?=$id?>&list=<?=$list-1?> "><h5 style="margin: 0;">ตอนก่อนหน้า</h5></a>
        </div>      
     
        <div class="col-md-4">
            <a class="btn shadow-sm text-center " style="background-color: #1df547; padding: 10px; width: 100%;" href="./list.php?id=<?=$id?>" "><h5 style="margin: 0;">ดูตอนอื่นๆ</h5></a>
        </div>      
    

        <div class="col-md-4">
            <a class="btn shadow-sm text-center <?php if($list >=$num_list){echo "disabled";}?>" style="background-color: #1df547; padding: 10px; width: 100%;" href="play.php?id=<?=$id?>&list=<?=$list+1?> "><h5 style="margin: 0;">ตอนถัดไป</h5></a>
        </div>      
    </div>

    <!--สิ้นสุดตัวเล่นหนัง-->


    <?php  } ?>
     </div>
    </div>


<center>
    <footer class="blog-footer" style="padding: 15px; background-color: #6f7fc3!important;">
      <p style="margin:0;"> ดูหนังฟรี ที่นี่เลย <a href="./ "> SeaMovie</a></p>
    </footer>
</center>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>