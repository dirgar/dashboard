<div class="form-group">
    <label>Select</label>
        <select class="form-control">
            <?php
                $afd = $this->listAfd(); 
                foreach ($afd as $hsl): ?>
                <option><?= $hsl['AFD'] ?></option>
            <?php endforeach ?>
        </select>
</div>
