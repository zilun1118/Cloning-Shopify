let login = require('./components/Authentication/login.vue').default;
let register = require('./components/Authentication/register.vue').default;
let forget = require('./components/Authentication/forget.vue').default;
let home = require('./components/home.vue').default;
let logout = require('./components/Authentication/logout.vue').default;
let AllProd = require('./components/product/create-prod.vue').default;
let inventory = require('./components/product/product-list.vue').default;
let editprod = require('./components/product/edit-prod.vue').default;
let AllCustomer = require('./components/customer/customer-list.vue').default;
let AddCustomer = require('./components/customer/create-customer.vue').default;
let editCustomer = require('./components/customer/edit-customer.vue').default;
let createOrder = require('./components/customer/create-order.vue').default;
let AllOrders = require('./components/Orders/all-orders.vue').default;
let editOrders = require('./components/Orders/edit-order.vue').default;
let cusDetail = require('./components/customer/customer-activity.vue').default;


export const routes = [
    { path: '/', component: login ,name: '/'},
    { path: '/register', component: register },
    { path: '/forget', component: forget },
    { path: '/home', component: home ,name:'home'},
    { path: '/logout', component: logout ,name:'logout'},
    { path: '/all-prod', component: AllProd ,name:'Allprod'},
    { path: '/inventory', component: inventory ,name:'inventory'},
    { path: '/edit-product/:id', component: editprod ,name:'editprod'},
    { path: '/customers', component: AllCustomer ,name:'AllCustomer'},
    { path: '/add-customer', component: AddCustomer ,name:'AddCustomer'},
    { path: '/edit-customer/:id', component: editCustomer ,name:'editCustomer'},
    { path: '/create-order/:id', component: createOrder ,name:'createOrder'},
    { path: '/orders', component: AllOrders ,name:'AllOrders'},
    { path: '/edit-orders/:id', component: editOrders ,name:'editOrders'},
    { path: '/customer-detail/:id', component: cusDetail ,name:'cusDetail'},
  ]
  