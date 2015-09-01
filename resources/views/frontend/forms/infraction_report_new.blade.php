@extends('frontend.layouts.master')

@section('title', 'Infraction Report Form')

@section('css-top')
    <link rel="stylesheet" type="text/css" href="/frontend/css/gridforms.css">
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li class="active">Forms</li>
        <li class="active">IR - New Form</li>
    </ol>
@endsection

@section('content')
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="grid-form" method="post" action="{{route('vpf.forms.store', 'ir')}}">
                {!! csrf_field() !!}
                <div class="text-center"><legend><strong>INFRACTION REPORT FORM</strong><br> 1ST RAPID RESPONSE FORCE<br><br></legend></div>
                <div class="text-center"><h3>PRIVACY ACT STATEMENT</h3></div>
                <p><strong>AUTHORITY: </strong> 1ST-RRF-POLICIES-PROCEDURES</p>
                <p><strong>PRINCIPAL PURPOSE(S): </strong> Used to report conduct infractions within the unit.</p>
                <p><strong>ROUTINE USE(S): </strong> This form is used to report conduct which will be reviewed by the Commanding Officer.</p>
                <p><strong>DISCLOSURE: </strong> Voluntary; information is internally used and can only be viewed by Unit Commander</p>
                <p><strong>INFO: </strong> Upon submitting this form and investigation will be conducted regarding the infraction. You may be contacted for more information regarding this case, however your report or name1` will never be disclosed to the violating party.</p>
                <fieldset>
                    <legend>A. INFRACTION REPORT</legend>
                    <div data-row-span="4">
                        <div data-field-span="4">
                            <label>VIOLATOR NAME:</label>
                            <select name="violator_name">
                                @foreach($vpfs as $file)
                                    <option value="{{$file}}">{{$file}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div data-row-span="1">
                        <div data-field-span="1">
                            <label>SUMMARY OF INTERACTION</label>
                            <textarea name="violation_summary" rows="15"></textarea>
                        </div>
                    </div>
                </fieldset>
                <br><br>
                <button type="submit">Submit Form</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js-bottom')
    <script type="text/javascript" src="/frontend/js/gridforms.js"></script>
@endsection
