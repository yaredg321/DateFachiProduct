<!-- All website components are built from scratch. neither copied nor edited template -->
<!-- Licence MIT -->
<!-- Submitted to Internet Programming instructor -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/fontawesome-5/css/all.css">
    <link rel="stylesheet" href="../assets/css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <link rel="stylesheet" href="../assets/css/contact.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <title>Login - GETE Yejebena Bunna</title>
</head>

<?php
    session_start();
    if($_SESSION['id']){ 
        header("location: /gete");
    }
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        session_start();
        $con = mysqli_connect("localhost:8889","root","root") or die(mysqli_error());
        mysqli_select_db($con, "gete") or die("Cannot connect to database"); //Connect to database

        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $bool = true;

        

        $query = mysqli_query($con, "Select * from users WHERE email='$email'"); // Query the 
                                                                                // users table
        $exists = mysqli_num_rows($query); //Checks if username exists
        echo $exists . $email . $password;
        $table_users = "";
        $table_password = "";
        $table_id = "";
        $errors = "";
        if($exists > 0) //IF there are no returning rows or no existing username
        {
            while($row = mysqli_fetch_assoc($query)) // display all rows from query
            {
                $table_users = $row['email'];     // the first username row is 
                                                    // passed on to $table_users, 
                    $table_id = $row['id'];                                    // and so on until the query is finished
                $table_password = $row['password'];  // the first password row is passed on 
                                                    // to $table_password, and so on 
            }                           // until the query is finished
            echo $table_users;
            if(($email == $table_users) && ($password == $table_password)) // checks if there 
                                                                        // are any matching fields
            {
                if($password == $table_password)
                {
                    $_SESSION['id'] = $table_id;    // set the username in a session. 
                                                    // This serves as a global variable
                    header("location: /gete/index.php");     // redirects the user to the authenticated 
                                                    // home page
                }
            }
            else
                {
                    $errors = '<p class="inv-msg active" id="msg">Incorrect username or password!</p>';
                }
            }
        
        else
        {
            $errors = '<p class="inv-msg active" id="msg">Incorrect username or password!</p>';
        }
    }
?>
<body>
    <?php include "partials/header.php" ?>
    <div class="contact-con">
    <div class="contact login">
        <form id="contact" method="post" name="contact" action="login.php">
            <h4>Login</h4>
            <?php if(!empty($errors)){
                    echo $errors;
            } ?>
            <div><input type="email" placeholder="Email" name="email"/></div>
            <div><input type="password" placeholder="Password" name="password"/></div>
            <button type="submit" name="submit" form="contact">Login</button>
        </form>
    </div>
    </div>

    <?php include "partials/footer.php" ?>
    <script type="text/javascript">
        
    </script>
</body>
</html>