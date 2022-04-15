<?php

    // 1. kết nối với database
    $conn = new mysqli("localhost","root","") or die("khong the ket noi");
    // 2. check kết nối
    if($conn->connect_error){
        echo("ket noi that bai".$conn->connect_error);
    }
    //  echo("ket noi thanh cong");
    // 2.chọn bảng dữ liệu để kết nối
    $conn->select_db("baitapweb") or die("khong co database");

    $tdn = $_POST['tendangnhap'];
    $mk = $_POST['matkhau'];
    $tkh = $_POST['tenkhachhang'];
    $ns = $_POST['ngaysinh'];
    if(isset($_POST['gioitinh']))
    {
      foreach($_POST['gioitinh'] as $value)
        $gt = $value;
    }
    $em = isset($_POST['email']);
    $tn = $_POST['thunhap'];
    // 3.xây dựng câu truy vấn
    $sql = "INSERT INTO dangki (tendangnhap, matkhau, hotenkhachhang, ngaysinh, gioitinh, email, thunhap)
        VALUES ('$tdn', '$mk', '$tkh','$ns','$gt','$em','$tn')";

      if ($conn->query($sql) === TRUE) 
      {
        echo "dang ki thanh cong";
      } 
      else 
      {
        echo "khong dang ki duoc";
      }   
    $conn->close();
?>