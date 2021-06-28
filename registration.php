<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

<?php

if (isset($_POST['submit'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    if(!empty($username) && !empty($email) && !empty($password)
        && !empty($firstname) && !empty($lastname)){

    $username = mysqli_real_escape_string($connection, $username);
    $email    = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);
    $firstname = mysqli_real_escape_string($connection, $firstname);
    $lastname = mysqli_real_escape_string($connection, $lastname);

    $query = "SELECT randSalt FROM users ";
    $select_randSalt_query = mysqli_query($connection, $query);

    if(!$select_randSalt_query){
        die("Query Failed" . mysqli_error($connection));
    }

    $row = mysqli_fetch_array($select_randSalt_query);
    $salt = $row['randSalt'];

    $password = crypt($password, $salt);

    $query = "INSERT INTO users (username, user_email, user_password, user_role, user_firstname, user_lastname) ";
    $query .= "VALUES('{$username}', '{$email}', '{$password}', 'subscriber', '{$firstname}', '{$lastname}' ) ";
    $register_user_query = mysqli_query($connection, $query);
    if (!$register_user_query){
        die("Query Failed" . mysqli_error($connection));
      }
         $message = "<div class='alert alert-success' role='alert'><strong>SUCCESS</strong><br>Successfully Registered.</div>";

    }else{

         $message = "<div class='alert alert-danger' role='alert'><strong>WARNING</strong> <br>Fields cannot be empty.</div>";
    }

  }else{
    $message = "";
}
?>
    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">

                        <?php echo $message; ?>

                        <div class="form-group">
                            <label for="firstname" class="sr-only">Firstname</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter your First name">
                        </div>

                        <div class="form-group">
                            <label for="lastname" class="sr-only">Lastname</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter your Last name">
                        </div>

                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
