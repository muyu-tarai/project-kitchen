var now = new Date();
var month = now.getMonth() + 1;
var day = now.getDate();
var hour = now.getHours();
var minute = now.getMinutes();
var time = hour+':'+minute

document.getElementById("month").value = month;
document.getElementById("day").value = day;
document.getElementById("time").value = time;

let close = document.getElementById("close");
let open = document.getElementById("open");
let hide = document.getElementById("hide-content");

open.addEventListener('click', openClick);
close.addEventListener('click', closeClick);

function openClick(){
  close.classList.add('out');
  open.classList.remove('out');
  hide.classList.remove('hide');
}
function closeClick(){
  open.classList.add('out');
  close.classList.remove('out')
  hide.classList.add('hide');
}