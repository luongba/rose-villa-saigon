<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h2>Rose Villa Saigon</h2>
	<p>Trân trọng thông báo: Khách hàng đã đặt wellness & beauty với thông tin chi tiết như sau</p>
	<p>Tên: {{ $bookingWellnessBeauty->name }}</p>
	<p>Email: {{ $bookingWellnessBeauty->email }}</p>
	<p>Số điện thoại: {{ $bookingWellnessBeauty->phone }}</p>
	<p>Số khách: {{ $bookingWellnessBeauty->number_guest }}</p>
	<p>Wellness & Beauty: {{ $bookingWellnessBeauty->nameWellnessBeauty }}</p>
	<p>Thời gian bắt đầu: {{ date('d/m/Y H:i:s', strtotime($bookingWellnessBeauty->start_at)) }}</p>
	<p>Yêu cầu: {{ $bookingWellnessBeauty->description }}</p>
	<p>Thân!!!</p>
</body>
</html>