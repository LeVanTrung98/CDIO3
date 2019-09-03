<?php 
	namespace Model;
	use PDO;
	require_once 'connection.php';
	use Model\Connect;

	class Connect_db{
		private $connect;

		public function getConnect(){
			return $this->connect;
		}
		public function __construct(){
			$this->connect = Connect::cn();
		}

	}

	class LoiViPham extends Connect_db{
		private $id;
		private $mess;
		public function getID(){
			return $this->id;
		}
		public function setID($value){
			$this->id = $value;
		}

		public function getMess(){
			return $this->mess;
		}

		public function Check($value){
			$smt = Connect_db::getConnect()->prepare('SELECT * from loivipham where mavipham = :id');
			$smt->bindParam('id',$value);
			 $smt->execute();
			$loivi =$smt->fetch();
			$smt->closeCursor();
			return $this->mess=$loivi;
		}
		public function ShowAll(){
			$smt = Connect_db::getConnect()->prepare('SELECT * from loivipham');
			$smt->execute();
			$loivipham = $smt->fetchAll();
			$smt->closeCursor();
			return $this->mess=$loivipham;
		}

		public function Insert($value1, $value2,$value3,$value4){
			$smt = parent::getConnect()->prepare("INSERT INTO loivipham(mavipham,tenvipham,mucphat,hinhthuc) VALUES(:value1,:value2,:value3,:value4)");
			$smt->bindParam('value1',$value1);
			$smt->bindParam('value2',$value2);
			$smt->bindParam('value3',$value3);
			$smt->bindParam('value4',$value4);
			$smt->execute();
			$smt->closeCursor();
		}


		public function Update($value1, $value2,$value3,$value4){
			$smt = parent::getConnect()->prepare("UPDATE loivipham SET mavipham=:value1,tenvipham=:value2, mucphat=:value3,hinhthuc= :value4 where mavipham = :id");
			$smt->bindParam(':id',$value1);
			$smt->bindParam('value1',$value1);
			$smt->bindParam('value2',$value2);
			$smt->bindParam('value3',$value3);
			$smt->bindParam('value4',$value4);
			$smt->execute();
			$smt->closeCursor();
		}

		public function Delete($value){
			$smt=parent::getConnect()->prepare('DELETE FROM loivipham where mavipham = :id');
			$smt->bindParam('id',$value);
			$smt->execute();
			$smt->closeCursor();
		}




	}

	class Tainan extends Connect_db{
		private $id=array();

		public function getID(){
			return $this->id;
		}


		public function Check($value){
			$smt = Connect_db::getConnect()->prepare('SELECT * from tainnan where matainan = :id');
			$smt->bindParam('id',$value);
			$smt->execute();
			$this->id=$smt->fetch();
			$smt->closeCursor();
		}

		public function CheckCA($value){
			$smt = Connect_db::getConnect()->prepare('SELECT * from tainnan where matainan = :id');
			$smt->bindParam('id',$value);
			$smt->execute();
			$tainnan=$smt->fetch();
			$smt->closeCursor();
			return $tainnan;
		}

		public function Insert($value1, $value2,$value3,$value4,$value5){
			$smt = parent::getConnect()->prepare("INSERT INTO tainnan(macongan,diadiem,thongtintainan,hinh,matainan) VALUES(:value1,:value2,:value3,:value4,:value5)");
			$smt->bindParam('value1',$value1);
			$smt->bindParam('value2',$value2);
			$smt->bindParam('value3',$value3);
			$smt->bindParam('value4',$value4);
			$smt->bindParam('value5',$value5);
			$smt->execute();
			$smt->closeCursor();
		}


		public function Update($value1, $value2,$value3,$value4,$value5){
			$smt = parent::getConnect()->prepare("UPDATE tainnan SET macongan=:value1,diadiem=:value2, thongtintainan=:value3,hinh= :value4 where matainan = :id");
			$smt->bindParam('id',$value1);
			$smt->bindParam('value1',$value2);
			$smt->bindParam('value2',$value3);
			$smt->bindParam('value3',$value4);
			$smt->bindParam('value4',$value5);
			$smt->execute();
			$smt->closeCursor();
		}

		public function Delete($value){
			$smt=parent::getConnect()->prepare('DELETE FROM tainnan where matainan = :id');
			$smt->bindParam('id',$value);
			$smt->execute();
			$smt->closeCursor();
		}




	}

	class Taikhoan extends Connect_db{
		private $Mess = array();

		public function getMess(){
			return $this->Mess;
		}

		public function Check($value){
			$smt = Connect_db::getConnect()->prepare('SELECT * FROM taikhoan WHERE tendangnhap=:id');
			$smt->bindParam('id',$value);
			$smt->execute();
			$this->Mess = $smt->fetch(PDO::FETCH_ASSOC);
			$smt->closeCursor();
		}

		public function Insert($value1,$value2="123456",$value3){
			$smt=Connect_db::getConnect()->prepare("INSERT INTO taikhoan(tendangnhap,matkhau,quyen) VALUES(:tendangnhap,:matkhau,:quyen)");
			$smt->bindParam('tendangnhap',$value1);
			$smt->bindParam('matkhau',$value2);
			$smt->bindParam('quyen',$value3);
			$smt->execute();
			$smt->closeCursor();
		}

		public function Update($value1,$value2,$value3){
			$smt=Connect_db::getConnect()->prepare("UPDATE taikhoan SET tendangnhap=:tendangnhap, matkhau=:matkhau, quyen=:quyen WHERE tendangnhap=:tendangnhap");
			$smt->bindParam('tendangnhap',$value1);
			$smt->bindParam('matkhau',$value2);
			$smt->bindParam('quyen',$value3);
			$smt->execute();
			$smt->closeCursor();
		}

		public function Delete($value1){
			$smt=Connect_db::getConnect()->prepare("DELETE FROM taikhoan where tendangnhap=:tendangnhap");
			$smt->bindParam('tendangnhap',$value1);
			$smt->execute();
			$smt->closeCursor();
		}


	}

	class Login extends Connect_db{
		private $Mess = array();

		public function getMess(){
			return $this->Mess;
		}

		public function Check($value1,$value2){
			$smt = Connect_db::getConnect()->prepare('SELECT * FROM taikhoan WHERE tendangnhap =:tendangnhap AND matkhau=:matkhau');
			$smt->bindParam('tendangnhap',$value1);
			$smt->bindParam('matkhau',$value2);
			$smt->execute();
			$mess=$smt->fetch(PDO::FETCH_ASSOC);
			$smt->closeCursor();
			return $this->Mess=$mess;
		}

		public function Check1($value){
			$smt = Connect_db::getConnect()->prepare('SELECT * FROM taikhoan WHERE tendangnhap =:tendangnhap');
			$smt->bindValue('tendangnhap',$value);
			$smt->execute();
			$mess=$smt->fetch();
			$smt->closeCursor();
			return $this->Mess = $mess;
		}

		public function Update($value,$value1){
			$smt=$this->getConnect()->prepare('UPDATE taikhoan SET matkhau=:matkhau where tendangnhap=:tendangnhap');
			$smt->bindValue('matkhau',$value);
			$smt->bindValue('tendangnhap',$value1);
			$check = $smt->execute();
			$smt->closeCursor();
			return $check;
		}
	}

	class infoUser extends Connect_db{
		private $mess= array();

		public function getMess(){
			return $this->mess;
		}

		public function Insert($value1,$value2,$value3,$value4,$value5,$value6,$value7){
			$smt=Connect_db::getConnect()->prepare('INSERT INTO chuxe(tendangnhap,tenchuxe,diachi,sodienthoai,gioitinh,ngaysinh,quoctich) VALUES(:tendangnhap,:tenchuxe,:diachi,:sodienthoai,:gioitinh,:ngaysinh,:quoctich)');
			$smt->bindValue('tendangnhap',$value1);
			$smt->bindValue('tenchuxe',$value2);
			$smt->bindValue('diachi',$value3);
			$smt->bindValue('sodienthoai',$value4);
			$smt->bindValue('gioitinh',$value5);
			$smt->bindValue('ngaysinh',$value6);
			$smt->bindValue('quoctich',$value7);
			$check=$smt->execute();
			$smt->closeCursor();
			return $check;

		}

		public function Update($value1,$value2,$value3,$value4,$value5,$value6,$value7){
			$smt=Connect_db::getConnect()->prepare('UPDATE chuxe SET tenchuxe=:tenchuxe,diachi=:diachi,sodienthoai=:sodienthoai,gioitinh=:gioitinh
			,ngaysinh=:ngaysinh,quoctich=:quoctich WHERE tendangnhap=:tendangnhap');
			$smt->bindValue('tendangnhap',$value1);
			$smt->bindValue('tenchuxe',$value2);
			$smt->bindValue('diachi',$value3);
			$smt->bindValue('sodienthoai',$value4);
			$smt->bindValue('gioitinh',$value5);
			$smt->bindValue('ngaysinh',$value6);
			$smt->bindValue('quoctich',$value7);
			$check=$smt->execute();
			$smt->closeCursor();
			return $check;
		}

		public function Delete($value){
			$smt=Connect_db::getConnect()->prepare('DELETE FROM chuxe WHERE tendangnhap=:tendangnhap');
			$smt->bindValue('tendangnhap',$value);
			$check=$smt->execute();
			$smt->closeCursor();
			return $check;
		}

		public function Check($value){
			$smt=Connect_db::getConnect()->prepare('SELECT * from chuxe where tendangnhap=:tendangnhap');
			$smt->bindValue('tendangnhap',$value
		);
			$smt->execute();
			$check = $smt->fetch();
			$smt->closeCursor();
			return $this->mess=$check;
			
		}


	}


	class infoAdmin extends Connect_db{
		private $mess= array();

		public function getMess(){
			return $this->mess;
		}

		public function Insert($value1,$value2,$value3,$value4,$value5){
			$smt=Connect_db::getConnect()->prepare('INSERT INTO conganvien(macongan,tencongan,tocongtac,diachi,sodienthoai) VALUES(:macongan,:tencongan,:tocongtac,:diachi,:sodienthoai)');
			$smt->bindValue('macongan',$value1);
			$smt->bindValue('tencongan',$value2);
			$smt->bindValue('tocongtac',$value3);
			$smt->bindValue('diachi',$value4);
			$smt->bindValue('sodienthoai',$value5);
			$check=$smt->execute();
			$smt->closeCursor();
			return $check;

		}

		public function Update($value1,$value2,$value3,$value4,$value5){
			$smt=Connect_db::getConnect()->prepare('UPDATE conganvien SET tencongan=:tencongan,tocongtac=:tocongtac,diachi=:diachi
			,sodienthoai=:sodienthoai WHERE macongan=:macongan');
			$smt->bindValue('macongan',$value1);
			$smt->bindValue('tencongan',$value2);
			$smt->bindValue('tocongtac',$value3);
			$smt->bindValue('diachi',$value4);
			$smt->bindValue('sodienthoai',$value5);
			$check=$smt->execute();
			$smt->closeCursor();
			return $check;
		}

		public function Delete($value){
			$smt=Connect_db::getConnect()->prepare('DELETE FROM conganvien WHERE macongan=:macongan');
			$smt->bindValue('macongan',$value);
			$check=$smt->execute();
			$smt->closeCursor();
			return $check;
		}

		public function Check($value){
			$smt=Connect_db::getConnect()->prepare('SELECT * from conganvien where macongan=:macongan');
			$smt->bindValue('macongan',$value
		);
			$smt->execute();
			$check = $smt->fetch();
			$smt->closeCursor();
			return $this->mess=$check;
			
		}


	}


	class Moto extends Connect_db{
		private $mess= array();

		public function getMess(){
			return $this->mess;
		}

		public function Insert($value1,$value2,$value3,$value4,$value5,$value6,$value7){
			$smt=Connect_db::getConnect()->prepare('INSERT INTO xe(tendangnhap,nhanhieu,mauxe,theloai,loaixe,sokhung,somay) VALUES(:tendangnhap,:nhanhieu,:mauxe,:theloai,:loaixe,:sokhung,:somay)');
			$smt->bindValue('tendangnhap',$value1);
			$smt->bindValue('nhanhieu',$value2);
			$smt->bindValue('mauxe',$value3);
			$smt->bindValue('theloai',$value4);
			$smt->bindValue('loaixe',$value5);
			$smt->bindValue('sokhung',$value6);
			$smt->bindValue('somay',$value7);
			$check=$smt->execute();
			$smt->closeCursor();
			return $check;

		}

		public function Update($value1,$value2,$value3,$value4,$value5){
			$smt=Connect_db::getConnect()->prepare('UPDATE conganvien SET tencongan=:tencongan,tocongtac=:tocongtac,diachi=:diachi
			,sodienthoai=:sodienthoai WHERE macongan=:macongan');
			$smt->bindValue('tendangnhap',$value1);
			$smt->bindValue('nhanhieu',$value2);
			$smt->bindValue('mauxe',$value3);
			$smt->bindValue('theloai',$value4);
			$smt->bindValue('loaixe',$value5);
			$smt->bindValue('sokhung',$value6);
			$smt->bindValue('somay',$value7);
			$check=$smt->execute();
			$smt->closeCursor();
			return $check;
		}

		public function Delete($value){
			$smt=Connect_db::getConnect()->prepare('DELETE FROM conganvien WHERE macongan=:macongan');
			$smt->bindValue('macongan',$value);
			$check=$smt->execute();
			$smt->closeCursor();
			return $check;
		}

		public function Check($value){
			$smt=$this->getConnect()->prepare('SELECT * FROM xe where tendangnhap = :tendangnhap');
			$smt->bindValue('tendangnhap',$value);
			$smt->execute();
			$check = $smt->fetchAll();
			$smt->closeCursor();
			return $this->mess=$check;
		}


	}


	class Traodoi extends Connect_db{
		private $mess= array();

		public function getMess(){
			return $this->mess;
		}

		public function Check($value,$value1){
			$smt=$this->getConnect()->prepare('SELECT * FROM xe WHERE tendangnhap=:tendangnhap and maxe=:maxe');
			$smt->bindValue('tendangnhap',$value);
			$smt->bindValue('maxe',$value1);
			$smt->execute();
			$check=$smt->fetchAll();
			$smt->closeCursor();
			return $this->mess=$check;
		}

		public function Insert($value1,$value2,$value3,$value4,$value5){
			$smt=Connect_db::getConnect()->prepare('INSERT INTO traodoixe(chucu,chumoi,maca,maxe,ngaydoi) VALUES(:chucu,:chumoi,:maca,:maxe,:ngaydoi)');
			$smt->bindValue('chucu',$value1);
			$smt->bindValue('chumoi',$value2);
			$smt->bindValue('maca',$value3);
			$smt->bindValue('maxe',$value4);
			$smt->bindValue('ngaydoi',$value5);
			$check=$smt->execute();
			$smt->closeCursor();
			return $check;

		}

		public function UpdateChange($value1,$value2){
			$smt=$this->getConnect()->prepare('UPDATE xe set tendangnhap=:tendangnhap where maxe=:maxe');
			$smt->bindValue('maxe',$value1);
			$smt->bindValue('tendangnhap',$value2);
			$check=$smt->execute();
			$smt->closeCursor();
			return $check;
		}

		public function Update($value1,$value2,$value3,$value4,$value5){
			$smt=Connect_db::getConnect()->prepare('UPDATE traodoixe SET chucu=:chucu,chumoi=:chumoi,maca=:maca
			,maxe=:maxe ngaydoi=:ngaydoi WHERE macongan=:macongan');
			$smt->bindValue('chucu',$value1);
			$smt->bindValue('chumoi',$value2);
			$smt->bindValue('maca',$value3);
			$smt->bindValue('maxe',$value4);
			$smt->bindValue('ngaydoi',$value5);
			$check=$smt->execute();
			$smt->closeCursor();
			return $check;
		}

		public function Delete($value){
			$smt=Connect_db::getConnect()->prepare('DELETE FROM conganvien WHERE macongan=:macongan');
			$smt->bindValue('macongan',$value);
			$check=$smt->execute();
			$smt->closeCursor();
			return $check;
		}

	}


	class Bienban extends Connect_db{
		private $mess= array();

		public function getMess(){
			return $this->mess;
		}

		public function Insert($value1,$value2,$value3,$value4,$value5){
			$smt=Connect_db::getConnect()->prepare('INSERT INTO bienban(tendangnhap,maca,thoigian,diadiem,mavp) VALUES(:tendangnhap,:maca,:thoigian,:diadiem,:mavp)');
			$smt->bindValue('tendangnhap',$value1);
			$smt->bindValue('maca',$value2);
			$smt->bindValue('thoigian',$value3);
			$smt->bindValue('diadiem',$value4);
			$smt->bindValue('mavp',$value5);
			$check=$smt->execute();
			$smt->closeCursor();
			return $check;

		}
		public function Update($value1,$value2,$value3,$value4,$value5){
			$smt=Connect_db::getConnect()->prepare('Update bienban Set maca=:maca,thoigian=:thoigian,diadiem=:diadiem,mavp=:mavp where tendangnhap=:tendangnhap');
			$smt->bindValue('tendangnhap',$value1);
			$smt->bindValue('maca',$value2);
			$smt->bindValue('thoigian',$value3);
			$smt->bindValue('diadiem',$value4);
			$smt->bindValue('mavp',$value5);
			$check=$smt->execute();
			$smt->closeCursor();
			return $check;

		}

		public function Check($value){
			$smt=$this->getConnect()->prepare('SELECT * FROM bienban where tendangnhap = :tendangnhap');
			$smt->bindValue('tendangnhap',$value);
			$smt->execute();
			$check = $smt->fetchAll();
			$smt->closeCursor();
			return $this->mess=$check;
		}

		public function getAll(){
			$smt=$this->getConnect()->prepare('Select * from bienban limit(Select count(mabienban)-10 from bienban),(Select count(mabienban) from bienban)');
			$smt->execute();
			$all=$smt->fetchAll();
			$smt->closeCursor();
			return $this->mess=$all;
		}

	}
	

 ?>