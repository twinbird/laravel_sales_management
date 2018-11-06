
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

$(function() {
	// delete row
	$('.delete-row-link').click(function() {
		let ret = window.confirm('この行を削除しますか?');
		if (ret === false) {
			return;
		}

		// set delete flag
		$(this).next('input').val(1);

		// invisible row
		$(this).closest('tr').hide();
	});

	// delete row hide
	$('.delete-flag').each(function(idx, e) {
		if ($(e).val() !== '') {
			$(e).closest('tr').hide();
		}
	});
});
