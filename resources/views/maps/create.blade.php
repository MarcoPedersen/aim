<script
    src="https://maps.googleapis.com/maps/api/js?key={{ config('app.google_map_key') }}&callback=initMap&libraries=&v=weekly"
    defer
></script>
<script>
    let markers = [];
    function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 8,
            center: { lat: 55.9293379, lng: 11.6044983 },
        });
        const geocoder = new google.maps.Geocoder();
        document.getElementById("submit").addEventListener("click", () => {
            geocodeAddress(geocoder, map);
        });
    }

    function geocodeAddress(geocoder, resultsMap) {
        clearMarkers();
        const address = document.getElementById("address").value;
        geocoder.geocode({ address: address }, (results, status) => {
            if (status === "OK") {
                let position = results[0].geometry.location;
                let positionJson = position.toJSON();
                resultsMap.setCenter(position);
                const marker = new google.maps.Marker({
                    map: resultsMap,
                    position: position,
                });
                markers.push(marker);
                document.getElementById("latitude").value = positionJson.lat;
                document.getElementById("longitude").value = positionJson.lng;
            } else {
                alert("Geocode was not successful for the following reason: " + status);
            }
        });
    }

    function clearMarkers() {
        for (let i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }

    }
</script>
<style>
    #map {
        height: 350px;
    }
</style>

<div id="floating-panel">
    <input id="address" type="textbox" value="Copenhagen, DK" />
    <input id="submit" type="button" value="Place marker" />
</div>
<div id="map"></div>
