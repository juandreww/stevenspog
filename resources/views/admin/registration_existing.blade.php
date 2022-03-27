<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appointment Request</title>

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
  <div class="container" background-image: var(--bs-gradient);>
      <header class="blog-header py-3" style="margin-bottom:-50px">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4">
            <a class="text-muted" href="/list"><img src={{URL::asset('/img/homelogo3.png')}} class="logo" alt="Responsive image" alt="profile Pic" height="80" width="250"></a>
          </div>
        </div>
      </header>
      <div class="row justify-content-center">
          <div class="col-lg-8">
              <div class="card mt-5">
                  <div class="card-body">
                      <div style="color: black"><a href="/choosestatus"><strong><i class="bi bi-arrow-left bi-lg"></i></strong></a></div>
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
                      @php
                        $code = isset($data->Code) ? $data->Code : $find;
                        if (empty($find)) $code = null;
                        $oid = isset($data->Oid) ? $data->Oid : null;
                        $oldurl = "/old?date=" . $datechosen;
                      @endphp
                      <form action= {{$oldurl}} method="GET" class="form-inline">
                        <input class="form-control" type="text" style="width:45%" name="find" placeholder="Input Nomor Rekam Medis .." value="{{ $code }}">
                        <input class="form-control" type="hidden" style="width:5%" name="date" placeholder="Input Nomor Rekam Medis .." value="{{ $datechosen }}">
                        &nbsp;&nbsp;
                        <input class="btn btn-primary ml-3" type="submit" value="CARI">
                      </form>
                      <br/>
                        <!-- form validasi -->
                        @php
                        $url = "/submitexist?date=" . $datechosen
                      @endphp
                      <form action= {{ $url }} method="post">
                          {{ csrf_field() }}
                          <table style="width: 100%">
                          <input type="hidden" id="Oid" name="Oid" value="{{ $oid }}">
                            @if (isset($data->Code))
                              <div class="form-group" style="width: 100%">
                                <label for="name">Name</label>
                                <input class="form-control" type="text" readonly="readonly" name="name" value="{{ $data->Name }}">
                              </div>
                            @else
                              <div class="form-group" style="width: 100%">
                                <label for="name">Name</label>
                                <input class="form-control" type="text"  name="name" value="{{ old('name') }}">
                              </div>
                            @endif
                            <div style="width: 100%">
                              <label for="purpose">Tujuan Berkunjung</label><br>
                              <textarea class="form-control" name="purpose" value="{{ old('purpose') }}" rows="3">
                              </textarea>
                            </div>
                          </div>
                          <br>
                          <div class="form-row">
                            {{-- <div class="col-9" style="width: 100%">
                              <label for="date">Date</label><br>
                              <select class="custom-select" name="date">
                                <option selected>Available Date</option>
                                @if (count($date) > 0) <option value="0">{{ $date[0]->Date }}</option> @endif
                                @if (count($date) > 1) <option value="1">{{ $date[1]->Date }}</option> @endif
                                @if (count($date) > 2) <option value="2">{{ $date[2]->Date }}</option> @endif
                                @if (count($date) > 3) <option value="3">{{ $date[3]->Date }}</option> @endif
                                @if (count($date) > 4) <option value="4">{{ $date[4]->Date }}</option> @endif
                                @if (count($date) > 5) <option value="5">{{ $date[5]->Date }}</option> @endif
                              </select>
                            </div> --}}
                            <div class="col-12" style="width: 100%">
                              <label for="time">Time</label><br>
                              <select class="custom-select" name="time">
                                <option selected></option>
                                @if ($time[0]['Count']  == 6) <option value="10">17:00 (FULL)</option>
                                @else <option value="1">17.00</option> @endif
                                @if ($time[1]['Count']  == 6) <option value="10">17.30 (FULL)</option>
                                @else <option value="2">17.30</option> @endif
                                @if ($time[2]['Count']  == 6) <option value="10">18.00 (FULL)</option>
                                @else <option value="3">18.00</option> @endif
                                @if ($time[3]['Count']  == 6) <option value="10">18.30 (FULL)</option>
                                @else <option value="4">18.30</option> @endif
                                @if ($time[4]['Count']  == 6) <option value="10">19.00 (FULL)</option>
                                @else <option value="5">19.00</option> @endif
                                @if ($time[5]['Count']  == 6) <option value="10">19.30 (FULL)</option>
                                @else <option value="6">19.30</option> @endif
                              </select>
                            </div>
                          </div>
                          <br>
                          <br>
                          <div class="form-group">
                              <input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
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