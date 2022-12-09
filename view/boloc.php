<div class="boloc">
    <span>Loại</span>

    <select name="" id="data-filter" onchange="getAll()">
        <option value="" selected="true">Tất cả</option>  
        <?php
            foreach($list as $item){
                echo "<option value='{$item->get_id_loai()}'>{$item->get_ten_loai()}</option>";
            }
        ?>
    </select>
    <div>
    
</div>
</div>
