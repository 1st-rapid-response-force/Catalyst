
@extends('frontend.layouts.master')

@section('title', 'Donations')

@section('css-top')
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/">Home</a></li>
        <li><a href="{{route('vpf')}}">{{$user->vpf}}</a></li>
        <li class="active">Donate</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <h1>Virtual Personnel File - {{$user->vpf}} - Donations</h1>
        <p>Your assistance makes this unit possible. With a monthly contribution you can help us with server expenses. It is important to note that you can cancel your monthly donation at any time.</p>
        <div class="row text-center">
            <h2>Monthly Donations:</h2>
                <div class="col-md-3">
                    <div class="well">
                        @if($user->onPlan('5month'))
                        <h4>Your Current Plan:</h4>
                        <h3>$5.00 Dollars</h3>
                        @else
                        <h3>$5.00 Dollars</h3>
                        <form action="{{route('vpf.donate.plan1',array($user->vpf->id))}}" method="POST">
                            {{csrf_field()}}
                            <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="{{ $public_key }}"
                                    data-amount="500"
                                    data-name="1st Rapid Response Force"
                                    data-description="$5 Donation a month"
                                    data-image="/128x128.png">
                            </script>
                        </form>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="well">
                        @if($user->onPlan('15month'))
                            <h4>Your Current Plan:</h4>
                        <h3>$15.00 Dollars</h3>
                        @else
                        <h3>$15.00 Dollars</h3>
                        <form action="{{route('vpf.donate.plan2',array($user->vpf->id))}}" method="POST">
                            {{csrf_field()}}
                            <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="{{ $public_key }}"
                                    data-amount="1500"
                                    data-name="1st Rapid Response Force"
                                    data-description="$15 Donation a month"
                                    data-image="/128x128.png">
                            </script>
                        </form>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="well">
                        @if($user->onPlan('25month'))
                            <h4>Your Current Plan:</h4>
                        <h3>$25.00 Dollars</h3>
                        @else
                            <h3>$25.00 Dollars</h3>
                        <form action="{{route('vpf.donate.plan3',array($user->vpf->id))}}" method="POST">
                            {{csrf_field()}}
                            <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="{{ $public_key }}"
                                    data-amount="2500"
                                    data-name="1st Rapid Response Force"
                                    data-description="$25 Donation a month"
                                    data-image="/128x128.png">
                            </script>
                        </form>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="well">
                        @if($user->onPlan('50month'))
                            <h4>Your Current Plan:</h4>
                        <h3>$50.00 Dollars</h3>
                        @else
                            <h3>$50.00 Dollars</h3>
                        <form action="{{route('vpf.donate.plan4',array($user->vpf->id))}}" method="POST">
                            {{csrf_field()}}
                            <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="{{ $public_key }}"
                                    data-amount="5000"
                                    data-name="1st Rapid Response Force"
                                    data-description="$50 Donation a month"
                                    data-image="/128x128.png">
                            </script>
                        </form>
                        @endif
                    </div>
                </div>
            <div class="col-lg-12 text-center">
                @if ($user->everSubscribed())
                    @if($user->cancelled() && !($user->expired()))
                        <h4>Expires:
                            {{
                                $user->subscription()->getSubscriptionEndDate()->toFormattedDateString()
                            }} ( {{ $user->subscription()->getSubscriptionEndDate()->diffInDays(\Carbon\Carbon::now())  }} days from now )
                        </h4>
                        <small>If you decide to swap your plan midway, you will be charged the new amount on the next monthly donation cycle.</small>
                    @elseif($user->subscribed())
                        <h4>Auto Renews:
                            {{
                                $user->subscription()->getSubscriptionEndDate()->toFormattedDateString()
                            }} ( {{ $user->subscription()->getSubscriptionEndDate()->diffInDays(\Carbon\Carbon::now())  }} days from now )
                        </h4>
                        <a href="{{route('vpf.donation.cancel')}}"><i class="glyphicon glyphicon-adjust"></i>&nbsp;Cancel</a><br>
                        <small>If you decide to swap your plan midway, you will be charged the new amount on the next monthly donation cycle.</small>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection

@section('js-bottom')
@endsection
