<?php
session_start();
session_unset();
session_destroy();
?>
<script type="text/javascript">
	alert("Successfully logout!");
	window.location = "login.html";
</script>