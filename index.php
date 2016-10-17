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
            <p>3. </p>
        </div>
    </div>
</div>

<div class="container-fluid">
    <? if (!empty($form_data)) { ?>
        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                <table id="oleje" class="table table-hover">
                    <tr>
                        <th>Tłuszcz</th>
                        <th>Waga (g)</th>
                        <th>Udział (%)</th>
                    </tr>
                    <?php foreach ($calculator->oilTable() as $key => $row) { ?>
                        <tr>
                            <td><?php echo $form_data[$key]['nazwa']; ?></td>
                            <td><?php echo $row['gram']; ?>g</td>
                            <td><?php echo $row['udzial']; ?>%</td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td></td>
                        <td><b><?php echo $calculator->oilSum(); ?>g</b></td>
                        <td></td>
                    </tr>
                </table>
                <h4>Należy również dodać <b><?php echo $calculator->requiredWater(); ?>g</b> wody.</h4>
                <p>inci: <?php echo $calculator->inci(); ?></p>
            </div>

            <div class="col-md-4">
                <table id="zasada" class="table table-hover">
                    <tr>
                        <th><?php echo Parser::getAlkali(); ?> (g)</th>
                        <th>Zmydlenie (%)</th>
                    </tr>
                    <?php foreach ($calculator->saponificationChart() as $percent => $alkali) { ?>
                        <tr>
                            <td><?php echo $alkali['gram']; ?>g</td>
                            <td><?php echo $percent; ?>%</td>
                        </tr>
                    <?php } ?>
                </table>
                <h4>Całkowita masa mydła to ok. <b><?php echo $calculator->totalMass(); ?>g</b></h4>
            </div>
        </div>
    <?php } ?>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form action="#" method="post" class="form-inline text-center">
                <input type="radio" <?php echo Parser::getAlkali() == 'NaOH' ? 'checked="checked"' : ''; ?> value="NaOH"
                       name="alkali"> NaOH
                <input type="radio" <?php echo Parser::getAlkali() == 'KOH' ? 'checked="checked"' : ''; ?> value="KOH"
                       name="alkali"> KOH
                <h4>
                    Wybierz kategorię, wpisz gramaturę <span class="glyphicon glyphicon-hand-down"
                                                             aria-hidden="true"></span> i
                    <button type="submit" class="btn btn-info navbar-btn">Przelicz</button>
                    <ul id="form_tabs" class="nav nav-tabs">
                        <li><a data-typ="olej" href="#">Oleje</a></li>
                        <li><a href="#" data-typ="masło">Masła</a></li>
                        <li><a href="#" data-typ="wosk">Woski</a></li>
                        <li><a href="#" data-typ="kwas">Kwasy</a></li>
                    </ul>
                </h4>
                <?php foreach ($database as $record) {
                    $id = Parser::getIdFor($record['nazwa']);
                    $isActive = !empty($form_data[$id]['gram']);
                    ?>
                    <div class="form_block form-group <?php echo $record['typ']; ?>"
                        <?php echo $isActive ? '' : ' style="display: none;"'; ?>
                    >
                        <label for="<?php echo $id; ?>" class="control-label text-right">
                            <?php echo $record['nazwa']; ?>
                        </label>
                        <input class="form-control <?php echo $isActive ? ' focus' : ''; ?>"
                               type="number"
                               style="width: 90px"
                               name="<?php echo $id; ?>" min="1"
                               value="<?php echo $form_data[$id]['gram']; ?>"/>
                    </div>
                <?php } ?>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="//code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="kalkulator.js"></script>

</body>
</html>
