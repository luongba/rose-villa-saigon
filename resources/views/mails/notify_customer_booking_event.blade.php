<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h2>Rose Villa Saigon</h2>
	<p>Trân trọng thông báo: Khách hàng đã đặt event với thông tin chi tiết như sau</p>
	<p>Tên: {{ $bookingEvent->name }}</p>
	<p>Email: {{ $bookingEvent->email }}</p>
	<p>Số điện thoại: {{ $bookingEvent->phone }}</p>
	<p>Số khách: {{ $bookingEvent->number_guest }}</p>
	<p>Event: {{ $bookingEvent->titleAreaEvent }}</p>
	<p>Thời gian bắt đầu: {{ date('d/m/Y H:i:s', strtotime($bookingEvent->start_at)) }}</p>
	<p>Yêu cầu: {{ $bookingEvent->description }}</p>
	<p>Thân!!!</p>
</body>
</html>