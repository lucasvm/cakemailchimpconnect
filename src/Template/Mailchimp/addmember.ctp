<?php
if ($members->status == 400 ) {
	?>
	<h3>There was an error trying to add this member</h3>
	<?php
	echo $members->detail;
} else {
	?>
	<h1>The member has been added</h1>
	<div class="row">
	<div class="container">
		<script>
		setTimeout(function(){history.back();}, 3000);
		</script>
		<p>Redirecting to list page</p>
	</div>
	</div>
	<?php
}
?>
