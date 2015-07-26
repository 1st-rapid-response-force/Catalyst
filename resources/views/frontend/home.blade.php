@extends('frontend.layouts.master')

@section('header-image')
    <div class="row" style="height: 400px;position:relative;background-image:url('http://i.imgur.com/1X7YmJ9.jpg');padding:50px;background-size: cover;">
        <h1>Combined Arms MILSIM</h1>
        <h2>Done Right</h2>
    </div>

@endsection
@section('content')
    <div class="container">
        <hr />
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Be the Best</h1>
                <p class="lead">How we do it:</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Ranks with Meaning</h4></div>
                    <div class="panel-body" style="height:282px;">
                        We use a rank structure based on the US Army to create a rich experience and atmosphere.
                        <br />
                        <br />
                        Our promotions are based on a point system that rewards activity and positive actions,
                        meaning effort is directly rewarded and ranks hold value.
                        <br />
                        <br />
                        However we make sure that ranks are limited by our unique MOS system. In the RRF, we don't hand
                        out ranks that are not meaningful for a given position.
                    </div>
                    <div class="panel-footer"><a href="#">Read more on our FAQ Page</a></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Well Planned Content</h4></div>
                    <div class="panel-body" style="height:282px;">
                        The key to success and enjoyment in an ARMA unit is great, regular gameplay in a consistent environment.
                        <br />
                        <br />
                        At the RRF, we believe that all players should be able to enjoy great MILSIM gameplay, which is why we
                        offer a public server, running our full modpack.
                        <br />
                        <br />
                        Of course, no ARMA unit is complete without regular operations and events, so we schedule fortnightly operations as well as squad events twice a week.
                    </div>
                    <div class="panel-footer"><a href="#">Read more on our Servers Page</a></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>Authentic Structure</h4></div>
                    <div class="panel-body" style="height:282px;">
                        We believe that there is value in the metagame that MILSIM provides.
                        <br />
                        <br />
                        Our environment is structured to provide an authentic atmosphere, whilst stripping out alot of the overhead that causes some MILSIM units to become stale and lifeless.
                        <br />
                        <br />
                        We have built custom systems that minimize the administrative headaches whilst maximising the time we have to play and improve our group.
                        <br />
                        <br />
                    </div>
                    <div class="panel-footer"><a href="#">Read more on our Structure Page</a></div>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <hr />

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Wide Variety of Positions</h1>
                <p class="lead">Checkout some of our MOSs:</p>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <ul class="nav nav-pills" style="display:flex;justify-content:center;">
                    <li class="active"><a href="#home" data-toggle="tab" aria-expanded="true">11B - Infantryman</a></li>
                    <li class="hidden-xs"><a href="#profile" data-toggle="tab" aria-expanded="false">15B(B1/2) - Transport Airframe Weapons Sergeant</a></li>
                    <li class="hidden-xs"><a href="#profile" data-toggle="tab" aria-expanded="false">57A - Simulation Operations Officer</a></li>
                    <li class="hidden-xs"><a href="#profile" data-toggle="tab" aria-expanded="false">25C - Radio Operator</a></li>
                    <li class=""><a href="#profile" data-toggle="tab" aria-expanded="false">15Q - Air Traffic Control Specialist </a></li>
                    <li class=""><a href="#profile" data-toggle="tab" aria-expanded="false">17Z - Reconnaissance Element Commander</a></li>
                </ul>

                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="home">
                        <div class="well well-lg">
                            <p>
                                11Bs make up the bulk of the RRF's fighting force. Well trained in open warfare, out 11Bs are deployed across a variety of elements, including Airborne, Air Assualt, Mechanized, Motorized and Amphibious groups.
                            </p>
                            <p>
                                11Bs are essential to completing any objective that the RRF is assigned, normally utilizing firepower and overwhelming force tactics to complete their objective in coordination with other elements.
                            </p>
                            <a href="#" class="btn btn-primary">Enlist Today</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile">
                        <div class="well well-lg">
                            <p>
                                15Bs are Weapons Sergeants on our Airframes. The (B1/2) designator identifies this as a position on one of our medium or heavy transport airframes, the the UH-60 and the CH-47 respectively.
                            </p>
                            <p>
                                The Weapons Sergeant is in charge of the armamemnts of the aircraft and effectively coordinating the firepower on insertions and in support of the infantry.
                            </p>
                            <p>
                                This wide ranging position will see the individual utilizing weapons from Designated Rifles all the way to the might Vulcan Minigun to provide support to their comrades on the ground and their teammates in the airframe with them.
                            </p>
                            <p>
                                15Bs are essential to the safe operation of the RRFs Aircraft and serve as a great stepping stone into the Pilot Positions.
                            </p>

                            <a href="#" class="btn btn-primary">Enlist Today</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="dropdown1">
                        <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
                    </div>
                    <div class="tab-pane fade" id="dropdown2">
                        <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

