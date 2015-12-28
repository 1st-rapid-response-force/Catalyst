@extends('frontend.layouts.master')

@section('title', 'FAQs')

@section('css-top')
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">FAQs</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>FAQs</h1>

        <div class="row">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#FAQOne" aria-expanded="false" aria-controls="collapseOne">
                                What are the requirements to be a member of the 1st RRF?
                            </a>
                        </h4>
                    </div>
                    <div id="FAQOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <h5>Membership Criteria</h5>
                            <ul class="no-list-style">
                                <li>Members must be over the age of 18.</li>
                                <li>Members will be required to be citizens of a NATO member country to partake.</li>
                                <li>Members will need to be able to commit to a weekly operations and training schedule</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#FAQTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Why am I required to login with Steam?
                            </a>
                        </h4>
                    </div>
                    <div id="FAQTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                            1st Rapid Response Force systems use Steam Open ID authentication for login. For more information <a href="http://steamcommunity.com/dev">click here.</a>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#FAQThree" aria-expanded="false" aria-controls="collapseThree">
                                How do I download the modpack?
                            </a>
                        </h4>
                    </div>
                    <div id="FAQThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                            <p>The 1st RRF Modpack consist of several mods complied to ensure the best simulation experience. You will need <a href="/downloads/arma3sync.exe">Arma3Sync</a> in order to set up the repository. It is important to note that our modpack is publicly available and required for play on our public servers.</p>
                            <h5>Instructions on setting up the Repository</h5>
                            <ol class="no-list-style">
                                <li> - Once ARMA3Sync is installed, click on the Repositories tab</li>
                                <li> - Click on the blue plus button and a pop up window will appear</li>
                                <li> - Use the following settings:
                                    <ul class="no-list-style">
                                        <li> ---- Repository Name: 1st RRF</li>
                                        <li> ---- File Transfer Protocol: HTTP</li>
                                        <li> ---- Host or URL: http://content.1st-rrf.com/modpack</li>
                                        <li> ---- Port: 80</li>
                                        <li> ---- Login set to anonymous</li>
                                    </ul>
                                </li>
                                <li> - Once the Repository is added, it will appear in your addon repositories, you can then press the last icon on the right hand side to enter the repository</li>
                                <li> - You should be able to check for addons via the green checkmark and then press the download addons button to begin downloading all the addons</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('js-bottom')
@endsection
