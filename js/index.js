var events;

function filterEvents() {
    var filterConsole = $("#filterConsole").val();
    if (filterConsole.length === 0) {
        filterConsole = "*";
    }
    console.log(filterConsole);

    var filterActivity = $("#filterActivity").val();
    if (filterActivity.length === 0) {
        filterActivity = "*";
    }
    console.log(filterActivity);

    var date = $("#filterDate").val();
    if (date.length === 0) {
        date = "0000-00-00";
    }

    var time = $("#filterTime").val();
    if (time.length === 0) {
        time = "00:00:00";
    }

    var filterDateTime = date + " " + time;
    console.log("'"+filterDateTime+"'");

    $("#mainRight").load("filter.php", {console: filterConsole, activity: filterActivity, dateTime: filterDateTime});
    
}

$(document).ready(function () {
    $(".console").on("click", function () {
        activateConsole(this, "#filterConsole");
        filterEvents();
    });
    $(".activity").on("click", function () {
        activateActivity(this, "#filterActivity");
        filterEvents();
    });
    $("#filterDate").on("change", function() {
        filterEvents();
    });
    $("#filterTime").on("change", function() {
        filterEvents();
    });
});
