<?php
include("loai.php");
class SanPham
{
    private $id_sp;
    private $loai;
    private $ten_sp;
    private $gia;
    private $ngay_sx;
    private $ngay_het_han;
    private $so_luong;
    private $format_date="d-m-Y";
    public function set_id_sp($id_sp){
        $this->id_sp=$id_sp;
    }
    public function set_loai($loai){
        $this->loai=$loai;
    }
    public function set_ten_sp($ten_sp){
        $this->ten_sp=$ten_sp;
    }
    public function set_gia($gia){
        $this->gia=$gia;
    }
    public function set_ngay_sx($ngay_sx){
        // $this->ngay_sx= date($this->format_date, strtotime($ngay_sx));
        $this->ngay_sx=$ngay_sx;
    }
    public function set_ngay_het_han($ngay_het_han){
        // $this->ngay_het_han= date($this->format_date, strtotime($ngay_het_han));
        $this->ngay_het_han=$ngay_het_han;
    }
    public function set_so_luong($so_luong){
        $this->so_luong=$so_luong;
    }


    public function get_id_sp()
    {
        return $this->id_sp;
    }
    public function get_loai()
    {
        return $this->loai;
    }
    public function get_ten_sp()
    {
        return $this->ten_sp;
    }
    public function get_gia()
    {
        return $this->gia;
    }
    public function get_ngay_sx()
    {
        return $this->ngay_sx;
    }
    public function get_ngay_het_han()
    {
        return $this->ngay_het_han;
    }
    public function get_so_luong()
    {
        return $this->so_luong;
    }

}
?>