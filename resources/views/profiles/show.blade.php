@extends('layouts.app')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">{{$user->name}}</div>

            <div class="panel-body">
                @if( isset($user->profile) )
                    <div class="col-xs-12 col-md-4">
                        @if($user->profile->profile_image)
                            <img class="img-responsive img-thumbnail" src ="{{ URL::asset('/images/'.$user->profile->profile_image) }}"/>
                        @else
                            <img class="img-responsive img-thumbnail" src ="{{ URL::asset('/images/nophoto_user.png') }}"/>
                        @endif
                    </div>
                    @if($user->profile->location)
                        <label>Location: </label> {{ $user->profile['location']}}
                    @endif
                    <br/>
                    @if($user->profile->twitter_username)
                        <label>Twitter: </label>  <a href ="https://twitter.com/{{ $user->profile->twitter_username}}">{{ $user->profile->twitter_username}}</a>
                    @endif
                    <br/>
                    @if($user->profile->github_username)
                        <label>Github: </label>  <a href ="https://github.com/{{ $user->profile->github_username}}">{{ $user->profile->github_username}}</a>
                    @endif
                    <br/>
                    @if($user->profile->bio)
                        <label>Bio: </label> {{ str_limit( $user->profile['bio'], $limit = 50, $end = '...') }}
                    @endif
                    <br/>

                    @if (Auth::user()->id && Auth::user()->id == $user->id)
                        <a class="pull-right" href ="{{route('profiles.edit', ['id' => Auth::user()->id])}}"><i class="fa fa-edit"></i>Edit your profile here.</a>
                    @endif
                @else
                    @if (Auth::user())
                        <a href ="{{route('profiles.edit', ['id' => Auth::user()->id])}}"><i class="fa fa-exclamation-triangle"></i> You haven't set any profile info yet. Edit here.</a>
                    @else
                        <h4>{{$user->name}} has not set up his profile info yet</h4>
                    @endif

                @endif

            </div>
        </div>
    </div>

@endsection
