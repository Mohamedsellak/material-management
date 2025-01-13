const fs = require('fs-extra');
const path = require('path');

// Source and destination paths
const webfontsSource = path.join(__dirname, 'node_modules/@fortawesome/fontawesome-free/webfonts');
const cssSource = path.join(__dirname, 'node_modules/@fortawesome/fontawesome-free/css/all.min.css');
const webfontsDest = path.join(__dirname, 'public/build/webfonts');
const cssDest = path.join(__dirname, 'public/build/assets/all.min.css');

// Copy webfonts
fs.copySync(webfontsSource, webfontsDest, { overwrite: true });
console.log('Webfonts copied successfully');

// Copy CSS
fs.copySync(cssSource, cssDest, { overwrite: true });
console.log('CSS copied successfully'); 