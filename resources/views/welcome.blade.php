@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @foreach($users->chunk(3) as $userSet)
            <div class="row">
                @foreach($userSet as $user)
                    <div class="col-sm-4">
                    
                        <div class="panel panel-default">
                        
                            <div class="panel-heading">
                            
                                <img src="https://gravatar.com/avatar/{{ md5(strtolower(trim($user->email))) }}" class="img-responsive img-circle" alt="Avatar of {{ $user->name }}">

                                <h2>{{ $user->name }}</h2>
                                    <p>
                                    <small>{{ $user->email }}</small>
                                    </p>
                                <div class="well">
                                    <h4>Latest Post</h4>

                                    {{ $user->lastPost->title }}
                                    </div>
                                <div>

                            </div>                        

                            <div class="panel-body" style="max-height: 200px; overflow: scroll;">
                            
                                <h4>All Posts</h4>

                                    @foreach($user->posts as $post)
                                    <h4>{{ $post->title }}</h4>
                                    <small>{{ $post->created_at->diffForHumans() }}</small>
                                    @endforeach
                                </div>                             
                            
                            </div>
                        
                        </div>
                    
                    </div>
                @endforeach
            </div>
        @endforeach        
    </div>
@endsection
