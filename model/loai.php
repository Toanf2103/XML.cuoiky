<?php
class loai
{
    private $id_loai;
    private $ten_loai;
    public function set_id_loai($id_loai){
        $this->id_loai=$id_loai;
    }
    public function set_ten_loai($ten_loai){
        $this->ten_loai=$ten_loai;
    }

    public function get_id_loai()
    {
        return $this->id_loai;
    }
    
    public function get_ten_loai()
    {
        return $this->ten_loai;
    }
} 


?>