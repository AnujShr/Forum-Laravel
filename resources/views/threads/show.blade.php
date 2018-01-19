@extends('layouts.app')

@section('content')
    <thread-view :initial-replies-count="{{ $thread->replies_count }}" inline-template>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="level">
                            <span class="flex">
                                <a href="{{route('profile',$thread->owner)}}">{{$thread->owner->name}}</a>
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

                    <replies :data="{{ $thread->replies }}" @removed="repliesCount--"></replies>

                </div>
                {{--{{$replies->links()}}--}}

                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p>
                                This thread was published {{$thread->created_at->diffForHumans()}} by
                                <a href="#">{{$thread->owner->name}}</a> and currently
                                has <span v-text="repliesCount"> </span> {{str_plural('reply',$thread->replies_count)}}.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </thread-view>
@endsection
