<?php
	/*
	 * Reset the PG databases to the initial Selenium state.
	 *
	 * This needs to be here, at the top-level of the ppa directory
	 * structure, to get include() paths right.
	 */
	require('./tests/selenium/reset.php');

	reset_selftest();
?>
