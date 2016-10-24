<?php require_once('init.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kalkulator Zmydlania</title>
    <!--    <link href="offline/bootstrap.min.css" rel="stylesheet">-->
    <!--    <script src="offline/jquery-3.1.1.min.js"></script>-->
    <!--    <script src="offline/bootstrap.min.js"></script>-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <link href="kalkulator.css" rel="stylesheet">
    <script type="text/javascript" src="kalkulator.js"></script>
</head>
<body>

<nav class="navbar navbar-static-top navbar-inverse">
    <div class="container-fluid">
        <p class="navbar-header">
            <a class="navbar-brand" href="#" data-container="body" data-html="true" data-toggle="popover"
               data-placement="bottom"
               data-content="<ul class=instr><h4>Instrukcja obsługi</h4>
    <li>Wybierz rodzaj zasady</li>
    <li>Wskaż oczekiwaną ilość niezmydlonych tłuszczów (zaleca się 5-9%)</li>
    <li>Podaj (w gramach) ilość składników (olejów, maseł...)</li>
    <li>Kliknij &quot;przelicz&quot;</li>
    </ul>
        " data-trigger="focus">Instrukcja <span
                    class="glyphicon glyphicon-hand-down"
                    aria-hidden="true"></span></a>
        <h3 class="navbar-text navbar-right">
            Kalkulator Zmydlania
        </h3>
    </div>
</nav>


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
</body>
</html>
