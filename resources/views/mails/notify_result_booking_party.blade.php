<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h2>Rose Villa Saigon</h2>
	<p>Trân trọng thông báo: Yêu cầu booking food & drink {{ $bookingParty->titleAreaParty }} của bạn đã 
	@if($bookingParty->status === 1)
		{{"được chấp nhận"}}
	@elseif($bookingParty->status === 2)
		{{"bị hủy"}}
	@endif</p>
	<p>Thân!!!</p>
</body>
</html>