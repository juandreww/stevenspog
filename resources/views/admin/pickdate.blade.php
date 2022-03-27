<html>
<head>
	<title>Registration</title>

	<style>
		body {
		  height: 120vh;
		  background: linear-gradient(
			to bottom,
			#03c2af 0%,
			#03c2af 25%,
			white 25%,
			white 100%
		  )
		}
  
		.btn-primary {
		  background-color:#03c2af;
		  border-color: #03c2af;
		}
	  </style>
	<!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body>
 
	<div class="h-50 container">
		<header class="blog-header py-3" style="margin-bottom:-50px">
			<div class="row flex-nowrap justify-content-between align-items-center">
			  <div class="col-4">
				<a class="text-muted" href="/list"><img src={{URL::asset('/img/homelogo3.png')}} class="logo" alt="Responsive image" alt="profile Pic" height="80" width="250"></a>
			  </div>
			</div>
		</header>
		<div class="card mt-4">
			<div class="card-body">
				<div style="color: black"><a href="/choosestatus"><strong><i class="bi bi-arrow-left bi-lg"></i></strong></a></div>
				<br><br>
				<br><br>
				@php
					$url = $status[0]['Value'] == 'old' ? "/old" : "/registration";
				@endphp
				<table class="table table-borderless">
					<tr align="center"><td align="center"><h3>Masukkan tanggal kunjungan:</h3></td></tr>
				</table>
				<form action= {{ $url }} method="GET" class="form-inline" style="margin-left: 32%">
					<select class="custom-select" name="date">
						<option selected>Available Date</option>
						@php
							$date0 = DATE_FORMAT(DATE_CREATE($data[0]->Date), "Ymd");
							$date1 = DATE_FORMAT(DATE_CREATE($data[1]->Date), "Ymd");
							$date2 = DATE_FORMAT(DATE_CREATE($data[2]->Date), "Ymd");
							$date3 = DATE_FORMAT(DATE_CREATE($data[3]->Date), "Ymd");
							$date4 = DATE_FORMAT(DATE_CREATE($data[4]->Date), "Ymd");
							$date5 = DATE_FORMAT(DATE_CREATE($data[5]->Date), "Ymd");
						@endphp
						@if (count($data) > 0) <option value= {{ $date0 }}>{{ $data[0]->Date }}</option> @endif
						@if (count($data) > 1) <option value= {{ $date1 }}>{{ $data[1]->Date }}</option> @endif
						@if (count($data) > 2) <option value= {{ $date2 }}>{{ $data[2]->Date }}</option> @endif
						@if (count($data) > 3) <option value= {{ $date3 }}>{{ $data[3]->Date }}</option> @endif
						@if (count($data) > 4) <option value= {{ $date4 }}>{{ $data[4]->Date }}</option> @endif
						@if (count($data) > 5) <option value= {{ $date5 }}>{{ $data[5]->Date }}</option> @endif
					</select>
					&nbsp;&nbsp;
					<input class="btn btn-primary ml-3" type="submit" value="SAVE">
				</form>
				<br><br>
				<br><br>
				<br><br>
				<br><br>
				<br><br>
				
			</div>
		</div>
	</div>
 
 
</body>
</html>