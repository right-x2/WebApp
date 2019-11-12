<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<?php
			$news_pages = $_GET["newspages"];
			if ($news_pages==null)  $news_pages = 5;
			$song_count = 1234;
			$song_hour = $song_count/10;
			$arr = array("Guns N' Roses", "Green Day", "Blink182", "The Cranberries","Bruno Mars", "Amy Winehouse","Jason Mraz");
			var_dump($arr);
			$path = glob("lab5/musicPHP/songs/*.mp3");
			$m3u_path = glob("lab5/musicPHP/songs/*.m3u");
		?>
		<h1>My Music Page</h1>
		
		<!-- Ex 1: Number of Songs (Variables) -->
		<p>
			I love music.
			I have <?= $song_count?> total songs,
			which is over <?= $song_hour?> hours of music!
		</p>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Billboard News</h2>
			<ol>
			<?php for($i = 0; $i < $news_pages ;$i++)
			{?>
				<?php $count = 11-$i; ?>
				<li><a href="https://www.billboard.com/archive/article/2019<?=$count?>">2019-<?= $count ?></a>
			<?php } ?>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>
			<ol>
				<?php foreach (file("favorite.txt") as $name) {
  					$tokens = explode(" ", $name);
  					?>
  					<li><a href="https://en.wikipedia.org/wiki/<?= $tokens[0] ?>_<?= $tokens[1] ?>"><?=$name?>
					</a>
  					<?php
				}?>
		</div>
		
		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
				<?php foreach ($path as $filename) {?>
	    			<li class="mp3item"><a href="<?=$filename?>"><?=basename($filename)?></a>   (<?=(int)(filesize($filename)/1024)?>KB)
	    			<?php
	    		}?>
				<!-- Exercise 8: Playlists (Files) -->
				<?php foreach ($m3u_path as $filename) {?>
	    			<li class="playlistitem"><?=basename($filename)?>
	    				<ul>
			    			<?php foreach (file($filename) as $file_m3u) {?>
			    				<?php if(basename($file_m3u)[0]!="#"){?>
			    					<li><?=basename($file_m3u)?></li>
			    				<?php
			    				}?>
			    			<?php
			    			}?>
			    		</ul>
			    	</li>
	    		<?php
	    		}?>
			</ul>
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
