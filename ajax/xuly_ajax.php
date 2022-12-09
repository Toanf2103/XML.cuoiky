<?php
include("../view/table_sp.php");
include("../xu_ly.php");
include("../connect.php");
    $action = isset($_REQUEST['act']) ? $_REQUEST['act'] : '';
    switch ($action) {
        case 'getAll':
            $timkiem="";
            $loai="";
            $trang="";
            if(isset($_REQUEST['timkiem'])){
                $timkiem=$_REQUEST['timkiem'];
            }
            if(isset($_REQUEST['boloc'])){
                $loai=$_REQUEST['boloc'];
            }
            if(isset($_REQUEST['trang'])){
                $trang=$_REQUEST['trang'];
            }
            
            $list=getAllSp($timkiem,$loai,$trang);
            addRow($list);
            break;
        case 'test':

            $sp= json_decode($_REQUEST['value']);
            echo $sp->gia;
            break;
        case 'getLoai':
            $value='';
            if(isset($_REQUEST['value'])){
                $value=$_REQUEST['value'];
            }
            $list=getAllLoai();
            addAllLoai($list,$value);
            break;
        case 'getTrang':
            $timkiem="";
            $loai="";
            
            if(isset($_REQUEST['timkiem'])){
                $timkiem=$_REQUEST['timkiem'];
            }
            if(isset($_REQUEST['boloc'])){
                $loai=$_REQUEST['boloc'];
            }
            $list=getSoTrang($timkiem,$loai);
            addSoTrang($list);
            break;

        case 'addSp':
            $sp=json_decode($_REQUEST['sp']);
            $check=addSp($sp);
            echo $check;
            break;
        case 'updateSp':
            $sp=json_decode($_REQUEST['sp']);
            $check=updateSp($sp);
            echo $check;
            break;
        case 'deleteSp':
            $id_sp=$_REQUEST['id_sp'];
            $check=deleteSp($id_sp);
            echo $check;
            break;
        case 'addLoai':
            $ten_loai=$_REQUEST['ten_loai'];
            
            $check=addLoai($ten_loai);
            if($check){
                $list=getAllLoai();
                foreach($list as $item){
                    echo "<option value='{$item->get_id_loai()}'>{$item->get_ten_loai()}</option>";
                }
                
            }
            
            break;
       
    
    }
?>