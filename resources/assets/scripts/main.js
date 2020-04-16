// import external dependencies
import 'mptchtml/src/js/main.js';
import 'moment';
import '@thyrith/momentkh';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
});

const moment = require('moment');
// Add our features to your preferred moment.js version
require('@thyrith/momentkh')(moment);

// From now on, your moment js is transformed

let today = moment();

console.log(today);
// Display date today as moment js object
// For example: moment("2018-12-15T14:49:38.586")
let khmerDate = today.toLunarDate('ថ្ងៃdN ខែm ឆ្នាំa ព.ស.b');
// Display khmer date
// For example: ថ្ងៃសៅរ៍ ៨កើត ខែមិគសិរ ឆ្នាំច សំរឹទ្ធស័ក ពុទ្ធសករាជ ២៥៦២
document.getElementById('input-khmer-time').value = khmerDate;
// Load Events
jQuery(document).ready(() => routes.loadEvents());
