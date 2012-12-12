$(document).ready(function(){
		
	$('div.IseYararSite').click(function(){
		hangi = "span#SiteIslem" + $(this).attr('id');
		$(hangi).toggle('normal');
	});		
	
});
	