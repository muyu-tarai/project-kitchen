document.getElementById("modal").addEventListener("click", function() { 
  document.getElementById('myModal').style.display = 'block';
  
});

document.getElementById("close").addEventListener("click", function() { 
  document.getElementById('myModal').style.display = 'none';
  document.getElementById('button').style.display = 'flex';
  document.getElementById("error").textContent ='';
});

