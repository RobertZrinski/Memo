<?php

define('FILE', 'memo.txt');

if (isset($_POST['memo']))
{
	file_put_contents(FILE, $_POST['memo']);
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Memo</title>
		<meta name="viewport" content="width=650" />
		<style type="text/css">
			textarea,
			button,
			span
			{
				font-family: Tahoma;
				font-size: 1.1em;
				line-height: 1.5em;
				padding: 0.5em;
			}
			textarea
			{
				width: 600px;
				height: 20em;
				display: block;
			}
			@media screen and (max-width: 650px)
			{	
				textarea,
				button,
				span
				{
					font-size: 2em;
				}
			}
		</style>
		<script type="text/javascript">
			window.onload = function () {
				var textarea = document.getElementsByTagName('textarea')[0];
				textarea.focus();
				var value = textarea.value;
				textarea.value = '';
				textarea.value = value;
			};
		</script>
	</head>
	<body>
		<form method="post">
			<textarea name="memo"><?php echo file_exists(FILE) ? htmlspecialchars(file_get_contents(FILE)) : '' ?></textarea>
			<button type="submit">Save</button>
			<?php if (isset($_POST['memo'])): ?>
			<span>&#x2714;</span>
			<script type="text/javascript">
				setTimeout(function () {
					document.getElementsByTagName('span')[0].style.display = 'none';
				}, 3000);
			</script>
			<?php endif ?>
		</form>
	</body>
</html>