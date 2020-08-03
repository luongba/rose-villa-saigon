<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h2>Rose Villa Saigon</h2>
	<p>Trân trọng thông báo: Khách hàng đã đặt food & drink với thông tin chi tiết như sau</p>
	<p>Tên: {{ $bookingParty->name }}</p>
	<p>Email: {{ $bookingParty->email }}</p>
	<p>Số điện thoại: {{ $bookingParty->phone }}</p>
	<p>Số khách: {{ $bookingParty->number_guest }}</p>
	<p>Party: {{ $bookingParty->titleAreaParty }}</p>
	<p>Thời gian bắt đầu: {{ date('d/m/Y H:i:s', strtotime($bookingParty->start_at)) }}</p>
	<p>Yêu cầu: {{ $bookingParty->description }}</p>
	<p>Thân!!!</p>
</body>
</html>