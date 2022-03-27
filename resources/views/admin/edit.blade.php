<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Pasien</title>
 
    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    
</head>
<body>
  <div class="container" background-image: var(--bs-gradient);>
      <div class="row justify-content-center">
          <div class="col-lg-6">
              <div class="card mt-5">
                  <div class="card-body">
                      <h3 class="text-center">Edit Pasien</h3>
                      <br/>

                      {{-- menampilkan error validasi --}}
                      @if (count($errors) > 0)
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                      @endif

                      <br/>
                        <!-- form validasi -->
                      <form action="/update?check=true" method="post">
                          {{ csrf_field() }}
                          <input type="hidden" name="oid" value="{{ $data->Oid }}"> <br/>
                          <table style="width: 100%">
                          <div class="form-group" style="width: 100%">
                              <label for="name">Name</label>
                              <input class="form-control" type="text" name="name" value="{{ $data->Name }}">
                          </div>
                          <div class="form-row">
                            <div class="col-2" style="width: 20%">
                              <label for="age">Age</label><br>
                              <input class="form-control" type="text" name="age" value="{{ $data->Age }}">
                            </div>
                            <div class="col-6" style="width: 40%">
                              <label for="email">Email</label><br>
                              <input class="form-control" type="text" name="email" value="{{ $data->Email }}">
                            </div>
                            <div class="col" style="width: 40%">
                              <label for="phonenumber">Contact No.</label><br>
                              <input class="form-control" type="text" name="phonenumber" value="{{ $data->Phone }}">
                            </div>
                          </div>
                          <br>
                          <div class="form-row">
                            <div class="col-6" style="width: 100%">
                              <label for="address">Address</label><br>
                              <textarea class="form-control" name="address" rows="3"><?=$data->Address?></textarea>
                            </div>
                            <div class="col-6" style="width: 100%">
                              <label for="purpose">Tujuan Berkunjung</label><br>
                              <textarea class="form-control" name="purpose" rows="3"><?=$data->Note?></textarea>
                            </div>
                          </div>
                          <br>
                          <div class="form-row">
                            <div class="col-9" style="width: 100%">
                              <label for="date">Date</label><br>
                              <select class="custom-select" name="date">
                                <option selected value="-1">{{ $data->DateFormatted }}</option>
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
                                <option selected>{{ $data->DateTime }}</option>
                                <option value="1">17.00</option>
                                <option value="2">17.30</option>
                                <option value="3">18.00</option>
                                <option value="4">18.30</option>
                                <option value="5">19.00</option>
                                <option value="6">19.30</option>
                              </select>
                            </div>
                          </div>
                          <br>
                          <div class="form-group">
                              <input class="btn btn-primary" type="submit" value="Submit">
                          </div>
                        </table>
                      </form>

                  </div>
              </div>
          </div>
      </div>
  </div>
</body>
</html>