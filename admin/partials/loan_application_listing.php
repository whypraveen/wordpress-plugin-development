<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    die('Un-authorized access!');
}

/**
 * Detect plugin. For use in Admin area only.
 */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

//enqueue date time picker CSS in file
wp_enqueue_style('jquery-datetimepicker-css');
//enqueue Sortable JS in file
wp_enqueue_script('jquery-ui-sortable');

global $wpdb;

if (isset($_POST['save'])) {
    if (!empty($_POST)) {
        foreach ($_POST as $key => $value) {
            if ($key != 'save' || $key != 'apr' || $key != 'status') {
                $postVal = explode('_', $key);
                $wpdb->update(WONDALOANS_DATA_ENTRY_TABLE_NAME, array('value' => $value), array('id' => $postVal[1]), array('%s'), array('%d'));
            }
        }
        $msg = '<div class="col-xs-12 text-center"><div class="alert alert-success">Application No. ' . base64_decode($_GET['ulrn']) . ' updated successfully.</div></div>';
        $wpdb->update(WONDALOANS_TABLE_NAME, array('apr' => $_POST['apr'], 'status' => $_POST['status']), array('ulrn' => base64_decode($_GET['ulrn'])), array('%s', '%s'), array('%s'));
    }
}

$sql = "SELECT * FROM `" . WONDALOANS_TABLE_NAME . "`";
$data = $wpdb->get_results($sql, ARRAY_N);
if ($_GET['ulrn']) {
    $ulrn = base64_decode($_GET['ulrn']);
    $sql = "SELECT * FROM `" . WONDALOANS_DATA_ENTRY_TABLE_NAME . "` WHERE `ulrn_no` = '" . $ulrn . "' ";
    $listing = $wpdb->get_results($sql, ARRAY_N);

    $sqlData = "SELECT * FROM `" . WONDALOANS_TABLE_NAME . "` WHERE `ulrn` = '" . $ulrn . "' ";
    $listingData = $wpdb->get_results($sqlData, ARRAY_N);
}
?>
<style>
    .responsive-table{width: 50% !important; }
    @media (max-width:767px){
        .responsive-table{width: 100% !important; }
    }
</style>
<div class="container">
    <div id="welcome-panel" class="welcome-panel" style="padding:0px;">
    <div class="welcome-panel-content">
        <div class="welcome-panel-column-container">
                <h3><span class="dashicons dashicons-shield" aria-hidden="true"></span> Wondaloans</h3>
                <br>
                <p>To show loan application form use this shortcode <b>[loan_application_form]</b> on page editor.</p>
                <p>To show loan application search form use this shortcode <b>[loan_application_search]</b> on page editor.</p>
        </div>
    </div>
</div>
<div class="wrap">
    <h2>
        <?php
        if ($_GET['ulrn'] && !empty($listing)) {
            echo 'View Loan Application Detail for ULRN - ' . base64_decode($_GET['ulrn']);
        } else {
            echo 'View Loan Application';
        }
        ?>

    </h2>
</div>
<div class="row" style="margin-top: 25px;">
    <?php
    if ($msg) {
        echo $msg;
    }
    ?>


    <div class="col-xs-12">
        <?php
        if ($_GET['ulrn'] && !empty($listing)) {
            ?>
            <form id="applicationEdit" name="application-edit" action="" method="post">
                <table class="responsive-table table table-striped table-bordered">
                    <tbody>
                        <?php
                        foreach ($listing as $each) {
                            echo '<tr>';
                            echo '<td>' . str_ireplace('_', ' ', $each[3]) . '</td>';
                            echo '<th id="' . $each[0] . '">' . $each[4] . '</th>';
                            echo '</tr>';
                        }
                        ?>
                        <tr>
                            <td>Set APR</td>
                            <td><input type="text" name="apr" value="<?php echo $listingData[0][2]; ?>"  class="form-control" /></td>
                        </tr>
                        <tr>
                            <td>Application Status</td>
                            <td><select name="status" class="form-control">
                                    <option value="Processing" <?php echo ($listingData[0][3] == 'Processing') ? ('selected') : ('') ?>>Processing</option>
                                    <option value="Awaiting Documents" <?php echo ($listingData[0][3] == 'Awaiting Documents') ? ('selected') : ('') ?>>Awaiting Documents</option>
                                    <option value="Successful" <?php echo ($listingData[0][3] == 'Successful') ? ('selected') : ('') ?>>Successful</option>
                                    <option value="Deposit Required" <?php echo ($listingData[0][3] == 'Deposit Required') ? ('selected') : ('') ?>>Deposit Required</option>
                                </select></td>
                        </tr>
                    </tbody>
                </table>
                <div class="col-xs-12">
                    <a id="edit" class="btn btn-info" style="cursor:pointer;">Edit</a>
                    <button type="submit" id="save" class="btn btn-success" name="save" style="display: none;">Save</button>
                </div>
            </form>
            <?php
        } elseif (!empty($data)) {
            ?>
            <table id="loanApplication" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ULRN</th>
                        <th>APR</th>
                        <th>Status</th>
                        <th>Created Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data as $each) {
                        ?>
                        <tr>
                            <td><?php echo $each[0]; ?></td>
                            <td><a href="?page=wondaloans-loans&ulrn=<?php echo base64_encode($each[1]); ?>"><?php echo $each[1]; ?></a></td>
                            <td><?php echo $each[2]; ?></td>
                            <td><?php echo $each[3]; ?></td>
                            <td><?php echo $each[4]; ?></td>
                            
                        </tr>
    <?php } ?>

                </tbody>
            </table>
            <?php
        } else {
            echo '<div class="cpl-xs-12 col-sm-6 text-center"><div class="alert alert-info">No Loan Apllication Found!</div></div>';
        }
        ?>
    </div>
</div>
    </div>
<script>
    jQuery(document).ready(function () {
        jQuery('#loanApplication').DataTable();
    });
    jQuery('#edit').click(function () {
        jQuery('#edit').hide();
        jQuery('.responsive-table tbody th').each(function () {
            var content = jQuery(this).html();
            var contentId = jQuery(this).attr('id');
            jQuery(this).html('<input type="text" class="form-control" name="field_' + contentId + '" value="' + content + '" />');
        });

        jQuery('#save').show();
    });

    jQuery('#save').click(function () {
        jQuery('#save').hide();
        jQuery('#edit').show();
    });
</script>