<div class="buttons row">
    <div class="col-md-4 col-md-offset-1 ">
        <input type="button" class="btn btn-primary"
               name="base"
               value="NaOH">
        <input type="button" class="btn"
               name="base"
               value="KOH">
    </div>
</div>

<div class="row percent">
    <div class="col-md-offset-4 col-md-7">
        <label for="percent">Niezmydlonych olejów</label>
        <input type="number" value="<?php echo Parser::getPostSanitizeString('percent'); ?>" name="percent"
               class="form-control" min="0" max="10">%
    </div>
</div>
