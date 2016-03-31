<?php

$timezone = "";
if (isset($_SESSION["timezone"]) && !empty($_SESSION["timezone"])) {
	$timezone = $_SESSION["timezone"];
}

?>

<script type="text/javascript">
	if ("<?php echo $timezone; ?>".length == 0) {
		var offset = -new Date().getTimezoneOffset();
		$.ajax({
			type: "GET",
			url: "tzset.php",
			data: "offset=" + offset,
			success: function () {
				location.reload();
			}
		});
	}
</script>

<?php date_default_timezone_set($timezone); ?>
