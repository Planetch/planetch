<?php
function isMobile() {
    $ua = $_SERVER['HTTP_USER_AGENT'];
    if((strpos($ua,'iPhone')!==false)||(strpos($ua,'iPod')!==false)||(strpos($ua,'Android')!==false)) {
        return true;
    }
    else return false;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Planetch</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <?php if (isMobile() === true){?>
            <link rel="stylesheet" type="text/css" href="./mobile.css" />
        <?php } else { ?>
            <link rel="stylesheet" type="text/css" href="./style.css" />
        <?php }?>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Planetch</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#">Features</a>
            <a class="nav-item nav-link" href="#">Pricing</a>
            <a class="nav-item nav-link disabled" href="#">Disabled</a>
            </div>
        </div>
        </nav>
        <div id="contents">
            <img src="./top.jpg"/>
            <h1>育てよう、地球を。</h1>
            <a class="btn btn-light" href="game.php">Play</a>
        </div>
    </body>
</html>
