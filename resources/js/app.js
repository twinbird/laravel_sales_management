
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
	var DETAIL_INDEX_VARIABLE = -1;

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

	// add row
	$('#add-detail').click(function() {
		// clone template row tag
		let row = $('#template-row-field').clone(true);
		let raw_html = row.html();

		// attach new detail id
		raw_html = raw_html.replace(/_INDEX_VARIABLE/g, DETAIL_INDEX_VARIABLE);
		DETAIL_INDEX_VARIABLE--;
		row.html(raw_html);

		// remove template id and attributes
		row.attr('id', '');
		row.show();
		row.find('.delete-flag').first().val('');

		// increments append row counts
		$('#row-counts').val(Number($('#row-counts').val()) + 1);

		// append to details
		$('#detail-table-tbody').append(row);
	});
});
