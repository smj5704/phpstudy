<style type="text/css">
#map {
     height: 500px; width:500px; background:#F8F8F8;
     }
</style>
<!-- google maps searchbox API 출력 할 검색창 만들기  -->
<input id="searchInput" class="controls" type="text" placeholder="장소를 입력하세요">
<div id="map"></div>

<!-- 지리적 데이터 출력하기-->
<ul class="geo-data">
    <!-- 전체주소 -->
    <li>Full Address: <span id="location"></span></li> 
    
    <li>Postal Code: <span id="postal_code"></span></li>
    
    <li>Country: <span id="country"></span></li>
    <li>Latitude: <span id="lat"></span></li>
    <li>Longitude: <span id="lon"></span></li>
</ul> 

<!-- google maps api / place api 사용.initMap함수를 통해 불러옴 -->
<script async defer src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBtcCxidqRgbdY6Ud6a_kUKfROnVSiPoKY&callback=initMap&region=KR"></script>
<script>
var map;
var marker;
var icon_stop = "/img/board/mat_stop.png";
var icon_move = "/img/board/mat_move.png";
var icon_flag = "/img/board/gps_flag.png";
var c;
var lat;
var base_lat = 37.544337198618926;
var base_lng = 126.98954615154267;
var base_zoom = 18;
var mode = 'w';

<? if($w=="u") { ?>
mode = 'e';

<?php if($opt_val_arr[4] && $opt_val_arr[5]){?>

base_lat = <?=$opt_val_arr[4]?>;
base_lng = <?=$opt_val_arr[5]?>;
<?php if($opt_val_arr[6]){?>
base_zoom = <?=$opt_val_arr[6]?>;
<?php }?>

<?php } ?>

<? } ?>



function initMap() {

	var map = new google.maps.Map(document.getElementById('map'),{
            center:{
                //첫 위치
            lat: 37.544337198618926,
            lng: 126.98954615154267
            },
            zoom: 18,
            //버튼 없애기
			mapTypeControl: false,
            //로드뷰 없애기 
			streetViewControl: false,
        });
         //지도 맵 searchbox 위치 지정
   		map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
      
        //searchInput 검색창으로 받아온 값 넣기
        //getElementById() : html요소 중  id 속성이 'searchInput'인 요소를 리턴
		var input = document.getElementById('searchInput');
  
        
		var autocomplete = new google.maps.places.Autocomplete(input, options);
        //바인딩. 입력한 값을 map 위치로 
		autocomplete.bindTo('bounds', map);

        var infosear = new google.maps.info

        //infowindow : 검색 장소 마커의 정보창
		var infowindow = new google.maps.InfoWindow();

		var marker = new google.maps.Marker({
			map: map,
			anchorPoint: new google.maps.Point(0, -29),
            //지도를 움직여도 마커는 고정됨.
			draggable:false,
            icon: icon_flag
   		 });

        //자동완성 선택시 이벤트 
		autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);

        var place = autocomplete.getPlace();
        //geometry(google maps platform참고)  : 장소의 기하학 관련 정보(location : 위도 / 경도 , viewport : 이 장소를 볼 때 지도에서 선호하는 뷰포트 정의)
        if (!place.geometry) {
            //없는 주소나 장소를 검색 시 . 장소 리스트에서 아무것도 클릭안하고 엔터를 눌렀을 때 뜨는 경고창
            window.alert(place.name + "을 찾을 수 없습니다.");
            return;
        }
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
        marker.setIcon(({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(30, 30)
        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);
    
        var address = '';
        //검색해서 지정한 곳 위치 설명란에 입력 될 주소
        if (place.address_components) {
            //address 배열에 값 삽입
            address = [
                (place.address_components[3] && place.address_components[3].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || ''),
			  (place.address_components[1] && place.address_components[1].short_name || ''),
			  (place.address_components[0] && place.address_components[0].short_name || '')
            ].join(' ');
        }
    
        //검색해서 지정한 곳 위치 설명란에 들어갈 항목. 위치 이름과 주소가 뜸.
        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);

        //드래그 이벤트
				google.maps.event.addListener(marker,'dragend',function(event)  {
					infowindow.close();
					document.getElementById('lat').value = event.latLng.lat();
					document.getElementById('lng').value = event.latLng.lng();
					var lat = event.latLng.lat();
					var lng = event.latLng.lng();
					var geocoder = new google.maps.Geocoder();
					// var infowindowdrag = new google.maps.InfoWindow();
					// infowindowdrag.open(map,marker);
					var point = new google.maps.LatLng( lat, lng);
						
					if (geocoder) {
						geocoder.geocode({ 'latLng': point }, function (results, status) {
							if (status == google.maps.GeocoderStatus.OK) {
								if (results[0]) {
									infowindowdrag.setContent( '<strong>' + place.name + '</strong>' + '<br>' +  results[0].formatted_address);	
									infowindowdrag.open(map,marker);
								} else {
									console.log('No results found');
								}
							} else {
								console.log('Geocoder failed due to: ' + status);
							}
						});
					}
						
				});			
		
			});
		// })
		// }
		}



		// for (var i = 0; i < place.address_components.length; i++) {
        //     if(place.address_components[i].types[0] == 'postal_code'){
        //         document.getElementById('postal_code').innerHTML = place.address_components[i].long_name;
        //     }
        //     if(place.address_components[i].types[0] == 'country'){
        //         document.getElementById('country').innerHTML = place.address_components[i].long_name;
        //     }
        // }
        // document.getElementById('location').innerHTML = place.formatted_address;
        // document.getElementById('lat').innerHTML = place.geometry.location.lat();
        // document.getElementById('lon').innerHTML = place.geometry.location.lng();

        // //드래그 이벤트 처리
		// 	google.maps.event.addListener(marker,'dragend',function(event)  {
		// 		infowindow.setMap(null);
		// 		var geocoder = new google.maps.Geocoder();

		// 		document.getElementById('lat').value = event.getPosition().lat();
		// 		document.getElementById('lng').value = event.getPosition().lng();
		// 		var latlng = event.getPosition();

		// 		geocoder.geocode({"latLng": latlng}, function(data, status) {
						
		// 			if (status == google.maps.GeocoderStatus.OK) {

		// 				var add = data[1].formatted_address;
						

					 	// if (data[1].address_components[i].types[0] == "administrative_area_level_1") {
						 		// document.getElementById('locationbox').value = ;
								
								 
						 
						 
// 					}
// 					var infowindowdrag = new google.maps.InfoWindow();
// 					infowindowdrag.setContent(response.results[0].formatted_address);
// 					infowindowdrag.open(map,marker);
// 				});
// 			});	
//     });
// }
</script>