var HOME_PATH = window.HOME_PATH || '.';
var position = new naver.maps.LatLng(37.500753, 127.003254);

var map = new naver.maps.Map('map', {
    center: position,
    zoom: 16, //지도의 초기 줌 레벨
    minZoom: 7, //지도의 최소 줌 레벨
    zoomControl: true, //줌 컨트롤의 표시 여부
    ZoomControlOptions: { //줌 컨트롤의 옵션
        position: naver.maps.Position.TOP_RIGHT
        }
});

var markerOptions = {
    position: position.destinationPoint(90, 15),
    map: map,
    icon: {
        url: './img/map/airplane_low3.png',
        size: new naver.maps.Size(47, 51),
        origin: new naver.maps.Point(0, 0),
        anchor: new naver.maps.Point(25, 41) // 앵커로 잡아야지 오류생기지않음
    }
};

var marker = new naver.maps.Marker(markerOptions);
// 이 위쪽으로는 마커 넣는 법



   map.setOptions("mapTypeControl", true); //지도 유형 컨트롤의 표시 여부