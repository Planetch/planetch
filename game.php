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
        <a class="navbar-brand" href="index.php">Planetch</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            </div>
        </div>
        </nav>
        <div class="container">
            <div class="row">
                <?php if (isMobile() !== true){?>
                    <div class="col-sm">
                        <button type="button" class="btn btn-success" onclick="putAddBtn()">木を植える</button>
                    </div>
                <?php }?>
                <div class="col-sm">
                    <p id="year">現在</p>
                    <div class="progress">
                        <div id = "bar" class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="10"></div>
                    </div>
                    <?php if (isMobile() === true){?>
                        <canvas id="canvas" width="300" height="300"></canvas>
                    <?php } else { ?>
                        <canvas id="canvas" width="600" height="600"></canvas>
                    <?php }?>
                </div>
                <div class="col-sm">
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">GAME OVER</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        再チャレンジしますか?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                        <button type="button" class="btn btn-primary" onclick="window.location.reload(true)">YES</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <?php if (isMobile() === true){?>
            <script src="./application_mobile.js"></script>
        <?php } else { ?>
            <script src="./application.js"></script>
        <?php }?>
    </body>
</html>
