// get the webpack compiler
const compiler = require('./libs/compiler');

// get the mode arg from `npm run xxx` script defined in package.json
const [mode] = process.argv.slice(2);

// get the webpack configuration associated with the provided mode
const config = require(`./configs/${mode}`);

// build the project
compiler.compile(config);
