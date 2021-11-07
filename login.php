<?php
    include_once 'header.php';
?>

    <section class="index-intro">
        <h2 class="text-center text-info">Log In</h2>
        <div class="col-3"></div>
        <div class="col-3 text-center">
            <form action="include/login.inc.php" method="post">
                <input type="text" name="name" placeholder="Username/Email..."><br>
                <input type="password" name="pwd" placeholder="Password..."><br>
                <br>
                <button class="btn btn-outline-info" type="submit" name="submit">Log In</button>
            </form>
        </div>
    </section>


<?php
    include_once 'footer.php';
?>
