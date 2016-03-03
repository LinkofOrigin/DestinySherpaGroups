
var hidden = true;
function toggleloginBack() {
    if(hidden) {
        showloginBack();
    } else {
        hideloginBack();
    }
}

function showloginBack() {
    $("#loginBack").css({display:"block"});
    $("#loginBox").css({display:"block"});
    //$("body > *").not("body > header, #loginBack, #loginBack *").each(function() {
    //    $(this).css({opacity: 0.4});
    //});
    hidden = false;
}

function hideloginBack() {
    $("#loginBack").css({display:"none"});
    $("#loginBox").css({display:"none"});
    //$("*").each(function() {
    //    $(this).css({opacity: 1.0});
    //});
    hidden = true;
}

function passwordCheck() {
    if($("#newPassword1").val() === $("#newPassword2").val()) {
        $("#newUserForm").submit();
    } else {
        // let user know passwords don't match
    }
}
