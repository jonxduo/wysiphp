$(function(){

	wysihtml5ParserRules.classes = $.extend(wysihtml5ParserRules.classes, {
		"icon-emo-happy":1,
		"icon-emo-sleep":1,
		"icon-emo-wink":1,
		"icon-emo-wink2":1,
		"icon-emo-unhappy":1,
		"icon-emo-thumbsup":1,
		"icon-emo-devil":1,
		"icon-emo-surprised":1,
		"icon-emo-tongue":1,
		"icon-emo-coffee":1,
		"icon-emo-sunglasses":1,
		"icon-emo-displeased":1,
		"icon-emo-beer":1,
		"icon-emo-grin":1,
		"icon-emo-angry":1,
		"icon-emo-saint":1,
		"icon-emo-cry":1,
		"icon-emo-shoot":1,
		"icon-emo-squint":1,
		"icon-emo-laugh":1,
		"media-left":1
	});

	var editors = $('div[data-wysi-id]');
	$.each(editors, function(){
		id=$(this).attr('data-wysi-id');

		textarea = $('#weditor'+id);
		editor = new wysihtml5.Editor("weditor"+id, {
		  toolbar: "toolbar"+id,
		  parserRules: wysihtml5ParserRules ,
		  stylesheets: ["lib/bootstrap/css/bootstrap.min.css", "lib/fontello/css/fontello.css", "lib/wysi/wysi.css"],
		  cleanUp: false
		});

		$('#toolbar'+id+' button').on('click', function(){
			textarea.val(editor.currentView.getValue());
		});
		$('#toolbar'+id+' a').on('click', function(){
			textarea.val(editor.currentView.getValue());
		});

		$('#toolbar'+id+' a[data-wysi="emo"]').on('click', function(){
			console.log($(this).attr('data-emo'));
			editor.composer.commands.exec("insertHTML", "<span class='icon-emo-"+$(this).attr('data-emo')+"'></span>");
		});

		$('#codemodal'+id+' button[data-wisi="insert"]').on('click', function(){
			editor.composer.commands.exec("insertHTML", "<pre>"+HtmlEncode($('#codemodal'+id+' textarea').val())+"</pre>");
			$('#codemodal'+id).modal('hide');
			$('#codemodal'+id+' textarea').val('');
		});

		$('#quotemodal'+id+' button[data-wisi="insert"]').on('click', function(){
			editor.composer.commands.exec("insertHTML", "<blockquote>"+$('#quotemodal'+id+' textarea').val()+"</blockquote>");
			$('#quotemodal'+id).modal('hide');
			$('#quotemodal'+id+' textarea').val('');
		});

		$('#imagemodal'+id+' button[data-wisi="insert"]').on('click', function(){
			editor.composer.commands.exec("insertHTML", "<img class='media-left' src='"+$('#imagemodal'+id+' input.imageUrl').val()+"' title='"+$('#imagemodal'+id+' input.imageTitle').val()+"'/>");
			$('#imagemodal'+id).modal('hide');
			$('#imagemodal input').val('');
		});

		$('#linkmodal'+id+' button[data-wisi="insert"]').on('click', function(){
			editor.composer.commands.exec("createLink", { href: $('#linkmodal'+id+' input.linkUrl').val(), target: "_blank", rel: "nofollow", text: $('#linkmodal'+id+' input.linkTitle').val() });
			$('#linkmodal'+id).modal('hide');
			$('#linkmodal'+id+' input').val('');
		});

		function HtmlEncode(s){
			var el = document.createElement("div");
			el.innerText = el.textContent = s;
			s = el.innerHTML;
			return s;
		}
	});
});