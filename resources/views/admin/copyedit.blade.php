<!DOCTYPE html>
<html>
<head>
	<title>Edit Pasien</title>
	<!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="card mt-4">
			<div class="card-body"> 
	<h3>Edit Pasien</h3>
	<br/>
 
	<form action="/update?check=true" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="oid" value="{{ $data->Oid }}"> <br/>
		Name <input type="text" required="required" name="name" value="{{ $data->Name }}"> <br/>
		Age <input type="number" required="required" name="age" value="{{ $data->Age }}"> <br/>
		Email <input type="text" required="required" name="email" value="{{ $data->Email }}"> <br/>
		Contact No. <input type="text" required="required" name="phone" value="{{ $data->Phone }}"> <br/>
		Address <textarea required="required" name="address">{{ $data->Address }}</textarea> <br/>
		Tujuan Berkunjung <textarea required="required" name="purpose">{{ $data->Note }}</textarea> <br/>
		<div class="col-9" style="width: 100%">
			<label for="date">Date</label><br>
			<select class="custom-select" name="date">
			  <option selected>{{ $data->DateFormatted }}</option>
			  @if (count($date) > 0) <option value="0">{{ $date[0]->Date }}</option> @endif
				@if (count($date) > 1) <option value="1">{{ $date[1]->Date }}</option> @endif
				@if (count($date) > 2) <option value="2">{{ $date[2]->Date }}</option> @endif
				@if (count($date) > 3) <option value="3">{{ $date[3]->Date }}</option> @endif
				@if (count($date) > 4) <option value="4">{{ $date[4]->Date }}</option> @endif
				@if (count($date) > 5) <option value="5">{{ $date[5]->Date }}</option> @endif
			</select>
		  </div>
		  <div class="col-3" style="width: 100%">
			<label for="time">Time</label><br>
			<select class="custom-select" name="time">
			  <option selected>{{ $data->Time }}</option>
			  <option value="1">17.00</option>
			  <option value="2">17.30</option>
			  <option value="3">18.00</option>
			  <option value="4">18.30</option>
			  <option value="5">19.00</option>
			  <option value="6">19.30</option>
			</select>
		  </div>
		<input type="submit" value="Simpan Data">
	</form>
</div>
</div>
</div>
</body>
</html>