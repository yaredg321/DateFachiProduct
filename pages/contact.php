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
    <link rel="stylesheet" href="../assets/css/contact.css">
    <title>Contact - GETE Yejebena Bunna</title>
</head>
<body>
    <?php include "partials/header.php" ?>
    <div class="contact-con">
    <div class="contact">
        <img src="../assets/images/contact.jpeg" />
        <form id="contact">
            <h4>Contact Us</h4>
            <p class="inv-msg" id="msg"></p>
            <div tabIndex="100"><input type="text" name="fullname" placeholder="Full name" /></div>
            <div><input type="email" placeholder="email" name="email"/></div>
            <div><input type="text" placeholder="Phone number (+251)" name="phone"/></div>
            <textarea rows="7" cols="7" placeholder="Message" name="msg" ></textarea>
            <button>Submit</button>
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

        let form = document.getElementById('contact')
        form.onsubmit = Submit
    </script>
</body>
</html>