
var theKey=document.currentScript.getAttribute('myApiKey');
var latitude=document.currentScript.getAttribute('myLatitude');
var longitude=document.currentScript.getAttribute('myLongitude');

var ibbMAP = new SehirHaritasiAPI({mapFrame:"mapFrame",apiKey:theKey}, function(){           
	ibbMAP.Nearby.Open({
		lat: latitude,
		lon: longitude,
		type: "",
		distance: 200
	});  

	ibbMAP.Map.Goto({
		lat: latitude,
		lon: longitude,
		zoom: 17,
		effect: false
	});
});