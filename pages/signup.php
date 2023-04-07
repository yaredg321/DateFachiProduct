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
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/contact.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <title>Signup - GETE Yejebena Bunna</title>
</head>
<?php 
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $con = mysqli_connect("localhost:8889","root","root") or die(mysqli_error());
        mysqli_select_db($con, "gete") or die("Cannot connect to database");

        
        $required = array('email', 'first_name', 'last_name', 'password', 'password_confirm');
        $errors = array();
        $filled = true;

        foreach($required as $field){
            if(empty($_POST[$field])){
                $filled = false;
                $ele = '';
                if($field == "password_confirm"){
                    $ele = '<p class="inv-msg active" id="msg">Please confirm your password!</p>';
                } else {
                    $ele = '<p class="inv-msg active" id="msg">' . str_replace('_', ' ', $field) . ' is required</p>';
                  
                }
                array_push($errors, $ele);
            }
        }

        $email = mysqli_real_escape_string($con, $_POST['email']);
        $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $password_confirm = mysqli_real_escape_string($con, $_POST['password_confirm']);

        if($filled){
            $ele = '';
            $er = false;
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $ele = '<p class="inv-msg active" id="msg">Please enter a valid email!</p>';
                array_push($errors, $ele);
                $er = true;
            } if(strlen($first_name) < 3){
                $ele = '<p class="inv-msg active" id="msg">minimum length for first name is 3!</p>';
                array_push($errors, $ele);
                $er = true;
            } if(strlen($last_name) < 3){
                $ele = '<p class="inv-msg active" id="msg">minimum length for last name is 3!</p>';
                array_push($errors, $ele);
                $er = true;
            } if(strlen($password) < 6){
                $ele = '<p class="inv-msg active" id="msg">password must be atlest 6 charachters!</p>';
                array_push($errors, $ele);
                $er = true;
            } if($password != $password_confirm){
                $ele = '<p class="inv-msg active" id="msg">Please confirm your password!</p>';
                array_push($errors, $ele);
                $er = true;
            }
            
            if(!$er){
                $bool = true;
                $query = mysqli_query($con, "Select * from users"); //Query the users table
                while($row = mysqli_fetch_array($query)) //display all rows from query
                {
                    if($email == $row['email'])
                    {
                        if(!$bool){
                            $ele = '<p class="inv-msg active" id="msg">Email is already taken!</p>';
                            array_push($errors, $ele);
                        }
                        $bool = false;
                        
                    }
                }

                if($bool) // checks if bool is true
                {
                    mysqli_query($con, "INSERT INTO users (email, first_name, last_name, password) VALUES ('$email', '$first_name', '$last_name', '$password')") or die(mysqli_error($con));
                    header("location: login.php");
                }
            }
        }

    }
?>
<body>
    <?php include "partials/header.php" ?>
    <div class="contact-con">
    <div class="contact login">
        <form id="contact" method="post" action="signup.php">
            <h4>Signup</h4>
           
                <?php foreach($errors as $_error){
                    echo $_error;
                } ?>
        
            <div><input type="email" placeholder="Email" name="email"/></div>
            <div><input type="text" placeholder="First Name" name="first_name"/></div>
            <div><input type="text" placeholder="Last Name" name="last_name"/></div>
            <div><input type="password" placeholder="Password" name="password"/></div>
            <div><input type="password" placeholder="Confirm Password" name="password_confirm"/></div>
            <button>Creat Account</button>
        </form>
    </div>
    </div>

    <?php include "partials/footer.php" ?>
    <script type="text/javascript">
        function Submit(e){
            e.preventDefault()
            let fn = e.target.fullname.value
            let phone = e.target.phone.value
            let msg = document.getElementById('msg')
            let NameValidator = /^[A-Za-z]+$/
            let phoneValidator = /^\+251[0-9]{9}$/
            if(NameValidator.test(fn)){
                msg.classList.add('active')
                msg.innerText = 'Invalid Name'
                return
            }
            if(phoneValidator.test(phone)){
                msg.classList.add('active')
                msg.innerText = 'Invalid Phone Number'
                return
            }
            msg.classList.remove('active')
        }

    </script>
</body>
</html>