<div class="row">
    <div class="col-md-4 col-md-offset-2">
        <table id="oleje" class="table table-hover">
            <tr>
                <th style="width: 50%"></th>
                <th>Waga (g)</th>
                <th>Udział (%)</th>
            </tr>
            <?php foreach ($calculator->oilTable() as $key => $row) { ?>
                <tr>
                    <td><?php echo $row['typ'] . ' ' . $form_data[$key]['nazwa']; ?></td>
                    <td><?php echo $row['gram']; ?>g</td>
                    <td><?php echo $row['percent']; ?>%</td>
                </tr>
            <?php } ?>
            <tr>
                <td></td>
                <td><b><?php echo $calculator->oilSum(); ?>g</b></td>
                <td></td>
            </tr>
        </table>

        <p>inci: <?php echo $calculator->inci(); ?></p>

    </div>

    <div class="col-md-6" style="font-size: 1.4em;">
        <p>
            Należy również dodać <b><?php echo $calculator->requiredBase(); ?></b>
            gramów <?php echo Parser::getPostSanitizeString('base'); ?>
        </p>

        <p>
            Rozposzczonych w <b><?php echo $calculator->requiredWater(); ?></b> gramach wody
        </p>

        <p>
            Całkowita masa otrzymanego mydła
            <b><?php echo $calculator->totalMass(); ?></b> gram
        </p>


    </div>
</div>