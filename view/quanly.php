<?php  
 include('head.php');
?>
<?php 


$list=getAllLoai();
$trang=getSoTrang("","");
?>
<body class="animsition" onload='start()'>
    
    <div class="page-wrapper">
        

        <!-- MENU SIDEBAR-->
       <?php 
            include('navbar.php');
       ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include('header.php') ?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
            <div class="container relative">
                <div id="add_loai" class="absolute none">
                    <div class="alertThem">
                        <p>Thêm Loại</p>
                        <input id="data-add-loai" type="text">
                        <button onclick="cancelAddLoai()">Hủy</button>
                        <button onclick="addLoai()">Thêm</button>              
                    </div>             
                </div>  
                <div id="xoa_sp" class="absolute none">
                    <div class="alertThem">
                        <p>Xác nhận xóa</p>
                        <button onclick="cancelXoa()">Hủy</button>
                        <button onclick="deleteSp()">Xóa</button>              
                    </div>             
                </div>  
              
              
                <div id="alert" class="alert none">

                    <span class="closebtn" onclick="unAlert()">&times;</span> 
                    <strong>Danger!</strong> <i>Indicates a dangerous or potentially negative action.</i> 
                </div>
                
                <div class="row">
                    <div class="row-timkiem">
                        <div class="flex">
                          <?php include("trang.php") ?>
                          <?php include("boloc.php") ?>
                          
                        </div>
                        
                        <div class="col-md-12">
                            <button onclick="showDiaLogAddLoai()" class="btn btn-default pull-right add-row ishover"><i class="fa fa-plus"></i>&nbsp;&nbsp; Thêm loại</button>
                        </div>
                        <div class="col-md">
                        
                            <button onclick="addSp()" class="btn btn-default pull-right add-row ishover"><i class="fa fa-plus"></i>&nbsp;&nbsp; Thêm sản phẩm</button>
                        </div>
                              
                    </div>
                  
                </div>
              
                <div class="row">
                  
                  <div class="col-md-12">
                    <table class="table table-bordered" id="editableTable">
                      <thead>
                        <tr>
                          <th>Tên</th>
                          <th>Loại</th>
                          <th>Ngày sản xuất</th>
                          <th>Ngày hết hạn</th>
                          <th>Số lượng</th>
                          <th>Giá</th>
                          <th>Sửa</th>
                        </tr>
                      </thead>
                      <tbody id='dulieu'>
                                             
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
        </div>
        
        
        

    </div>
    
    
    
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>
    <!-- Main JS-->
    <script src="js/main.js"></script>
    <script src="js/table.js"></script>
    <script  src="js/script.js"></script>
    
    
</body>


</html>
<!-- end document-->
