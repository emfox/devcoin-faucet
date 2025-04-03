<?php
require_once __DIR__ . '/../core/daily.php';
?>
        <div class="col-sm-4"> <!-- This is the servsidebar, don't forget -_- -->
          <table class="table table-striped">
            <caption><h3>Devcoin statistics</h3></caption>
            <tr><td>Block count: </td><td><?=number_format($info_blockchain['blocks'])?></td></tr>
            <tr><td>Difficulty: </td><td><?=$info_blockchain['difficulty']?></td></tr>
          </table>
          <table class="table table-striped">
            <caption><h3>Faucet statistics</h3></caption>
            <tr><td>Current Round: </td><td><?=$round?></td></tr>
            <tr><td>Submitted This Round: </td><td><?=$rows?> persons</td></tr>
            <tr><td>Payout per Person: </td><td><?=$singlepay?> DVC</td></tr>
            <tr><td>Total Paid: </td><td><?=$totalpay?> DVC</td></tr>
          </table>
        </div>
