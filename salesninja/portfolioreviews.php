<style>
    /* ── Stat Cards (Diamond style) ──────────────────── */
    .portfolioreviews {

        /* ── Stat Cards ──────────────────────────────────── */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: #fff;
            border-radius: 12px;
            padding: 22px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
            min-height: 100px;
        }

        .stat-card--purple {
            border: 1.5px solid #ce93d8;
        }

        .stat-card--cyan {
            border: 1.5px solid #80deea;
        }

        .stat-card--red {
            border: 1.5px solid #ef9a9a;
        }

        .stat-card--green {
            border: 1.5px solid #a5d6a7;
        }

        .stat-text {
            position: relative;
            z-index: 1;
        }




        .diamond {
            width: 86px;
            height: 86px;
            border-radius: 12px;
            transform: rotate(45deg);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            position: absolute;
            right: -18px;
            top: 50%;
            translate: 0 -50%;
        }

        .diamond svg {
            transform: rotate(-45deg);
            display: block;
        }

        .stat-card--purple .diamond {
            background: rgba(206, 147, 216, 0.35);
        }

        .stat-card--cyan .diamond {
            background: rgba(128, 222, 234, 0.35);
        }

        .stat-card--red .diamond {
            background: rgba(239, 154, 154, 0.35);
        }

        .stat-card--green .diamond {
            background: rgba(165, 214, 167, 0.35);
        }


        /* ── Toolbar ─────────────────────────────────────── */
        .toolbar {
            display: flex;
            align-items: flex-end;
            justify-content: flex-end;
            gap: 14px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .search-box {
            display: flex;
            align-items: center;
            gap: 8px;
            border: 1px solid #dde1ea;
            border-radius: 8px;
            padding: 10px 14px;
            background: #fff;
            width: 260px;
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

        /* Sort By dropdown with label */
        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .filter-label {
            font-size: 12px;
            font-weight: 500;
            color: #8a8fa3;
        }

        .select-wrap {
            position: relative;
            display: inline-flex;
            align-items: center;
        }

        .select-wrap select {
            appearance: none;
            -webkit-appearance: none;
            border: 1.5px solid #dde1ea;
            border-radius: 8px;
            padding: 9px 36px 9px 14px;
            font-size: 13.5px;
            font-family: inherit;
            font-weight: 500;
            color: #333;
            background: #fff;
            cursor: pointer;
            outline: none;
            min-width: 120px;
        }

        .select-wrap .chevron {
            position: absolute;
            right: 10px;
            pointer-events: none;
        }

        .btn-filter-outline {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 22px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            background: #fff;
            border: 1.5px solid #dde1ea;
            color: #333;
            font-family: inherit;
            transition: background 0.15s;
            white-space: nowrap;
        }

        .btn-filter-outline:hover {
            background: #f5f6fa;
        }

        /* ── Table ───────────────────────────────────────── */
        .table-wrap {
            background: #fff;
            border: 1px solid #e8eaed;
            border-radius: 12px;
            overflow: hidden;
        }

        .table-scroll {
            overflow-x: hidden;
        }

        table {
            width: 100%;
            min-width: 1100px;
            border-collapse: collapse;
        }

        thead tr {
            background: #f8f9fc;
        }

        th {
            padding: 14px 16px;
            font-size: 12.5px;
            font-weight: 600;
            color: #8a8fa3;
            text-align: left;
            border-bottom: 1px solid #e8eaed;
            white-space: nowrap;
            text-transform: uppercase;
            letter-spacing: .3px;
        }

        td {
            padding: 14px 16px;
            font-size: 13.5px;
            color: #333;
            border-bottom: 1px solid #f0f2f5;
            vertical-align: middle;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover td {
            background: #fafbfe;
        }

        /* Badges */
        .badge {
            display: inline-block;
            padding: 5px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        /* Review Type */
        .badge--quarterly {
            background: #ede7f6;
            color: #7b1fa2;
            text-transform: uppercase;
            letter-spacing: .4px;
        }

        .badge--monthly {
            background: #e0f7fa;
            color: #0097a7;
            text-transform: uppercase;
            letter-spacing: .4px;
        }

        /* Review Status */
        .badge--scheduled {
            background: #e3f2fd;
            color: #1565c0;
        }

        .badge--complete {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .badge--overdue {
            background: #fce4ec;
            color: #c62828;
        }

        /* Action buttons */
        .actions {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .act-btn {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            background: none;
            transition: background 0.15s;
        }

        .act-btn:hover {
            background: #f0f2f5;
        }

        /* ── Responsive ──────────────────────────────────── */
        @media (max-width: 1200px) {

            .stat-row {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 1000px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .charts-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 860px) {


            .toolbar {
                justify-content: flex-start;
            }

            .search-box {
                width: 100%;
            }
        }

        @media (max-width: 640px) {
            .stat-row {
                gap: 12px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
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
            <h1>Portfolio Review</h1>
            <p class="breadcrumb">Dashboard &bull; Portfolio Review</p>
        </div>
    </header>

    <!-- ══ Stat Cards ══════════════════════════════════════ -->
    <div class="stats-grid">

        <!-- Total -->
        <div class="stat-card stat-card--purple">
            <div class="stat-text">
                <div class="stat-number">74</div>
                <div class="stat-label">Total Reviews</div>
            </div>
            <div class="diamond">
                <svg width="38" height="38" viewBox="0 0 26 26" fill="none">
                    <path d="M2 3.5a2 2 0 0 1 2-2h18a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H9.5l-4.5 3v-3H4a2 2 0 0 1-2-2V3.5z"
                        stroke="#9c27b0" stroke-width="1.5" />
                    <line x1="7" y1="8" x2="19" y2="8" stroke="#9c27b0" stroke-width="1.4" stroke-linecap="round" />
                    <line x1="7" y1="11" x2="14" y2="11" stroke="#9c27b0" stroke-width="1.4" stroke-linecap="round" />
                    <text x="3.5" y="24.5" fill="#9c27b0" font-size="6.5" font-family="Arial, sans-serif">&#9733;
                        &#9733; &#9733;</text>
                </svg>
            </div>
        </div>

        <!-- Pending -->
        <div class="stat-card stat-card--cyan">
            <div class="stat-text">
                <div class="stat-number">15</div>
                <div class="stat-label">Scheduled</div>
            </div>
            <div class="diamond">
                <svg width="38" height="38" viewBox="0 0 24 24" fill="none">
                    <path d="M3 12a9 9 0 1 0 9-9 9.76 9.76 0 0 0-6.72 2.72L3 8" stroke="#0097a7" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <polyline points="3 3 3 8 8 8" stroke="#0097a7" stroke-width="1.8" stroke-linecap="round"
                        stroke-linejoin="round" fill="none" />
                    <line x1="12" y1="8" x2="12" y2="12" stroke="#0097a7" stroke-width="1.8" stroke-linecap="round" />
                    <line x1="12" y1="12" x2="15" y2="14" stroke="#0097a7" stroke-width="1.8" stroke-linecap="round" />
                </svg>
            </div>
        </div>

        <!-- Overdue -->
        <div class="stat-card stat-card--red">
            <div class="stat-text">
                <div class="stat-number">27</div>
                <div class="stat-label">Overdue</div>
            </div>
            <div class="diamond">
                <svg width="38" height="38" viewBox="0 0 24 24" fill="none">
                    <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"
                        stroke="#e53935" stroke-width="1.8" stroke-linejoin="round" />
                    <line x1="12" y1="9" x2="12" y2="14" stroke="#e53935" stroke-width="2" stroke-linecap="round" />
                    <circle cx="12" cy="17.5" r="1.1" fill="#e53935" />
                </svg>
            </div>
        </div>

        <!-- Completed -->
        <div class="stat-card stat-card--green">
            <div class="stat-text">
                <div class="stat-number">32</div>
                <div class="stat-label">Completed</div>
            </div>
            <div class="diamond">
                <svg width="38" height="38" viewBox="0 0 24 24" fill="none">
                    <rect x="3" y="3" width="18" height="18" rx="3" stroke="#388e3c" stroke-width="1.8" />
                    <polyline points="7.5 12 11 15.5 17 9" stroke="#388e3c" stroke-width="2.2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>
        </div>

    </div><!-- /stats-grid -->


    <!-- ══ Toolbar (right-aligned) ══════════════════════════ -->
    <div class="toolbar">
        <div class="search-box">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#aab0c3" stroke-width="2.2"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>
            <input type="text" placeholder="Search...">
        </div>

        <div class="filter-group">
            <span class="filter-label">Sort By</span>
            <div class="select-wrap">
                <select>
                    <option>Latest</option>
                    <option>Oldest</option>
                    <option>Name A-Z</option>
                </select>
                <svg class="chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 12 15 18 9" />
                </svg>
            </div>
        </div>

        <button class="btn-filter-outline" style="align-self:flex-end;">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="2.2"
                stroke-linecap="round" stroke-linejoin="round">
                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
            </svg>
            Filters
        </button>
    </div>

    <!-- ══ Table ════════════════════════════════════════════ -->
    <div class="table-wrap">
        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th>Client Name</th>
                        <th>Last Review Date</th>
                        <th>Next Review Date</th>
                        <th>Review Type</th>
                        <th>Review Status</th>
                        <th>Assigned To</th>
                        <th>Creation Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>Aarav Sing</td>
                        <td>
                            <div>14 Feb 2026</div>
                            <div style="font-size:12px;color:#8a8fa3;">02:50 AM</div>
                        </td>
                        <td>
                            <div>17 Feb 2026</div>
                            <div style="font-size:12px;color:#8a8fa3;">11:00 AM</div>
                        </td>
                        <td><span class="badge badge--quarterly">Quarterly</span></td>
                        <td><span class="badge badge--scheduled">Scheduled</span></td>
                        <td>Rajvardhan Kuswah</td>
                        <td>
                            <div>15 Feb 2026</div>
                            <div style="font-size:12px;color:#8a8fa3;">12:00 PM</div>
                        </td>
                        <td>
                            <div class="actions">
                                <button class="act-btn" title="View">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                </button>
                                <button class="act-btn" title="Edit">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#1565c0"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                </button>
                                <button class="act-btn" title="Mark Complete">
                                    <svg width="17" height="17" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10" fill="#43a047" />
                                        <polyline points="8,12 11,15 16,9" fill="none" stroke="white" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <button class="act-btn" title="Schedule">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#e57373"
                                        stroke-width="1.8" stroke-linecap="round">
                                        <rect x="3" y="4" width="18" height="17" rx="3" />
                                        <line x1="3" y1="10" x2="21" y2="10" />
                                        <line x1="8" y1="2" x2="8" y2="6" />
                                        <line x1="16" y1="2" x2="16" y2="6" />
                                    </svg>
                                </button>
                                <button class="act-btn" title="Delete">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#e53935"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="3 6 5 6 21 6" />
                                        <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                        <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>Prithviraj</td>
                        <td>
                            <div>20 Feb 2026</div>
                            <div style="font-size:12px;color:#8a8fa3;">03:54 PM</div>
                        </td>
                        <td>
                            <div>21 Feb 2026</div>
                            <div style="font-size:12px;color:#8a8fa3;">06:20 PM</div>
                        </td>
                        <td><span class="badge badge--monthly">Monthly</span></td>
                        <td><span class="badge badge--complete">Complete</span></td>
                        <td>Veerangana</td>
                        <td>
                            <div>21 Feb 2026</div>
                            <div style="font-size:12px;color:#8a8fa3;">11:00 AM</div>
                        </td>
                        <td>
                            <div class="actions">
                                <button class="act-btn" title="View">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                </button>
                                <button class="act-btn" title="Edit">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#1565c0"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                </button>
                                <button class="act-btn" title="Mark Complete">
                                    <svg width="17" height="17" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10" fill="#43a047" />
                                        <polyline points="8,12 11,15 16,9" fill="none" stroke="white" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <button class="act-btn" title="Schedule">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#e57373"
                                        stroke-width="1.8" stroke-linecap="round">
                                        <rect x="3" y="4" width="18" height="17" rx="3" />
                                        <line x1="3" y1="10" x2="21" y2="10" />
                                        <line x1="8" y1="2" x2="8" y2="6" />
                                        <line x1="16" y1="2" x2="16" y2="6" />
                                    </svg>
                                </button>
                                <button class="act-btn" title="Delete">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#e53935"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="3 6 5 6 21 6" />
                                        <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                        <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>Saanvi Chouhan</td>
                        <td>
                            <div>01 Mar 2026</div>
                            <div style="font-size:12px;color:#8a8fa3;">10:00 AM</div>
                        </td>
                        <td>
                            <div>07 Mar 2026</div>
                            <div style="font-size:12px;color:#8a8fa3;">03:00 PM</div>
                        </td>
                        <td><span class="badge badge--quarterly">Quarterly</span></td>
                        <td><span class="badge badge--overdue">Overdue</span></td>
                        <td>Lakshya Veer Rajput</td>
                        <td>
                            <div>05 Mar 2026</div>
                            <div style="font-size:12px;color:#8a8fa3;">09:30 AM</div>
                        </td>
                        <td>
                            <div class="actions">
                                <button class="act-btn" title="View">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                </button>
                                <button class="act-btn" title="Edit">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#1565c0"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                </button>
                                <button class="act-btn" title="Mark Complete">
                                    <svg width="17" height="17" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10" fill="#43a047" />
                                        <polyline points="8,12 11,15 16,9" fill="none" stroke="white" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <button class="act-btn" title="Schedule">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#e57373"
                                        stroke-width="1.8" stroke-linecap="round">
                                        <rect x="3" y="4" width="18" height="17" rx="3" />
                                        <line x1="3" y1="10" x2="21" y2="10" />
                                        <line x1="8" y1="2" x2="8" y2="6" />
                                        <line x1="16" y1="2" x2="16" y2="6" />
                                    </svg>
                                </button>
                                <button class="act-btn" title="Delete">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#e53935"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="3 6 5 6 21 6" />
                                        <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                        <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>Devika Sharma</td>
                        <td>
                            <div>10 Mar 2026</div>
                            <div style="font-size:12px;color:#8a8fa3;">09:00 AM</div>
                        </td>
                        <td>
                            <div>15 Mar 2026</div>
                            <div style="font-size:12px;color:#8a8fa3;">02:00 PM</div>
                        </td>
                        <td><span class="badge badge--monthly">Monthly</span></td>
                        <td><span class="badge badge--scheduled">Scheduled</span></td>
                        <td>Rajvardhan Kuswah</td>
                        <td>
                            <div>12 Mar 2026</div>
                            <div style="font-size:12px;color:#8a8fa3;">10:15 AM</div>
                        </td>
                        <td>
                            <div class="actions">
                                <button class="act-btn" title="View">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                </button>
                                <button class="act-btn" title="Edit">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#1565c0"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                </button>
                                <button class="act-btn" title="Mark Complete">
                                    <svg width="17" height="17" viewBox="0 0 24 24">
                                        <circle cx="12" cy="12" r="10" fill="#43a047" />
                                        <polyline points="8,12 11,15 16,9" fill="none" stroke="white" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <button class="act-btn" title="Schedule">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#e57373"
                                        stroke-width="1.8" stroke-linecap="round">
                                        <rect x="3" y="4" width="18" height="17" rx="3" />
                                        <line x1="3" y1="10" x2="21" y2="10" />
                                        <line x1="8" y1="2" x2="8" y2="6" />
                                        <line x1="16" y1="2" x2="16" y2="6" />
                                    </svg>
                                </button>
                                <button class="act-btn" title="Delete">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#e53935"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="3 6 5 6 21 6" />
                                        <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                        <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div><!-- /table-scroll -->
    </div><!-- /table-wrap -->

</div><!-- /wrapper -->