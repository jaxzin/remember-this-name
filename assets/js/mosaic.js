function flipTile() {
	var $container = $('#mosaic');

	// If there is already a tile flipped, reset it
	$reset = $container.data('flipped');
	if($reset) {
		$reset.revertFlip();
		$container.removeData('flipped');
	}

	// pick a random tile
	$target = selectRandChild($container);

	// Wait 0.5s to flip the next tile
	setTimeout(
		function() {
			$target.flip({
				color: '#111',
				content:"<div class='mosaicItemBack'><a href='"+$target.data('url')+"'>"+$target.data('name')+"</a></div>",
				direction:"tb",
				speed:200
			});
			$container.data('flipped', $target);
		}
		, 500);
}

function selectRandChild($container) {
	$children = $container.children();
	var length = $children.length;
	var ran = Math.floor(Math.random()*length);
	// console.log("length:"+length+";ran:"+ran);
	return $container.find("div:eq(" + ran + ")");
}