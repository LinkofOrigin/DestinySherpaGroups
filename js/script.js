
var hidden = true;
function toggleLoginBox() {
    if(hidden) {
        showLoginBox();
    } else {
        hideLoginBox();
    }
}

function showLoginBox() {
    var loginBox = $("#loginBox");
    loginBox.css({display:"block"});
    $("body > *").not("body > header, #loginBox, #loginBox *").each(function() {
        $(this).css({opacity: 0.4});
    });
    hidden = false;
}

function hideLoginBox() {
    var loginBox = $("#loginBox");
    loginBox.css({display:"none"});
    $("*").each(function() {
        $(this).css({opacity: 1.0});
    });
    hidden = true;
}

// TODO: Find way to click on page to hide loginBox
