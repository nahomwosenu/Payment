<?php
/*
 This file is licenced by copyright rules, which i made for myself no more GPL or fucking LGPL
 no GNU license, just me Nahom AlphaGeek :-) kidding :)
 create database bank;
 use bank;
 create table Account(
  acc_no varchar(20) primary key,
  balance double
 )
*/
 class Account{
 	var $acc_no;
 	var $balance;
 	function __construct($acc_no,$balance){
 		$this->acc_no=$acc_no;
 		$this->balance=$balance;
 		$query="insert into bank(acc_no,balance) values('$acc_no','$balance')";
 	}
 	function __construct($acc_no){

 	}
 	function getBalance(){

 	}
 	function setBalance($balance){

 	}
 	function setAccount(){

 	}
 	function getAccount(){

 	}
 }
?>