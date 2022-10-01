create database if not exists DormitoryDepositSystem;

use DormitoryDepositSystem;

create table if not exists DormStudent (
    DS_studentID int(10) not null primary key,
    DS_fname varchar(50) not null,
    DS_lname varchar(50) not null,
    DS_password varchar(20) not null,
    DS_phonenumber varchar(10) not null,
    DS_right TINYINT not null,
    DS_status TINYINT not null,
    WIR_ID varchar(10) not null
);

create table if not exists Admin (
    AD_employeeID int(10) not null primary key,
    AD_username varchar(20) not null,
    AD_fname varchar(50) not null,
    AD_lname varchar(50) not null,
    AD_password varchar(20) not null,
    AD_phonenumber varchar(10) not null,
    DI_ID varchar(10) not null
);

create table if not exists DormInformation (
    DI_ID int(10) not null primary key,
    DI_picture varchar(100) not null,
    DI_detail text(1000) not null,
    DI_date varchar(10) not null
);

create table if not exists DormNews (
    DN_ID int(10) not null primary key,
    DN_title varchar(100) not null,
    DN_picture varchar(100) not null,
    DN_detail text(500) not null,
    DN_date varchar(10) not null,
    AD_employeeID varchar(10) not null
);

create table if not exists DopositItem (
    DPI_ID int(10) not null primary key,
    DPI_detail text(500) not null,
    DPI_picture varchar(100) not null,
    DPI_status int(1) not null,
    DPI_date varchar(10) not null,
    AD_employeeID varchar(10) not null,
    DS_studentID varchar(10) not null
);

create table if not exists WithdrawItemRequestDocument (
    WIR_ID int(10) not null primary key,
    WIR_date date,
    WIR_time time
);