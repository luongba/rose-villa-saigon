@extends('mails.layout_mail')

@section('content_mail')
<tr>
	<td align="center" style="padding-top:40px;color:#fff;">DEAR {{$name}}</td>
</tr>
<tr>
	<td align="center" style="padding-top:40px;color:#fff;">WE WANTED TO SEND YOU A PERSONAL NOTE TO SAY HOW DELIGHTED WE ARE THAT YOU ARE AN EARLY FOUNDER OF ROSE VILLA SAIGON. WE ARE CREATING VIETNAM’S FIRST PRIVATE MEMBERS' CLUB, A DESTINATION LIKE NO OTHER. </td>
</tr>
<tr>
	<td align="center" style="padding-top:40px;color:#fff;">SET TO OPEN IN THE EARLY SUMMER, ROSE VILLA SAIGON WILL BE A HAVEN OF CALM TRANQUILLITY AND PEACEFUL SERENITY, A PLACE FOR DINING AND CULTURAL EXPERIENCES, AND A PRIVATE SANCTUARY FOR WELLNESS AND RECUPERATION. MOST OF ALL, IT WILL BE HOME TO A FANTASTIC COMMUNITY.</td>
</tr>
<tr>
	<td align="center" style="padding-top:40px;color:#fff;">AS AN EARLY FOUNDER, WE ARE HOPING THAT YOU CAN HELP US BUILD THAT COMMUNITY BY INVITING YOUR PERSONAL NETWORK OF FRIENDS TO JOIN AND BECOME PART OF THE CLUB’S STORY. </td>
</tr>
<tr>
	<td align="center" style="padding-top:40px;color:#fff;">WE ARE LOOKING FORWARD TO WELCOMING YOU AND YOUR FRIENDS TO ROSE VILLA SAIGON.</td>
</tr>
<tr>
	<td align="center" style="padding-top:40px;color:#fff;">THANK YOU FOR YOUR SUPPORT AND BELIEF IN US.</td>
</tr>
<tr>
	<td align="center" style="padding-top:40px;color:#fff;">SEE YOU SOON,</td>
</tr>
<tr>
	<td align="center" style="padding-top:40px;color:#fff;">ROSE VILLA SAIGON TEAM</td>
</tr>
<tr>
	<td align="center" style="padding-top:40px;color:#fff;">P.S. WE’VE INCLUDED A LITTLE FORM FOR YOU TO FILL IN WITH YOUR DETAILS. PLEASE RETURN IT TO US SO WE CAN GET YOU SET UP ON OUR MEMBERSHIP SYSTEM PRIOR TO THE CLUB’S OPENING.</td>
</tr>
<tr>
	<td align="center" style="padding-top:40px;color:#fff;">
		<a href="{{route('founder')}}">CLICK HERE TO REGISTER</a>
	</td>
</tr>
@stop