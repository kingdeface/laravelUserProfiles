@extends('layouts.app')

@section('content')
    @include('common.errors')
    @include('common.success')
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Profile</div>

            <div class="panel-body">
                {!! Form::model($user->profile,['route' => ['profiles.update',$user->id] , 'method' => 'put', 'files'=> true]) !!}

                <div class="col-xs-4 col-md-2 form-group">
                    @if($user->profile['profile_image'])
                        <img class="img-responsive img-thumbnail" src ="{{ URL::asset('/images/'.$user->profile['profile_image']) }}"/>
                    @else
                        <img class="img-responsive img-thumbnail" src ="{{ URL::asset('/images/nophoto_user.png') }}"/>
                    @endif
                </div>
                <div class="form-group col-xs-12 col-md-8">
                    {!! Form::label('profile_image', 'Profile Image:') !!}
                    {!! Form::file('profile_image', null, ['class' => 'form-control']) !!}
                </div>
                <div class="clearfix"></div>
                <div class="form-group col-xs-12 col-md-10">
                    {!! Form::label('location', 'Location:') !!}
                    {!! Form::text('location', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-xs-12 col-md-5">
                    {!! Form::label('twitter_username', 'Twitter Username:') !!}
                    {!! Form::text('twitter_username', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-xs-12 col-md-5">
                    {!! Form::label('github_username', 'Github Username:') !!}
                    {!! Form::text('github_username',null,['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-xs-12 col-md-10">
                    {!! Form::label('bio', 'BIO') !!}
                    {!! Form::textarea('bio',null,['class' => 'form-control']) !!}
                </div>
                <div class="clearfix"></div>
                <div class = "form-group pull-right">
                    {!! Form::submit('Update Profile',['class' => 'btn btn-default']) !!}
                </div>

                {!! Form::close() !!}
                <a href="{{ route('profiles.show', ['id' => Auth::user()->id]) }}"><i class="fa fa-btn fa-user"></i>View Profile</a>
            </div>
        </div>
    </div>

@endsection
<script>
function initAutocomplete() {
    // Create the search box and link it to the UI element.
    var input = document.getElementById('location');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
}
</script>

</body>
