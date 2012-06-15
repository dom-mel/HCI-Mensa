
var markers = [];
var map;

function solrQuery(query, district) {
    query = query.trim();
    if (query == '') {
        query = '*:*';
    } else {
        query += '*';
    }
    if (district == undefined ||district == null) {
        district = '';
    }

    query = encodeURI(query);
    district = encodeURI(district);

    return 'http://127.0.0.1:8983/solr/select/?q=' + query + '&fq=' + district + '&rows=1000&wt=json&sort=name%20asc&facet.sort=index';
}

function update() {
    var district = $('#district').val();
    var search = $('#form_search').val();
    var url = solrQuery(search, district);

    var callback = function(data) {
        updateDistrict(data.facet_counts.facet_fields.district, data.responseHeader.params.fq);
        updateList(data.response.docs);
        updateMarker(data.response.docs);
    };

    $.ajax({
        url: url,
        success: callback,
        dataType: 'jsonp',
        jsonp: 'json.wrf'
    });
}

function updateList(data){
    var resultList = $('#resultList');
    resultList.empty();

    $.each(data, function(key, val) {

        var a = $("<a></a>")
            .attr('href', 'plan.php?id=' + val.id)
            .attr('title', val.title)
            .text(val.name);

        var li = $("<li></li>").append(a);

        resultList.append(li);
    });
}

function updateDistrict(data, defaultValue) {
    var districts = $('#district');
    districts.empty();

    districts.append(
        $("<option></option>")
            .attr('value', '')
            .text('Alle')
        );

    for (var i = 0; i < data.length; i+=2) {
        if (data[i] == "") {
            continue;
        }
        districts.append(
            $("<option></option>")
                .attr('value', data[i])
                .text(data[i])
        );
    }

    $('#district option[value='+defaultValue+']').attr('selected', 'selected');
}

function updateMarker(data) {
    clearMarkers();

    $.each(data, function(key, val) {

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(val.lat, val.lng),
            title: val.name
        });

        google.maps.event.addListener(marker, 'click', function(){
            window.location.href = "plan.php?id=" + val.id;
        });

        marker.setMap(map);
        markers.push(marker);

    });
}

function clearMarkers() {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
    }
    markers = [];
}

$(document).ready(function() {
    var myOptions = {
        zoom: 10,
        center: new google.maps.LatLng(52.518611111111, 13.408055555556),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        streetViewControl: false
    };
    map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
    update();

    $('#district').change(update);
    $('#form_search').keyup(update);
});