@extends('layouts.scaffold')

@section('content')
<div class="row">
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">

        <h1>Profile</h1>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">{{ Auth::user()->username }}</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                        <ul class="list-group">
                    <li class="list-group-item">
                        <b>Username</b> <span class="pull-right">{{ Auth::user()->username }}</span>
                    </li>
                    <li class="list-group-item">
                        <b>Name</b> <span class="pull-right">{{ Auth::user()->name }}</span>
                    </li>
                    <li class="list-group-item">
                        <b>Email</b> <span class="pull-right">{{ Auth::user()->email }}</span>
                    </li>
                </ul>
                    </div>

                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
