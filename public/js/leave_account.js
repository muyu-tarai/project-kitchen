document.getElementById("modal").addEventListener("click", function() { 
  document.getElementById('myModal').style.display = 'block';
  document.getElementById('myModal').style.transition = '5s';
  document.getElementById('button').style.display = 'none';
  
});

document.getElementById("close").addEventListener("click", function() { 
  document.getElementById('myModal').style.display = 'none';
  document.getElementById('button').style.display = 'flex';
  document.getElementById("error").textContent ='';
  
});

