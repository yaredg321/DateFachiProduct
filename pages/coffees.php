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
    <title>Coffees - GETE Yejebena Bunna</title>
</head>
<?php 
    $con = mysqli_connect("localhost:8889","root","root") or die(mysqli_error());
    mysqli_select_db($con, "gete") or die("Cannot connect to database");
    $coffees = array();
    $query = mysqli_query($con, "Select * from coffee") or die(mysqli_error($con)); //Query the users table
    while($row = mysqli_fetch_array($query)) //display all rows from query
    {
        $coffee = array();
        $coffee[0] = $row['name'];
        $coffee[1] = $row['type'];
        $coffee[2] = $row['image'];
        $coffee[3] = $row['price'];
        $coffee[4] = $row['id'];
        array_push($coffees, $coffee);
    }
?>
<body>
    <?php include "partials/header.php" ?>
    <div class="coffees-con">
        <?php
            foreach($coffees as $cof){
                echo ' <div class="coffee">';
                echo ' <div class="detail">';
                echo "<img src='$cof[2]'/>";
                echo ' <div class="text">';
                echo "<p>$cof[0]</p>";
                echo "<span>$cof[1]</span>";
                echo " <span class='price'>$cof[3] ETB</span>";
                echo '</div>';
                echo '</div>';
                if($logged_in) echo "<button onclick=\"popUp($cof[4])\">Order</button>";
                echo ' </div>';
            }
       ?>
    </div>

    <div class="order">
        <div class="order-cont">
            <img src="/gete/assets/images/GETE.png" class="order-img" />
            <form id="orderform" method="post">
                <h3>Order Us</h3>
                <label for="amount">Amount in KG</label>
                <input type="number" name="amount" placeholder="amount" />
                <label for="address">Delivery Address</label>
                <input type="text" name="address" placeholder="address" />
                <label for="phone">Contact Phone No.</label>
                <input type="number" name="phone" placeholder="phone" />
                <!-- <label for="size">Size</label> -->
                <!-- <select id="size" style="width: 55%;">
                    <option>1 KG</option>
                    <option>3 KG</option>
                    <option>5 KG</option>
                </select> -->
                <button type="submit" id="ordr-btn">Order</button>
            </form>
        </div>
    </div>

    <?php include "partials/footer.php" ?>
    <script type="text/javascript">
        var btn = document.getElementById('order');
        var order = document.getElementsByClassName('order')[0];
        console.log(order.classList)

        function popUp(id){
            window.coffeeId = id;
            order.classList.add('active');
        }

        document.getElementById('orderform').onsubmit = function(e){
            e.preventDefault();
            let data = `coffee=${window.coffeeId}&amount=${e.target.amount.value}&address=${e.target.address.value}&phone=${e.target.phone.value}`
            console.log(data)
            document.getElementById("ordr-btn").innerText = 'Ordering...';
            fetch('order.php', {
                method: 'post',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: data
            }).then(resp => resp.text())
            .then(d => {
                document.getElementById("ordr-btn").innerText = 'Order'
                window.location.assign('my-orders.php')

            })
        }

        function hide(e){
            if(e.target.tagName === 'DIV'){
                order.classList.remove('active');
            }
        }
        order && (order.onclick = hide);
    </script>
</body>
</html>