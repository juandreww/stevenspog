<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appointment Request</title>
 
    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-lg-6">
              <div class="card mt-5">
                  <div class="card-body">
                      <h3 class="text-center">Appointment Request</h3>
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
                      <form action="/submit" method="post">
                          {{ csrf_field() }}
                          <table style="width: 100%">
                          <div class="form-group" style="width: 100%">
                              <label for="nama">Nama Lengkap</label>
                              <input class="form-control" type="text" name="nama" value="{{ old('nama') }}">
                          </div>
                          {{-- <label>Date of Birth</label><br>
                          <div class="form-row align-items-center" style="width: 100%">
                            <div class="col-auto my-1">
                              <label for="day">Day</label><br>
                              <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Day</label>
                              <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                <option selected>Day</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                              </select>
                            </div>
                            <div class="col-auto my-1">
                              <label for="time">Time</label><br>
                              <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Time</label>
                              <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                <option selected>Time</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                            </div>
                          </div> --}}
                          <div class="row">
                            <div class="col" style="width: 100%">
                              <label for="pekerjaan">Pekerjaan</label><br>
                              <input class="form-control" type="text" name="pekerjaan" value="{{ old('pekerjaan') }}">
                            </div>
                            <div class="col" style="width: 50%">
                              <label for="usia">Usia</label><br>
                              <input class="form-control" type="text" name="usia" value="{{ old('usia') }}">
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col" style="width: 100%">
                              <label for="email">Email</label><br>
                              <input class="form-control" type="text" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="col" style="width: 50%">
                              <label for="phonenumber">Phone Number</label><br>
                              <input class="form-control" type="text" name="phonenumber" value="{{ old('phonenumber') }}">
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col" style="width: 50%">
                              <label for="purpose">Tujuan Berkunjung</label><br>
                              <input class="form-control" type="text" name="purpose" value="{{ $user->Name }}">
                            </div>
                          </div>
                          <br>
                          <div class="form-row align-items-center" style="width: 50%">
                            <div class="col-auto my-1">
                              <label for="date">Date</label><br>
                              <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Date</label>
                              <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                <option selected>Date</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                            </div>
                            <div class="col-auto my-1">
                              <label for="time">Time</label><br>
                              <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Time</label>
                              <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                <option selected>Time</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
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