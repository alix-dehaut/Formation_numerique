@extends('layouts.master')

@section('content')
<h2>Ensemble des {{$post_type}}s proposés</h2>
{{$posts->links()}}

<ul>
	@forelse($posts as $post)
	<li>
		<h2><a href="{{url('post', $post->id)}}">{{$post->title}}</a></h2>
		<div class="row justify-content-around">
			<div class="col-md-3">
				<img src="{{asset('images/'.$post->picture->link)}}" alt="{{$post->picture->title}}">
			</div>
			<div class="col-md-5 offset-md-4">
				<p>Description: {{$post->description}}</p>
				<p>Début: {{$post->started_at}}</p>
			</div> 	
		</div>
	</li>

	@empty
	<li>Désolé pour l'instant aucun {{$post_type}} n'est publié sur le site</li>

	@endforelse
</ul>
{{$posts->links()}}
@endsection 