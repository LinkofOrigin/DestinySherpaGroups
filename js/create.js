$(document).ready(function () {
	$(".console").on("click", function () {
		activateConsole(this, "#createConsole");
	});
	$(".activity").on("click", function () {
		activateActivity(this, "#createActivity");
	});
	$("#createEventForm").on("submit", function () {
		var createError = $("#createError");
		if ($("#createConsole").val() === "") {
			createError.text("You must select a console!");
			createError.css("display", "inline-block");
			return false;
		}
		if ($("#createActivity").val() === "") {
			createError.text("You must select an activity!");
			createError.css("display", "inline-block");
			return false;
		}
		if ($("#createDate").val() === "") {
			createError.text("You must select a date!");
			createError.css("display", "inline-block");
			return false;
		}
		if ($("#createTime").val() === "") {
			createError.text("You must select a time!");
			createError.css("display", "inline-block");
			return false;
		}
		createError.text("JOHN CENA!");
		createError.hide();
		return true;
	});
});
