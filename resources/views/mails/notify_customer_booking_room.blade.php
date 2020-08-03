<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h2>Rose Villa Saigon</h2>
	<p>Trân trọng thông báo: Khách hàng đã đặt phòng với thông tin chi tiết như sau</p>
	<p>Tên: {{ $bookingRoom->name }}</p>
	<p>Email: {{ $bookingRoom->email }}</p>
	<p>Số điện thoại: {{ $bookingRoom->phone }}</p>
	<p>Số khách: {{ $bookingRoom->number_guest }}</p>
	<p>Phòng: {{ $bookingRoom->nameRoom }}</p>
	<p>Thời gian bắt đầu: {{ date('d/m/Y', strtotime($bookingRoom->start_at)) }}</p>
	<p>Thời gian kết thúc: {{ date('d/m/Y', strtotime($bookingRoom->end_at)) }}</p>
	<p>Yêu cầu: {{ $bookingRoom->description }}</p>
	<p>Thân!!!</p>
</body>
</html>