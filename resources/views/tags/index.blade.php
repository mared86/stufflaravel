@extends('main')
@section('title','| All Tags')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->id}}</td>
                        <td><a href="{{url(route("tags.show",$tag->id))}}"> {{$tag->name}}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-3 col-md-offset-1">
            <div class="">
                {{Form::open()}}
                        <!--- Title Field --->
                <div class="form-group">
                    {!! Form::label('name', 'Tag Name:') !!}
                    {!! Form::text('name', old( 'title'), ['class' => 'form-control','placeholder' => 'Title']) !!}
                </div>
                <!--- Description Field --->
                <div class="form-group">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::textarea('description', old( 'description'), ['class' => 'form-control']) !!}
                </div>
                <input type="number" step="0.01">
                <!--- save Field --->
                <div class="form-group">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                </div>
                {{Form::close()}}
            </div>

        </div>
    </div>
@endsection
