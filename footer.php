	<!--
Author: Mark Wilson
File: footer.php
SAIT OOSD Spring Track 2015

File created for Assignment #8
-->
	<!--Add google maps API and functions-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDWLPexIW3cxVJi60zAqcVKFcLWoel8TtI"></script>
	
	<script type="text/javascript">
      function initialize() {
		var myLatlng = new google.maps.LatLng(51.0415192,-114.08157140000003);
        var mapOptions = {
          center: myLatlng,
          zoom: 16
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);
		
		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			title: 'Travel Experts - Calgary Office'
		
  });
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
	<!--End Google Maps-->

<div class="info_section">
	<div class="column-left">
		<address>
			<h3>Travel Experts</h3> <br />
			1155 8th Ave SW <br />
			Calgary, AB<br />
			T2P-1N3<br />
		</address>
	</div>
	
	<div class="column-center">
		<div id="map">
			<div id="map-canvas"></div>
		</div>
	</div>
	
	<div class="column-right">
		<address>
			Phone: (403)271-9873<br />
			Phone: (403)271-9873<br />
			Email: info@travelexperts.com
		</address>
		
	<!--Social Media Icons-->
	<div class="social">
		<span class="fa-stack fa-lg">
			<i class="fa fa-square-o fa-stack-2x"></i>
			<i class="fa fa-twitter fa-stack-1x"></i>
		</span>
		<span class="fa-stack fa-lg">
			<i class="fa fa-square-o fa-stack-2x"></i>
			<i class="fa fa-facebook fa-stack-1x"></i>
		</span>
		<span class="fa-stack fa-lg">
			<i class="fa fa-square-o fa-stack-2x"></i>
			<i class="fa fa-linkedin fa-stack-1x"></i>
		</span>
	</div>
	<!--End Social Media-->
	<br />
	<br />
	<!--Added Copyright for Assignment #1-->
	<p id="copyright">Travel Experts - Copyright 2015 &copy</p>
	</div>
</div>



