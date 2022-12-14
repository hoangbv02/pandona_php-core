const sortE = document.getElementById("sort");
const priceItems = document.querySelectorAll(".sidebar__form-input");
const fitems = document.querySelectorAll(".sidebar__input-type");
var url = "view/xu_ly_danh_muc_san_pham.php";
var price = "all";
var type = "";

function removeChecked(e) {
    for (let i = 0; i < e.length; i++) {
        if (e[i].checked) {
            e[i].checked = false;
        }
    }
}
window.onload = function () {
    $("#ctproduct").load(url);
};
sortE.onchange = function () {
    const sort_by = this.value;
    if (sort_by) {
        $("#ctproduct").load(url + "?sort_by=" + sort_by);
        priceItems.forEach(function (item, i) {
            if (i === 0) {
                item.checked = true;
            } else {
                item.checked = false;
            }
        });
        fitems.forEach(function (item) {
            item.checked = false;
        });
    }
};

priceItems.forEach(function (item) {
    item.onchange = function (e) {
        if (e.target.checked) {
            price = e.target.value;
            removeChecked(priceItems);
            e.target.checked = true;
            $("#ctproduct").load(`${url}?price=${price}&type=${type}`);
        } else {
            e.target.checked = true;
        }
    };
});
fitems.forEach(function (item) {
    item.onchange = function (e) {
        if (e.target.checked) {
            type = e.target.value;
            removeChecked(fitems);
            e.target.checked = true;
            $("#ctproduct").load(`${url}?price=${price}&type=${type}`);
        } else {
            type = "";
            $("#ctproduct").load(`${url}?price=${price}&type=${type}`);
        }
    };
});
fitems.forEach(function (item) {
    if (item.value == getType) {
        item.checked = true;
    }
});
window.onload = function () {
    $("#ctproduct").load(url + "?price=all&type=" + getType);
};
