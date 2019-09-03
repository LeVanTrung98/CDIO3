create DATABASE if not EXISTS cdio397;
CREATE TABLE IF not exists cdio397.chuxe(
    tendangnhap int(11) not null PRIMARY key,
    tenchuxe varchar(255) not null,
    diachi varchar(255) not null,
    sodienthoai int(11),
    gioitinh varchar(2) not null,
    ngaysinh datetime not null,
    quoctich char(2) not null
);

CREATE table if not exists cdio397.conganvien(
    macongan varchar(255) not null PRIMARY KEY,
    tencongan varchar(255) not null,
    tocongtac varchar(255) not null,
    diachi varchar(255) not null,
    sodienthoai varchar(255)
);

create TABLE if not exists cdio397.quanlyxe(
    id int(11) not null PRIMARY key AUTO_INCREMENT,
    tendangnhap int(11) not null,
    tenchuxe varchar(255) not null,
    maxe varchar(255) not null,
    diachi varchar(255) not null,
    ngaysinh datetime ,
    gioitinh varchar(2) not null,
    mauxe varchar(255) not null,
    sokhung varchar(255) not null,
    somay varchar(255) not null

);
create TABLE if NOT EXISTS cdio397.taikhoan(
    tendangnhap varchar(12) not null PRIMARY key,
    matkhau varchar(255) not null,
    quyen char(2) not null
);
create TABLE if NOT EXISTS cdio397.loivipham(
    mavipham varchar(255) NOT null PRIMARY key,
    tenvipham  varchar(255) NOT null,
    mucphat  varchar(255) NOT null,
    hinhthuc  varchar(255) NOT null
);
create TABLE if NOT EXISTS cdio397.tainnan(
    matainan varchar(255) NOT null PRIMARY key,
    macongan  varchar(12) NOT null,
    diadiem  varchar(255) NOT null,
    thongtintainan text not null,
    hinh varchar(255)
    
);
create TABLE if NOT EXISTS cdio397.xe(
    maxe int not null PRIMARY KEY AUTO_INCREMENT,
    tendangnhap varchar(12) NOT null,
    nhanhieu varchar(25) NOT null,
    mauxe varchar(25) NOT null,
    theloai varchar(25) NOT null,
    loaixe varchar(25) NOT null,
    sokhung varchar(25) NOT null,
    somay varchar(25) NOT null

);
CREATE TABLE if NOT EXISTS cdio397.traodoixe(
    matraodoi int NOT null PRIMARY KEY AUTO_INCREMENT,
    chucu varchar(12) NOT null,
    chumoi varchar(12) not null,
    maca varchar(12) not null,
    maxe int not null,
    ngaydoi datetime
);
CREATE TABLE if not EXISTS cdio397.bienban(
    mabienban int not null PRIMARY KEY AUTO_INCREMENT,
    tendangnhap varchar(12) not null ,
    maca varchar(12) NOT null ,
    thoigian datetime not null,
    diadiem varchar(255) not null,
    mavp varchar(255) not null
);