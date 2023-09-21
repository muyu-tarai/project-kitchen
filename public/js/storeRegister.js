let selectedMenuFigure = document.querySelector('#menu-figure')
let menuName = document.querySelector('#add-menu-name')
let menuPrice = document.querySelector('#add-menu-price')
let menuComment = document.querySelector('#add-menu-comment')

function addImage (getImage, getFigure) {
  const input = document.querySelector(getImage)
  const figure = document.querySelector(getFigure)

  input.addEventListener('change', (event) => { // <1>
    const [file] = event.target.files

    if (file) {
      figure.setAttribute('src', URL.createObjectURL(file))
    }
  })
}

function addMenu()
{
  let storesItems = document.querySelector('#stores-items')
  let menuImage = document.querySelector('#add-menu-image')
  let tmp = `
  <div class="stores-item">
  <img src="/images/icons/noImage.jpg" class="store-figure" id="menu-figure" alt="">
  <p class="menu-title">${menuName.value}</p>
  <p class="menu-price">${menuPrice.value}</p>
  <p class="menu-text">${menuComment.value}</p>
  <input type="hidden" value="${menuImage.value}" name="send_menu_image[]">
  <input type="hidden" value="${menuName.value}" name="send_menu_name[]">
  <input type="hidden" value="${menuPrice.value}" name="send_menu_price[]">
  <input type="hidden" value="${menuComment.value}" name="send_menu_comment[]">
  <div class="menu-delete"><label><button type="button" onclick="removeItem(this)"></button>削除</label></div>
  </div>
`

  storesItems.insertAdjacentHTML('beforeend', tmp)
  selectedMenuFigureImage = selectedMenuFigure.getAttribute('src')
  document.querySelector('#menu-figure').setAttribute('src', selectedMenuFigureImage)
  document.querySelector('#menu-figure').setAttribute('id', 'added-menu-figure')
}

function removeItem(button) {
    let parent = button.parentNode.parentNode.parentNode
    parent.remove()
  }

addImage('#add-store-image', '#store-figure')
addImage('#add-menu-image', '#menu-figure')

$('#add-menu').on('click', function() {
  addMenu()
selectedMenuFigure.setAttribute('src', "/images/icons/noImage.jpg")
menuName.value = ''
menuPrice.value = ''
menuComment.value = ''
})