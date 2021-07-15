const url = 'syutoku.php';
const url1 = 'insert.php';
let map;
let manage_lat;
let manage_lng;
let touroku = document.getElementById("touroku");
let local;
let info_array = [];
let alldata;
let response = fetch(url)
    .then(response => response.json())
    .then(data => {
        alldata = data;
        console.log(alldata);
    });
// Geolocation APIに対応している
if (navigator.geolocation) {
    console.log("この端末では位置情報が取得できます");
    // Geolocation APIに対応していない
} else {
    console.log("この端末では位置情報が取得できません");
}

navigator.geolocation.getCurrentPosition(
    function (position) {
        // 緯度・経度を変数に格納
        let mapLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        let Options = {
            zoom: 15,      //地図の縮尺値
            center: mapLatLng,    //地図の中心座標
            mapTypeId: 'roadmap'   //地図の種類
        };
        // マップオブジェクトを作成
        map = new google.maps.Map(document.getElementById('map'), Options);
        let current_marker = new google.maps.Marker({
            map: map,             // 対象の地図オブジェクト
            position: mapLatLng   // 緯度・経度
        });
        console.log(alldata);
        alldata.forEach(function (element) {
            console.log(element.longitude);
            console.log(element.latitude);
            aaa = new google.maps.LatLng(element.longitude, element.latitude)
            new google.maps.Marker({
                map: map,
                position: aaa
            })
        });
        // 任意の位置にピンをさす
        map.addListener("click", (e) => {
            placeMarkerAndPanTo(e.latLng, map);
        });
    },
);
function placeMarkerAndPanTo(latLng, map) {
    manage_lat = (latLng.lat());
    manage_lng = (latLng.lng());
    local = latLng;
    touroku.style.display = 'block';
}
document.getElementById("button2").onclick = function () {
    console.log(manage_lng);
    const info = document.getElementsByClassName("baito");
    for (i = 0; i < info.length; i++) {
        info_array.push(info[i].value);
    }
    info_array.push(manage_lat);
    info_array.push(manage_lng);
    fetch(url1, {
        method: "POST",
        body: JSON.stringify(info_array)
    }).then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.blob();
    })
        .catch(error => {
            console.error('There has been a problem with your fetch operation:', error);
        });
    touroku.style.display = 'none';
    console.log(map);
    new google.maps.Marker({
        position: local,
        map: map,
    });
    for (i = 0; i < info.length; i++) {
        info[i].value = '';
    }
};