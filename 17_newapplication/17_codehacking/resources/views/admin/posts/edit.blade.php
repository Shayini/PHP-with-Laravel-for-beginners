@extends('layouts.admin')


@section('content')
    <h1>Edit Post</h1>

    <div class="row">
        <div class="col-sm-3">
            <img src="{{$post->photo->file}}" alt="" class="img-responsive">
        </div>

        <div class="col-sm-9">
            {!! Form::model($post, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\AdminPostsController@update', $post->id], 'files' => true]) !!}    <!-- Opening A Form -->

                <div class="form-group">
                    <!-- <input type="text" name="title" placeholder="Enter title"> -->
                    {!! Form::label('title', 'Title:') !!}    <!-- Generating A Label Element, 'title' - value for 'for' attribute, Title - label name -->
                    {!! Form::text('title', null, ['class'=>'form-control']) !!}    <!-- Generating A text Input, title - value for 'name' attribute, default value is null, 'form-control' - value for 'class' attribute -->
                </div>

                <div class="form-group">
                    {!! Form::label('category_id', 'Category:') !!}
                    {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('photo_id', 'Photo:') !!}
                    {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('body', 'Description:') !!}
                    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    <!-- <input type="submit" name="submit"> -->
                    {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-sm-6']) !!}   <!-- Generating A Submit Button, 'Update User - name shown in the button, 'btn btn-primary' - value for 'class' attribute -->
                </div>

            <!-- </form> -->
            {!! Form::close() !!}


            {!! Form::open(['method' => 'DELETE', 'action' => ['App\Http\Controllers\AdminPostsController@destroy', $post->id]]) !!}    <!-- Opening A Form -->
                    <div class="form-group">
                        {!! Form::submit('Delete Post', ['class'=>'btn btn-danger col-sm-6']) !!}   <!-- Generating A Submit Button, 'Delete User - name shown in the button, 'btn btn-danger' - value for 'class' attribute -->
                    </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row">
        @include('includes.form_error')
    </div>
@stop
