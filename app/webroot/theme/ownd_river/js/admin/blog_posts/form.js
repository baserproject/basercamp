$(function(){

	var previewurlBase = $("#AdminBlogBLogPostsEditScript").attr('data-previewurl');
p(previewurlBase);
	$("#BtnPreview").click(function(){
		window.open('', 'preview');
		var form = $(this).parents('form');
		var action = form.attr('action');
		var previewMode = 'default';
		var previewurl = previewurlBase;

		if ($("#DraftModeDetailTmp").val() == 'draft') {
			previewMode = 'draft';
		}
		if (previewurl.match(/\?/)) {
			previewurl += '&preview=' + previewMode;
		} else {
			previewurl += '?preview=' + previewMode;
		}
		form.attr('target', 'preview');
		form.attr('action', previewurl);
		form.submit();
		form.attr('target', '_self');
		form.attr('action', action);
		$.get($.baseUrl + '/bc_form/ajax_get_token?requestview=false', function(result) {
			$('input[name="data[_Token][key]"]').val(result);
		});
		return false;
	});
	
	/**
	 * フォーム送信時イベント
	 */
	$("#BtnSave").click(function(){
		$.bcUtil.showLoader();
		if(typeof editor_detail_tmp != "undefined") {
			editor_detail_tmp.execCommand('synchronize');
		}
		$("#BlogPostMode").val('save');
		$.bcToken.check(function(){
			$("#BlogPostForm").submit();
		}, {useUpdate: false, hideLoader: false});
		return false;
	});
	
	/**
	 * ブログタグ追加
	 */
	$("#BlogTagName").keypress(function(ev) {
		if ((ev.which && ev.which === 13) || (ev.keyCode && ev.keyCode === 13)) {
			$("#BtnAddBlogTag").click();
			return false;
		} else {
			return true;
		}
	});
	
	$("#BtnAddBlogTag").click(function(){
		if(!$("#BlogTagName").val()) {
			return false;
		}
		$.bcToken.check(function(){
			return $.ajax({
				type: "POST",
				url: $("#AddTagUrl").html(),
				data: {
					'data[BlogTag][name]': $("#BlogTagName").val(),
					'data[_Token][key]': $.bcToken.key
				},
				dataType: 'html',
				beforeSend: function() {
					$("#BtnAddBlogTag").prop('disabled', true);
					$("#TagLoader").show();
				},
				success: function(result){
					if(result) {
						$("#BlogTags").append(result);
						$('input[name="data[BlogTag][BlogTag][]"]').last().prop('checked', true);
						$("#BlogTagName").val('');
					} else {
						alert(bcI18n.alertMessage1);
					}
				},
				error: function(){
					alert(bcI18n.alertMessage2);
				},
				complete: function(xhr, textStatus) {
					$("#BtnAddBlogTag").removeAttr('disabled');
					$("#TagLoader").hide();
					$("#BlogTags").effect("highlight",{},1500);
				}
			});
		}, {loaderType: 'target', loaderSelector: '#TagLoader', hideLoader: false});
		return false;
	});
	
	/**
	 * ブログカテゴリ追加
	 */
	$("#BtnAddBlogCategory").click(function(){
		$("#AddBlogCategoryForm").dialog({
			height: 250,
			width: 600,
			open: function() {
				// ヘルプがダイアログ内で切れてしまうのを防ぐ
				$(this).css('overflow', 'visible');
				$(this.parentNode).css('overflow', 'visible');
			}
		});
		return false;
	});

	$("#BtnBlogCategoryCancel").click(function(ev) {

		$("#AddBlogCategoryForm").dialog('close');
		return false;
	});

	$("#BtnBlogCategorySave").click(function() {

		var name = $('#AddBlogCategoryForm [name="data[BlogCategory][name]"]').val();
		var title = $('#AddBlogCategoryForm [name="data[BlogCategory][title]"]').val();

		if(!name) {
			name = title;
		}

		$.bcToken.check(function(){
			return $.ajax({
				type: "POST",
				url: $("#AddBlogCategoryUrl").html(),
				data: {
					'data[BlogCategory][name]': name,
					'data[BlogCategory][title]': title,
					'data[_Token][key]': $.bcToken.key
				},
				dataType: 'script',
				beforeSend: function() {
					$("#BtnAddBlogCategory").prop('disabled', true);
					$.bcUtil.showLoader();
				},
				success: function(result){
					if(result) {
						$("#BlogPostBlogCategoryId").append($('<option />').val(result).html(title));
						$("#BlogPostBlogCategoryId").val(result);
					} else {
						alert(bcI18n.alertMessage3);
					}
					$("#AddBlogCategoryForm").dialog('close');
				},
				error: function(XMLHttpRequest, textStatus){
					if(XMLHttpRequest.responseText) {
						alert(bcI18n.alertMessage4 + '\n\n' + XMLHttpRequest.responseText);
					} else {
						alert(bcI18n.alertMessage5 + '\n\n' + XMLHttpRequest.statusText);
					}
				},
				complete: function(xhr, textStatus) {
					$("#BtnAddBlogCategory").removeAttr('disabled');
					$.bcUtil.hideLoader();
					$("#BlogPostBlogCategoryId").effect("highlight",{},1500);
				}
			});
		}, {hideLoader: false});
		return false;
	});
});
