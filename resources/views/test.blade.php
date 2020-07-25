<form action="{{route('user.register_membership')}}" method="post">
	@csrf()
	<input type="text" name="first_name" value="Black">
	<input type="text" name="last_name" value="Rose">
	<input type="text" name="phone" value="0383676033"> 
	<input type="text" name="password" value="123123">
	<input type="text" name="email" value="abc@gmail.com">
	<input type="text" name="gender" value="0">
	<input type="text" name="dob" value="2020-07-26">
	<input type="text" name="occupation" value="Dev">
	<input type="text" name="address_one" value="Cao Bằng">
	<input type="text" name="address_two" value="Thái Nguyên">
	<input type="text" name="city" value="Thái Nguyên">
	<input type="text" name="post_code" value="25000">
	<input type="text" name="country" value="Việt Nam">
	<input type="text" name="reason" value="đéo">
	<input type="text" name="usage_criteria" value="haha">
	<input type="text" name="bring_to" value="cái gì đó">
	<input type="text" name="member_other" value="Anh X">
	<input type="submit" value="submit">
</form>