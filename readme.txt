Bitcoin/Devcoin faucet
Made by Greedi 2012 (c), rewritten by Emfox for Devcoin faucet 2013-2025

INSTALL:
//get api key from google: https://cloud.google.com/security/products/recaptcha
cp config.php.template config.php // fill in reCAPTCHA key, password, etc
// fill in db_password.txt if using docker compose
composer install // install dependencies (reCAPTCHA, jsonrpcclinet, simplehtmldom)
mysql -uroot -p < faucet.sql // for the db structure
devcoin-cli setlabel '1EpJKJbpeoXnYGtoB8F6re78FMAtvNRWMf' 'FaucetDonations' // faucet address label
