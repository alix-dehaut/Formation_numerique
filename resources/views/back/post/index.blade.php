@extends('layouts.admin')

@section('content')

<p><a href="{{route('post.create')}}"><button type="button" class="btn btn-primary btn-lg">Ajouter un post</button></a></p>
<button style="margin: 10px" class="btn btn-primary delete_all" data-url="{{ url('postsDeleteAll') }}">Supprimer la séléction</button>

{{$posts->links()}}
@include('back.post.partials.flash')

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col"><input type="checkbox" id="master"></th>
      <th scope="col">Titre</th>
      <th scope="col">Type</th>
      <th scope="col">Dates</th>
      <th scope="col">Status</th>
      <th scope="col">Voir</th>
      <th scope="col">Modifier</th>
      <th scope="col">Suppression</th>
    </tr>
  </thead>
  <tbody>
  	@forelse($posts as $post)
    <tr id="tr_{{$post->id}}">
        <td><input type="checkbox" class="sub_chk" data-id="{{$post->id}}"></td>
      	<td>{{$post->title}}</td>
      	<td>{{$post->post_type}}</td>
      	<td>{{$post->started_at_fr}} /{{$post->ended_at_fr}}</td>
      	<td>{{$post->status}}</td>
      	<td>
        	<a href="{{route('post.show', $post->id)}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
      	</td>
      	<td>
      		<a href="{{route('post.edit', $post->id)}}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
      	</td>
      	<td>
      		<form action="{{route('post.destroy', $post->id)}}" method="post" class="delete">
                {{method_field('DELETE')}}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger" value="delete">Supprimer</button>
            </form>
      	</td>
    </tr>
     @empty
        aucun titre ...
    @endforelse
  </tbody>
</table>
{{$posts->links()}}
@endsection 

@section('scripts')
    @parent
   <script src="{{asset('js/posts_delete_all.js')}}"></script>
    <script src="{{asset('js/confirm.js')}}"></script> 
@endsection

