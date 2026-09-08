<?php

if (!function_exists('set_flash_alert'))
{
    function set_flash_alert($alert, $message) {
        $LAVA =& lava_instance();
        $LAVA->session->set_flashdata(array('alert' => $alert, 'message' => $message));
    }
}