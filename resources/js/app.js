import Table from './components/table/Table';
import Add from './components/Add';
import Edit from './components/Edit';

require('./bootstrap');

window.Vue = require('vue');

// class MyProvider {
//     getName() {
//         alert('bbbb');
//     }
// }

const app = new Vue({
    el: '#app',
    // data() {
    //     return {
    //         myProvider: new MyProvider()
    //     }
    // },
    components: {
        'dtable': Table,
        'add': Add,
        'edit': Edit
    }
});
