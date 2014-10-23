@extends('_master')

@section('Ipsum Lorem Generator Form')
	Welcome to Foobooks
@stop

@section('head')
	
@stop

@section('content')
	<div class="container">

		
	<a href="/">← Home</a>
	
	<h1>Lorem Ipsum Generator</h1>
	
	How many paragraphs do you want?
	
	
	{{Form::open(array('url' => '/lorem-ipsum', 'method' => 'POST'))}}
		{{Form::label('paragraphs', 'Paragraphs')}}
		{{Form::text('paragraphs')}}{{'(Max: 99)<br/><br/>'}} 
		{{Form::submit('Generate!')}}
	{{Form::close()}}
    {{$viewOutput}}
    </div>
@stop