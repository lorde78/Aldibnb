<?php
$action = empty($_REQUEST['action']) ? '' : $_REQUEST['action'];

if (!is_user_logged_in()) {
    if (empty($action)) {
        do_action('admin_post_nopriv');
    } else {
        do_action("admin_post_nopriv_{$action}");
    }
} else {
    if (empty($action)) {
        do_action('admin_post');
    } else {
        do_action("admin_post_{$action}");
    }
}
