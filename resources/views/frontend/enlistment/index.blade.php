@extends('frontend.layouts.master')

@section('css-top')
    <link rel="stylesheet" type="text/css" href="/frontend/css/gridforms.css">
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Enlistment</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>Enlistment</h1>
        <h2>1st Rapid Respond Force Enlistment Process</h2>
        <h3>Overview</h3>
        <p>The NATO RRF is a strict military simulation unit which operates within ARMA III using a wide variety of combined arms elements.</p>
        <p>The group is mainly modelled on a US Force, bearing US Army ranks, however its structure is not directly drawn from any real world force. It is instead modelled around what allows us to deploy the best quality of functional simulation in both the meta and game space that the game and circumstance of being a sim unit instead of a real job allow.</p>
        <h3>Membership Criteria</h3>
        <p>The RRF is a NATO group and as such members will be required to be citizens of a NATO member country to partake. The RRF will issue clear and precise forward guidance, at least three months in advance, that details timing. Command Group will also issue clear and immutable ( May only be modified with three months notice of modification ) blocks of time where members are expected to be able to commit, however the schedule will advise which of these blocks they are required to commit to.</p>
        <h1>Apply to the 1st RRF</h1>
        <ol>
            <li>Check your eligibility:</li>
            <ul>
                <li>Members must own a legal copy of ARMA 3.</li>
                <li>Members must have a clean Steam VAC and BattlEye Record</li>
                <li>Members must be over the age of 18.</li>
                <li>Members will be required to be citizens of a NATO member country to partake.</li>
                <li>Members will need to be able to commit to a weekly operations and training schedule.</li>
                <li>Members will need speak english in order to properly communicate with the unit.</li>
                <li>Members will need to not be affiliated, enlisted, or active in any other MILSIM Unit/Community within ARMA.</li>
            </ul>
            <li>Review the <a href="/structure-assignments">Structure and Assignments</a> and the Disciplinary Policy before completing your application.</li>
            <li>Login/Create an account with us, if you are new, we will direct you to a registration page, if you are an existing member, we will log you in. - <small>For more information on Steam Open ID <a href="http://steamcommunity.com/dev">click here.</a></small>
            </li>
            <li>Fill out the Application and wait for a reply</li>
            <li><a href="/modpack">Download Infil</a>, our ARMA 3 modpack updater and launcher, constructed in house by 1st RRF members (we have a public server, so while you wait you can start to play)</li>
            <li>Be active and participate in the community.</li>
        </ol>
        <p> </p>
        <h3>Available Assignments</h3>
        <ol>
            @if(!$availMOSs->count() == 0)
            @foreach($availMOSs as $mos)
                <li><a href="{{route('enlistments.create', $mos->id)}}">{{$mos->name}}</a></li>
            @endforeach
            @else
                <p class="text-center">There are currently no open slots, we will send out an email when more slots become available</p>
            @endif
        </ol>
    </div>
@endsection

@section('js-bottom')
    <script type="text/javascript" src="/frontend/js/gridforms.js"></script>
@endsection

