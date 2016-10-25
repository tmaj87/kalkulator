<?php $types = array('olej', 'maslo', 'wosk', 'kwas'); ?>
<div id="form_content" class="tab-content form_column">
    <?php foreach ($types as $type) { ?>
        <div role="tabpanel" class="tab-pane fade" id="<?php echo $type; ?>">
            <table class="table table-striped">
                <tbody>
                <?php foreach (Parser::getTabDataFor($type) as $id => $name) { ?>
                    <tr>
                        <td>
                            <input class="form-control" type="number" name="<?php echo $id; ?>" min="1">
                        </td>
                        <td class="text-left">
                            <label for="<?php echo $id; ?>" class="col-form-label"><?php echo $name; ?></label>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
</div>