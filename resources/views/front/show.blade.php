@extends('layouts.master')

@section('content')

<article class="row">
	<div class="col-md-12">
		<h2>{{$post->title}}</h2>

		<div class="col-md-4">
			<img src="{{asset('images/'.$post->picture->link)}}" alt="{{$post->picture->title}}" style="width: 300px">
			<div class="col-md-6">
				<p>Début: {{$post->started_at_fr}}</p>
				<p>Fin: {{$post->ended_at_fr}}</p>
				<p>Prix: {{$post->price}}</p>
			</div>
			<div class="col-md-6">
				<p>Nombres de places:<br>{{$post->students_max}}</p>
				<p>Catégorie: {{$post->category->name}}</p>
			</div>
		</div>

		<div class="col-md-6">
			<p>{{$post->description}}</p>
		</div>
	</div>
</article>

@endsection 