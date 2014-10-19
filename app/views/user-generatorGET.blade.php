@extends('_master')

@section('Ipsum Lorem Generator Form')
	Welcome to Foobooks
@stop

@section('head')
	
@stop

@section('content')
	<div class='container'>

	
	<a href='/'>Home</a>

	<h1>User Generator</h1>
				
	<form method="POST" action="{{url('/user-generator')}}" accept-charset="UTF-8">
		<label for="users">How many users?</label>		
		<input maxlength="2" name="users" type="text" id="users"> (Max: 99)
		<br>
		
		Include...
		<br>
		<input name="birthdate" type="checkbox">		
		<label for="birthdate">Birthdate</label>		
		<br>
		
		<input name="profile" type="checkbox">		
		<label for="profile">Profile</label>		
		<br>		
		<input type="submit" value="Generate!">    
    </form>
	<!--
    Form::open(array('url' => '/user-generator', 'method' => 'POST'));


    Form::submit('Generate!');
    Form::close();
	-->
    
	
    
	
</div>



@stop