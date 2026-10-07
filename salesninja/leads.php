<style>
    /* ── Page Header ─────────────────────────────────── */

    .leads {

        .header-btns {
            display: flex;
            gap: 12px;
        }

        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 22px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            font-family: inherit;
            background: #2e7d32;
            color: #fff;
            transition: background 0.15s;
            white-space: nowrap;
        }

        .btn-add:hover {
            background: #256427;
        }

        /* ── Sub Toolbar ─────────────────────────────────── */
        .sub-toolbar {
            background: #fff;
            border: 1px solid #e8eaed;
            border-radius: 10px;
            padding: 14px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .sub-toolbar-left {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .tab-active {
            background: #f0f2f5;
            border-radius: 20px;
            padding: 6px 16px;
            font-size: 13px;
            font-weight: 600;
            color: #1a1a2e;
            white-space: nowrap;
        }

        .tab-inactive {
            font-size: 13px;
            font-weight: 500;
            color: #8a8fa3;
            padding: 6px 10px;
            cursor: pointer;
            border-radius: 6px;
            transition: color 0.15s;
        }

        .tab-inactive:hover {
            color: #555;
        }

        .tab-divider {
            color: #dde1ea;
            font-size: 18px;
        }

        .sub-toolbar-center {
            flex: 1;
            max-width: 520px;
        }

        .search-box {
            display: flex;
            align-items: center;
            gap: 8px;
            border: 1px solid #dde1ea;
            border-radius: 8px;
            padding: 10px 14px;
            background: #f8f9fc;
            width: 100%;
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

        .sub-toolbar-right {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .icon-tool-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1.5px solid #dde1ea;
            border-radius: 8px;
            background: #fff;
            cursor: pointer;
            transition: background 0.15s;
        }

        .icon-tool-btn:hover {
            background: #f5f6fa;
        }

        .btn-filter-sm {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 13.5px;
            font-weight: 500;
            cursor: pointer;
            background: #fff;
            border: 1.5px solid #dde1ea;
            color: #333;
            font-family: inherit;
            transition: background 0.15s;
        }

        .btn-filter-sm:hover {
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
            min-width: 1360px;
            border-collapse: collapse;
        }

        thead tr {
            background: #f8f9fc;
        }

        th {
            padding: 14px 14px;
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
            padding: 14px 14px;
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

        /* Column: Name (blue link) */
        .lead-name {
            color: #1565c0;
            font-weight: 500;
            cursor: pointer;
        }

        .lead-name:hover {
            text-decoration: underline;
        }

        /* Column: Contact Details */
        .contact-stack {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .contact-stack .email-txt {
            font-size: 13px;
            color: #555;
        }

        .contact-stack .phone-txt {
            font-size: 13px;
            color: #888;
        }

        /* Column: Creation Date */
        .date-stack {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .date-stack .date-main {
            font-size: 13px;
            color: #333;
        }

        .date-stack .date-time {
            font-size: 12px;
            color: #8a8fa3;
        }

        /* Badges */
        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        /* Tags */
        .badge--transferred {
            background: #e8eaf6;
            color: #3949ab;
        }

        /* Lead Type */
        .badge--hot {
            background: #fce4ec;
            color: #c62828;
        }

        .badge--cold {
            background: #e3f2fd;
            color: #1565c0;
        }

        .badge--warm {
            background: #fff8e1;
            color: #e65100;
        }

        /* Lead Status */
        .badge--new-prospect {
            background: #f3e5f5;
            color: #7b1fa2;
        }

        .badge--invested {
            background: #e8f5e9;
            color: #2e7d32;
        }

        /* Quick Actions */
        .quick-actions {
            display: flex;
            align-items: center;
            gap: 3px;
        }

        .qa-btn {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            background: none;
            transition: background 0.15s;
        }

        .qa-btn:hover {
            background: #f0f2f5;
        }

        .qa-dots {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2.5px;
            padding: 5px 4px;
        }

        .qa-dot {
            width: 3px;
            height: 3px;
            border-radius: 50%;
            background: #8a8fa3;
        }

        .dash-val {
            color: #bbb;
            font-size: 16px;
        }

        /* ── Responsive ──────────────────────────────────── */
        @media (max-width: 1200px) {}

        @media (max-width: 860px) {


            .sub-toolbar {
                flex-direction: column;
                align-items: flex-start;
            }

            .sub-toolbar-center {
                max-width: none;
                width: 100%;
            }
        }

        @media (max-width: 640px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    }
</style>
<div class="wrapper">

    <!-- ══ Header ══════════════════════════════════════════ -->
    <header class="page-header">
        <div class="page-title">
            <h1>Lead</h1>
        </div>
        <div class="header-btns">
            <button class="btn-add">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round">
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
                Add Lead
            </button>
            <button class="btn-add" style="background:#388e3c;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round">
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
                Bulk upload
            </button>
        </div>
    </header>

    <!-- ══ Sub Toolbar ══════════════════════════════════════ -->
    <div class="sub-toolbar">
        <div class="sub-toolbar-left">
            <span class="tab-active">Leads 08</span>
            <span class="tab-divider">|</span>
            <span class="tab-inactive">Family Head</span>
        </div>

        <div class="sub-toolbar-center">
            <div class="search-box">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#aab0c3" stroke-width="2.2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>
                <input type="text" placeholder="Search leads...">
            </div>
        </div>

        <div class="sub-toolbar-right">
            <button class="btn-filter-sm">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="2.2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
                </svg>
                Filter
            </button>
            <button class="icon-tool-btn" title="Export Excel">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none">
                    <rect x="3" y="3" width="18" height="18" rx="3" stroke="#2e7d32" stroke-width="1.8" />
                    <line x1="9" y1="3" x2="9" y2="21" stroke="#2e7d32" stroke-width="1.5" />
                    <line x1="15" y1="3" x2="15" y2="21" stroke="#2e7d32" stroke-width="1.5" />
                    <line x1="3" y1="9" x2="21" y2="9" stroke="#2e7d32" stroke-width="1.5" />
                    <line x1="3" y1="15" x2="21" y2="15" stroke="#2e7d32" stroke-width="1.5" />
                </svg>
            </button>
            <button class="icon-tool-btn" title="Settings">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="1.8"
                    stroke-linecap="round">
                    <circle cx="12" cy="12" r="3" />
                    <path
                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z" />
                </svg>
            </button>
        </div>
    </div>

    <!-- ══ Table ════════════════════════════════════════════ -->
    <div class="table-wrap">
        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>PAN No.</th>
                        <th>Contact Details</th>
                        <th>Lead Source</th>
                        <th>Tags</th>
                        <th>Lead Type</th>
                        <th>Lead Status</th>
                        <th>Assign</th>
                        <th>Creation Date</th>
                        <th>City</th>
                        <th>Quick Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span class="lead-name">Bablu Sen</span></td>
                        <td>BEKPL2567</td>
                        <td>
                            <div class="contact-stack">
                                <span class="email-txt">bablu16@gmailcom</span>
                                <span class="phone-txt">6258963223</span>
                            </div>
                        </td>
                        <td>Walk-in</td>
                        <td><span class="badge badge--transferred">Transferred</span></td>
                        <td><span class="badge badge--hot">Hot</span></td>
                        <td><span class="badge badge--new-prospect">New Prospect</span></td>
                        <td>Satyam Rajput</td>
                        <td>
                            <div class="date-stack">
                                <span class="date-main">20 Apr 2026</span>
                                <span class="date-time">07:16 AM</span>
                            </div>
                        </td>
                        <td>Khandwa</td>
                        <td>
                            <div class="quick-actions">
                                <button class="qa-btn" title="Transfer">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 3v12M8 11l4 4 4-4M20 21H4" />
                                    </svg>
                                </button>
                                <button class="qa-btn" title="Call">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path
                                            d="M22 16.92v3a2 2 0 0 1-2.18 2A19.79 19.79 0 0 1 11.82 19a19.5 19.5 0 0 1-6.29-6.29 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.64 2.27h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.91 9.91a16 16 0 0 0 6.29 6.29l.92-.92a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7 2 2 0 0 1 1.72 2.02z" />
                                    </svg>
                                </button>
                                <button class="qa-btn" title="Message">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                    </svg>
                                </button>
                                <button class="qa-btn" title="History">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10" />
                                        <polyline points="12 6 12 12 16 14" />
                                    </svg>
                                </button>
                                <button class="qa-btn qa-dots">
                                    <span class="qa-dot"></span><span class="qa-dot"></span><span class="qa-dot"></span>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td><span class="lead-name">Goutam Tawar</span></td>
                        <td>NMKLI025</td>
                        <td>
                            <div class="contact-stack">
                                <span class="email-txt">gotam09@gmailcom</span>
                                <span class="phone-txt">6236987452</span>
                            </div>
                        </td>
                        <td>AMC Reference</td>
                        <td><span class="dash-val">—</span></td>
                        <td><span class="badge badge--cold">Cold</span></td>
                        <td><span class="badge badge--new-prospect">New Prospect</span></td>
                        <td>Dipak Jat</td>
                        <td>
                            <div class="date-stack">
                                <span class="date-main">30 Apr 2026</span>
                                <span class="date-time">12:16 PM</span>
                            </div>
                        </td>
                        <td>Pune</td>
                        <td>
                            <div class="quick-actions">
                                <button class="qa-btn" title="Transfer">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 3v12M8 11l4 4 4-4M20 21H4" />
                                    </svg>
                                </button>
                                <button class="qa-btn" title="Call">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path
                                            d="M22 16.92v3a2 2 0 0 1-2.18 2A19.79 19.79 0 0 1 11.82 19a19.5 19.5 0 0 1-6.29-6.29 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.64 2.27h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.91 9.91a16 16 0 0 0 6.29 6.29l.92-.92a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7 2 2 0 0 1 1.72 2.02z" />
                                    </svg>
                                </button>
                                <button class="qa-btn" title="Message">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                    </svg>
                                </button>
                                <button class="qa-btn" title="History">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10" />
                                        <polyline points="12 6 12 12 16 14" />
                                    </svg>
                                </button>
                                <button class="qa-btn qa-dots">
                                    <span class="qa-dot"></span><span class="qa-dot"></span><span class="qa-dot"></span>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td><span class="lead-name">Rahul Chouhan</span></td>
                        <td>CKRPC1269</td>
                        <td>
                            <div class="contact-stack">
                                <span class="email-txt">rahul04@gmailcom</span>
                                <span class="phone-txt">7354521434</span>
                            </div>
                        </td>
                        <td>Walk-in</td>
                        <td><span class="badge badge--transferred">Transferred</span></td>
                        <td><span class="badge badge--hot">Hot</span></td>
                        <td><span class="badge badge--invested">Invested</span></td>
                        <td>Banti tomar</td>
                        <td>
                            <div class="date-stack">
                                <span class="date-main">01 May 2026</span>
                                <span class="date-time">02:16 AM</span>
                            </div>
                        </td>
                        <td>Alirajput</td>
                        <td>
                            <div class="quick-actions">
                                <button class="qa-btn" title="Transfer">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 3v12M8 11l4 4 4-4M20 21H4" />
                                    </svg>
                                </button>
                                <button class="qa-btn" title="Call">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path
                                            d="M22 16.92v3a2 2 0 0 1-2.18 2A19.79 19.79 0 0 1 11.82 19a19.5 19.5 0 0 1-6.29-6.29 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.64 2.27h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.91 9.91a16 16 0 0 0 6.29 6.29l.92-.92a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7 2 2 0 0 1 1.72 2.02z" />
                                    </svg>
                                </button>
                                <button class="qa-btn" title="Message">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                    </svg>
                                </button>
                                <button class="qa-btn" title="History">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10" />
                                        <polyline points="12 6 12 12 16 14" />
                                    </svg>
                                </button>
                                <button class="qa-btn qa-dots">
                                    <span class="qa-dot"></span><span class="qa-dot"></span><span class="qa-dot"></span>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td><span class="lead-name">Goutam Tawar</span></td>
                        <td>NMKLI025</td>
                        <td>
                            <div class="contact-stack">
                                <span class="email-txt">gotam09@gmailcom</span>
                                <span class="phone-txt">6236987452</span>
                            </div>
                        </td>
                        <td>AMC Reference</td>
                        <td><span class="dash-val">—</span></td>
                        <td><span class="badge badge--cold">Cold</span></td>
                        <td><span class="badge badge--new-prospect">New Prospect</span></td>
                        <td>Dipak Jat</td>
                        <td>
                            <div class="date-stack">
                                <span class="date-main">10 May 2026</span>
                                <span class="date-time">03:58 PM</span>
                            </div>
                        </td>
                        <td>Pune</td>
                        <td>
                            <div class="quick-actions">
                                <button class="qa-btn" title="Transfer">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 3v12M8 11l4 4 4-4M20 21H4" />
                                    </svg>
                                </button>
                                <button class="qa-btn" title="Call">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path
                                            d="M22 16.92v3a2 2 0 0 1-2.18 2A19.79 19.79 0 0 1 11.82 19a19.5 19.5 0 0 1-6.29-6.29 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.64 2.27h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.91 9.91a16 16 0 0 0 6.29 6.29l.92-.92a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7 2 2 0 0 1 1.72 2.02z" />
                                    </svg>
                                </button>
                                <button class="qa-btn" title="Message">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                    </svg>
                                </button>
                                <button class="qa-btn" title="History">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10" />
                                        <polyline points="12 6 12 12 16 14" />
                                    </svg>
                                </button>
                                <button class="qa-btn qa-dots">
                                    <span class="qa-dot"></span><span class="qa-dot"></span><span class="qa-dot"></span>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td><span class="lead-name">Sitij Kanungo</span></td>
                        <td>KLIY1236</td>
                        <td>
                            <div class="contact-stack">
                                <span class="email-txt">sitij04@gmailcom</span>
                                <span class="phone-txt">7456965823</span>
                            </div>
                        </td>
                        <td>Walk-in</td>
                        <td><span class="badge badge--transferred">Transferred</span></td>
                        <td><span class="badge badge--warm">Warm</span></td>
                        <td><span class="badge badge--invested">Invested</span></td>
                        <td>Banti tomar</td>
                        <td>
                            <div class="date-stack">
                                <span class="date-main">01 May 2026</span>
                                <span class="date-time">02:16 AM</span>
                            </div>
                        </td>
                        <td>Mombai</td>
                        <td>
                            <div class="quick-actions">
                                <button class="qa-btn" title="Transfer">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 3v12M8 11l4 4 4-4M20 21H4" />
                                    </svg>
                                </button>
                                <button class="qa-btn" title="Call">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path
                                            d="M22 16.92v3a2 2 0 0 1-2.18 2A19.79 19.79 0 0 1 11.82 19a19.5 19.5 0 0 1-6.29-6.29 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.64 2.27h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.91 9.91a16 16 0 0 0 6.29 6.29l.92-.92a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7 2 2 0 0 1 1.72 2.02z" />
                                    </svg>
                                </button>
                                <button class="qa-btn" title="Message">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                    </svg>
                                </button>
                                <button class="qa-btn" title="History">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10" />
                                        <polyline points="12 6 12 12 16 14" />
                                    </svg>
                                </button>
                                <button class="qa-btn qa-dots">
                                    <span class="qa-dot"></span><span class="qa-dot"></span><span class="qa-dot"></span>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td><span class="lead-name">Ayushi Nath</span></td>
                        <td>CLIK14236</td>
                        <td>
                            <div class="contact-stack">
                                <span class="email-txt">ayushi05@gmailcom</span>
                                <span class="phone-txt">9852369852</span>
                            </div>
                        </td>
                        <td>AMC Reference</td>
                        <td><span class="dash-val">—</span></td>
                        <td><span class="badge badge--cold">Cold</span></td>
                        <td><span class="badge badge--new-prospect">New Prospect</span></td>
                        <td>Harhu Karma</td>
                        <td>
                            <div class="date-stack">
                                <span class="date-main">13 May 2026</span>
                                <span class="date-time">06:12 PM</span>
                            </div>
                        </td>
                        <td>Jabalpur</td>
                        <td>
                            <div class="quick-actions">
                                <button class="qa-btn" title="Transfer">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 3v12M8 11l4 4 4-4M20 21H4" />
                                    </svg>
                                </button>
                                <button class="qa-btn" title="Call">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path
                                            d="M22 16.92v3a2 2 0 0 1-2.18 2A19.79 19.79 0 0 1 11.82 19a19.5 19.5 0 0 1-6.29-6.29 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.64 2.27h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.91 9.91a16 16 0 0 0 6.29 6.29l.92-.92a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7 2 2 0 0 1 1.72 2.02z" />
                                    </svg>
                                </button>
                                <button class="qa-btn" title="Message">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                    </svg>
                                </button>
                                <button class="qa-btn" title="History">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10" />
                                        <polyline points="12 6 12 12 16 14" />
                                    </svg>
                                </button>
                                <button class="qa-btn qa-dots">
                                    <span class="qa-dot"></span><span class="qa-dot"></span><span class="qa-dot"></span>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div><!-- /table-scroll -->
    </div><!-- /table-wrap -->

</div><!-- /wrapper -->