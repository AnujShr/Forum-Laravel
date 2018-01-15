@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="level">
                            <span class="flex"><a
                                        href="{{route('profile',$thread->owner)}}">{{$thread->owner->name}}</a>
                                posted:
                                {{$thread->title}}
                            </span>
                            @can('update',$thread)
                            {!! Form::open(['url'=> $thread->path(), 'method'=>"post"]) !!}
                            {{method_field('delete')}}

                            {{Form::submit('Delete Thread',['class'=>'btn btn-danger btn-xs'])}}

                            {{Form::close()}}
                            @endcan
                        </div>
                    </div>
                    <div class="panel-body">
                        <article>
                            <h4>
                                {{$thread->body}}
                            </h4>
                        </article>
                        <hr>
                    </div>
                </div>

                @foreach($replies as $reply)
                    @include('threads.reply');
                @endforeach
                <div class="pagination text-center center-block">
                    {{$replies->links()}}
                </div>
                @if(auth()->check())
                    {!! Form::open(['url'=> $thread->path().'/replies', 'method'=>"post"]) !!}
                    <div class="form-group">
                        {{Form::textarea('body',null,(['class'=>"form-control" ,'rows'=>"5",'placeholder'=>"Have Something To Say?"]))}}
                        {{Form::submit('Reply',(['class'=>'btn btn-primary  btn-block']))}}
                        {{Form::close()}}
                    </div>
                @else
                    <h4><p class="text-center"> Please <a href="{{route('login')}}">Sign In </a>To Reply!!!</p></h4>
                @endif
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>
                            This thread was published {{$thread->created_at->diffForHumans()}} by
                            <a href="#">{{$thread->owner->name}}</a> and currently
                            has {{$thread->replies_count}} {{str_plural('reply',$thread->replies_count)}}.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
