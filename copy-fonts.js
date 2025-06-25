import fs from 'fs-extra';
import path from 'path';
import { fileURLToPath } from 'url';

// Get __dirname equivalent in ES modules
const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

// Source and destination paths
const webfontsSource = path.join(__dirname, 'node_modules/@fortawesome/fontawesome-free/webfonts');
const cssSource = path.join(__dirname, 'node_modules/@fortawesome/fontawesome-free/css/all.min.css');
const webfontsDest = path.join(__dirname, 'public/build/webfonts');
const cssDest = path.join(__dirname, 'public/build/assets/all.min.css');

// Create directories if they don't exist
await fs.ensureDir(path.dirname(webfontsDest));
await fs.ensureDir(path.dirname(cssDest));

// Copy webfonts
await fs.copy(webfontsSource, webfontsDest, { overwrite: true });
console.log('Webfonts copied successfully');

// Copy CSS
await fs.copy(cssSource, cssDest, { overwrite: true });
console.log('CSS copied successfully');
