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
    session_start();
    if(!$_SESSION['id']){ 
        header("location: /gete");
    }
    $con = mysqli_connect("localhost:8889","root","root") or die(mysqli_error());
    mysqli_select_db($con, "gete") or die("Cannot connect to database");
    $coffees = array();
    $id = $_SESSION['id'];
    $query = mysqli_query($con, "Select C.name, O.amount, O.id AS oid, C.image, C.price, O.status from orders as O INNER JOIN coffee as C ON O.coffee = C.id WHERE user = '$id'") or die(mysqli_error($con)); //Query the users table
    while($row = mysqli_fetch_array($query)) //display all rows from query
    {
        $coffee = array();
        $coffee[0] = $row['name'];
        $coffee[1] = $row['amount'];
        $coffee[2] = $row['image'];
        $coffee[3] = (int)$row['price'] * (int)$row['amount'];
        $coffee[4] = $row['oid'];
        $coffee[5] = $row['status'];
        array_push($coffees, $coffee);

    }
?>
<body>
    <?php include "partials/header.php" ?>
    <div class="orders-con">
        <h4>My Orders</h4>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Amount</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                     foreach($coffees as $cof){
                        $status = '';
                        if($cof[5] == "fulfilled"){
                            $status = 'success';
                        }
                        echo '<tr>';
                        echo '<td>';
                        echo '<div class="img">';
                        echo "<img src='$cof[2]'/>";
                        echo "<p>$cof[0]</p>";
                        echo ' </div>';
                        echo '</td>';
                        echo '<td>';
                        echo $cof[1];
                        echo '</td>';
                        echo '<td>';
                        echo $cof[3];
                        echo '</td>';
                        echo '<td>';
                        echo "<span class=\"status $status \">$cof[5]</span>";
                        echo ' </td>';
                        echo '<td>';
                        echo "<button onclick=\"dlt('$cof[4]');\" id=\"dlt\">   <i class=\"fas fa-trash\"></i></button>";
                        echo ' </td>';
                        echo ' </tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>

    <?php include "partials/footer.php" ?>
    <script type="text/javascript">
        var btn = document.getElementById('order');
        var order = document.getElementsByClassName('order')[0];

        function popUp(){
            order.classList.add('active');
        }

        function hide(e){
            if(e.target.tagName === 'DIV'){
                order.classList.remove('active');
            }
        }

        function dlt(id){
            let data = `id=${id}`
            console.log(data)
            document.getElementById("dlt").innerText = 'Deleting...';
            fetch('delete.php', {
                method: 'post',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: data
            }).then(resp => resp.text())
            .then(d => {
                console.log(d)
                document.getElementById("dlt").innerText = 'Deleted'
                window.location.reload()
            })
        }

        order && (order.onclick = hide);
    </script>
</body>
</html>