<form action="{{route('user.booking')}}" method="post">
	@csrf()
	<input type="text" name="name" value="Black Rose">
	<input type="text" name="email" value="gautrangcb91@gmail.com">
	<input type="text" name="phone" value="0383676033">
	<input type="text" name="number_guest" value="2">
	<input type="text" name="start_at" value="2020-07-25 10:20:29">
	<input type="text" name="description" value="flad">
	<input type="text" name="booking_id" value="1">
	<input type="text" name="type_booking" value="1">
	<input type="submit" value="submit">
</form>