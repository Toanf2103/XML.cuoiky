<div class="flex trang">
    <span>Trang</span>
    <select name="" id="data-trang" onchange="getAll()">
        <?php
            for ($i = 1; $i <= $trang; $i++) {
                echo "<option value='{$i}'>{$i}</option>";
                
            }
        ?>
    </select>
</div>