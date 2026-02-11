<?php

return [
    'header' => [
        'title' => 'Admin Notifications',
        'subtitle' => 'Management of system alerts and notices to maintain control of incidents.',
    ],
    'section_intro' => [
        'title' => 'What are admin notifications?',
        'content' => 'The notification system is the early warning center for the support team. It allows administrators to react quickly to new incidents or user responses without constantly monitoring the ticket list. Every time a relevant event occurs on a ticket that concerns you, you will receive an immediate notice.',
    ],
    'section_access' => [
        'title' => 'How to access your notifications',
        'intro' => 'There are <strong>two main methods</strong> to check for updates:',
        'option_1' => [
            'title' => 'Option 1: From the Top Bar (Navbar)',
            'desc' => 'This is the fastest way to see the latest updates while working in other areas.',
            'alert_title' => 'Visual Indicator:',
            'steps' => [
                'In the top right corner, you will see a <strong>bell</strong> icon.',
                'If there is a yellow circle with a number, it indicates the amount of <strong>unread</strong> notifications.',
                'Clicking it will show a quick summary of the latest notifications.',
            ],
            'note' => 'To see the full list, click "View all notifications" at the bottom of that dropdown menu.',
        ],
        'option_2' => [
            'title' => 'Option 2: Full List',
            'desc' => 'For more detailed management, you can access the full table view where you can filter, search, and manage old alerts.',
            'box_text' => 'Access by clicking "View all" from the bell or from the side menu if enabled.',
        ],
    ],
    'section_screen' => [
        'title' => 'The Notifications Management Screen',
        'intro' => 'The main "My Notifications" view is designed to process large volumes of alerts efficiently.',
        'table_title' => 'Table Structure',
        'table_desc' => 'Information is presented in 4 key columns:',
        'table_headers' => [
            'col' => 'Column',
            'desc' => 'Description',
            'example' => 'Example',
        ],
        'table_rows' => [
            'type' => [
                'col' => 'Type',
                'desc' => 'Event category. Helps distinguish urgencies.',
                'example' => '<span class="badge badge-info">Comment</span>, <span class="badge badge-success">New Ticket</span>',
            ],
            'content' => [
                'col' => 'Content',
                'desc' => 'Brief summary of what happened. Includes ticket ID and action author.',
                'example' => '"New ticket created with ID 45 by User..."',
            ],
            'date' => [
                'col' => 'Date',
                'desc' => 'Exact moment the alert was generated.',
                'example' => '10/02/2026 09:30',
            ],
            'actions' => [
                'col' => 'Actions',
                'desc' => 'Tools to interact with the notification.',
                'example' => 'View, Mark as read',
            ],
        ],
    ],
    'section_logic' => [
        'title' => 'Delivery Logic: Which notifications do I receive?',
        'subtitle' => 'The system uses smart rules to avoid cluttering your inbox. You will receive notices based on your role and assignment:',
        'cards' => [
            'new_ticket' => [
                'title' => '1. New Ticket Created',
                'who' => '<strong>Who receives it?</strong> All administrators.',
                'why' => 'To ensure no new incident goes unnoticed, the entire technical team is alerted when a new ticket comes in.',
            ],
            'assigned_reply' => [
                'title' => '2. Reply on Assigned Ticket',
                'who' => '<strong>Who receives it?</strong> Only the assigned admin.',
                'why' => 'If you are responsible for a ticket, only you will receive the notification when the user replies, avoiding noise for the rest of the team.',
            ],
            'unassigned_reply' => [
                'title' => '3. Reply on Unassigned Ticket',
                'who' => '<strong>Who receives it?</strong> All administrators.',
                'why' => 'If a ticket has no owner and the user replies, everyone is notified so someone can pick it up.',
            ],
        ],
    ],
    'section_types' => [
        'title' => 'Event Types',
        'cards' => [
            'comment' => [
                'title' => 'New Comment',
                'desc' => 'The user has answered one of your questions or added extra information.',
                'priority' => 'Priority: High (User expects feedback).',
            ],
            'new_ticket' => [
                'title' => 'New Ticket',
                'desc' => 'A new incident has been registered in the system.',
                'priority' => 'Priority: Critical (Requires triage and assignment).',
            ],
            'reopened' => [
                'title' => 'Ticket Reopened',
                'desc' => 'A user has reopened a closed ticket, indicating the solution was not effective.',
                'priority' => 'Priority: Very High (Recurrence).',
            ],
        ],
    ],
    'section_tools' => [
        'title' => 'Productivity Tools',
        'search' => [
            'title' => 'Smart Search',
            'desc' => 'Use the search box to find specific notifications. You can search by:',
            'items' => [
                '<strong>Ticket ID:</strong> Type "45" to see everything related to that case.',
                '<strong>User Name:</strong> Find activity from a specific client.',
                '<strong>Keywords:</strong> Like "Error", "Invoice", etc.',
            ],
        ],
        'organization' => [
            'title' => 'Organization',
            'desc' => 'The system automatically sorts notifications, showing the most recent ones first.',
            'tip' => 'Tip: Keep your inbox clean by marking old notifications as read.',
        ],
    ],
    'section_actions' => [
        'title' => 'Main Actions',
        'intro' => 'In the "Actions" column you will find three fundamental buttons for your workflow:',
        'buttons' => [
            'view' => [
                'title' => 'View Details',
                'desc' => 'Opens a modal with the full message without leaving the page. Includes a direct link to the ticket.',
            ],
            'mark_read' => [
                'title' => 'Mark Read',
                'desc' => 'Removes the "New" indicator. Use it when you have taken note but want to keep the record.',
            ],
        ],
    ],
    'section_workflow' => [
        'title' => 'Ideal Workflow Example',
        'steps' => [
            '1' => [
                'title' => '1. Reception',
                'desc' => 'You see the "1" indicator on the bell. It is a client replying to a ticket of yours that was "Pending".',
            ],
            '2' => [
                'title' => '2. Quick Review',
                'desc' => 'You click the "View" button (Eye). You read the client\'s reply in the modal window. You see they attached the missing data.',
            ],
            '3' => [
                'title' => '3. Action',
                'desc' => 'From the modal, you click "Go to Ticket". You reply to the client and change the status to "Resolved".',
            ],
            '4' => [
                'title' => '4. Completion',
                'desc' => 'You return to notifications and mark the alert as read (if not already) to clear your pending inbox.',
            ],
        ],
    ],
];
