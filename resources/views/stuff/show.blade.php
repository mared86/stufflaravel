@extends('main')

@section('title','| View Stuff '.$stuff->title)

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{$stuff->title}}</h1>
            <hr>
            <div class="tags">
            @foreach($stuff->tags as $tag)
                <span class="label label-default">{{$tag->name}}</span>

            @endforeach
        </div>
            <p class="lead">
                {!! nl2br($stuff->description) !!}
            </p>
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Category:</dt>
                    <dd>{{$stuff->category->name}}</dd>
                    <dt>Creates at:</dt>
                    <dd id="created"></dd>
                    <dt>Updated at:</dt>
                    <dd id="updated"></dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('stuff.edit','Edit',[$stuff->id],['class'=>'btn btn-primary btn-block']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route'=>['stuff.destroy',$stuff->id],'method'=>'delete']) !!}
                        <!---  Field --->
                        <div class="form-group">
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
{{Html::script("http://momentjs.com/downloads/moment.min.js")}}
    <script >
        $('#created').html(moment('{{$stuff->created_at}}').fromNow());
        $('#updated').html(moment('{{$stuff->updated_at}}').fromNow());
    </script>
@endsection

{{--{{dd($stuff->user())}}--}}