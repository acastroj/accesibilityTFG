<?php

require_once('../../config.php');
require_once($CFG->dirroot . '/blocks/accessibility/lib.php');
require_login();

$r = required_param('r', PARAM_INT);
$g = required_param('g', PARAM_INT);
$b = required_param('b', PARAM_INT);
$a = required_param('a', PARAM_FLOAT);
exit;
switch ($scheme) {
    case 1: //TODO TRANSPARENTE
        // Clear the scheme stored in the session.
        unset($USER->colourscheme);

        // Clear user records in database.
        $urlparams = array(
                'op' => 'reset',
                'scheme' => true,
                'userid' => $USER->id
        );
        if (!accessibility_is_ajax()) {
            $redirect = required_param('redirect', PARAM_TEXT);
            $urlparams['redirect'] = safe_redirect_url($redirect);
        }
        $redirecturl = new moodle_url('/blocks/accessibility/database.php', $urlparams);
        redirect($redirecturl);
        break;

    case 2:
    case 3:
    case 4:
        $USER->colourscheme = $scheme;
        break;

    default:
        header("HTTP/1.0 400 Bad Request");
        break;
}

if (!accessibility_is_ajax()) {
    $redirect = required_param('redirect', PARAM_TEXT);
    $redirecturl = new moodle_url($redirect);
    redirect($redirecturl);
}
