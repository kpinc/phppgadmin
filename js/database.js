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
	var loading = $('<div style="display: inline;">&nbsp;&nbsp;&nbsp; <img class="loading" alt="[loading]" src="'+ Database.load_icon +'" /></div>')
		.insertAfter(controlLink)
		.hide();

	function refreshTable() {
		if (Database.ajax_time_refresh > 0) {
			loading.show();
			query = $.ajax({
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
			});
		}
	}

	controlLink.one('click', null, null, function() {
		function startRefresh() {
			$(errmsg).hide();
			controlLink.html(stopHtml);
			controlLink.one('click', null, null, stopRefresh);
			aborting = false;
			refreshTable();
			timeid = window.setInterval(refreshTable, Database.ajax_time_refresh);
		};
		function stopRefresh() {
			window.clearInterval(timeid);
			$(errmsg).hide();
			$(loading).hide();
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
	$('#control img').hide()
		.attr('src', Database.str_start.icon)
		.attr('src', Database.str_stop.icon)
		.show();
	
	/* start refreshing */
	controlLink.click();
});
