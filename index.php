<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skye Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/your_kit_code.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="header">
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
</body>
</html>