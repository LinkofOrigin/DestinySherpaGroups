var hidden = true;
function toggleloginBack() {
    if (hidden) {
        showloginBack();
    } else {
        hideloginBack();
    }
}

function showloginBack() {
    $("#loginBack").show();
    $("#loginBox").show();
    $("#loginErrors").show();
    hidden = false;
}

function hideloginBack() {
    $("#loginBack").hide();
    $("#loginBox").hide();
    $("#loginErrors").hide();
    hidden = true;
}

function passwordCheck(id1, id2, errorId) {
    var errorObj = $("#" + errorId);
    errorObj.show();

    var val1 = $("#" + id1).val();
    var val2 = $("#" + id2).val();
    if (val1 === val2) {
        // passwords match
        if ($("#accountCurrPass").val() === "") {
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

function activateConsole(consoleButton, consoleSetID) {
    if ($(consoleButton).hasClass("active")) {
        $(".console").each(function () {
            $(this).removeClass("active");
        });
        $(consoleSetID).val("");
    } else {
        $(".console").each(function () {
            $(this).removeClass("active");
        });
        $(consoleButton).addClass("active");
        $(consoleSetID).val($(consoleButton).text());
    }

}

function activateActivity(activityButton, activitySetID) {
    if ($(activityButton).hasClass("active")) {
        $(".activity").each(function () {
            $(this).removeClass("active");
        });
        $(activitySetID).val("");
    } else {
        $(".activity").each(function () {
            $(this).removeClass("active");
        });
        $(activityButton).addClass("active");
        var createActivity = $(activitySetID);
        switch ($(activityButton).text()) {
            case "Vault of Glass":
                createActivity.val(1);
                break;
            case "Crota's End":
                createActivity.val(2);
                break;
            case "Prison of Elders":
                createActivity.val(3);
                break;
            case "King's Fall":
                createActivity.val(4);
                break;
            default:
                break;
        }
    }
}

$(document).ready(function () {
    $("#login").on("click", toggleloginBack);
    $("#newUserForm").submit(function() {
        return passwordCheck("newPassword1", "newPassword2", "newUserError");
    });
    $("#newPassword1").on("keyup", function() {
        passwordCheck("newPassword1", "newPassword2", "newUserError");
    });
    $("#newPassword2").on("keyup", function() {
        passwordCheck("newPassword1", "newPassword2", "newUserError");
    });
});
