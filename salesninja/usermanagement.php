<style>
    /* ── Reset ─────────────────────────────────────────── */



    /* ── Page Header ────────────────────────────────────── */

    .usermanagement {

        .header-actions {
            display: flex;
            gap: 12px;
            align-items: center;
            flex-shrink: 0;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 22px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            border: none;
            outline: none;
            transition: background 0.18s, border-color 0.18s;
            white-space: nowrap;
        }

        .btn-outline {
            background: #ffffff;
            border: 1.5px solid #dde1ea;
            color: #333;
        }

        .btn-outline:hover {
            background: #f5f6fa;
            border-color: #ccc;
        }

        .btn-primary {
            background: #e53935;
            color: #fff;
            font-weight: 600;
            border: 1.5px solid transparent;
        }

        .btn-primary:hover {
            background: #c62828;
        }

        /* ── Stat Cards ─────────────────────────────────────── */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: #fff;
            border-radius: 12px;
            padding: 28px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
            min-height: 115px;
        }

        .stat-card--blue {
            border: 1.5px solid #90caf9;
        }

        .stat-card--green {
            border: 1.5px solid #81c784;
        }

        .stat-card--red {
            border: 1.5px solid #ef9a9a;
        }

        .stat-text {
            position: relative;
            z-index: 1;
        }





        /* Diamond shape */
        .diamond {
            width: 96px;
            height: 96px;
            border-radius: 14px;
            transform: rotate(45deg);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            position: absolute;
            right: -22px;
            top: 50%;
            translate: 0 -50%;
        }

        .diamond svg {
            transform: rotate(-45deg);
            display: block;
        }

        .stat-card--blue .diamond {
            background: rgba(144, 202, 249, 0.38);
        }

        .stat-card--green .diamond {
            background: rgba(129, 199, 132, 0.38);
        }

        .stat-card--red .diamond {
            background: rgba(239, 154, 154, 0.38);
        }

        /* ── Table Card ─────────────────────────────────────── */
        .table-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
        }

        .table-toolbar {
            display: flex;
            justify-content: flex-end;
            padding: 20px 24px 16px;
        }

        .search-box {
            display: flex;
            align-items: center;
            gap: 8px;
            border: 1.5px solid #dde1ea;
            border-radius: 8px;
            padding: 9px 14px;
            width: 260px;
            background: #fff;
        }

        .search-box input {
            border: none;
            outline: none;
            font-size: 14px;
            width: 100%;
            color: #555;
            background: transparent;
        }

        .search-box input::placeholder {
            color: #b0b5c4;
        }

        /* ── Data Table ─────────────────────────────────────── */
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table thead tr {
            background: #f5f6fa;
        }

        .data-table thead th {
            padding: 14px 20px;
            text-align: left;
            font-size: 13.5px;
            font-weight: 600;
            color: #555e7b;
            white-space: nowrap;
        }

        .data-table thead th:first-child {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .data-table tbody tr {
            border-top: 1px solid #f0f2f5;
        }

        .data-table tbody tr:hover {
            background: #fafbfc;
        }

        .data-table tbody td {
            padding: 18px 20px;
            font-size: 14px;
            color: #2d3148;
            vertical-align: middle;
        }

        /* User column – checkbox + name together */
        .user-cell {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .user-name {
            font-weight: 500;
            white-space: nowrap;
        }

        /* Checkbox */
        input[type="checkbox"].cb {
            width: 17px;
            height: 17px;
            cursor: pointer;
            accent-color: #e53935;
            flex-shrink: 0;
        }

        /* Email cell */
        .email-main {
            font-weight: 500;
            color: #1a1a2e;
        }

        .phone-sub {
            font-size: 12.5px;
            color: #9099b5;
            margin-top: 3px;
        }

        /* Date cell */
        .date-main {
            font-weight: 600;
            font-size: 14px;
        }

        .date-time {
            font-size: 13px;
            color: #555e7b;
            margin-top: 3px;
        }

        .c-orange {
            color: #f57c00;
        }

        .c-red {
            color: #e53935;
        }

        /* Toggle switch */
        .toggle {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 27px;
        }

        .toggle input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-track {
            position: absolute;
            cursor: pointer;
            inset: 0;
            background: #cfd3dc;
            border-radius: 27px;
            transition: background 0.25s;
        }

        .toggle-track::after {
            content: '';
            position: absolute;
            width: 21px;
            height: 21px;
            left: 3px;
            top: 3px;
            background: #fff;
            border-radius: 50%;
            box-shadow: 0 1px 4px rgba(0, 0, 0, .22);
            transition: transform 0.25s;
        }

        .toggle input:checked+.toggle-track {
            background: #43a047;
        }

        .toggle input:checked+.toggle-track::after {
            transform: translateX(23px);
        }

        /* Action buttons */
        .action-btn {
            background: none;
            border: none;
            cursor: pointer;
            padding: 6px 8px;
            border-radius: 6px;
            transition: background 0.15s;
            vertical-align: middle;
            line-height: 0;
        }

        .action-btn:hover {
            background: #f0f2f5;
        }

        /* ── Responsive ─────────────────────────────────────── */
        @media (max-width: 1100px) {
            .wrapper {
                padding: 28px 24px;
            }
        }

        @media (max-width: 860px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 640px) {
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 14px;
            }

            .page-header {
                flex-direction: column;
                gap: 14px;
                margin-bottom: 24px;
            }

            .header-actions {
                width: 100%;
                justify-content: flex-end;
            }

            .search-box {
                width: 100%;
            }

            .table-toolbar {
                padding: 14px 16px 12px;
            }

            .table-overflow {
                overflow-x: hidden;
            }

            .data-table {
                min-width: 580px;
            }
        }

        @media (max-width: 420px) {
            .wrapper {
                padding: 18px 14px;
            }

            .btn {
                padding: 9px 14px;
                font-size: 13px;
            }


        }
    }
</style>
<div class="wrapper">

    <!-- ══ Page Header ══════════════════════════════════════ -->
    <header class="page-header">
        <div class="page-title">
            <h1>User Managment</h1>
            <p class="breadcrumb">Dashboard &bull; <span class="crumb-active">User Managment</span></p>
        </div>
        <div class="header-actions">
            <button class="btn btn-outline">
                <!-- Funnel icon -->
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="2.2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
                </svg>
                Filters
            </button>
            <button class="btn btn-primary">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.8"
                    stroke-linecap="round">
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
                Add User
            </button>
        </div>
    </header>

    <!-- ══ Stat Cards ═══════════════════════════════════════ -->
    <div class="stats-grid">

        <!-- Total Users -->
        <div class="stat-card stat-card--blue">
            <div class="stat-text">
                <div class="stat-number">29</div>
                <div class="stat-label">Total User</div>
            </div>
            <div class="diamond">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="#1565c0">
                    <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5z
                     M12 14c-3.337 0-10 1.676-10 5v2h20v-2c0-3.324-6.663-5-10-5z" />
                </svg>
            </div>
        </div>

        <!-- Active Users -->
        <div class="stat-card stat-card--green">
            <div class="stat-text">
                <div class="stat-number">11</div>
                <div class="stat-label">User Active</div>
            </div>
            <div class="diamond">
                <svg width="40" height="40" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" fill="#2e7d32" />
                    <polyline points="7.5 12.5 10.5 15.5 16.5 9" stroke="#fff" stroke-width="2.3" stroke-linecap="round"
                        stroke-linejoin="round" fill="none" />
                </svg>
            </div>
        </div>

        <!-- Inactive Users -->
        <div class="stat-card stat-card--red">
            <div class="stat-text">
                <div class="stat-number">18</div>
                <div class="stat-label">Inactive User</div>
            </div>
            <div class="diamond">
                <svg width="42" height="40" viewBox="0 0 26 24">
                    <path d="M10 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5z
                     M10 14c-3.337 0-10 1.676-10 5v2h20v-2c0-3.324-6.663-5-10-5z" fill="#c62828" />
                    <line x1="19" y1="5" x2="25" y2="11" stroke="#c62828" stroke-width="2.4" stroke-linecap="round" />
                    <line x1="25" y1="5" x2="19" y2="11" stroke="#c62828" stroke-width="2.4" stroke-linecap="round" />
                </svg>
            </div>
        </div>

    </div>

    <!-- ══ Table Card ════════════════════════════════════════ -->
    <div class="table-card">

        <div class="table-toolbar">
            <div class="search-box">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#aab0c3" stroke-width="2.2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>
                <input type="text" placeholder="Search...">
            </div>
        </div>

        <div class="table-overflow">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" class="cb">
                            User
                        </th>
                        <th>Email</th>
                        <th>Joined On</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <!-- ── Row 1 ── -->
                    <tr>
                        <td>
                            <div class="user-cell">
                                <input type="checkbox" class="cb">
                                <span class="user-name">Aarav Sharma</span>
                            </div>
                        </td>
                        <td>
                            <div class="email-main">aarav4515@gmail.com</div>
                            <div class="phone-sub">7354521434</div>
                        </td>
                        <td>
                            <div class="date-main c-orange">14 Feb 2026</div>
                            <div class="date-time">02: 50 AM</div>
                        </td>
                        <td>
                            <label class="toggle">
                                <input type="checkbox" checked>
                                <span class="toggle-track"></span>
                            </label>
                        </td>
                        <td>
                            <button class="action-btn" title="Edit">
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#1565c0"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                </svg>
                            </button>
                            <button class="action-btn" title="Delete">
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#e53935"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="3 6 5 6 21 6" />
                                    <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                    <line x1="10" y1="11" x2="10" y2="17" />
                                    <line x1="14" y1="11" x2="14" y2="17" />
                                    <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                                </svg>
                            </button>
                        </td>
                    </tr>

                    <!-- ── Row 2 ── -->
                    <tr>
                        <td>
                            <div class="user-cell">
                                <input type="checkbox" class="cb">
                                <span class="user-name">Reyansh Gupta</span>
                            </div>
                        </td>
                        <td>
                            <div class="email-main">reyansgupta2303@gmail.com</div>
                            <div class="phone-sub">900906523</div>
                        </td>
                        <td>
                            <div class="date-main c-orange">25 Feb 2026</div>
                            <div class="date-time">00: 00 AM</div>
                        </td>
                        <td>
                            <label class="toggle">
                                <input type="checkbox" checked>
                                <span class="toggle-track"></span>
                            </label>
                        </td>
                        <td>
                            <button class="action-btn" title="Edit">
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#1565c0"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                </svg>
                            </button>
                            <button class="action-btn" title="Delete">
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#e53935"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="3 6 5 6 21 6" />
                                    <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                    <line x1="10" y1="11" x2="10" y2="17" />
                                    <line x1="14" y1="11" x2="14" y2="17" />
                                    <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                                </svg>
                            </button>
                        </td>
                    </tr>

                    <!-- ── Row 3 ── -->
                    <tr>
                        <td>
                            <div class="user-cell">
                                <input type="checkbox" class="cb">
                                <span class="user-name">Sai Kumar</span>
                            </div>
                        </td>
                        <td>
                            <div class="email-main">saikumar78@gmail.com</div>
                            <div class="phone-sub">8876543210</div>
                        </td>
                        <td>
                            <div class="date-main c-red">30 Mar 2026</div>
                            <div class="date-time">10: 33 PM</div>
                        </td>
                        <td>
                            <label class="toggle">
                                <input type="checkbox" checked>
                                <span class="toggle-track"></span>
                            </label>
                        </td>
                        <td>
                            <button class="action-btn" title="Edit">
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#1565c0"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                </svg>
                            </button>
                            <button class="action-btn" title="Delete">
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#e53935"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="3 6 5 6 21 6" />
                                    <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                    <line x1="10" y1="11" x2="10" y2="17" />
                                    <line x1="14" y1="11" x2="14" y2="17" />
                                    <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                                </svg>
                            </button>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div><!-- /table-overflow -->

    </div><!-- /table-card -->

</div><!-- /wrapper -->