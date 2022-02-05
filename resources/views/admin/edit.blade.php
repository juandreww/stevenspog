<!DOCTYPE html>
<html>
<head>
	<title>Edit Pasien</title>
</head>
<body>
 
	<h3>Edit Pasien</h3>
 
	<a href="/list"> Kembali</a>
	
	<br/>
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
			  <option selected>{{ $data->Date }}</option>
			  <option value="1">Monday, 31 January 2022</option>
			  <option value="2">Wednesday, 02 February 2022</option>
			  <option value="3">Friday, 04 February 2022</option>
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
</body>
</html>