Naming convention:
==================

SKU[__WEIGHT].jpg|png...

Import Process:
===============

In order to get product images working you have to follow 3 simple steps:

1) Import a valid product catalog with corresponding product SKUs

2) Unzip product-images.zip to the import folder e.g. APPLICATION_ROOT/data/static/STORE_NAME/images/products/incoming

3) Run the cronjob "import-incoming-images"


Static images host:
===================

Please make sure that you have set up your static media host properly in you config_local.php!

$config['host']['static_media']  => 'http://YOUR-STATIC-MEDIA-HOST.TLD';

If you are running apache, you must add a RewriteRule for the SEO image file names:

.htaccess:

RewriteEngine on
RewriteRule ^([A-Z]{2})\/images\/(.*)-([0-9]{3})([0-9]{1,})-(.*)-([a-zA-Z0-9]{2})(.*)$ $1/images/products/processed/$3/$4/$5$7

In this case your DOCUMENT_ROOT would be APPLICATION_ROOT/data/static/
