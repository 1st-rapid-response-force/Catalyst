<?php $count = Auth::user()->newMessagesCount(); ?>
@if($count > 0)
    <span class="label pull-right label-danger">{!! $count !!}</span>
@endif