var serviceURL = "http://www.app.setevent.in/news/";

var news;

$('#newsListPage').bind('pageinit', function(event) {
	getNewsList();
});

function getNewsList() {

	$.getJSON(serviceURL + 'newsListPage.php?page=index&callback=?', function(data) {
	
		$('#newsList li').remove();
		$.each(data, function(index, news1) {
			
			$('#newsList').append('<li><a onclick=\"window.open(\'newsView.html?id=' + news1.news_id+'&page=index&callback=?'+'\',\'_self\')\">' +
					'<img src="'+serviceURL+'img/' + news1.news_picture + '"/>' +
					'<h4>' + news1.news_title + '</h4>' +
					'<p>' + news1.news_description + '</p></a></li>');
					
		});
		$('#newsList').listview('refresh');
	});
	
}
