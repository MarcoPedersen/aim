<script
    src="https://maps.googleapis.com/maps/api/js?key={{ config('app.google_map_key') }}&callback=initMap&libraries=&v=weekly"
    defer
></script>
<script>

    function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 8,
            center: { lat: 55.9293379, lng: 11.6044983 },
        });
        const geocoder = new google.maps.Geocoder();

        const fieldLocations =<?php echo $fieldLocations; ?>;
        var i;
        for (i = 0; i < fieldLocations.length; i++) {
            setMarkers(map, fieldLocations[i]);
        }
    }

    function setMarkers(resultsMap, location)
    {

        var location = {lat: parseFloat(location.lat), lng: parseFloat(location.lng)}
        new google.maps.Marker({
            map: resultsMap,
            position: location,
        });
    }
</script>
<style>
    #map {
        height: 500px;
    }
</style>


<div id="map"></div>
