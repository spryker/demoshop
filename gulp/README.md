# Setup

Full setup: `npm run spy-setup`
Installs dependencies and runs dist task for Yves and Zed


# Development

Build process is Gulp based and can be started via NPM tasks.


## Zed

We have 3 script "levels" for Zed:

* **external** Libraries
* **internal** Global (`./static/assets`)
* **custom** Bundle specific (`./src/Pyz/<component>/<bundle>/Presentation/Assets`)

E.g. only run the "internal" script level and start a watcher:

`npm run spy-zed dev internal`

## Yves

Build frontend assets: `npm run spy-yves dist`

Build frontend assets and start watcher: `npm run spy-yves dist`
