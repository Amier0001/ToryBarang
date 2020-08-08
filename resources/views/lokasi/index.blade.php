<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Tambah Data</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" media="screen" href="main.css" />
<script src="main.js"></script>
</head>
<body>
<form action="{{ route('tambahdata')}}" method="POST">
@csrf
<input type="text" name="nama" id="nama" placeholder="Masukan Nama">
<input type="submit">
</form>
</body>
</html>