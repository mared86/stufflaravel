@extends('main')
@section('title','| Categories')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            {{$category->id}}
                        </td>
                        <td>
                            {{$category->name}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- endof col-md-8-->
        <div class="col-md-3 offset-md-1">
            <div class="well">
                {!! Form::open(['route'=>'categories.store','method'=>'POST']) !!}
                        <h3>New Category.</h3>
                <!--- Name Field --->
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', old( 'name'), ['class' => 'form-control','placeholder' => 'Name']) !!}
                </div>
                <!--- submit Field --->
                <div class="form-group">
                    {!! Form::submit('Save', ['class' => 'btn btn-success btn-block']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection