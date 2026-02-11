<?php

return [
    'title_page' => 'Documentation - Event History',
    'header' => [
        'title' => 'Event History',
        'subtitle' => 'System auditing and activity tracking system',
    ],
    'index' => [
        'title' => 'In this guide you will learn:',
        'items' => [
            'what_is' => 'What is the Event History',
            'access' => 'How to access the history',
            'interface' => 'Understanding the interface',
            'types' => 'Types of registered events',
            'filter' => 'Filtering and searching events',
            'analyze' => 'Analyzing the information',
            'cases' => 'Practical use cases',
        ],
    ],
    'section_what_is' => [
        'title' => 'What is the Event History?',
        'description' => 'The Event History is an <strong>automatic auditing system</strong> that records all important actions performed on the ticket management platform.',
        'function_title' => 'Main Function',
        'function_desc' => 'It provides <strong>complete traceability</strong> of:',
        'function_items' => [
            'who' => '<strong>Who</strong> performed an action (user or administrator)',
            'what' => '<strong>What</strong> action was performed (create, edit, delete, assign, etc.)',
            'when' => '<strong>When</strong> it was performed (exact date and time)',
            'about' => '<strong>What</strong> the action was performed on (tickets, users, types, etc.)',
        ],
        'purpose_title' => 'What is it for?',
        'cards' => [
            'security' => [
                'title' => 'Security',
                'items' => [
                    'Detect suspicious activities',
                    'Identify unauthorized access',
                    'Track unwanted changes',
                    'Hold specific actions accountable',
                ],
            ],
            'audit' => [
                'title' => 'Audit',
                'items' => [
                    'Comply with audit requirements',
                    'Generate activity reports',
                    'Review change history',
                    'Document workflow',
                ],
            ],
            'troubleshooting' => [
                'title' => 'Troubleshooting',
                'items' => [
                    'Identify when a problem started',
                    'See what changes preceded an error',
                    'Reconstruct event sequences',
                    'Understand incident context',
                ],
            ],
            'analysis' => [
                'title' => 'Analysis',
                'items' => [
                    'Analyze usage patterns',
                    'Measure team productivity',
                    'Identify bottlenecks',
                    'Optimize processes',
                ],
            ],
        ],
    ],
    'section_access' => [
        'title' => 'Accessing the Event History',
        'restricted_msg' => '<strong>Restricted Access:</strong> Only <strong>Superadministrators</strong> can access the Event History. Regular administrators do not have permission to view this section.',
        'how_to_title' => 'How to access',
        'steps' => [
            '1' => '<strong>Step 1:</strong> Log in as Superadministrator',
            '2' => '<strong>Step 2:</strong> In the left sidebar menu, locate the <strong>"Administration"</strong> section',
            '3' => '<strong>Step 3:</strong> Click on <strong>"Administration"</strong> to expand the submenu',
            '4' => '<strong>Step 4:</strong> Select <strong>"Event History"</strong>',
        ],
        'route_info' => '<strong>Path:</strong> Admin Panel → Administration → Event History',
    ],
    'section_interface' => [
        'title' => 'The History Interface',
        'intro' => 'The Event History screen presents a simplified interface focused on the data table:',
        'table_title' => 'Event Table',
        'table_desc' => 'The table shows all events registered in the system, ordered chronologically:',
        'table' => [
            'headers' => [
                'column' => 'Column',
                'shows' => 'What it shows',
                'extra' => 'Additional information',
            ],
            'rows' => [
                'type' => [
                    'name' => '<strong>Event Type</strong>',
                    'desc' => 'The action that was performed',
                    'extra' => 'Ex: "ticket_created", "user_login"',
                ],
                'description' => [
                    'name' => '<strong>Description</strong>',
                    'desc' => 'Specific details of the event',
                    'extra' => 'Describes what changed (ex: "Ticket #123 created by Juan")',
                ],
                'user' => [
                    'name' => '<strong>User</strong>',
                    'desc' => 'Who performed the action',
                    'extra' => 'Name of the responsible person',
                ],
                'date' => [
                    'name' => '<strong>Date</strong>',
                    'desc' => 'When the event occurred',
                    'extra' => 'Format: dd/mm/yyyy HH:mm',
                ],
            ],
        ],
        'note' => '<strong>Note:</strong> Event type names are shown in their technical format (ex: <code>ticket_created</code>) for greater precision in searches.',
        'features_title' => 'Table Features',
        'features' => [
            'search' => [
                'title' => 'Global Search',
                'content' => [
                    '<strong>Location:</strong> Top right corner of the table ("Search:")',
                    '<strong>Function:</strong> Dynamically filters results showing only events containing the text entered in <strong>any of their columns</strong>.',
                    '<strong>Example:</strong> Type "admin" to see actions performed BY admins or ON admins.',
                ],
            ],
            'sort' => [
                'title' => 'Sorting',
                'content' => [
                    '<strong>How to use:</strong> Click on any column header',
                    '<strong>First click:</strong> Sorts ascending (A→Z, oldest→newest)',
                    '<strong>Second click:</strong> Sorts descending (Z→A, newest→oldest)',
                ],
            ],
            'pagination' => [
                'title' => 'Pagination',
                'content' => [
                    '<strong>Records per page:</strong> Selector in the top left corner',
                    '<strong>Options:</strong> 10, 25, 50 or 100 events per page',
                    '<strong>Navigation:</strong> "Previous/Next" buttons at the bottom',
                ],
            ],
            'order' => [
                'title' => 'Order and Visualization',
                'content' => [
                    '<strong>Default order:</strong> Reverse chronological (newest first).',
                    '<strong>Tip:</strong> Use pagination to navigate through old history.',
                ],
            ],
        ],
    ],
    'section_types' => [
        'title' => 'Types of Registered Events',
        'intro' => 'The system automatically registers the following types of events:',
        'tickets_title' => 'Ticket Events',
        'table_headers' => [
            'event' => 'Event',
            'when' => 'When it is registered',
            'example' => 'Description Example',
        ],
        'tickets_rows' => [
            'created' => ['code' => 'ticket_created', 'when' => 'When a user creates a new ticket', 'example' => '"Ticket #45 created by user@example.com with title \'Access Error\'"'],
            'updated' => ['code' => 'ticket_updated', 'when' => 'When any field of a ticket is modified (title, description, status, priority, type)', 'example' => '"Ticket #45 updated: Status changed from \'New\' to \'In Progress\'"'],
            'assigned' => ['code' => 'ticket_assigned', 'when' => 'When an administrator assigns a ticket to another administrator', 'example' => '"Ticket #45 assigned to admin@example.com by superadmin@example.com"'],
            'closed' => ['code' => 'ticket_closed', 'when' => 'When a ticket is marked as closed', 'example' => '"Ticket #45 closed by admin@example.com"'],
            'commented' => ['code' => 'comment_added', 'when' => 'When a comment is added to a ticket', 'example' => '"Comment added to Ticket #45 by admin@example.com"'],
        ],
        'users_title' => 'User Events',
        'users_rows' => [
            'created' => ['code' => 'user_created', 'when' => 'When a new user is registered in the system', 'example' => '"User \'John Doe\' (john@example.com) registered"'],
            'updated' => ['code' => 'user_updated', 'when' => 'When a user profile is modified', 'example' => '"User \'John Doe\' updated: Email changed"'],
            'deleted' => ['code' => 'user_deleted', 'when' => 'When a user account is deleted', 'example' => '"User \'John Doe\' (john@example.com) deleted by superadmin@example.com"'],
            'login' => ['code' => 'user_login', 'when' => 'Every time a user logs in', 'example' => '"Login: user@example.com from IP 192.168.1.100"'],
            'logout' => ['code' => 'user_logout', 'when' => 'When a user manually logs out', 'example' => '"Logout: user@example.com"'],
        ],
        'admins_title' => 'Administrator Events',
        'admins_rows' => [
            'created' => ['code' => 'admin_created', 'when' => 'When a new administrator account is created', 'example' => '"Administrator \'Mary Smith\' (mary@admin.com) created by superadmin@example.com"'],
            'updated' => ['code' => 'admin_updated', 'when' => 'When an administrator profile is modified', 'example' => '"Administrator \'Mary Smith\' updated: Role changed to Superadministrator"'],
            'deleted' => ['code' => 'admin_deleted', 'when' => 'When an administrator account is deleted', 'example' => '"Administrator \'Mary Smith\' deleted by superadmin@example.com"'],
            'login' => ['code' => 'admin_login', 'when' => 'Every time an administrator accesses the panel', 'example' => '"Admin login: admin@example.com from IP 192.168.1.50"'],
        ],
        'types_title' => 'Ticket Type Events',
        'types_rows' => [
            'created' => ['code' => 'type_created', 'when' => 'When a new ticket type is created', 'example' => '"Type \'Network Issue\' created by superadmin@example.com"'],
            'updated' => ['code' => 'type_updated', 'when' => 'When an existing ticket type is modified', 'example' => '"Type \'Bug\' updated: Description modified"'],
            'deleted' => ['code' => 'type_deleted', 'when' => 'When a ticket type is deleted', 'example' => '"Type \'Network Issue\' deleted by superadmin@example.com"'],
        ],
        'note' => '<strong>Note:</strong> All these events are registered <strong>automatically</strong> by the system. They do not require any manual action to be saved.',
    ],
    'section_filter' => [
        'title' => 'How to Filter and Search Events',
        'intro' => 'The history can contain thousands of events. The main tool for finding information is the Global Search in the table.',
        'strategies_title' => 'Search Strategies',
        'pro_tip' => '<strong>Pro Tip:</strong> The global search bar is "smart". You can type any term that appears in the row to find it.',
        'filter_type' => [
            'title' => '1. How to filter by Event Type',
            'goal' => '<strong>Goal:</strong> See all actions of a specific type (e.g., Ticket Creation).',
            'method' => '<strong>Method:</strong>',
            'steps' => [
                '1' => 'Go to the search box ("Search:") at the top right of the table.',
                '2' => 'Type the event code (e.g., <code>ticket_created</code>).',
                '3' => 'The table will show only the rows containing that text.',
            ],
            'useful_terms' => '<strong>Useful terms to search:</strong>',
            'terms_list' => [
                '<code>ticket_</code>: Shows everything related to tickets.',
                '<code>user_</code>: Shows actions on users.',
                '<code>login</code>: Shows system accesses.',
                '<code>comment</code>: Shows added comments.',
            ],
        ],
        'filter_user' => [
            'title' => '2. How to filter by User',
            'goal' => '<strong>Goal:</strong> Track actions of a specific person.',
            'method' => '<strong>Method:</strong>',
            'steps' => [
                '1' => 'Type the <strong>name</strong> or <strong>email</strong> of the user in the search box.',
                '2' => 'The system will filter automatically.',
            ],
            'examples' => '<strong>Examples:</strong>',
            'examples_list' => [
                'Type "admin@example.com" to see their full history.',
                'Type "John" to see actions of any user named John.',
            ],
        ],
        'filter_date' => [
            'title' => '3. How to filter by Date or Content',
            'goal' => '<strong>Goal:</strong> Find events from a specific day or about a specific topic.',
            'for_dates' => '<strong>For dates:</strong>',
            'dates_list' => [
                'Type the date in <code>YYYY-MM-DD</code> format or parts of it.',
                '<em>Note: Search is textual, so it must match the format shown on screen.</em>',
            ],
            'for_content' => '<strong>For content (Description):</strong>',
            'content_list' => [
                'Type specific keywords like "closed", "assigned", or a ticket number (e.g., "Ticket #45").',
            ],
        ],
    ],
    'section_analyze' => [
        'title' => 'Analyzing the Information',
        'intro' => 'Once you have filtered the events, it is time to analyze the information. Here are some strategies:',
        'patterns_title' => 'Patterns to Identify',
        'cards' => [
            'productivity' => [
                'title' => 'Productivity Analysis',
                'what' => '<strong>What to look for:</strong>',
                'items' => [
                    'Number of tickets processed by administrator',
                    'Average time between creation and first response',
                    'Amount of assignments and reassignments',
                    'Peak activity hours',
                ],
                'how' => '<strong>How:</strong> Search for <code>ticket_updated</code> or <code>comment_added</code> and observe usernames.',
            ],
            'anomalies' => [
                'title' => 'Anomaly Detection',
                'what' => '<strong>What to look for:</strong>',
                'items' => [
                    'Multiple failed login attempts',
                    'Accesses outside usual hours',
                    'Massive changes in a short time',
                    'Unusual deletions',
                ],
                'how' => '<strong>How:</strong> Search for <code>login</code>, <code>deleted</code> events, and sort by date/time',
            ],
            'tracking' => [
                'title' => 'Ticket Tracking',
                'what' => '<strong>What to look for:</strong>',
                'items' => [
                    'Complete lifecycle of a ticket',
                    'All changes made',
                    'Who intervened',
                    'Resolution times',
                ],
                'how' => '<strong>How:</strong> Use global search by typing the ticket ID (e.g., "#123")',
            ],
            'audit' => [
                'title' => 'Change Audit',
                'what' => '<strong>What to look for:</strong>',
                'items' => [
                    'Who modified critical configurations',
                    'Changes in ticket types',
                    'Creation/deletion of administrators',
                    'Permission modifications',
                ],
                'how' => '<strong>How:</strong> Search for <code>admin_created</code>, <code>type_updated</code>, etc.',
            ],
        ],
        'dates_title' => 'Interpretation of Dates and Times',
        'date_format' => '<strong>Date format:</strong> dd/mm/yyyy HH:mm (example: 09/02/2026 14:35)',
        'important_elements' => '<strong>Important elements:</strong>',
        'elements_list' => [
            '<strong>Temporal sequence:</strong> Sort by date to see the chronological order of events',
            '<strong>Intervals:</strong> Note the time between related events (e.g., creation and first response of a ticket)',
            '<strong>Hourly patterns:</strong> Identify activity peaks at certain hours',
            '<strong>Consistency:</strong> Detect simultaneous or very fast actions that may be suspicious',
        ],
        'timezone_note' => '<strong>Important:</strong> Dates and times are in the server\'s time zone. Make sure to take this into account when analyzing events.',
    ],
    'section_cases' => [
        'title' => 'Practical Use Cases',
        'intro' => 'Here are some real scenarios where Event History is fundamental:',
        'cases_list' => [
            '1' => [
                'title' => 'Case 1: "A ticket disappeared or was modified without authorization"',
                'situation' => '<strong>Situation:</strong> A user reports their ticket was closed or modified without notification.',
                'solution' => '<strong>Solution:</strong>',
                'steps' => [
                    'Get the ticket ID (e.g., #123)',
                    'In the global quick search, type "#123"',
                    'Review all related events: creation, updates, assignments',
                    'Identify who made the change and when',
                    'Verify if it was a human error or a technical problem',
                ],
                'result' => '<strong>Result:</strong> Complete traceability of who, when, and how the ticket was modified.',
            ],
            '2' => [
                'title' => 'Case 2: "Reviewing an administrator\'s performance"',
                'situation' => '<strong>Situation:</strong> You need to evaluate how much work an administrator has done in the last month.',
                'solution' => '<strong>Solution:</strong>',
                'steps' => [
                    'Type the <strong>administrator\'s email</strong> in the search box.',
                    'The table will show only their actions.',
                    'Observe actions of type <code>ticket_updated</code> or <code>comment_added</code>.',
                    'Review tickets assigned and resolved by them.',
                ],
                'result' => '<strong>Result:</strong> Overview of the work performed by that user.',
            ],
            '3' => [
                'title' => 'Case 3: "Detecting possible unauthorized access"',
                'situation' => '<strong>Situation:</strong> You suspect someone accessed an account without authorization.',
                'solution' => '<strong>Solution:</strong>',
                'steps' => [
                    'Search for the keyword <strong>"login"</strong> in the search box.',
                    'Then, refine by adding the name or email of the suspicious user.',
                    'Review dates and times to find unusual accesses (late night, non-working weekends).',
                ],
                'result' => '<strong>Result:</strong> Identification of suspicious accesses to take action.',
            ],
            '4' => [
                'title' => 'Case 4: "Who deleted an important ticket type?"',
                'situation' => '<strong>Situation:</strong> A ticket type that was frequently used has disappeared.',
                'solution' => '<strong>Solution:</strong>',
                'steps' => [
                    'Search for the keyword <strong>"deleted"</strong> or <strong>"type_deleted"</strong>.',
                    'Search for the type name in descriptions if you remember it.',
                    'Identify who performed the deletion.',
                    'Contact the responsible person to confirm if it was intentional.',
                ],
                'result' => '<strong>Result:</strong> Responsible person identified and possibility to restore if it was an error.',
            ],
            '5' => [
                'title' => 'Case 5: "Regulatory compliance audit"',
                'situation' => '<strong>Situation:</strong> An external audit requires demonstrating change traceability.',
                'solution' => '<strong>Solution:</strong>',
                'steps' => [
                    'Define the audit period.',
                    'Search for the start date (e.g., "2026-01-01") to situate yourself in time.',
                    'Take screenshots or copy relevant data from the table.',
                    'Present evidence of who authorized critical changes.',
                ],
                'result' => '<strong>Result:</strong> Basic documentation to meet audit requirements.',
            ],
        ],
    ],
    'section_practices' => [
        'title' => 'Best Practices',
        'recommendations_title' => 'Recommendations',
        'recommendations_list' => [
            'Review history regularly (weekly) to detect anomalies early',
            'Use combined filters for more precise searches',
            'Document critical events outside the system if necessary',
            'Train the team on the importance of traceability',
            'Establish clear policies on who can perform critical actions',
        ],
        'errors_title' => 'Common Mistakes',
        'errors_list' => [
            '<strong>Not reviewing history:</strong> Missing opportunities to detect problems',
            '<strong>Relying only on memory:</strong> The history is the source of truth',
            '<strong>Not combining filters:</strong> Getting too many irrelevant results',
            '<strong>Ignoring patterns:</strong> Not analyzing trends can hide bigger problems',
            '<strong>Not documenting findings:</strong> Losing evidence for future reference',
        ],
    ],
    'section_limitations' => [
        'title' => 'Limitations and Considerations',
        'alert_title' => 'Aspects to Keep in Mind',
        'items' => [
            '<strong>Only Superadministrators:</strong> Regular administrators cannot access this functionality',
            '<strong>Non-editable:</strong> Registered events cannot be modified or deleted (ensures integrity)',
            '<strong>Storage:</strong> Over time, the table will grow. Consider data retention policies',
            '<strong>Performance:</strong> With many thousands of events, searches may become slower',
            '<strong>Privacy:</strong> The history may contain sensitive information. Access only when necessary',
        ],
    ],
];
