
@extends('frontend.layouts.master')

@section('title', 'Select Face')

@section('css-top')
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{{route('vpf')}}">{{$user->vpf}}</a></li>
        <li class="active">Select Face</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>Virtual Personnel File - {{$user->vpf}} - Face</h1>
        <p>Your Common Access Card is your identification in this unit. You can select a default face for you account here. Make sure to set up the same face in game.</p>
        <form method="post">
            {!! csrf_field() !!}
            <div class="row">
                <div class="text-center">
                    <input type="submit" class="btn btn-success" value="Save Face Preference"> <a href="/virtual-personnel-file" class="btn btn-danger">Cancel</a>
                    <br><br>
                </div>
            </div>

        <div class="row text-center">
        <?php $i = 1; ?>
        @foreach($faces as $face)
                <div class="col-md-3">
                    <div class="panel-body">
                        <img class="img-thumbnail" style="width: 146px; height:179px;" src="{{$face['file']}}"><br>
                        <small><strong>ARMA Name:</strong> {{$face['name']}}</small>
                        <input class="form-control" type="radio" name="face_id" value="{{$face['id']}}" {{($user->vpf->face_id == $face['id']) ? 'checked' : ''}}>
                    </div>
                </div>

        <?php if (($i != 0) && (($i % 4) == 0)) echo '</div><div class="row text-center">'; ?>
        <?php $i++; ?>
        @endforeach
        </form>
    </div>
@endsection

@section('js-bottom')
@endsection
