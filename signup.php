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


        <?php
        if (isset($_GET["error"])){
            if ($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all fields</p>";
            }
            elseif ($_GET["error"] == "invaliduid"){
                echo "<p>Choose a proper username!</p>";
            }
            elseif ($_GET["error"] == "Invalidemail"){
                echo "<p>User valid email</p>";
            }
            elseif ($_GET["error"] == "passwordsdontmatch"){
                echo "<p>Passwords don't match! Try again</p>";
            }
            elseif ($_GET["error"] == "none"){
                echo "<p>you have signed up</p>";
            }
            elseif ($_GET["error"] == "usernametaken"){
                echo "<p>Try another using another username</p>";
            }


        }

        ?>


    </section>

<?php
    include_once 'footer.php';
?>