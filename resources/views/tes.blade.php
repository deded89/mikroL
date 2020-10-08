<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>W3path | @yield('title') - W3path.com</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <style>
        .container {
            padding: 0.5%;
        }

    </style>
</head>

<body>
    <button id="kirim">Kirim</button>
    <button id="cek">Cek Status</button>
</body>
<script type="text/javascript">
    $(document).ready(function (e) {

        let msgId = '';

        $('#kirim').on('click', function () {
            var settings = {
                "url": "http://localhost/mikroLaundry/public/tes/kirimpesan",
                "method": "get",
            }

            $.ajax(settings).done(function (response) {
                msgId = response.id;
                console.log(response);
            });
        })

        $('#cek').on('click', function () {
            var settings = {
                "url": "http://localhost/mikroLaundry/public/tes/cekstatus/" + msgId,
                "method": "get",
            }

            $.ajax(settings).done(function (response) {
                console.log(response);
            });
        })
    });

</script>

</html>
