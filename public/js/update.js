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
  let latitude;
  let longitude;
  let now_location;
    if (!navigator.geolocation) {
       console.log('位置情報がサポートされていません');
    } else {
      console.log('位置情報を取得中です');
      navigator.geolocation.getCurrentPosition(
        (position) => {
          latitude = position.coords.latitude;
          longitude = position.coords.longitude;
          now_location = `${latitude}, ${longitude}`;

          document.getElementById("locate").value=now_location;
        },
        (error) => {
          console.log('位置情報の取得に失敗しました');
        }
      );
    }
    
    function initMap() {
      console.log(now_location);
      var mapPosition = new google.maps.LatLng(latitude, longitude);//緯度経度
      var map = new google.maps.Map(document.getElementById('gmap'), {
      zoom: 17,//ズーム
      center: mapPosition
    });
      var marker = new google.maps.Marker({
      position: mapPosition,
      map: map
      });
    }