<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? htmlspecialchars($title) . ' | ' : '' ?>Sigma Height Elevators Admin</title>
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="<?= base_url('assets/favicon.svg') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/favicon-32x32.png') ?>">
    <link rel="shortcut icon" href="<?= base_url('assets/favicon.ico') ?>">
    <link rel="apple-touch-icon" href="<?= base_url('assets/favicon.png') ?>">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome 6 Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary: #e60000;
            --primary-hover: #cc0000;
            --primary-light: rgba(230, 0, 0, 0.08);
            --dark-bg: #0b0f19;
            --dark-card: #111827;
            --sidebar-bg: #090d16;
            --sidebar-border: #1f293d;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --body-bg: #f8fafc;
            --card-border: #e2e8f0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--body-bg);
            color: var(--text-main);
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6, .brand-font {
            font-family: 'Outfit', sans-serif;
        }

        /* Layout wrapper */
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        /* Sidebar */
        #sidebar {
            width: 270px;
            min-width: 270px;
            background-color: var(--sidebar-bg);
            color: #94a3b8;
            border-right: 1px solid var(--sidebar-border);
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        #sidebar.collapsed {
            margin-left: -270px;
        }

        .sidebar-brand {
            padding: 24px 20px;
            border-bottom: 1px solid var(--sidebar-border);
            display: flex;
            align-items: center;
            gap: 12px;
            background: linear-gradient(180deg, #111827 0%, #090d16 100%);
        }

        .sidebar-brand img {
            height: 38px;
            object-fit: contain;
        }

        .sidebar-brand .brand-text {
            font-size: 1.1rem;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: 0.5px;
            line-height: 1.2;
        }

        .sidebar-brand .brand-sub {
            font-size: 0.72rem;
            color: #ef4444;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .sidebar-nav {
            padding: 18px 12px;
            list-style: none;
            margin: 0;
            flex-grow: 1;
            overflow-y: auto;
        }

        .nav-section-title {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: #64748b;
            font-weight: 700;
            padding: 12px 14px 6px;
            margin-top: 8px;
        }

        .sidebar-nav li a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 11px 16px;
            color: #94a3b8;
            text-decoration: none;
            border-radius: 8px;
            font-size: 0.92rem;
            font-weight: 500;
            transition: all 0.2s ease;
            margin-bottom: 4px;
        }

        .sidebar-nav li a i {
            width: 20px;
            text-align: center;
            font-size: 1rem;
            transition: transform 0.2s;
        }

        .sidebar-nav li a:hover {
            color: #ffffff;
            background-color: rgba(230, 0, 0, 0.12);
        }

        .sidebar-nav li a:hover i {
            color: #ff3333;
            transform: scale(1.1);
        }

        .sidebar-nav li a.active {
            color: #ffffff;
            background: linear-gradient(135deg, #e60000 0%, #b30000 100%);
            box-shadow: 0 4px 14px rgba(230, 0, 0, 0.35);
        }

        .sidebar-nav li a.active i {
            color: #ffffff;
        }

        .sidebar-footer {
            padding: 16px 20px;
            border-top: 1px solid var(--sidebar-border);
            font-size: 0.8rem;
            color: #64748b;
            background: #06090f;
        }

        /* Main Content Container */
        .main-container {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
            background-color: #f8fafc;
        }

        /* Topbar Header */
        .admin-topbar {
            height: 68px;
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            position: sticky;
            top: 0;
            z-index: 900;
            box-shadow: 0 1px 3px rgba(0,0,0,0.03);
        }

        .toggle-btn {
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 8px 12px;
            color: #334155;
            cursor: pointer;
            transition: all 0.2s;
        }

        .toggle-btn:hover {
            background: #e2e8f0;
            color: #0f172a;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .live-site-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #0f172a;
            color: #ffffff;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 7px 16px;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.2s;
        }

        .live-site-btn:hover {
            background: var(--primary);
            color: #ffffff;
        }

        /* Admin Body Content */
        .page-content {
            padding: 30px 28px;
            flex-grow: 1;
        }

        /* Cards and Components */
        .admin-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 1px 4px rgba(0,0,0,0.03);
            margin-bottom: 24px;
            overflow: hidden;
        }

        .admin-card-header {
            padding: 18px 24px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #ffffff;
        }

        .admin-card-title {
            font-size: 1.15rem;
            font-weight: 700;
            margin: 0;
            color: #0f172a;
        }

        .admin-card-body {
            padding: 24px;
        }

        /* Primary Buttons */
        .btn-theme {
            background: linear-gradient(135deg, #e60000 0%, #cc0000 100%);
            color: #ffffff;
            border: none;
            font-weight: 600;
            border-radius: 8px;
            padding: 9px 18px;
            transition: all 0.2s;
            box-shadow: 0 2px 8px rgba(230, 0, 0, 0.25);
        }

        .btn-theme:hover {
            background: linear-gradient(135deg, #ff1a1a 0%, #e60000 100%);
            color: #ffffff;
            box-shadow: 0 4px 14px rgba(230, 0, 0, 0.35);
        }

        /* Tables */
        .custom-table {
            margin: 0;
        }

        .custom-table th {
            background-color: #f8fafc;
            color: #475569;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            font-weight: 700;
            padding: 14px 16px;
            border-bottom: 1px solid #e2e8f0;
        }

        .custom-table td {
            padding: 16px;
            vertical-align: middle;
            color: #334155;
            font-size: 0.9rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .thumb-preview {
            width: 72px;
            height: 48px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #e2e8f0;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.78rem;
            font-weight: 600;
        }

        .status-active {
            background: #dcfce7;
            color: #15803d;
        }

        .status-inactive {
            background: #fee2e2;
            color: #b91c1c;
        }

        @media (max-width: 992px) {
            #sidebar {
                position: fixed;
                top: 0;
                bottom: 0;
                left: 0;
                margin-left: -270px;
            }
            #sidebar.show {
                margin-left: 0;
            }
            .sidebar-backdrop {
                display: none;
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,0.5);
                z-index: 950;
            }
            .sidebar-backdrop.show {
                display: block;
            }
        }
    </style>
</head>
<body>

<div class="admin-wrapper">
    <div class="sidebar-backdrop" id="sidebarBackdrop"></div>
