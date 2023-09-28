
 let menu_flags = document.getElementsByClassName("menu_flag");

for (let i = 0; i < menu_items.length; i++) {
  if(menu_flags[i].value=='1'){
    menu_items[i].classList.add('dark');
  }
}
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


var latitude;
var longitude;
var now_location=document.getElementById=("location").value;
    function initMap() {
      console.log(latitude);
      console.log(longitude);
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