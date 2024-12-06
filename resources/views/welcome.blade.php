<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tehreem Xcrino Assignment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Google Font [Poppins] -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Smooch&display=swap"
        rel="stylesheet" />
    <!-- fontawesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

    <!-- Datatables CSS CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
    <style>
        table.dataTable tbody th,
        table.dataTable tbody td {
            padding: 8px 10px;
            text-align: center;
            vertical-align: middle;
        }

        #canvas,
        #deletePreloader {
            width: 100%;
        }

        #canvas img,
        #deletePreloader img {
            display: table;
            margin: 0 auto;
            width: 300px;
        }
    </style>
</head>

<body>

    <div class="jumbotron text-center">
        <h1>Company : Xcrino Business Solutions Private Limited India</h1>
        <p>Xcrino Business Task</p>
    </div>

    <div class="container">
        <div class="row">
            <div id="deletePreloader" class="d-none">
                <img src="https://previewforclient.com/brust/img/preloader.gif" class="w-25">
                <p class="text-danger text-center">Deleting record.....</p>
            </div>
            <div class="col-12 pb-5" id="dataRender">
                <div class="preloader" id="canvas">
                    <img src="https://previewforclient.com/brust/img/preloader.gif" class="w-25">
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {

            $("#canvas").addClass('d-block');

            // function load_record() {
            //     $.ajax({
            //         type: "get",
            //         url: "{{ route('fetch_recod') }}",
            //         dataType: 'json',
            //         success: function(resp) {
            //             $("#canvas").addClass('d-block');
            //             $("#dataRender").html(resp.data);
            //             $('#example').DataTable();
            //             $("#deletePreloader").removeClass('d-block').addClass('d-none');
            //         },
            //         error: function() {
            //             $("#dataRender").text("Something went wrong");
            //         }
            //     });
            // }

            // load_record();

            // $(document).on('click', '.record_delete_btn', function() {

            //     $("#deletePreloader").removeClass('d-none').addClass('d-block');

            //     var id = $(this).attr("data-did");

            //     $.ajax({
            //         type: "GET",
            //         url: "{{ route('delete_record') }}",
            //         dataType: 'json',
            //         data: {
            //             id
            //         },
            //         success: function(resp) {
            //             console.log(resp);
            //             load_record();
            //         }
            //     });
            // });

        });
    </script>
</body>

</html>
