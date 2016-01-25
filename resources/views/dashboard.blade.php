@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Hi {{$user->name}}</div>

                    <div class="panel-body">
                        @if (Auth::user()->isAdmin())
                            <a class="dashboard-action" href ="{{route('profiles.index')}}"><i class="fa fa-users"></i>View all Profiles.</a><br/>    
                        @endif
                        <a class="dashboard-action" href ="{{route('profiles.edit', ['id' => Auth::user()->id])}}"><i class="fa fa-edit"></i>Edit your Profile.</a><br/>
                        <a class="dashboard-action" href ="{{route('profiles.show', ['id' => Auth::user()->id])}}"><i class="fa fa-eye"></i>View your Public Profile.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
