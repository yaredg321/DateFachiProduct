<!-- All website components are built from scratch. neither copied nor edited template -->
<!-- Submitted to Internet Programming 2 instructor -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/fontawesome-5/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">
    <title>GETE Yejebena Bunna</title>
</head>

<body>
    <?php include "pages/partials/header.php" ?>
    <div class="landing-cover">
        <div class="landing">
         
            <p class="bold-text">
                Get Fresh Coffee Made With Ethiopian Coffee Pot
            </p>
            <?php
                
                if($logged_in){
                    Print '<button onclick="window.location.assign(\'pages/coffees.php\');">';
                    Print '<div class="inner-btn">';
                    Print '<i class="fas fa-mug-hot" style="font-size: 17px;"></i> <p>Shop Now</p>';
                    Print '</div>';
                    Print '</button>';
                } else {
                    Print '<div style=\'display: flex;\'>';
                    Print '<button class="colored" onclick="window.location.assign(\'pages/signup.php\')">';
                    Print '<div class="inner-btn">' ;
                    Print '<i class="fas fa-user-plus" style="font-size: 17px;"></i> <p>SignUp</p>';
                    Print '</div>';
                    Print '</button>';

                    Print '<button style=\'margin-left: 20px;\' onclick="window.location.assign(\'pages/login.php\')">';
                    Print '<div class="inner-btn">' ;
                    Print '<i class="fas fa-sign-in-alt" style="font-size: 17px;"></i> <p>Login</p>';
                    Print '</div>';
                    Print '</button>';
                    Print '</div>';
                }
            ?>
        </div>
    </div>
    <div class="main">
        <div class="home-img">
            <img src="assets/images/coffee1.jpg" alt="" class="img-float">
            <div class="img-text">
                <div class="text-dec">
                    <div></div>
                    <i class="fas fa-coffee" style="margin-left: 20px; margin-right: 20px;"></i>
                    <div></div>
                </div>
                <p class="text">Ethiopia is said to be the birthplace of coffee and is home to many of the best coffees in the world. Ethiopian coffee was a prized possession in many countries throughout history. Coffee from this region is more complex than any other bean, due to its genetic make-up. Green coffee beans from this region hold longer genomic structures than in any other countries, meaning it stays fresh longer
                    <br />
                    <br />
                    Coffee production in Ethiopia is a longstanding tradition which dates back dozens of centuries. Ethiopia is where Coffea arabica, the coffee plant, originates. The plant is now grown in various parts of the world; Ethiopia itself accounts for around 3% of the global coffee market.
                </p>
                <div class="text-dec" style="margin-top: 20px;">
                    <div></div>
                    <i class="fas fa-coffee" style="margin-left: 20px; margin-right: 20px;"></i>
                    <div></div>
                </div>
            </div>
            
        </div>

        <div class="home-img second">
            
            <div class="img-text right">
                <div class="text-dec right">
                    <div></div>
                    <i class="fas fa-coffee" style="margin-left: 20px; margin-right: 20px; color: orange;"></i>
                    <div></div>
                </div>
                <p class="text">Coffee from Ethiopia is known for its bright fruited and floral flavors. These coffees typically have a higher acidity, light to medium body and complex flavor notes. The beans are either washed or naturally processed. ... These beans are characterized by their flavor clarity, showcasing bright, complex notes
                    <br />
                    <br />
                    The revenues from coffee exports account for 10% of the annual government revenue, because of the large share the industry is given very high priority, but there are conscious efforts by the government to reduce the coffee industry's share of the GDP by increasing the manufacturing sector.
                </p>
                <div class="text-dec right" style="margin-top: 20px;">
                    <div></div>
                    <i class="fas fa-coffee" style="margin-left: 20px; margin-right: 20px; color: orange;"></i>
                    <div></div>
                </div>
            </div>
            <img src="assets/images/order-cover.jpg" alt="" class="img-float right">
            
        </div>
    </div>
    <div class="order">
        <div class="order-cont">
            <img src="assets/images//GETE.png" class="order-img" />
            <form>
                <h3>Order Us</h3>
                <label for="amount">Amount</label>
                <input type="number" id="amount" placeholder="amount" />
                <label for="size">Size</label>
                <select id="size" style="width: 55%;">
                    <option>1 KG</option>
                    <option>3 KG</option>
                    <option>5 KG</option>
                </select>
                <button>Order</button>
            </form>
            <button id="cnl"><i class="fas fa-cancel"></i></button>
        </div>
    </div>
    <div class="developers-cont" id="devs-sec">
        <h3>Group Members</h3>
        <div class="developers">

            <div class="dev">
                <div><img src="assets/images/fuad.jpg" /></div>
                <h4>Fuad Hyredin</h4>
                <p>Programmer, Coder</p>
                <p>RCD/1316/2012</p>
            </div>
            <div class="dev">
                <div><img src="assets/images/zola.jpg" /></div>
                <h4>Zelalem Desta</h4>
                <p>Programmer, Graphic designer</p>
                <p>RCD/1347/2012</p>
            </div>
            
            <div class="dev">
                <div><img src="assets/images/milla.jpg" /></div>
                <h4>Milliyard Abebaw</h4>
                <p>Programmer</p>
                <p>RCD/1332/2012</p>
            </div>
        </div>
    </div>
    <?php include "pages/partials/footer.php"; ?>
    <script src="assets/js/script.js?<?php echo date('l jS \of F Y h:i:s A'); ?>"></script>
</body>
</html>