@extends('frontend.layouts.home')

@section('title', 'Home')

@section('css-top')
@endsection

@section('header-image')

    <!-- Slider start -->
<section id="home" class="hero landing hero-section">
    <div class="video-background-container">
        <video preload="auto" autoplay loop muted class="video-background">
            <source type="video/mp4" src="{{$video}}" />
        </video>
    </div>

    <div class="parallax-overlay"></div>

    <div class="container">
        <div class="hero-content text-center">
            <div class="hero-text wow fadeIn" data-wow-delay=".8s">
                <h3 class="hero-title"><span>1st Rapid Response Force</span></h3>
                <p class="hero-description">As realistic as you can get.</p>
                <br/><br/><br/>
            </div><!--/ Hero text end -->
        </div><!--/ Hero content end -->
    </div><!--/ Container end -->
</section><!--/ Home end -->


@endsection


@section('content-1')

    <section id="aboutus">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="feature_header text-center">
                        <h2>About Us</h2>
                        <h4 class="feature_sub">The NATO RRF is a strict military simulation unit which operates within ARMA III using a wide variety of combined arms elements.<br><br>The group is mainly modelled on a US Force, bearing US Army ranks, however its structure is not directly drawn from any real world force. It is instead modelled around what allows us to deploy the best quality of functional simulation in both the meta and game space that the game and circumstance of being a sim unit instead of a real job allow.</h4>
                        <div class="divider"></div>
                    </div>
                </div>  <!-- Col-md-12 End -->
            </div>
            <br/>
            <div class="row">
                <div class="main_feature text-center">
                    <div class="col-md-3 col-xs-12 col-sm-6">
                        <div class="feature_content">
                            <i class="fa fa-sitemap"></i>
                            <h5>Structured Milsim</h5>
                            <p>The 1st RRF consists of 155 positions, each with a purpose. Infantry, Special Forces, Aviation, Naval, and Logistics, we have it all.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12 col-sm-6">
                        <div class="feature_content">
                            <i class="fa fa-asterisk"></i>
                            <h5>Authentic Enviroment</h5>
                            <p>Our environment is structured to provide an authentic atmosphere, whilst stripping out alot of the overhead that causes some MILSIM units to become stale and lifeless. </p>
                        </div>
                    </div> <!-- Col-md-4 Single_feature End -->
                    <div class="col-md-3 col-xs-12 col-sm-6">
                        <div class="feature_content">
                            <i class="fa fa-calendar"></i>
                            <h5>Operations and Training</h5>
                            <p>We provide regular operations and events to ensure a good enviroment. We schedule fortnightly operations as well as squad events twice a week.</p>
                        </div>
                    </div> <!-- Col-md-4 Single_feature End -->
                    <div class="col-md-3 col-xs-12 col-sm-6">
                        <div class="feature_content">
                            <i class="fa fa-terminal"></i>
                            <h5>Dedicated Infastructure</h5>
                            <p>We have a dedicated game, voice, and web servers in order to ensure that the 1st RRF Milsim experience is one of a kind.</p>
                        </div>
                    </div> <!-- Col-md-4 Single_feature End -->
                    <!-- <button class="btn btn-main"> Read More</button> -->
                </div>
            </div>  <!-- Row End -->
        </div>  <!-- Container End -->
    </section>
    <!-- Service Area End -->

    <div class="container">
        <hr/>
        <!-- /.row -->

        <section id="video-fact">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="landing-video">
                            <div class="video-embed wow fadeIn" data-wow-duration="1s">
                                <!-- Change the url -->
                                <iframe width="350" height="281" src="https://www.youtube.com/embed/VMZ3nMip6Zo" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="video-text">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading p2 active" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Ranks with Meaning
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body p3">
                                            We use a rank structure based on the US Army to create a rich experience and atmosphere. Our promotions are based on a point system that rewards activity and positive actions, meaning effort is directly rewarded and ranks hold value. However we make sure that ranks are limited by our unique MOS system. In the RRF, we don't hand out ranks that are not meaningful for a given position.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default ">
                                    <div class="panel-heading  p2" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Well Planned Content
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body p3">
                                            The key to success and enjoyment in an ARMA unit is great, regular gameplay in a consistent environment. At the RRF, we believe that all players should be able to enjoy great MILSIM gameplay, which is why we offer a public server, running our full modpack. Of course, no ARMA unit is complete without regular operations and events, so we schedule fortnightly operations as well as squad events twice a week.
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default ">
                                    <div class="panel-heading p2" role="tab" id="headingThree">
                                        <h4 class="panel-title">
                                            <a class="accordion-toggle" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Authentic Structure
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                        <div class="panel-body p3">
                                            We believe that there is value in the metagame that MILSIM provides. Our environment is structured to provide an authentic atmosphere, whilst stripping out alot of the overhead that causes some MILSIM units to become stale and lifeless. We have built custom systems that minimize the administrative headaches whilst maximising the time we have to play and improve our group.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- row End -->
            </div>
        </section>
@endsection

@section('content-2')
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Wide Variety of Positions</h2>
                        <p class="lead">Checkout some of our MOSs:</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <ul class="nav nav-pills" style="display:flex;justify-content:center;">
                            <li class="active"><a href="#11b-description" data-toggle="tab" aria-expanded="true">11B - Infantryman</a></li>
                            <li class="hidden-xs"><a href="#15b-description" data-toggle="tab" aria-expanded="false">15B(B1/2) - Transport Airframe Weapons Sergeant</a></li>
                            <li class="hidden-xs"><a href="#57a-description" data-toggle="tab" aria-expanded="false">57A - Simulation Operations Officer</a></li>
                            <li class="hidden-xs"><a href="#25c-description" data-toggle="tab" aria-expanded="false">25C - Radio Operator</a></li>
                            <li class=""><a href="#15q-description" data-toggle="tab" aria-expanded="false">13B (Artillery Crewmemember) </a></li>
                            <li class=""><a href="#17z-description" data-toggle="tab" aria-expanded="false">18Z - Reconnaissance Element Commander</a></li>
                        </ul>

                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" id="11b-description">
                                <div class="well well-lg">
                                    <p>
                                        11Bs make up the bulk of the RRF's fighting force. Well trained in open warfare, out 11Bs are deployed across a variety of elements, including Airborne, Air Assualt, Mechanized, Motorized and Amphibious groups.
                                    </p>
                                    <p>
                                        Many 11Bs choose never to progress further into the unit as they find that the role provides a great all round experience that is not overly time consuming.
                                    </p>
                                    <p>
                                        Our 11Bs are trained to some of the highest standards in the ARMA verse to show teamwork and discipline, whilst not operating at a level that requires enthusiast level time commitments.
                                    </p>
                                    <p>
                                        11Bs are essential to completing any objective that the RRF is assigned, normally utilizing firepower and overwhelming force tactics to complete their objective in coordination with other elements.
                                    </p>
                                    <a href="/enlistment" class="btn btn-primary">Enlist Today</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="15b-description">
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

                                    <a href="/enlistment" class="btn btn-primary">Enlist Today</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="57a-description">
                                <div class="well well-lg">
                                    <p>
                                        57As design and build operations for the RRF. It is very unusual amongst ARMA units for a member of the group to have a full time assignment of creating missions and content, however we are fortunate to have a dedicated team building top quality operations.
                                    </p>
                                    <p>
                                        Our talented team of 57As plan, design, implement and run all aspects of the RRFs operations.
                                    </p>
                                    <a href="/enlistment" class="btn btn-primary">Enlist Today</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="25c-description">
                                <div class="well well-lg">
                                    <p>
                                        25Cs within the RRF are responsible for maintaining tactical radio communications at all echelons and training the unit on standard radio operation and procedure.
                                    </p>
                                    <p>
                                        They are deployed within the formations as Radio Telephone Operators (RTO), providing long range communications with adjacent units, command, and support assets.
                                    </p>
                                    <p>
                                        Additionally, once trained and certified, 25Cs fill an additional role as Joint Terminal Air Controllers (JTAC), directing actions of combat aircraft engaged in close air support.
                                    </p>
                                    <a href="/enlistment" class="btn btn-primary">Enlist Today</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="15q-description">
                                <div class="well well-lg">
                                    <p>
                                        Our 13Bs understand how to maximize and coordinate indirect fire support effects in addtion to being highly proficent in the rapid processing and execution of fire missions.  As the experts, they train the unit in proper fire mission request procedure and advise the commander on safe employment of fires.
                                    </p>
                                    <p>
                                        They are further tasked with being prepared to forward deploy in support of ground forces operations to provide precision guidance to artillery batteries as forward observers (FOs).
                                    </p>
                                    <a href="/enlistment" class="btn btn-primary">Enlist Today</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="17z-description">
                                <div class="well well-lg">
                                    <p>
                                        18Zs lead special long range reconnaissance and direct action teams and represent the pinnacle of the RRF tactical units.  Typically handpicked from within the unit, candidates will endure rigorous training on small unit tactics, as well as a competitive selection process.
                                    </p>
                                    <p>

                                        As leaders of the special operations element, 18Zs are responsible for the training of their teams and mission planning.  They will possess all of the necessary skills and qualifications to deploy their teams by any available means, anywhere in the RRF area of operations.
                                    </p>
                                    <p>
                                        This is not an entry level position.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </div>
@endsection

@section('js-bottom')
    <script>
        $(function() {
            var BV = new $.BigVideo({container: $('#video-wrap')});
            BV.init();
            BV.show('{{$video}}',{ambient:true});
        });
    </script>
    <script src="/plugins/video-js/video.js"></script>

    <script src="/plugins/bigvideo/lib/bigvideo.js"></script>

@endsection

