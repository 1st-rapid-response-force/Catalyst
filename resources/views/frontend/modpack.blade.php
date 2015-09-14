@extends('frontend.layouts.master')

@section('title', 'Modpack')

@section('css-top')
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Modpack</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>Modpack</h1>
        <p>The 1st RRF Modpack consist of several mods complied to ensure the best simulation experience. You will need <a href="/downloads/arma3sync.exe">Arma3Sync</a> in order to set up the repository. It is important to note that our modpack is publicly available and required for play on our public servers.</p>
        <h2>Instructions on setting up the Repository</h2>
        <ol>
            <li>Once ARMA3Sync is installed, click on the Repositories tab</li>
            <li>Click on the blue plus button and a pop up window will appear</li>
            <li>Use the following settings:
                <ul>
                    <li>Repository Name: 1st RRF</li>
                    <li>File Transfer Protocol: HTTP</li>
                    <li>Host or URL: http://content.1st-rrf.com/modpack</li>
                    <li>Port: 80</li>
                    <li>Login set to anonymous</li>
                </ul>
            </li>
            <li>Once the Repository is added, it will appear in your addon repositories, you can then press the last icon on the right hand side to enter the repository</li>
            <li>You should be able to check for addons via the green checkmark and then press the download addons button to begin downloading all the addons</li>
        </ol>
        <h2>Modpack</h2>
        <p>All mods have been signed with 1st RRF Server signatures to ensure correct mod packages and to remove mismatch errors.</p>
        <div class="row">
            <div class="col-lg-6">
                <h3>@1rrf_map</h3>
                <ul>
                    <li><a href="http://www.armaholic.com/page.php?id=26682">All-in-ARMA</a></li>
                    <li><a href="http://www.armaholic.com/page.php?id=15580">Clafghan</a></li>
                </ul>
                <h3>@1rrf_troops</h3>
                <ul>
                    <li><a href="http://www.armaholic.com/page.php?id=27291">ASDJ_Jointmuzzles</a></li>
                    <li><a href="http://www.armaholic.com/page.php?id=23242">ASDJ_Jointrails</a></li>
                    <li><a href="http://www.armaholic.com/page.php?id=25638">CLF Radios</a></li>
                    <li><a href="http://www.armaholic.com/page.php?id=27353">Leights OPFOR Pack</a></li>
                    <li><a href="http://www.armaholic.com/page.php?id=23667">Task Force Apache Uniform Pack</a></li>
                    <li><a href="http://www.armaholic.com/page.php?id=29033">3CB BAF Equipment</a></li>
                    <li><a href="https://forums.bistudio.com/topic/171731-undersiege-patches-insignias/">UnderSiege Patches & Insignias</a></li>
                    <li><a href="http://www.armaholic.com/page.php?id=23806">Campaign Hat</a></li>
                    <li><a href="https://forums.bistudio.com/topic/177648-codi-artillerycomputer/">CODI_ArtilleryComputer</a></li>
                    <li><a href="https://forums.bistudio.com/topic/163106-toadies-smallarms-and-animations-for-arma3/">HLC (Core, SAW, FHAWC) </a></li>
                    <li><a href="http://www.armaholic.com/page.php?id=27129">FA-18X Black Wasp</a></li>
                    <li><a href="http://www.armaholic.com/page.php?id=26428">Specialist Military Arms (SMA)</a></li>
                    <li><a href="http://www.armaholic.com/page.php?id=23277">Robert Hammer (M4/M16, Pistol, Acc)</a></li>
                    <li><a href="https://forums.bistudio.com/topic/181815-zades-backpack-on-chest/">Zade Backpack on Chest</a></li>
                </ul>
            </div>
            <div class="col-lg-6">
                <h3>Non Integrated Mods</h3>
                <ul>
                    <li><a href="http://ace3mod.com/">ACE 3</a></li>
                    <li><a href="http://www.armaholic.com/page.php?id=18767">CBA A3</a></li>
                    <li><a href="http://www.rhsmods.org/mod/1">RHS AFRF3</a></li>
                    <li><a href="http://www.rhsmods.org/mod/2">RHS USF3</a></li>
                    <li><a href="http://radio.task-force.ru/en/">Task Force Radio</a></li>
                </ul>
                <h3>@1rrf_utility</h3>
                <ul>
                    <li><a href="https://forums.bistudio.com/topic/175053-ares-modules-expanding-zeus-functionality-release-thread/">Ares Zeus Extensions</a></li>
                    <li><a href="https://forums.bistudio.com/topic/174088-no-chain/">No Chain</a></li>
                    <li><a href="http://www.armaholic.com/page.php?id=9936">STHUD & STGI</a></li>
                    <li><a href="http://dslyecxi.com/shacktac_wp/shacktac-mods/shacktac-map-gestures/">STHUD Map Gestures</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('js-bottom')
@endsection
