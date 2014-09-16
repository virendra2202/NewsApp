$(function() {
var serviceURL = "http://www.app.setevent.in/news/";
var news;
$('#newsListPage').bind('pageinit', function(event) {
	getCity();
});
function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}
function getCity() {
var city = getUrlVars()["city"];
	$.getJSON(serviceURL + 'city.php?city='+city+'&page=index&callback=?', function(data) {
		$('#select option').remove();
		//news = data.items;
		$.each(data, function(index, city1) {
			$('#city').append('<option value="'+ city1.news_city +'">' +
					'<p>' + city1.news_city + '</p></option>');
		});
		
	});
}
getCity();
});

