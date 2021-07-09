# Athanaeum 
An online library management system, using PHP, MySQL database, Twig templates and jQuery.

## Set-Up Instructions
### Prerequisites:
1. LAMP Stack
2. phpMyAdmin

### Set-Up
1. Clone the repository on your system.
2. Navigate into your project directory, and run `composer install` to install all the required dependencies.
3. Set up phpMyAdmin, create a database named `mvc-db`, and import the database schema.
4. Alter the file `config_data.php` in `config` directory by filling in your mysql username and password in the indicated area.

#### Test on localhost:
1. Run `composer dump-autoload` in your project directory through terminal.
2. Navigate into the `public` folder, and run `php -S localhost:8000`, or whichever other port you want to use.
2. Open `http://localhost:8000` on your browser.


#### Set up a vhost:
1. Navigate to `/usr/local/etc/httpd/conf.d/sites-available`, and copy the file `mvc.sdslabs.local.conf` from the `virtual-host` folder to `sites-available`.
2. Add `127.0.0.1       mvc.sdslabs.local` to the list of domains in `/etc/hosts`. 
3. Restart apache by running `sudo apachectl -k restart`.
4. The site can be accessed at `http://mvc.sdslabs.local/` in your web browser.



