@extends('layouts.master')

@section('content')

<article class="row">
	<div class="col-md-12">
		<h2>{{$post->title}}</h2>

		<div class="col-md-4">
			<img src="{{asset('images/'.$post->picture->link)}}" alt="{{$post->picture->title}}">
			<div class="col-md-6">
				<p>Début: {{$post->started_at}}</p>
				<p>Fin: {{$post->ended_at}}</p>
				<p>Prix: {{$post->price}}</p>
			</div>
			<div class="col-md-6">
				<p>Nombres de places:<br>{{$post->students_max}}</p>
				<p>Catégorie: {{$post->category->name}}</p>
			</div>
		</div>

		<div class="col-md-8">
			<p>{{$post->description}}</p>
		</div>
	</div>
</article>

@endsection 