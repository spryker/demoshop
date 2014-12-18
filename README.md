spryker
=======

## Installation

```
cd /data/shop/development/current
php composer.phar install
sudo npm install -d
./vendor/bin/console setup:install
```

## Development

### Product Data

Go to [Product import](http://zed-development.project-yz.de/product/import) and upload the demodata from
*development/product-import/Products-Demodata.csv*.

When the upload was successful, please execute the following SQL:

```SQL
INSERT INTO `pac_yves_export_touch` (`id_yves_export_touch`, `item_type`, `item_event`, `item_id`, `touched`)
VALUES
    (1, 'product', 0, '1', NOW()),
    (2, 'product', 0, '2', NOW());
```

Then you can export the products into the KV Storage by just accessing [Yves KV Exporter](http://zed-development.project-yz.de/yves-export/cronjob/export-key-value).
