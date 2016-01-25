@extends('layouts.app')

@section('content')
    <div class="col-md-10 col-md-offset-1">
        @if ( Route::currentRouteName() == 'profiles.search' )
            <a href="{{route('profiles.index')}}">View All Profiles</a>
        @endif

        @if (count($user_profiles) > 0)
            {!! $user_profiles->render() !!}
            @include('profiles.search')
            <div class="clearfix"></div>
            @foreach ($user_profiles as $user_profile)
                <div class="col-xs-12 col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{$user_profile->name}}</div>
                        <a href="{{ route('profiles.show', ['id' => $user_profile->id]) }}">
                            @if($user_profile->profile['profile_image'])
                                <img class="img-responsive img-thumbnail index-thumb" src ="{{ URL::asset('/images/'.$user_profile->profile['profile_image']) }}"/>
                            @else
                                <img class="img-responsive img-thumbnail index-thumb" src ="{{ URL::asset('/images/nophoto_user.png') }}"/>
                            @endif
                        </a>
                        <div class="panel-body index-body">
                            @if($user_profile['profile']['location'])
                                <label>Location: </label> {{ $user_profile['profile']['location']}}
                            @endif
                            <br/>
                            @if($user_profile['profile']['twitter_username'])
                                <label>Twitter: </label>  <a href ="https://twitter.com/{{ $user_profile['profile']['twitter_username']}}">{{ $user_profile['profile']['twitter_username']}}</a>
                            @endif
                            <br/>
                            @if($user_profile['profile']['github_username'])
                                <label>Github: </label>  <a href ="https://github.com/{{ $user_profile['profile']['github_username']}}">{{ $user_profile['profile']['github_username']}}</a>
                            @endif
                            <br/>
                            @if($user_profile['profile']['bio'])
                                <label>Bio: </label> {{ str_limit( $user_profile['profile']['bio'], $limit = 20, $end = '...') }}
                            @endif
                            <br/>
                            <a href="{{ route('profiles.show', ['id' => $user_profile->id]) }}"><i class="fa fa-btn fa-user"></i>View Full Profile</a>

                        </div>
                    </div>
                </div>
            @endforeach
            {!! $user_profiles->render() !!}
        @else
            <h3>No Users Found</h3>

        @endif

    </div>
@endsection
