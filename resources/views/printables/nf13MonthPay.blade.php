<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

        <style>
                .page-break {
                    page-break-after: always;
                }
        
                table {
                    width: 100%;
                }
        
                tr {
                    width: 100%;
                }
        
                .b {
                    font-size: 10px;
                }
        
            </style>


</head>

<body>

        <div class="row">
                <center>
                    <img class="text-center" src="img/feulogo.png" alt="logo" height="55" />
                    <img class="text-center" src="img/feuname.png" alt="name" height="50" />
                </center>
            </div>
        
            <hr>

            <small> 13th Month for {{date('M. Y',strtotime($id))}} (Non-Faculty)</small>

            <table class="table table-bordered table-sm text-center">
                    <thead>
                        <tr>
                            <th colspan="10">
                                <center class="text-primary">13th Month Pay</center>
                            </th>
                        </tr>
                        <tr>
                        </tr>
                    </thead>
            </table>
            





















        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>


</body>



</html>