<?php require 'functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="signup.css">
</head>



<body>
    <div class="left-container">
       <h1>LEONI</h1>
    </div>

    <div class="right-container">
        <h1 class="header">Welcome to Leoni Sign up  Page</h1>
        <form action="" method="POST">
            <label for="">Username</label> <br>
            <input type="text" name="username" ><br>
            <label for="email">Email</label> <br>
            <input type="email" name="email"><br>
            <label for="">Password</label> <br>
            <input type="password" name="password" > <br>
            <input class="button" type="submit"  value="Sign up"> <br>
        </form>
           
    </div>
</body>
</html>

<?php
    
   if(!empty($_POST)){

      $errors = array();
      
      if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){

          $errors['username'] = " Enter a valid username ";
      }

      if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

        $errors['Email'] = " Enter a valid email ";
    }

    if(empty($_POST['password'])){

        $errors['Password'] = " Enter a valid Password ";
    }

     if(empty($errors)){

        require_once 'db.php';
        $req = $pdo->prepare("INSERT INTO users SET username = ?, password = ?, email = ?");
        $password = password_hash($POST['password'], PASSWORD_BCRYPT);
        $req->execute([$_POST['username'], $password, $_POST['email']]);
     } 

     



   }

?>