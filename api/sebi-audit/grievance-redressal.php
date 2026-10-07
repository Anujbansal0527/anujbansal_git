<?php
include 'api_helper.php';

$config_datas = rv_getConfigData();

if (!empty($config_datas['ernwebsitename'])) {
    $websitename = $config_datas['ernwebsitename'] ?? '';

} else {
    $websitename = $config_datas['websitename'] ?? '';

}
$rvclientname = $config_datas['clientname'] ?? '';
$rvdesignation = $config_datas['designation'] ?? '';
$rvmobile = $config_datas['mobile'] ?? '';
$rvemail = $config_datas['email'] ?? '';
$rvaddress = $config_datas['address'] ?? '';
$rvworkinghours = $config_datas['workinghours'] ?? '';

$mfarn = $config_datas['mfarn'] ?? '';


$pgroname = $config_datas['grievance_redressal']['pgroname'] ?? '';
$pgroemail = $config_datas['grievance_redressal']['pgroemail'] ?? '';
$pgromobile = $config_datas['grievance_redressal']['pgromobile'] ?? '';
$pgroaddress = $config_datas['grievance_redressal']['pgroaddress'] ?? '';

if (!empty($config_datas['apmi'])) {
    $rvapmi1 = '/PMS';
}
if (!empty($config_datas['irdai'])) {
    $rvirdai1 = '/IRDAI';
}

$arn_text = '';
if (!empty($mfarn)) {
    $arn_text = "(ARN: $mfarn)";
}

$html = '';
$html .= '';
$html .= '<div class="rvgrievance-redressal">';
$html .= '<h6 class=\'rgrh61\'>GRIEVANCE REDRESSAL</h6><p class=\'rgrp1\'><b class=\'rgrb1\'>' . htmlspecialchars($websitename);
$html .= '</b></b> is committed to prompt, fair, and transparent resolution of investor complaints and grievances in accordance with applicable regulatory guidelines.</p><h6 class=\'rgrh62\'>Grievance Redressal Officer (GRO)</h6><p class=\'rgrp2\'>';

if (!empty($pgroname)) {
    $html .= '<b class=\'rgrb2\'>Name: </b>' . htmlspecialchars($pgroname) . '<br class=\'rgrbr1\'>';
} else {
    if (!empty($rvclientname)) {
        $html .= '<b class=\'rgrb3\'>Name: </b>' . htmlspecialchars($rvclientname) . '<br class=\'rgrbr2\'>';
    }
}

if (!empty($rvdesignation)) {
    $html .= '<b class=\'rgrb4\'>Designation: </b>' . htmlspecialchars($rvdesignation) . '<br class=\'rgrbr3\'>';
}

if (!empty($pgroemail)) {
    $html .= '<b class=\'rgrb5\'>Email: </b><a class=\'rgra1\' href="mailto:' . htmlspecialchars($pgroemail) . '">' . htmlspecialchars($pgroemail) . '</a><br class=\'rgrbr4\'>';
} else {
    if (!empty($rvemail)) {
        $html .= '<b class=\'rgrb6\'>Email: </b><a class=\'rgra2\' href="mailto:' . htmlspecialchars($rvemail) . '">' . htmlspecialchars($rvemail) . '</a><br class=\'rgrbr5\'>';
    }
}

if (!empty($pgromobile)) {
    $html .= '<b class=\'rgrb7\'>Phone: </b><a class=\'rgra3\' href="tel:' . htmlspecialchars($pgromobile) . '">' . htmlspecialchars($pgromobile) . '</a><br class=\'rgrbr6\'>';
} else {
    if (!empty($rvmobile)) {
        $html .= '<b class=\'rgrb8\'>Phone: </b><a class=\'rgra4\' href="tel:' . htmlspecialchars($rvmobile) . '">' . htmlspecialchars($rvmobile) . '</a><br class=\'rgrbr7\'>';
    }
}

if (!empty($pgroaddress)) {
    $html .= '<b class=\'rgrb9\'>Office Address: </b>' . htmlspecialchars($pgroaddress) . '<br class=\'rgrbr8\'>';
} else {
    if (!empty($rvaddress)) {
        $html .= '<b class=\'rgrb10\'>Office Address: </b>' . htmlspecialchars($rvaddress) . '<br class=\'rgrbr9\'>';
    }
}

if (!empty($rvworkinghours)) {
    $html .= '<b class=\'rgrb11\'>Business Hours: </b>' . htmlspecialchars($rvworkinghours) . '</p>';
}

$html .= '<h6 class=\'rgrh63\'>How to Submit a Complaint</h6><p class=\'rgrp3\'>Complaints or grievances may be submitted through any of the following channels:</p><ul class=\'rgrul1\'><li class=\'rgrli1\'>Email to the registered email address</li><li class=\'rgrli2\'>Submission through the website contact form</li><li class=\'rgrli3\'>In person at the registered office</li><li class=\'rgrli4\'>Any other officially communicated channel</li></ul>';

$html .= '<h6 class=\'rgrh64\'>Complaint Resolution Process</h6><div class="table-responsive rgrht066 mt-3"> <table class="table table-bordered"> <thead class="table-dark"> <tr> <th>Step</th> <th>Action</th> <th>Responsibility</th> <th>Timeline</th> </tr> </thead> <tbody> <tr> <td>1</td> <td>Complaint received and logged</td> <td>GRO / Office team</td> <td>Day 0</td> </tr> <tr> <td>2</td> <td>Written acknowledgement sent to investor</td> <td>GRO</td> <td>Within 3 working days</td> </tr> <tr> <td>3</td> <td>Investigation and resolution</td> <td>GRO + concerned partner</td> <td>Within 7 - 15 working days</td> </tr> <tr> <td>4</td> <td>Response communicated to investor</td> <td>GRO</td> <td>Within 7 working days</td> </tr> <tr> <td>5</td> <td>If unresolved, escalation to senior partner</td> <td>Designated Partner</td> <td>Within 15 working days</td> </tr> <tr> <td>6</td> <td>Complaint closure and feedback</td> <td>GRO</td> <td>Upon resolution</td> </tr> </tbody> </table> </div>';

$html .= '<h6 class=\'rgrh64\'>Escalation Matrix</h6><div class="table-responsive mt-3 rgrht065"> <table class="table table-bordered"> <thead class="table-dark"><tr><th>Level</th><th>Contact</th><th>Mode</th><th>Timeline</th></tr></thead><tbody>';


if (!empty($config_datas['grievance_redressal']['escalation'])) {



    foreach ($config_datas['grievance_redressal']['escalation'] as $egrlevelitems) {
        $html .= '<tr><td>Level <span class="rgrht0sid' . $egrlevelitems['id'] . '">' . $egrlevelitems['id'] . '</span> </td><td>';

        if (!empty($egrlevelitems['egrlevelname'])) {
            $html .= $egrlevelitems['egrlevelname'] . ' (GRO)';
        }
        if (!empty($egrlevelitems['egrlevelemail'])) {
            $html .= ' | <a href="mailto:' . $egrlevelitems['egrlevelemail'] . '">' . $egrlevelitems['egrlevelemail'] . '</a> | ';
        }
        if (!empty($egrlevelitems['egrlevelmobile'])) {
            $html .= ' <a href="tel:' . $egrlevelitems['egrlevelmobile'] . '">' . $egrlevelitems['egrlevelmobiletitle'] . '</a>';
        }

        $html .= '</td><td>Email / Phone / In person</td> <td>Ack: 3 days Resolve: 7 - 15 days</td></tr></tr>';

    }

    $html .= '</tr><tr> <td>Level <span class="rgrht0sid' . $count = count($config_datas['grievance_redressal']['escalation']) + 1 . '">' . $count = count($config_datas['grievance_redressal']['escalation']) + 1 . '<span></td> <td>Designated Partner ' . htmlspecialchars($rvemail) . '</td> <td>Email / In person</td> <td>14 working days</td> </tr> <tr> <td>Level <span class="rgrht0sid' . $count = count($config_datas['grievance_redressal']['escalation']) + 2 . '">' . $count = count($config_datas['grievance_redressal']['escalation']) + 2 . '</span></td> <td>Concerned AMC ' . $rvapmi1 . '' . $rvirdai1 . ' Provider</td> <td>As per AMC' . $rvapmi1 . '' . $rvirdai1 . ' grievance policy</td> <td>As per their policy</td> </tr>';
} else {
    $html .= '<tr><td>Level 1</td><td>';

    if (!empty($pgroname)) {
        $html .= htmlspecialchars($pgroname) . ' (GRO) | ';
    } else {
        if (!empty($rvclientname)) {
            $html .= htmlspecialchars($rvclientname) . ' (GRO) | ';
        }
    }


    if (!empty($pgroemail)) {
        $html .= '<a href="mailto:' . htmlspecialchars($pgroemail) . '">' . htmlspecialchars($pgroemail) . '</a> | ';
    } else {
        if (!empty($rvemail)) {
            $html .= '<a href="mailto:' . htmlspecialchars($rvemail) . '">' . htmlspecialchars($rvemail) . '</a> | ';
        }
    }


    if (!empty($pgromobile)) {
        $html .= ' <a href="tel:' . htmlspecialchars($pgromobile) . '">' . htmlspecialchars($pgromobile) . '</a>';
    } else {
        if (!empty($rvmobile)) {
            $html .= ' <a href="tel:' . htmlspecialchars($rvmobile) . '">' . htmlspecialchars($rvmobile) . '</a>';
        }
    }





    $html .= '</td><td>Email / Phone / In person</td> <td>Ack: 3 days Resolve: 7 - 15 days</td></tr></tr><tr> <td>Level 2</td> <td>Designated Partner ' . htmlspecialchars($rvemail) . '</td> <td>Email / In person</td> <td>14 working days</td> </tr> <tr> <td>Level 3</td> <td>Concerned AMC ' . $rvapmi1 . '' . $rvirdai1 . ' Provider</td> <td>As per AMC' . $rvapmi1 . '' . $rvirdai1 . ' grievance policy</td> <td>As per their policy</td> </tr>';

}

$html .= ' </tbody> </table> </div>';

$html .= '<h6 class=\'rgrh64\'>Complaint Handling</h6><p class=\'rgrp4\'>All complaints received are recorded and reviewed. Appropriate action is taken to address the concern and a response is communicated to the investor.</p><p class=\'rgrp5\'>Complaints are acknowledged and addressed in a timely manner, depending on the nature and complexity of the grievance.</p><h6 class=\'rgrh65\'>Escalation Mechanism</h6><p class=\'rgrp6\'>If a complaint is not resolved satisfactorily, it may be escalated internally to the designated authority within the organization.</p><p class=\'rgrp7\'>Investors may also approach the following platforms:</p><ul class=\'rgrul2\'><li class=\'rgrli5\'>SEBI SCORES: <a href="https://scores.sebi.gov.in/" target="_">https://scores.sebi.gov.in/</a></li><li class=\'rgrli6\'>SMART ODR: <a href="https://smartodr.in" target="_">https://smartodr.in</a></li></ul><p class=\'rgrp8\'>Investors may also contact the respective product provider (such as Asset Management Company or other intermediaries) as per their grievance redressal mechanism.</p><h6 class=\'rgrh66\'>Note</h6><p class=\'rgrp9\'>This grievance redressal mechanism is intended to facilitate fair handling of investor concerns in accordance with applicable regulatory requirements.</p>';


$html .= '</div>';
$html .= '';
$response = [
    "grievance_redressal" => $html
];

echo json_encode($response);
exit;
?>