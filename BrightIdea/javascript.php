<?php
/**
 * Template Name: JavaScript Template
 **/
?>
<?php get_header();?>
		
	<div class="container">
	<div class="row">
		<div class="grid-test col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			<div class="lamp">
				<span class="h1"><button type="button" class="button_1">JavaScript</button></span>			
				<h1>JavaScript</h1>
				
				<img src="<?php echo get_template_directory_uri(); ?>\img\lamp.png" alt="">	
				<span class="h4"><button type="button" class="button_2">Программа<br>курса</button></span>
			</div>
		</div>
		<div class="grid-test col-lg-5 col-md-5 col-sm-5 col-xs-5 h5 text-right txt left">	
			<p>	
				Основы JavaScript.
				
			</p>
			<div class="line_1"></div>
			<p>
				Взаимодействие JavaScript и CSS.<br>
				Css селекторы. 
				Анологи css селекторов в JavaScript.
				Работа с классами.

			</p>
			<div class="line_1"></div>
			<p>
				Регулярные выражение и работа с событиями.<br>
				Обьект RegExp.
				Регулярные выражения.


			</p>
			
			<div class="line_1"></div>
			<p>
				Координаты и работа с формами.<br>
				Валидация форм.
			</p>
			<div class="line_1"></div>
			<p>
				Cookie, Local & WebStorage. Работа с Cookie.
				
			</p>
			<div class="line_1"></div>
			<p>
				Работа с данными, отправка дынных, JSON, XMLHttpRequest.
			</p>
			<div class="line_1"></div>
			
		
		</div>	
		<div class="grid-test col-lg-2 col-md-2 col-sm-2 col-xs-2 container">
			<div class="row">
				<div class="grid-test col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			
					<div class="vline_circle">
						<div class="vline">
							<p><b>1</b></p>
							<p><b>2</b></p>
							<p><b>3</b></p>
							<p><b>4</b></p>
							<p><b>5</b></p>
							<p><b>6</b></p>
							<p><b>7</b></p>
							<p><b>8</b></p>
							<p><b>9</b></p>
							<p><b>10</b></p>
							<p><b>11</b></p>
							<p><b>12</b></p>
							<p><b>13</b></p>						
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<div class="grid-test col-lg-5 col-md-5 col-sm-5 col-xs-5 h5 txt right">
			<p>
				Окружение и инструменты разработки.<br>
				Знакомство с Git и Github. Репозиторий<br>
				Jade. Stylus. Gulp.
			</p>
			<div class="line_2"></div>
			<p>
				Объекты. Основы работы с DOM.
			</p>
			<div class="line_2"></div>
			<p>
				Таймеры, Интервалы работы со строками.
			</p>
			<div class="line_2"></div>
			<p>
				События, делегирование и координаты.
			</p>
			<div class="line_2"></div>
			<p>
				ООП в JavaScript. Обьект Date() 	
			</p>
			<div class="line_2"></div>
			<p>
				Работа с изображениями в JavaScript.
			</p>
			<div class="line_2"></div>
			<p>
				Работа над реальным проектом в командах.
			</p>
			<div class="line_2"></div>
			
			
		
		</div>
		
					
	</div>

</div>
	

<div class="wrap">
	<div class="container1 text-center container">
		<div class="row">
			
				<div class="grid-test col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-12">
					<p><img src="<?php echo get_template_directory_uri(); ?>\img\icon1.png" align="left" alt="">
						Начало<br> март	месяц
					</p>	
					<p><img src="<?php echo get_template_directory_uri(); ?>\img\icon2.png" align="left" alt="">
						2.5 часа<br>
						2 раза в неделю
					</p>
					<p><img src="<?php echo get_template_directory_uri(); ?>\img\icon3.png" align="left" alt="">
						4 200 грн
					</p>				
				</div>
						
				<div class="grid-test col-lg-7 col-md-7 col-sm-7 col-xs-12">
					<?php echo do_shortcode( '[contact-form-7 id="351" title="Contact form 2"]' ); ?>
				</div>
		</div>
	</div>
</div>
<?php get_footer();?>	