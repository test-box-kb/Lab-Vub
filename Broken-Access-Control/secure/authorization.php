<?php 
function requireAdmin()
{
    if ($_SESSION['user']['roles'] !== 'admin') {
        http_response_code(403);
        exit("Forbidden");
    }
}
?>