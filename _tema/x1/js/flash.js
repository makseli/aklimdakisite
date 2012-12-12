// JavaScript Document
function flash(w,h,u,t) {
	document.write("<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0' width='"+w+"' height='"+h+"'><param name='movie' value='"+u+"'><param name='quality' value='high'>");
	if(t=="y"){
		document.write("<param name='wmode' value='transparent'>");
	}
	document.write("<embed src='"+u+"' quality='high' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' width='"+w+"' height='"+h+"'></embed></object>");	
}