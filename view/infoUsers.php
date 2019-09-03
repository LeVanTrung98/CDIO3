<!DOCTYPE html>
<html>
<head>
    <title>
        Quản lý tài sản
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
                        <?php echo '<a href="../view/trangchu_root.php?action=trangchu"><img src="../public/icon/baseline_home_white_18dp.png"></a>' ?>
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
                   <li> <?php 
                            echo '<a href="../view/quanlytainan.php?action=traodoi">QUẢN LÝ TRAO ĐỔI XE</a>';
                         ?></li>
                    <li><a href="#">QUẢN LÝ XE</a></li>
                    <li>
                        <?php echo '<a href="../controller/xuli.php?action=dangkyxe">ĐĂNG KÝ XE</a>' ?>
                    </li>
                    <li><?php echo '<a href="../view/quydinhgiaothong.php?action=quydinhgiaothong">QUY ĐỊNH GIAO THÔNG</a>' ?>
                    </li>
                    <li><a href="#">ĐỀ THI THỬ</a></li>
                     <li>
                        <?php 
                            echo '<a href="../view/quanlytainan.php?action=tainan">QUẢN LÝ TAI NẠN</a>';
                         ?>
                    </li>
                    
                    <li><?php echo '<a href="../view/quanlytaikhoan.php?action=taikhoan">QUẢN LÝ TÀI KHOẢN</a>' ?>
                        
                    </li>
                     <li>
                        <?php echo '<a href="../controller/xuli.php?action=thongtincanhan1">THÔNG TIN CÁ NHÂN</a>' ?>
                    </li>
                </ul>
            </div>
            <div id="right">
                <div id="content1_gioithieu">
                    <div class="top1_gioithieu">
                        <ul>
                            <li><a href="./quanlytaikhoan.html"><b>QUẢN LÝ THÔNG TIN</b></a></li>
                        </ul>
                    </div>
                    
                    <form class="form-qltainan" action="../controller/xuli.php" method="POST">
                        <input type="hidden" name="action" value="infoUsers">
                        <p><?php echo isset($errTCX)?$errTCX:null; ?></p>
                        <input type="text" class="ip-qltainan" name="tenchuxe" placeholder="Tên chủ xe...">
                        <p><?php echo isset($errD)?$errD:null; ?></p>
                        <input type="text" class="ip-qltainan" name="diachi" placeholder="Địa chỉ...">
                        <p><?php echo isset($errS)?$errS:null; ?></p>
                        <input type="number" class="ip-qltainan" name="sodienthoai" placeholder="Số điện thoại">
                        <p><?php echo isset($errG)?$errG:null; ?></p>
                        <div class="radio">
                            <input type="radio" name="gioitinh" value="1" >
                            <label for="">Nam</label>
                            <input type="radio" name="gioitinh" value="2">
                            <label for="">Nữ</label> 
                        </div>
                        <p><?php echo isset($errN)?$errN:null; ?></p>
                        <input type="date"  class="ip-qltainan" name="ngaysinh" placeholder="Ngày sinh...">
                        <p><?php echo isset($errQ)?$errQ:null; ?></p>
                        <select name="quoctich" id=""  class="radio">
                            <option value="1">viet nam</option>
                            <option value="2">lao</option>
                            <option value="3">campuchia</option>
                        </select>
                        <input type="submit" class="ip-submit" name="submit" value="Submit">
                        <input type="submit" class="ip-submit" name="update" value="Update">
                        <input type="submit" class="ip-submit" name="delete" value="Delete">
                    </form>
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