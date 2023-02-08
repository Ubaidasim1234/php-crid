<?php
include 'action.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD APP</title>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Crud App</a>

  <!-- Toggler/collapse Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Services</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
  </div>

    <form class="form-inline" action="/action_page.php">
    <input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-primary" type="submit">Search</button>
  </form>

</nav>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
             <h3 class="text-center text-dark mt-3">Advanced Curd App Using Php & Mysqli Prepared Statement (Object Oriented)</h3>
            <hr>

            <?php if(isset($_SESSION['response'])){ ?>

            <div class="alert alert-<?= $_SESSION['res_type'] ?> alert-dismissible text-center">
       <button type="button" class="close" data-dismiss="alert">&times;</button>
       <b><?= $_SESSION['response']; ?></b>
       </div>
       <?php } unset($_SESSION['response']); ?>
         </div>
    </div>
    <div class="row">
        <div class="col-md-4">
           <h3 class="text-center text-info">Add Record</h3>
           <form action="action.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
            </div>

            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Enter e-mail" required>
            </div>

              <div class="form-group">
                <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required>
            </div>

            <div class="from-group">
                <input type="file" name="image" class="custom-file">
            </div>

             <div class="from-group">
                <input type="submit" name="add" class="btn btn-primary btn-block" value="Add Record">
            </div>

           </form>
        </div>
        <div class="col-md-8">

         <?php 
         
         $query="SELECT * FROM crud";
         $stmt=$conn->prepare($query);
         $stmt->execute();
         $result=$stmt->get_result();

         ?>

            <h3 class="text-center text-info">Record Present In The Database</h3>
            <table class=" table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Image</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

    <?php while ($row=$result->fetch_assoc()){ ?>

      <tr>
        <td><?= $row['id']; ?></td>
        <td><img src="<?= $row['photo']; ?>" width="25"></td>       
         <td><?= $row['name']; ?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['phone']; ?></td>
        <td>
          <a href="details.php?details=<? = $row['id']; ?>" class="badge badge-primary p-2">Details</a> |

          <a href="action.php?delete=<? = $row['id']; ?>" class="badge badge-danger p-2">Delete</a>  |

          <a href="index.php>?edit=<? = $row['id']; ?>" class="badge badge-success p-2">Edit</a>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>

        </div>
    </div>
</div>
    
</body>
</html>