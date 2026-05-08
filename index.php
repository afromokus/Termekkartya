<?php 
	//a kiválasztott áru
	$elemSzam = 0;

	
	//json fileból egy áru felhasználóra tartozó adatainak kinyerése
	$tartalom = file_get_contents("aruAdatok.json");
	$jelenlegiAru;
	$vanEKeszleten = true;

	$aruAdatok = json_decode($tartalom); 
	
	if(json_last_error() !== JSON_ERROR_NONE)
	{
		echo "json beolvasási hiba";
	}
	else
	{
		if($aruAdatok[$elemSzam]->keszlet == 0)
		{
			$vanEKeszleten = false;
		}
		$jelenlegiAru = json_encode(array("nev" => $aruAdatok[$elemSzam]->nev, "ar" =>$aruAdatok[$elemSzam]->ar, "vanEKeszleten" => $vanEKeszleten, "kepek" => $aruAdatok[$elemSzam]->kepek,
											"thumbnailek" => $aruAdatok[$elemSzam]->thumbnailek));
											
		$jelenlegiAruObj = json_decode($jelenlegiAru);
	
		mentXML($jelenlegiAruObj, $aruAdatok[$elemSzam]->keszlet);
	}
	
	//áru szükséges adatainak kinyerése, XML-be exportálása, ha van készleten
	
	function mentXML($aru, $keszlet)
	{	
		if($aru->vanEKeszleten)
		{
		$xmlString = "<?xml version='1.0' encoding='UTF-8'?>
			<aru>
				<nev>"
				.$aru->nev.
				"</nev>
				<ar>".$aru->ar.
				"</ar>
				<keszlet>".$keszlet.
				"</keszlet>
			</aru>";
		
		$dom = new DOMDocument;
		
		$dom->preserveWhiteSpace = false;
		
		$dom->loadXML($xmlString);
		
		$dom->save('xml/aru.xml');
		
		}		
	};
?>


<!DOCTYPE html>
<html lang = "hu">
	<head>
		<meta charset = "utf-8">
		<title>Termékkártya</title>
		<link rel = "stylesheet" href = "/css/styles.css">
		<link rel="icon" type="image/x-icon" href="/kepek/ikon.ico">
	</head>
	<body>
		<div class="bentebbiDiv">
		<div id = "termekNev">
		</div>
			<table id ="balTabl">
				<tr>
					<td class="keptd">
				<img class="thumbnail">
					</td>
				</tr>
				<tr>
					<td class="keptd">
				<img class="thumbnail">
					</td>
				</tr>
				<tr>
					<td class="keptd">
				<img class="thumbnail">
					</td>
				</tr>
				<tr>
					<td class="keptd">
				<img class="thumbnail">
					</td>
				</tr>
			</table>
			<table id="kozTabl">
				<tr>
					<td id = "nagyKepCont"  onmouseover= "megjelenitNyilakat()" onmouseout= "elrejtNyilakat()" >
						<img id="nagyKep">
						<button class="keptd" id = "nyilBal" type="button" onclick = "valtKepEgyelVissza()" onmouseover= "megjelenitNyilakat()" onmouseout= "elrejtNyilakat()"></button>
						<button class="keptd" id = "nyilJobb" type="button" onclick = "valtKepEgyelElore()" onmouseover= "megjelenitNyilakat()" onmouseout= "elrejtNyilakat()"></button>
					</td>
				</tr>
			</table>
			<table id = "jobbTabl">
				<tr>
					<td>
						<p id = "ar"></p>
						<button id="btnKosarhoz" type="button">Kosárhoz adás</button>
					</td>
				</tr>
			</table>
		</div>
		<div id = "termekLeiras" class = "bentebbiDiv">
	<p><br><b>Téliesített klímamodell<br></b><br>A Comfort Pro szintet lépett a népszerű Comfort X-hez képest a gyár legújabb fejlesztései révén: a légkondicionáló még csendesebb kül- és beltéri egységet kapott, továbbá fűtésben is minden eddiginél energiahatékonyabbá vált. A legmodernebb professzionális megoldások és a teljeskörű téliesített felszereltség biztosítják az otthon nyugalmát.<br><br>Wi-Fi (2,4 GHz) vezérlés, 3D légáram, Cold plasma szűrő, Távirányítóba integrált hőmérő (I FEEL), 8°C-os temperálás, Extra csendes kialakítás, Fűtés -25°C külső hőmérsékletig, H tarifa igényelhető, Kompresszor karter és csepptálca fűtés<br><br><b>Téliesített modellek<br></b><br>Ezek a modellek kompresszor karter- és csepptálca fűtéssel rendelkeznek, melynek köszönhetően -25°C-os külső hőmérsékletig garantált a fűtés. A kültéri csepptálca fűtés biztosítja, hogy a leolvasztások alkalmával keletkező kondenzvíz ne képezzen jegesedést, megnövelve ezzel az üzembiztonságot télen. A kompresszor karterfűtés még a legnagyobb hidegekben is szavatolja a kompresszorolaj megfelelő kenését induláskor, ezáltal jelentősen növeli a kompresszor élettartamát.<br><br><b>Hűtés<br></b><br>2, 7 – 3,5 – 5,3 – 7,1 kW névleges hűtőteljesítményű modellek kaphatók, így garantáltan megtalálja az Ön számára legmegfelelőbb készüléket. Az inverteres technológiának köszönhetően a készülék visszaszabályozza a teljesítményét, ha a helyiség lehűlt, így az energiafogyasztás minimális lesz. A++ energiaosztályba sorolt termék.<br><br><b>Fűtés<br></b><br>Hűtés mellett fűtésre is kiválóan alkalmas a berendezés egészen -25°C kültéri hőmérsékletig. Kültéri egysége téliesített, rendelkezik karter- és csepptálca fűtéssel. A vezeték nélküli távirányítóba épített termosztát technológiája pedig a Gree I Feel funkcióban érvényesül. A modell a H tarifa igénylési feltételeinek megfelel, ezáltal október 15. és április 15. között Ön akár 50%-ot is megtakaríthat elektromos áramszámláján.<br><br><b>Wi-Fi<br></b><br>A Wi-Fi funkcióval rendelkező GREE berendezések okostelefon segítségével a világ bármely pontjáról vezérelhetők interneten keresztül. A funkció használatához a GREE+ applikáció szükséges, mely vadonatúj élményt nyújt az intelligens vezérlés terén, legyen szó ki- és bekapcsolásról, a hőmérséklet beállításáról vagy akár időzítésről. Az applikáció segítségével a légkondicionáló Google Home vagy Amazon Alexa okosotthon rendszerbe integrálható.<br><br><b>Környezettudatosság<br></b><br>A Gree készülékek új, környezetbarát R32 hűtőközeggel üzemelnek. A klímákban korábban használt R410a hűtőközeget globálisan felváltja az R32-es jelölésű környezetbarát gáz, melynek nincs ózonkárosító hatása (ODP). A globális felmelegedési potenciál (GWP) értéke 675, mely elsőre talán magasnak tűnhet, de még így is sokkal alacsonyabb, mint a korábbi R410a hűtőközeg 2088-as GWP értéke.<br></p>
		</div>
	</body>
	
	<script>
	
	var osszesThumbnailSzam = 4;
	var kepErtekCsokkenE = false;
	var maxKepszam;
	var jelenlegiKepSzam = Number(document.getElementById("nagyKep").src.replace(/\D/g, ""));
	var kepSzam = 0;
	var kepNevek;	
	var elemSzam = 0;
	
	megjelenitNyilakat();
	
	var elsoKepszam;
	
	document.getElementById("nagyKep").addEventListener("transitionend", function(e){if(e.propertyName == "opacity")
	{
		if(document.getElementById("nagyKep").style.opacity == 0)
		{
			if(kepErtekCsokkenE)
			{
				valtKep(kepSzam);
				usztatKepBeBalra();
				kepErtekCsokkenE = false;
			}
			else
			{
				valtKep(kepSzam);
				usztatKepBeJobbra();
			}
		}
	}});	
	
	function valtKepEgyelElore()
	{
		kepSzam++;
		valtMegfKep();
	}
	
	function valtKepEgyelVissza()
	{
		kepSzam--;
		valtMegfKep();
	}
	
	function valtMegfKep()
	{
		jelenlegiKepSzam = Number(document.getElementById("nagyKep").src.replace(/\D/g, ""));
		
		
		if(kepSzam < jelenlegiKepSzam)
		{
			if(kepSzam >= elsoKepszam)
			{
				usztatKepKiJobbra();
				kepErtekCsokkenE = true;
			}
			else
			{
				kepSzam = elsoKepszam;
			}
		}
		else if(kepSzam > jelenlegiKepSzam)
		{
			if(kepSzam < maxKepszam)
			{
				usztatKepKiBalra();
				kepErtekCsokkenE = false;
			}
			else
			{
				kepSzam = maxKepszam-1;
			}
		}
	}
	
	function megjelenitNyilakat()
	{
		document.getElementsByTagName("button")[0].style.visibility = "visible";
		document.getElementsByTagName("button")[1].style.visibility = "visible";			
	};
	
	function elrejtNyilakat()
	{	
		/*if(screen.width > 1200)
		{			
		document.getElementsByTagName("button")[0].style.visibility = "hidden";
		document.getElementsByTagName("button")[1].style.visibility = "hidden";
		}*/
	};
	
	function valtKep(kepSzam)
	{
		let forrasSzoveg = "/kepek/" + kepNevek[kepSzam - elsoKepszam];
		
		document.getElementById("nagyKep").src = forrasSzoveg;		
	}
	
	function usztatKepKiBalra()
	{		
		kepErtekCsokkenE = false;
		var kiuszoKep = document.getElementById("nagyKep");
		
		kiuszoKep.style.opacity = "0";
		kiuszoKep.style.transform = "translateX(-100px)";
		kiuszoKep.style.transition = "all 1s ease-out";			
	}
	
	function usztatKepKiJobbra()
	{	
		var kiuszoKep = document.getElementById("nagyKep");
		
		kiuszoKep.style.opacity = "0";
		kiuszoKep.style.transform = "translateX(100px)";
		kiuszoKep.style.transition = "all 1s ease-out";
	}
	
	function usztatKepBeJobbra()
	{
		var beuszoKep = document.getElementById("nagyKep");
		
		beuszoKep.style.opacity = "1";
		beuszoKep.style.transform = "translateX(0)";	
		
	}
	
	function usztatKepBeBalra()
	{
		var beuszoKep = document.getElementById("nagyKep");
		
		beuszoKep.style.opacity = "1";
		beuszoKep.style.transform = "translateX(0)";	
		
	}	
			
	const aru = <?php echo $jelenlegiAru ?>;
	let i = 0;
	
	const osszesThumbnail = Object.values(aru.thumbnailek);	
	
	osszesThumbnail.forEach((thumb) =>
	{	
	
	document.getElementsByTagName("img")[i].src = "/kepek/thumbnails/" + thumb;
	i++;	
	
	});
	
	document.getElementById("nagyKep").src = "/kepek/" + aru.kepek.kep0;
	
	kepNevek = Object.values(aru.kepek);
	console.log(kepNevek + "");
	
	document.getElementById("ar").innerHTML = aru.ar + " ft";
	
	document.getElementById("termekNev").innerHTML = "<h2>" + aru.nev + "</h2>";
	
	if(!aru.vanEKeszleten)
	{
		document.getElementById("btnKosarhoz").innerHTML = "Értesítést kérek";
		document.getElementsByTagName("table")[0].style.filter = "grayscale(100%)";
		document.getElementById("nagyKep").style.filter = "grayscale(100%)";
	}
	
	elsoKepszam = Number(document.getElementById("nagyKep").src.replace(/\D/g, ""));
	kepszam = elsoKepszam;
	maxKepszam = elsoKepszam + osszesThumbnailSzam;
	
	for(let i=0; i<4; i++)
	{		
		document.getElementsByTagName("img")[i].onclick = function()
		{
			kepSzam = i + elsoKepszam;
			valtMegfKep();
		}
	}
	
	</script>

</html>