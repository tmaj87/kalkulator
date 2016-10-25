<div id="form_content" class="tab-content form_column">
    <div role="tabpanel" class="tab-pane fade" id="oleje">
        <table class="table table-striped">
            <tbody>

            <?php foreach (Parser::getDatabase() as $record) {
                $id = Parser::getIdFor($record['nazwa']);
                ?>

                <tr class="form_block <?php echo $record['typ']; ?>
                    <?php echo $isActive ? '' : ' style="display: none;"'; ?>">

                    <td>
                        <input class="form-control"
                               type="number"
                               style="width: 90px"
                               name="<?php echo $id; ?>" min="1"
                               value="<?php echo $form_data[$id]['gram']; ?>"/>
                    </td>

                    <td class="text-left">
                        <label for="<?php echo $id; ?>" class="col-form-label"><?php echo $record['nazwa']; ?></label>
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