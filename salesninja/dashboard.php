<style>
    .dashboard {
        .page-subtitle {
            font-size: 13px;
            color: #8a8fa3;
            margin-top: 4px;
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
            transition: background 0.18s;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .btn-filter:hover {
            background: #f5f6fa;
        }

        /* ── Stat Cards Row ──────────────────────────────── */
        .stat-row {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 14px;
            margin-bottom: 22px;
        }

        .stat-card {
            background: #fff;
            border: 1px solid #e8eaed;
            border-radius: 10px;
            padding: 14px 16px 16px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
        }


        .stat-num {
            font-size: 22px;
            font-weight: 700;
            color: #1a1a2e;
            line-height: 1.1;
        }

        .stat-lbl {
            font-size: 12px;
            color: #8a8fa3;
            margin-top: 5px;
            font-weight: 400;
        }

        .stat-icon-wrap {
            width: 44px;
            height: 44px;
            flex-shrink: 0;
        }

        /* ── Middle Grid ─────────────────────────────────── */
        .mid-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
            margin-bottom: 22px;
        }

        .card {
            background: #fff;
            border: 1px solid #e8eaed;
            border-radius: 12px;
            padding: 24px;
        }

        .card-title {
            font-size: 15px;
            font-weight: 600;
            color: #1a1a2e;
            margin-bottom: 22px;
        }

        /* ── Progress Bars ───────────────────────────────── */
        .progress-list {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .progress-row {}

        .progress-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 7px;
        }

        .progress-label {
            font-size: 13.5px;
            color: #555e7b;
            font-weight: 400;
        }

        .progress-value {
            font-size: 14px;
            font-weight: 600;
            color: #1a1a2e;
        }

        .progress-track {
            height: 9px;
            background: #edeef2;
            border-radius: 5px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            border-radius: 5px;
            transition: width 0.3s ease;
        }

        /* ── Donut Chart Card ────────────────────────────── */
        .donut-card-inner {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .donut-svg-wrap {
            width: 100%;
            max-width: 300px;
            margin: 0 auto 20px;
        }

        .donut-legend {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px 24px;
            width: 100%;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #555e7b;
        }

        .legend-dot {
            width: 11px;
            height: 11px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        /* ── Today's Tasks ───────────────────────────────── */
        .tasks-section {}

        .tasks-title {
            font-size: 16px;
            font-weight: 600;
            color: #1a1a2e;
            margin-bottom: 14px;
        }

        .tasks-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
        }

        .task-card {
            background: #fff;
            border: 1px solid #e8eaed;
            border-radius: 12px;
            overflow: hidden;
        }

        .task-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 16px;
            background: #f5f7fa;
            border-bottom: 1px solid #e8eaed;
        }

        .task-card-title {
            font-size: 13.5px;
            font-weight: 600;
            color: #1a1a2e;
        }

        .view-all {
            font-size: 12.5px;
            color: #43a047;
            font-weight: 500;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 2px;
        }

        .view-all:hover {
            text-decoration: underline;
        }

        .task-card-body {
            padding: 16px;
        }

        .task-entry {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .task-avatar {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .task-avatar--green {
            background: #e8f5e9;
        }

        .task-avatar--orange {
            background: #fff8e1;
        }

        .task-avatar--blue {
            background: #e8eaf6;
        }

        .task-info {
            flex: 1;
        }

        .task-name {
            font-size: 14px;
            font-weight: 600;
            color: #1a1a2e;
        }

        .task-desc {
            font-size: 12.5px;
            color: #8a8fa3;
            margin-top: 3px;
            line-height: 1.4;
        }

        .task-meta {
            font-size: 12px;
            color: #aab0c3;
            margin-top: 4px;
        }

        .badge {
            display: inline-block;
            padding: 2px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            margin-top: 6px;
        }

        .badge--low {
            background: #e8f5e9;
            color: #43a047;
        }

        .badge--high {
            background: #fce4ec;
            color: #e91e63;
        }

        .badge--med {
            background: #fff3e0;
            color: #fb8c00;
        }

        /* ── Responsive ──────────────────────────────────── */
        @media (max-width: 1200px) {


            .stat-row {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 900px) {
            .mid-grid {
                grid-template-columns: 1fr;
            }

            .tasks-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }
        }

        @media (max-width: 640px) {


            .page-header {
                flex-direction: column;
                gap: 12px;
            }

            .btn-filter {
                align-self: flex-end;
            }

            .stat-row {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }
        }

        @media (max-width: 380px) {
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
            <h1>Dashboard</h1>
            <p class="page-subtitle">Overview of your performance and activities</p>
        </div>
        <button class="btn-filter">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="2.2"
                stroke-linecap="round" stroke-linejoin="round">
                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
            </svg>
            Filter
        </button>
    </header>

    <!-- ══ Stat Cards ══════════════════════════════════════ -->
    <div class="stat-row">

        <!-- Total Leads -->
        <div class="stat-card">
            <div class="stat-left">
                <div class="stat-num">1883</div>
                <div class="stat-lbl">Total Leads</div>
            </div>
            <div class="stat-icon-wrap">
                <svg viewBox="0 0 44 44" width="44" height="44">
                    <!-- Person 1 (blue) -->
                    <circle cx="14" cy="12" r="5.5" fill="#1976d2" />
                    <path d="M4 30c0-4 4.5-6.5 10-6.5s10 2.5 10 6.5" fill="#1976d2" />
                    <!-- Person 2 (pink, offset right) -->
                    <circle cx="30" cy="11" r="4.5" fill="#e91e63" opacity="0.85" />
                    <path d="M22 28c0-3.5 3.6-5.5 8-5.5s8 2 8 5.5" fill="#e91e63" opacity="0.75" />
                    <!-- Small highlight -->
                    <circle cx="22" cy="9" r="3" fill="#fbc02d" opacity="0.9" />
                </svg>
            </div>
        </div>

        <!-- Follow-ups -->
        <div class="stat-card">
            <div class="stat-left">
                <div class="stat-num">542</div>
                <div class="stat-lbl">Follow-ups</div>
            </div>
            <div class="stat-icon-wrap">
                <svg viewBox="0 0 44 44" width="44" height="44">
                    <!-- Calendar body -->
                    <rect x="5" y="9" width="30" height="28" rx="4" fill="#e8f5e9" stroke="#43a047"
                        stroke-width="1.5" />
                    <!-- Top bar -->
                    <rect x="5" y="9" width="30" height="9" rx="4" fill="#43a047" />
                    <rect x="5" y="14" width="30" height="4" fill="#43a047" />
                    <!-- Calendar hooks -->
                    <line x1="14" y1="5" x2="14" y2="14" stroke="#43a047" stroke-width="2.5" stroke-linecap="round" />
                    <line x1="26" y1="5" x2="26" y2="14" stroke="#43a047" stroke-width="2.5" stroke-linecap="round" />
                    <!-- Date lines -->
                    <line x1="12" y1="24" x2="18" y2="24" stroke="#43a047" stroke-width="2" stroke-linecap="round" />
                    <line x1="22" y1="24" x2="28" y2="24" stroke="#43a047" stroke-width="2" stroke-linecap="round" />
                    <line x1="12" y1="30" x2="18" y2="30" stroke="#43a047" stroke-width="2" stroke-linecap="round" />
                    <!-- Notification dot -->
                    <circle cx="35" cy="10" r="5" fill="#e53935" />
                    <line x1="35" y1="8" x2="35" y2="11" stroke="white" stroke-width="1.5" stroke-linecap="round" />
                    <circle cx="35" cy="12.5" r="0.8" fill="white" />
                </svg>
            </div>
        </div>

        <!-- Upcoming -->
        <div class="stat-card">
            <div class="stat-left">
                <div class="stat-num">363</div>
                <div class="stat-lbl">Upcoming</div>
            </div>
            <div class="stat-icon-wrap">
                <svg viewBox="0 0 44 44" width="44" height="44">
                    <!-- Calendar -->
                    <rect x="5" y="9" width="28" height="26" rx="4" fill="#e3f2fd" stroke="#1976d2"
                        stroke-width="1.5" />
                    <rect x="5" y="9" width="28" height="9" rx="4" fill="#1976d2" />
                    <rect x="5" y="14" width="28" height="4" fill="#1976d2" />
                    <line x1="13" y1="5" x2="13" y2="13" stroke="#1976d2" stroke-width="2.5" stroke-linecap="round" />
                    <line x1="25" y1="5" x2="25" y2="13" stroke="#1976d2" stroke-width="2.5" stroke-linecap="round" />
                    <!-- Clock overlay -->
                    <circle cx="34" cy="32" r="9" fill="#fff3e0" stroke="#fb8c00" stroke-width="1.5" />
                    <line x1="34" y1="28" x2="34" y2="32" stroke="#fb8c00" stroke-width="1.8" stroke-linecap="round" />
                    <line x1="34" y1="32" x2="37" y2="34" stroke="#fb8c00" stroke-width="1.8" stroke-linecap="round" />
                </svg>
            </div>
        </div>

        <!-- Overdue -->
        <div class="stat-card">
            <div class="stat-left">
                <div class="stat-num">625</div>
                <div class="stat-lbl">Overdue</div>
            </div>
            <div class="stat-icon-wrap">
                <svg viewBox="0 0 44 44" width="44" height="44">
                    <!-- Clock face -->
                    <circle cx="22" cy="23" r="15" fill="#fce4ec" stroke="#e53935" stroke-width="1.8" />
                    <!-- Clock hands -->
                    <line x1="22" y1="14" x2="22" y2="23" stroke="#e53935" stroke-width="2.2" stroke-linecap="round" />
                    <line x1="22" y1="23" x2="28" y2="27" stroke="#e53935" stroke-width="2.2" stroke-linecap="round" />
                    <circle cx="22" cy="23" r="2" fill="#e53935" />
                    <!-- Alarm bells at top -->
                    <line x1="15" y1="9" x2="13" y2="6" stroke="#e53935" stroke-width="2" stroke-linecap="round" />
                    <line x1="29" y1="9" x2="31" y2="6" stroke="#e53935" stroke-width="2" stroke-linecap="round" />
                    <line x1="18" y1="7" x2="14" y2="5" stroke="#e53935" stroke-width="1.5" stroke-linecap="round" />
                    <line x1="26" y1="7" x2="30" y2="5" stroke="#e53935" stroke-width="1.5" stroke-linecap="round" />
                </svg>
            </div>
        </div>

        <!-- Today -->
        <div class="stat-card">
            <div class="stat-left">
                <div class="stat-num">248</div>
                <div class="stat-lbl">Today</div>
            </div>
            <div class="stat-icon-wrap">
                <svg viewBox="0 0 44 44" width="44" height="44">
                    <!-- Bar chart baseline -->
                    <line x1="6" y1="38" x2="38" y2="38" stroke="#cfd3dc" stroke-width="1.5" />
                    <!-- Bars -->
                    <rect x="8" y="26" width="7" height="12" rx="2" fill="#9575cd" />
                    <rect x="18" y="18" width="7" height="20" rx="2" fill="#5c6bc0" />
                    <rect x="28" y="22" width="7" height="16" rx="2" fill="#7c4dff" />
                </svg>
            </div>
        </div>

        <!-- Opportunities -->
        <div class="stat-card">
            <div class="stat-left">
                <div class="stat-num">105</div>
                <div class="stat-lbl">Opportunities</div>
            </div>
            <div class="stat-icon-wrap">
                <svg viewBox="0 0 44 44" width="44" height="44">
                    <!-- Lightbulb -->
                    <path d="M22 6a10 10 0 0 1 6 18v3a2 2 0 0 1-2 2h-8a2 2 0 0 1-2-2v-3A10 10 0 0 1 22 6z"
                        fill="#fff8e1" stroke="#fbc02d" stroke-width="1.8" />
                    <!-- Filament lines -->
                    <line x1="18" y1="29" x2="26" y2="29" stroke="#fbc02d" stroke-width="1.5" stroke-linecap="round" />
                    <line x1="18" y1="31.5" x2="26" y2="31.5" stroke="#fbc02d" stroke-width="1.5"
                        stroke-linecap="round" />
                    <!-- Shine -->
                    <line x1="22" y1="3" x2="22" y2="1" stroke="#fbc02d" stroke-width="1.8" stroke-linecap="round" />
                    <line x1="29" y1="8" x2="31" y2="6" stroke="#fbc02d" stroke-width="1.5" stroke-linecap="round" />
                    <line x1="15" y1="8" x2="13" y2="6" stroke="#fbc02d" stroke-width="1.5" stroke-linecap="round" />
                </svg>
            </div>
        </div>

    </div><!-- /stat-row -->

    <!-- ══ Middle Grid ══════════════════════════════════════ -->
    <div class="mid-grid">

        <!-- ── Opportunity Progress ── -->
        <div class="card">
            <div class="card-title">Opportunity Progress</div>
            <div class="progress-list">

                <div class="progress-row">
                    <div class="progress-header">
                        <span class="progress-label">Prospecting</span>
                        <span class="progress-value">85</span>
                    </div>
                    <div class="progress-track">
                        <div class="progress-fill" style="width:85%; background:#9575cd;"></div>
                    </div>
                </div>

                <div class="progress-row">
                    <div class="progress-header">
                        <span class="progress-label">Qualifications</span>
                        <span class="progress-value">62</span>
                    </div>
                    <div class="progress-track">
                        <div class="progress-fill" style="width:62%; background:#29b6f6;"></div>
                    </div>
                </div>

                <div class="progress-row">
                    <div class="progress-header">
                        <span class="progress-label">Propasal</span>
                        <span class="progress-value">77</span>
                    </div>
                    <div class="progress-track">
                        <div class="progress-fill" style="width:77%; background:#ba68c8;"></div>
                    </div>
                </div>

                <div class="progress-row">
                    <div class="progress-header">
                        <span class="progress-label">Negociation</span>
                        <span class="progress-value">83</span>
                    </div>
                    <div class="progress-track">
                        <div class="progress-fill" style="width:83%; background:#ffca28;"></div>
                    </div>
                </div>

                <div class="progress-row">
                    <div class="progress-header">
                        <span class="progress-label">Closed Won</span>
                        <span class="progress-value">59</span>
                    </div>
                    <div class="progress-track">
                        <div class="progress-fill" style="width:59%; background:#66bb6a;"></div>
                    </div>
                </div>

                <div class="progress-row">
                    <div class="progress-header">
                        <span class="progress-label">Closed Lost</span>
                        <span class="progress-value">43</span>
                    </div>
                    <div class="progress-track">
                        <div class="progress-fill" style="width:43%; background:#bdbdbd;"></div>
                    </div>
                </div>

            </div>
        </div>

        <!-- ── Lead Stage Distribution ── -->
        <div class="card">
            <div class="card-title">Lead Stage Distribution</div>
            <div class="donut-card-inner">

                <!--
          Donut: cx=150, cy=150, R_outer=120, R_inner=78
          Formula: x = cx + R*sin(θ),  y = cy - R*cos(θ)   (0°=top, clockwise)

          Segments (total=114):
            New Prospect        (periwinkle #8b85c1) : 20 → 17.54% →  63.16°  : 0°      → 63.16°
            Initial Contact Done(cyan      #4dd0e1) : 27 → 23.68% →  85.26°  : 63.16°  → 148.42°
            Meeting Completed   (green     #66bb6a) : 16 → 14.04% →  50.53°  : 148.42° → 198.95°
            Requirement Id.     (yellow    #ffd54f) : 09 →  7.89% →  28.42°  : 198.95° → 227.37°
            Invested            (teal      #26a69a) : 11 →  9.65% →  34.74°  : 227.37° → 262.11°
            Not Converted       (gray      #bdbdbd) : 31 → 27.19% →  97.89°  : 262.11° → 360°

          Key coords (R_outer=120, R_inner=78):
            θ=0°     → outer(150, 30),         inner(150, 72)
            θ=63.16° → outer(257.03, 96.19),   inner(217.62, 114.53)
            θ=148.42°→ outer(213.22, 252.67),  inner(188.59, 221.31)
            θ=198.95°→ outer(110.96, 263.61),  inner(121.38, 229.38)
            θ=227.37°→ outer(61.81, 231.22),   inner(91.91, 207.03)
            θ=262.11°→ outer(31.14, 166.47),   inner(69.17, 160.71)
            θ=360°   → outer(150, 30),         inner(150, 72)

          All spans < 180° → large=0 for all
        -->
                <div class="donut-svg-wrap">
                    <svg viewBox="0 0 300 300" width="100%">
                        <!-- New Prospect (periwinkle) -->
                        <path d="M150,30 A120,120,0,0,1,257.03,96.19 L217.62,114.53 A78,78,0,0,0,150,72 Z"
                            fill="#8b85c1" stroke="white" stroke-width="2" />
                        <!-- Initial Contact Done (cyan) -->
                        <path d="M257.03,96.19 A120,120,0,0,1,213.22,252.67 L188.59,221.31 A78,78,0,0,0,217.62,114.53 Z"
                            fill="#4dd0e1" stroke="white" stroke-width="2" />
                        <!-- Meeting Completed (green) -->
                        <path
                            d="M213.22,252.67 A120,120,0,0,1,110.96,263.61 L121.38,229.38 A78,78,0,0,0,188.59,221.31 Z"
                            fill="#66bb6a" stroke="white" stroke-width="2" />
                        <!-- Requirement Identified (yellow) -->
                        <path d="M110.96,263.61 A120,120,0,0,1,61.81,231.22 L91.91,207.03 A78,78,0,0,0,121.38,229.38 Z"
                            fill="#ffd54f" stroke="white" stroke-width="2" />
                        <!-- Invested (teal) -->
                        <path d="M61.81,231.22 A120,120,0,0,1,31.14,166.47 L69.17,160.71 A78,78,0,0,0,91.91,207.03 Z"
                            fill="#26a69a" stroke="white" stroke-width="2" />
                        <!-- Not Converted (gray) -->
                        <path d="M31.14,166.47 A120,120,0,0,1,150,30 L150,72 A78,78,0,0,0,69.17,160.71 Z" fill="#bdbdbd"
                            stroke="white" stroke-width="2" />
                        <!-- Center text -->
                        <text x="150" y="144" text-anchor="middle" font-size="32" font-weight="800" fill="#2e7d32"
                            font-family="'Poppins','Segoe UI',system-ui,sans-serif">114</text>
                        <text x="150" y="168" text-anchor="middle" font-size="13" fill="#8a8fa3"
                            font-family="'Poppins','Segoe UI',system-ui,sans-serif">Total Leads</text>
                    </svg>
                </div>

                <div class="donut-legend">
                    <div class="legend-item">
                        <span class="legend-dot" style="background:#8b85c1;"></span>New Prospect: 20
                    </div>
                    <div class="legend-item">
                        <span class="legend-dot" style="background:#4dd0e1;"></span>Initial Contact Done: 27
                    </div>
                    <div class="legend-item">
                        <span class="legend-dot" style="background:#66bb6a;"></span>Meeting Completed: 16
                    </div>
                    <div class="legend-item">
                        <span class="legend-dot" style="background:#ffd54f;"></span>Requirement Identified: 09
                    </div>
                    <div class="legend-item">
                        <span class="legend-dot" style="background:#26a69a;"></span>Invested: 11
                    </div>
                    <div class="legend-item">
                        <span class="legend-dot" style="background:#bdbdbd;"></span>Not Converted: 31
                    </div>
                </div>

            </div>
        </div>

    </div><!-- /mid-grid -->

    <!-- ══ Today's Tasks ═══════════════════════════════════ -->
    <!-- <div class="tasks-section">
        <div class="tasks-title">Today's Tasks</div>

        <div class="tasks-grid">

            <div class="task-card">
                <div class="task-card-header">
                    <span class="task-card-title">Today's Follow-ups</span>
                    <a href="#" class="view-all">View All &rsaquo;</a>
                </div>
                <div class="task-card-body">
                    <div class="task-entry">
                        <div class="task-avatar task-avatar--green">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                                <rect x="2" y="5" width="20" height="14" rx="3" fill="#43a047" />
                                <path d="M2 8l10 7 10-7" stroke="white" stroke-width="1.8" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="task-info">
                            <div class="task-name">Vijay Raj</div>
                            <div class="task-meta">09:41 PM &bull; Email</div>
                            <span class="badge badge--low">LOW</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="task-card">
                <div class="task-card-header">
                    <span class="task-card-title">Today's Interactions</span>
                    <a href="#" class="view-all">View All &rsaquo;</a>
                </div>
                <div class="task-card-body">
                    <div class="task-entry">
                        <div class="task-avatar task-avatar--orange">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                                <polyline points="3 17 9 11 13 15 21 7" stroke="#fb8c00" stroke-width="2.2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <polyline points="17 7 21 7 21 11" stroke="#fb8c00" stroke-width="2.2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="task-info">
                            <div class="task-name">Rajendra Chouhan</div>
                            <div class="task-desc">Discussion on integration part</div>
                            <div class="task-meta">07:09 PM &bull; Whatsapp</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="task-card">
                <div class="task-card-header">
                    <span class="task-card-title">Today's Portfolio Reviews</span>
                    <a href="#" class="view-all">View All &rsaquo;</a>
                </div>
                <div class="task-card-body">
                    <div class="task-entry">
                        <div class="task-avatar task-avatar--blue">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                                <rect x="2" y="7" width="20" height="15" rx="2" fill="#3949ab" />
                                <path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2" stroke="#3949ab" stroke-width="2"
                                    fill="none" />
                                <line x1="12" y1="12" x2="12" y2="17" stroke="white" stroke-width="1.8"
                                    stroke-linecap="round" />
                                <line x1="9" y1="14.5" x2="15" y2="14.5" stroke="white" stroke-width="1.8"
                                    stroke-linecap="round" />
                            </svg>
                        </div>
                        <div class="task-info">
                            <div class="task-name">Priti Pandey</div>
                            <div class="task-desc">Quarterly</div>
                            <div class="task-meta">10:03 PM &bull; Lead</div>
                        </div>
                    </div>
                </div>
            </div>

        </div> 
    </div>  -->

</div><!-- /wrapper -->