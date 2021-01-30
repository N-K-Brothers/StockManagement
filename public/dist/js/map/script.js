$(document).ready(function() {
    $('#id-Place_Name').keyup(function() {
        var query = $(this).val();
        if (query != '') {
            var _token = $('input[name=_token]').val();
            $.ajax({
                type: "POST",
                url: "/api/getplacelist",
                data: {
                    query: query,
                    _token: _token
                },
                success: function(data) {
                    $('#id-Place_List').fadeIn();
                    $('#id-Place_List').html(data);
                }
            });
        }
    });

    $(document).on('click', '#id-Place_List li', function() {
        $('#id-Place_Name').val($(this).text());
        $('#id-Place_List').fadeOut();
    });

    $('#id-Event_Name').keyup(function() {
        var query = $(this).val();
        if (query != '') {
            var _token = $('input[name=_token]').val();
            $.ajax({
                type: "POST",
                url: "/api/geteventlist",
                data: {
                    query: query,
                    _token: _token
                },
                success: function(data) {
                    $('#id-Event_List').fadeIn();
                    $('#id-Event_List').html(data);
                }
            });
        }
    });

    $(document).on('click', '#id-Event_List li', function() {
        $('#id-Event_Name').val($(this).text());
        $('#id-Event_List').fadeOut();
    });

});
$(document).ready(function () {

    var map = new google.maps.Map(document.getElementById("map"), {
        center: {
            lat: 21.0691621,
            lng: 73.1330357
        },
        zoom: 16
	});

	var _token = $('input[name=_token]').val();
    $.ajax({
        type: "POST",
        url: "/api/eventheld/fetchlenlng",
        data: {
            _token: _token
        },
        success: function (data) {

            callback(JSON.parse(data));
        }
	});

    const input = document.getElementById("pac-input");
	const searchBox = new google.maps.places.SearchBox(input);

	map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    // Bias the SearchBox results towards current map's viewport.
    map.addListener("bounds_changed", () => {
        searchBox.setBounds(map.getBounds());
    });



    map.addListener('click', function (mapsMouseEvent) {

        var location = mapsMouseEvent.latLng.toString();


        let = location.split(",")[0];
        let =
        let.replace("(", "");
        lng = location.split(",")[1];
        lng = lng.replace(")", "");
        $('#id-Letitude').val(let);
        $('#id-Longitude').val(lng);
    });

    function createMarker(latlng) {
        var icon = {
            url: "/dist/img/UTU_pin.png", // url
            scaledSize: new google.maps.Size(70, 50), // scaled size

        };
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            icon: icon,
            title: 'Hello World!'
        });
    }





    function callback(results) {

        for (var i = 0; i < results.length; i++) {
            createMarker(new google.maps.LatLng(parseFloat(results[i].letitude), parseFloat(results[i].longitude)));
        }

    }
});
