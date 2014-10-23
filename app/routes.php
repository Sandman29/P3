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
 * 
 *	P3 GENERATES A "DEVELOPERS BEST FRIEND", WHICH IS AN IPSUM LOREM PARAGRAPH GENERATOR AND 
 *	A FAKE USER GENERATOR.
 *
 *  This program is a first program in Laravel.  This project does not use the full capabilities of 
 *	Laravel.  Typically, there would not be this much code in the routes.php file; but since this
 *	is our first experiment with Laravel, we were allowed to be a little liberal on the MVC design pattern.
 *  The next project will be more stringent to MVC.
 * 
 *	This project can be found at p3.larrysandidge.com
 * 
 *	Author: Lawrence "Larry" Sandidge
 *	Date last Modified: October 2, 2014
 *	Course: CSCI E-15 - Dynamic Web Development
 *  
 */

/*
 *  Routes to the Home page
 */
Route::get('/', function()
{
	return View::make('home');
});


/*
 *  The following 2 Route facades route in a get and a post inorder to create the form and the 
 *	output for the Ipsum Lorem paragraph generator. 
 */
Route::get('/lorem-ipsum', function()
{
	$view ="";
	$data['viewOutput'] = $view;
	return View::make('lorem-ipsum', $data);
});

Route::post('/lorem-ipsum', function()
{
	$generator = new Badcow\LoremIpsum\Generator();
	$numParagraphs = $_POST['paragraphs'];
	$view = "";
	/*
	 * Validating to make sure the input from the text field is a number and also in the correct range.
	 */
	if (!is_numeric($numParagraphs)) {
		$view = "*** MUST ENTER A NUMBER ***";
	}
	if ($numParagraphs < 0 || $numParagraphs > 99) {
		$view = "*** NUMBER OF RANDOM USERS MUST BE LESS THAN 99. ***";
	}
	/*
	 *  Once validation is passed we now create the paragraphs using Badcow\LoremIpsum package.
	 *
	 *	Package Documentat at: https://github.com/samuelwilliams/LoremIpsum/blob/master/README.md
	 */
	else {
		
		$paragraphs = $generator->getParagraphs($numParagraphs);
		for ($i=0; $i < $numParagraphs ; $i++) { 
			$view = $view."<p> ".$paragraphs[$i]."</p>";
		}
	}
	$data['viewOutput'] = $view;
	return View::make('lorem-ipsum', $data);
});


/*
 *  The following 2 Route facades route in a get and a post in order to create the form and the 
 *	output for the Fake User Generator paragraph generator. 
 */
Route::get('/user-generator', function()
{
	$data['viewOutput'] = "";
	return View::make('user-generator', $data);
});

Route::post('/user-generator', function()
{
	$faker = Faker\Factory::create();
	$numUsers = $_POST['users'];
	$view = "";
	/*
	 * Validating to make sure the input from the text field is a number and also in the correct range.
	 */
	if (!is_numeric($numUsers)) {
		$view = "*** MUST ENTER A NUMBER ***";
	}
	if ($numUsers < 0 || $numUsers > 999) {
		$view = "*** NUMBER OF RANDOM USERS MUST BE LESS THAN 999. ***";
	}
	/*
	 *  Once validation is passed we now create the paragraphs using Fzaninotto\Faker package.
	 *
	 *	Package Documentation at: https://github.com/fzaninotto/Faker/blob/master/readme.md
	 */
	else{
	
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
	}
	$data['viewOutput'] = $view;
	return View::make('user-generator', $data);
});
