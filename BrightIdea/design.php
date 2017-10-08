<?php
/**
 * Template Name: Design Template
 **/
?>
<?php get_header();?>
		
	<div class="container">
	<div class="row">
		<div class="grid-test col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			<div class="lamp">
				<span class="h1"><button type="button" class="button_1">Графический дизайн</button></span>			
				<h1>Графический дизайн</h1>
				
				<img src="<?php echo get_template_directory_uri(); ?>\img\lamp.png" alt="">	
				<span class="h4"><button type="button" class="button_2">Программа<br>курса</button></span>
			</div>
		</div>
		<div class="grid-test col-lg-5 col-md-5 col-sm-5 col-xs-5 h5 text-right txt left">	
			<p>	
			Изучение стандартных тегов языка разметки текста HTML
				
			</p>
			<div class="line_1"></div>
			<p>
				Позиционирование в СSS. Блочная модель HTML (padding, margin, box-sizing)<br>
				Float и выпадание из потока. Понятие Layout.
			</p>
			<div class="line_1"></div>
			<p>
				Использование элемента div для группирования тегов.<br>
				Структура проекта. Валидность и семантика.
			</p>
			
			<div class="line_1"></div>
			<p>
				Работа с формами (input, textarea, button)<br>
				Оптимизация графики. CSS-спрайты.
			</p>
			<div class="line_1"></div>
			<p>
				Основы адаптивного дизайна (responsive).
			</p>
			<div class="line_1"></div>
			<p>
				Анализ простого макета. Верстка макета и работа над ошибками.
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
				Введение в HTML и CSS. Стандарты языка разметки HTML<br> 
				Назначение DOCTYPE и его форматы. Понятие базовой <br>
				структуры HTML документа.<br>
			</p>
			<div class="line_2"></div>
			<p>
					Основные понятия CSS. Что такое CSS. Как правильно подключать CSS<br> 
					Синтаксис CSS. Понятие селектор.<br>
					Понятие наследования. “Вес селекторов”.
			</p>
			<div class="line_2"></div>
			<p>
					CSS3<br>
					Стиль кода HTML и CSS.
			</p>
			<div class="line_2"></div>
			<p>
					Использование тегов HTML5 для формирования структуры шаблона<br>
					Рассмотрение, назначение тегов HTML5 и их преимущества.
			</p>
			<div class="line_2"></div>
			<p>
				Пиксельная точность (perfect pixel)<br> 
				Понятие кроссбраузерности<br>
				Особенности некоторых браузеров<br>
				Резиновая верстка.
			</p>
			<div class="line_2"></div>
			<p>
				Основы JavaScript.
			</p>
			<div class="line_2"></div>
			<p>
				CSS-фреймворки на примере Bootstrap и Foundation.
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
						Начало 18.09.17<br>
						Окончание 20.11.17
					</p>	
					<p><img src="<?php echo get_template_directory_uri(); ?>\img\icon2.png" align="left" alt="">
						Среда 16.00-18.00<br>	
						Суббота 14.00-16.00	
					</p>
					<p><img src="<?php echo get_template_directory_uri(); ?>\img\icon3.png" align="left" alt="">
						5 000 грн
					</p>				
				</div>
						
				<div class="grid-test col-lg-7 col-md-7 col-sm-7 col-xs-12">
					<?php echo do_shortcode( '[contact-form-7 id="351" title="Contact form 2"]' ); ?>
				</div>
		</div>
	</div>
</div>	