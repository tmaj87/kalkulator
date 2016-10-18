<?php require_once('init.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kalkulator Zmydlania</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
    <link href="kalkulator.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-static-top navbar-inverse">
    <div class="container-fluid">
        <a class="navbar-brand" href="?">Kalkulator Zmydlania</a>
        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item">
                <a class="nav-link" href="#">Instrukcja</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <p>1. Wybierz zasadę</p>
            <p>2. Wybierz procent zmydlenia*</p>
            <p>3. ...</p>
            <p>4. PROFIT</p>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <?php Draw::Tables(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <?php Draw::Form(); ?>
        </div>
    </div>
</div>

<script type="text/javascript" src="//code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="kalkulator.js"></script>

</body>
</html>
