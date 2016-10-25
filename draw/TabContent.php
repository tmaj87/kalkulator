<div id="new_look" class="tab-content form_column">
    <div role="tabpanel" class="tab-pane fade" id="oleje">
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
    </div>
    <div role="tabpanel" class="tab-pane fade" id="maslo"></div>
    <div role="tabpanel" class="tab-pane fade" id="wosk"></div>
    <div role="tabpanel" class="tab-pane fade" id="kwas"></div>
</div>