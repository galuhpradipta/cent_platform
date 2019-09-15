<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Cent - Register</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('sb-admin2/vendor/fontawesome-free/css/all.min.css') }} rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('sb-admin2/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body style="background-color: #F1903F">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 offset-lg-3">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Daftar Akun</h1>
                  </div>

                  @if (count($errors) > 0 )
                    <div class="alert alert-danger" role="alert">
                      <small>{{ $errors->first() }}</small>
                    </div>
                  @endif
                  <form class="user" method="POST" action="{{ route('register.custom') }}">
                  @csrf

                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" name="email" id="email" required>
                    </div>

                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" name="password" id="password" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Nomor Telepon</label>
                        <input type="text" class="form-control" name="phone_number" id="phone_number" required>
                    </div>
                               
                    <div class="form-group">
                        <label for="company_name">Nama Perusahaan</label>
                        <input type="text" class="form-control" name="company_name" id="company_name" required>
                    </div>

                    <div class="form-group">
                        <label for="company_sector_id">Sektor Perusahaan</label>
                        <select name="company_sector_id" id="company_sector_id" class="form-control">                          
                            <option selected disabled>Pilih tipe bisnis</option>
                            @foreach ($sectors as $sector)
                                <option value="{{ $sector->sector_id }}">{{ $sector->description }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="company_income">Pemasukan Perusahaan</label>
                        <input type="number" class="form-control" name="company_income" id="company_income" required placeholder="Rp. ">
                    </div>

                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <button type="submit" class="btn btn-primary btn-block">
                                Register
                            </button>
                        </div>
                    </div>
                        
                  </form>
                  <hr>
            
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('sb-admin2/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('sb-admin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('sb-admin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('sb-admin2/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
