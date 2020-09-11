<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h2>Rose Villa Saigon</h2>
	<p>Thông báo kết quả đăng ký thành viên Rose Villa Saigon</p>
	<p>Trân trọng thông báo: Đơn đăng ký thành viên Rose Villa Saigon của bạn đã {{ ($userMeta->status === 1) ? "được duyệt" : "bị hủy" }}</p>
	@if($userMeta->status === 1)
	<p>Vui lòng đăng nhập với thông tin {{ $userMeta->phone }} và mật khẩu {{ $data['password'] }}</p>
	@endif
	<p>Thân!!!</p>
</body>
</html>
