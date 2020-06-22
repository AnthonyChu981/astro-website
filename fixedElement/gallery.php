<div class="row">
	<div class="col-xs-12">

		<div class="galleryTab">
		  <a data-rel="all" href="javascript:;" class="filter active">ALL</a>
		  <?php 
		  // render category selector tabs
		  $galleryDir = "./images/gallery/*"; // target directories under gallery : notice the star "*" after the trailing slash  
		  foreach( glob( $galleryDir, GLOB_ONLYDIR ) as $dir ) {
			  // render category selector tabs and exclude the thumbnail directory
			  if( $dir != "./images/gallery/thumbs" ){
				  $dataRel = substr( $dir, 20, 4 ); // return first 4 letters of each folder as category
				  $dirName = trim( substr( $dir, 20, 200 ) ); // returns a trimmed string (200 chars length) with name of folder without parent folder
				  echo "<a data-rel=\"" . $dataRel . "\" href=\"javascript:;\" class=\"filter\">" . strtoupper( $dirName ) . "</a>"; 
			  } // END if()
		  } // END foreach()
		  unset($dir);
		  ?>
		</div>
	<br>
	</div>
</div>

<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-md-12 col-sm-8">
		<div class="galleryWrap ">
			<?php

			
			// general variables
			$imgListArray = array(); // main image array list 
			$imgExtArray = array("jpg", "jpeg", "png", "gif"); // accepted image extensions (in lower-case)
			$thumbsDir = "./images/gallery/thumbs/"; // path to the thumbnails destination directory
			$galleryFiles = "./images/gallery/*/*"; // path to all files and sub-directories (use your own gallery name directory)
			$txtExtArray = array("txt"); //path to description of photos

			// iterate all subdirectories and files 
			foreach( glob( $galleryFiles ) as $file ) {
				$ext = strtolower( pathinfo( $file, PATHINFO_EXTENSION ) ); // get extension in lower-case for validation purposes
				$imagePath = pathinfo( $file, PATHINFO_DIRNAME ) . "/"; // get path for validation purposes (added trailing slash)
				
				// if image extension is valid (is in the $imgExtArray array) AND the image is not inside the "thumbs" sub-directory
				if( in_array( $ext, $imgExtArray ) && $imagePath != $thumbsDir ){
					// additional image variables 
					$imageName = pathinfo( $file, PATHINFO_BASENAME ); // returns "cheeta.jpg"
					$thumbnail = $thumbsDir.$imageName; // thumbnail full path and name, i.e "./gallery/thumbs/cheeta.jpg"
					$dataFilter = substr( $file, 20, 4 ); // from "./images/gallery/animals/cheeta.jpg" returns "anim" 
					
					
					
					// Create thumbnails
					
					// verify if thumbnail exists, otherwise create it
					if ( !file_exists( $thumbnail ) ){
						
						// set the thumb size
						$thumbWidth = 200;
						$thumbHeight = 200;		
						
						// for each image, get width and height
						$imageSize = getimagesize( $file ); // image size 
						$imageWidth = $imageSize[0];  // extract image width 
						$imageHeight = $imageSize[1]; // extract image height						
						
						// Cut and rescale
						if( $imageHeight > $imageWidth ){
							$cutHeight = floor( ( $imageHeight - $imageWidth )/2 );
							$createFromjpeg = imagecreatefromjpeg( $file );
							$thumb_temp = imagecreatetruecolor( $thumbWidth, $thumbHeight );
							imagecopyresampled($thumb_temp, $createFromjpeg, 0, 0, 0, $cutHeight, $thumbWidth, $thumbHeight, $imageWidth, $imageWidth);
							imagejpeg( $thumb_temp, $thumbnail );
							
						} else {
							$cutWidth = floor( ( $imageWidth - $imageHeight )/2 );
							$createFromjpeg = imagecreatefromjpeg( $file );
							$thumb_temp = imagecreatetruecolor( $thumbWidth, $thumbHeight );
							imagecopyresampled($thumb_temp, $createFromjpeg, 0, 0, $cutWidth, 0, $thumbWidth, $thumbHeight, $imageHeight, $imageHeight);
							imagejpeg( $thumb_temp, $thumbnail );
							
						} // END else if
					}
					
					
					
					// Create description
					$textPath = $imagePath.substr( $imageName, 0, -4).".txt";
					// verify if description file exist
					if ( file_exists( $textPath ) ){
						$handle = fopen($textPath, "r");
						$caption = fread($handle,filesize($textPath));
						fclose($handle);
					} else {
						$caption = "";
					}
					
					// Create sub-array for this image
					// notice the key,value pair
					$imgListSubArray = array( 
						LinkTo=>$file, 
						ImageName=> $imageName,
						Datafilter=>$dataFilter, 
						Thumbnail=>$thumbnail, 
						Position=>$thumbPosition,
						Caption=>$caption
					); 
					
					// Push this sub-array into main array $imgListArray
					array_push ( $imgListArray, $imgListSubArray ); 
				} // END if()
			} // END foreach()
			unset($file); // destroy the reference after foreach()
			// END the loop

			// shuffle and render
			shuffle( $imgListArray ); // random order otherwise is boring
			$countedItems = count( $imgListArray ); // number of images in gallery
			// render html links and thumbnails
			for ( $row = 0; $row < $countedItems; $row++ ){
				// watch out for escaped double quotes 
				echo "<a class=\"fancybox imgContainer\" data-fancybox=\"gallery\" href=\"" .
					  $imgListArray[$row][LinkTo] . "\" data-caption=\"" .
					  $imgListArray[$row][Caption] . "\" data-filter=\"" .
					  $imgListArray[$row][Datafilter] . "\"><img src=\"" . 
					  $imgListArray[$row][Thumbnail] . "\" style=\"max-width:100%; max-height:100%;" . 
					  $imgListArray[$row][Position] . "\" alt=\"" . 
					  $imgListArray[$row][ImageName] . "\" /></a>\n";          
			} // END for()

			
			?>

		</div>



	</div>
</div>



