require('./bootstrap');

import Alpine from 'alpinejs'
 
import sidebar from './components/sidebar.js'
 
Alpine.data('sidebar', sidebar)

Alpine.start()