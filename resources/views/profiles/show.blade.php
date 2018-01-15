@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="pannel pannel-default">
                    <div class="page-header">
                        <h1>
                            {{$profileUser->name}}
                            <small>Since {{$profileUser->created_at->diffForHumans()}}</small>
                        </h1>
                    </div>
                </div>
                @foreach($activities as $date=>$activity)
                    @foreach($activity as $record)
                        @include("profiles.activities.{$record->type}",['activity'=>$record])
                    @endforeach
                @endforeach
                <div class="pagination text-center center-block">
                    {{--{{$threads->links()}}--}}
                </div>
            </div>
        </div>
    </div>
@endsection