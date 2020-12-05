<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="http://sehirharitasi.ibb.gov.tr/api/map2.js"></script>
    <style>
        .aa {
            width: 600px !important;
            height: 600px !important;
        }

        .fram {
            width: 500px !important;
            height: 500px !important;
        }
    </style>
</head>

<body>
    <div id="harita" class="aa">
        <iframe id="mapFrame" class="fram" src="http://sehirharitasi.ibb.gov.tr/">
            <p>Tarayıcınız iframe özelliklerini desteklemiyor !</p>
        </iframe>
    </div>

    <script>
        var ibbMAP = new SehirHaritasiAPI({mapFrame:"mapFrame",apiKey:"{{ config('services.apis.key') }}"}, function(){           
	ibbMAP.Nearby.Open({
		lat: 41.01371789571470,
		lon: 28.95547972584920,
		type: "eğitim,kamu",
		distance: 300
	});  
});
    </script>

</body>

</html>