@extends('layouts.master')

@section('content')
<div>
	@if(isset($posts))
	<h2>RECHERCHE</h2>
	<p>Resultat(s) pour la recherche: {{$q}}</p>

	{{$posts->links()}}
	<ul>
	@forelse($posts as $post)
	<li>
		<h2><a href="{{route('formation_stage', $post->id)}}">{{$post->title}}</a></h2>
		<div class="row ">
			<div class="col-md-7 offset-md-4">
				<p>Description: {{$post->description}}</p>
			</div> 	
		</div>
	</li>

	@empty
	<li>Désolé pour l'instant aucun stage ou formation n'est publié sur le site</li>

	@endforelse
	</ul>
	{{$posts->links()}}

	@endif
</div>


@endsection 