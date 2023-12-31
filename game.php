<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

?>


<!doctype html>
<html>

<head>
    <title>Whack-A-Mole</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/hammer2.png">
    <meta httpEquiv="Content-Type" content="text/html" />
    <meta charSet="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>

    <div> <a href="logout.php"><button
                style="width:120px; height:30px; background-color: orangered; border-radius: 5px;">Logout</button></a>
                <!-- <button onclick="showMenu()">Click to Show Menu</button> -->

    </div>
    <form class="modal">


        <div class="welcome" style="color:orangered; text-align:center; font-weight:bolder; ">
            <h1>Welcome
                <?php echo $_SESSION['username'] ?>
            </h1>
        </div>
        <div class="title">
            <h1>Wack-A-Mole</h1>
        </div>
        <div class="select">select difficulty:</div>
        <div class="buttons">
            <button class="e">Easy</button>
            <button class="m">Medium</button>
            <button class="h">Hard</button>
        </div>
        <div></div>
        <div></div>
        <div></div>
    </form>

    <div class="container">
        <div class="view">
            <!-- <div class="title">
                <h1>Wack-A-Mole</h1>
            </div> -->
            <main>
                <div class="hole">
                    <img src="images/hole.png">
                    <div class="mole"></div>
                </div>
                <div class="hole">
                    <img src="images/hole.png">
                    <div class="mole"></div>
                </div>
                <div class="hole">
                    <img src="images/hole.png">
                    <div class="mole"></div>
                </div>
                <div class="hole">
                    <img src="images/hole.png">
                    <div class="mole"></div>
                </div>
                <div class="hole">
                    <img src="images/hole.png">
                    <div class="mole"></div>
                </div>
                <div class="hole">
                    <img src="images/hole.png">
                    <div class="mole"></div>
                </div>
                <div class="hole">
                    <img src="images/hole.png">
                    <div class="mole"></div>
                </div>
                <div class="hole">
                    <img src="images/hole.png">
                    <div class="mole"></div>
                </div>
                <div class="hole">
                    <img src="images/hole.png">
                    <div class="mole"></div>
                </div>
                <span class="side-controls">
                    <div class="side-controls--container">
                        <div class="velocity-level">
                            <img src="images/velocity-mole.svg" alt="velocity">
                            <span class="">2</span>
                        </div>
                        <div class="time-level">
                            <img src="images/timer.svg" alt="timer">
                            <span class="">10</span>
                        </div>
                        <div class="volume-level">
                            <img src="images/volume.svg" alt="volume">
                            <span class="hard"></span>
                        </div>
                    </div>

                </span>
            </main>
            <div class="controls">
                <div class="time">
                    <p>Time</p>
                    <span>-</span>
                </div>
                <div class="score">
                    <p>Score</p>
                    <span>-</span>
                </div>
                <div class="start">START</div>
            </div>
        </div>
    </div>


    <div class="enterName">
        <h2>GAME OVER</h2>
        <h3 #userid>Enter your name!</h3><br>
        <input type="text" value="<?php echo $_SESSION['username'] ?>">
        <h3 class="retry">Retry?</h3><br>
    </div>

    <div class="scoreboard">
        <table class="scores"></table>
    </div>
    <table>
        <tbody>
        </tbody>
    </table>


    <script src="js/script.js"></script>
</body>

</html>