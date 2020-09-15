//  ================================================
//  FUNGSI UNTUK CHECKBOXS SELECT ALL
//  ================================================

const allItemsBoxContainer = document.getElementById('allItemsBoxContainer');
const allBox = document.getElementById('select-all');
const itemBoxs = document.querySelectorAll('.itemBoxs');

// Listen for click on toggle select-all checkbox
allBox.onclick = function () {
    if (allBox.checked == true) {
        itemBoxs.forEach(function (el) {
            el.checked = true;
        });
    } else {
        itemBoxs.forEach(function (el) {
            el.checked = false;
        });
    }
};

//check are all checkboxes checked
function checkedAll() {
    const itemBoxsChecked = document.querySelectorAll('.itemBoxs:checked');
    if (itemBoxs.length === itemBoxsChecked.length) {
        allBox.checked = true;
    } else {
        allBox.checked = false;
    }
};

// add onclick event on item checkboxes
allItemsBoxContainer.addEventListener('click', function () {
    checkedAll();
});

// on document ready run
checkedAll();





// JQUERY SCRIPT for Plugin
// Slimscroll
$(function () {
    $('#list-container').slimScroll({
        height: '250px',
        color: '#000000',
        width: '100%',
        alwaysVisible: 'true',
        railVisible: 'true',
    });
});
