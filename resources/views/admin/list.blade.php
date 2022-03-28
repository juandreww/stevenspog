<html>
<head>
	<style>
		html, body {
		  height: 100%;
		  margin: 0;
		}
		
		.full-height {
		  height: 100%;
		  background: yellow;
		}
	</style>
	<title>List Applicants</title>
	<!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body>
 
	<div class="container-fluid">
		<div class="card mt-4" style="width: 100%;">
			<div class="card-body" style="width: 100%;"> 
				<h3>List</h3>
				<br>
				<p>Cari Record Pasien :</p>
 
				<div class="form-group">
					
				</div>
				<form action="/list" method="GET" class="form-inline">
					<input class="form-control" type="text" name="find" placeholder="Cari Record Pasien .." value="{{ old('find') }}">
					&nbsp;&nbsp;
					<input class="form-control" type="date" id="finddate" name="finddate">
					<input class="btn btn-primary ml-3" type="submit" value="CARI">
				</form>
 
				<br/>
				<div class="table-responsive">
					<table class="table table-bordered table-responsive">
						<tr>
							<th>Name</th>
							<th>Age</th>
							<th>Date</th>
							<th>Time</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Address</th>
							<th>Note</th>
							<th>Action</th>
						</tr>
						@foreach($data as $p)
						<tr>
							@php $string = "/delete/" . $p->Oid; $stringedit = "/edit/" . $p->Oid; @endphp
							<td>{{ $p->Name ?: '-' }}</td>
							<td>{{ $p->Age ?: '-' }}</td>
							<td>{{ $p->Date ?: '-' }}</td>
							<td>{{ $p->Time ?: '-' }}</td>
							<td>{{ $p->Email ?: '-' }}</td>
							<td>{{ $p->Phone ?: '-' }}</td>
							<td>{{ $p->Address ?: '-' }}</td>
							<td>{{ $p->Note ?: '-' }}</td>
							<td>
								<a class="btn btn-warning btn-sm" href={{$stringedit}}>Edit</a>
								<a class="btn btn-danger btn-sm" href={{$string}}>Delete</a>
							</td>
						</tr>
						@endforeach
					</table>
				</div>
 
				{{-- <br/>
				Halaman : {{ $data->currentPage() }} <br/>
				Jumlah Data : {{ $data->total() }} <br/>
				Data Per Halaman : {{ $data->perPage() }} <br/>
				<br/> --}}
 
				{{-- {{ $data->links() }} --}}
			</div>
		</div>
	</div>
 
 
</body>
</html>