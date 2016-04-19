$(document).ready(function () {
	$(".console").on("click", function () {
		activateConsole(this, "#createConsole");
	});
	$(".activity").on("click", function () {
		activateActivity(this, "#createActivity");
	});
	
	$("#createEventForm").on("submit", function () {
		var createError = $("#createError");
		createError.text("");
		var errorMsgs = [];
		if ($("#createConsole").val() === "") {
			errorMsgs.push("You must select a console!");
		}
		if ($("#createActivity").val() === "") {
			errorMsgs.push("You must select an activity!");
		}
		if ($("#createDate").val() === "") {
			errorMsgs.push("You must select a date!");
		}
		if ($("#createTime").val() === "") {
			errorMsgs.push("You must select a time!");
		}
		
		if (errorMsgs.length !== 0) {
			errorMsgs.forEach(function (msg) {
				createError.append(msg);
				if (errorMsgs[errorMsgs.indexOf(msg) + 1]) {
					createError.append("<br>");
				}
			});
			createError.css("display", "inline-block");
			return false;
		}
		
		createError.text("JOHN CENA!");
		createError.hide();
		return true;
	});
});
