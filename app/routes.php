<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
Route::get('/', function()
{
	return View::make('hello');
});
*/

Route::get('/', function()
{
	return View::make('home');
});

Route::get('/lorem-ipsum', function()
{
	return View::make('lorem-ipsumGET');
});

Route::post('/lorem-ipsum', function()
{
	$generator = new Badcow\LoremIpsum\Generator();
	$numParagraphs = $_POST['paragraphs'];
	$paragraphs = $generator->getParagraphs($numParagraphs);
	$view = implode('<p>', $paragraphs);
	return $view;
});

Route::get('/user-generator', function()
{
	return View::make('user-generatorGET');
});

Route::post('/user-generator', function()
{
	$faker = Faker\Factory::create();
	$numUsers = $_POST['users'];
	$view = "";
	for ($i=0; $i < $numUsers; $i++) { 
		$view = $view."</br> ".$faker->name;
		$view = $view."</br>".$faker->address;
		$view = $view."</br>".$faker->text;
		$view = $view."</br>";
	}
	return $view;
});
