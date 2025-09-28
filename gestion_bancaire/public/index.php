<?php
    require_once(dirname(__DIR__)."/config/constante.php");
    require_once(dirname(__DIR__)."/config/require.php");
    open_session();

    require(ROUTE_DIR."lib/router.php");
?>