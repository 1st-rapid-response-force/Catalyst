
@extends('frontend.layouts.master')

@section('title', 'My Loadout')

@section('css-top')
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{{route('vpf')}}">{{$user->vpf}}</a></li>
        <li class="active">My Loadout</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>My Loadout - {{$user->vpf}}</h1>
        <div class="row">
            <div class="col-lg-4 well">
                <h3>Primary Weapon</h3>
                <select class="form-control">
                    <option>None</option>
                    <option>M4</option>
                    <option>M4 (AFG)</option>
                    <option>M4 (Carryhandle)</option>
                    <option>M4 (Grippod)</option>
                    <option>M4 (M203)</option>
                    <option>M4 (M320)</option>
                    <option>M4A1</option>
                    <option>M4A1 (AFG)</option>
                    <option>M4A1 (Carryhandle)</option>
                    <option>M4A1 (Grippod)</option>
                    <option>M4A1 (M203)</option>
                    <option>M4A1 (M320)</option>
                    <option>M4 PIP</option>
                    <option>M4 PIP (AFG)</option>
                    <option>M4 PIP (Carryhandle)</option>
                    <option>M4 PIP (Grippod)</option>
                    <option>M4 PIP (M203)</option>
                    <option>M4 PIP (M320)</option>
                    <option>M16A4</option>
                    <option>M16A4 (Carryhandle/Grippod)</option>
                    <option>M16A4 (Carryhandle/M203)</option>
                    <option>M249 PIP</option>
                </select>
                <h3>Sidearm Weapon</h3>
                <select class="form-control">
                    <option>None</option>
                    <option>M1911A1</option>
                    <option>FNX-45 Tactical</option>
                    <option>P99</option>
                    <option>MP-443</option>
                </select>
                <h3>Launcher</h3>
                <select class="form-control">
                    <option>None</option>
                    <option>FGM-148 Javelin</option>
                    <option>M136 (HEAT)</option>
                    <option>M136 (HEDP)</option>
                    <option>M136 (HP)</option>
                </select>
            </div>
            <div class="col-lg-4">
                <img class="center-block" src="{{$user->vpf->assignment->mos->image}}">
                <div class="text-center"><h4>{{$user->vpf->assignment->mos->name}}</h4></div>
            </div>
            <div class="col-lg-4 well">
                <h3>Primary Weapon</h3>
            </div>
        </div>

    </div>
@endsection

@section('js-bottom')
@endsection
