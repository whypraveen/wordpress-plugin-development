<style>
    .form-table th{width: 116px !important;}
</style>
<div class="wrap">
    <form class="form-table" method="post" action="options.php">
        <?php settings_fields('wondaloan_interest_field'); ?>
        <h3>Set Interest Rate</h3>
        <table>
            <tr valign="top">
                <th scope="row"><label for="wondaloan_rate_name">APR</label></th>
                <td><input type="number" id="wondaloan_rate_name" name="wondaloan_rate_name" value="<?php echo get_option('wondaloan_rate_name'); ?>" step=".01" /></td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div> 