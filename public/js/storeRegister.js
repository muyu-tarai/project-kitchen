let selectedMenuFigure = document.querySelector("#menu-figure");
let menuName = document.querySelector("#add-menu-name");
let menuPrice = document.querySelector("#add-menu-price");
let menuComment = document.querySelector("#add-menu-comment");
let menuImage = document.querySelector("#add-menu-image");
let num = 1;

// fileで指定された画像をimg要素のsrcに挿入して表示する
function addImage(getImage, getFigure) {
    let input = document.querySelector(getImage);
    let figure = document.querySelector(getFigure);

    input.addEventListener("change", (event) => {
        // <1>
        let [file] = event.target.files;
        
        if (file) {
            figure.setAttribute("src", URL.createObjectURL(file));
        }
    });
}

addImage("#add-store-image", "#store-figure");
addImage("#add-menu-image", "#menu-figure");

//HTMLに埋め込む関数.メニュー削除する
function removeItem(button) {
    let parent = button.parentNode.parentNode.parentNode;
    parent.remove();
}

//送信ボタン押された時の関数.店舗情報でエラーあったら送信キャンセルしてエラーメッセージ出すよ
function cancelSubmit() {
    if (document.querySelector("#store-name-err") != null) {
        do {
            document.querySelector("#store-name-err").remove();
        } while (document.querySelector("#store-name-err") != null);
    }

    submitErr = 0;
    if (document.querySelector("#store-name").value === "") {
        document
            .querySelector("#err-msg-zone")
            .insertAdjacentHTML(
                "beforeend",
                `<li id="store-name-err" class="validation">店舗名は必須入力です</li>`
            );
        submitErr = 1;
    }

    if (document.querySelector("#store-name").value.length > 30) {
        document
            .querySelector("#err-msg-zone")
            .insertAdjacentHTML(
                "beforeend",
                `<li id="store-name-err" class="validation">店舗名は30文字以内で入力してください</li>`
            );
        submitErr = 1;
    }

    if (document.querySelector("#store-comment").value.length > 150) {
        document
            .querySelector("#err-msg-zone")
            .insertAdjacentHTML(
                "beforeend",
                `<li id="store-name-err" class="validation">店舗紹介コメントは150文字以内で入力してください</li>`
            );
        submitErr = 1;
    }

    if (document.querySelector("#stores-item") == null) {
        document
            .querySelector("#err-msg-zone")
            .insertAdjacentHTML(
                "beforeend",
                `<li id="store-name-err" class="validation">メニューを1つ以上登録してください</li>`
            );
        submitErr = 1;
    }

    if (submitErr == 1) {
        window.scroll({ top: 0, behavior: "smooth" });
        return false;
    }

    console.log($(".count_menu_image").length);
}

// メニュー追加の記述
let addMenuImageLabel = document.querySelector("#add-menu-image-label");
$("#add-menu").on("click", function () {
    //メニューのバリデーション
    let err = 0;
    if (document.querySelector("#menu-name-err") != null) {
        document.querySelector("#menu-name-err").remove();
    }
    if (document.querySelector("#menu-price-err") != null) {
        document.querySelector("#menu-price-err").remove();
    }
    if (document.querySelector("#menu-comment-err") != null) {
        document.querySelector("#menu-comment-err").remove();
    }

    let getMenuTitleList = document.getElementsByClassName("get-menu-title");
    for (let i = 0; i < getMenuTitleList.length; i++) {
        if (getMenuTitleList.item(i).value == menuName.value) {
            document
                .querySelector("#menu-name-text")
                .insertAdjacentHTML(
                    "beforeend",
                    `<p id="menu-name-err" class="err-msg">メニュー名が重複しています</p>`
                );
            err = 1;
        }
    }
    if (menuName.value == "") {
        document
            .querySelector("#menu-name-text")
            .insertAdjacentHTML(
                "beforeend",
                `<p id="menu-name-err" class="err-msg">メニュー名は必須入力です</p>`
            );
            err = 1;
    } else if (menuName.value.length > 20) {
        document
        .querySelector("#menu-name-text")
            .insertAdjacentHTML(
                "beforeend",
                `<p id="menu-name-err" class="err-msg">メニュー名は20文字以内で入力してください</p>`
            );
            err = 1;
    }
    if (menuPrice.value == "") {
        document
            .querySelector("#menu-price-text")
            .insertAdjacentHTML(
                "beforeend",
                `<p id="menu-price-err" class="err-msg">メニュー金額は必須入力です</p>`
            );
        err = 1;
    } else if (!menuPrice.value.match(/^[0-9]+$/)) {
        document
        .querySelector("#menu-price-text")
        .insertAdjacentHTML(
                "beforeend",
                `<p id="menu-price-err" class="err-msg">メニュー金額は半角数字で入力してください</p>`
            );
        err = 1;
    } else if (menuPrice.value >= 100001) {
        document
        .querySelector("#menu-price-text")
            .insertAdjacentHTML(
                "beforeend",
                `<p id="menu-price-err" class="err-msg">メニュー金額は100000円以下で入力してください</p>`
            );
            err = 1;
        }
    if (menuComment.value.length > 30) {
        document
            .querySelector("#menu-comment-text")
            .insertAdjacentHTML(
                "beforeend",
                `<p id="menu-comment-err" class="err-msg">メニューコメントは30文字以内で入力してください</p>`
                );
        err = 1;
    }
    if (err == 0) {
        addMenu();
        num++;
        let addMenuButton = `
        <label id="add-menu-image-label" class="add-menu-image-label">
        <input type="file" name="menu_image${num}" id="add-menu-image" class="count_menu_image">写真を選択
        </label>
        `;
        let lastMenuBottom =
        document.querySelector("#stores-items").lastElementChild;
        lastMenuBottom.appendChild(document.querySelector("#add-menu-image"));
        document
            .querySelector(".add-menu-image-label")
            .setAttribute("class", "add-menu-image-label-none");
            document.querySelector("#add-menu-image-label").removeAttribute("id");
            document
            .querySelector("#add-menu-image")
            .setAttribute("id", "add-menu-image-none");
            document
            .querySelector("#add-menu-images")
            .insertAdjacentHTML("beforeend", addMenuButton);
        selectedMenuFigure.setAttribute(
            "src",
            document.querySelector("#menu-figure-hide").getAttribute("src")
        );
        menuName.value = "";
        menuPrice.value = "";
        menuComment.value = "";
        addImage("#add-menu-image", "#menu-figure");
    }
});

// メニュー追加の際に作動.記入したメニューを追加する
function addMenu() {
    let storesItems = document.querySelector("#stores-items");
    let tmp = `
  <div class="stores-item" id="stores-item">
  <div class="store-figure-display">
  <img src="/images/icons/noImage.jpg" class="store-figure" id="menu-figure" alt="">
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
    document
        .querySelector("#menu-figure")
        .setAttribute("src", selectedMenuFigure.getAttribute("src"));
    document
        .querySelector("#menu-figure")
        .setAttribute("id", "added-menu-figure");
}
