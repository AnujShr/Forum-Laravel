<reply :attributes="{{ $reply }}" inline-template v-cloak>
    <div id="reply-{{$reply->id}}" class="panel panel-default">
        <div class="panel-heading">
            <div class="level">
                <h5 class="flex">
                    <a href="/profiles/{{$reply->owner->name}}">
                        {{$reply->owner->name}}
                    </a> said {{$reply->created_at->diffForHumans()}}. . . . .
                </h5>

                <div>
                    <favourite :reply="{{ $reply }} "  user="{{ auth()->check()}}"></favourite>

                </div>

            </div>
        </div>
        <div class="panel-body">
            <div v-if="editing">
                <div class="form-group">
                    <textarea class="form-control" v-model="body"></textarea>
                </div>
                <button class="btn btn-sm btn-primary outline" @click="update">Update</button>
                <button class="btn btn-sm btn-delete outline" @click="editing = false">Close</button>
            </div>
            <div v-else v-text="body"></div>
            <hr>
        </div>
        @can('update',$reply)
            <div class="panel-footer level">
                <button class="btn btn-xs mr-1" @click="editing = true">Edit</button>
                <button class="btn btn-xs btn btn-danger mr-1" @click="destroy">Delete</button>

            </div>

        @endcan
    </div>
</reply>