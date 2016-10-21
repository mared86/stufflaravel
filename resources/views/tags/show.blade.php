@extends('main')
@section('title',"| Tag: $tag->name")
@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="well">
                <h1>{{$tag->name}} Tag</h1>
            </div>
            <div>@if($tag->stuff())
                    <table class="table">
                        <thead>
                        <tr>
                            <td>#</td>
                            <td>post</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tag->stuff() as $stuff)
                            <tr>
                                <td></td>
                                <td>{{$stuff->title}}</td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>

@endsection