<html>
<head>
	<title>List Applicants</title>
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
				<table style="width: 100%">
						<div style="font-size: 30px; width: 30%; font-weight: bold;">&nbsp;&nbsp;List Date</div>
						<br>
						<form action="/adddate" method="GET" class="form-inline">
							<input class="btn btn-primary ml-3" type="submit" value="ADD NEW DATE">
						</form>
				</table>
				<br><br>
				<table class="table table-bordered">
					<tr>
						<th style="width:60%">Date</th>
						<th>Action</th>
					</tr>
					@foreach($data as $p)
					<tr>
						@php $stringedit = "/editdate/" . $p->Oid; $string = "/deletedate/" . $p->Oid; @endphp
						<td>{{ $p->Date ?: '-' }}</td>
						<td>
							<a class="btn btn-danger btn-sm" href={{$string}}>Delete</a>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
 
 
</body>
</html>