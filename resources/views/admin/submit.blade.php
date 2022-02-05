<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tutorial</title>
    
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <h4>Thank You</h4>
                        <h4 class="my-4">Data Yang Di Input : </h4>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <td style="width:150px">Name</td>
                                <td>{{ $data->name }}</td>
                            </tr>
                            <tr>
                                <td>Age</td>
                                <td>{{ $data->age }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $data->email }}</td>
                            </tr>
                            <tr>
                                <td>Contact No.</td>
                                <td>{{ $data->phonenumber }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{ $data->address }}</td>
                            </tr>
                            <tr>
                                <td>Purpose</td>
                                <td>{{ $data->purpose }}</td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td>{{ $data->date }}</td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td>{{ $data->time }}</td>
                            </tr>
                        </table>
                        <h6 class="my-4">Mohon datang 30 menit lebih awal dari jam yang telah ditentukan.<br>
                            Info lebih lanjut WA +628114324868
                        </h6>
                        <a href="/registration" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</body>
</html>