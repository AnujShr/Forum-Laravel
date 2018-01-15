@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a New Thread</div>
                    <div class="panel-body">
                        {!!Form::open(['url'=>'/threads','method'=>'post']) !!}
                        <div class="form-group">
                            <label for="channel_id">Choose a Channel:</label>
                            <select class="form-control" name="channel_id">
                                <option value="0">Select a Channel</option>
                                @foreach($channels as $channel)
                                    <option value="{{$channel->id}}">{{$channel->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="body">Title</label>
                            {{Form::text('title',old('title'),(['class'=>"form-control",'required'=>'required']))}}
                        </div>

                        <div class="form-group">
                            <label for="body">Body</label>
                            {{Form::textarea('body',null,(['class'=>"form-control",'rows'=>"8",'required'=>'required']))}}
                        </div>
                        <div class="form-group">
                            {{Form::submit('Publish',(['class'=>"btn btn-primary btn-block"]))}}
                            {{Form::close()}}
                        </div>
                        @if(count($errors))
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
