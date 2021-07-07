@extends('layouts.admin')



@section('content')
    <h1>Media</h1>

    @if($photos)
        <form class="" action="{{route('delete.media')}}" method="post" class="form-inline">
            @csrf
            {{method_field('delete')}}
            <div class="form-group">
                <select name="checkBoxArray" class="form-control">
                    <option value="">Delete</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="delete_all" class="btn btn-primary">
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="options"></th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($photos as $photo)
                        <tr>
                            <th><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></th>
                            <td>{{$photo->id}}</td>
                            <td><img height="50" src="{{$photo->file}}" alt=""></td>
                            <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No Date'}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    @endif
@stop

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#options').click(function(){
                if(this.checked){
                    $('.checkBoxes').each(function(){
                        this.checked = true;
                    });
                } else {
                    $('.checkBoxes').each(function(){
                        this.checked = false;
                    });
                }
            });
        });
    </script>
@stop
