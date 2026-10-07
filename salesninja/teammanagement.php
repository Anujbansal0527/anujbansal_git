<style>
    .teammanagement {
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
            font-family: inherit;
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

        .btn-primary {
            background: #e53935;
            color: #fff;
            font-weight: 600;
            border: 1.5px solid transparent;
        }

        .btn-primary:hover {
            background: #c62828;
        }

        /* ── Stat Cards ──────────────────────────────────── */
        .stats-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
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
            min-height: 120px;
        }

        .stat-card--blue {
            border: 1.5px solid #90caf9;
        }

        .stat-card--green {
            border: 1.5px solid #81c784;
        }

        .stat-text {
            position: relative;
            z-index: 1;
        }

        .stat-number {
            font-size: 42px;
            font-weight: 800;
            color: #1a1a2e;
            line-height: 1;
        }

        .stat-label {
            font-size: 15px;
            color: #8a8fa3;
            margin-top: 10px;
            font-weight: 400;
        }

        /* Diamond shape */
        .diamond {
            width: 100px;
            height: 100px;
            border-radius: 14px;
            transform: rotate(45deg);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            position: absolute;
            right: -24px;
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

        /* ── Toolbar (search) ────────────────────────────── */
        .toolbar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .search-box {
            display: flex;
            align-items: center;
            gap: 8px;
            border: 1.5px solid #dde1ea;
            border-radius: 8px;
            padding: 9px 14px;
            width: 280px;
            background: #fff;
        }

        .search-box input {
            border: none;
            outline: none;
            font-size: 14px;
            width: 100%;
            color: #555;
            background: transparent;
            font-family: inherit;
        }

        .search-box input::placeholder {
            color: #b0b5c4;
        }

        /* ── Teams Grid ──────────────────────────────────── */
        .teams-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        /* ── Individual Team Card ────────────────────────── */
        .team-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #ebebeb;
        }

        .team-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 20px;
            background: #f0f2f5;
            border-bottom: 1px solid #e8eaed;
        }

        .team-name {
            font-size: 15px;
            font-weight: 600;
            color: #1a1a2e;
        }

        .team-controls {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        /* Toggle */
        .toggle {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 26px;
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
            border-radius: 26px;
            transition: background 0.25s;
        }

        .toggle-track::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
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
            transform: translateX(24px);
        }

        /* Three-dot menu button */
        .dots-btn {
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px 6px;
            border-radius: 6px;
            color: #8a8fa3;
            font-size: 18px;
            font-weight: 700;
            line-height: 1;
            letter-spacing: 1px;
            transition: background 0.15s;
            display: flex;
            align-items: center;
            gap: 3px;
        }

        .dots-btn:hover {
            background: #e0e3ea;
        }

        .dot {
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background: #8a8fa3;
            display: block;
        }

        /* Team body with two mini-stat cards */
        .team-body {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            padding: 20px;
        }

        .mini-stat {
            background: #fff;
            border: 1.5px solid #ebebeb;
            border-radius: 10px;
            padding: 18px 16px;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .mini-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .mini-icon--blue {
            background: #e3f2fd;
        }

        .mini-icon--purple {
            background: #f3e5f5;
        }

        .mini-info {}

        .mini-number {
            font-size: 26px;
            font-weight: 700;
            color: #1a1a2e;
            line-height: 1;
        }

        .mini-label {
            font-size: 13px;
            color: #8a8fa3;
            margin-top: 4px;
        }

        /* ── Responsive ──────────────────────────────────── */
        @media (max-width: 1100px) {}

        @media (max-width: 860px) {
            .stats-grid {
                grid-template-columns: 1fr 1fr;
                gap: 16px;
            }

            .teams-grid {
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
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .search-box {
                width: 100%;
            }

            .toolbar {
                justify-content: stretch;
            }
        }

        @media (max-width: 420px) {
            .btn {
                padding: 9px 14px;
                font-size: 13px;
            }



            .team-body {
                grid-template-columns: 1fr;
                gap: 12px;
            }
        }
    }
</style>
<div class="wrapper">

    <!-- ══ Header ══════════════════════════════════════════ -->
    <header class="page-header">
        <div class="page-title">
            <h1>Team Managment</h1>
            <p class="breadcrumb">Dashboard &bull; <span class="crumb-active">Team Managment</span></p>
        </div>
        <div class="header-actions">
            <button class="btn btn-outline">
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
                Create Team
            </button>
        </div>
    </header>

    <!-- ══ Stat Cards ══════════════════════════════════════ -->
    <div class="stats-grid">

        <!-- Total Teams -->
        <div class="stat-card stat-card--blue">
            <div class="stat-text">
                <div class="stat-number">09</div>
                <div class="stat-label">Total Teams</div>
            </div>
            <div class="diamond">
                <svg width="44" height="44" viewBox="0 0 24 24" fill="#1565c0">
                    <path d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5z
                   M12 14c-3.337 0-10 1.676-10 5v2h20v-2c0-3.324-6.663-5-10-5z" />
                </svg>
            </div>
        </div>

        <!-- Total Member -->
        <div class="stat-card stat-card--green">
            <div class="stat-text">
                <div class="stat-number">29</div>
                <div class="stat-label">Total Member</div>
            </div>
            <div class="diamond">
                <svg width="46" height="44" viewBox="0 0 28 24" fill="none">
                    <!-- Person silhouette -->
                    <path d="M10 12c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5z
                   M10 14c-3.337 0-10 1.676-10 5v1h20v-1c0-3.324-6.663-5-10-5z" fill="#2e7d32" />
                    <!-- Plus sign -->
                    <line x1="23" y1="6" x2="23" y2="14" stroke="#2e7d32" stroke-width="2.4" stroke-linecap="round" />
                    <line x1="19" y1="10" x2="27" y2="10" stroke="#2e7d32" stroke-width="2.4" stroke-linecap="round" />
                </svg>
            </div>
        </div>

    </div><!-- /stats-grid -->

    <!-- ══ Search Toolbar ══════════════════════════════════ -->
    <div class="toolbar">
        <div class="search-box">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#aab0c3" stroke-width="2.2"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>
            <input type="text" placeholder="Search...">
        </div>
    </div>

    <!-- ══ Teams Grid ═══════════════════════════════════════ -->
    <div class="teams-grid">

        <!-- Team Card 1 -->
        <div class="team-card">
            <div class="team-header">
                <span class="team-name">Alpha Support Team</span>
                <div class="team-controls">
                    <label class="toggle">
                        <input type="checkbox" checked>
                        <span class="toggle-track"></span>
                    </label>
                    <button class="dots-btn" title="More options">
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </button>
                </div>
            </div>
            <div class="team-body">
                <!-- Members -->
                <div class="mini-stat">
                    <div class="mini-icon mini-icon--blue">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                            <circle cx="9" cy="7" r="3.5" fill="#1565c0" />
                            <circle cx="16" cy="7" r="2.8" fill="#1565c0" opacity="0.65" />
                            <path d="M1 20c0-3.5 3.6-6 8-6s8 2.5 8 6" fill="#1565c0" />
                            <path d="M16.5 14c2.5.8 4.5 2.5 4.5 5" stroke="#1565c0" stroke-width="2" fill="none"
                                stroke-linecap="round" opacity="0.65" />
                        </svg>
                    </div>
                    <div class="mini-info">
                        <div class="mini-number">12</div>
                        <div class="mini-label">Members</div>
                    </div>
                </div>
                <!-- Leads -->
                <div class="mini-stat">
                    <div class="mini-icon mini-icon--purple">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                            <rect x="4" y="2" width="14" height="19" rx="2.5" fill="#7b1fa2" opacity="0.15"
                                stroke="#7b1fa2" stroke-width="1.5" />
                            <line x1="8" y1="7.5" x2="16" y2="7.5" stroke="#7b1fa2" stroke-width="1.5"
                                stroke-linecap="round" />
                            <line x1="8" y1="11" x2="16" y2="11" stroke="#7b1fa2" stroke-width="1.5"
                                stroke-linecap="round" />
                            <line x1="8" y1="14.5" x2="13" y2="14.5" stroke="#7b1fa2" stroke-width="1.5"
                                stroke-linecap="round" />
                        </svg>
                    </div>
                    <div class="mini-info">
                        <div class="mini-number">9</div>
                        <div class="mini-label">Leads</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Card 2 -->
        <div class="team-card">
            <div class="team-header">
                <span class="team-name">Beta Response Team</span>
                <div class="team-controls">
                    <label class="toggle">
                        <input type="checkbox" checked>
                        <span class="toggle-track"></span>
                    </label>
                    <button class="dots-btn" title="More options">
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </button>
                </div>
            </div>
            <div class="team-body">
                <div class="mini-stat">
                    <div class="mini-icon mini-icon--blue">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                            <circle cx="9" cy="7" r="3.5" fill="#1565c0" />
                            <circle cx="16" cy="7" r="2.8" fill="#1565c0" opacity="0.65" />
                            <path d="M1 20c0-3.5 3.6-6 8-6s8 2.5 8 6" fill="#1565c0" />
                            <path d="M16.5 14c2.5.8 4.5 2.5 4.5 5" stroke="#1565c0" stroke-width="2" fill="none"
                                stroke-linecap="round" opacity="0.65" />
                        </svg>
                    </div>
                    <div class="mini-info">
                        <div class="mini-number">74</div>
                        <div class="mini-label">Members</div>
                    </div>
                </div>
                <div class="mini-stat">
                    <div class="mini-icon mini-icon--purple">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                            <rect x="4" y="2" width="14" height="19" rx="2.5" fill="#7b1fa2" opacity="0.15"
                                stroke="#7b1fa2" stroke-width="1.5" />
                            <line x1="8" y1="7.5" x2="16" y2="7.5" stroke="#7b1fa2" stroke-width="1.5"
                                stroke-linecap="round" />
                            <line x1="8" y1="11" x2="16" y2="11" stroke="#7b1fa2" stroke-width="1.5"
                                stroke-linecap="round" />
                            <line x1="8" y1="14.5" x2="13" y2="14.5" stroke="#7b1fa2" stroke-width="1.5"
                                stroke-linecap="round" />
                        </svg>
                    </div>
                    <div class="mini-info">
                        <div class="mini-number">52</div>
                        <div class="mini-label">Leads</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Card 3 -->
        <div class="team-card">
            <div class="team-header">
                <span class="team-name">Gamma Sales Team</span>
                <div class="team-controls">
                    <label class="toggle">
                        <input type="checkbox" checked>
                        <span class="toggle-track"></span>
                    </label>
                    <button class="dots-btn" title="More options">
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </button>
                </div>
            </div>
            <div class="team-body">
                <div class="mini-stat">
                    <div class="mini-icon mini-icon--blue">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                            <circle cx="9" cy="7" r="3.5" fill="#1565c0" />
                            <circle cx="16" cy="7" r="2.8" fill="#1565c0" opacity="0.65" />
                            <path d="M1 20c0-3.5 3.6-6 8-6s8 2.5 8 6" fill="#1565c0" />
                            <path d="M16.5 14c2.5.8 4.5 2.5 4.5 5" stroke="#1565c0" stroke-width="2" fill="none"
                                stroke-linecap="round" opacity="0.65" />
                        </svg>
                    </div>
                    <div class="mini-info">
                        <div class="mini-number">18</div>
                        <div class="mini-label">Members</div>
                    </div>
                </div>
                <div class="mini-stat">
                    <div class="mini-icon mini-icon--purple">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                            <rect x="4" y="2" width="14" height="19" rx="2.5" fill="#7b1fa2" opacity="0.15"
                                stroke="#7b1fa2" stroke-width="1.5" />
                            <line x1="8" y1="7.5" x2="16" y2="7.5" stroke="#7b1fa2" stroke-width="1.5"
                                stroke-linecap="round" />
                            <line x1="8" y1="11" x2="16" y2="11" stroke="#7b1fa2" stroke-width="1.5"
                                stroke-linecap="round" />
                            <line x1="8" y1="14.5" x2="13" y2="14.5" stroke="#7b1fa2" stroke-width="1.5"
                                stroke-linecap="round" />
                        </svg>
                    </div>
                    <div class="mini-info">
                        <div class="mini-number">24</div>
                        <div class="mini-label">Leads</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Team Card 4 -->
        <div class="team-card">
            <div class="team-header">
                <span class="team-name">Delta Marketing Team</span>
                <div class="team-controls">
                    <label class="toggle">
                        <input type="checkbox">
                        <span class="toggle-track"></span>
                    </label>
                    <button class="dots-btn" title="More options">
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </button>
                </div>
            </div>
            <div class="team-body">
                <div class="mini-stat">
                    <div class="mini-icon mini-icon--blue">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                            <circle cx="9" cy="7" r="3.5" fill="#1565c0" />
                            <circle cx="16" cy="7" r="2.8" fill="#1565c0" opacity="0.65" />
                            <path d="M1 20c0-3.5 3.6-6 8-6s8 2.5 8 6" fill="#1565c0" />
                            <path d="M16.5 14c2.5.8 4.5 2.5 4.5 5" stroke="#1565c0" stroke-width="2" fill="none"
                                stroke-linecap="round" opacity="0.65" />
                        </svg>
                    </div>
                    <div class="mini-info">
                        <div class="mini-number">25</div>
                        <div class="mini-label">Members</div>
                    </div>
                </div>
                <div class="mini-stat">
                    <div class="mini-icon mini-icon--purple">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                            <rect x="4" y="2" width="14" height="19" rx="2.5" fill="#7b1fa2" opacity="0.15"
                                stroke="#7b1fa2" stroke-width="1.5" />
                            <line x1="8" y1="7.5" x2="16" y2="7.5" stroke="#7b1fa2" stroke-width="1.5"
                                stroke-linecap="round" />
                            <line x1="8" y1="11" x2="16" y2="11" stroke="#7b1fa2" stroke-width="1.5"
                                stroke-linecap="round" />
                            <line x1="8" y1="14.5" x2="13" y2="14.5" stroke="#7b1fa2" stroke-width="1.5"
                                stroke-linecap="round" />
                        </svg>
                    </div>
                    <div class="mini-info">
                        <div class="mini-number">41</div>
                        <div class="mini-label">Leads</div>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /teams-grid -->
</div><!-- /wrapper -->