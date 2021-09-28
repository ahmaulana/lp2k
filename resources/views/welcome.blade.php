<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>LPPK Udinus</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="/storage/settings/September2021/bWdVioOyP0t4RwUSW2Ig.png" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/homepage.css" rel="stylesheet" />
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">LPPK UDINUS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('voyager.login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page content-->
    <div class="container">
        <div class="text-center mt-5">
            <h1>Unduh Sertifikat</h1>
            <p class="lead">Ketikkan nomor NIDN Anda pada kolom pencarian</p>
        </div>
        <div>
            <div class="container-xl">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="d-flex justify-content-end">
                                    <div class="col-sm-4 p-2">
                                        <div class="input-group rounded">
                                            <input type="search" id="search" class="form-control rounded" placeholder="Search" required />
                                            <span class="input-group-text border-0" id="search-addon">
                                                <a href="#" id="search-btn">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                                    </svg>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>#ID</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>No Sertifikat</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="certificate" class="text-center">
                                <tr>
                                    <td colspan="5">Data Tidak Tersedia!</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Custom JS-->
    <script>
        $(function() {
            let BASE_URL = 'http://127.0.0.1:8000'

            $("#search-btn").click(function() {
                if ($("#search").val()) {
                    let url = BASE_URL + '/search/certificate'
                    nidn = $("#search").val()
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "nidn": nidn
                        },
                        success: function(response) {
                            $("#certificate").empty().html(response)

                            //Generate New CSRF token
                            $("input[name=token]").val(response.token)
                        }
                    })
                }
            })
        })
    </script>
</body>

</html>