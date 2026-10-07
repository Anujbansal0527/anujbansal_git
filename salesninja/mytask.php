<style>
    .mytask {


        /* ── Header ─────────────────────────────────────── */





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
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            border: none;
            outline: none;
            transition: background 0.18s, border-color 0.18s;
            white-space: nowrap;
        }

        .btn-outline {
            background: #fff;
            border: 1.5px solid #dde1ea;
            color: #333;
        }

        .btn-outline:hover {
            background: #f5f6fa;
        }

        .btn-green {
            background: #43a047;
            color: #fff;
            font-weight: 600;
            border: 1.5px solid transparent;
        }

        .btn-green:hover {
            background: #2e7d32;
        }

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

        /* ── Charts Grid ─────────────────────────────────── */
        .charts-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .chart-card {
            background: #fff;
            border-radius: 12px;
            padding: 24px 5px;
        }

        .chart-title {
            font-size: 12px;
            font-weight: 600;
            color: #1a1a2e;
            margin-bottom: 16px;
        }

        .chart-title--bold {
            font-weight: 700;
            font-size: 13px;
        }

        .donut-wrap {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .bar-svg {
            display: block;
            width: 100%;
        }

        /* Legend */
        .legend {
            display: flex;
            flex-wrap: wrap;
            gap: 10px 18px;
            margin-top: 16px;
            justify-content: center;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            color: #555e7b;
        }

        .legend-dot {
            width: 12px;
            height: 12px;
            border-radius: 3px;
            flex-shrink: 0;
        }

        /* ── Responsive ──────────────────────────────────── */


        @media (max-width: 1000px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .charts-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 640px) {
            .page-header {
                flex-direction: column;
                gap: 14px;
            }

            .header-actions {
                width: 100%;
                justify-content: flex-end;
            }



            .stats-grid {
                gap: 12px;
            }
        }

        @media (max-width: 440px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }

            .btn {
                padding: 9px 14px;
                font-size: 10px;
            }


        }
    }
</style>
<div class="wrapper">

    <!-- ══ Header ═══════════════════════════════════════════ -->
    <header class="page-header">
        <div class="page-title">
            <h1>My Tasks</h1>
            <p class="breadcrumb">Dashboard &bull; <span class="crumb-active">My Tasks</span>
            </p>
        </div>
        <div class="header-actions">
            <button class="btn btn-outline">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#555" stroke-width="2.2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
                </svg>
                Filters
            </button>
            <button class="btn btn-green">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.8"
                    stroke-linecap="round">
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
                Create Task
            </button>
        </div>
    </header>

    <!-- ══ Stat Cards ════════════════════════════════════════ -->
    <div class="stats-grid">

        <!-- Total -->
        <div class="stat-card stat-card--purple">
            <div class="stat-text">
                <div class="stat-number">121</div>
                <div class="stat-label">Total</div>
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
                <div class="stat-number">47</div>
                <div class="stat-label">Pending</div>
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
                <div class="stat-number">11</div>
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
                <div class="stat-number">63</div>
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

    <!-- ══ Charts ════════════════════════════════════════════ -->
    <div class="charts-grid">

        <!-- ── Completion Progress ── -->
        <div class="chart-card">
            <div class="chart-title">Completion Progress</div>
            <div class="donut-wrap">

                <svg viewBox="0 0 300 300" width="100%" style="max-height:260px;">
                    <!-- Gray arc 90°→330°, span=240°, large=1 -->
                    <path d="M260,150 A110,110,0,1,1,95,54.74 L115,89.38 A70,70,0,1,0,220,150 Z" fill="#e8eaed" />
                    <!-- Blue arc 0°→90°, span=90°, large=0 -->
                    <path d="M150,40 A110,110,0,0,1,260,150 L220,150 A70,70,0,0,0,150,80 Z" fill="#2196f3" />
                    <!-- Center text -->
                    <text x="150" y="143" text-anchor="middle" font-size="34" font-weight="800" fill="#1a1a2e"
                        font-family="'Poppins','Segoe UI',system-ui,sans-serif">36/9</text>
                    <text x="150" y="170" text-anchor="middle" font-size="14" fill="#8a8fa3"
                        font-family="'Poppins','Segoe UI',system-ui,sans-serif">Completion</text>
                </svg>
            </div>
        </div>

        <div class="chart-card">
            <div class="chart-title chart-title--bold">Priority Breakdown</div>

            <svg class="bar-svg" viewBox="0 0 380 250" style="max-height:210px;">
                <!-- Bar 1: High (red) -->
                <rect x="39" y="41" width="82" height="194" rx="7" fill="#e53935" />
                <text x="80" y="80" text-anchor="middle" font-size="16" font-weight="700" fill="#fff"
                    font-family="'Poppins','Segoe UI',system-ui,sans-serif">90%</text>

                <!-- Bar 2: Medium (orange) -->
                <rect x="149" y="106" width="82" height="129" rx="7" fill="#fb8c00" />
                <text x="190" y="145" text-anchor="middle" font-size="16" font-weight="700" fill="#fff"
                    font-family="'Poppins','Segoe UI',system-ui,sans-serif">60%</text>

                <!-- Bar 3: Low (green) -->
                <rect x="259" y="149" width="82" height="86" rx="7" fill="#43a047" />
                <text x="300" y="188" text-anchor="middle" font-size="16" font-weight="700" fill="#fff"
                    font-family="'Poppins','Segoe UI',system-ui,sans-serif">40%</text>
            </svg>
            <div class="legend">
                <div class="legend-item">
                    <span class="legend-dot" style="background:#e53935;"></span>High : 5
                </div>
                <div class="legend-item">
                    <span class="legend-dot" style="background:#fb8c00;"></span>Medium: 13
                </div>
                <div class="legend-item">
                    <span class="legend-dot" style="background:#43a047;"></span>Low : 5
                </div>
            </div>
        </div>

        <!-- ── Task Type Distribution ── -->
        <div class="chart-card">
            <div class="chart-title">Task Type Distribution</div>
            <div class="donut-wrap">
                <svg viewBox="0 0 320 320" width="100%" style="max-height:260px;">
                    <!-- Follow up (orange) 0°→10.8°, large=0 -->
                    <path d="M160,40 A120,120,0,0,1,182.49,42.12 L174.06,86.33 A75,75,0,0,0,160,85 Z" fill="#ff9800"
                        stroke="white" stroke-width="2" />
                    <!-- Call (blue) 10.8°→64.8°, large=0 -->
                    <path d="M182.49,42.12 A120,120,0,0,1,268.58,108.9 L227.86,128.07 A75,75,0,0,0,174.06,86.33 Z"
                        fill="#2196f3" stroke="white" stroke-width="2" />
                    <!-- Meeting (cyan) 64.8°→252°, span=187.2°, large=1 -->
                    <path d="M268.58,108.9 A120,120,0,1,1,45.87,197.08 L88.67,183.18 A75,75,0,1,0,227.86,128.07 Z"
                        fill="#00bcd4" stroke="white" stroke-width="2" />
                    <!-- Email (purple) 252°→360°, large=0 -->
                    <path d="M45.87,197.08 A120,120,0,0,1,160,40 L160,85 A75,75,0,0,0,88.67,183.18 Z" fill="#9c27b0"
                        stroke="white" stroke-width="2" />
                    <!-- Center text -->
                    <text x="160" y="153" text-anchor="middle" font-size="38" font-weight="800" fill="#1a1a2e"
                        font-family="'Poppins','Segoe UI',system-ui,sans-serif">74</text>
                    <text x="160" y="179" text-anchor="middle" font-size="14" fill="#8a8fa3"
                        font-family="'Poppins','Segoe UI',system-ui,sans-serif">Total</text>
                </svg>
            </div>
            <div class="legend">
                <div class="legend-item"><span class="legend-dot" style="background:#2196f3;"></span>Call</div>
                <div class="legend-item"><span class="legend-dot" style="background:#9c27b0;"></span>Email</div>
                <div class="legend-item"><span class="legend-dot" style="background:#00bcd4;"></span>Meeting</div>
                <div class="legend-item"><span class="legend-dot" style="background:#ff9800;"></span>Follow up</div>
            </div>
        </div>

    </div><!-- /charts-grid -->

</div><!-- /wrapper -->