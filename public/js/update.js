var now = new Date();
var year = now.getFullYear();
var month = now.getMonth() + 1;
var day = now.getDate();
var hour = now.getHours().toString().padStart(2, '0');;
var minute = now.getMinutes().toString().padStart(2, '0');;
var time = hour+':'+minute;

document.getElementById("year").value = year;
document.getElementById("month").value = month;
document.getElementById("day").value = day;
document.getElementById("time").value = time;


let close = document.getElementById("close");
let open = document.getElementById("open");
let hide = document.getElementById("hide-content");
let o_flag = document.getElementById("o_flag");

if(o_flag.value==0){
  open.classList.add('out');
  hide.classList.add('hide');
}else{
  close.classList.add('out');
}

open.addEventListener('click', openClick);
close.addEventListener('click', closeClick);

function openClick(){
  close.classList.add('out');
  open.classList.remove('out');
  hide.classList.remove('hide');
  o_flag.value = 1;
}
function closeClick(){
  open.classList.add('out');
  close.classList.remove('out')
  hide.classList.add('hide');
  o_flag.value = 0;
}

 let menu_flags = document.getElementsByClassName("menu_flag");
 let menu_items = document.getElementsByClassName("menu-item")

for (let i = 0; i < menu_items.length; i++) {
  if(menu_flags[i].value=='1'){
    menu_items[i].classList.add('dark');
  }
}


 function menuClick(){
if(menu_flag.value=='0'){
  menu_flag.value=1;
  menu_items[i].classList.add('dark');
} else if(menu_flag.value=='1'){
  menu_flag.value=0;
  menu_items[i].classList.remove('dark');
}}

$('.menu-item').on('click',function(){
let m_flag=$(this).children('.menu_flag').val();
if(m_flag==0){
  $(this).children('.menu_flag').val(1);
  this.classList.add('dark');
}else{
    $(this).children('.menu_flag').val(0);
    this.classList.remove('dark');
  }
})


  function initMap() {
    // Google Mapsを初期化し、指定した要素に表示します
    map = new google.maps.Map(document.getElementById('gmap'), {
        center: { lat: 0, lng: 0 }, // 地図の初期中心位置（緯度0、経度0）
        zoom: 17 // 初期ズームレベル
    });
  
    // ブラウザが位置情報取得をサポートしているかチェック
    if (navigator.geolocation) {
        // 位置情報を非同期で取得
        navigator.geolocation.getCurrentPosition(
            (position) => {
                // 位置情報を取得成功時の処理
  
                // ユーザーの緯度と経度を取得
                const userLatLng = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                console.log(userLatLng);
                document.getElementById("locate").value=[  position.coords.latitude, position.coords.longitude];
  
                // ユーザーの位置情報を地図の中心に設定
                map.setCenter(userLatLng);
  
                // ユーザーの位置にマーカーを追加して表示
                const marker = new google.maps.Marker({
                    position: userLatLng,
                    map: map,
                    title: 'Your Location' // マーカーに表示されるタイトル
                });
            },
            (error) => {
                // 位置情報取得失敗時の処理
                console.log('位置情報の取得に失敗しました', error);
            }
        );
    } else {
        // ブラウザが位置情報取得をサポートしていない場合の処理
        console.log('位置情報がサポートされていません');
    }
  }