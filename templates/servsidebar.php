<?php
/**
 * @author Greedi
 * @copyright 2012
 */

include ('core/daily.php');
?>
<div class="span4"> <!-- This is the servsidebar, don't forget -_- -->

<?php
echo '
            <div style="margin-right: 20px;">
            <h3><center>Bitcoin statistics</center></h3>
            <table class=\'zebra-striped\'>
            <tr><td>Block count: </td><td>' . number_format($derp['blocks']) .
    '</td></tr>
            <tr><td>Difficulty: </td><td>' . $derp['difficulty'] . '</td></tr>
            </table>';
            ?>
            </div>
            <?php
echo '
            <div style="margin-right: 10px;">
            <h3><center>Faucet statistics</center></h3>
            <table class=\'zebra-striped\'>
<tr><td>Current Round: </td><td>' . $round . ' </td></tr>
   <tr><td>Submitted This Round: </td><td>' . $rows . ' persons</td></tr>
<tr><td>Payout per Persion: </td><td>' . $singlepay . ' DVC</td></tr> 
            <tr><td>Total Payout: </td><td>' . $totalpay . ' DVC</td></tr>
</table>';
?>
          </div>
