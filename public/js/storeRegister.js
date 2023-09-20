function storeImage () {
  const input = document.querySelector('#store-image');
  const figure = document.querySelector('#store-figure');
  
  input.addEventListener('change', (event) => { // <1>
    const [file] = event.target.files;
    
    if (file) {
      figure.setAttribute('src', URL.createObjectURL(file));
    }
  });
}

function menuImage(){
  const input = document.querySelector('#menu-image');
  const figure = document.querySelector('#menu-figure');

  input.addEventListener('change', (event) => { // <1>
    const [file] = event.target.files;
    
    if (file) {
      figure.setAttribute('src', URL.createObjectURL(file));
    }
  });
}

function addMenu(){
  let storesItems = document.querySelector('#stores-items')
  let menuImage = document.querySelector('#add-menu-image')
  let menuName = document.querySelector('#add-menu-name')
  let menuPrice = document.querySelector('#add-menu-price')
  let menuComment = document.querySelector('#add-menu-comment')
  let tmp = `
  <div class="stores-item">
  <img src="/images/foods/Crepe1.jpg" alt="クレープ">
  <p class="menu-title">${menuName.value}</p>
  <p class="menu-price">${menuPrice.value}</p>
  <p class="menu-text">${menuComment.value}</p>
  <div class="menu-delete"><label><button></button>削除</label></div>
  </div>
`

storesItems.insertAdjacentHTML('beforeend', tmp);
}

storeImage();
menuImage();

$('#add-menu').on('click', function() {
addMenu();
})