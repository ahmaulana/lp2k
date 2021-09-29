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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">LPPK UDINUS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        </div>
    </nav>
    <!-- Page content-->
    <div class="container">
        <div class="text-center mt-5">
            <h1>Unduh Sertifikat</h1>
            <p class="lead">Ketikkan nomor NID/NIDN Anda pada kolom pencarian</p>
        </div>
        <div>
            <div class="container-xl">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="d-flex flex-row-reverse">
                                <div class="py-2">
                                    <div class="input-group rounded">
                                        <input type="search" id="search" class="form-control rounded" placeholder="Masukkan NID/NIDN..." required />
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
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Kegiatan Pelatihan</th>
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

    <!-- Modal -->
    <div class="modal fade" id="certificateDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="name"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label class="col-form-label">Kegiatan Pelatihan</label>
                            <input type="text" class="form-control" id="trainingName" readonly>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Kategori</label>
                            <input type="text" class="form-control" id="category" readonly>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Koordinator</label>
                            <input type="text" class="form-control" id="coordinator" readonly>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <label class="col-form-label">Mulai</label>
                                <input type="date" id="startDate" class="form-control" readonly>
                            </div>
                            <div class="col">
                                <label class="col-form-label">Selesai</label>
                                <input type="date" id="endDate" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Status</label>
                            <input type="text" class="form-control" id="status" readonly>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Skor</label>
                            <input type="text" class="form-control" id="score" readonly>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nomor Sertifikat</label>
                            <input type="text" class="form-control" id="certificateNumber" readonly>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Berlaku Hingga</label>
                            <input type="date" id="valid" class="form-control" readonly>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Custom JS-->
    <script>
        let BASE_URL = 'http://127.0.0.1:8000'

        $(function() {

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

        function detail(id) {
            let url = BASE_URL + '/detail/certificate'
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                success: function(response) {
                    $("#certificateDetail").modal("show")
                    $("#name").text(response.nama + ' (' + response.nidn + ')')
                    $("#trainingName").val(response.nama_pelatihan)
                    $("#category").val(response.nama_kategori)
                    $("#coordinator").val(response.nama_koordinator)
                    $("#startDate").val(response.pelatihan_tanggal_mulai)
                    $("#endDate").val(response.pelatihan_tanggal_selesai)
                    $("#status").val(response.status)
                    $("#score").val(response.skor)
                    $("#certificateNumber").val(response.no_sertifikat)
                    $("#valid").val(response.valid_hingga)
                }
            })
        }
    </script>
</body>

</html>