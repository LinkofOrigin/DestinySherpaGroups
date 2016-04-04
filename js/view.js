var hidden = true;
function toggleloginBack() {
    if (hidden) {
        showloginBack();
    } else {
        hideloginBack();
    }
}

function showloginBack() {
    $("#loginBack").css({display: "block"});
    $("#loginBox").css({display: "block"});
    hidden = false;
}

function hideloginBack() {
    $("#loginBack").css({display: "none"});
    $("#loginBox").css({display: "none"});
    hidden = true;
}

function passwordCheck(id1, id2, errorId) {
    var errorObj = $("#" + errorId);
    errorObj.show();

    var val1 = $("#" + id1).val();
    var val2 = $("#" + id2).val();
    if (val1 === val2) {
        // passwords match
        if($("#accountCurrPass").val() === "") {
            errorObj.removeClass("passwordMatch");
            errorObj.addClass("passwordError");
            errorObj.text("Enter your current password.");
            return false;
        }
        errorObj.removeClass("passwordError");
        errorObj.addClass("passwordMatch");
        errorObj.text("Passwords match!");
        return true;
    } else {
        // passwords DON'T match
        errorObj.removeClass("passwordMatch");
        errorObj.addClass("passwordError");
        errorObj.text("Passwords don't match!");
        return false;
    }
}

$(document).ready(function() {
});
