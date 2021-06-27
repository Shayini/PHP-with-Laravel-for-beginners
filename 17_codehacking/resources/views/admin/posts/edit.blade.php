@extends('layouts.admin')


@section('content')
    <h1>Edit Post</h1>

    <div class="row">
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
                {!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}   <!-- Generating A Submit Button, 'Update User - name shown in the button, 'btn btn-primary' - value for 'class' attribute -->
            </div>

        <!-- </form> -->
        {!! Form::close() !!}
    </div>

    <div class="row">
        @include('includes.form_error')
    </div>
@stop
