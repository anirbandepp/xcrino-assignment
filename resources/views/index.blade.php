<!DOCTYPE html>
<html>

<head>
    <title>Datatables AJAX pagination with Search and Sort - Laravel 7</title>

    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">

    <!-- fontawesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Datatables CSS CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Datatables JS CDN -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <style>
        a {
            text-decoration: none;
            color: red;
        }

        a:hover {
            text-decoration: none;
        }
    </style>
</head>

<body>

    <table id='studentTable' width='100%' border="1" style='border-collapse: collapse;'>
        <thead>
            <tr>
                <td>S.no</td>
                <td>Name</td>
                <td>Email</td>
                <td>Mobile</td>
                <td>Class</td>
                <td>Father Name</td>
                <td>Mother Name</td>
                <td>Delete</td>
            </tr>
        </thead>
    </table>

    <!-- Script -->
    <script type="text/javascript">
        $(document).ready(function() {

            function load_data() {
                $('#studentTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('get_Employees') }}",
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'name'
                        },
                        {
                            data: 'email'
                        },
                        {
                            data: 'mobile'
                        },
                        {
                            data: 'class'
                        },
                        {
                            data: 'father_name'
                        },
                        {
                            data: 'mother_name'
                        },
                        {
                            data: 'delete_record'
                        },
                    ]
                });
            }

            load_data();

            $(document).on('click', '.record_delete_btn', function() {

                var id = $(this).attr("data-did");

                $.ajax({
                    type: "GET",
                    url: "{{ route('delete_record') }}",
                    dataType: 'json',
                    data: {
                        id
                    },
                    success: function(resp) {

                    }
                });
            });

        });
    </script>
</body>

</html>
