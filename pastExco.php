<!DOCTYPE html>
<html lang="en">
	<head>

		<title>Past Exco</title>
		
		<!--  use php to avoid lengthy repeating codes on every page-->
		<?php include("./fixedElement/head.php"); ?> 
		
		<style>
		th, td {
			border-bottom: 1px solid #ddd;
			padding: 5px;
		}
		
		.table-striped>tbody>tr:nth-child(odd)>th {
			background-color: #ffffff;
		}
		.table-striped>tbody>tr:nth-child(odd)>td {
			background-color: #e2f7fe;
		}
		
		.table-hover>tbody>tr:hover>td {
			background-color: #339BEB;
			color: #ffffff;
		}
		
		</style>
		
	</head>

	<body class="no-trans">
		
		<!--  use php to avoid lengthy repeating codes on every page-->
		<?php include("./fixedElement/scrollToTopButton.php"); ?>
		<?php include("./fixedElement/header.php"); ?> 
		
		<div style="height:80px;"></div>
		
		<div class="section" >
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h1 class="title text-center">Lists of Past <span>Exco</span></h1>
						<hr>
						
						<!-- Generate tables by php code -->
						<?php $request="pastExco"; include("./fixedElement/exco.php"); ?>
						<!-- 
						You do not need to edit any html codes to modify the exco lists. 
						If you want to modify/add list, edit exco.xlsx at the root directory
						***To add a table of new cabinet
							1. add a new spreadsheet at the rightmost 
							2. Type the informations following formats of previous spreadsheets, which must have 
								- Cell B1: no. of cabinet
								- Cell B2: session's years
								- Cell B3: name of cabinet
								- infos of each exco start at row 6, with 
									column A = postition, column B = English name, column C = Chinese name, column D = program
								If you do not follow this format, infos cannot be display.
							3. Then this newest (rightmost) spreadsheet will be automatically converted into the table in currentExco.php, 
								while the older spreadsheets will be automatically converted into the tables in pastExco.php
						
						-->
						
					</div>
				</div>
			</div>
		</div>
		
		<!-- footer start -->
		<!-- ================ -->
		<?php include("./fixedElement/joinUs.php"); ?>
		
		<footer id="footer">
			<!--  use php to avoid lengthy repeating codes on every page-->
			<?php include("./fixedElement/contact.php"); ?>
			<?php include("./fixedElement/footer.php"); ?>
			

		</footer>
		<!-- footer end -->

	</body>
</html>