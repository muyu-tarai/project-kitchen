
 let menu_flags = document.getElementsByClassName("menu_flag");
 let menu_items = document.getElementsByClassName("menu");
 let soldouts =  document.getElementsByClassName("soldout");
 let o_flag = document.getElementById("o_flag");

 if(o_flag.value==0){
  document.getElementById("closing-datetime").innerText="閉店中";
 }
for (let i = 0; i < menu_items.length; i++) {
  if(menu_flags[i].value=='1'){
    menu_items[i].classList.add('dark');
    soldouts[i].classList.remove('hide')
    
  }
}
function initMap() {
  // Google Mapsを初期化し、指定した要素に表示します
  map = new google.maps.Map(document.getElementById('gmap'), {
      center: { lat: 0, lng: 0 }, // 地図の初期中心位置（緯度0、経度0）
      zoom: 17 // 初期ズームレベル
  });
  const Loc = document.getElementById("location").value;
  var kugiri = ",";
  var array_Loc = Loc.split(kugiri);
  const userLatLng = {
    lat: Number(array_Loc[0]),
    lng: Number(array_Loc[1])
};

    // ユーザーの位置情報を地図の中心に設定
    map.setCenter(userLatLng);

    // ユーザーの位置にマーカーを追加して表示
    const marker = new google.maps.Marker({
        position: userLatLng,
        map: map,
        title: 'Your Location' // マーカーに表示されるタイトル
    });
}