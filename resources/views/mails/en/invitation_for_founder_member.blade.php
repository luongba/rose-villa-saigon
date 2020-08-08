@extends('mails.layout_mail')

@section('content_mail')
<tr>
	<td align="center" style="padding-top:40px;color:#fff;">Dear {{$name}}</td>
</tr>
<tr>
	<td align="center" style="padding-top:40px;color:#fff;">Set to open this summer, Vietnam’s first members club, Rose Villa Saigon, will be a haven of calm tranquillity and peaceful serenity, a place for dining experiences and cultural events, and a private sanctuary for wellness and recuperation. Most of all, it will be home to a fantastic community.As we enter into the final phases of construction, it’s time to start planting the seeds of that community. Our Founding Members will be a diverse and eclectic group from different backgrounds, cultures, industries and neighbourhoods. Dynamic, inspiring people from all walks of life, who’ll be the first through the doors the day we open.</td>
</tr>
<tr>
	<td align="center" style="padding-top:40px;color:#fff;">As we enter into the final phases of construction, it’s time to start planting the seeds of that community. Our Founding Members will be a diverse and eclectic group from different backgrounds, cultures, industries and neighbourhoods. Dynamic, inspiring people from all walks of life, who’ll be the first through the doors the day we open.</td>
</tr>
<tr>
	<td align="center" style="padding-top:40px;color:#fff;">Your name was recently brought to our attention and we’re delighted to invite you to become a Founder Member of Rose Villa. This is a personal invitation and isn’t transferable.</td>
</tr>
<tr>
	<td align="center" style="padding-top:40px;color:#fff;">Please follow the link below and follow the steps to apply, it only takes a few minutes. However, don’t delay. Founder places are limited, and are only available for a short time.</td>
</tr>
<tr>
	<td align="center" style="padding-top:40px;color:#fff;">Looking forward to receiving your application!</td>
</tr>
<tr>
	<td align="center" style="padding-top:40px;color:#fff;">All the best,</td>
</tr>
<tr>
	<td align="center" style="padding-top:40px;color:#fff;">Rose Villa Saigon</td>
</tr>
<tr>
	<td align="center" style="padding-top:40px;color:#fff;">
		<a href="{{route('founder')}}">CLICK HERE TO APPLY</a>
	</td>
</tr>
@stop