<?php if (!empty($form_data)) { ?>
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
                        <td><?php echo $row['percent']; ?>%</td>
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
                    <th><?php echo Parser::getBase(); ?> (g)</th>
                    <th>Zmydlenie (%)</th>
                </tr>
                <?php foreach ($calculator->saponificationChart() as $percent => $gram) { ?>
                    <tr>
                        <td><?php echo $gram; ?>g</td>
                        <td><?php echo $percent; ?>%</td>
                    </tr>
                <?php } ?>
            </table>
            <h4>Całkowita masa mydła to ok. <b><?php echo $calculator->totalMass(); ?>g</b></h4>
        </div>
    </div>
<?php } ?>