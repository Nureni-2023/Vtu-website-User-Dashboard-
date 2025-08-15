<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aspfiy Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root {
            --primary-color: #6a1b9a;
            --secondary-color: #e0f2f1;
            --balance-available-bg: #e8f5e9;
            --balance-available-text: #2e7d32;
            --balance-volume-bg: #fce4ec;
            --balance-volume-text: #c2185b;
            --service-icon-bg: #f9e1e6;
            --service-icon-color: #e91e63;
            --card-bg: #ffffff;
            --body-bg: #f4f7f9;
            --border-radius: 12px;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            --sidebar-bg: #f8f9fa;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--body-bg);
            color: #333;
            line-height: 1.6;
        }
        
        .main-content {
            transition: margin-left 0.3s ease;
        }

        .dashboard-container {
            max-width: 900px;
            margin: 20px auto;
            padding: 0 15px;
        }

        /* Top Navigation Bar */
        .top-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 15px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }
        .top-nav .left-icons, .top-nav .right-icons {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .top-nav .right-icons .logo {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 16px;
            font-weight: 600;
        }

        /* Dashboard Header */
        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding: 0 15px;
        }

        .header-title {
            font-size: 24px;
            font-weight: 600;
        }

        .fund-wallet-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: var(--border-radius);
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .fund-wallet-btn:hover {
            background-color: #5a148a;
        }

        /* Balances Section */
        .balances-section {
            margin-bottom: 25px;
            padding: 0 15px;
        }

        .section-title {
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .balances-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 15px;
        }
        
        .balance-card {
            display: flex;
            align-items: center;
            padding: 20px;
            border-radius: var(--border-radius);
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            gap: 20px;
        }

        .balance-card.available {
            background-color: #f7fef7;
        }

        .balance-card.volume {
            background-color: #fff6f8;
        }
        
        .balance-icon-wrapper {
            width: 50px;
            height: 50px;
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .balance-card.available .balance-icon-wrapper {
            background-color: #ecf8ed;
        }
        .balance-card.volume .balance-icon-wrapper {
            background-color: #fff1f5;
        }

        .balance-info .label {
            font-size: 14px;
            color: #666;
        }

        .balance-info .value {
            font-size: 22px;
            font-weight: 600;
            margin-top: 5px;
        }

        .balance-card.available .value {
            color: #2a8141;
        }

        .balance-card.volume .value {
            color: #d13d70;
        }
        
        /* Services Section */
        .services-section {
            padding: 0 15px;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        .service-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 10px;
            background-color: var(--card-bg);
            border-radius: var(--border-radius);
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            text-align: center;
            text-decoration: none;
            color: #333;
            transition: transform 0.2s;
        }

        .service-card:hover {
            transform: translateY(-5px);
        }

        .service-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }
        .service-icon img {
            width: 24px;
            height: 24px;
        }
        .service-text {
            font-size: 13px;
            font-weight: 500;
        }

        /* Help Center Section */
        .help-center-section {
            background-color: var(--card-bg);
            padding: 25px;
            margin: 0 15px;
            border-radius: var(--border-radius);
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            border: 1px solid #e0e0e0;
        }

        .help-center-title {
            font-size: 16px;
            font-weight: 600;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            margin-bottom: 8px;
        }

        .help-center-title svg {
            margin-right: 8px;
        }

        .help-center-text {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }

        .help-link {
            font-size: 14px;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .help-link svg {
            vertical-align: middle;
        }
        
        .icon {
            display: inline-block;
            width: 1em;
            height: 1em;
            vertical-align: -0.125em;
            fill: currentColor;
        }
        .balance-card.available .icon { color: #2a8141; }
        .balance-card.volume .icon { color: #d13d70; }
        .service-icon svg { color: var(--service-icon-color); }
        .help-center-title svg { color: var(--primary-color); }
        .help-link svg { color: var(--primary-color); }
        
        /* Sidebar styles */
        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            background-color: var(--sidebar-bg);
            overflow-x: hidden;
            transition: 0.3s;
            padding-top: 60px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar a, .sidebar .sidebar-heading, .sidebar .sidebar-logo {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 16px;
            color: #818181;
            display: block;
            transition: 0.3s;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .sidebar-logo {
            padding-top: 24px;
            padding-bottom: 24px;
        }

        .sidebar-logo img {
            width: 40px;
            height: 40px;
        }
        
        .sidebar-logo h2 {
            font-size: 18px;
            font-weight: 600;
            color: #333;
        }
        
        .sidebar-logo p {
            font-size: 12px;
            font-weight: 400;
            color: #888;
            margin-top: -4px;
        }
        
        .sidebar a:hover {
            color: var(--primary-color);
        }
        
        .sidebar-heading {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            color: #aaa;
            margin-top: 20px;
            margin-bottom: 8px;
        }
        
        .sidebar .close-btn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
            color: #818181;
            cursor: pointer;
        }
        
        #sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: none;
        }
        
        .merchant-switch {
            padding: 32px;
            border-top: 1px solid #e0e0e0;
            margin-top: 20px;
        }
        
        .merchant-switch p {
            font-size: 14px;
            color: #555;
            margin-bottom: 12px;
        }
        
        .merchant-btn {
            background-color: var(--primary-color);
            color: white;
            padding: 12px 20px;
            width: 100%;
            border-radius: var(--border-radius);
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
        }
        
        @media (max-width: 480px) {
            .services-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .dashboard-container {
                padding: 0; /* Remove padding for the main container on mobile */
            }
            .header-section, .balances-section, .services-section, .help-center-section {
                padding: 0 15px;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <a href="javascript:void(0)" class="close-btn" onclick="closeNav()">&times;</a>
        
        <div class="sidebar-logo">
            <img src="https://placehold.co/40x40/6a1b9a/ffffff?text=A" alt="Aspfiy Logo">
            <div>
                <h2>ASPFII VTU</h2>
                <p>DASHBAORD</p>
            </div>
        </div>

        <!-- Dashboard Section -->
        <div class="sidebar-heading">DASHBOARD</div>
        <a href="#">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM4 11V5h2v6H4zm3 0V5h2v6H7zm3 0V5h2v6h-2z"/></svg>
            Dashboard
        </a>

        <!-- Purchases Section -->
        <div class="sidebar-heading">PURCHASES</div>
        <a href="#">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M4 11V5h2v6H4zm3 0V5h2v6H7zm3 0V5h2v6h-2z"/></svg>
            Data Subscription
        </a>
        <a href="#">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M4 11V5h2v6H4zm3 0V5h2v6H7zm3 0V5h2v6h-2z"/></svg>
            Purchase Airtime
        </a>
        <a href="#">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M4 11V5h2v6H4zm3 0V5h2v6H7zm3 0V5h2v6h-2z"/></svg>
            Datacard Printing
        </a>
        <a href="#">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M4 11V5h2v6H4zm3 0V5h2v6H7zm3 0V5h2v6h-2z"/></svg>
            Electricity Payment
        </a>
        <a href="#">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M4 11V5h2v6H4zm3 0V5h2v6H7zm3 0V5h2v6h-2z"/></svg>
            Cable Subscription
        </a>
        <a href="#">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M4 11V5h2v6H4zm3 0V5h2v6H7zm3 0V5h2v6h-2z"/></svg>
            Exam Result Checker
        </a>
        <a href="#">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M4 11V5h2v6H4zm3 0V5h2v6H7zm3 0V5h2v6h-2z"/></svg>
            Transaction History
        </a>
        
        <!-- Merchant Section -->
        <div class="sidebar-heading">MERCHANT</div>
        <a href="#">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M4 11V5h2v6H4zm3 0V5h2v6H7zm3 0V5h2v6h-2z"/></svg>
            Account Settings
        </a>
        <a href="#">
            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M4 11V5h2v6H4zm3 0V5h2v6H7zm3 0V5h2v6h-2z"/></svg>
            API Documentation
        </a>
        
        <!-- Merchant Switcher -->
        <div class="merchant-switch">
            <p>Switch to Merchant?<br>Explore your merchant dashboard.</p>
            <a href="#" class="merchant-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
                Merchant Dashboard
            </a>
        </div>
    </div>
    
    <div id="sidebar-overlay" onclick="closeNav()"></div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- New Top Navigation Bar for Mobile -->
        <div class="top-nav">
            <div class="left-icons">
                 <span onclick="openNav()" style="cursor:pointer;">☰</span>
                <span style="cursor:pointer;">🔍</span>
            </div>
            <div class="right-icons">
                 <div class="logo">A</div>
            </div>
        </div>

        <div class="dashboard-container">
            <!-- Dashboard Header Section (Title and Button) -->
            <div class="header-section">
                <h1 class="header-title">Dashboard</h1>
                <button class="fund-wallet-btn">Fund Wallet</button>
            </div>

            <!-- Balances Section -->
            <div class="balances-section">
                <div class="section-title">Balances</div>
                <div class="balances-grid">
                    <div class="balance-card available">
                        <div class="balance-icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022z"/>
                            </svg>
                        </div>
                        <div class="balance-info">
                            <div class="label">Available Balance</div>
                            <div class="value">₦1.00</div>
                        </div>
                    </div>
                    <div class="balance-card volume">
                        <div class="balance-icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L11.293 8.5H5.5A.5.5 0 0 1 5 8z"/>
                            </svg>
                        </div>
                        <div class="balance-info">
                            <div class="label">Today's Volume</div>
                            <div class="value">0GB</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services Section -->
            <div class="services-section">
                <div class="services-grid">
                    <a href="#" class="service-card">
                        <div class="service-icon" style="background-color: #fce1ed">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#E91E63" viewBox="0 0 16 16">
                                <path d="M6 14.5a.5.5 0 0 1 .5-.5h3a.5.5 0 1 1 0 1h-3a.5.5 0 0 1-.5-.5z"/>
                                <path d="M13 1.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0V2a.5.5 0 0 1 .5-.5zM7.243 2.146a.5.5 0 0 1 .514 0l2.674 1.343a.5.5 0 1 1-.498.886l-2.675-1.343a.5.5 0 0 1-.016-.886z"/>
                                <path fill-rule="evenodd" d="M12.9 5.898a.5.5 0 0 1 .312.697l-2.675 4.646a.5.5 0 0 1-.886-.498l2.675-4.646a.5.5 0 0 1 .697-.312z"/>
                                <path fill-rule="evenodd" d="M3.205 10.244a.5.5 0 0 1 .697.313l2.675 4.646a.5.5 0 0 1-.886.498l-2.675-4.646a.5.5 0 0 1 .312-.697z"/>
                                <path d="M9.5 7.5a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V8a.5.5 0 0 1 .5-.5z"/>
                                <path fill-rule="evenodd" d="M12.923 11.238a.5.5 0 0 1-.313.696l-2.675 1.517a.5.5 0 0 1-.227-.884l2.675-1.517a.5.5 0 0 1 .313-.696z"/>
                                <path d="M3.077 11.238a.5.5 0 0 1-.313.696l-2.675 1.517a.5.5 0 0 1-.227-.884l2.675-1.517a.5.5 0 0 1 .313-.696z"/>
                            </svg>
                        </div>
                        <div class="service-text">Buy Data</div>
                    </a>
                    <a href="#" class="service-card">
                        <div class="service-icon" style="background-color: #fce1ed">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#E91E63" viewBox="0 0 16 16">
                                <path d="M1.5 13a.5.5 0 0 1 .5-.5H3a.5.5 0 0 1 0 1H2a.5.5 0 0 1-.5-.5zM12 13.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                                <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V7zm13 0v6a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1h-1a.5.5 0 0 1 0-1h1a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-1a.5.5 0 0 1 0-1h1zm-12 0H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h1a.5.5 0 0 1 0-1H2a.5.5 0 0 1-.5-.5V8a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0-1H2a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h12a2 2 0 0 1-2-2V7z"/>
                            </svg>
                        </div>
                        <div class="service-text">Buy Airtime</div>
                    </a>
                    <a href="#" class="service-card">
                        <div class="service-icon" style="background-color: #fce1ed">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#E91E63" viewBox="0 0 16 16">
                                <path d="M12.923 11.238a.5.5 0 0 1-.313.696l-2.675 1.517a.5.5 0 0 1-.227-.884l2.675-1.517a.5.5 0 0 1 .313-.696z"/>
                                <path d="M1.5 13a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zM12 13.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                                <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V7zm13 0v6a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1h-1a.5.5 0 0 1 0-1h1a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-1a.5.5 0 0 1 0-1h1zm-12 0H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h1a.5.5 0 0 1 0-1H2a.5.5 0 0 1-.5-.5V8a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0-1H2a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h12a2 2 0 0 1-2-2V7z"/>
                            </svg>
                        </div>
                        <div class="service-text">Cable Sub</div>
                    </a>
                    <a href="#" class="service-card">
                        <div class="service-icon" style="background-color: #fce1ed">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#E91E63" viewBox="0 0 16 16">
                                <path d="M12.923 11.238a.5.5 0 0 1-.313.696l-2.675 1.517a.5.5 0 0 1-.227-.884l2.675-1.517a.5.5 0 0 1 .313-.696z"/>
                                <path d="M1.5 13a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zM12 13.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                                <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V7zm13 0v6a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1h-1a.5.5 0 0 1 0-1h1a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-1a.5.5 0 0 1 0-1h1zm-12 0H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h1a.5.5 0 0 1 0-1H2a.5.5 0 0 1-.5-.5V8a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0-1H2a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h12a2 2 0 0 1-2-2V7z"/>
                            </svg>
                        </div>
                        <div class="service-text">Pay Bill</div>
                    </a>
                    <a href="#" class="service-card">
                        <div class="service-icon" style="background-color: #fce1ed">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#E91E63" viewBox="0 0 16 16">
                                <path d="M12.923 11.238a.5.5 0 0 1-.313.696l-2.675 1.517a.5.5 0 0 1-.227-.884l2.675-1.517a.5.5 0 0 1 .313-.696z"/>
                                <path d="M1.5 13a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zM12 13.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                                <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V7zm13 0v6a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1h-1a.5.5 0 0 1 0-1h1a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-1a.5.5 0 0 1 0-1h1zm-12 0H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h1a.5.5 0 0 1 0-1H2a.5.5 0 0 1-.5-.5V8a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0-1H2a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h12a2 2 0 0 1-2-2V7z"/>
                            </svg>
                        </div>
                        <div class="service-text">Data Card</div>
                    </a>
                    <a href="#" class="service-card">
                        <div class="service-icon" style="background-color: #fce1ed">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#E91E63" viewBox="0 0 16 16">
                                <path d="M12.923 11.238a.5.5 0 0 1-.313.696l-2.675 1.517a.5.5 0 0 1-.227-.884l2.675-1.517a.5.5 0 0 1 .313-.696z"/>
                                <path d="M1.5 13a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zM12 13.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                                <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V7zm13 0v6a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1h-1a.5.5 0 0 1 0-1h1a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-1a.5.5 0 0 1 0-1h1zm-12 0H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h1a.5.5 0 0 1 0-1H2a.5.5 0 0 1-.5-.5V8a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0-1H2a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h12a2 2 0 0 1-2-2V7z"/>
                            </svg>
                        </div>
                        <div class="service-text">Exam PIN</div>
                    </a>
                    <a href="#" class="service-card">
                        <div class="service-icon" style="background-color: #fce1ed">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#E91E63" viewBox="0 0 16 16">
                                <path d="M12.923 11.238a.5.5 0 0 1-.313.696l-2.675 1.517a.5.5 0 0 1-.227-.884l2.675-1.517a.5.5 0 0 1 .313-.696z"/>
                                <path d="M1.5 13a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zM12 13.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                                <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V7zm13 0v6a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1h-1a.5.5 0 0 1 0-1h1a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-1a.5.5 0 0 1 0-1h1zm-12 0H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h1a.5.5 0 0 1 0-1H2a.5.5 0 0 1-.5-.5V8a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0-1H2a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h12a2 2 0 0 1-2-2V7z"/>
                            </svg>
                        </div>
                        <div class="service-text">Transactions</div>
                    </a>
                    <a href="#" class="service-card">
                        <div class="service-icon" style="background-color: #fce1ed">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#E91E63" viewBox="0 0 16 16">
                                <path d="M12.923 11.238a.5.5 0 0 1-.313.696l-2.675 1.517a.5.5 0 0 1-.227-.884l2.675-1.517a.5.5 0 0 1 .313-.696z"/>
                                <path d="M1.5 13a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zM12 13.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                                <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V7zm13 0v6a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1h-1a.5.5 0 0 1 0-1h1a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-1a.5.5 0 0 1 0-1h1zm-12 0H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h1a.5.5 0 0 1 0-1H2a.5.5 0 0 1-.5-.5V8a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0-1H2a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h12a2 2 0 0 1-2-2V7z"/>
                            </svg>
                        </div>
                        <div class="service-text">Developer</div>
                    </a>
                </div>
            </div>

            <!-- Help Center Section -->
            <div class="help-center-section">
                <div class="help-center-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M5.255 5.786a.237.237 0 0 0 .241.051.868.868 0 1 1 1.491.139.754.754 0 0 0 1.25.792A.534.534 0 0 1 8 8c0 .414-.336.75-.75.75H6.525A.75.75 0 0 0 5.77 9.5h-.002A1.5 1.5 0 0 1 7.25 8c0-.687-.655-1.127-1.39-1.298-.242-.053-.454-.15-.454-.343a.65.65 0 0 1 .45-.634c.264-.075.47-.168.6-.263a.855.855 0 0 0 .19-.344.92.92 0 0 0-.256-.566.75.75 0 0 0-1.04-.085.92.92 0 0 0-.256.566.855.855 0 0 0 .19.344.65.65 0 0 1 .45.634c-.264.075-.47.168-.6.263-.13.095-.27.218-.46.368zM8 12a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                    </svg>
                    Help Center
                </div>
                <p class="help-center-text">
                    Need help figuring things out?<br>
                    Don't hesitate to send us an email at <a href="mailto:support1@aspfiy.com">support1@aspfiy.com</a> for fast resolutions.
                </p>
                <a href="#" class="help-link">
                    Help Center
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
                        <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    
    <script>
        function openNav() {
            document.getElementById("sidebar").style.width = "250px";
            document.getElementById("sidebar-overlay").style.display = "block";
        }
        
        function closeNav() {
            document.getElementById("sidebar").style.width = "0";
            document.getElementById("sidebar-overlay").style.display = "none";
        }
    </script>
</body>
</html>
