<?php

$conn =new mysqli("localhost","root","","phpcrud");

if($conn->connect_error){
    die("could not connect to the database!".$conn->connect_error);
    
}

?>