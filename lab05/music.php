<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>
		<!-- Ex 1: Number of Songs (Variables) -->
		<?php
			$song_count = 3456;
			$song_hours = (int)($song_count/10);
			print "	I love music. I have $song_count total songs, which is over $song_hours hours of music!";
		?>
		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Billboard News</h2>

		<?php
			$news_pages = $_GET["newspages"];
			if($news_pages==0){
				$news_pages = 5;
			}
			for($i=1, $month;$i<=$news_pages;$i++){
				$month=sprintf('%02d',12-$i);
				print"$i. <a href=https://www.billboard.com/archive/article/2019$month>2019-$month</a><br />\n";
			}
		?>
		</div>
		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>
			<?php
			$artist = array();
			$artist = file("favorite.txt");
			$lines = count($artist);
			for($i=0,$j=1; $i<$lines; $i++,$j++){
				$link_artist = str_replace(' ','_',$artist[$i]);
				print"$j. <a href=http://en.wikipedia.org/wiki/$link_artist>$artist[$i]</a><br />\n";
		}
			?>
		</div>

		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>


			<ul id="musiclist">
				<?php
					foreach (glob("lab5/musicPHP/songs/*.mp3") as $filename) { ?>
	    			<li class="mp3item"><a href="<?php echo $filename;?>"><?= basename($filename)?></a><?=" (",(int)(filesize($filename)/1024)," KB)"?></li>
				<?php }
				?>
			</ul>
				<!-- Exercise 8: Playlists (Files) -->
			<?php
				$playlist_name = array();
				$playlist_count = count($playlist_name);
				$playlist_music = array();
				foreach (array_reverse(glob("lab5/musicPHP/songs/*.m3u")) as $playlist_name) { ?>
					<li class="playlistitem"><?php echo (basename($playlist_name)); echo (":") ?></li>
					<ul>
						<?php foreach (file($playlist_name) as $playlist_music) { ?>
							<?php if(strpos($playlist_music,"#") <> "false") { ?>
											<li><?php echo ($playlist_music) ?></li>
										<?php } ?>
						<?php } ?>
					</ul>
				<?php } ?>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
