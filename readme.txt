Bitcoin/Devcoin faucet
Made by Greedi 2012 (c), rewritten by Emfox for Devcoin faucet 2013-2025

INSTALL:
//get api key from google
composer install // install dependencies (reCAPTCHA, jsonrpcclinet, simplehtmldom)
cp config.php.template config.php // then edit config.php
mysql -uroot -p < faucet.sql // for the db structure
devcoin-cli setlabel '1EpJKJbpeoXnYGtoB8F6re78FMAtvNRWMf' 'FaucetDonations' // faucet address label
