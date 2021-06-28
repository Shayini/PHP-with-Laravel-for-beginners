@extends('layouts.admin')

@section('content')
    <h1>Categories</h1>

    <div class="col-sm-6">
        {!! Form::open(['method' => 'POST', 'action' => 'App\Http\Controllers\AdminCategoriesController@store']) !!}    <!-- Opening A Form -->

            <div class="form-group">
                <!-- <input type="text" name="title" placeholder="Enter title"> -->
                {!! Form::label('name', 'Name:') !!}    <!-- Generating A Label Element, 'name' - value for 'for' attribute, Name - label name -->
                {!! Form::text('name', null, ['class'=>'form-control']) !!}    <!-- Generating A text Input, name - value for 'name' attribute, default value is null, 'form-control' - value for 'class' attribute -->
            </div>

            <div class="form-group">
                <!-- <input type="submit" name="submit"> -->
                {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}   <!-- Generating A Submit Button, 'Create Category - name shown in the button, 'btn btn-primary' - value for 'class' attribute -->
            </div>

        <!-- </form> -->
        {!! Form::close() !!}
    </div>

    <div class="col-sm-6">
        @if($categories)
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No Date'}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
