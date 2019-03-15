<h1>Kontaktirajte nas</h1>
<div id="mapakontakt">
<div class="kontakt">
	<p>Nalazimo se u Knez Mihajlovoj ulici broj 10</p>
	<p>Telefoni: 011-123-45-67  |  064-123-44-55  |  063-123-55-44</p>
	<p>Email: office@chevunekretnine.com</p>
	<p>Ako dolazite kolima budite bez brige, u okolini ima pregršt upražnjenih parking mesta</p>
	<p>Ako imate bilo kakvih nedoumica budite slobodni da nas kontaktirate, mi cemo Vam izaci u susret i odgovoriti na sva vasa pitanja. </p>
	<p><a href="index.php" class="dugme">Nazad&nbsp;na&nbsp;pocetnu&nbsp;&nbsp;&raquo;</a></p>
</div>



    <div id="map"></div>
</div>
    <script>
      function initMap() {
        var knez = {lat: 44.816038, lng: 20.459170};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
          center: knez,
		  tilt:45
        });
        var marker = new google.maps.Marker({
          position: knez,
          map: map
        });
      }
    </script>
	
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDL2euJlJ8eEgugh2wXOd2IdwHNrMKXIkY&callback=initMap">
    </script>