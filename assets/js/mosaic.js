function flipTile() {
	var $container = $('#mosaic');
	$target = $container.children().first();

	$target.flip({
		color: '#610B21',
		content:"<div style='width:300px;height:150px;color:white;font-size:18pt'><a href='"+$target.data('url')+"'>"+$target.data('name')+"</a></div>",
		direction:"tb",
		speed:250
	});

	$target.next().flip({
		color: '#610B21',
		content:"<div style='width:150px;height:150px;'></div>",
		direction:"tb",
		speed:250
	});
}