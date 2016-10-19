/**
 * MySui Online Judge
 * @file msoj_submissions.js
 * @author MySui Team <mysuioj@gmail.com>
 *
 *     Javascript codes for "All Submissions" and "Final Submissions" pages
 */

msoj.modal_open = false;
$(document).ready(function () {
	$(document).on('click', '#select_all', function (e) {
		e.preventDefault();
		$('.code-column').selectText();
	});
	$(".btn").click(function () {
		var button = $(this);
		var row = button.parents('tr');
		var type = button.data('type');
		if (type == 'download') {
			window.location = msoj.site_url + 'submissions/download_file/' + row.data('u') + '/' + row.data('a') + '/' + row.data('p') + '/' + row.data('s');
			return;
		}
		var view_code_request = $.ajax({
			cache: true,
			type: 'POST',
			url: msoj.site_url + 'submissions/view_code',
			data: {
				type: type,
				username: row.data('u'),
				assignment: row.data('a'),
				problem: row.data('p'),
				submit_id: row.data('s'),
				msoj_csrf_token: msoj.csrf_token
			},
			success: function (data) {
				if (type == 'code')
					 data.text = msoj.html_encode(data.text);
				$('.modal_inside').html('<pre class="code-column">'+data.text+'</pre>');
				$('.modal_inside').prepend('<p><code>'+data.file_name+' | Submit ID: '+row.data('s')+' | Username: '+row.data('u')+' | Problem: '+row.data('p')+'</code></p>');
				if (type == 'code'){
					$('pre.code-column').snippet(data.lang, {style: msoj.color_scheme});
				}
				else
					$('pre.code-column').addClass('msoj_code');
			}
		});
		if (!msoj.modal_open) {
			msoj.modal_open = true;
			$('#msoj_modal').reveal(
				{
					animationspeed: 300,
					on_close_modal: function () {
						view_code_request.abort();
					},
					on_finish_modal: function () {
						$(".modal_inside").html('<div style="text-align: center;">Loading<br><img src="'+msoj.base_url+'assets/images/loading.gif"/></div>');
						msoj.modal_open = false;
					}
				}
			);
		}

	});
	$(".msoj_rejudge").attr('title', 'Rejudge');
	$(".msoj_rejudge").click(function () {
		var row = $(this).parents('tr');
		$.ajax({
			type: 'POST',
			url: msoj.site_url + 'rejudge/rejudge_single',
			data: {
				username: row.data('u'),
				assignment: row.data('a'),
				problem: row.data('p'),
				submit_id: row.data('s'),
				msoj_csrf_token: msoj.csrf_token
			},
			beforeSend: msoj.loading_start,
			complete: msoj.loading_finish,
			error: msoj.loading_error,
			success: function (response) {
				if (response.done) {
					row.children('.status').html('<div class="btn pending" data-code="0">PENDING</div>');
					noty({text: 'Rejudge in progress', layout: 'bottomRight', type: 'success', timeout: 2500});
				}
				else
					msoj.loading_failed(response.message);
			}
		});
	});
	$(".set_final").click(
		function () {
			var row = $(this).parents('tr');
			var submit_id = row.data('s');
			var problem = row.data('p');
			var username = row.data('u');
			$.ajax({
				type: 'POST',
				url: msoj.site_url + 'submissions/select',
				data: {
					submit_id: submit_id,
					problem: problem,
					username: username,
					msoj_csrf_token: msoj.csrf_token
				},
				beforeSend: msoj.loading_start,
				complete: msoj.loading_finish,
				error: msoj.loading_error,
				success: function (response) {
					if (response.done) {
						$("tr[data-u='" + username + "'][data-p='" + problem + "'] i.set_final").removeClass('fa-check-circle-o color11').addClass('fa-circle-o');
						$("tr[data-u='" + username + "'][data-p='" + problem + "'][data-s='" + submit_id + "'] i.set_final").removeClass('fa-circle-o').addClass('fa-check-circle-o color11');
					}
					else
						msoj.loading_failed(response.message);
				}
			});
		}
	);
});
