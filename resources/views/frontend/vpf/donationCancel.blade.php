
@extends('frontend.layouts.master')

@section('title', 'Donations')

@section('css-top')
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{{route('vpf')}}">{{$user->vpf}}</a></li>
        <li class="active">Donate - Cancel</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>Virtual Personnel File - {{$user->vpf}} - Donations</h1>
        <p>Your assistance makes this unit possible.</p>
        <p>To cancel your contribution, simply click on the confirmation button below</p>
        <form action="{{route('vpf.donate.cancel.confirm')}}" method="POST" >
            {{csrf_field()}}
            <a href="/virtual-personnel-file/" class="btn btn-success">Return to Virtual Personnel File</a>
        <button type="submit" class="btn btn-danger">Cancel Donation Plan</button>
        </form>
    </div>
@endsection

@section('js-bottom')
@endsection
