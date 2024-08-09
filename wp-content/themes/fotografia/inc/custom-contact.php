<?php
if (!defined('ABSPATH')) {
    exit;
}

add_filter('wpcf7_before_send_mail', 'custom_subject');

function custom_subject($contact_form) {
    $submission = WPCF7_Submission::get_instance();
    if ($submission) {
        $data = $submission->get_posted_data();

        $subject = isset($data['your-subject']) ? $data['your-subject'] : '';
        $current_datetime = date('d-m-Y H:i:s');
        $new_subject = $subject . ' - Enviado el: ' . $current_datetime;

        $mail = $contact_form->prop('mail');
        $mail['subject'] = $new_subject;
        $contact_form->set_properties(['mail' => $mail]);
    }
}
