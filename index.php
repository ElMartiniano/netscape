<!DOCTYPE html>
 <head>
  <meta charset="UTF-8">
  <title>
   NetScape
  </title>
  <link rel="icon" href="hispapoland.png" type="image/x-icon">
  <link rel="stylesheet" href="estilos/style.css">
<script>
document.addEventListener("DOMContentLoaded", function () {

  // 🕒 RELOJ
  function updateClock() {
    const now = new Date();
    const clock = document.getElementById("clock");
    if (clock) clock.textContent = now.toLocaleTimeString();
  }
  updateClock();
  setInterval(updateClock, 1000);

  // ☀️ CLIMA
  fetch("weather.php")
    .then(r => r.json())
    .then(d => {
      document.getElementById("weather").textContent =
        `${d.name}: ${d.main.temp}°C, ${d.weather[0].description}`;
    })
    .catch(() => {
      document.getElementById("weather").textContent = "Error al cargar clima";
    });

  // 📰 NOTICIAS
  fetch("news.php")
    .then(r => r.json())
    .then(data => {
      const lista = document.getElementById("news-list");
      lista.innerHTML = "";
      data.articles.forEach(noticia => {
        const li = document.createElement("li");
        const a = document.createElement("a");
        a.href = noticia.url;
        a.textContent = noticia.title;
        a.target = "_blank";
        li.appendChild(a);
        lista.appendChild(li);
      });
    })
    .catch(() => {
      document.getElementById("news-list").innerHTML =
        "<li>Error al cargar noticias</li>";
    });

  // 💰 ECONOMÍA
  fetch("eco.php")
    .then(r => r.json())
    .then(data => {
      const lista = document.getElementById("eco-list");
      lista.innerHTML = "";
      const indicadores = [
        ["Dólar", data.dolar.valor],
        ["Euro", data.euro.valor],
        ["UF", data.uf.valor],
        ["Bitcoin", data.bitcoin.valor]
      ];
      indicadores.forEach(item => {
        const li = document.createElement("li");
        li.textContent = `${item[0]}: $${item[1]}`;
        lista.appendChild(li);
      });
    })
    .catch(() => {
      document.getElementById("eco-list").innerHTML =
        "<li>Error al cargar economía</li>";
    });

  // 📝 NOTAS
  const notes = document.getElementById("notes");
  if (notes) {
    notes.value = localStorage.getItem("misNotas") || "";
    notes.addEventListener("input", () => {
      localStorage.setItem("misNotas", notes.value);
    });
  }

  // 📅 CALENDARIO (100% FUNCIONAL)
  function generarCalendario() {
    const cal = document.getElementById('calendar');
    if (!cal) return;

    cal.innerHTML = "";

    const hoy = new Date();
    const diaHoy = hoy.getDate();
    const mes = hoy.getMonth();
    const año = hoy.getFullYear();

    let primerDia = new Date(año, mes, 1).getDay();
    primerDia = (primerDia === 0) ? 6 : primerDia - 1;

    const diasMes = new Date(año, mes + 1, 0).getDate();

    const diasSemana = ['L','M','X','J','V','S','D'];
    diasSemana.forEach(d => {
      const head = document.createElement('div');
      head.classList.add('day-name');
      head.textContent = d;
      cal.appendChild(head);
    });

    for (let i = 0; i < primerDia; i++) {
      cal.appendChild(document.createElement('div'));
    }

    for (let d = 1; d <= diasMes; d++) {
      const cell = document.createElement('div');
      cell.textContent = d;
      cell.classList.add('day');

      if (d === diaHoy) {
        cell.classList.add('today');
      }

      cal.appendChild(cell);
    }
  }

  generarCalendario(); // ✅ AHORA SÍ SE EJECUTA

});
</script>



 </head>
 <body>
 <hr>
  <div class="header">
   <img src="https://pslca.web.aol.com/cppops/11/20110511_00001/i/NS_header.jpg">
   <h1>Bienvenido a My Netscape </h1>
   <form target="_parent" action="https://search.brave.com/search">
    <input type="submit" title="Ir" value="Buscar">
	<input id="hdrSrchTxt" type="text" title="Buscar en la Web" name="q" value>
	</form>
<div class="meta">
  <div class="clock" id="clock"></div>
  <div id="weather">Cargando...</div>
</div>
	</div>
<hr>
<div class="contenedor">
 <div class="caja" id="favoritos">
  <h2>Favoritos</h2>
   <ul>
    <li><a href="https://mail.google.com/mail/u/0/?pli=1#inbox">Gmail</a></li>
	<li><a href="https://onedrive.live.com/?view=1">OneDrive</a></li>
	<li><a href="https://www.aol.com/">AOL</a></li>
	<li><a href="https://dash.infinityfree.com/accounts">InfinityFree</a></li>
    <li><a href="http://localhost/">Localhost</a> / <a href="http://localhost/phpmyadmin/index.php">PhpMyAdmin</a></li>
	<li><a href="https://es.wikipedia.org/wiki/Wikipedia:Portada">Wikipedia</a></li>
	<li><a href="https://archive.org/">Internet Archive</a></li>
	<li><a href="https://edramatica.com/Main_Page">Enciclopedia Dramatica</a></li>
	<li><a href="https://utladal.com/">Utladal</a></li>
	<li><a href="https://neocities.org/">NeoCities</a></li>
	<li><a href="https://chatgpt.com/">Chat GPT</a></li>
	<li><a href="https://polcompball.wiki">Polcompball</a> / <a href="https://es.polandball.wiki/wiki/Wiki_Polandball">PolandBall</a> / <a href="https://primwiki.net">Primwiki</a></li>
   </ul>
 </div>
<div class="caja">
  <h2>Noticias</h2>
  <ul id="news-list">
    <li>Cargando noticias...</li>
  </ul>
</div>

 <div class="caja">
  <h2>Economía</h2>
  <ul id="eco-list">
    <li>Cargando datos...</li>
  </ul>
 </div>
 </div>
<hr>
<!---SEGUNDA LÍNEA-->
 <div class="contenedor">
 <div class="caja">
  <h2>Tecnología</h2>
  <ul>
   <li><a href="https://github.com/">GitHub</a></li>
   <li><a href="https://PHP.net">PHP.net</a></li>
   <li><a href="https://developer.mozilla.org/es/">Developer.org</a></li>
   <li><a href="http://www.phpfreaks.com/">PHP freaks</a></li>
   <li><a href="https://stackoverflow.com/">Stack Overflow </a></li>
   <li><a href="https://community.apachefriends.org/f/">Apache Friends</a>
  </ul>
 </div>
<div class="caja">
  <h2>Foros</h2>
  <ul>
   <li><a href="https://4chan.org/">4Chan</a></li>
   <li><a href="https://8kun.top/">8chan</a></li>
   <li><a href="https://soyjak.st">Soyjak.Party</a></li>
   <li><a href="https://kiwifarms.st">Kiwifarms</a></li>
   <li><a href="https://forum.agoraroad.com/index.php">Agora Road´s</a></li>
   <li><a href="https://forums.civfanatics.com/">CIVfanatics</a></li>
   <li><a href="https://forum.vbulletin.com/">VBulletin</a></li>
   <li><a href="https://soyjak.forum/">Soyjak Forum</a></li>
   <li><a href="https://www.newgrounds.com/">NewGrounds</a></li>
   <li><a href="https://forums.somethingawful.com/">SomethingAwful</a></li>
  </ul>
 </div>
 <div class="caja">
  <h2>Redes sociales</h2>
  <ul>
   <li><a href="http://youtube.com/">YouTube</a></li>
   <li><a href="https://www.facebook.com/">Facebook</a></li>
   <li><a href="https://www.reddit.com/">Reddit</a></li>
   <li><a href="https://x.com/">Twitter</a></li>
   <li><a href="https://bsky.app/">BlueSky</a></li>
   <li><a href="https://www.linkedin.com/">LinkedIN</a></li>
   <li><a href="https://pinterest.com/">Pinterest</a></li>
   <li><a href="https://www.tumblr.com/">Tumblr</a></li>
   <li><a href="https://www.instagram.com/">Instagram</a></li>
   <li><a href="https://api.whatsapp.com/">Whatsapp</a></li>
   <li><a href="https://www.deviantart.com/">DeviantArt</a></li>
  </ul>
 </div>
</div>
<hr>
<!---LÍNEA 3--->
<div class="contenedor">
 <div class="caja">
  <h2>Notas</h2><br>
   <textarea rows="20" cols="75" id="notes" placeholder="Escribe tus notas aquí..."></textarea>
 </div>
  <div class="caja">
      <h2>Calendario</h2><br>
      <div id="calendar"></div>
    </div>
 </div>

<hr>
 </body>
 </html>