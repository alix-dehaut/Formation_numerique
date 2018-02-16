@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h2><strong>Titre</strong> :{{$post->title}}</h2>
            <p><strong>{{$post->post_type}}</strong></p>
	        <p><strong>Categorie :</strong>{{$post->category->name?? 'aucun'}}</p>
            <p><strong>Description : </strong>{{$post->description}}</p>
            <p><strong>Début : </strong> {{$post->started_at_fr}}</p>
            <p><strong>Fin : </strong> {{$post->ended_at_fr}}</p>
            <p><strong>Nombre d'eleves max : </strong> {{$post->students_max}}</p>
            <p><strong>Prix : </strong> {{$post->price}}</p>
    </div>

    <div class="col-md-4">
    <h2><strong>Image</strong></h2>
    @if(!empty($post->picture))
            <a><img src="{{asset('images/'.$post->picture->link)}}" alt="{{$post->picture->title}}" class="thumbnail" style="width: 300px"></a>
    @endif
        <div class="col-md-8">
            <p><strong>Date de mise à jour : </strong>{{$post->updated_at}}</p>
            <p><strong>Status: </strong>{{$post->status}}</p>
        </div>
    </div>

    
</div>
@endsection 