var intervalo;

function tempo() {

	var s = 1;
	var m = 0;
	intervalo = window.setInterval(function() {
		if (s == 60) { m++; s = 0; }
		if (s < 10) document.getElementById("segundo").innerHTML = "0" + s + "s"; else document.getElementById("segundo").innerHTML = s + "s";
		if (m < 10) document.getElementById("minuto").innerHTML = "0" + m + "m"; else document.getElementById("minuto").innerHTML = m + "m";		
		s++;
	},1000);
}
window.onload = tempo;
