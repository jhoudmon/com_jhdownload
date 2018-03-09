<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

$chemin = JPATH_ROOT . $_SERVER['REQUEST_URI'];
if (is_file($chemin)) {
	
	$user = JFactory::getUser();
	if ($user->guest) {
		header('Location: /404.html', true, 302);
		exit;
	} else {
		$extension = strtolower(substr(strrchr($chemin, '.'), 1));
		$fichier = substr(strrchr($chemin, '/'), 1);

		header('Content-Description: File Transfer');

		// ContentType
		if ($extension == 'pdf') {
			header('Content-Type: application/pdf');
		} elseif ($extension == 'jpg') {
			header('Content-Type: image/jpeg');
		} elseif ($extension == 'png') {
			header('Content-Type: image/png');
		} else {
			header('Content-Type: application/octet-stream');
		}

		header('Content-Disposition: inline; filename="' . $fichier . '"');
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: max-age=1000000, must-revalidate, private');
		header('Content-Length: ' . filesize($chemin));
		ob_clean();
		flush();
		@readfile($chemin);
		exit;
	}
} else {
	header('Location: /404.html', true, 302);
	exit;
}