<center>
      </div>
    </div> <!-- /container -->

    <footer class="footer">
        <div class="container text-center">
          <a href="https://www.devtome.com/">
          <img src="https://www.devtome.com/lib/exe/fetch.php?media=devcoin_leaderboard_tosku.png" /></a>
          <p style="font-size: 11px;">Donate to Faucet: <?=$btclient->getaccountaddress($don_faucet);?> (recv: <?=$btclient->getbalance($don_faucet,0)?> DVC)</p>
          <p>Emfox Zhou &copy; 2013-2018</p>
        </div>
    </footer>

  </body>
</html>
