@extends('layouts.admin')

@section('content')
    
        <div class="row">  
            <h2>Créer post :  </h2>
            <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-md-7">
                    <div class="form">
                        <div class="form-group">
                            <label for="title">Titre :</label>
                            <input type="text" name="title" value="{{old('title')}}" class="form-control" id="title"
                                   placeholder="Titre du post">
                                   @if($errors->has('title')) <span class="error">{{$errors->first('title')}}</span>@endif
                        </div>
                        <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea type="text" name="description" class="form-control">{{old('description')}}</textarea>
                            @if($errors->has('description')) <span class="error">{{$errors->first('description')}}</span>@endif
                        </div>

                        <div class="form-select">
                            <label for="category_id">Catégorie :</label>
                            <select id="category_id" name="category_id">
                                <option value="0" {{ is_null(old('category_id'))? 'selected' : '' }} >Sans</option>
                                @foreach($categories as $id => $name)
                                <option {{ old('category_id')==$id? 'selected' : '' }} value="{{$id}}">{{$name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category_id')) <span class="error">{{$errors->first('category_id')}}</span>@endif
                        </div>

                        <div class="input-radio">
                            <h2>Type</h2>
                            <input type="radio" @if(old('post_type')=='Stage') checked @endif name="post_type" value="Stage" > Stage<br>
                            <input type="radio" @if(old('post_type')=='Formation') checked @endif name="post_type" value="Formation"> Formation<br>
                            @if($errors->has('post_type')) <span class="error">{{$errors->first('post_type')}}</span>@endif
                        </div>

                        <div class="form-group">
                            <label for="students_max">Nombre d'élèves maximum:</label>
                            <input id="students_max" type="number" name="students_max" value="{{old('students_max')}}" min="10" max="30">
                            @if($errors->has('students_max')) <span class="error">{{$errors->first('students_max')}}</span>@endif
                        </div>

                        <div class="form-group">
                            <label for="price">Prix :</label>
                            <input id="price" type="number" name="price" value="{{old('price')}}" min="1000" max="2500">
                            @if($errors->has('price')) <span class="error">{{$errors->first('price')}}</span>@endif
                        </div>

                        <div class="form-group">
                            <label for="started_at">Début:</label>
                            <input id="started_at" type="datetime-local" name="started_at" value="{{old('started_at')}}">
                            @if($errors->has('started_at')) <span class="error">{{$errors->first('started_at')}}</span>@endif
                        </div>
                        <div class="form-group">
                            <label for="ended_at">Fin:</label>
                            <input id="ended_at" type="datetime-local" name="ended_at" value="{{old('ended_at')}}">
                            @if($errors->has('ended_at')) <span class="error">{{$errors->first('ended_at')}}</span>@endif
                        </div>

                    </div>
                </div>

                    
                
            <!-- #end col md 6 -->
                <div class="col-md-5">

                    <div class="input-radio">
                        <h3>Status</h3>
                            <input type="radio" @if(old('status')=='published') checked @endif name="status" value="published" > publier<br>
                            <input type="radio" @if(old('status')=='unpublished') checked @endif name="status" value="unpublished"> dépulier<br>
                            @if($errors->has('status')) <span class="error">{{$errors->first('status')}}</span>@endif
                    </div>
                    <div class="form-group">
                        <h3>Fichier :</h3>
                            <label for="picture">Titre image :</label>
                            <input type="text" name="title_image" value="{{old('title_image')}}">
                            <input class="file" type="file" name="picture" >
                    </div>

                    
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">Ajouter un post</button>
                    </div>
                    
                </div><!-- #end col md 6 -->
            </form>
        </div>



@endsection
