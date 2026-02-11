<?php

return [
    'meta_title' => 'Documentation - User Management',
    'header_title' => 'User and Administrator Management',
    'header_subtitle' => 'Complete guide to manage system user and administrator accounts',

    // Index
    'index_title' => 'In this guide you will learn:',
    'index_items' => [
        'users' => 'Standard User Management',
        'admins' => 'Administrator Management (superadmin only)',
        'permissions' => 'Permission differences',
        'practices' => 'Best practices',
    ],

    // Users Section
    'users' => [
        'title' => 'Standard User Management',
        'intro' => 'Standard users are people who can create tickets and check their request status. As an admin, you can manage their accounts from the admin panel.',
        'access_title' => 'How to access',
        'access_intro' => 'To access user management:',
        'access_steps' => [
            '1' => 'From the left sidebar, find the section <strong>"Manage all users"</strong>',
            '2' => 'Click on <strong>"Manage users"</strong>',
            '3' => 'The main screen with the list of all registered users will open',
        ],
        'warning_super' => 'Important: This functionality is only available for superadmins. Standard admins cannot manage users.',
        
        // Users Table
        'list_title' => 'The User List Screen',
        'list_intro' => 'When accessing this section, you will see a table with all system users. You can sort the rows by clicking on the column headers.',
        'table_cols_title' => 'Table Columns',
        'table_head' => ['Column', 'Shows', 'Purpose'],
        'table_rows' => [
            'id' => ['col' => 'ID', 'show' => 'Unique user identifier', 'use' => 'Technical reference of the user in the system'],
            'name' => ['col' => 'Name', 'show' => 'User full name', 'use' => 'Visually identify the user'],
            'email' => ['col' => 'Email', 'show' => 'Login email', 'use' => 'Contact and login credential'],
            'date' => ['col' => 'Creation Date', 'show' => 'When user registered', 'use' => 'Know account age'],
            'actions' => ['col' => 'Actions', 'show' => 'Management buttons', 'use' => 'Edit or delete user'],
        ],

        // Tools
        'tools_title' => 'Table Tools',
        'search_title' => 'Search',
        'search_intro' => 'In the top right corner you will find a search field.',
        'search_how' => 'How to use:',
        'search_list' => [
            '1' => 'Type the name or email of the user you are looking for',
            '2' => 'The table filters automatically as you type',
            '3' => 'Clear text to see all users again',
        ],
        'search_ex' => 'Example: Type "mary" to find Mary Johnson or mary@example.com',
        'pagination_title' => 'Pagination and Records per Page',
        'pagination_records' => 'Selector "Show [number] records":',
        'pagination_records_list' => [
            '1' => 'Located in top left corner',
            '2' => 'Options: 10, 25, 50 or 100 users per page',
            '3' => 'Defaults to 10',
        ],
        'pagination_controls' => 'Pagination controls:',
        'pagination_controls_list' => [
            '1' => 'At the bottom of the table',
            '2' => 'Buttons: "Previous", page numbers, "Next"',
            '3' => 'Indicator: "Showing 1 to 10 of 45 records"',
        ],
    ],

    // Create User
    'create' => [
        'title' => 'Create New User',
        'img_alt' => 'Button to create a user.',
        'step1' => 'Step 1: Access creation form',
        'step1_text' => 'In the user list screen, top right, you will find a green button. Click it to open the creation form.',
        'step2' => 'Step 2: Fill the form',
        'step2_intro' => 'The user creation form contains these fields:',
        'fields' => [
            'name' => ['label' => 'Full Name', 'ph' => 'Ex: John Doe', 'note' => 'Name seen by user in profile and by you in the list.'],
            'email' => ['label' => 'Email Address', 'ph' => 'Ex: john.doe@company.com', 'note' => 'Will be their username to login. Must be unique in system.'],
            'pass' => ['label' => 'Password', 'ph' => 'Minimum 8 characters', 'note' => 'Must correspond to security policy. User can change it later.'],
            'confirm' => ['label' => 'Confirm Password', 'ph' => 'Repeat password', 'note' => 'Type same password to confirm no typos.'],
        ],
        'required_note' => 'Fields marked with * are mandatory. Form wont submit if missing.',
        'step3' => 'Step 3: Save user',
        'step3_intro' => 'Once form is completed correctly:',
        'step3_list' => [
            '1' => 'Check all data is correct',
            '2' => 'Click green <strong>"Create User"</strong> button at end of form',
            '3' => 'System will validate data automatically',
        ],
        'success_title' => 'If everything is correct',
        'success_msg' => 'User created successfully',
        'success_desc' => 'You will be redirected to user list and new user will appear in table.',
        'error_title' => 'If there are errors',
        'error_intro' => 'System will show specific error messages under each problematic field:',
        'error_list' => [
            '1' => '<strong>"Name field is required"</strong> - Missing name',
            '2' => '<strong>"Email already registered"</strong> - That email exists in system',
            '3' => '<strong>"Passwords do not match"</strong> - Password and confirmation differ',
            '4' => '<strong>"Password must be at least 8 characters"</strong> - Password too short',
        ],
        'error_fix' => 'Correct errors indicated and click "Create User" again.',
    ],

    // Edit User
    'edit' => [
        'title' => 'Edit Existing User',
        'img_alt' => 'User action buttons section, edit (yellow) and delete (red).',
        'when_title' => 'When to edit a user',
        'when_list' => [
            '1' => 'User changed name (e.g., marriage)',
            '2' => 'Email is no longer valid and needs update',
            '3' => 'User forgot password and you need to reset it',
            '4' => 'There are typos in user data',
        ],
        'step1' => 'Step 1: Locate user',
        'step1_list' => [
            '1' => 'In user list, find user you want to edit',
            '2' => 'In "Actions" column, you will see two buttons',
            '3' => 'Click <strong>yellow button with pencil icon</strong> (Edit)',
        ],
        'step2' => 'Step 2: Modify data',
        'step2_intro' => 'A pre-filled form with current user data will open. You can modify:',
        'table_head' => ['Field', 'Can you change it?', 'Considerations'],
        'fields' => [
            'name' => 'No restrictions',
            'email' => 'Must be unique (not used by other user)',
            'pass' => 'Leave blank if you DO NOT want to change it. Fill only to set new one.',
            'confirm' => 'Only if changing password',
        ],
        'pass_warning' => 'Important about password: If you leave password fields blank, current user password will NOT be modified. Only fill these if you want to change it.',
        'step3' => 'Step 3: Save changes',
        'step3_list' => [
            '1' => 'Check all changes are correct',
            '2' => 'Click "Update User" button',
            '3' => 'If correct, you will see success message and return to list',
        ],
        'success_msg' => 'User updated successfully',
    ],

    // Delete User
    'delete' => [
        'title' => 'Delete User',
        'warning' => 'CAUTION! Deleting a user is a permanent and irreversible action. All user data will be lost.',
        'when_title' => 'When to delete a user',
        'when_list' => [
            '1' => 'User left organization and no longer needs access',
            '2' => 'Test account created no longer needed',
            '3' => 'Duplicate account detected by error',
            '4' => 'User requests it specifically (right to be forgotten)',
        ],
        'note' => 'Note: When deleting a user, their tickets remain in system but become orphaned (no visible owner). This is intentional to keep history.',
        'step1' => 'Step 1: Request confirmation',
        'step1_text' => 'In user list, locate user and click <strong>red trash button</strong> in Actions column.',
        'step2' => 'Step 2: Confirmation screen',
        'step2_text' => 'A new screen with clear warning message will open.',
        'img_alt' => 'Delete user confirmation modal.',
        'step3' => 'Step 3: Confirm or cancel',
        'step3_list' => [
            '1' => 'If clicking "Cancel": Return to list without deleting',
            '2' => 'If clicking "Yes, delete user": User will be permanently deleted',
        ],
        'success_msg' => 'User deleted successfully',
    ],

    // Admins
    'admins' => [
        'title' => 'Administrator Management (Superadmin Only)',
        'restricted' => 'Restricted Acces: Only superadmins can access this feature. Standard admins won\'t see this menu option.',
        'intro' => 'Administrators are users with special permissions who can manage tickets, users, and system. Admin management works similarly to user management, but with key differences.',
        'access' => 'How to access',
        'access_steps' => [
            '1' => 'From left sidebar, find section <strong>"Manage all users"</strong>',
            '2' => 'Click <strong>"Manage admins"</strong>',
            '3' => 'Screen with admin list will open',
        ],
        'img_alt' => 'Example of admin table.',
        'diff_title' => 'Differences with User Management',
        'diff_head' => ['Feature', 'Standard Users', 'Administrators'],
        'diff_rows' => [
            'access' => ['name' => 'System Access', 'user' => 'User panel (/user)', 'admin' => 'Admin panel (/admin)'],
            'create' => ['name' => 'Can create tickets', 'user' => 'Yes', 'admin' => 'No'],
            'manage' => ['name' => 'Can manage tickets', 'user' => 'No', 'admin' => 'Yes'],
            'field' => ['name' => 'Additional field', 'user' => 'None', 'admin' => 'Checkbox "Is superadmin?"'],
            'qty' => ['name' => 'Rec. Quantity', 'user' => 'Unlimited', 'admin' => 'Limited (support only)'],
        ],
        'super_title' => 'Special Field: "Is Superadmin?"',
        'super_text' => 'When creating or editing an admin, you see an extra field NOT present for normal users:',
        'super_img_alt' => '"Is superadmin?" option in admin form.',
        'no_super_title' => 'If you DO NOT check box',
        'no_super_text' => 'Admin will be "standard" and can:',
        'no_super_list' => ['View assigned tickets', 'Comment on tickets', 'Change status', 'View notifications', 'View history'],
        'yes_super_title' => 'If you DO check box',
        'yes_super_text' => 'Admin will be "super" and can do ALL above, plus:',
        'yes_super_list' => ['Create/edit/delete users', 'Create/edit/delete admins', 'Manage ticket types', 'View ALL tickets', 'No restrictions'],
        'super_warning' => 'Security Tip: Only assign superadmin role to highly trusted people. Too many superadmins can compromise security.',
        'process_title' => 'Complete Management Process',
        'process_intro' => 'Admin management follows exact same steps as user management:',
        'op_create' => 'Create Administrator',
        'op_create_steps' => [
            'btn' => 'Click green <strong>"Create New Administrator"</strong> button',
            'fill' => 'Fill form: Name, Email, Password and <strong>Superadmin Box</strong>',
            'save' => 'Click <strong>"Create Administrator"</strong>',
        ],
        'op_edit' => 'Edit Administrator',
        'op_edit_steps' => [
            'locate' => 'Locate admin and click "Edit"',
            'mod' => 'Modify fields and <strong>change superadmin status</strong> if needed',
            'save' => 'Click <strong>"Update Administrator"</strong>',
            'note' => 'You can convert standard admin to superadmin (or vice versa) anytime.',
        ],
        'op_delete' => 'Delete Administrator',
        'op_delete_steps' => [
            'locate' => 'Click red "Delete" button',
            'confirm' => 'Confirm with <strong>"Yes, delete administrator"</strong>',
            'warn' => 'WARNING: You cannot delete your own account while logged in nor the last superadmin.',
        ],
    ],

    // Permissions
    'permissions' => [
        'title' => 'Permissions Matrix',
        'intro' => 'This table summarizes what each account type can do in system:',
        'head' => ['Action', 'Standard User', 'Standard Admin', 'Superadmin'],
        'rows' => [
            'create_own' => 'Create own tickets',
            'view_all' => 'View all tickets',
            'comment' => 'Comment on tickets',
            'change_status' => 'Change ticket status',
            'assign' => 'Assign tickets',
            'notify' => 'View notifications',
            'history' => 'View event history',
            'manage_users' => 'Manage users',
            'manage_admins' => 'Manage administrators',
            'manage_types' => 'Manage ticket types',
        ],
        'badges' => [
            'assigned_only' => 'Assigned only',
            'own_only' => 'Own only',
            'all' => 'All',
        ],
    ],

    // Best Practices
    'practices' => [
        'title' => 'Best Practices',
        'do_title' => 'Recommendations',
        'do_list' => [
            '1' => 'Use corporate emails for admins, not personal ones',
            '2' => 'Set strong passwords (8+ chars, letters, numbers, symbols)',
            '3' => 'Limit superadmins to 2-3 trusted people',
            '4' => 'Document important changes (who created/deleted which account)',
            '5' => 'Periodically review user list to detect inactive accounts',
            '6' => 'Name users clearly (full name, no nicknames)',
        ],
        'dont_title' => 'Avoid These Errors',
        'dont_list' => [
            '1' => 'Do not create test users in production system',
            '2' => 'Do not use simple passwords like "12345678" or "password"',
            '3' => 'Do not give superadmin permissions to all admins',
            '4' => 'Do not delete users without confirming with team first',
            '5' => 'Do not share credentials between multiple people',
            '6' => 'Do not ignore duplicate emails when creating accounts',
        ],
        'tip_title' => 'Pro Tip',
        'tip_desc' => 'Keep an external list updated (doc or spreadsheet) with all active admins, their roles, and creation date. This helps in security audits.',
    ],
];