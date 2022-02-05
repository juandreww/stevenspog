<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Date</title>
 
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
                      <h3 class="text-center">Add Date</h3>
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
                      <form action="/adddate" method="post">
                          {{ csrf_field() }}
                          <table style="width: 100%">
                          <div class="form-group" style="width: 100%">
                              <label for="date">Date</label>
                              <input class="form-control" type="date" name="date" value="{{ old('date') }}">
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