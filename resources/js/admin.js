/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

//delete plate pop up
const btn_delete = document.querySelectorAll('.btn-plate-delete');
const pop_up = document.getElementById('pop-up-delete');
const btn_no = document.querySelector('.btn-no');

btn_delete.forEach( el => {
    el.addEventListener('click', function(e){
        pop_up.classList.remove('d-none');       
    });
});

btn_no.addEventListener('click', function(e){
    pop_up.classList.add('d-none');
});
