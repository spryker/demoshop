// require suite-frontend-builder
const builder = require('@spryker/suite-frontend-builder');

// require project settings
const settings = require('./settings');

// get the mode arg from `npm run xxx` script
// defined in package.json
const [mode] = process.argv.slice(2);

// register custom development configuration factory
require('./config/development');

// build the project using the configuration factory
// associated with the provided mode
builder.build(settings, mode);
