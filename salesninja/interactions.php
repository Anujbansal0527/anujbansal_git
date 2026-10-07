<style>
    .interactions {
        .header-right {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-shrink: 0;
        }

        .search-box {
            display: flex;
            align-items: center;
            gap: 8px;
            border: 1px solid #dde1ea;
            border-radius: 8px;
            padding: 10px 14px;
            background: #fff;
            width: 300px;
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

        .btn-filter {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
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

        .btn-filter:hover {
            background: #f5f6fa;
        }

        /* ── Stat Cards ──────────────────────────────────── */
        .stat-row {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 12px;
            margin-bottom: 20px;
        }

        .stat-card {
            background: #fff;
            border: 1px solid #e8eaed;
            border-radius: 10px;
            padding: 14px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
        }

        .stat-num {
            font-size: 20px;
            font-weight: 700;
            color: #1a1a2e;
            line-height: 1.1;
        }

        .stat-lbl {
            font-size: 12px;
            color: #8a8fa3;
            margin-top: 4px;
        }

        .stat-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .sc--green {
            background: #e8f5e9;
        }

        .sc--teal {
            background: #e0f7fa;
        }

        .sc--gray {
            background: #f0f2f5;
        }

        .sc--purple {
            background: #ede7f6;
        }

        .sc--wapp {
            background: #e8f5e9;
        }

        .sc--red {
            background: #fce4ec;
        }

        .sc--blue {
            background: #e3f2fd;
        }

        /* ── Outcomes Bar ────────────────────────────────── */
        .outcomes-bar {
            background: #fff;
            border: 1px solid #e8eaed;
            border-radius: 10px;
            padding: 14px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .outcomes-label {
            font-size: 14px;
            font-weight: 500;
            color: #555e7b;
            white-space: nowrap;
        }

        .outcome-pill {
            display: inline-flex;
            align-items: center;
            padding: 6px 18px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            font-family: inherit;
            transition: opacity 0.15s;
        }

        .outcome-pill:hover {
            opacity: 0.88;
        }

        .op--blue {
            background: #5c6bc0;
            color: #fff;
        }

        .op--green {
            background: #43a047;
            color: #fff;
        }

        .op--red {
            background: #ef5350;
            color: #fff;
        }

        .op--dark {
            background: #424242;
            color: #fff;
        }

        .op--purple {
            background: #8e24aa;
            color: #fff;
        }

        /* ── Interaction Cards ───────────────────────────── */
        .cards-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .icard {
            background: #fff;
            border: 1px solid #e8eaed;
            border-radius: 12px;
            overflow: hidden;
            border-left: 4px solid #43a047;
        }

        .icard--orange {
            border-left-color: #fb8c00;
        }

        .icard--blue {
            border-left-color: #5c6bc0;
        }

        .icard-body {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            padding: 20px 20px 16px;
        }

        .icard-left {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            flex: 1;
        }

        .avatar {
            width: 48px;
            height: 48px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .av--green {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .av--amber {
            background: #fff8e1;
            color: #e65100;
        }

        .av--blue {
            background: #e3f2fd;
            color: #1565c0;
        }

        .icard-info {}

        .icard-name {
            font-size: 15px;
            font-weight: 600;
            color: #1a1a2e;
        }

        .icard-sub {
            font-size: 13px;
            color: #555e7b;
            margin-top: 4px;
        }

        .icard-sub .next-lbl {
            color: #00897b;
            font-weight: 600;
        }

        .icard-contact {
            display: flex;
            align-items: center;
            gap: 4px;
            flex-wrap: wrap;
            margin-top: 10px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 13px;
            color: #555e7b;
        }

        .contact-sep {
            color: #dde1ea;
            font-size: 16px;
            margin: 0 6px;
        }

        .icard-right {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 10px;
            flex-shrink: 0;
        }

        .icard-right-top {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .icard-right-btm {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* Status badges */
        .ibadge {
            display: inline-block;
            padding: 5px 16px;
            border-radius: 20px;
            font-size: 12.5px;
            font-weight: 600;
            white-space: nowrap;
        }

        .ibadge--scheduled {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .ibadge--followup {
            background: #fff3e0;
            color: #e65100;
        }

        .ibadge--completed {
            background: #e3f2fd;
            color: #1565c0;
        }

        .dots-btn {
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px 6px;
            border-radius: 6px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 3px;
            transition: background 0.15s;
        }

        .dots-btn:hover {
            background: #f0f2f5;
        }

        .vdot {
            width: 3.5px;
            height: 3.5px;
            border-radius: 50%;
            background: #8a8fa3;
        }

        .icon-btn {
            background: none;
            border: none;
            cursor: pointer;
            padding: 6px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.15s;
        }

        .icon-btn:hover {
            background: #f0f2f5;
        }

        /* Card Footer */
        .icard-footer {
            border-top: 1px solid #f0f2f5;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: #8a8fa3;
        }

        .icard-footer .due-text {
            color: #43a047;
            font-weight: 500;
        }

        .icard-footer .sep {
            color: #dde1ea;
        }

        /* ── Responsive ──────────────────────────────────── */
        @media (max-width: 1200px) {


            .stat-row {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media (max-width: 860px) {
            .stat-row {
                grid-template-columns: repeat(3, 1fr);
            }

            .page-header {
                flex-direction: column;
            }

            .header-right {
                width: 100%;
            }

            .search-box {
                flex: 1;
                width: auto;
            }
        }

        @media (max-width: 600px) {


            .stat-row {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }

            .icard-body {
                flex-direction: column;
            }

            .icard-right {
                align-items: flex-start;
            }
        }
    }
</style>
<div class="wrapper">

    <!-- ══ Header ══════════════════════════════════════════ -->
    <header class="page-header">
        <div class="page-title">
            <h1>Interactions</h1>
            <p class="breadcrumb">Dashboard &bull; Interactions</p>
        </div>
        <div class="header-right">
            <div class="search-box">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#aab0c3" stroke-width="2.2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>
                <input type="text" placeholder="Search...">
            </div>
            <button class="btn-filter">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="2.2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
                </svg>
                Filter
            </button>
        </div>
    </header>

    <!-- ══ Stat Cards ══════════════════════════════════════ -->
    <div class="stat-row">
        <div class="stat-card">
            <div>
                <div class="stat-num">34</div>
                <div class="stat-lbl">Total</div>
            </div>
            <div class="stat-circle sc--green">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="#43a047">
                    <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5z
                   M12 14c-3.337 0-10 1.676-10 5v2h20v-2c0-3.324-6.663-5-10-5z" />
                </svg>
            </div>
        </div>

        <div class="stat-card">
            <div>
                <div class="stat-num">45</div>
                <div class="stat-lbl">This Week</div>
            </div>
            <div class="stat-circle sc--teal">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                    <rect x="3" y="4" width="18" height="17" rx="3" stroke="#0097a7" stroke-width="1.8" />
                    <line x1="3" y1="10" x2="21" y2="10" stroke="#0097a7" stroke-width="1.8" />
                    <line x1="8" y1="2" x2="8" y2="6" stroke="#0097a7" stroke-width="2" stroke-linecap="round" />
                    <line x1="16" y1="2" x2="16" y2="6" stroke="#0097a7" stroke-width="2" stroke-linecap="round" />
                    <text x="9" y="20" font-size="7" font-weight="700" fill="#0097a7"
                        font-family="Poppins,sans-serif">31</text>
                </svg>
            </div>
        </div>

        <div class="stat-card">
            <div>
                <div class="stat-num">96</div>
                <div class="stat-lbl">This Month</div>
            </div>
            <div class="stat-circle sc--gray">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                    <rect x="3" y="4" width="18" height="17" rx="3" stroke="#757575" stroke-width="1.8" />
                    <line x1="3" y1="10" x2="21" y2="10" stroke="#757575" stroke-width="1.8" />
                    <line x1="8" y1="2" x2="8" y2="6" stroke="#757575" stroke-width="2" stroke-linecap="round" />
                    <line x1="16" y1="2" x2="16" y2="6" stroke="#757575" stroke-width="2" stroke-linecap="round" />
                </svg>
            </div>
        </div>

        <div class="stat-card">
            <div>
                <div class="stat-num">12</div>
                <div class="stat-lbl">Calls</div>
            </div>
            <div class="stat-circle sc--purple">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M22 16.92v3a2 2 0 0 1-2.18 2A19.79 19.79 0 0 1 11.82 19a19.5 19.5 0 0 1-6.29-6.29 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.64 2.27h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.91 9.82a16 16 0 0 0 6.29 6.29l.92-.92a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7 2 2 0 0 1 1.72 2.02z"
                        stroke="#7b1fa2" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
        </div>

        <div class="stat-card">
            <div>
                <div class="stat-num">36</div>
                <div class="stat-lbl">WhatsApp</div>
            </div>
            <div class="stat-circle sc--wapp">
                <svg width="20" height="20" viewBox="0 0 24 24">
                    <path
                        d="M12 2C6.48 2 2 6.48 2 12c0 1.85.5 3.58 1.37 5.06L2 22l4.94-1.37A9.95 9.95 0 0 0 12 22c5.52 0 10-4.48 10-10S17.52 2 12 2z"
                        fill="#43a047" />
                    <path
                        d="M9.1 8.2c-.2-.6.2-1.3.7-1.5.3-.2.7-.2.9 0l.8 1.5c.1.3.1.7-.2.9l-.4.4a3.8 3.8 0 0 0 1.6 1.6l.4-.4c.3-.3.7-.3.9-.2l1.5.8c.3.2.3.7 0 .9-.2.5-.9.9-1.5.7-1-.4-3-2.3-3.5-3.5-.1-.3-.2-.7-.2-1.2z"
                        fill="white" />
                </svg>
            </div>
        </div>

        <div class="stat-card">
            <div>
                <div class="stat-num">09</div>
                <div class="stat-lbl">Emails</div>
            </div>
            <div class="stat-circle sc--red">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                    <rect x="2" y="4" width="20" height="16" rx="3" stroke="#e53935" stroke-width="1.8" />
                    <path d="M2 7l10 7 10-7" stroke="#e53935" stroke-width="1.8" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>
        </div>

        <div class="stat-card">
            <div>
                <div class="stat-num">05</div>
                <div class="stat-lbl">Meetings</div>
            </div>
            <div class="stat-circle sc--blue">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="#1565c0">
                    <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5z
                   M12 14c-3.337 0-10 1.676-10 5v2h20v-2c0-3.324-6.663-5-10-5z" />
                </svg>
            </div>
        </div>
    </div>

    <!-- ══ Outcomes Bar ═════════════════════════════════════ -->
    <div class="outcomes-bar">
        <span class="outcomes-label">Outcomes:</span>
        <button class="outcome-pill op--blue">Interested 16</button>
        <button class="outcome-pill op--green">Completed 3</button>
        <button class="outcome-pill op--red">Follow-up Required 9</button>
        <button class="outcome-pill op--dark">Not Interested</button>
        <button class="outcome-pill op--purple">Converted 2</button>
    </div>

    <!-- ══ Interaction Cards ════════════════════════════════ -->
    <div class="cards-list">

        <!-- Card 1: Scheduled -->
        <div class="icard">
            <div class="icard-body">
                <div class="icard-left">
                    <div class="avatar av--green">RK</div>
                    <div class="icard-info">
                        <div class="icard-name">Rakes Tomar</div>
                        <div class="icard-sub">
                            Product Demo &nbsp;.&nbsp; <span class="next-lbl">Next:</span> Feb 26, 2026 at 07:30 AM
                        </div>
                        <div class="icard-contact">
                            <div class="contact-item">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                    stroke-width="1.8" stroke-linecap="round">
                                    <rect x="2" y="4" width="20" height="16" rx="3" />
                                    <path d="M2 7l10 7 10-7" />
                                </svg>
                                rakesh963@gmailcom
                            </div>
                            <span class="contact-sep">|</span>
                            <div class="contact-item">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                    stroke-width="1.8" stroke-linecap="round">
                                    <path
                                        d="M3 21h18M3 7v14M21 7v14M6 11h2M6 15h2M16 11h2M16 15h2M10 21V11h4v10M3 7l9-4 9 4" />
                                </svg>
                                Acme Corp
                            </div>
                        </div>
                    </div>
                </div>
                <div class="icard-right">
                    <div class="icard-right-top">
                        <span class="ibadge ibadge--scheduled">Scheduled</span>
                        <button class="dots-btn">
                            <span class="vdot"></span><span class="vdot"></span><span class="vdot"></span>
                        </button>
                    </div>
                    <div class="icard-right-btm">
                        <button class="icon-btn" title="Edit">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                            </svg>
                        </button>
                        <button class="icon-btn" title="Delete">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#e53935"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="3 6 5 6 21 6" />
                                <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                <line x1="10" y1="11" x2="10" y2="17" />
                                <line x1="14" y1="11" x2="14" y2="17" />
                                <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="icard-footer">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3" stroke-width="1.8"
                    stroke-linecap="round">
                    <rect x="3" y="4" width="18" height="17" rx="3" />
                    <line x1="3" y1="10" x2="21" y2="10" />
                </svg>
                Created: Feb 14, 2026
                <span class="sep">&nbsp;.&nbsp;</span>
                <span class="due-text">Due in 2 days</span>
            </div>
        </div>

        <!-- Card 2: Follow-up Required -->
        <div class="icard icard--orange">
            <div class="icard-body">
                <div class="icard-left">
                    <div class="avatar av--amber">RP</div>
                    <div class="icard-info">
                        <div class="icard-name">Roshan Patel</div>
                        <div class="icard-sub">
                            Project Discussion &nbsp;.&nbsp; <span class="next-lbl">Next:</span> March 01, 2026 at 05:58
                            PM
                        </div>
                        <div class="icard-contact">
                            <div class="contact-item">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                    stroke-width="1.8" stroke-linecap="round">
                                    <rect x="2" y="4" width="20" height="16" rx="3" />
                                    <path d="M2 7l10 7 10-7" />
                                </svg>
                                roshan.patel1023@gmailcom
                            </div>
                            <span class="contact-sep">|</span>
                            <div class="contact-item">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                    stroke-width="1.8" stroke-linecap="round">
                                    <path
                                        d="M3 21h18M3 7v14M21 7v14M6 11h2M6 15h2M16 11h2M16 15h2M10 21V11h4v10M3 7l9-4 9 4" />
                                </svg>
                                Web Solutions
                            </div>
                        </div>
                    </div>
                </div>
                <div class="icard-right">
                    <div class="icard-right-top">
                        <span class="ibadge ibadge--followup">Follow-up Required</span>
                        <button class="dots-btn">
                            <span class="vdot"></span><span class="vdot"></span><span class="vdot"></span>
                        </button>
                    </div>
                    <div class="icard-right-btm">
                        <button class="icon-btn" title="Edit">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                            </svg>
                        </button>
                        <button class="icon-btn" title="Delete">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#e53935"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="3 6 5 6 21 6" />
                                <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                <line x1="10" y1="11" x2="10" y2="17" />
                                <line x1="14" y1="11" x2="14" y2="17" />
                                <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="icard-footer">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3" stroke-width="1.8"
                    stroke-linecap="round">
                    <rect x="3" y="4" width="18" height="17" rx="3" />
                    <line x1="3" y1="10" x2="21" y2="10" />
                </svg>
                Created: Feb 24, 2026
                <span class="sep">&nbsp;.&nbsp;</span>
                <span class="due-text">Due in 5 days</span>
            </div>
        </div>

        <!-- Card 3: Completed -->
        <!-- <div class="icard icard--blue">
            <div class="icard-body">
                <div class="icard-left">
                    <div class="avatar av--blue">AK</div>
                    <div class="icard-info">
                        <div class="icard-name">Anil Kumar</div>
                        <div class="icard-sub">
                            Initial Consultation &nbsp;.&nbsp; <span class="next-lbl">Next:</span> April 10, 2026 at
                            11:00 AM
                        </div>
                        <div class="icard-contact">
                            <div class="contact-item">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                    stroke-width="1.8" stroke-linecap="round">
                                    <rect x="2" y="4" width="20" height="16" rx="3" />
                                    <path d="M2 7l10 7 10-7" />
                                </svg>
                                anil.kumar88@gmailcom
                            </div>
                            <span class="contact-sep">|</span>
                            <div class="contact-item">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                    stroke-width="1.8" stroke-linecap="round">
                                    <path
                                        d="M3 21h18M3 7v14M21 7v14M6 11h2M6 15h2M16 11h2M16 15h2M10 21V11h4v10M3 7l9-4 9 4" />
                                </svg>
                                TechSoft Ltd
                            </div>
                        </div>
                    </div>
                </div>
                <div class="icard-right">
                    <div class="icard-right-top">
                        <span class="ibadge ibadge--completed">Completed</span>
                        <button class="dots-btn">
                            <span class="vdot"></span><span class="vdot"></span><span class="vdot"></span>
                        </button>
                    </div>
                    <div class="icard-right-btm">
                        <button class="icon-btn" title="Edit">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                            </svg>
                        </button>
                        <button class="icon-btn" title="Delete">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#e53935"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="3 6 5 6 21 6" />
                                <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6" />
                                <line x1="10" y1="11" x2="10" y2="17" />
                                <line x1="14" y1="11" x2="14" y2="17" />
                                <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="icard-footer">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#8a8fa3" stroke-width="1.8"
                    stroke-linecap="round">
                    <rect x="3" y="4" width="18" height="17" rx="3" />
                    <line x1="3" y1="10" x2="21" y2="10" />
                </svg>
                Created: Mar 28, 2026
                <span class="sep">&nbsp;.&nbsp;</span>
                <span class="due-text">Completed</span>
            </div>
        </div> -->

    </div><!-- /cards-list -->
</div><!-- /wrapper -->