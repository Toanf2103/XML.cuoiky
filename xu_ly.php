<?php

include "model/san_pham.php";

function checkLogin($email,$pass){
    global $conn;
    $sql ="SELECT * 
            FROM user
             WHERE email='{$email}' and pass ='{$pass}'";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
            // $row['quoc_gia'] = getByID($row['quoc_gia']);
            if( $row['pass']==$pass ){
                return $row['id_user'];
            }
    }
    $conn->close();
    return false;
}

function getAllSp($timkiem,$loai,$trang) {
        
        if($timkiem){
            $timkiem= "and ten_sp like '%{$timkiem}%' ";
        }
        if($loai){
            $loai= "and loai.id_loai = '{$loai}' ";
        }
        if($trang){
            $trang=$trang*20-20;
            $trang=" LIMIT {$trang}, 20";
        }
        global $conn;
        $list_sp=[];
        $sql = "SELECT * 
            FROM san_pham,loai             
            WHERE san_pham.id_loai = loai.id_loai {$loai} {$timkiem} 
            ORDER BY san_pham.id_sp desc {$trang}
            ";
            
        $result = $conn->query($sql);

        
        if ($result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {
                // $row['quoc_gia'] = getByID($row['quoc_gia']);
                
                $sp = new SanPham();
                $l = new loai();
                $sp->set_id_sp($row['id_sp']);  
                $l->set_id_loai($row['id_loai']);
                $l->set_ten_loai($row['ten_loai']);
                $sp->set_loai($l); 
                $sp->set_ten_sp($row['ten_sp']); 
                $sp->set_so_luong($row['so_luong']); 
                $sp->set_ngay_sx($row['ngay_sx']); 
                $sp->set_ngay_het_han($row['ngay_het_han']); 
                $sp->set_gia($row['gia']); 
                $list_sp[]=$sp;
            }
        }
        $conn->close();
        
        return $list_sp;        
}





function getAllLoai(){
    global $conn;
        
        $sql = "SELECT *  
            FROM loai";
            
        $result = $conn->query($sql);
        $list=[];
        if ($result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {
                // $row['quoc_gia'] = getByID($row['quoc_gia']);
                
                
                $l = new loai();
                 
                $l->set_id_loai($row['id_loai']);
                $l->set_ten_loai($row['ten_loai']);
                
                $list[]=$l;
            }
        }
        
    return $list;
}

function deleteSp($id_sp){
    global $conn;
    $sql = " DELETE from san_pham 
                WHERE id_sp={$id_sp}";
    $result=$conn->query($sql);
    if($result===true){
        $conn->close();
        return true;
    }
    $conn->close();
    return false;
}
function deleteLoai($id_loai){
    global $conn;
    $sql = " DELETE from loai 
                WHERE id_loai={$id_loai}";
    $result=$conn->query($sql);
    if($result===true){
        $conn->close();
        return true;
    }
    $conn->close();
    return false;
}

function addSp($sp){
    global $conn;
    $sql = "INSERT INTO san_pham 
    VALUES  (null,'{$sp->id_loai}'
            ,'{$sp->ten}'
            ,'{$sp->so_luong}'
            ,'{$sp->ngay_sx}'
            ,'{$sp->ngay_het_han}'
            ,'{$sp->gia}')";
    
    $result=$conn->query($sql);

    if($result!=null){
        $conn->close();
        return true;
    }
    
    $conn->close();
    return false;
}

function addLoai($l){
    global $conn;
    $sql = "INSERT INTO loai 
    VALUES  (null,'{$l}'
            )";
    
    $result=$conn->query($sql);
    if($result!=null){
        
        return true;
    }
    $conn->close();
    
    return false;
}

function updateSp($sp){
    global $conn;
    
    $sql=" UPDATE san_pham set id_loai = '{$sp->id_loai}',
                                ten_sp ='{$sp->ten}',
                                so_luong='{$sp->so_luong}',
                                ngay_sx='{$sp->ngay_sx}',
                                ngay_het_han='{$sp->ngay_het_han}',
                                gia='{$sp->gia}'  
    WHERE id_sp={$sp->id_sp}
     ";
    
    $result=$conn->query($sql);
    if($result!=null){
        $conn->close();
        return true;
    }
    $conn->close();
    return false;
    
}

function getSoTrang($timkiem,$loai){
    global $conn;
    if($timkiem){
        $timkiem= "and ten_sp like '%{$timkiem}%' ";
    }
    if($loai){
        $loai= "and loai.id_loai = '{$loai}' ";
    }
    $list_sp=[];
    $sql = "SELECT COUNT(*)  as trang 
        FROM san_pham,loai             
        WHERE san_pham.id_loai = loai.id_loai {$loai} {$timkiem} 
        ORDER BY san_pham.id_sp desc 
        ";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
            
        while ($row = $result->fetch_assoc()) {
            // $row['quoc_gia'] = getByID($row['quoc_gia']);
            
            return ceil($row['trang']/20);
    }
    $conn->close();
    return false;
    }
}

function xuatXMLSp(){
    global $conn;
    $sql = 'SELECT * 
            FROM san_pham,loai 
            WHERE san_pham.id_loai=loai.id_loai
            ORDER BY san_pham.id_sp
            ';
    
    $conn->query(" set names 'utf8' ");
    $result = $conn->query($sql);

    $str = "<?xml version='1.0' encoding='utf-8'?>";
    $str = "<dct>";
    while($row = $result->fetch_assoc()){
        $ten=str_replace("'s","",$row['ten_sp']);
        $ten=str_replace("&"," ",$ten);
        $str .= "<sanpham masp='{$row['id_sp']}' ten='{$ten}' 
                loai='{$row['ten_loai']}' ngaysx='{$row['ngay_sx']}' 
                handung='{$row['ngay_het_han']}' 
                soluong='{$row['so_luong']}' gia='{$row['gia']}' />";

    }
    $str .= "</dct>";

    $path = "XML/sanpham.xml";
    $f = fopen($path,"w");
    fwrite($f,$str);
    fclose($f);
    $conn->close();
    
    //Diều hướng tới file xml
    header("location:{$path}");
}

function xuatXMLLoai(){
    global $conn;
    $sql = 'SELECT * 
            FROM loai 
            ';
    
    $conn->query(" set names 'utf8' ");
    $result = $conn->query($sql);

    $str = "<?xml version='1.0' encoding='utf-8'?>";
    $str = "<dct>";
    while($row = $result->fetch_assoc()){
        
        $str .= "<loai maloai='{$row['id_loai']}' tenloai='{$row['ten_loai']}' />";

    }
    $str .= "</dct>";

    $path = "XML/loai.xml";
    $f = fopen($path,"w");
    fwrite($f,$str);
    fclose($f);
    $conn->close();
    
    header("location:{$path}");
}

?> 