<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h2>Rose Villa Saigon</h2>
	<p>Trân trọng thông báo: Yêu cầu booking wellness & beauty {{ $bookingWellnessBeauty->nameWellnessBeauty }} của bạn đã 
	@if($bookingWellnessBeauty->status === 1)
		{{"được chấp nhận"}}
	@elseif($bookingWellnessBeauty->status === 2)
		{{"bị hủy"}}
	@endif</p>
	<p>Thân!!!</p>
</body>
</html>