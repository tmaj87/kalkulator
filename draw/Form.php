<form id="form" action="#" method="post" class="form-inline text-center">


    <div class="row">
        <div class="buttons col-md-4 col-md-offset-1">
            <div class="btn-group btn-group-justified" role="group">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-primary btn-lg"
                            name="base">NaOH
                    </button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-lg"
                            name="base">KOH
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1">Niezmydlonych olejów</span>
                <input type="number" class="form-control" placeholder="%" min="0" max="10">
            </div>
        </div>
    </div>


    <h4>
        <ul id="form_tabs" class="nav nav-tabs">
            <li><a data-typ="olej" href="#">Oleje</a></li>
            <li><a href="#" data-typ="masło">Masła</a></li>
            <li><a href="#" data-typ="wosk">Woski</a></li>
            <li><a href="#" data-typ="kwas">Kwasy</a></li>
            <li>
                <button type="button" class="btn btn-block btn-success btn-outline btn-lg">Przelicz</button>
            </li>
        </ul>
    </h4>


    <table class="table table-striped">
        <tbody>
        <?php foreach (Parser::getDatabase() as $record) {
            $id = Parser::getIdFor($record['nazwa']);
            $isActive = !empty($form_data[$id]['gram']);
            ?>

            <tr class="form_block <?php echo $record['typ']; ?>
                    <?php echo $isActive ? '' : ' style="display: none;"'; ?>">

                <td>
                    <label for="<?php echo $id; ?>"
                           class="col-lg-2 col-form-label"><?php echo $record['nazwa']; ?></label>
                </td>
                <td>
                    <input class="form-control col-lg-2 <?php echo $isActive ? ' focus' : ''; ?>"
                           type="number"
                           style="width: 90px"
                           name="<?php echo $id; ?>" min="1"
                           value="<?php echo $form_data[$id]['gram']; ?>"/>
                    <label for="<?php echo $id; ?>" class="control-label text-right">
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</form>