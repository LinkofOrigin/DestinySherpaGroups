function activateActivity(activityButton) {
    $(".activity").each(function () {
        $(this).removeClass("active");
    });
    $(activityButton).addClass("active");
    
    var createActivity = $("#createActivity");
    switch ($(activityButton).text()) {
        case "Vault of Glass":
            createActivity.val(1);
            break;
        case "Crota's End":
            console.log(2);
            createActivity.val(2);
            break;
        case "Prison of Elders":
            console.log(3);
            createActivity.val(3);
            break;
        case "King's Fall":
            console.log(4);
            createActivity.val(4);
            break;
        default:
            console.log($(activityButton).text());
            break;
    }
}

$(document).ready(function () {
    $("#login").click(toggleloginBack);
    $(".console").click(function () {
        activateConsole(this);
    });
    $(".activity").on("click", function () {
        activateActivity(this);
    });
});
