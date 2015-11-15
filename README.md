Easy PGP composer
==================

This project aims to be a assisting tool for contact forms. A PGP publickey can be deposited in the configuration file. Users can then encrypt a message in their browser (OpenPGPJS is used), copy the resulting PGP message and send it over an unencrypted channel.

# Screenshot

![Screenshot](http://i.imgur.com/jX9txI1.png)

# Requirements:
- PGP PublicKey
- PHP

# Setup
- Upload all files to your webserver
- Copy ```config.php.sample``` to ```config.php```
- Copy your PublicKey into a file called ```pub.asc``` (or the filename you specified as ```$KEYFILE```)

# License
- MIT (see LICENSE.md)
