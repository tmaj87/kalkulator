<form id="form" action="#" method="post" class="form-inline text-center">

    <?php Draw::BaseButtons(); ?>
    <?php Draw::Tabs(); ?>

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