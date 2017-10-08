<?php wp_footer(); ?>

<footer>

		<div class="container-fluid">
			<div class="row">
				<div class="grid-test col-lg-3 col-md-3 col-sm-12 col-xs-12">
							
					<div class="logo_footer">
						<img src="<?php echo get_template_directory_uri(); ?>\img\lamp_footer.png" alt="">	
						<span class="h2">Bright Idea</span>
					</div>
						
				</div>
				<div class="grid-test col-lg-3 col-md-3 col-sm-12 col-xs-12">
								
					<div class="text-left info">
						<a href="#"><p>info@brightidea.com.ua</p></a>
						<p>+38 067 4201505</p>
						<p>+38 050 0610176</p>
					</div>
					
				</div>
				<div class="grid-test col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">		
				
					<form class="form-group" action="/send" method="post">
						<div>
							<input name="subscribe-email" type="email" class="form-control" id="feedback-email" placeholder="Email" required>
						</div>
								
				
				
							
					
						<a href="#"><img src="<?php echo get_template_directory_uri(); ?>\img\icon_f.png" alt="" class="icon"></a>
						<a href="https://twitter.com/share"><img src="<?php echo get_template_directory_uri(); ?>\img\icon_tw.png" alt="" class="icon"></a>
						<a href="#"><img src="<?php echo get_template_directory_uri(); ?>\img\icon_vk.png" alt="" class="icon"></a>
						
						<button type="submit" class="btn btn-success">Подписаться</button>
					</form>
				</div>			
			</div>
		</div>

</footer>

  </body>
</html>






