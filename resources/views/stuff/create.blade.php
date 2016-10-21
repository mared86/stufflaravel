@extends('main')
@section('title',' | Create New Stuff')
@section('css')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create new stuff</h1>
            {!! Form::open(['route'=>'stuff.store','data-parsley-validate'=>''])!!}
                    <!--- Title Field --->
            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', old( 'title'), ['class' => 'form-control',
                'placeholder' => 'Title','required'=>'','maxlength'=>"255"]) !!}
            </div>
            <!--- Description Field --->
            <div class="form-group">
                {!! Form::label('description', 'Description:') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control','required'=>'']) !!}
            </div>
            <!--- Categories Field --->
            <div class="form-group">
                {!! Form::label('category_id', 'Categories:') !!}
                <select name="category_id" id="category_id" class="form-control">

                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <!--- Price Field --->
            <div class="form-group">
                {!! Form::label('price', 'Price:') !!}
                {!! Form::text('price', old( 'price'), ['class' => 'form-control',
                'placeholder' => 'Price',
                'required'=>'',
                'data-parsley-type'=>'number',
                'step'=>'0.01']) !!}
            </div>

            <!--- Tags Field --->
            <select class="form-control js-example-basic-multiple" multiple="multiple" name="tags[]" id="tags[]">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
            <!--- Submit Field --->
            <div class="form-group">
                {!! Form::submit('Craete', ['class' => 'form-control btn btn-success']) !!}
            </div>
            {!! Form::close() !!}</div>
    </div>
@endsection
@section('js')
    {{--    {!! Html::script('js/parsley.min.js') !!}--}}
    {!! Html::script('js/select2.full.min.js') !!}
    <script>
        $('.js-example-basic-multiple').select2();
    </script>
@endsection
