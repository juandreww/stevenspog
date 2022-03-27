<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Submitted</title>
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
 
    <div class="container">
        <header class="blog-header py-3" style="margin-bottom:-50px">
            <div class="row flex-nowrap justify-content-between align-items-center">
              <div class="col-4">
                <a class="text-muted" href="/list"><img src={{URL::asset('/img/homelogo3.png')}} class="logo" alt="Responsive image" alt="profile Pic" height="80" width="250"></a>
              </div>
            </div>
        </header>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <h4>Thank You</h4>
                        <h4 class="my-4">Data Yang Di Input : </h4>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td style="width:150px">Name</td>
                                <td>{{ $data->Name }}</td>
                            </tr>
                            <tr>
                                <td>Nomor Pasien</td>
                                <td>{{ $data->Code }}</td>
                            </tr>
                            <tr>
                                <td>Purpose</td>
                                <td>{{ $data->Note }}</td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td>{{ $data->Date }}</td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td>{{ $data->Time }}</td>
                            </tr>
                        </table>
                        <h6 class="my-4">Mohon datang 30 menit lebih awal dari jam yang telah ditentukan.<br>
                            Untuk ganti jadwal dan pembatalan mohon segera hubungi admin, no. WA +628114324868
                        </h6>
                        <a href="https://api.whatsapp.com/send/?phone=628114324868&text&app_absent=0">Click link ini</a>
                        <br>
                        <br>
                        <a href="/list" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</body>
</html>