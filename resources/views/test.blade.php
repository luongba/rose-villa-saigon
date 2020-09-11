<form action="{{route('user.change_profile')}}" method="post">
	@csrf()
	<!-- <input type="text" name="name" value="Black Rose">
	<input type="text" name="email" value="gautrangcb91@gmail.com">
	<input type="text" name="phone" value="0383676033">
	<input type="text" name="number_guest" value="2">
	<input type="text" name="start_at" value="2020-07-31">
	<input type="text" name="end_at" value="2020-08-20">
	<input type="text" name="description" value="flad">
	<input type="text" name="booking_id" value="1">
	<input type="text" name="type_booking" value="3"> -->
	<input type="text" name="first_name" value="Black">
	<input type="text" name="last_name" value="Rose">
	<input type="text" name="email" value="abcd@gmail.com">
	<input type="text" name="phone" value="0383676033">
	<input type="text" name="gender" value="1">
	<input type="text" name="dob" value="2000-07-28">
	<input type="text" name="occupation" value="Dev">
	<input type="text" name="address_one" value="Cao Bằng">
	<!-- <input type="text" name="address_two" value="1"> -->
	<input type="text" name="city" value="Thái Ngyên">
	<input type="text" name="post_code" value="24000">
	<input type="text" name="country" value="VietNam">
	<input type="text" name="avatar" value="">
	<input type="text" name="reason" value="lý do">
	<input type="text" name="usage_criteria" value="dung cho zui">
	<input type="text" name="bring_to" value="đéo">
	<input type="text" name="member_other" value="đéo có">
	<input type="file" name="avatar">
	<input type="submit" value="submit">
</form>