
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
        <form action="{{route('loadout.save')}}" method="post">
        <h1>My Loadout - {{$user->vpf}}</h1>
        <p>You will be able to outfit your solider here. You can unlock more weapons and equipment by earning qualifications through completing schools and attending operations.</p>
        <p>To obtain your loadout simply head to the nearest armorer and stock up on ammo. On the deployment server, the system will keep track of your items and inventory and persist through multiple sessions.</p>


            <input name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <hr>
        <div class="row">
            <div class="col-lg-4 well">
                <h3>Weapons</h3>
                <a class="btn btn-primary" role="button" data-toggle="collapse" href="#primaryCollapse" aria-expanded="false" aria-controls="collapseExample">
                    Primary Weapons
                </a><br><br>
                <div class="collapse" id="primaryCollapse">
                    <div class="well">
                    @foreach($primary as $loadout)
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" style="max-height: 75px; max-width: 75px;" class="img-thumbnail" src="{{$loadout['imageSrc']}}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">{{$loadout['text']}}</h5>
                                    <p><small>Select this weapon? - <input type="radio" name="primaryWeapon" {{($loadout['selected'] == true) ? 'checked' : ''}} value="{{$loadout['value']}}"></small></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <a class="btn btn-primary" role="button" data-toggle="collapse" href="#primaryAttachCollapse" aria-expanded="false" aria-controls="collapseExample">
                    Primary Weapon Attachment
                </a><br><br>
                <div class="collapse" id="primaryAttachCollapse">
                    <div class="well">
                        <p>Make sure the attachment you have selected is compatible</p>
                        @foreach($primary_attachments as $loadout)
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" style="max-height: 75px; max-width: 75px;" class="img-thumbnail" src="{{$loadout['imageSrc']}}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">{{$loadout['text']}}</h5>
                                    <p><small>Select this attachment? - <input type="radio" name="primary_attachment" {{($loadout['selected'] == true) ? 'checked' : ''}} value="{{$loadout['value']}}"></small></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <a class="btn btn-primary" role="button" data-toggle="collapse" href="#secondaryCollapse" aria-expanded="false" aria-controls="collapseExample">
                    Sidearm Weapons
                </a><br><br>
                <div class="collapse" id="secondaryCollapse">
                    <div class="well">
                        @foreach($secondary as $loadout)
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" style="max-height: 75px; max-width: 75px;" class="img-thumbnail" src="{{$loadout['imageSrc']}}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">{{$loadout['text']}}</h5>
                                    <p><small>Select this attachment? - <input type="radio" name="secondary" {{($loadout['selected'] == true) ? 'checked' : ''}} value="{{$loadout['value']}}"></small></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <a class="btn btn-primary" role="button" data-toggle="collapse" href="#secondaryAttachCollapse" aria-expanded="false" aria-controls="collapseExample">
                    Sidearm Weapon Attachment
                </a><br><br>
                <div class="collapse" id="secondaryAttachCollapse">
                    <div class="well">
                        <p>Make sure the attachment you have selected is compatible</p>
                        @foreach($secondary_attachments as $loadout)
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" style="max-height: 75px; max-width: 75px;" class="img-thumbnail" src="{{$loadout['imageSrc']}}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">{{$loadout['text']}}</h5>
                                    <p><small>Select this attachment? - <input type="radio" name="secondary_attachment" {{($loadout['selected'] == true) ? 'checked' : ''}} value="{{$loadout['value']}}"></small></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <a class="btn btn-primary" role="button" data-toggle="collapse" href="#launcherCollapse" aria-expanded="false" aria-controls="collapseExample">
                    Launcher Weapons
                </a><br><br>
                <div class="collapse" id="launcherCollapse">
                    <div class="well">
                        @foreach($launcher as $loadout)
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" style="max-height: 75px; max-width: 75px;" class="img-thumbnail" src="{{$loadout['imageSrc']}}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">{{$loadout['text']}}</h5>
                                    <p><small>Select this weapon? - <input type="radio" name="launcherWeapons" {{($loadout['selected'] == true) ? 'checked' : ''}} value="{{$loadout['value']}}"></small></p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <a class="btn btn-primary" role="button" data-toggle="collapse" href="#launcherAttachCollapse" aria-expanded="false" aria-controls="collapseExample">
                    Launcher Weapon Attachment
                </a><br><br>
                <div class="collapse" id="launcherAttachCollapse">
                    <div class="well">
                        <p>Make sure the attachment you have selected is compatible</p>
                        @foreach($launcher_attachments as $loadout)
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" style="max-height: 75px; max-width: 75px;" class="img-thumbnail" src="{{$loadout['imageSrc']}}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">{{$loadout['text']}}</h5>
                                    <p><small>Select this attachment? - <input type="radio" name="launcher_attachment" {{($loadout['selected'] == true) ? 'checked' : ''}} value="{{$loadout['value']}}"></small></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <img class="center-block" src="{{$user->vpf->assignment->mos->image}}">
                <div class="text-center"><h4>{{$user->vpf->assignment->mos->name}}</h4></div>
            </div>
            <div class="col-lg-4 well">
                <h3>Uniform & Aesthetics</h3>

                <a class="btn btn-primary" role="button" data-toggle="collapse" href="#helmetCollapse" aria-expanded="false" aria-controls="collapseExample">
                    Helmet
                </a><br><br>
                <div class="collapse" id="helmetCollapse">
                    <div class="well">
                        @foreach($helmet as $loadout)
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" style="max-height: 75px; max-width: 75px;" class="img-thumbnail" src="{{$loadout['imageSrc']}}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">{{$loadout['text']}}</h5>
                                    <p><small>Select this weapon? - <input type="radio" name="helmet" {{($loadout['selected'] == true) ? 'checked' : ''}} value="{{$loadout['value']}}"></small></p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <a class="btn btn-primary" role="button" data-toggle="collapse" href="#uniformCollapse" aria-expanded="false" aria-controls="collapseExample">
                    Uniform
                </a><br><br>
                <div class="collapse" id="uniformCollapse">
                    <div class="well">
                        @foreach($uniform as $loadout)
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" style="max-height: 75px; max-width: 75px;" class="img-thumbnail" src="{{$loadout['imageSrc']}}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">{{$loadout['text']}}</h5>
                                    <p><small>Select this weapon? - <input type="radio" name="uniform" {{($loadout['selected'] == true) ? 'checked' : ''}} value="{{$loadout['value']}}"></small></p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <a class="btn btn-primary" role="button" data-toggle="collapse" href="#vestCollapse" aria-expanded="false" aria-controls="collapseExample">
                    Vest
                </a><br><br>
                <div class="collapse" id="vestCollapse">
                    <div class="well">
                        @foreach($vest as $loadout)
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" style="max-height: 75px; max-width: 75px;" class="img-thumbnail" src="{{$loadout['imageSrc']}}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">{{$loadout['text']}}</h5>
                                    <p><small>Select this weapon? - <input type="radio" name="vest" {{($loadout['selected'] == true) ? 'checked' : ''}} value="{{$loadout['value']}}"></small></p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <a class="btn btn-primary" role="button" data-toggle="collapse" href="#backpackCollapse" aria-expanded="false" aria-controls="collapseExample">
                    Backpack
                </a><br><br>
                <div class="collapse" id="backpackCollapse">
                    <div class="well">
                        @foreach($backpack as $loadout)
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" style="max-height: 75px; max-width: 75px;" class="img-thumbnail" src="{{$loadout['imageSrc']}}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">{{$loadout['text']}}</h5>
                                    <p><small>Select this weapon? - <input type="radio" name="backpack" {{($loadout['selected'] == true) ? 'checked' : ''}} value="{{$loadout['value']}}"></small></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <a class="btn btn-primary" role="button" data-toggle="collapse" href="#nightVisionCollapse" aria-expanded="false" aria-controls="collapseExample">
                    Nightvision
                </a><br><br>
                <div class="collapse" id="nightVisionCollapse">
                    <div class="well">
                        @foreach($nightvision as $loadout)
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" style="max-height: 75px; max-width: 75px;" class="img-thumbnail" src="{{$loadout['imageSrc']}}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">{{$loadout['text']}}</h5>
                                    <p><small>Select this weapon? - <input type="radio" name="nightvision" {{($loadout['selected'] == true) ? 'checked' : ''}} value="{{$loadout['value']}}"></small></p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <a class="btn btn-primary" role="button" data-toggle="collapse" href="#gogglesCollapse" aria-expanded="false" aria-controls="collapseExample">
                    Goggles
                </a><br><br>
                <div class="collapse" id="gogglesCollapse">
                    <div class="well">
                        @foreach($goggles as $loadout)
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object" style="max-height: 75px; max-width: 75px;" class="img-thumbnail" src="{{$loadout['imageSrc']}}">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">{{$loadout['text']}}</h5>
                                    <p><small>Select this weapon? - <input type="radio" name="goggles" {{($loadout['selected'] == true) ? 'checked' : ''}} value="{{$loadout['value']}}"></small></p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
            <button type="submit" class="btn btn-success pull-right">Save Loadout</button>
        </form>
    </div>
@endsection

@section('js-bottom')

@endsection