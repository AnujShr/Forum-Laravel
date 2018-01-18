<reply inline-template>
    <div id="reply-{{$reply->id}}" class="panel panel-default">
        <div class="panel-heading">
            <div class="level">
                <h5 class="flex">
                    <a href="/profiles/{{$reply->owner->name}}">
                        {{$reply->owner->name}}
                    </a> said {{$reply->created_at->diffForHumans()}}. . . . .
                </h5>
                {!! Form::open(['url'=> '/replies/'.$reply->id.'/favourite', 'method'=>"post"]) !!}
                {{Form::submit($reply->favourites_count.' '.str_plural('Favourite',$reply->favourites_count),(['class'=>"btn btn-default" ,($reply->isFavourited())?'disabled':'']))}}
                {{Form::close()}}

            </div>
        </div>
        <div class="panel-body">
            <div v-if="editing">
                <textarea class="form-control"></textarea>
            </div>
            <div v-else>
                <h5>
                    {{$reply->body}}
                </h5>
            </div>
            <hr>
        </div>
        @can('update',$reply)
            <div class="panel-footer level">
                <button class="btn btn-xs mr-1" @click="editing = true">Edit</button>
                {!!Form::open(['url'=>'/replies/'.$reply->id,'method'=>'post'])!!}
                {{method_field('DELETE')}}
                {{Form::submit('Delete Reply',['class'=>'btn btn-danger btn-xs'])}}
                {{Form::close()}}
            </div>

        @endcan
    </div>
</reply>