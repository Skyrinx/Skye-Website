<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
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

    <div id="about">
        <div class="container">
            <div class="row">
                <div class="about-col-1">
                    <img src="images/pfp3.jpg">
                </div>
                <div class="about-col-2">
                    <h1 class="sub-title">About Me</h1>
                    <p>I am Skye Dingle, a former media arts student who is currently an IT student. My skills in the arts are self-taught and
                         the product of a curious mind. Right now, I'm into graphic design and photography since I rarely make films because of
                          college. I was in 8th grade when I discovered that I had a passion for photography, and since then, I always take
                           pictures whenever I go out.
                         </p>
    
                    <div class="tab-titles">
                        <p class="tab-links active-link" onclick="opentab('skills')">Skills</p>
                        <p class="tab-links" onclick="opentab('experience')">Experience</p>
                        <p class="tab-links" onclick="opentab('education')">Education</p>
                    </div>
                    <div class="tab-contents active-tab" id="skills">
                        <ul>
                            <li><span>Photography</span></li>
                            <li><span>Film making</span></li>
                            <li><span>DoP/Director of Photography</span></li>
                            <li><span>Graphics Designing</span></li>
                        </ul>
                    </div>
                    <div class="tab-contents" id="experience">
                        <ul>
                            <li><span>2021 - 2022</span><br>Immersion at wazzup.ph production</li>
                            <li><span>2021 - 2022</span><br>Graphics Designer at Twist TV</li>
                        </ul>
                    </div>
                    
                    <div class="tab-contents" id="education">
                        <ul>
                            <li><span>Senior High School</span><br>Eugenio M. Lopez jr. Center for Media Arts SHS</li>
                            <li><span>College</span><br>BS Information Technology - MI at National University Fairview</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</body>
<script>
    var tablinks = document.getElementsByClassName("tab-links");
    var tabcontents = document.getElementsByClassName("tab-contents");

    function opentab(tabname){
        for(tablink of tablinks){
            tablink.classList.remove("active-link");
        }
        for(tabcontent of tabcontents){
            tabcontent.classList.remove("active-tab");
        }
        event.currentTarget.classList.add("active-link");
        document.getElementById(tabname).classList.add("active-tab")
    }
</script>
<script>

    var sidemenu = document.getElementById("sidemenu");

    function openmenu(){
        sidemenu.style.right = "0";
    }
    function closemenu(){
        sidemenu.style.right = "-200px";
    }
</script>

</html>