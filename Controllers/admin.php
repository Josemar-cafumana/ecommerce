<?php


use \Hcode\PageAdmin;
use \Hcode\Model\User;

$app->get('/admin', function() {
 
	
	User::verifyLogin();


	$page = new PageAdmin();

	$page->setTpl("index");


});


$app->get('/admin/login', function() {
 

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login");


});

$app->get('/admin/logout', function() {
 

	User::logout();

	


});


$app->post('/admin/login', function() {
 

	User::login($_POST['login'],$_POST["password"]);

	header("Location: /admin");
	exit;


});


$app->get('/admin/forgot', function(){

	User::verifyLogin();



	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot");



});


$app->post('/admin/forgot', function(){




$user =	User::getForgot($_POST["email"]);

header("Location: /admin/forgot/sent");
exit;

});

$app->get("/admin/forgot/sent", function(){

	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("forgot-sent");


});
