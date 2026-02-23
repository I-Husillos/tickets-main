<?php
return [
    // Email subjects and main messages
    'ticket_created' => 'New ticket created',
    'ticket_commented' => 'New comment on your ticket',
    'ticket_status_changed' => 'Ticket status updated',
    'ticket_closed' => 'Ticket closed',
    'ticket_reopened' => 'Ticket reopened',

    // Descriptive content for DB/API
    'content_created' => 'User :user has created a new ticket: ":title"',
    'content_commented' => ':author has added a comment to ticket ":title":',
    'comment_body_label' => 'Comment content:',
    'content_status_changed' => ':admin changed the status of ticket ":title" to: :status',
    'content_closed' => ':admin has closed ticket ":title"',
    'content_reopened' => ':admin has reopened ticket ":title"',

    // Web content
    'content_created_web' => '<strong>:user</strong> created ticket <strong>":title"</strong>',
    'content_commented_web' => '<strong>:author</strong> commented on <strong>":title"</strong>: <em>":comment"</em>',
    'content_closed_web' => '<strong>:author</strong> closed ticket <strong>":title"</strong>',
    'content_reopened_web' => '<strong>:author</strong> reopened ticket <strong>":title"</strong>',
    'content_status_changed_web' => '<strong>:author</strong> changed status of <strong>":title"</strong> to <strong>:status</strong>',

    // User ticket creation confirmation
    'ticket_created_confirmation_subject'  => 'Your ticket #:id has been received',
    'ticket_created_confirmation_greeting' => 'Hello, :name!',
    'ticket_created_confirmation_intro'    => 'We have received your support request and our team will get to work on it as soon as possible.',
    'ticket_created_confirmation_detail'   => 'Ticket #:id — ":title"',
    'ticket_created_confirmation_next'     => 'We will notify you of any updates. Thank you for contacting us.',
    'ticket_created_confirmation_thanks'   => 'The support team.',

    // Buttons and actions
    'view_ticket' => 'View Ticket',
    'view_comment' => 'View Comment',
    'mark_as_read' => 'Mark as Read',
];
