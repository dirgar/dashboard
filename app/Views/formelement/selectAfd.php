<div class="form-group">
    <label>Select</label>
    <select class="form-control">
        <?php
        foreach ($option as $hsl){
            echo "<option>".$hsl['AFD']."</option>";
        }
        <?
    </select>
</div>