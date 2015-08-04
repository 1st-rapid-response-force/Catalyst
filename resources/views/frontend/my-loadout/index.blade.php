
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
        <p>You will be able to outfit your solider here. You can unlock more weapons and equipment by earning qualifications through completing schools and attending operations.</p>
        <p>To obtain your loadout simply head to the nearest armorer and stock up on ammo. On the deployment server, the system will keep track of your items and inventory and persist through multiple sessions.</p>
        <div class="row">
            <div class="col-lg-4 well">
                <h3>Weapons</h3>
                <h4>Primary Weapon</h4>
                <div id="primaryWeapons"></div>
                <h4>Sidearm Weapon</h4>
                <div id="secondaryWeapons"></div>
                <h4>Launcher</h4>
                <div id="launcherWeapons"></div>
            </div>
            <div class="col-lg-4">
                <img class="center-block" src="{{$user->vpf->assignment->mos->image}}">
                <div class="text-center"><h4>{{$user->vpf->assignment->mos->name}}</h4></div>
            </div>
            <div class="col-lg-4 well">
                <h3>Uniform & Aesthetics</h3>
                <h4>Night Vision</h4>
                <div id="nightvision"></div>
                <h4>Helmet</h4>
                <div id="helmet"></div>
                <h4>Goggles</h4>
                <div id="goggles"></div>
                <h4>Uniform</h4>
                <div id="uniform"></div>
                <h4>Vest</h4>
                <div id="vest"></div>
                <h4>Backpack</h4>
                <div id="backpack"></div>
            </div>
        </div>

    </div>
@endsection

@section('js-bottom')
    <script type="text/javascript">
        $(function () {
            var primaryJSON = {!! $loadout[0]->toJSON() !!};
            var secondaryJSON = {!! $loadout[1]->toJSON() !!};
            var launcherJSON = {!! $loadout[2]->toJSON() !!};

            var nightvisionJSON = {!! $loadout[3]->toJSON() !!};
            var helmetJSON = {!! $loadout[5]->toJSON() !!};
            var gogglesJSON = {!! $loadout[6]->toJSON() !!};
            var uniformJSON = {!! $loadout[7]->toJSON() !!};
            var vestJSON = {!! $loadout[8]->toJSON() !!};
            var backpackJSON = {!! $loadout[9]->toJSON() !!};

            $('#primaryWeapons').ddslick({
                data:primaryJSON,
                width:300,
                selectText: "Select your Primary Weapon",
                imagePosition:"left"
            });
            $('#secondaryWeapons').ddslick({
                data:secondaryJSON,
                width:300,
                selectText: "Select your Secondary Weapon",
                imagePosition:"left"
            });
            $('#launcherWeapons').ddslick({
                data:launcherJSON,
                width:300,
                selectText: "Select your Launcher",
                imagePosition:"left"
            });

            $('#helmet').ddslick({
                data:helmetJSON,
                width:300,
                selectText: "Select your Helmet",
                imagePosition:"left"
            });
            $('#nightvision').ddslick({
                data:nightvisionJSON,
                width:300,
                selectText: "Select your Nightvision",
                imagePosition:"left"
            });

            $('#uniform').ddslick({
                data:uniformJSON,
                width:300,
                selectText: "Select your Uniform",
                imagePosition:"left"
            });
            $('#goggles').ddslick({
                data:gogglesJSON,
                width:300,
                selectText: "Select your Goggles",
                imagePosition:"left"
            });

            $('#vest').ddslick({
                data:vestJSON,
                width:300,
                selectText: "Select your Vest",
                imagePosition:"left"
            });

            $('#backpack').ddslick({
                data:backpackJSON,
                width:300,
                selectText: "Select your Backpack",
                imagePosition:"left"
            });




        });
    </script>
    <script type="text/javascript" src="/plugins/ddslick/jquery.ddslick.min.js"></script>
@endsection
