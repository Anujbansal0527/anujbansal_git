<?php
 

function rvFetchSingleData($con, $id, $column, $table)
{
// Create a prepared statement
$stmt = mysqli_prepare($con, "SELECT * FROM $table WHERE $column = ? ORDER BY id DESC LIMIT 1");
if ($stmt === false) {
// Log the error and handle it gracefully
error_log('Prepare failed: ' . mysqli_error($con));
return false; // Return false or handle the error accordingly
}
// Bind the id parameter to the prepared statement
mysqli_stmt_bind_param($stmt, 'i', $id);

// Execute the query
if (!mysqli_stmt_execute($stmt)) {
// Log the error and handle it gracefully
error_log('Execute failed: ' . mysqli_stmt_error($stmt));
return false; // Return false or handle the error accordingly
}
// Get the result set from the prepared statement
$result = mysqli_stmt_get_result($stmt);
if ($result === false) {
// Log the error and handle it gracefully
error_log('Get result failed: ' . mysqli_stmt_error($stmt));
return false; // Return false or handle the error accordingly
}
// Fetch the row as an associative array
$row = mysqli_fetch_assoc($result);
// Free the result set
mysqli_free_result($result);
// Close the statement
mysqli_stmt_close($stmt);

return $row;
}
$rvuserinfo = rvFetchSingleData($con, 1, 'id', 'admin');



// FETCH ALL DATA
function rvFetchAllData($con, $table)
{
// Create a prepared statement
$stmt = mysqli_prepare($con, "SELECT * FROM $table");
if ($stmt === false) {
// Handle error - in a real-world application, you might log this and return an appropriate response
die('Prepare failed: ' . htmlspecialchars(mysqli_error($con)));
}
// Execute query
if (!mysqli_stmt_execute($stmt)) {
// Handle error - in a real-world application, you might log this and return an appropriate response
die('Execute failed: ' . htmlspecialchars(mysqli_stmt_error($stmt)));
}
// Get the result set from the prepared statement
$resultAll = mysqli_stmt_get_result($stmt);
if ($resultAll === false) {
// Handle error - in a real-world application, you might log this and return an appropriate response
die('Get result failed: ' . htmlspecialchars(mysqli_stmt_error($stmt)));
}
// Fetch all rows as an associative array
$dataAll = [];
while ($row = mysqli_fetch_assoc($resultAll)) {
// Optionally, you can sanitize the output here if you plan to display it directly
$dataAll[] = $row;
}
// Free the result set
mysqli_free_result($resultAll);
// Close the statement
mysqli_stmt_close($stmt);
return $dataAll;
}
function rvFetchAllDataLimit($con, $table, $limit)
{
// Create a prepared statement
$stmt = mysqli_prepare($con, "SELECT * FROM $table ORDER BY id DESC LIMIT $limit");
if ($stmt === false) {
// Handle error - in a real-world application, you might log this and return an appropriate response
die('Prepare failed: ' . htmlspecialchars(mysqli_error($con)));
}

// Execute query
if (!mysqli_stmt_execute($stmt)) {
// Handle error - in a real-world application, you might log this and return an appropriate response
die('Execute failed: ' . htmlspecialchars(mysqli_stmt_error($stmt)));
}
// Get the result set from the prepared statement
$resultAll = mysqli_stmt_get_result($stmt);
if ($resultAll === false) {
// Handle error - in a real-world application, you might log this and return an appropriate response
die('Get result failed: ' . htmlspecialchars(mysqli_stmt_error($stmt)));
}
// Fetch all rows as an associative array
$dataAll = [];
while ($row = mysqli_fetch_assoc($resultAll)) {
// Optionally, you can sanitize the output here if you plan to display it directly
$dataAll[] = $row;
}
// Free the result set
mysqli_free_result($resultAll);
// Close the statement
mysqli_stmt_close($stmt);
return $dataAll;
}








// FETCH SINGLE DATA
function rvFetchSingleDataSpecific($con, $id, $item, $table)
{
// Create a prepared statement
$stmt = mysqli_prepare($con, "SELECT $item FROM $table WHERE id = ?");
if ($stmt === false) {
// Log the error and handle it gracefully
error_log('Prepare failed: ' . mysqli_error($con));
return false; // Return false or handle the error accordingly
}
// Bind the id parameter to the prepared statement
mysqli_stmt_bind_param($stmt, 'i', $id);

// Execute the query
if (!mysqli_stmt_execute($stmt)) {
// Log the error and handle it gracefully
error_log('Execute failed: ' . mysqli_stmt_error($stmt));
return false; // Return false or handle the error accordingly
}
// Get the result set from the prepared statement
$result = mysqli_stmt_get_result($stmt);
if ($result === false) {
// Log the error and handle it gracefully
error_log('Get result failed: ' . mysqli_stmt_error($stmt));
return false; // Return false or handle the error accordingly
}
// Fetch the row as an associative array
$row = mysqli_fetch_assoc($result);
// Free the result set
mysqli_free_result($result);
// Close the statement
mysqli_stmt_close($stmt);

return $row;
}


 


function allPagesBanner($con, $firstName, $secondName, $secondUrl) { 
    $userinfo = rvFetchSingleDataSpecific($con, 1, 'base_url', 'admin');
?>

<section class="inner_banner_section">
    <div class="container container-xl">
        <div class="banner-content">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="title wow fadeInLeft" data-wow-delay="0.2s">
                        <h2><?= htmlspecialchars($firstName); ?></h2>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="breadcrumb-bar wow fadeInRight" data-wow-delay="0.2s">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?= htmlspecialchars($userinfo['base_url']); ?>/">Home</a>
                                </li>
                                <?php if (!empty($secondName)) { ?>
                                    <li class="breadcrumb-item active" aria-current="page">
                                         <a href="<?= htmlspecialchars($userinfo['base_url']); ?>/<?= htmlspecialchars($secondUrl); ?>"><?= htmlspecialchars($secondName); ?></a>
                                        
                                    </li>
                                <?php } ?>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?= htmlspecialchars($firstName); ?>
                                </li>
                                
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="inner_banner_shape1"></div>
    <div class="inner_banner_shape2"></div>
    <div class="inner_banner_shape3"></div>
    <div class="inner_banner_shape4"></div>
</section>

 
<?php  }
 
function allhyperlinkbtn($con, $hreflink, $btnclass, $datategname, $tegattr){ ?>
<a href="<?= $hreflink; ?>" class="<?= $btnclass; ?>" <?= $datategname; ?>
    aria-label="<?= $tegattr; ?>"><?= $tegattr; ?></a>
<?php } 

function allimgsrc($con, $hreflink, $altname){ 
$userinfo = rvFetchSingleDataSpecific($con, 1, 'base_url', 'admin');
?>
<img src="<?= $userinfo['base_url'];?>/assets/images/<?= $hreflink; ?>" alt="<?= $altname; ?>">

<?Php } ?>