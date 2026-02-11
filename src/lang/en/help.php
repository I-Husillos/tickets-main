<?php

return [
    'title' => 'Help · Ticket Management',
    'header' => 'Ticket Management',
    'breadcrumbs' => [
        'help' => 'Help',
        'tickets' => 'Tickets',
    ],
    'intro' => [
        'title' => 'What is a Ticket?',
        'text' => 'A "Ticket" is the digital record of your request, issue, or question. It is like a file that contains all the problem information, the conversation with the technician, and the current resolution status.',
    ],
    'create' => [
        'title' => '1. How to create a new Ticket?',
        'step1' => 'Follow these steps to report an issue:',
        'list' => [
            '1' => [
                'title' => 'Go to the Tickets section:',
                'text' => 'In the left sidebar menu, click on',
            ],
            '2' => [
                'title' => 'Create Button:',
                'text' => 'Click on the button',
                'suffix' => 'located at the top right of the table.'
            ],
            '3' => [
                'title' => 'Complete the Form:',
                'li1' => [
                    'text' => '(Required) Write a brief and clear summary of the problem (e.g. "Error printing invoice"). Avoid generic titles like "Help" or "Problem".'
                ],
                'li2' => [
                    'text' => '(Required) Explain what is happening. Include error messages if any.',
                    'alert' => '<strong>Important:</strong> This field has a limit of <strong>255 characters</strong>.<br>If you need to elaborate more, create the ticket with a brief summary and add all necessary details using a <strong>Comment</strong> (which allows unlimited text) once created.'
                ],
                'li3' => [
                    'text' => 'Select how urgent it is. <i>Use responsibly</i>; marking everything as "High" can delay management.'
                ],
                'li4' => [
                    'text' => 'Choose the category that best fits (e.g. Technical Issue, Inquiry, etc.).'
                ],
                'note' => '<strong>Note on Files:</strong> Currently, it is not possible to attach files directly. Please describe the content or use external links if necessary.',
            ],
            '4' => [
                'title' => 'Submit:',
                'text' => 'Click the <strong>Save</strong> button. The system will redirect you to the ticket list and you will see a confirmation message.'
            ]
        ],
        'img_caption' => 'Example of the form to create a new ticket'
    ],
    'list' => [
        'title' => '2. View and Search my Tickets',
        'intro' => 'On the main "Tickets" screen, you will see a list of all your created tickets, ordered from newest to oldest.',
        'img_caption' => 'Example of the table listing the tickets',
        'table_title' => 'The Ticket Table',
        'table_intro' => 'Each row represents a ticket and includes key columns:',
        'columns' => [
            'id' => '<strong>ID:</strong> Unique identification number of the ticket (useful for references).',
            'title' => '<strong>Title:</strong> The subject of the ticket.',
            'status' => '<strong>Status:</strong> Current process status (see Status section).',
            'priority' => '<strong>Priority and Type:</strong> Ticket classification.',
            'actions' => '<strong>Actions:</strong> Buttons to interact with the ticket.'
        ],
        'search_title' => 'Search',
        'search_text' => 'If you have many tickets, use the search bar at the top of the list. Type a keyword from the title (e.g. "printer") and press "Enter" or the search button. This will filter the list to show only matches.'
    ],
    'states' => [
        'title' => '3. Ticket Lifecycle and Statuses',
        'intro' => 'A ticket goes through several states from birth to closing. Understanding them is vital to know what is expected of you:',
        'open' => 'Open / Pending',
        'open_desc' => 'The ticket has been created and sent to the system correctly. Administrators can see it, but have not yet started working on it or are in the triage and assignment process.',
        'progress' => 'In Progress / Assigned',
        'progress_desc' => 'An administrator has been assigned to your case and is working on it. You will likely receive comments requesting more information. Check your notifications.',
        'resolved' => 'Resolved',
        'resolved_desc' => 'The administrator indicates that the problem has been solved.',
        'resolved_action' => '<strong>YOUR TURN!</strong> At this point, your confirmation is required.',
        'resolved_list' => [
            '1' => 'If it works: You must use the <strong>"Validate"</strong> option to close the ticket.',
            '2' => 'If it does NOT work: You must comment indicating that the failure persists so the administrator can continue working.'
        ],
        'closed' => 'Closed',
        'closed_desc' => 'The process has ended. The ticket is saved in your history for reference, but no further changes, comments, or edits are allowed.'
    ],
    'detail' => [
        'title' => '4. Detail Screen: Full Structure',
        'intro' => 'The ticket detail screen is designed to keep everything at hand. It is divided into three main areas (Left, Right, and Bottom). Below we explain each:',
        'img_caption' => '<em>General view: Left (Info), Right (New message), Bottom (History).</em>',
        'zone_a' => [
            'title' => 'A. Left Zone: Information and Validation',
            'text' => 'This panel contains the "technical sheet" of your issue:',
            'list' => [
                '1' => '<strong>Title and Description:</strong> The problem as you reported it.',
                '2' => '<strong>Status and Priority:</strong> Colored badges indicating current status.',
                '3' => '<strong>Dates:</strong> Creation and last update.'
            ],
            'validation' => [
                'title' => 'Validation Area (Important!)',
                'text' => 'Only appears when the status is <strong>Resolved</strong>.',
                'validate' => '<span class="badge badge-success"><i class="fas fa-check"></i> Validate</span>: Confirms the solution works. The ticket will close (Closed).',
                'reject' => '<span class="badge badge-danger"><i class="fas fa-times"></i> Reject</span>: Indicates it does NOT work. The ticket will go back to "Pending".'
            ]
        ],
        'zone_b' => [
            'title' => 'B. Right Zone: Add Comments',
            'text' => 'Use this form to communicate with support. It is the official channel to add information.',
            'usage' => 'When to use it?',
            'list' => [
                '1' => 'To answer technician questions.',
                '2' => 'To attach new data or errors.',
                '3' => 'To ask "How is my case going?".'
            ],
            'footer' => 'Simply type and click <strong>"Add Comment"</strong>.'
        ],
        'zone_c' => [
            'title' => 'C. Bottom Zone: Conversation History',
            'text' => 'Below the top panels, you will see the <strong>Timeline</strong>. Here lies the entire history of the ticket.',
            'list' => [
                '1' => '<strong>All in one place:</strong> You will see your messages and admin responses interleaved by date.',
                '2' => '<strong>Identification:</strong>',
                'sublist' => [
                    '1' => 'Your messages have <i class="fas fa-edit text-primary"></i> Edit and <i class="fas fa-trash text-danger"></i> Delete buttons.',
                    '2' => 'Admin responses appear with their name and distinctive header.'
                ]
            ],
            'img_caption' => 'Example of conversation in the ticket'
        ]
    ],
    'advanced' => [
        'title' => '5. Edit and Delete (Advanced Management)',
        'intro' => 'You may need to correct initial information or cancel a request by mistake. Here we explain how these critical processes work.',
        'edit' => [
            'title' => 'A. Edit a Ticket',
            'subtitle' => 'Available as long as the ticket is not <strong>Closed</strong>.',
            'step1' => 'Click the <span class="badge badge-warning"><i class="fas fa-pencil-alt"></i> Edit</span> button in the main table.',
            'step2' => 'A form similar to creation will open, but with your data loaded.',
            'step2_list' => '<em>You can modify:</em> Title, Description, Priority, and Type.',
            'step3' => 'Clicking <strong>Update</strong> will return you to the list.',
            'success_title' => 'Success Confirmation:',
            'success_text' => 'You will see a green message at the top:<br><em>"Ticket updated successfully."</em>',
            'img_caption' => 'Example of the confirmation message after editing a ticket'
        ],
        'delete' => [
            'title' => 'B. Delete a Ticket',
            'warning' => '<strong><i class="fas fa-exclamation-triangle"></i> Warning!</strong> This action is irreversible. The ticket will disappear from your history and the admin panel.',
            'step1' => 'Click the <span class="badge badge-danger"><i class="fas fa-trash"></i> Delete</span> button.',
            'step2' => '<strong>Security Step:</strong> The browser will show a pop-up window asking:<br><em>"Are you sure you want to delete this ticket?"</em>',
            'step3' => 'If you accept, the following will happen:',
            'step3_list' => [
                '1' => 'An alert will appear confirming: <em>"Ticket deleted"</em>.',
                '2' => 'The table will update automatically and the row will disappear.'
            ],
            'img_caption' => 'Example of the confirmation message'
        ]
    ],
    'introduction_page' => [
        'title' => 'Help · Introduction',
        'header' => 'Introduction and First Steps',
        'breadcrumbs' => 'Help',
        'welcome' => [
            'title' => 'Welcome to the User Portal',
            'text1' => 'Welcome to the incident management and support platform (Tickets). This tool has been designed to centralize, organize, and streamline all communication between you and the technical support/administration team.',
            'text2' => 'Through this portal, you can report problems, make service requests, check the status of your previous requests, and maintain direct and recorded communication with those responsible for resolving your issues.',
            'can_do' => [
                'title' => 'What you CAN do:',
                'list' => [
                    'create' => '<strong>Create Tickets:</strong> Open new support requests detailing your problem or requirement.',
                    'history' => '<strong>Consult History:</strong> View all tickets you have created, filter them, and search by keywords.',
                    'comment' => '<strong>Comment:</strong> Dialogue with agents through a comment thread within each ticket.',
                    'notifications' => '<strong>Receive Notifications:</strong> Stay aware of updates, status changes, or responses on your tickets.',
                    'validate' => '<strong>Validate Solutions:</strong> Confirm if the solution proposed by the agent has resolved your problem.',
                    'edit' => '<strong>Edit/Delete:</strong> Modify your ticket information or delete them (under certain conditions).'
                ]
            ],
            'cannot_do' => [
                'title' => 'What you CANNOT do:',
                'list' => [
                    'view_others' => 'View other users\' tickets (for privacy and security).',
                    'assign' => 'Assign tickets to specific administrators (the system or admins handle assignment).',
                    'modify_closed' => 'Modify a ticket once it has been closed (although you can consult it).'
                ]
            ]
        ],
        'dashboard' => [
            'title' => 'User Control Panel (Dashboard)',
            'text' => 'Upon logging in, you will immediately access your <strong>Control Panel</strong>. This is your "home base".',
            'img_caption' => 'Example of the User Control Panel',
            'green_box' => [
                 'title' => 'Open Tickets',
                 'desc' => 'In <strong>Green</strong>. Active tickets being attended to.'
            ],
            'blue_box' => [
                 'title' => 'Resolved Tickets',
                 'desc' => 'In <strong>Blue</strong>. Solved but pending your validation.'
            ],
            'yellow_box' => [
                 'title' => 'Pending Tickets',
                 'desc' => 'In <strong>Yellow</strong>. Tickets awaiting action.'
            ],
            'components' => [
                'title' => 'Panel Components:',
                'summary_dt' => 'Status Summary',
                'summary_dd' => 'Three colored cards (Green, Blue, Yellow) giving you a quick glance at how many tickets you have in each situation.',
                'latest_dt' => 'Latest Tickets',
                'latest_dd' => 'A list at the bottom with tickets that have had recent activity. Includes quick buttons to <span class="badge badge-primary"><i class="fas fa-eye"></i> View</span> and <span class="badge badge-warning"><i class="fas fa-edit"></i> Edit</span>.',
                'create_dt' => 'Quick Create',
                'create_dd' => 'A button at the top right of the main card to open a new incident instantly.'
            ]
        ],
        'profile' => [
            'title' => 'My Profile',
            'text1' => 'You can access your profile by clicking your name in the top right corner and selecting the <strong><i class="fas fa-user fa-2x mb-2"></i></strong> icon or by clicking on <strong>your name in the side menu</strong>.',
            'text2' => 'In this section, you can view your data registered in the system:',
            'list' => [
                'name' => 'Full Name.',
                'email' => 'Associated Email.',
                'date' => 'Registration Date.'
            ],
            'note' => '<strong>Important Note:</strong> For security reasons, editing sensitive data (like email) is restricted. If you need to correct erroneous data, please create a ticket requesting it from an administrator.',
            'img1_caption' => 'Example of the options menu',
            'img2_caption' => 'Example of profile access from the side menu'
        ],
        'support' => [
            'title' => 'Need more help?',
            'text' => 'This help section is divided into three fundamental parts. We recommend reading them to master the tool:',
            'buttons' => [
                'intro' => 'Introduction',
                'tickets' => 'Tickets',
                'notifications' => 'Notifications',
                'profile' => 'My Profile'
            ]
        ]
    ],
    'notifications_page' => [
        'title' => 'Documentation - Notifications',
        'header' => 'User Notifications',
        'breadcrumbs' => 'My Notifications',
        'intro' => [
            'title' => 'What are notifications?',
            'text' => 'The notification system keeps you automatically informed about any important changes to your tickets. You do not need to check each ticket manually: the application alerts you when something happens.',
        ],
        'access' => [
            'title' => 'How to access your notifications',
            'subtitle' => 'There are <strong>two ways</strong> to view your notifications:',
            'option1' => [
                'title' => 'Option 1: From the bell icon',
                'text' => 'In the <strong>top right</strong> of the screen, next to the language selector and your profile picture, you will find a bell icon.',
                'alert_title' => 'New notification indicator:',
                'list' => [
                    '1' => 'If you have unread notifications, a <strong>yellow circle with a number</strong> appears, indicating how many new notifications you have.',
                    '2' => 'Example: If you see a "5" on the bell, it means you have 5 notifications pending review.'
                ],
                'action' => '<strong>To access:</strong> Click the bell icon and you will be redirected to the full notifications page.'
            ],
            'option2' => [
                'title' => 'Option 2: From the side menu',
                'text' => 'In the left sidebar menu, find the <strong>"Notifications"</strong> option (with a bell icon). Click there to access.'
            ]
        ],
        'screen' => [
            'title' => 'The notifications screen',
            'intro' => 'When you enter this section, you will see:',
            'location' => [
                'title' => 'Location in the system',
                'text' => 'At the top appears a path showing you where you are:',
                'path' => 'Home / My Notifications',
                'note' => 'You can click "Home" to return to the main dashboard.'
            ],
            'table' => [
                'title' => 'The notification table',
                'intro' => 'All your notifications are shown in an <strong>organized table</strong> with <strong>4 columns</strong>:',
                'headers' => [
                    'col' => 'Column',
                    'what' => 'What it shows',
                    'example' => 'Example'
                ],
                'columns' => [
                    'type' => 'Type',
                    'type_desc' => 'The type of event that occurred',
                    'type_example' => 'Comment, Status, Created',
                    'content' => 'Content',
                    'content_desc' => 'A summary of what happened',
                    'content_example' => '"A new comment has been added to your ticket"',
                    'date' => 'Date',
                    'date_desc' => 'When the event occurred',
                    'date_example' => '06/12/2025 11:53',
                    'actions' => 'Actions',
                    'actions_desc' => 'Buttons to interact',
                    'actions_example' => 'View details, Mark as read'
                ],
            ]
        ],
        'types' => [
            'title' => 'Types of notifications you can receive',
            'comment' => [
                'title' => 'New Comment',
                'when' => '<strong>When you receive it:</strong> When an administrator writes a comment on one of your tickets.',
                'what' => '<strong>What it says:</strong> "A new comment has been added to your ticket"',
                'why' => '<strong>Why it is useful:</strong> It alerts you that someone responded to your request without having to check all your tickets one by one.'
            ],
            'status' => [
                'title' => 'Status Change',
                'when' => '<strong>When you receive it:</strong> When an administrator changes the status of your ticket (e.g., from "Pending" to "In Progress" or "Resolved").',
                'what' => '<strong>What it says:</strong> "The ticket with ID [number] has been updated"',
                'why' => '<strong>Why it is useful:</strong> You know immediately that your ticket is being attended to or has already been resolved.'
            ],
            'created' => [
                 'title' => 'Ticket Created',
                 'when' => '<strong>When you receive it:</strong> When you successfully create a new ticket.',
                 'what' => '<strong>What it says:</strong> "New ticket created with ID [number]"',
                 'why' => '<strong>Why it is useful:</strong> It confirms that your request was correctly registered in the system.'
            ],
            'closed' => [
                 'title' => 'Ticket Closed',
                 'when' => '<strong>When you receive it:</strong> When an administrator marks your ticket as closed.',
                 'what' => '<strong>What it says:</strong> "The ticket has been closed"',
                 'why' => '<strong>Why it is useful:</strong> It informs you that the problem is considered resolved and the ticket is no longer active.'
            ],
            'reopened' => [
                 'title' => 'Ticket Reopened',
                 'when' => '<strong>When you receive it:</strong> When a ticket that was closed is reopened (by you or an administrator).',
                 'what' => '<strong>What it says:</strong> "The ticket has been reopened"',
                 'why' => '<strong>Why it is useful:</strong> You know that the problem is being reviewed again.'
            ]
        ],
        'tools' => [
            'title' => 'Table tools',
            'intro' => 'The table includes various functions that help you organize and find information:',
            'search' => [
                'title' => 'Search',
                'text' => 'In the top right corner there is a field that says <strong>"Search:"</strong>',
                'list' => [
                    '1' => 'Type any word (for example, "comment" or a ticket name)',
                    '2' => 'The table automatically filters and shows only matching notifications',
                    '3' => 'Clear the text to see all notifications again'
                ]
            ],
            'records' => [
                'title' => 'Number of records per page',
                'text' => 'In the top left corner you will see <strong>"Show 10 records"</strong> (with a dropdown). You can change how many notifications to see on each page:',
                'list' => [
                    '10' => '10 records (default)',
                    '25' => '25 records',
                    '50' => '50 records',
                    '100' => '100 records'
                ],
                'note' => 'This is useful if you have many notifications and want to see them all without constantly changing pages.'
            ],
            'pagination' => [
                'title' => 'Pagination',
                'text' => 'If you have more notifications than fit on one page, you will see at the bottom:',
                'example' => 'Showing 1 to 10 of 25 records [Previous] [1] [2] [3] [Next]',
                'list' => [
                    'nav' => '<strong>Previous/Next:</strong> Navigate between pages',
                    'jump' => '<strong>Numbers:</strong> Jump directly to a specific page',
                    'info' => '<strong>Indicator:</strong> Shows you how many technical notifications there are in total'
                ]
            ],
            'sort' => [
                'title' => 'Sort columns',
                'text' => 'Click on the header of any column (Type, Content or Date) to sort the notifications:',
                'list' => [
                    'asc' => '<strong>First click:</strong> Sorts ascending (A→Z, oldest→newest)',
                    'desc' => '<strong>Second click:</strong> Sorts descending (Z→A, newest→oldest)',
                    'visual' => '<strong>Visual indicator:</strong> An arrow appears showing the current order'
                ]
            ]
        ],
        'actions' => [
            'title' => 'Action buttons',
            'intro' => 'Each notification has <strong>two buttons</strong> in the "Actions" column:',
            'details' => [
                'title' => 'View Details (blue button with eye icon)',
                'what' => '<strong>What it does:</strong> Opens a popup window with all the complete information of the notification.',
                'when' => '<strong>When to use it:</strong> When you want to know exactly what happened, who made the change, and more details.'
            ],
            'mark' => [
                'title' => 'Mark as read / Mark as unread',
                'desc' => 'This button changes depending on whether the notification has already been read or not:',
                'unread_state' => [
                    'title' => 'If the notification has NOT been read:',
                    'list' => [
                        'visual' => 'A <strong>blue</strong> button with a check icon appears',
                        'hover' => 'Says "Mark as read" (on hover)',
                        'action' => '<strong>What it does:</strong> Clicking it marks the notification as read. The number on the bell decreases.'
                    ]
                ],
                'read_state' => [
                    'title' => 'If the notification has ALREADY been read:',
                    'list' => [
                        'visual' => 'A <strong>gray</strong> button with an X icon appears',
                        'hover' => 'Says "Mark as unread" (on hover)',
                        'action' => '<strong>What it does:</strong> Clicking it marks the notification as unread again. The number on the bell increases.'
                    ]
                ]
            ]
        ],
        'modal' => [
            'title' => 'Details Window (Modal)',
            'intro' => 'This is the popup window that appears when you click <strong>"View Details"</strong>.',
            'look' => [
                'title' => 'How it looks',
                'desc' => 'The window appears <strong>in the center of the screen</strong>, with a darkened background behind it. It is divided into three parts:',
                'part1' => [
                    'title' => '1. Top part (Title)',
                    'text' => 'Shows the <strong>main message</strong> of the notification. For example: "Notification". In the top right corner there is an <strong>X</strong> to close the window.'
                ],
                'part2' => [
                    'title' => '2. Center part (Detailed content)',
                    'text' => 'Here complete information is shown which varies according to the notification type:'
                ],
                'accordion' => [
                    'comment' => 'If it is a Comment',
                    'comment_content' => "A new comment has been added to your ticket\n\n────────────────────────────────────────\n\nComment by: Ivan\nIn ticket: \"Test Ticket 3\"\nComment: \"This is an example comment from the administrator\"\n\n────────────────────────────────────────\n\nDate: 06/13/2025 11:20     [View Ticket]",
                     'status' => 'If it is a Status Change',
                     'status_content' => "The ticket with ID 22 has been updated\n\n────────────────────────────────────────\n\nTicket: \"Cannot login\"\nNew status: In Progress\nPriority: High\nUpdated by: Admin Ivan\n\n────────────────────────────────────────\n\nDate: 06/12/2025 09:30     [View Ticket]",
                     'created' => 'If it is a Ticket Created',
                     'created_content' => "New ticket created with ID 29\n\n────────────────────────────────────────\n\nCreated by: Luis\nTicket: \"Error saving file\"\n\n────────────────────────────────────────\n\nDate: 06/10/2025 14:22     [View Ticket]",
                     'closed' => 'If it is a Ticket Closed',
                     'closed_content' => "The ticket has been closed\n\n────────────────────────────────────────\n\nClosed ticket: \"Database issue\"\nClosed by: Admin Carlos\n\n────────────────────────────────────────\n\nDate: 06/08/2025 16:45     [View Ticket]",
                     'reopened' => 'If it is a Ticket Reopened',
                     'reopened_content' => "The ticket has been reopened\n\n────────────────────────────────────────\n\nReopened ticket: \"Request for new feature\"\nReopened by: Luis\n\n────────────────────────────────────────\n\nDate: 06/09/2025 10:15     [View Ticket]"
                ],
                'part3' => [
                    'title' => '3. Bottom part (Buttons)',
                    'text' => 'There is always a <strong>"Close"</strong> button (gray) that closes the window and returns you to the notification table. If the notification is related to a specific ticket, a <strong>"View Ticket"</strong> button also appears taking you directly to that ticket.'
                ]
            ]
        ],
        'example' => [
            'title' => 'Full usage example',
            'intro' => 'Imagine this situation step by step:',
            'step1' => [
                'title' => '1. You receive a notification',
                'text' => 'An administrator comments on your ticket. Automatically: The bell icon at the top shows a number in a yellow circle (how many new ones you have).'
            ],
            'step2' => [
                'title' => '2. You open notifications',
                'text' => 'You click on the bell and arrive at the notifications table. You see a new row with: Type, Content, Date.'
            ],
            'step3' => [
                'title' => '3. You see details',
                'text' => 'You click on the blue button with the eye (View details). The popup window opens showing all the detailed information.'
            ],
            'step4' => [
                'title' => '4. You go to the ticket',
                'text' => 'You click on <strong>"View Ticket"</strong> in the popup window. It takes you directly to the ticket page (where you can read and respond).'
            ],
            'step5' => [
                'title' => '5. You mark as read',
                'text' => 'You return to notifications and click the blue check button (Mark as read). Now the button turns gray with an X and the bell counter decreases.'
            ]
        ],
        'empty' => [
            'title' => 'If you have no notifications',
            'text' => 'When you enter this section and occupy no notifications, you will see a message:<br><br><i class="fas fa-info-circle"></i> You have no notifications.<br><br>This means everything is quiet: there have been no changes to your tickets recently.'
        ],
        'language' => [
            'title' => 'Change language',
            'text' => 'The entire notifications section is available in <strong>Spanish</strong> and <strong>English</strong>. To change the language, use the <strong>ES</strong> / <strong>EN</strong> selector in the top navigation bar. The texts that change include: Titles, Buttons, Messages, Search options.'
        ]
    ],
    'profile_page' => [
        'title' => 'Help · My Profile',
        'header' => 'Profile and Account Management',
        'breadcrumbs' => 'Profile',
        'info' => [
            'title' => 'View my Information',
            'text1' => 'To access your personal data registered in the application:',
            'step1' => 'Click on your <strong>Name</strong> in the top right corner (top bar).',
            'step2' => 'Select the <strong>"My Profile"</strong> option from the dropdown menu.',
            'text2' => 'On this screen you can view:',
            'list' => [
                'name' => '<strong>Full Name:</strong> As it appears in the system.',
                'email' => '<strong>Email:</strong> Your linked email address for notifications.',
                'tickets' => '<strong>Created Tickets:</strong> A historical counter of all your requests.'
            ]
        ],
        'edit' => [
            'title' => 'How do I edit my data?',
            'text1' => 'Currently, direct editing of name or email is disabled for security reasons and corporate data consistency.',
            'text2' => 'If you detect an error in your information or need to update your email, please <strong>create a ticket</strong> of type "Inquiry" or "Administrative" requesting the change to the support team.'
        ],
        'security' => [
            'title' => 'Security and Session',
            'logout_title' => 'Log Out',
            'logout_text' => 'If you use a shared or public computer, it is crucial that you log out when finished.',
            'logout_step1' => 'Click on the <strong>"Door"</strong> icon or "Log Out" in the top right bar.',
            'logout_step2' => 'Or expand the user menu and select "Exit".',
            'password_title' => 'Change Password',
            'password_text' => 'If you have forgotten your password or wish to change it, you must use the "Forgot your password?" link on the login screen, or contact an administrator to send you a reset link.'
        ],
        'language' => [
            'title' => 'Language',
            'text' => 'The application is available in several languages (Spanish and English). You can change the interface language at any time using the selector (flag icon) located in the top bar.'
        ]
    ],
    'admin_intro_page' => [
        'title' => 'Admin Manual · Introduction',
        'header' => 'Administrator Manual: Introduction and Dashboard',
        'subtitle' => 'Complete guide to familiarization with the IT management interface and main dashboard.',
        'welcome' => [
            'title' => 'Welcome to the Resolution Center',
            'text' => 'Welcome to the Ticket System Administration Panel. This tool has been designed not only as a problem repository, but as a <strong>Ticket Resolution Center</strong>.',
            'role_desc' => 'As an administrator, you have the responsibility to orchestrate the solution to problems reported by end users. The system centralizes all requests, eliminating the chaos of scattered emails, unregistered phone calls, and hallway messages.',
            'pillars_title' => 'System Pillars:',
            'pillars' => [
                'centralization' => '<strong>Centralization:</strong> All technical information and communication in one place.',
                'traceability' => '<strong>Traceability:</strong> Every action is recorded with date, time, and author in the history.',
                'efficiency' => '<strong>Efficiency:</strong> Clear workflows to assign, manage, and resolve incidents.'
            ],
            'goal_title' => 'System Goal',
            'goal_text' => 'Minimize user downtime and maximize transparency in IT department management.'
        ],
        'dashboard' => [
            'title' => 'The Main Dashboard',
            'intro' => 'Upon logging in, the first thing you will see is the <strong>Dashboard</strong>. This panel is your command center for overseeing support system operations. It provides quick access to key metrics, recent events, and pending notifications, all at a glance.',
            'img_caption' => 'Fig 1.1 - Main administrator control panel',
            'cards_title' => 'Quick Access Cards',
            'cards_note' => '<strong>Note:</strong> Available cards depend on your account type. <span class="badge badge-danger">Superadministrators</span> see all metrics; standard administrators have a simplified view.',
            'superadmin_note' => '<strong>For Superadministrators:</strong> The dashboard displays 4 cards with direct access to main management sections.',
            'users_card' => [
                'title' => 'Registered Users',
                'desc' => 'Total sum of regular users and administrators. Click to manage users.'
            ],
            'admins_card' => [
                'title' => 'Administrators',
                'desc' => 'Technical staff with administrative access. Click to manage admins.'
            ],
            'assigned_tickets_card' => [
                'title' => 'Assigned Tickets',
                'desc' => 'Tickets with a responsible administrator. Click to view assignments.'
            ],
            'total_tickets_card' => [
                'title' => 'Total Tickets',
                'desc' => 'All tickets registered in the system. Click to manage tickets.'
            ],
            'events_title' => 'Latest System Events',
            'events_text' => 'In the central part you will find a table with the <strong>5 most recent events</strong> from the history. This includes ticket creation, status updates, comments, and assignments. Each event shows: type, description, responsible user, and date/time.',
            'events_link' => 'You can access the <strong>full history</strong> using the "View full history" button in the top right corner of the card.',
            'events_caption' => 'Example of recent events table',
            'notifications_title' => 'Recent Notifications',
            'notifications_text' => 'At the bottom, the <strong>5 most recent unread notifications</strong> are shown. These alerts inform you of: newly created tickets, added comments, status changes, and closures/reopenings.',
            'notifications_link' => 'Use the "View all" button to access your full notifications inbox and mark them as read.',
            'notifications_caption' => 'Example of recent notifications table'
        ],
        'navigation' => [
            'title' => 'Navigation Structure',
            'sidebar_title' => 'Main Menu (Sidebar)',
            'sidebar_desc' => 'The left sidebar is your main navigation tool. It is divided into logical sections for quick access to most used functions:',
            'dashboard' => [
                'term' => 'Dashboard',
                'desc' => 'Return to start. Graphic summary of current situation.'
            ],
            'tickets' => [
                'term' => 'Tickets',
                'desc' => 'The core of daily work.',
                'list' => [
                    'manage' => '<strong>Manage tickets:</strong> Global list of incidents.',
                    'assigned' => '<strong>Assigned tickets:</strong> Your personal work queue.'
                ]
            ],
            'users' => [
                'term' => 'Users',
                'desc' => '<em>(Superadmin only)</em> Management of registrations, cancellations, and data modification for users and technical staff.'
            ],
            'config' => [
                'term' => 'Config.',
                'desc' => 'Definition of Incident Types and global system settings.'
            ],
            'icons_title' => 'Quick Iconography Guide',
            'icons_desc' => 'To keep the interface clean, we use standardized icons for common actions. Familiarize yourself with them:',
            'table' => [
                'icon' => 'Icon',
                'action' => 'Action',
                'desc' => 'Description',
                'view' => ['action' => 'View / Details', 'desc' => 'Access the full card to read and review without editing.'],
                'edit' => ['action' => 'Edit', 'desc' => 'Modifies record data (title, status, priority).'],
                'resolve' => ['action' => 'Resolve', 'desc' => 'Quick action to mark a ticket as solved.'],
                'delete' => ['action' => 'Delete', 'desc' => 'Permanent deletion. Requires additional confirmation.']
            ]
        ],
        'tips' => [
            'title' => 'Productivity Tips',
            'list' => [
                'search' => 'Use the global search in the top right of data tables to find users or tickets quickly by name or ID.',
                'close' => 'Keep the dashboard clean by <strong>permanently closing</strong> tickets that have been resolved and validated by the user.',
                'notifications' => 'Check the <strong>Notifications</strong> bell daily so no user interaction goes unanswered.'
            ]
        ]
    ],
    'admin_tickets_page' => [
        'title' => 'Technical Incident Management',
        'intro' => 'The ticket module is the operational heart of the Help Desk. Here client communication is centralized and resolution flows are executed. This guide details standard procedures to maximize efficiency and comply with Service Level Agreements (SLA).',
        'lifecycle' => [
            'title' => '2.1. Ticket Lifecycle & Statuses',
            'desc' => 'The system uses a strict state machine to manage workflow. Understanding these states is vital to keeping the inbox organized:',
            'status' => [
                'new' => '<strong>NEW:</strong> Initial automatic state upon creation. Indicates no one has reviewed the case yet. Action required: Immediate triage.',
                'open' => '<strong>OPEN:</strong> Assigned to an agent and currently being worked on. Resolution SLA timer is active.',
                'pending' => '<strong>PENDING:</strong> Agent has requested info from user and is awaiting reply. This state "freezes" the SLA timer until the client responds.',
                'solved' => '<strong>SOLVED:</strong> Agent has provided a definitive solution. System notifies user to confirm resolution.',
                'closed' => '<strong>CLOSED:</strong> Final immutable state. Ticket is archived and accepts no new replies. Read-only access for history.',
            ],
            'flow_title' => 'Recommended Workflow',
            'flow_text' => 'For efficient management, do not leave tickets in "New" for more than 1 hour. If resolution isn\'t immediate, change status to "Open" to indicate processing, or "Pending" if blocked by client side.'
        ],
        'triage' => [
            'title' => '2.2. Assignment & Triage Protocols',
            'desc' => 'Triage is the initial categorization and assignment process. A misassigned ticket dramatically increases Time to Resolution (TTR).',
            'manual' => '<strong>Direct Assignment (Push):</strong> A supervisor or dispatcher reviews "New" queue and manually assigns ticket to the most suitable specialist based on category (Hardware, Software, Network).',
            'claim' => '<strong>Self-Assignment (Pull):</strong> In agile teams, agents proactively pick tickets from global pool using "Assign to me" button.',
            'filters_title' => 'Queue Filtering',
            'filters_text' => 'Use top filters to toggle between "My Tickets" (your direct responsibility), "Unassigned Tickets" (work opportunities), and "All" (global oversight).'
        ],
        'sla' => [
            'title' => '2.3. Priority Matrix & SLA',
            'desc' => 'Priority defines ticket urgency and expected response times. System may send alerts if these times are violated.',
            'high' => [
                'tag' => 'HIGH (Critical)',
                'desc' => 'Incidents stopping critical business operation or affecting multiple users.',
                'time' => 'Target Times: Response < 1h | Resolution < 4h'
            ],
            'medium' => [
                'tag' => 'MEDIUM (Normal)',
                'desc' => 'Service degradation not stopping operation, or functional issues for a single user.',
                'time' => 'Target Times: Response < 4h | Resolution < 24h'
            ],
            'low' => [
                'tag' => 'LOW (Inquiry)',
                'desc' => 'Information requests, questions, or suggestions not affecting system functionality.',
                'time' => 'Target Times: Response < 24h | Resolution < 72h'
            ]
        ],
        'features' => [
            'title' => '2.4. Resolution Tools',
            'desc' => 'Inside ticket detail view, agent has a toolset to interact:',
            'reply' => '<strong>Public Reply:</strong> Sends email to client. Use to request data or provide solutions. supports rich formatting (bold, lists, links).',
            'notes' => '<strong>Internal Notes (Private):</strong> Allows leaving comments ONLY visible to other agents. Ideal for technical documentation, call logs, or asking colleagues for advice without alerting client.',
            'files' => '<strong>System Attachments:</strong> Upload logs, screenshots or PDFs. System scans and blocks dangerous extensions (.exe, .sh) automatically.'
        ]
    ],
    'admin_users_page' => [
        'title' => 'Identity and Access Management (IAM)',
        'intro' => 'User account control, roles, and system access permissions.',
        'types' => [
            'title' => '3.1. Account Typology',
            'desc' => 'The system strictly distinguishes between two actor types for security and operational reasons. Both have differentiated access and portals.',
            'client_title' => 'End User (Client)',
            'client_desc' => 'Employees or clients requiring technical assistance. They access exclusively the User Portal to create tickets.',
            'admin_title' => 'Administrator (Staff)',
            'admin_desc' => 'Technical staff responsible for resolving incidents. They access the Admin Panel (Backoffice) to manage operations.',
        ],
        'manage_users' => [
            'title' => '3.2. End User Management',
            'desc' => 'Standard administration operations for the client database.',
            'create' => [
                'title' => 'Register New User',
                'steps' => [
                    '1' => 'Navigate to <strong>Users > Create New</strong>.',
                    '2' => 'Complete required fields: Full Name and Corporate Email.',
                    '3' => 'Set a secure temporary password.',
                ]
            ],
            'password' => [
                'title' => 'Password Reset',
                'desc' => 'To reset, edit the user and type the new key. If you leave the field empty, the current one remains.'
            ]
        ],
        'superadmin' => [
            'title' => '3.3. Staff Management (Superadmin Only)',
            'desc' => 'Restricted area for privilege elevation and creation of new support agents.',
            'warning' => 'Granting administrator permissions allows access to sensitive ticket and user data. Proceed with caution.'
        ]
    ],
    'admin_notifications_page' => [
        'title' => 'Documentation - Notifications',
        'header' => 'Administrator Notifications',
        'subheader' => 'System alerts and notifications management to keep control of incidents.',
        'breadcrumbs' => 'Notifications',
        'what_is' => [
            'title' => 'What are administrator notifications?',
            'text' => 'The notification system is the early warning center for the support team. It allows administrators to react quickly to new incidents or user responses without needing to constantly monitor the ticket list. Whenever a relevant event occurs on a ticket that concerns you, you will receive an immediate alert.'
        ],
        'access' => [
            'title' => 'How to access your notifications',
            'intro' => 'There are <strong>two main methods</strong> to check for updates:',
            'option1' => [
                'title' => 'Option 1: From the Top Bar (Navbar)',
                'text' => 'This is the fastest way to view the latest updates while working in other areas.',
                'indicator' => '<strong>Visual Indicator:</strong>',
                'li1' => 'In the top right corner, you will see a <strong>bell</strong> icon.',
                'li2' => 'If there is a yellow circle with a number, it indicates the amount of <strong>unread</strong> notifications.',
                'li3' => 'Clicking it will show a quick summary of the latest notifications.',
                'view_all' => 'To view the full list, click on "View all notifications" at the bottom of that dropdown menu.'
            ],
            'option2' => [
                'title' => 'Option 2: Full List',
                'text' => 'For more detailed management, you can access the full table view where you can filter, search, and manage old alerts.',
                'box' => 'Access by clicking "View all" from the bell or from the sidebar menu if enabled.'
            ]
        ],
        'screen' => [
            'title' => 'The Notification Management Screen',
            'text' => 'The main view "My Notifications" is designed to process large volumes of alerts efficiently.',
            'table_title' => 'Table Structure',
            'table_intro' => 'Information is presented in 4 key columns:',
            'columns' => [
                'col1' => 'Column', 'col2' => 'Description', 'col3' => 'Example',
                'type' => '<strong>Type</strong>',
                'type_desc' => 'Event category. Helps distinguish urgencies.',
                'type_ex' => '<span class="badge badge-info">Comment</span>, <span class="badge badge-success">New Ticket</span>',
                'content' => '<strong>Content</strong>',
                'content_desc' => 'Brief summary of what happened. Includes ticket ID and author of the action.',
                'content_ex' => '"New ticket created with ID 45 by User..."',
                'date' => '<strong>Date</strong>',
                'date_desc' => 'Exact moment the alert was generated.',
                'date_ex' => '10/02/2026 09:30',
                'actions' => '<strong>Actions</strong>',
                'actions_desc' => 'Tools to interact with the notification.',
                'actions_ex' => 'View, Mark read'
            ]
        ],
        'logic' => [
            'title' => 'Sending Logic: What notifications do I receive?',
            'intro' => 'The system uses smart rules to not saturate your inbox. You will receive alerts based on your role and assignment:',
            'case1' => [
                'title' => '1. New Ticket Created',
                'who' => '<strong>Who receives it?</strong> All administrators.',
                'desc' => 'To ensure no new incident goes unnoticed, the entire technical team is alerted when a new ticket comes in.'
            ],
            'case2' => [
                'title' => '2. Reply on Assigned Ticket',
                'who' => '<strong>Who receives it?</strong> Only the assigned admin.',
                'desc' => 'If you are responsible for a ticket, only you will receive the notification when the user replies, avoiding noise for the rest of the team.'
            ],
            'case3' => [
                'title' => '3. Reply on Unassigned Ticket',
                'who' => '<strong>Who receives it?</strong> All administrators.',
                'desc' => 'If a ticket has no owner and the user replies, everyone is alerted so someone can take it.'
            ]
        ],
        'types' => [
            'title' => 'Event Types',
            'comment' => [
                'title' => 'New Comment',
                'text' => 'The user has replied to one of your questions or has added extra information.',
                'priority' => 'Priority: High (User expects feedback).'
            ],
            'new_ticket' => [
                'title' => 'New Ticket',
                'text' => 'A new incident has been registered in the system.',
                'priority' => 'Priority: Critical (Requires triage and assignment).'
            ],
            'reopened' => [
                'title' => 'Ticket Reopened',
                'text' => 'A user has reopened a closed ticket, indicating the solution was not effective.',
                'priority' => 'Priority: Very High (Recurrence).'
            ]
        ],
        'tools' => [
            'title' => 'Productivity Tools',
            'search' => [
                'title' => 'Smart Search',
                'text' => 'Use the search box to find specific notifications. You can search by:',
                'li1' => '<strong>Ticket ID:</strong> Type "45" to see everything related to that case.',
                'li2' => '<strong>Username:</strong> Find activity of a specific client.',
                'li3' => '<strong>Keywords:</strong> Like "Error", "Invoice", etc.'
            ],
            'org' => [
                'title' => 'Organization',
                'text' => 'The system automatically sorts notifications, showing the most recent ones first.',
                'tip' => 'Tip: Keep your inbox clean by marking old notifications as read.'
            ]
        ],
        'actions' => [
            'title' => 'Main Actions',
            'intro' => 'In the "Actions" column you will find three fundamental buttons for your workflow:',
            'view' => [
                'title' => 'View Details',
                'text' => 'Opens a modal with the full message without leaving the page. Includes a direct link to the ticket.'
            ],
            'mark' => [
                'title' => 'Mark Read',
                'text' => 'Removes the "New" indicator. Use it when you have taken note but want to keep the record.'
            ]
        ],
        'workflow' => [
            'title' => 'Ideal Workflow Example',
            'step1' => [
                'title' => '1. Reception',
                'text' => 'You see the "1" indicator on the bell. It\'s a client replying to your ticket that was "Pending".'
            ],
            'step2' => [
                'title' => '2. Quick Review',
                'text' => 'Click the "View" button (Eye). Read the client\'s response in the modal window. You see they attached the missing data.'
            ],
            'step3' => [
                'title' => '3. Action',
                'text' => 'From the modal, click "Go to Ticket". Reply to the client and change status to "Resolved".'
            ],
            'step4' => [
                'title' => '4. Completion',
                'text' => 'Return to notifications and mark the alert as read (if not already) to clear your pending tray.'
            ]
        ]
    ],        'title' => 'Documentation - Event History',
        'header_title' => 'Event History',
        'header_subtitle' => 'Guide to auditing actions, changes, and system activity',
        'index' => [
            'title' => 'In this guide you will learn:',
            'view' => 'Understand the main view',
            'table' => 'Read columns and details',
            'filters' => 'Search and filter events',
            'cases' => 'Frequent use cases',
            'practices' => 'Auditing best practices',
        ],
        'view' => [
            'title' => 'Main View',
            'text' => 'The event history logs everything important: status changes, reassignments, comments, and administrative actions.',
            'img_caption' => 'Example table with recent events',
        ],
        'columns' => [
            'title' => 'Table Columns',
            'intro' => 'The table shows each event with its key context:',
            'main_fields' => [
                'title' => 'Main Fields',
                'type' => '<strong>Type:</strong> action performed (create, close, reassign, comment).',
                'desc' => '<strong>Description:</strong> short summary of the change.',
                'user' => '<strong>User:</strong> who executed the action.',
                'date' => '<strong>Date:</strong> exact moment of the event.',
            ],
            'details' => [
                'title' => 'Useful Details',
                'text1' => 'Some events include references to tickets, admins or users.',
                'text2' => 'Use this information to reconstruct the history of changes.',
            ],
        ],
        'filters' => [
            'title' => 'Search and Filters',
            'intro' => 'The view allows you to find events quickly:',
            'general' => [
                'title' => 'General Search',
                'li1' => 'Type keywords: ticket, reassigned, closed, admin.',
                'li2' => 'Filter by user or event type.',
            ],
        ],
        'cases' => [
            'title' => 'Frequent Use Cases',
            'audit' => [
                'title' => 'Auditing Critical Changes',
                'text' => 'Review closures or reopenings to validate that the correct flow was followed.',
            ],
            'assignments' => [
                'title' => 'Assignment Tracking',
                'text' => 'Detect frequent reassignments and workload distribution.',
            ],
            'verification' => [
                'title' => 'Activity Verification',
                'text' => 'Check if an admin or user performed actions on specific dates.',
            ],
        ],
        'practices' => [
            'title' => 'Best Practices',
            'recommended' => [
                'title' => 'Recommended',
                'li1' => 'Review daily events on critical tickets.',
                'li2' => 'Document sensitive actions with clear comments.',
                'li3' => 'Use filters for monthly audits.',
            ],
            'avoid' => [
                'title' => 'Avoid',
                'li1' => 'Reassigning tickets without justifying the reason.',
                'li2' => 'Ignoring repetitive events that indicate failures.',
                'li3' => 'Using shared users for critical actions.',
            ],
            'tip_title' => 'Quick Tip',
            'tip_text' => 'If a ticket changes status multiple times in a short period, check the history and add a note with the reason.',
        ],
    
];