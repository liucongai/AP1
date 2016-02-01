var baiduSiteReg = /([http|https]:\/\/[a-zA-Z0-9\_\.]+\.baidu\.com)/ig;
var pageUrl = window.location.href;
var referrer = document.referrer;
if (!baiduSiteReg.test(pageUrl)) {
    var url = '//api.share.baidu.com/s.gif';
    if (referrer) {
    	url += '?r=' + encodeURIComponent(document.referrer);
    	if (pageUrl) {
    		url += '&l=' + pageUrl;
    	}
    } else if (pageUrl) {
    	url += '?l=' + pageUrl;
    }
    var img = new Image();
    img.src = url;
}
