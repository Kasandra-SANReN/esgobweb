# esgobweb

Adapted Web client for the DNS API of [Esgob Ltd.](https://www.esgob.com/) for use at the South African National Research Network. Esgob provides a [Free Secondary DNS](https://noc.esgob.com/secondary_dns) service. This version of esgobweb can be used as a web interface for their API and allows multiple users at an institution to use the same esgob account as it has a database to maintain users ids. You need an account with Esgob in order to use esgobweb.

### Install Bootstrap

esgobweb requires Bootstrap. Download [the latest version of Bootstrap 3](http://getbootstrap.com/getting-started/#download) into the folder you extracted esgobweb. 

### Configure API key and user name

Copy config.dist.php to config.inc.php and set all configuration variables, especially the Esgob API user and key.

### Install flag package (optional)

esgobweb can display flags for the country of the anycast nodes. You need to install a flag package and set the option FLAG_FOLDER in config.inc.php to the relative path of the flags that should be used.

You can download e.g. [243 Country Flag Icons](http://365icon.com/icon-styles/ethnic/classic2/) and extract the content into the esgob folder. Set the config.inc.php apropriate:

`define('FLAG_FOLDER', 'flags/flags_iso/24/');`

###
The database used is mysqli. Three tables are used. The database name is names dnsdatabase. The three tables are dnsentries:dnsent_id, domain,masterip, owner_id
people:owner_id, Name, Institution, password
slaveslist: Slavelist_id, Domain, Type, Masterip, Action
