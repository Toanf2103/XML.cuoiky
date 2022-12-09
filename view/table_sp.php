<?php 

function addRow($list){
    foreach($list as $item){
            echo    "<tr data-id='{$item->get_id_sp()}' class='edit'  >
                        <td data-field='text'>{$item->get_ten_sp()}</td>
                        <td data-field='type'>{$item->get_loai()->get_ten_loai()}</td>
                        <input type='hidden' value='{$item->get_loai()->get_id_loai()}' name='id_loai'>
                        <td data-field='date'>{$item->get_ngay_sx()}</td>
                        <td data-field='date'>{$item->get_ngay_het_han()}</td>
                        <td data-field='number'>{$item->get_so_luong()}</td>
                        <td data-field='number'>{$item->get_gia()}</td>
                        <td>
                        <a class='button button-small' title='Edit' onclick='editClick({$item->get_id_sp()})'>
                            <i class='fa fa-pencil-square-o'></i>
                        </a> 
                        <a class='button button-small' title='Delete' onclick='alertXoa({$item->get_id_sp()})'>
                            <i class='fa fa-trash' ></i>
                        </a>
                        </td>
                    </tr>";
    }
}


function addSoTrang($trang){
    for($i=1;$i++;$i<=$trang){
           
        echo "<option  value='{$i}'>{$i}</option>";
    }
}
function addAllLoai($list,$value){
    foreach($list as $item){
        $txt='';
        if($item->get_ten_loai()==$value){
            $txt='selected';
        }
        echo "<option {$txt} value='{$item->get_id_loai()}'>{$item->get_ten_loai()}</option>";
    }
}
?>