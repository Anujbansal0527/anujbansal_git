<style>
    .followups {
        .stat-row {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 14px;
            margin-bottom: 22px;
        }

        .stat-card {
            background: #fff;
            border: 1px solid #e8eaed;
            border-radius: 10px;
            padding: 16px 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .stat-num {
            font-size: 22px;
            font-weight: 700;
            color: #1a1a2e;
            line-height: 1.1;
        }

        .stat-lbl {
            font-size: 12.5px;
            color: #8a8fa3;
            margin-top: 5px;
            font-weight: 400;
        }

        /* Circular icon */
        .stat-circle {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .stat-circle--tan {
            background: #fff3e0;
        }

        .stat-circle--teal {
            background: #e0f7fa;
        }

        .stat-circle--gray {
            background: #f0f2f5;
        }

        .stat-circle--salmon {
            background: #fce4ec;
        }

        .stat-circle--green {
            background: #e8f5e9;
        }

        /* ── Toolbar ─────────────────────────────────────── */
        .toolbar {
            display: flex;
            align-items: flex-end;
            gap: 12px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        /* Search */
        .search-box {
            display: flex;
            align-items: center;
            gap: 8px;
            border: 1px solid #dde1ea;
            border-radius: 8px;
            padding: 10px 14px;
            background: #fff;
            flex: 1;
            min-width: 200px;
            max-width: 360px;
        }

        .search-box input {
            border: none;
            outline: none;
            font-size: 14px;
            font-family: inherit;
            width: 100%;
            background: transparent;
            color: #555;
        }

        .search-box input::placeholder {
            color: #b0b5c4;
        }

        /* Dropdown groups */
        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .filter-label {
            font-size: 11.5px;
            color: #8a8fa3;
            font-weight: 500;
            padding-left: 2px;
        }

        .select-wrap {
            position: relative;
            display: flex;
            align-items: center;
        }

        .select-wrap select {
            appearance: none;
            -webkit-appearance: none;
            border: 1px solid #dde1ea;
            border-radius: 8px;
            padding: 9px 36px 9px 14px;
            font-size: 13.5px;
            font-family: inherit;
            font-weight: 500;
            background: #fff;
            color: #1a1a2e;
            cursor: pointer;
            outline: none;
            min-width: 140px;
        }

        .select-wrap select:focus {
            border-color: #9575cd;
        }

        .select-wrap .chevron {
            position: absolute;
            right: 10px;
            pointer-events: none;
        }

        /* Toolbar buttons */
        .tb-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 13.5px;
            font-weight: 500;
            cursor: pointer;
            border: 1px solid #dde1ea;
            background: #fff;
            color: #333;
            font-family: inherit;
            transition: background 0.15s;
            white-space: nowrap;
        }

        .tb-btn:hover {
            background: #f5f6fa;
        }

        .tb-btn--active {
            background: #f0f2f5;
            border-color: #cfd3dc;
        }

        /* ── Table Container ─────────────────────────────── */
        .table-container {
            background: #f5f7fa;
            border-radius: 12px;
            overflow: hidden;
        }

        .table-overflow {
            overflow-x: hidden;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1100px;
        }

        .data-table thead tr {
            background: #f0f2f5;
        }

        .data-table thead th {
            padding: 14px 16px;
            text-align: left;
            font-size: 13px;
            font-weight: 600;
            color: #555e7b;
            white-space: nowrap;
        }

        .data-table tbody tr {
            background: #fff;
            border-top: 1px solid #f0f2f5;
            transition: background 0.15s;
        }

        .data-table tbody tr:hover {
            background: #fafbfc;
        }

        .data-table tbody td {
            padding: 18px 16px;
            font-size: 13.5px;
            color: #2d3148;
            vertical-align: middle;
        }

        /* Type icon cell */
        .type-icon {
            width: 38px;
            height: 38px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .type-icon--green {
            background: #e8f5e9;
        }

        .type-icon--yellow {
            background: #fffde7;
        }

        /* Lead Name link */
        .lead-link {
            color: #1565c0;
            font-weight: 500;
            text-decoration: none;
            white-space: nowrap;
        }

        .lead-link:hover {
            text-decoration: underline;
        }

        /* Lead Status badges */
        .ls-badge {
            display: inline-block;
            padding: 4px 14px;
            border-radius: 6px;
            font-size: 12.5px;
            font-weight: 500;
            white-space: nowrap;
        }

        .ls-contact {
            background: #fff8e1;
            color: #e65100;
        }

        .ls-demo {
            background: #e8eaf6;
            color: #3949ab;
        }

        .ls-new {
            background: #ede7f6;
            color: #7b1fa2;
        }

        .ls-prospect {
            background: #e0f7fa;
            color: #00838f;
        }

        .ls-meeting {
            background: #e8f5e9;
            color: #2e7d32;
        }

        /* PENDING status badge */
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 6px;
            font-size: 11.5px;
            font-weight: 600;
            letter-spacing: 0.4px;
            white-space: nowrap;
        }

        .status-pending {
            background: #fff3e0;
            color: #e65100;
        }

        .status-done {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .status-overdue {
            background: #fce4ec;
            color: #c62828;
        }

        /* Contact cell */
        .contact-num {
            white-space: nowrap;
        }

        /* Activity cell */
        .activity-btn {
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.15s;
        }

        .activity-btn:hover {
            background: #f0f2f5;
        }

        /* Actions cell */
        .actions-btn {
            background: none;
            border: none;
            cursor: pointer;
            padding: 6px 8px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.15s;
            gap: 3px;
        }

        .actions-btn:hover {
            background: #f0f2f5;
        }

        .actions-btn .vdot {
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background: #8a8fa3;
            display: block;
        }

        /* ── Responsive ──────────────────────────────────── */
        @media (max-width: 1100px) {


            .stat-row {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 700px) {


            .stat-row {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }

            .toolbar {
                flex-wrap: wrap;
            }

            .search-box {
                max-width: 100%;
                flex: 1 1 100%;
            }
        }

        @media (max-width: 420px) {
            .stat-row {
                grid-template-columns: 1fr;
            }
        }
    }
</style>

<div class="wrapper">

    <!-- ══ Header ══════════════════════════════════════════ -->
    <header class="page-header">
        <div class="page-title">
            <h1>Follow-ups</h1>
            <p class="breadcrumb">Dashboard &bull; <span class="crumb-active">Follow-ups</span></p>
        </div>
    </header>

    <!-- ══ Stat Cards ══════════════════════════════════════ -->
    <div class="stat-row">

        <!-- Total Follow Ups -->
        <div class="stat-card">
            <div>
                <div class="stat-num">94</div>
                <div class="stat-lbl">Total Follow Ups</div>
            </div>
            <div class="stat-circle stat-circle--tan">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="#f57c00">
                    <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5z
                   M12 14c-3.337 0-10 1.676-10 5v2h20v-2c0-3.324-6.663-5-10-5z" />
                </svg>
            </div>
        </div>

        <!-- Today -->
        <div class="stat-card">
            <div>
                <div class="stat-num">16</div>
                <div class="stat-lbl">Today</div>
            </div>
            <div class="stat-circle stat-circle--teal">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                    <rect x="3" y="4" width="18" height="17" rx="3" stroke="#0097a7" stroke-width="1.8" />
                    <line x1="3" y1="10" x2="21" y2="10" stroke="#0097a7" stroke-width="1.8" />
                    <line x1="8" y1="2" x2="8" y2="6" stroke="#0097a7" stroke-width="2" stroke-linecap="round" />
                    <line x1="16" y1="2" x2="16" y2="6" stroke="#0097a7" stroke-width="2" stroke-linecap="round" />
                    <rect x="7" y="13" width="4" height="4" rx="1" fill="#0097a7" />
                </svg>
            </div>
        </div>

        <!-- Upcoming -->
        <div class="stat-card">
            <div>
                <div class="stat-num">27</div>
                <div class="stat-lbl">Upcoming</div>
            </div>
            <div class="stat-circle stat-circle--gray">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="12" r="9" stroke="#757575" stroke-width="1.8" />
                    <line x1="12" y1="7" x2="12" y2="12" stroke="#757575" stroke-width="2" stroke-linecap="round" />
                    <line x1="12" y1="12" x2="16" y2="14" stroke="#757575" stroke-width="1.8" stroke-linecap="round" />
                </svg>
            </div>
        </div>

        <!-- Overdue -->
        <div class="stat-card">
            <div>
                <div class="stat-num">44</div>
                <div class="stat-lbl">Overdue</div>
            </div>
            <div class="stat-circle stat-circle--salmon">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                    <rect x="4" y="3" width="13" height="17" rx="2" stroke="#e53935" stroke-width="1.8" />
                    <line x1="8" y1="8" x2="13" y2="8" stroke="#e53935" stroke-width="1.5" stroke-linecap="round" />
                    <line x1="8" y1="11" x2="13" y2="11" stroke="#e53935" stroke-width="1.5" stroke-linecap="round" />
                    <line x1="8" y1="14" x2="11" y2="14" stroke="#e53935" stroke-width="1.5" stroke-linecap="round" />
                    <circle cx="18" cy="18" r="4" fill="#e53935" />
                    <line x1="18" y1="16.5" x2="18" y2="18.2" stroke="white" stroke-width="1.4"
                        stroke-linecap="round" />
                    <circle cx="18" cy="19.5" r="0.7" fill="white" />
                </svg>
            </div>
        </div>

        <!-- Completed -->
        <div class="stat-card">
            <div>
                <div class="stat-num">10</div>
                <div class="stat-lbl">Completed</div>
            </div>
            <div class="stat-circle stat-circle--green">
                <svg width="22" height="22" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" fill="#43a047" />
                    <polyline points="7 12.5 10.5 16 17 9" fill="none" stroke="white" stroke-width="2.3"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
        </div>

    </div><!-- /stat-row -->

    <!-- ══ Toolbar ══════════════════════════════════════════ -->
    <div class="toolbar">

        <!-- Search -->
        <div class="search-box">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#aab0c3" stroke-width="2.2"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>
            <input type="text" placeholder="Search...">
        </div>

        <!-- Status dropdown -->
        <div class="filter-group">
            <span class="filter-label">Status</span>
            <div class="select-wrap">
                <select>
                    <option>Today</option>
                    <option>Upcoming</option>
                    <option>Overdue</option>
                    <option>Completed</option>
                    <option>All</option>
                </select>
                <svg class="chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#888"
                    stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9" />
                </svg>
            </div>
        </div>

        <!-- Assigned To dropdown -->
        <div class="filter-group">
            <span class="filter-label">Assigned To</span>
            <div class="select-wrap">
                <select>
                    <option>Vijay Raj</option>
                    <option>Priti Rajput</option>
                    <option>Navneet</option>
                    <option>Nirmal Singh</option>
                    <option>Jitu Maharaj</option>
                </select>
                <svg class="chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#888"
                    stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9" />
                </svg>
            </div>
        </div>

        <!-- Filter button -->
        <button class="tb-btn">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="2.2"
                stroke-linecap="round" stroke-linejoin="round">
                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
            </svg>
            Filter
        </button>

        <!-- Table button (active) -->
        <button class="tb-btn tb-btn--active">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <line x1="8" y1="6" x2="21" y2="6" />
                <line x1="8" y1="12" x2="21" y2="12" />
                <line x1="8" y1="18" x2="21" y2="18" />
                <line x1="3" y1="6" x2="3.01" y2="6" />
                <line x1="3" y1="12" x2="3.01" y2="12" />
                <line x1="3" y1="18" x2="3.01" y2="18" />
            </svg>
            Table
        </button>

        <!-- Card button -->
        <button class="tb-btn">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="7" height="7" rx="1" />
                <rect x="14" y="3" width="7" height="7" rx="1" />
                <rect x="3" y="14" width="7" height="7" rx="1" />
                <rect x="14" y="14" width="7" height="7" rx="1" />
            </svg>
            Card
        </button>

    </div><!-- /toolbar -->

    <!-- ══ Table ════════════════════════════════════════════ -->
    <div class="table-container">
        <div class="table-overflow">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Lead Name</th>
                        <th>Lead Status</th>
                        <th>Contact details</th>
                        <th>Subject / Notes</th>
                        <th>Due Date &amp; Time</th>
                        <th>Status</th>
                        <th>Assigned To</th>
                        <th>Activity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <!-- Row 1: Shivani Rai -->
                    <tr>
                        <td>
                            <div class="type-icon type-icon--green">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 1.27h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.82a16 16 0 0 0 6.29 6.29l.92-.92a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7a2 2 0 0 1 1.72 2.02z"
                                        fill="#43a047" />
                                </svg>
                            </div>
                        </td>
                        <td><a href="#" class="lead-link">Shivani Rai</a></td>
                        <td><span class="ls-badge ls-contact">Contact</span></td>
                        <td class="contact-num">9354521434</td>
                        <td>Callback</td>
                        <td>30 Jan 2026, 11:33 PM</td>
                        <td><span class="status-badge status-pending">PENDING</span></td>
                        <td>Priti Rajput</td>
                        <td>
                            <button class="activity-btn" title="Activity log">
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                    stroke-width="1.8" stroke-linecap="round">
                                    <circle cx="12" cy="12" r="9" />
                                    <line x1="12" y1="7" x2="12" y2="12" />
                                    <line x1="12" y1="12" x2="15.5" y2="14.5" />
                                </svg>
                            </button>
                        </td>
                        <td>
                            <button class="actions-btn">
                                <span class="vdot"></span>
                                <span class="vdot"></span>
                                <span class="vdot"></span>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 2: Dilip Gupta -->
                    <tr>
                        <td>
                            <div class="type-icon type-icon--yellow">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="#f57c00">
                                    <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5z
                           M12 14c-3.337 0-10 1.676-10 5v2h20v-2c0-3.324-6.663-5-10-5z" />
                                </svg>
                            </div>
                        </td>
                        <td><a href="#" class="lead-link">Dilip Gupta</a></td>
                        <td><span class="ls-badge ls-demo">Demo Done</span></td>
                        <td class="contact-num">6263589632</td>
                        <td>&mdash;</td>
                        <td>26 Mar 2026, 05:30 AM</td>
                        <td><span class="status-badge status-pending">PENDING</span></td>
                        <td>Navneet</td>
                        <td>
                            <button class="activity-btn" title="Activity log">
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                    stroke-width="1.8" stroke-linecap="round">
                                    <circle cx="12" cy="12" r="9" />
                                    <line x1="12" y1="7" x2="12" y2="12" />
                                    <line x1="12" y1="12" x2="15.5" y2="14.5" />
                                </svg>
                            </button>
                        </td>
                        <td>
                            <button class="actions-btn">
                                <span class="vdot"></span>
                                <span class="vdot"></span>
                                <span class="vdot"></span>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 3: Rajendra Raj -->
                    <tr>
                        <td>
                            <div class="type-icon type-icon--yellow">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="#f57c00">
                                    <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5z
                           M12 14c-3.337 0-10 1.676-10 5v2h20v-2c0-3.324-6.663-5-10-5z" />
                                </svg>
                            </div>
                        </td>
                        <td><a href="#" class="lead-link">Rajendra Raj</a></td>
                        <td><span class="ls-badge ls-new">New</span></td>
                        <td class="contact-num">8856932145</td>
                        <td>&mdash;</td>
                        <td>09 May 2026, 07:30 AM</td>
                        <td><span class="status-badge status-pending">PENDING</span></td>
                        <td>Nirmal Singh</td>
                        <td>
                            <button class="activity-btn" title="Activity log">
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                    stroke-width="1.8" stroke-linecap="round">
                                    <circle cx="12" cy="12" r="9" />
                                    <line x1="12" y1="7" x2="12" y2="12" />
                                    <line x1="12" y1="12" x2="15.5" y2="14.5" />
                                </svg>
                            </button>
                        </td>
                        <td>
                            <button class="actions-btn">
                                <span class="vdot"></span>
                                <span class="vdot"></span>
                                <span class="vdot"></span>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 4: Gopal singh -->
                    <tr>
                        <td>
                            <div class="type-icon type-icon--green">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 1.27h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.82a16 16 0 0 0 6.29 6.29l.92-.92a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7a2 2 0 0 1 1.72 2.02z"
                                        fill="#43a047" />
                                </svg>
                            </div>
                        </td>
                        <td><a href="#" class="lead-link">Gopal singh</a></td>
                        <td><span class="ls-badge ls-contact">Contact</span></td>
                        <td class="contact-num">9006932145</td>
                        <td>&mdash;</td>
                        <td>16 Mar 2026, 12:00 PM</td>
                        <td><span class="status-badge status-pending">PENDING</span></td>
                        <td>Jitu Maharaj</td>
                        <td>
                            <button class="activity-btn" title="Activity log">
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                    stroke-width="1.8" stroke-linecap="round">
                                    <circle cx="12" cy="12" r="9" />
                                    <line x1="12" y1="7" x2="12" y2="12" />
                                    <line x1="12" y1="12" x2="15.5" y2="14.5" />
                                </svg>
                            </button>
                        </td>
                        <td>
                            <button class="actions-btn">
                                <span class="vdot"></span>
                                <span class="vdot"></span>
                                <span class="vdot"></span>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 5: Meena Sharma -->
                    <!-- <tr>
                        <td>
                            <div class="type-icon type-icon--yellow">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="#f57c00">
                                    <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5z
                           M12 14c-3.337 0-10 1.676-10 5v2h20v-2c0-3.324-6.663-5-10-5z" />
                                </svg>
                            </div>
                        </td>
                        <td><a href="#" class="lead-link">Meena Sharma</a></td>
                        <td><span class="ls-badge ls-meeting">Meeting Done</span></td>
                        <td class="contact-num">7745123698</td>
                        <td>Follow up call</td>
                        <td>20 Apr 2026, 10:00 AM</td>
                        <td><span class="status-badge status-done">DONE</span></td>
                        <td>Priti Rajput</td>
                        <td>
                            <button class="activity-btn" title="Activity log">
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                    stroke-width="1.8" stroke-linecap="round">
                                    <circle cx="12" cy="12" r="9" />
                                    <line x1="12" y1="7" x2="12" y2="12" />
                                    <line x1="12" y1="12" x2="15.5" y2="14.5" />
                                </svg>
                            </button>
                        </td>
                        <td>
                            <button class="actions-btn">
                                <span class="vdot"></span>
                                <span class="vdot"></span>
                                <span class="vdot"></span>
                            </button>
                        </td>
                    </tr> -->

                    <!-- Row 6: Anil Verma -->
                    <!-- <tr>
                        <td>
                            <div class="type-icon type-icon--green">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 1.27h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.82a16 16 0 0 0 6.29 6.29l.92-.92a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7a2 2 0 0 1 1.72 2.02z"
                                        fill="#43a047" />
                                </svg>
                            </div>
                        </td>
                        <td><a href="#" class="lead-link">Anil Verma</a></td>
                        <td><span class="ls-badge ls-prospect">Prospect</span></td>
                        <td class="contact-num">9812345670</td>
                        <td>Negotiation call</td>
                        <td>02 Jun 2026, 03:15 PM</td>
                        <td><span class="status-badge status-overdue">OVERDUE</span></td>
                        <td>Navneet</td>
                        <td>
                            <button class="activity-btn" title="Activity log">
                                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                    stroke-width="1.8" stroke-linecap="round">
                                    <circle cx="12" cy="12" r="9" />
                                    <line x1="12" y1="7" x2="12" y2="12" />
                                    <line x1="12" y1="12" x2="15.5" y2="14.5" />
                                </svg>
                            </button>
                        </td>
                        <td>
                            <button class="actions-btn">
                                <span class="vdot"></span>
                                <span class="vdot"></span>
                                <span class="vdot"></span>
                            </button>
                        </td>
                    </tr> -->

                </tbody>
            </table>
        </div>
    </div><!-- /table-container -->

</div><!-- /wrapper -->