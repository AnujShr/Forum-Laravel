@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="pannel pannel-default">
                    <div class="page-header">
                        <h1>
                            {{$profileUser->name}}
                        </h1>
                    </div>
                </div>
                @forelse($activities as $date=>$activity)
                    <h3 class="page-header">{{$date}}</h3>
                    @foreach($activity as $record)
                        @if(view()->exists("profiles.activities.{$record->type}"))
                            @include("profiles.activities.{$record->type}",['activity'=>$record])
                        @endif
                    @endforeach
                    @empty
                    <p>No activity of this User Yet!</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection