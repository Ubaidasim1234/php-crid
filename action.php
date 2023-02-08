<?php
session_start();

include 'config.php';

if( isset($_POST['add'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];

    $photo=$_FILES['image']['name'];
    $upload=" uploads/ ".$photo;

    $query=" INSERT INTO crud (name, email, phone, photo) values(????)";
    $stmt=$conn->prepare($query); 
    $stmt=$conn->bind_param("ssss",$name,$email,$phone,$upload);
    $stmt=$conn->execute();

    move_uploaded_file($_FILES['image']['tmp_name'],$upload);

    header('location:index.php');
    $_SESSION['response']="Successfully inserted to the database!";
    $_SESSION['res_type']="success";

};
// if(isset($_GET['delete'])){
//     $id=$_GET['delete'];

//     $query="DELETE FROM crud WHERE id=?";
//     $stmt=$conn->prepare($query);
//     $stmt->bind_param("i",$id);
//     $stmt->execute();

//     header('location:index.php');
//     $_SESSION['response']="Successfully Deleted!";
//     $_SESSION['res_type']="danger";

// }

if(isset($_GET['delete'])){
$id=$_GET['delete'];
$query=" DELETE FROM crud WHERE id =?";
$stmt=$conn->prepare($query);
$stmt->bind_param("i",$id);
$stmt->execute();

    echo "<script>alert('data Deleted succesfully');
    window.location.href='index.php';
    </script>";
    header('location:index.php');
      $_SESSION['response']="Successfully Deleted!";
     $_SESSION['res_type']="danger";
}

?>