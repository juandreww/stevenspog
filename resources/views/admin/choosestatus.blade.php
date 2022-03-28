<html>
<head>
	<title>Registration</title>

	<style>
		body {
		  /* height: 120vh; */
		  height: 100%;
		  margin: 0;
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

		html, body {
		  
		}
		
		.full-height {
		  height: 100%;
		  background: yellow;
		}
		h6 {
			font-size: 0.1vw;
		}
	  </style>
	<!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="h-50 container">
		<header class="blog-header py-3" style="margin-bottom:-50px">
			<div class="row flex-nowrap justify-content-between align-items-center">
			  <div class="col-4">
				<a class="text-muted" href="/home/a"><img src={{URL::asset('/img/homelogo3.png')}} class="logo" alt="Responsive image" alt="profile Pic" height="80" width="250"></a>
			  </div>
			</div>
		</header>
		<div class="card mt-4">
			<div class="card-body">
				<div style="color: black"><a href="/home/a"><strong><i class="bi bi-arrow-left bi-lg"></i></strong></a></div>
				<br><br>
				<br><br>
				
				<table class="table table-borderless">
					<tr align="center"><td align="center"><h3>Apakah anda sudah pernah berkunjung sebelumnya?</h3></td></tr>
				</table>
				<table class="table table-borderless" style="width: 80%" align="center">
					<tr align="center">
						<td align="center"><a class="btn btn-warning btn-lg" href={{"/pickdate?status=old"}}><h4>YA, PERNAH</h4></a></td>
						<td align="center"><a class="btn btn-warning btn-lg" href={{"/pickdate?status=new"}}><h4>BELUM PERNAH</h4></a></td>
					</tr>
				</table>
				<table class="table table-borderless" style="width: 80%" align="center">
					<tr align="justify"><td align="justify" style="color: gray"><h6>NB: Apabila anda pernah berkunjung sebelumnya, anda cukup mengetik nomor rekam medis anda yang telah terdaftar.
					Untuk Pasien yang baru pertama kali berkunjung, silahkan klik belum pernah. </h6></td></tr>
				</table>
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