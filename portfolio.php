<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
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
<!----------portfolio----------->
<div id="background">
<div id="portfolio">
    <div class="container">
        <h1 class="sub-title">My Portfolio</h1>
        <div class="work-list">
            <div class="work">
                <img src="images/work-1.jpg">
                <div class="layer">
                    <h3>Burst of colors</h3>
                    <p> Camera Used: Canon EOS 200D Mark II</p>
                </div>
            </div>
            <div class="work">
                <img src="images/work-2.jpg">
                <div class="layer">
                    <h3>Sunflower</h3>
                    <p> Camera Used: Canon EOS 200D Mark II</p>
                </div>
            </div>
            <div class="work">
                <img src="images/work-3.jpg">
                <div class="layer">
                    <h3>Kavouge</h3>
                    <p> Camera Used: Canon EOS 200D Mark II</p>
                </div>
            </div>
            <div class="work">
                <img src="images/work-4.jpg">
                <div class="layer">
                    <h3>when yellow meets blue</h3>
                    <p> Camera Used: Canon EOS 200D Mark II</p>
                </div>
            </div>
            <div class="work">
                <img src="images/work-5.jpg">
                <div class="layer">
                    <h3>bookworm</h3>
                    <p> Camera Used: Canon EOS 200D Mark II</p>
                </div>
            </div>
            <div class="work">
                <img src="images/work-6.jpg">
                <div class="layer">
                    <h3>heterochromia cat</h3>
                    <p> Camera Used: Canon EOS 200D Mark II</p>
                </div>
            </div>
            <div class="work">
                <img src="images/work-7.jpg">
                <div class="layer">
                    <h3>Catto</h3>
                    <p> Camera Used: Canon EOS 200D Mark II</p>
                </div>
            </div>
            <div class="work">
                <img src="images/work-8.jpg">
                <div class="layer">
                    <h3>skies</h3>
                    <p> Camera Used: Canon EOS 200D Mark II</p>
                </div>
            </div>
            <div class="work">
                <img src="images/work-9.jpg">
                <div class="layer">
                    <h3>black n white</h3>
                    <p> Camera Used: Canon EOS 200D Mark II</p>
                </div>
            </div>
            <div class="work">
                <img src="images/work-10.jpg">
                <div class="layer">
                    <h3>blurry vision</h3>
                    <p> Camera Used: Canon EOS 200D Mark II</p>
                </div>
            </div>
            <div class="work">
                <img src="images/work-11.jpg">
                <div class="layer">
                    <h3>ecopark</h3>
                    <p> Camera Used: Canon EOS 200D Mark II</p>
                </div>
            </div>
            <div class="work">
                <img src="images/work-12.jpg">
                <div class="layer">
                    <h3>water drops</h3>
                    <p> Camera Used: Canon EOS 200D Mark II</p>
                </div>
            </div>
        </div>
        <a href="https://www.behance.net/skyedingle" class="btn">See more</a>
    </div>
</div>
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