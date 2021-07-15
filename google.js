const url = 'syutoku.php';
let alldata;
let response = fetch(url)
    .then(response => response.json())
    .then(data => {
        console.log(data);
        alldata = data;
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
        console.log(typeof (mapLatLng));
        let Options = {
            zoom: 15,      //地図の縮尺値
            center: mapLatLng,    //地図の中心座標
            mapTypeId: 'roadmap'   //地図の種類
        };
        // マップオブジェクトを作成
        let map = new google.maps.Map(document.getElementById('map'), Options);
        let marker = new google.maps.Marker({
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
    },
);
