// import external dependencies
import 'mptchtml/src/js/main.js';
// import 'moment';
// import '@thyrith/momentkh';

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

// const moment = require('moment');
// // Add our features to your preferred moment.js version
// require('@thyrith/momentkh')(moment);

// // From now on, your moment js is transformed

// let today = moment();
// console.log(document.getElementsByTagName('html')[0].lang);
// // Display date today as moment js object
// // For example: moment("2018-12-15T14:49:38.586")
// let khmerDate = today.toLunarDate('ថ្ងៃdN ខែm ឆ្នាំa ព.ស.b');
// // Display khmer date
// document.getElementById('input-khmer-time').value = khmerDate;
// if(document.getElementsByTagName('html')[0].lang == 'km-KH'){
//   console.log(true);
//   const getTheDateElement = document.querySelectorAll('time.entry-date');
//   getTheDateElement.forEach(function (item, index){
//     let theDateAttr = getTheDateElement[index].getAttribute('datetime');
//     let dateToMoment = moment(theDateAttr, moment.ISO_8601);
//     getTheDateElement[index].innerHTML = dateToMoment.toLunarDate('ថ្ងៃdN ខែm ព.ស.b');
//   });
// }
// let theDateElement = document.getElementsByTagName
// Load Events
jQuery(document).ready(() => routes.loadEvents());
