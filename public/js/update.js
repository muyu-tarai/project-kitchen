var now = new Date();
var month = now.getMonth() + 1;
var day = now.getDate();
var hour = now.getHours().toString().padStart(2, '0');;
var minute = now.getMinutes().toString().padStart(2, '0');;
var time = hour+':'+minute;

document.getElementById("month").value = month;
document.getElementById("day").value = day;
document.getElementById("time").value = time;


let close = document.getElementById("close");
let open = document.getElementById("open");
let hide = document.getElementById("hide-content");
let o_flag = document.getElementById("o_flag");

if(o_flag.value=0){
  open.classList.add('out')
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
