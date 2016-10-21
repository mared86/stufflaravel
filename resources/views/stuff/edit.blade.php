@extends('main')
@section('title',"| Edite Stuff $stuff->title")
@section('css')
    {!! Html::style('css/parsley.css') !!}
    {{--select2--}}
    {!! Html::style('css/select2.min.css') !!}
@endsection
@section('content')

    <div class="container">
        {!! Form::model($stuff,['route' => ['stuff.update', $stuff->id],"method"=>"put"])!!}
                <!--- Title Field --->
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', old( 'title'), ['class' => 'form-control','placeholder' => 'Title']) !!}
        </div>

        <!--- Description Field --->
        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', old("description"), ['class' => 'form-control']) !!}
        </div>
        <!--- Categories Field --->
        <div class="form-group">
            {!! Form::label('category_id', 'Categories:') !!}
            <select name="category_id" id="category_id" class="form-control">

                @foreach($categories as $category)
                    <option value="{{$category->id}}" @if($category->id ==$stuff->category_id )
                    selected="selected"
                            @endif>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <!--- Price Field --->
        <div class="form-group">
            {!! Form::label('price', 'Price:') !!}
            {!! Form::text('price', old( 'price'), ['class' => 'form-control','placeholder' => 'Price']) !!}
        </div>

        <!--- Select2 Tags Field --->
        <div class="form-group">
            {!! Form::label('tags', 'Tags:') !!}
            <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
        </div>

        <!--- Save Field --->
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">{!! Html::linkRoute('stuff.show','Cancel',[$stuff->id],['class'=>'btn btn-danger btn-block']) !!}
                </div>
                <div class="col-md-6">{!! Form::submit('Update', ['class' => 'btn btn-primary btn-block']) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}

    </div>
@endsection
@section('js')
    {{--    {!! Html::script('js/parsley.min.js') !!}--}}
    {!! Html::script('js/select2.full.min.js') !!}
    <script>
        $('.js-example-basic-multiple').select2().val(
                {{json_encode($stuff->tags()->getRelatedIds())}}
        ).trigger('change');

    </script>
@endsection