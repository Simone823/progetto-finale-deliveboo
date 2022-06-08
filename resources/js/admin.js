/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');




const btn_delete = document.querySelectorAll('.btn-plate-delete');
const pop_up = document.getElementById('pop-up-delete');
const btn_no = document.querySelector('.btn-no');
const btn_si = document.querySelector('.btn-si');
const plate_name_delete = document.getElementsByClassName('plate-name-delete')[0];


btn_delete.forEach( el => {
    el.addEventListener('click', function(e){

        const name_plate = e.path[2].children[1].children[0].innerHTML;
        
        plate_name_delete.innerHTML = name_plate;
        
        pop_up.classList.remove('d-none');

        const form = e.path[2].children[4];

        btn_si.addEventListener('click', function(){
            form.submit();
        })    
    })
})

btn_no.addEventListener('click', function(e){
    pop_up.classList.add('d-none');
})
