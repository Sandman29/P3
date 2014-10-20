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
	$view ="";
	$data['viewOutput'] = $view;
	return View::make('lorem-ipsumGET', $data);
});

Route::post('/lorem-ipsum', function()
{
	$generator = new Badcow\LoremIpsum\Generator();
	$view = "";
	$numParagraphs = $_POST['paragraphs'];
	$paragraphs = $generator->getParagraphs($numParagraphs);
	for ($i=0; $i < $numParagraphs ; $i++) { 
		$view = $view."<p> ".$paragraphs[$i]."<p/>";
	}
	//$view = implode('<br/>', $paragraphs);
	$data['viewOutput'] = $view;
	return View::make('lorem-ipsumGET', $data);
});

Route::get('/user-generator', function()
{
	$data['viewOutput'] = "";
	return View::make('user-generatorGET', $data);
});

Route::post('/user-generator', function()
{
	$faker = Faker\Factory::create();
	$numUsers = $_POST['users'];
	$view = "";
	for ($i=0; $i < $numUsers; $i++) { 
		$view = $view."<br/> ".$faker->name;
		if (isset($_POST['birthdate'])) {
			$view = $view."<br/>".$faker->date($format = 'Y-m-d', $max = 'now');
		}
		if (isset($_POST['profile'])) {
			$view = $view."<br/>".$faker->text;
		}
		$view = $view."<br/>";
	}
	$data['viewOutput'] = $view;
	return View::make('user-generatorGET', $data);
});
