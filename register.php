<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>

	<?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/register_post.php') ?>

<?php } else { ?>

	<?php include($_SERVER['DOCUMENT_ROOT'] . '/pages/register_get.php') ?>

<?php } ?>
