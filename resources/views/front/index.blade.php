@extends('layouts.master')

@section('content')
<h2>Stages et formations à venir</h2>
{{$posts->links()}}

<ul>
	@forelse($posts as $post)
	<li>
		<h2><a href="{{route('formation_stage', $post->id)}}">{{$post->title}}</a></h2>
		<div class="row ">
			<div class="col-md-3">
				<img src="{{asset('images/'.$post->picture->link)}}" alt="{{$post->picture->title}}" style="width: 200px">
			</div>
			<div class="col-md-7 offset-md-4">
				<p>Type: {{$post->post_type}}</p>
				<p>Catégorie: {{$post->category->name}}</p>
				<p>Début: {{$post->started_at_fr}}</p>
			</div> 	
		</div>
	</li>

	@empty
	<li>Désolé pour l'instant aucun stage ou formation n'est publié sur le site</li>

	@endforelse
</ul>
{{$posts->links()}}
@endsection 