<?php
    include_once 'header.php';
?>

    <section class="index-intro">
        <h2 class="text-center text-info">Sign UP</h2>
        <div class="col-3"></div>
        <div class="col-3 text-center">
        <form action="include/signup.inc.php" method="post">
            <input type="text" name="name" placeholder="Full name..."><br>
            <input type="text" name="email" placeholder="Email..."><br>
            <input type="text" name="uid" placeholder="Username..."><br>
            <input type="password" name="pwd" placeholder="Password..."><br>
            <input type="password" name="pwdrepeat" placeholder="Repeat password..."><br><br>
            <button class="btn btn-outline-info" type="submit" name="submit">Sign up</button>
        </form>
        </div>
    </section>



<?php
    include_once 'footer.php';
?>