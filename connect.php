<?php

    $servername = "localhost";
    $username  = "root";
    $password = "";
    $dbname = "movie";

    $con = mysqli_connect($servername, $username, $password, $dbname); /* เชื่อมต่อฐานข้อมมูล */
    mysqli_query($con, "set char set utf8"); /*ทำให้อ่านไทยได้*/
 
    /*แสดงผลลัพธ์*/

    /*
    print_r($result); 
    */

    
    /* เช็คการเชื่อมต่อกับฐานข้อมูล */

    /* 
    if($conn)
    echo "เชื่อมต่อได้" ;
    */

?>