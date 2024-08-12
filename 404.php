<?php
    include_once("header.php");
?>
	<!--//nav-->
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="index.php">Home</a>
		</li>
		<li class="breadcrumb-item active">404</li>
	</ol>
	<!--/main-->
	<section class="banner-bottom-agile-w3ls">
		<div class="error-404">
			<h4>404</h4>
			<p>Oops ! Nothing to See here.</p>
			<form action="#" method="post">
				<input class="form-control" class="serch" type="search" name="serch" placeholder="Search here" required="">
				<button class="btn1">
					<i class="fa fa-search" aria-hidden="true"></i>
				</button>
				<div class="clearfix"> </div>
			</form>
			<div class="error social-icons">

			</div>
			<a class="b-home btn" href="index.php">Back to Home</a>
		</div>


	</section>
	<!--//main-->

    <?php   
        include_once("footer.php");
    ?>
	<!---->
	<!-- js -->
	<script  src="js/jquery-2.2.3.min.js"></script>
	<!-- //js -->
	<!--/ start-smoth-scrolling -->
	<script  src="js/move-top.js"></script>
	<script  src="js/easing.js"></script>
	<script >
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 900);
			});
		});
	</script>
	<!--// end-smoth-scrolling -->

	<script >
		$(document).ready(function () {
			/*
									var defaults = {
							  			containerID: 'toTop', // fading element id
										containerHoverID: 'toTopHover', // fading element hover id
										scrollSpeed: 1200,
										easingType: 'linear' 
							 		};
									*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<a href="#home" class="scroll" id="toTop" style="display: block;">
		<span id="toTopHover" style="opacity: 1;"> </span>
	</a>

	<!-- //Custom-JavaScript-File-Links -->
	<script  src="js/bootstrap.js"></script>


</body>

</html>