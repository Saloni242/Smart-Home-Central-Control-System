<?php
			header("cache-Control: no-store, no-cache, must-revalidate");
			header("cache-Control: post-check=0, pre-check=0", false);
			header("Pragma: no-cache");
			header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
           session_destroy();

           //do other things... like redirect to a deafault/login page
           redirect(base_url() . 'admin/index');

?>