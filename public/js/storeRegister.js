let selectedMenuFigure = document.querySelector('#menu-figure')
let menuName = document.querySelector('#add-menu-name')
let menuPrice = document.querySelector('#add-menu-price')
let menuComment = document.querySelector('#add-menu-comment')
let menuImage = document.querySelector('#add-menu-image')

function addImage (getImage, getFigure) {
  let input = document.querySelector(getImage)
  let figure = document.querySelector(getFigure)

  input.addEventListener('change', (event) => { // <1>
    let [file] = event.target.files

    if (file) {
      figure.setAttribute('src', URL.createObjectURL(file))
    }
  })
}

function addMenu()
{
  let storesItems = document.querySelector('#stores-items')
  let tmp = `
  <div class="stores-item">
  <div class="store-figure-display">
  <img src="/images/icons/noImage.jpg" class="store-figure" id="menu-figure" alt="">
  </div>
  <p class="menu-title" name="menu_name">${menuName.value}</p>
  <p class="menu-price" name="menu_price">${menuPrice.value} 円</p>
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

function cancelSubmit() {
  if(document.querySelector('#store-name-err') != null){
  do{
    document.querySelector('#store-name-err').remove()
  }while(document.querySelector('#store-name-err') != null)
    }

    submitErr = 0;
        if(document.querySelector("#store-name").value === "") {
          document.querySelector('#err-msg-zone').insertAdjacentHTML('beforeend', `<li id="store-name-err" class="validation">店舗名は必須入力です</li>`);
          submitErr = 1;
        }

        if(document.querySelector("#store-name").value.length > 30) {
          document.querySelector('#err-msg-zone').insertAdjacentHTML('beforeend', `<li id="store-name-err" class="validation">店舗名は30文字以内で入力してください</li>`);
          submitErr = 1;
        }

        if(document.querySelector("#store-comment").value.length > 150) {
          document.querySelector('#err-msg-zone').insertAdjacentHTML('beforeend', `<li id="store-name-err" class="validation">店舗紹介コメントは150文字以内で入力してください</li>`);
          submitErr = 1;
        }
        
        if(document.querySelector('#stores-item') == null){
          document.querySelector('#err-msg-zone').insertAdjacentHTML('beforeend', `<li id="store-name-err" class="validation">メニューを1つ以上登録してください</li>`);
          submitErr = 1;
        }

        if(submitErr = 1){
          scrollTop()
          return false
        }
      }

function scrollTop() {
window.scroll({ top: 0, behavior: "smooth" });
}
  
  
  addImage('#add-store-image', '#store-figure')
  addImage('#add-menu-image', '#menu-figure')
  
  let addMenuButton = `
  <label id="add-menu-image-label" class="add-menu-image-label">
  <input type="file" name="menu_image[]" id="add-menu-image">写真を選択
  </label>
  `
  let addMenuImageLabel = document.querySelector('#add-menu-image-label')
  $('#add-menu').on('click', function() {

    //メニューのバリデーション
    let err = 0
    if(document.querySelector('#menu-name-err') != null){
      document.querySelector('#menu-name-err').remove()
    }
    if(document.querySelector('#menu-price-err') != null){
      document.querySelector('#menu-price-err').remove()
    }
    if(document.querySelector('#menu-comment-err') != null){
      document.querySelector('#menu-comment-err').remove()
    }
if(menuName.value == ""){
  document.querySelector('#menu-name-text').insertAdjacentHTML('beforeend', `<p id="menu-name-err" class="err-msg">メニュー名は必須入力です</p>`)
  err = 1
}else if(menuName.value.length > 20){
  document.querySelector('#menu-name-text').insertAdjacentHTML('beforeend', `<p id="menu-name-err" class="err-msg">メニュー名は20文字以内で入力してください</p>`)
  err = 1
}
if(menuPrice.value == ""){
  document.querySelector('#menu-price-text').insertAdjacentHTML('beforeend', `<p id="menu-price-err" class="err-msg">メニュー金額は必須入力です</p>`)
  err = 1
}else if(menuPrice.value >= 100001){
  document.querySelector('#menu-price-text').insertAdjacentHTML('beforeend', `<p id="menu-price-err" class="err-msg">メニュー金額は100000円以下で入力してください</p>`)
  err = 1
}
if(menuComment.value.length > 30){
  document.querySelector('#menu-comment-text').insertAdjacentHTML('beforeend', `<p id="menu-comment-err" class="err-msg">メニューコメントは30文字以内で入力してください</p>`)
  err = 1
}
if(err == 0){
    addMenu()
    let lastMenuBottom = document.querySelector('#stores-items').lastElementChild
  lastMenuBottom.appendChild(document.querySelector('#add-menu-image'))
  document.querySelector('.add-menu-image-label').setAttribute('class', 'add-menu-image-label-none')
  document.querySelector('#add-menu-image-label').removeAttribute('id')
  document.querySelector('#add-menu-image').setAttribute('id', 'add-menu-image-none')
  document.querySelector('#add-menu-images').insertAdjacentHTML('beforeend', addMenuButton)
  selectedMenuFigure.setAttribute('src', "/images/icons/noImage.jpg")
  menuName.value = ''
  menuPrice.value = ''
  menuComment.value = ''
  addImage('#add-menu-image', '#menu-figure')
}
})