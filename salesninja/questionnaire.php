<?php
$questionnaireData = [
    [
        'id' => '1',
        'imgsrc' => 'lead-management.webp',
        'title' => 'Lead Management',
        'subtitle' => 'LEADS',
        'usubtitle' => 'Everything in one place',
        'teburl' => 'Leads',
        'discr' => 'Capture, organize, and track every lead from first contact to investor conversion.',
        'keybenefits' => [
            ['list' => 'Manage all leads from a single dashboard',],
            ['list' => 'Track lead source, stage & investment potential ',],
            ['list' => 'View complete client interaction history ',],
            ['list' => 'Schedule follow-ups and reminders ',],
            ['list' => 'Identify hot prospects faster ',],
            ['list' => 'Never lose a lead to missed tracking ',],

        ],
    ],
    [
        'id' => '2',
        'imgsrc' => 'smart-follow-up-management.webp',
        'title' => 'Smart Follow-up Management',
        'subtitle' => 'FOLLOW-UPS',
        'usubtitle' => 'Never miss an opportunity',
        'teburl' => 'follow-ups',
        'discr' => 'Stay on top of every prospect with timely reminders and activity tracking. ',
        'keybenefits' => [
            ['list' => 'Schedule follow-ups in seconds',],
            ['list' => 'Monitor pending & overdue activities',],
            ['list' => 'Prioritize high-value prospects',],
            ['list' => 'Track communication outcomes',],
            ['list' => 'Improve response consistency',],
            ['list' => 'Increase conversion opportunities',],

        ],
    ],
    [
        'id' => '3',
        'imgsrc' => 'opportunity-tracking.webp',
        'title' => 'Opportunity Tracking',
        'subtitle' => 'PIPELINE',
        'usubtitle' => 'Know where every lead stands',
        'teburl' => 'pipeline',
        'discr' => 'Monitor prospects through every stage of your sales journey.',
        'keybenefits' => [
            ['list' => 'Track status from Approach to Closure',],
            ['list' => 'View stage-wise lead distribution',],
            ['list' => 'Monitor expected investment values',],
            ['list' => 'Identify stalled opportunities',],
            ['list' => 'Focus on conversion-ready prospects',],
            ['list' => 'Maintain complete sales visibility',],

        ],
    ],
    [
        'id' => '4',
        'imgsrc' => 'client-interaction-history.webp',
        'title' => 'Client Interaction History',
        'subtitle' => 'INTERACTIONS',
        'usubtitle' => 'Every conversation recorded',
        'teburl' => 'interactions',
        'discr' => 'Access a complete record of all client communications in one place.',
        'keybenefits' => [
            ['list' => 'Store calls, meetings & notes',],
            ['list' => 'Track communication frequency',],
            ['list' => 'Access discussion history instantly',],
            ['list' => 'Maintain continuity across teams',],
            ['list' => 'Reduce missed commitments',],
            ['list' => 'Deliver personalized client experiences',],

        ],
    ],
    [
        'id' => '5',
        'imgsrc' => 'task-management.webp',
        'title' => 'Task Management',
        'subtitle' => 'TASKS',
        'usubtitle' => 'Stay organized every day',
        'teburl' => 'tasks',
        'discr' => 'Manage daily activities, priorities, and deadlines with ease.',
        'keybenefits' => [
            ['list' => 'Create and assign tasks',],
            ['list' => 'Set priorities and due dates',],
            ['list' => 'Monitor completion status',],
            ['list' => 'Improve team accountability',],
            ['list' => 'Reduce operational delays',],
            ['list' => 'Keep important activities on track',],

        ],
    ],
    [
        'id' => '6',
        'imgsrc' => 'portfolio-review-management.webp',
        'title' => 'Portfolio Review Management',
        'subtitle' => 'REVIEWS',
        'usubtitle' => 'Strengthen investor relationships',
        'teburl' => 'reviews',
        'discr' => 'Plan, schedule, and document investor review meetings efficiently.',
        'keybenefits' => [
            ['list' => 'Schedule portfolio review meetings',],
            ['list' => 'Maintain review notes & action items',],
            ['list' => 'Track pending reviews',],
            ['list' => 'Improve client engagement',],
            ['list' => 'Create future investment opportunities',],
            ['list' => 'Deliver more structured advisory service',],

        ],
    ],
    [
        'id' => '7',
        'imgsrc' => 'wealth-management-integration.webp',
        'title' => 'Wealth Management Integration',
        'subtitle' => 'INTEGRATION',
        'usubtitle' => 'Connected workflow',
        'teburl' => 'integration',
        'discr' => 'Move seamlessly from lead management to investment execution.',
        'keybenefits' => [
            ['list' => 'Sync with Wealth Elite platform',],
            ['list' => 'Eliminate duplicate data entry',],
            ['list' => 'Reduce operational effort',],
            ['list' => 'Access lead & investor data together',],
            ['list' => 'Create a connected business workflow',],
            ['list' => 'Convert prospects into investors faster',],
        ],
    ],
    [
        'id' => '8',
        'imgsrc' => 'user-team-management.webp',
        'title' => 'User & Team Management',
        'subtitle' => 'MANAGEMENT',
        'usubtitle' => 'Built for growing teams',
        'teburl' => 'management',
        'discr' => 'Control access, monitor activities, and manage teams efficiently.',
        'keybenefits' => [
            ['list' => 'Create multiple user accounts',],
            ['list' => 'Manage access permissions',],
            ['list' => 'Track team activities',],
            ['list' => 'Improve operational control',],
            ['list' => 'Enhance collaboration',],
            ['list' => 'Scale your business with confidence',],
        ],
    ],

];
?>
<section class="questionnaire-section main-section" id="questionnaire">
    <div class="rvintegration-container">
        <div class="rev text-center section-hadding on">
            <div class="sec-label">Elevate </div>
            <h2 class="sec-h2">Features That <br> <em> Elevate </em> Your Business</h2>
            <!-- <p> No hidden fees. Cancel anytime. Launch offer available for a limited time.</p> -->
        </div>
        <div class="questions-nrow">
            <div class="questions-left">
                <div class="questions-list">
                    <ul class="questions-ulist">
                        <?php foreach ($questionnaireData as $questionnaireitems) { ?>
                            <li class="questtoggale <?php if ($questionnaireitems['id'] == '1'):
                                echo 'active';
                            endif; ?>" data-teburl="<?= $questionnaireitems['teburl']; ?>">
                                <div class="questions-row ">
                                    <span class="icone">
                                        <img src="<?= $config['rvuserinfo']['base_url']; ?>assets/salesninjacrm/reviews/<?= $questionnaireitems['imgsrc']; ?>"
                                            alt="<?= $questionnaireitems['title']; ?>">
                                    </span>
                                    <div class="m-title">
                                        <h6><?= $questionnaireitems['subtitle']; ?></h6>
                                        <h4><?= $questionnaireitems['title']; ?></h4>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                        <span class="dotanim"></span>

                    </ul>
                </div>
            </div>
            <div class="questions-right">
                <?php foreach ($questionnaireData as $questionnaireitems) { ?>
                    <div class="questions-disc <?php if ($questionnaireitems['id'] == '1'):
                        echo 'active';
                    endif; ?> " data-id="<?= $questionnaireitems['teburl']; ?>">
                        <span class="shownumber">0<?= $questionnaireitems['id']; ?></span>
                        <div class="smalltitle">
                            <span class="icone">
                                <img src="<?= $config['rvuserinfo']['base_url']; ?>assets/salesninjacrm/reviews/<?= $questionnaireitems['imgsrc']; ?>"
                                    alt="<?= $questionnaireitems['title']; ?>">
                            </span>
                            <span class="titlename"><b><?= $questionnaireitems['subtitle']; ?></b> -
                                <?= $questionnaireitems['usubtitle']; ?></span>
                        </div>
                        <div class="title">
                            <h3><?= $questionnaireitems['title']; ?></h3>
                            <p><?= $questionnaireitems['discr']; ?></p>
                        </div>
                        <div class="ullist">
                            <ul>
                                <?php foreach ($questionnaireitems['keybenefits'] as $listitome) { ?>
                                    <li><span><img
                                                src="<?= $config['rvuserinfo']['base_url']; ?>assets/salesninjacrm/reviews/check.svg"
                                                alt="check"></span><?= $listitome['list']; ?>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>