$(document).ready(function() {
    $("#accountForm").on("submit", function() {
        return passwordCheck("accountNewPass1", "accountNewPass2", "accountPassError");
    });
    $("#accountNewPass1").on("keyup", function() {
        passwordCheck("accountNewPass1", "accountNewPass2", "accountPassError");
    });
    $("#accountNewPass2").on("keyup", function() {
        passwordCheck("accountNewPass1", "accountNewPass2", "accountPassError");
    });
    $(".console").on("click", function () {
        activateConsole(this, "#accountConsole");
    });
});
