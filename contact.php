<?php
session_start();

// Check if the user is logged in
$loggedIn = isset($_SESSION["user"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/your_kit_code.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="header2"> 
    <div class="container">
        <nav>
            <ul id="sidemenu">
                <li>
                    <a href="index.php">
                        <button type="button">Home</button>
                    </a>
                </li>
                <li>
                    <a href="about.php">
                        <button type="button">About</button>
                    </a>
                </li>   
                <li>
                    <a href="portfolio.php">
                        <button type="button">Portfolio</button>
                    </a>
                </li>
                <li>
                    <a href="contact.php">
                        <button type="button">Contact</button>
                    </a>
                </li>
                <i class="fas fa-times-circle" onclick="closemenu()"></i>
            </ul>
            <i class="fas fa-ellipsis-v" onclick="openmenu()"></i>
        </nav>
    </div>
</div>

<!--------------contact--------------->
<div id="contact">
    <div class="container">
            <div class="contact-left">
                <h1 class="sub-title">Contact Me</h1>
                <p><i class="fas fa-envelope"></i> Skye.dingle11@gmail.com</p>
                <div class="social-icons">
                    <a href="https://www.facebook.com/Skye.waynee"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.behance.net/skyedingle"><i class="fab fa-behance-square"></i></a>
                    <a href="https://www.instagram.com/skyernx/"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="contact-form">
                    <p class="feedback">your feedback is highly appreciated!</p>
                    <form action="https://api.web3forms.com/submit" method="POST">
                        <input type="hidden" name="access_key" value="823978f0-1303-4f36-852c-d1dd6b672096">
                        <input type="text" name="Name" placeholder="Your Name" required>
                        <input type="email" name="email" placeholder="Your Email" required>
                        <textarea name="Message" rows="6" placeholder="Your Message"></textarea>
                        <?php if ($loggedIn): ?>
                        <button id="btn" type="submit" class="btn" onclick="this.style.cursor = 'pointer';">Submit</button>
                        <?php endif; ?>
                    </form>
                </div>
                <div><p class="LoginReg"> Register to submit feedback. <a href="registration.php" class="LoginReg" >Register here</a>  |  <a href="login.php" class="LoginReg">  login here</a></div>
                <div class="container">
                <?php if ($loggedIn): ?>
        <a href="logout.php" class="btn btn-warning">Logout</a>
        <?php endif; ?>
        </div>
        </div>
    </div>
    <div class="copyright">
        <p>Copyright © Skye Dingle</p>
    </div>
</div>
<script>

    var sidemenu = document.getElementById("sidemenu");

    function openmenu(){
        sidemenu.style.right = "0";
    }
    function closemenu(){
        sidemenu.style.right = "-200px";
    }
</script>
</body>
</html>
