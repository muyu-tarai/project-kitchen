let selectedMenuFigure = document.querySelector("#menu-figure");
let hideMenuFigure = document.querySelector("#menu-figure-hide");
let menuName = document.querySelector("#add-menu-name");
let menuPrice = document.querySelector("#add-menu-price");
let menuComment = document.querySelector("#add-menu-comment");
let menuImage = document.querySelector("#add-menu-image");
let storesItems = document.querySelector("#store-items");
let storeNameErr = document.querySelector("#store-name-err");
let storeName = document.querySelector("#store-name");
let errMsgZone = document.querySelector("#err-msg-zone");
let storeComment = document.querySelector("#store-comment");
let storeItem = document.querySelector("#store-item");
let menuNameErr = document.querySelector("#menu-name-err");
let menuPriceErr = document.querySelector("#menu-price-err");
let addMenuImageLabel = document.querySelector("#add-menu-image-label");
let addMenuImages = document.querySelector("#add-menu-images");
let menuCommentErr = document.querySelector("#menu-comment-err");
let menuNameText = document.querySelector("#menu-name-text");
let menuPriceText = document.querySelector("#menu-price-text");
let menuCommentText = document.querySelector("#menu-comment-text");
let addedMenuFigure = document.querySelector("#add-menu-figure");
let getMenuTitleList = document.querySelector(".get-menu-title");
let addMenuImageLabelClass = document.querySelector(".add-menu-image-label");

function addImage(getImage, getFigure) {
    let input = document.querySelector(getImage);
    let figure = document.querySelector(getFigure);

    input.addEventListener("change", (event) => {
        let [file] = event.target.files;
        if (file) {
            figure.setAttribute("src", URL.createObjectURL(file));
        }
    });
}

function addMenu() {
    let tmp = `
  <div class="store-item" id="store-item">
  <div class="store-figure-display">
  <img src="" class="store-figure" id="add-menu-figure" alt="">
  </div>
  <p class="menu-title" name="menu_name">${menuName.value}</p>
  <p class="menu-price" name="menu_price">${menuPrice.value} 円</p>
  <p class="menu-text">${menuComment.value}</p>
  <input type="hidden" value="${menuImage.value}" name="send_menu_image[]">
  <input type="hidden" value="${menuName.value}" name="send_menu_name[]" class="get-menu-title">
  <input type="hidden" value="${menuPrice.value}" name="send_menu_price[]">
  <input type="hidden" value="${menuComment.value}" name="send_menu_comment[]">
  <div class="menu-delete"><label><button type="button" onclick="removeItem(this)"></button>削除</label></div>
  </div>
`;

    storesItems.insertAdjacentHTML("beforeend", tmp);
    addedMenuFigure.setAttribute(
        "src",
        selectedMenuFigure.getAttribute("src")
    );
    addedMenuFigure.removeAttribute("id");
}

function removeItem(button) {
    let parent = button.parentNode.parentNode.parentNode;
    parent.remove();
}

function cancelSubmit() {
    if (storeNameErr != null) {
        do {
            storeNameErr.remove();
        } while (storeNameErr != null);
    }

    submitErr = 0;
    if (storeName.value === "") {
        errMsgZone.insertAdjacentHTML(
            "beforeend",
            `<li id="store-name-err" class="validation">店舗名は必須入力です</li>`
        );
        submitErr = 1;
    }

    if (storeName.value.length > 30) {
        errMsgZone.insertAdjacentHTML(
            "beforeend",
            `<li id="store-name-err" class="validation">店舗名は30文字以内で入力してください</li>`
        );
        submitErr = 1;
    }

    if (storeComment.value.length > 150) {
        errMsgZone.insertAdjacentHTML(
            "beforeend",
            `<li id="store-name-err" class="validation">店舗紹介コメントは150文字以内で入力してください</li>`
        );
        submitErr = 1;
    }

    if (storeItem == null) {
        errMsgZone.insertAdjacentHTML(
            "beforeend",
            `<li id="store-name-err" class="validation">メニューを1つ以上登録してください</li>`
        );
        submitErr = 1;
    }

    if (submitErr == 1) {
        scrollTop();
        return false;
    }
}

function scrollTop() {
    window.scroll({ top: 0, behavior: "smooth" });
}

addImage("#add-store-image", "#store-figure");
addImage("#add-menu-image", "#menu-figure");

let addMenuButton = `
  <label id="add-menu-image-label" class="add-menu-image-label">
  <input type="file" name="menu_image[]" id="add-menu-image">写真を選択
  </label>
  `;
$("#add-menu").on("click", function () {
    //メニューのバリデーション
    let err = 0;
    if (menuNameErr != null) {
        menuNameErr.remove();
    }
    if (menuPriceErr != null) {
        menuPriceErr.remove();
    }
    if (menuCommentErr != null) {
        menuCommentErr.remove();
    }

    for (let i = 0; i < getMenuTitleList.length; i++) {
        if (getMenuTitleList.item(i).value == menuName.value) {
            menuNameText.insertAdjacentHTML(
                "beforeend",
                `<p id="menu-name-err" class="err-msg">メニュー名が重複しています</p>`
            );
            err = 1;
        }
    }
    if (menuName.value == "") {
        menuNameText.insertAdjacentHTML(
            "beforeend",
            `<p id="menu-name-err" class="err-msg">メニュー名は必須入力です</p>`
        );
        err = 1;
    } else if (menuName.value.length > 20) {
        menuNameText.insertAdjacentHTML(
            "beforeend",
            `<p id="menu-name-err" class="err-msg">メニュー名は20文字以内で入力してください</p>`
        );
        err = 1;
    }
    if (menuPrice.value == "") {
        menuPriceText.insertAdjacentHTML(
            "beforeend",
            `<p id="menu-price-err" class="err-msg">メニュー金額は必須入力です</p>`
        );
        err = 1;
    } else if (!menuPrice.value.match(/^[0-9]+$/)) {
        menuPriceText.insertAdjacentHTML(
            "beforeend",
            `<p id="menu-price-err" class="err-msg">メニュー金額は半角数字で入力してください</p>`
        );
        err = 1;
    } else if (menuPrice.value >= 100001) {
        menuPriceText.insertAdjacentHTML(
            "beforeend",
            `<p id="menu-price-err" class="err-msg">メニュー金額は100000円以下で入力してください</p>`
        );
        err = 1;
    }
    if (menuComment.value.length > 30) {
        menuCommentText.insertAdjacentHTML(
            "beforeend",
            `<p id="menu-comment-err" class="err-msg">メニューコメントは30文字以内で入力してください</p>`
        );
        err = 1;
    }
    if (err == 0) {
        addMenu();
        let lastMenuBottom = storesItems.lastElementChild;
        lastMenuBottom.appendChild(menuImage);
        addMenuImageLabelClass.setAttribute(
            "class",
            "add-menu-image-label-none"
        );
        addMenuImageLabel.removeAttribute("id");
        menuImage.setAttribute("id", "add-menu-image-none");
        addMenuImages.insertAdjacentHTML("beforeend", addMenuButton);
        selectedMenuFigure.setAttribute(
            "src",
            hideMenuFigure.getAttribute("src")
        );
        menuName.value = "";
        menuPrice.value = "";
        menuComment.value = "";
        addImage("#add-menu-image", "#menu-figure");
    }
});
