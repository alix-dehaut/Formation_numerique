'@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Edition post :  </h1>
                <form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
                    {{method_field('PUT')}}
                    {{ csrf_field() }}
                    <div class="form">
 
                        <div class="form-group">
                            <label for="title">Titre :</label>
                            <input type="text" name="title" value="{{$post->title}}" class="form-control" id="title"
                                   placeholder="Titre du post">
                            @if($errors->has('title')) <span class="error bg-warning text-warning">{{$errors->first('title')}}</span>@endif
                        </div>

                        <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea type="text" name="description" class="form-control">{{$post->description}}</textarea>
                            @if($errors->has('description')) <span class="error bg-warning text-warning">{{$errors->first('description')}}</span> @endif
                        </div>
                    </div>
                    <div class="form-select">
                        <label for="category">Catégorie :</label>
                        <select id="category" name="category_id">
                            <option value="0" {{ is_null($post->category_id)? 'selected' : '' }} >Sans</option>
                            @foreach($categories as $id => $name)
                            <option {{ $post->category_id == $id ? 'selected' : '' }} value="{{$id}}">{{$name}}</option>
                            @endforeach
                        </select>
                    </div> 

                    <div class="input-radio">
                            <h2>Type</h2>
                            <input type="radio" @if($post->post_type == 'stage') checked @endif name="post_type" value="Stage" > Stage<br>
                            <input type="radio" @if($post->post_type =='formation') checked @endif name="post_type" value="Formation" checked> Formation<br>
                            @if($errors->has('post_type')) <span class="error">{{$errors->first('post_type')}}</span>@endif
                        </div>

                        <div class="form-group">
                            <label for="students_max">Nombre d'élèves maximum:</label>
                            <input id="students_max" type="number" name="students_max" value="{{$post->students_max}}" min="10" max="30">
                            @if($errors->has('students_max')) <span class="error">{{$errors->first('students_max')}}</span>@endif
                        </div>

                        <div class="form-group">
                            <label for="price">Prix :</label>
                            <input id="price" type="number" name="price" value="{{$post->price}}" min="1000" max="2500">
                            @if($errors->has('price')) <span class="error">{{$errors->first('price')}}</span>@endif
                        </div>

                        <div class="form-group">
                            <label for="started_at">Début:</label>
                            <input id="started_at" type="datetime-local" name="started_at" value="{{$post->started_at}}">
                            @if($errors->has('started_at')) <span class="error">{{$errors->first('started_at')}}</span>@endif
                        </div>
                        <div class="form-group">
                            <label for="ended_at">Fin:</label>
                            <input id="ended_at" type="datetime-local" name="ended_at" value="{{$post->ended_at}}">
                            @if($errors->has('ended_at')) <span class="error">{{$errors->first('ended_at')}}</span>@endif
                        </div>                 
            </div><!-- #end col md 6 -->

            <div class="col-md-6">
                <button type="submit" class="btn btn-primary">Modifier le post</button>
                <div class="input-radio">
            <h2>Status</h2>
            <input type="radio" @if($post->status == 'published') checked @endif name="status" value="published" checked> publier<br>
            <input type="radio" @if($post->status == 'unpublished') checked @endif name="status" value="unpublished" > dépulier<br>
            </div>

            <div class="input-file">
                <h2>File :</h2>
                <label for="picture">Titre image :</label>
                <input type="text" name="title_image" value="{{old('title_image')}}">
                <input class="file" type="file" name="picture" >
                @if($errors->has('picture')) <span class="error bg-warning text-warning">{{$errors->first('picture')}}</span> @endif
            </div>
            @if($post->picture)
            <div class="form-group">
                <h2>Image associée :</h2>
                <label for="picture">Titre image :</label>
                <input type="text" name="title_image" value="{{$post->picture->title}}">
            </div>
            <div class="form-group">
            <img width="300" src="{{url('images', $post->picture->link)}}" alt="{{$post->picture->title}}">
            </div>
            @endif
            
            </div><!-- #end col md 6 -->
            </form>
        </div>
@endsection