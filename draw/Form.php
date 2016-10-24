<form id="form" action="#" method="post" class="form-inline text-center">
    <button type="button" class="btn btn-default" <?php echo Parser::getBase() == 'NaOH' ? 'checked="checked"' : ''; ?>
            value="NaOH"
            name="base">NaOH
    </button>
    <button type="button" class="btn btn-default" <?php echo Parser::getBase() == 'KOH' ? 'checked="checked"' : ''; ?>
            value="KOH"
            name="base">KOH
    </button>

    <p>Niezmydlonych olejów <input type="number">%</p>

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
    <?php foreach (Parser::getDatabase() as $record) {
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