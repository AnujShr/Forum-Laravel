<div class="panel panel-default">
    <div class="panel-heading">
        <div class="level">
            <span class="flex">
                {{$profileUser->name}} replied to a <a href="{{$activity->subject->thread->path()}}">}}">{{$activity->subject->thread->title}}</a>

                {{--{{$thread->title}}</a>--}}

            </span>
            <span>
             {{--{{$thread->created_at->diffForHumans()}}--}}
             </span>
        </div>
    </div>
    <div class="panel-body">
        <article>
            <h4>
                {{$activity->subject->body}}
            </h4>
        </article>
        <hr>
    </div>
</div>