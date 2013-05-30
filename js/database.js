$(document).ready(function() {

	var timeid = query = null;
	var aborting = false;

	var stopHtml = '<img src="'+ Database.str_stop.icon +'" alt="" />&nbsp;'
		+ Database.str_stop.text;
	var startHtml = '<img src="'+ Database.str_start.icon +'" alt="" />&nbsp;'
		+ Database.str_start.text;

	var controlLink = $('#control')
		.addClass('activecursor');
	var errmsg = $('<p class="errmsg">'+Database.errmsg+'</p>')
		.insertBefore($('#ctable'))
		.hide();
	var loading = $('<div style="display: inline;">&nbsp; <img class="loading" alt="[loading]" src="'+ Database.load_icon +'" /> &nbsp;&nbsp;</div>')
		.insertAfter(controlLink)
		.hide();

	var showInternals = $('#id_filterip');
	var showInactive = $('#id_inactive');

	function refreshTable() {
		if (Database.ajax_time_refresh > 0) {
			loading.show();
			settings = {
				type: 'GET',
				dataType: 'html',
				data: {server: Database.server, database: Database.dbname, action: Database.action},
				url: 'database.php',
				cache: false,
				contentType: 'application/x-www-form-urlencoded',
				success: function(html) {
					$('#data_block').html(html);
				},
				error: function() {
					var a = aborting;
					controlLink.click();
					if (!a)
						errmsg.show();
				},
				complete: function () {
					loading.hide();
				}
			};
			if (showInternals.prop('checked'))
				settings.data.filterip = 'checked';
			if (showInactive.prop('checked'))
				settings.data.inactive = 'checked';
			query = $.ajax(settings);
		}
	}

	controlLink.one('click', null, null, function() {
		function startRefresh() {
			errmsg.hide();
			controlLink.html(stopHtml);
			controlLink.one('click', null, null, stopRefresh);
			aborting = false;
			refreshTable();
			timeid = window.setInterval(refreshTable, Database.ajax_time_refresh);
		};
		function stopRefresh() {
			window.clearInterval(timeid);
			errmsg.hide();
			loading.hide();
			if (query) {
				aborting = true;
				query.abort();
			}
			controlLink.html(startHtml);
			controlLink.one('click', null, null, startRefresh);
		};

		return startRefresh;
	}()
	);

	/* preload images */
	$('#data_block')
		.html('<div <img src="'+ Database.load_icon +' alt=""><img src="'+ Database.str_start.icon + '" alt=""><img src= "'+ Database.str_stop.icon + '" alt=""></div>')
		.hide()
		.imagesLoaded(function() {
			$('#data_block')
				.html('')
				.show();
	
			/* Make control container width static. */
			var controlBox = controlLink.parent();
			controlLink.html(startHtml);
			var controlBoxWidth = controlBox.width();
			var controlBoxCssWidth = controlBox.css('width');
			controlLink.html(stopHtml);
			loading.show();
			if (controlBoxWidth < controlBox.width())
				controlBoxCssWidth = controlBox.css('width');
			loading.hide();
			controlBox.css('width', controlBoxCssWidth);

			/* start refreshing */
			controlLink.click();
		});
});
