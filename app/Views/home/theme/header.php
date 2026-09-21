<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Animedesu - Nonton & Download Anime Subtitle Indonesia Terlengkap">
    <meta name="keywords" content="Anime, Nonton Anime, Streaming Anime, Anime Sub Indo, Animedesu">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $judul ?? 'Animedesu | Nonton Anime Subtitle Indonesia'; ?></title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- FontAwesome & Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <!-- Custom Modern Styling -->
    <style>
        :root {
            --bg-primary: #0b0f19;
            --bg-card: #151c2e;
            --bg-card-hover: #1c253c;
            --accent-red: #e53637;
            --accent-red-hover: #ff4a4b;
            --text-primary: #ffffff;
            --text-secondary: #a0aec0;
            --border-color: rgba(255, 255, 255, 0.08);
        }

        body {
            background-color: var(--bg-primary);
            color: var(--text-primary);
            font-family: 'Mulish', sans-serif;
            overflow-x: hidden;
        }

        /* Breadcrumb styling */
        .breadcrumb-option {
            background: rgba(255, 255, 255, 0.02);
            padding: 14px 0;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 25px;
        }
        .breadcrumb__links a {
            color: var(--text-secondary);
            font-size: 14px;
            text-decoration: none;
            margin-right: 8px;
        }
        .breadcrumb__links a:hover {
            color: var(--accent-red);
        }
        .breadcrumb__links a::after {
            content: "/";
            margin-left: 8px;
            color: rgba(255, 255, 255, 0.2);
        }
        .breadcrumb__links span {
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
        }

        /* Episode button pills */
        .anime__details__episodes a {
            display: inline-block;
            font-size: 14px;
            font-weight: 600;
            color: #e2e8f0;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid var(--border-color);
            padding: 8px 18px;
            border-radius: 6px;
            margin-right: 8px;
            margin-bottom: 10px;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .anime__details__episodes a:hover {
            background: var(--accent-red);
            border-color: var(--accent-red);
            color: #ffffff;
            text-decoration: none;
            transform: translateY(-2px);
        }

        /* Header & Navbar */
        .header {
            background: rgba(11, 15, 25, 0.95);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header__logo h3 {
            font-family: 'Oswald', sans-serif;
            letter-spacing: 1px;
        }

        .header__nav {
            display: flex;
            align-items: center;
        }

        .header__menu ul {
            display: flex;
            align-items: center;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .header__menu ul li {
            list-style: none;
            position: relative;
            margin: 0 4px;
        }

        .header__menu ul li a {
            color: #d1d5db;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.2s ease;
            padding: 10px 16px;
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            border-radius: 8px;
        }

        .header__menu ul li a:hover,
        .header__menu ul li.active a {
            color: #ffffff;
            background: rgba(229, 54, 55, 0.15);
            text-decoration: none;
        }

        /* Dropdown Menu */
        .header__menu ul li .dropdown {
            position: absolute;
            top: calc(100% + 5px);
            left: 0;
            display: none;
            flex-direction: column;
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.6);
            padding: 8px 0;
            min-width: 180px;
            z-index: 1100;
            list-style: none;
        }

        .header__menu ul li:hover .dropdown {
            display: flex;
        }

        .header__menu ul li .dropdown li {
            list-style: none;
            margin: 0;
            display: block;
        }

        .header__menu ul li .dropdown li a {
            padding: 8px 20px;
            font-size: 14px;
            color: #d1d5db;
            display: block;
            border-radius: 0;
        }

        .header__menu ul li .dropdown li a:hover {
            background: rgba(229, 54, 55, 0.2);
            color: #ffffff;
        }

        /* Footer styling */
        .footer {
            background: #070a12;
            padding: 30px 0;
            border-top: 1px solid var(--border-color);
            margin-top: 40px;
        }

        .footer__nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .footer__nav ul li {
            list-style: none;
            display: inline-block;
        }

        .footer__nav ul li a {
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: color 0.2s;
        }

        .footer__nav ul li a:hover {
            color: var(--accent-red);
        }

        /* Modern Live Search Bar */
        .search-container {
            position: relative;
            width: 100%;
        }

        .search-input-wrap {
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-input-wrap input {
            background: rgba(255, 255, 255, 0.07);
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 8px 18px 8px 38px;
            color: #fff;
            font-size: 14px;
            width: 100%;
            transition: all 0.3s ease;
            outline: none;
        }

        .search-input-wrap input:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: var(--accent-red);
            box-shadow: 0 0 12px rgba(229, 54, 55, 0.3);
        }

        .search-input-wrap .search-icon {
            position: absolute;
            left: 14px;
            color: var(--text-secondary);
            font-size: 14px;
            pointer-events: none;
        }

        .live-search-dropdown {
            position: absolute;
            top: 46px;
            left: 0;
            right: 0;
            background: rgba(21, 28, 46, 0.96);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.7);
            z-index: 1100;
            max-height: 420px;
            overflow-y: auto;
            display: none;
        }

        .live-search-item {
            display: flex;
            align-items: center;
            padding: 10px 14px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            text-decoration: none;
            color: #fff;
            transition: background 0.2s;
        }

        .live-search-item:last-child {
            border-bottom: none;
        }

        .live-search-item:hover {
            background: rgba(229, 54, 55, 0.15);
            text-decoration: none;
            color: #fff;
        }

        .live-search-thumb {
            width: 44px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .live-search-info {
            flex-grow: 1;
            overflow: hidden;
        }

        .live-search-title {
            font-weight: 700;
            font-size: 14px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin-bottom: 3px;
        }

        .live-search-meta {
            font-size: 12px;
            color: var(--text-secondary);
        }

        /* Modern Anime Cards */
        .anime-card-modern {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
            margin-bottom: 30px;
            position: relative;
        }

        .anime-card-modern:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.6), 0 0 15px rgba(229, 54, 55, 0.2);
            border-color: rgba(229, 54, 55, 0.4);
        }

        .anime-card-poster {
            position: relative;
            width: 100%;
            padding-top: 140%;
            background-size: cover;
            background-position: center;
            overflow: hidden;
        }

        .anime-card-poster::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 50%;
            background: linear-gradient(to top, rgba(21, 28, 46, 0.95), transparent);
        }

        .anime-badge-top {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 2;
        }

        .anime-badge-score {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(4px);
            color: #ffc107;
            padding: 3px 8px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 700;
            z-index: 2;
        }

        .anime-card-body {
            padding: 14px 16px;
        }

        .anime-card-title {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 6px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .anime-card-title a {
            color: #fff;
            text-decoration: none;
            transition: color 0.2s;
        }

        .anime-card-title a:hover {
            color: var(--accent-red);
        }

        .anime-card-tags {
            font-size: 12px;
            color: var(--text-secondary);
            display: flex;
            justify-content: space-between;
        }

        /* Genre Pill Badges */
        .genre-pill {
            display: inline-block;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid var(--border-color);
            color: #cbd5e1;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            margin: 4px;
            text-decoration: none !important;
            transition: all 0.2s ease;
        }

        .genre-pill:hover,
        .genre-pill.active {
            background: var(--accent-red);
            border-color: var(--accent-red);
            color: #fff;
            box-shadow: 0 4px 12px rgba(229, 54, 55, 0.4);
        }

        .badge-ongoing {
            background: #10b981;
            color: #fff;
            font-size: 11px;
            padding: 3px 8px;
            border-radius: 4px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .badge-completed {
            background: #3b82f6;
            color: #fff;
            font-size: 11px;
            padding: 3px 8px;
            border-radius: 4px;
            font-weight: 700;
            text-transform: uppercase;
        }

        /* Hero / Detail styling */
        .primary-btn {
            background: var(--accent-red);
            color: #fff;
            padding: 10px 22px;
            border-radius: 6px;
            font-weight: 700;
            text-decoration: none !important;
            display: inline-block;
            transition: background 0.2s, transform 0.2s;
        }

        .primary-btn:hover {
            background: var(--accent-red-hover);
            color: #fff;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>