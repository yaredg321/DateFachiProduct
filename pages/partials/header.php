<?php
    session_start();
    $logged_in = false;
    if($_SESSION['id']){ 
        $logged_in = true;
    }
?>
<header>
    <a href="/gete" class="logo">
        <img src="/gete/assets/images/logo.jpg" class="logo-img"/>
        <p class="logo-pre">ጌጤ</p><p class="logo-pre suff">የጀበና ቡና</p>
    </a>
    <div class="search">
        <input type="text" id="search" placeholder="Search bunna" />
        <button><i class="fas fa-search" id="s-btn" style="font-size: 18px;"></i></button>
    </div>
    <div class="links">
        <a href="/gete" class="active">Home</a>
        <a href="/gete/pages/coffees.php">Coffees</a>
        <a href="/gete/pages/about.php">About</a>
        <?php if($logged_in) echo '<a href="/gete/pages/logout.php">Logout</a>'; else echo '<a href="/gete/pages/contact.php">Contact</a>'; ?>
        <?php if($logged_in) echo '<a href="/gete/pages/my-orders.php">My Orders</a>'; ?>
    </div>
    <script>
    document.getElementById('s-btn').onclick = function(){
        let v = document.getElementById('search').value
        window.location.assign('/gete/pages/search.php?q=' + v)
    }
</script>
</header>