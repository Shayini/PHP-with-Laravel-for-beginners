@extends('layouts.admin')

@section('content')
    <h1>Categories</h1>

    <div class="col-sm-6">
        {!! Form::model($category, ['method' => 'PATCH', 'action' => ['App\Http\Controllers\AdminCategoriesController@update', $category->id]]) !!}    <!-- Opening A Form -->

            <div class="form-group">
                <!-- <input type="text" name="title" placeholder="Enter title"> -->
                {!! Form::label('name', 'Name:') !!}    <!-- Generating A Label Element, 'name' - value for 'for' attribute, Name - label name -->
                {!! Form::text('name', null, ['class'=>'form-control']) !!}    <!-- Generating A text Input, name - value for 'name' attribute, default value is null, 'form-control' - value for 'class' attribute -->
            </div>

            <div class="form-group">
                <!-- <input type="submit" name="submit"> -->
                {!! Form::submit('Update Category', ['class'=>'btn btn-primary col-sm-6']) !!}   <!-- Generating A Submit Button, 'Update Category - name shown in the button, 'btn btn-primary' - value for 'class' attribute -->
            </div>

        <!-- </form> -->
        {!! Form::close() !!}


        {!! Form::open(['method' => 'DELETE', 'action' => ['App\Http\Controllers\AdminCategoriesController@destroy', $category->id]]) !!}    <!-- Opening A Form -->

            <div class="form-group">
                {!! Form::submit('Delete Category', ['class'=>'btn btn-danger col-sm-6']) !!}   <!-- Generating A Submit Button, 'Delete Category - name shown in the button, 'btn btn-primary' - value for 'class' attribute -->
            </div>

        {!! Form::close() !!}
    </div>

    <div class="col-sm-6">

    </div>
@endsection
