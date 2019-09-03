<!DOCTYPE html>
<html>
<head>
    <title>
        Quản lý thông tin xe gắn máy
    </title>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <div id="menu1">
                <input type="text" name="isearch" id="ipsearch" class="bg-search" placeholder="Tìm kiếm">
                <ul>
                    <li><a href="#" id="icsearch"><img src="../public/icon/baseline_search_white_18dp.png"></a></li>
                    <li>
                        <?php echo '<a href="../controller/xuli.php?action=login" class="ip">Đăng Nhập</a>' ?>
                    </li>
                    <li>
                        <?php echo '<a href="../controller/xuli.php?action=dangxuat" class="ip">Đăng Xuất</a>' ?>
                    </li>
                </ul>
            </div>
            <div id="top1">
                <img src="../public/imges/logo.png" height="170px" width="140px">
            </div>
            <div id="top2">
                <p id="p1"><b>QUẢN LÝ THÔNG TIN XE GẮN MÁY </br> TẠI TP.ĐÀ NẴNG</b></p>
                <p id="p2"><b> BỘ CÔNG AN </b></p>
            </div>
            <div id="top3">
                <img src="../public/imges/1.png" height="165px" width="330px">
            </div>
            <div id="menu2">
                <ul>
                    <li>
                        <li> <?php echo '<a href="../view/trangchu_user.php?action=trangchuUser"><img src="../public/icon/baseline_home_white_18dp.png"></a>' ?></li>
                    </li>
                    <li><a href="./gioithieu.html"><b>GIỚI THIỆU</b></a></li>
                    <li><a href="./tintuc.html"><b>TIN TỨC SỰ KIỆN</b></a></li>
                    <li><a href="./luatgiaothong.html"><b>LUẬT GIAO THÔNG</b></a></li>
                    <li><a href="./thongke_baocao.html"><b>THỐNG KÊ - BÁO CÁO</b></a></li>
                </ul>
            </div>
        </div>
        <div id="maincontent">
            <div id="left">
                <ul>
                    <li>
                        <?php 
                            echo '<a href="../view/viewTTCN_user.php?action=ttcnUser">THÔNG TIN CÁ NHÂN</a>';
                         ?>
                    </li>
                    <li><?php echo '<a href="../controller/xuli.php?action=ttxeUser">XEM THÔNG TIN XE</a>' ?>
                        
                    </li>
                    
                    <li><a href="">ĐỀ THI THỬ</a></li>
                    <li>
                        <?php 
                            echo '<a href="../view/quanlytainan.php?action=">THÔNG TIN TAI NẠN</a>';
                         ?>
                    </li>

                    <li><?php echo '<a href="../view/quanlytaikhoan.php?action=">THÔNG TIN BIÊN BẢN</a>' ?></li>
                    <li>
                        <?php echo '<a href="../controller/xuli.php?action=viewluat">LUẬT GIAO THÔNG</a>' ?>
                    </li>
                    <li>
                        <?php echo '<a href="../controller/xuli.php?action=tintucUser">XEM TIN TỨC</a>' ?>
                    </li>
                    <li>
                        <?php echo '<a href="../controller/xuli.php?action=">THI THỬ LÝ THUYẾT</a>' ?>
                    </li>
                </ul>
            </div>
            <div id="right">
                <div id="content1">
                    <div class="top4">
                        <ul>
                            <li><a href="#"><b>THÔNG TIN CÁ NHÂN</b></a></li>
                        </ul>
                        <form action="../controller/xuli.php" method="post">
                            <input type="hidden" name="action" value="TTCNUser">
                            <input type="submit" name="submit" value="Show">
                        </form>
                        <div class="bottom">
                            <p><small>Mã số bằng lái xe:</small>
                                <?php echo isset($tendangnhap)?$tendangnhap:null; ?>
                            </p>
                            <p><small>Tên chủ xe:</small>
                                 <?php echo isset($tenchuxe)?$tenchuxe:null; ?>
                            </p>
                            <p><small>Địa chỉ:</small>
                                <?php echo isset($diachi)?$diachi:null; ?>
                            </p>
                            <p><small>Số điện thoại:</small>
                                <?php echo isset($sdt)?$sdt:null; ?>
                            </p>
                            <p><small>Giới tính:</small>
                                <?php isset($gioitinh)?$gioitinh:null;
                                    if(!empty($gioitinh)){
                                         if($gioitinh==1){
                                            echo "Nam";
                                        }else{
                                            echo "Nữ";
                                        }
                                    }else{
                                        echo null;
                                       
                                    }
                                ?>
                            </p>
                            <p><small>Ngày sinh:</small>
                                <?php echo isset($ngaysinh)?$ngaysinh:null;
                                   
                                 ?>
                            </p>
                            <p><small>Quốc tịch:</small>
                                <?php isset($quoctich)?$quoctich:null; 
                                    if(!empty($quoctich))
                                    {
                                        switch ($quoctich) 
                                        {
                                        case '1':
                                           echo "Việt Nam";
                                            break;
                                        case '2':
                                           echo "Lào";
                                            break;
                                        case '3':
                                           echo "Campuchia";
                                            break;
                                        }
                                    }
                                    else
                                    {
                                        echo null;
                                       
                                    }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">
            <div id="footer1">
                <img src="../public/imges/logo.png" height="170px" width="140px">
                <p class="p3"><b>CƠ QUAN CÔNG AN</b></p>
                <p class="p3"><b>TP.ĐÀ NẴNG</b></p>
            </div>
            <div id="footer2">
                <div id="footer2_menu1">
                    <div class="footer2_menu1">
                        <ul>
                            <li><a href="./trangchu.html">Trang Chủ</a></li>
                            <li><a href="./trangchu.html">Chỉnh Sửa Thông Tin</a></li>
                            <li><a href="./trangchu.html">Liên Hệ</a></li>
                            <li><a href="./trangchu.html">Tin Tức Liên Quan</a></li>
                        </ul>
                    </div>
                </div>
                <div id="footer_top">
                        <p class="p" id="p4">Giấy phép xuất bản số: 68/GP-TTĐT do Bộ Công An & Giao Thông Vận Tải cấp ngày 19-2-2019.</p>
                        <p class="p" id="p5">Bản quyền thuộc về Công An TP Đà Nẵng.</p>
                        <p class="p" id="p6"><b>Không được sao chép thông tin website này dưới bất kỳ hình thức nào khi chưa được sự đồng ý chính thức bằng văn bản của Công An TP Đà Nẵng.</b></p>
                </div>
                <div id="footer_main">
                    <span id="WorkPlace">
                        <div>
                            <strong>Cơ quan của Công an TP Đà Nẵng</strong>
                        </div>
                        <div>62 Phan Châu Trinh - TP Đà Nẵng - Tel: 0236&nbsp;3822626 &nbsp;* &nbsp;3824892 &nbsp;* &nbsp;3810492 - Fax :&nbsp;0236&nbsp;3824892 &nbsp;* &nbsp;3822795   <b>Email:</b> atgtcadn@gmail.com</div>
                        <div><b>VPĐD tại Quảng Nam:</b> 30B- Hùng Vương, TP Tam Kỳ- ĐT: 0235&nbsp;2221777&nbsp;</div>
                        <div><b>VPĐD tại TPHCM:</b> 40C5- Chu Văn An, Q. Bình Thạnh - ĐT: 0283 35113075</div>
                        <div><b>VPĐD tại Tây Nguyên:</b> Đường Hoàng Đạo Thúy- Tổ 15, P.Tây Sơn, TP Pleiku, Gia Lai - ĐT, FAX: 0968 707090</div>
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>