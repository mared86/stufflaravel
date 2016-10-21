@extends('main')

@section('title','| View All Stuff ')

@section('content')
    <div class="row">
        <div class="col-sm-8">
            <h1>All Stuff</h1>
            @foreach($stuffs as $stuff)
                <div class="well">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>{{$stuff->title}}</h3>

                            <p>{!! substr( $stuff->description,0,150) !!} {{(strlen($stuff->description)>50) ? '...': ''}}</p>
                            <label>{{$stuff->price}}</label>
                            <lable>{{$stuff->user->name}}</lable>

                            <a href="{{url(action("StuffController@show",['id'=>$stuff->id]))}}"
                               class="btn btn-default btn-sm ">view</a>

                            <div class="pull-right"> created at <span
                                        class="created_at hidden ">{{$stuff->created_at}}</span></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-md-3 col-md-offset-1">
            {!! Html::linkRoute('stuff.create','Create new Stuff',[],['class'=>'btn btn-primary btn-block btn-h1-spacing']) !!}
        </div>
    </div><!--end .row-->
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                {!! $stuffs->links() !!}
            </div>
        </div>
    </div>
@endsection
@section('js')
    {{Html::script("http://momentjs.com/downloads/moment.min.js")}}
    <script>
        $('.created_at').each(function (i, obj) {
            var text = $(this).text();
            $(this).html(moment(text).fromNow());
            $(this).removeClass('hidden');
            console.log(text);
        });
    </script>
@endsection