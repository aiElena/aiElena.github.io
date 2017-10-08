<?php
/**
 * Template Name: PM Template
 **/
?>
<?php get_header();?>
		
	<div class="container">
	<div class="row">
		<div class="grid-test col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			<div class="lamp">
				<span class="h1"><button type="button" class="button_1">PM</button></span>			
				<h1>PM</h1>
				
				<img src="<?php echo get_template_directory_uri(); ?>\img\lamp.png" alt="">	
				<span class="h4"><button type="button" class="button_2">Программа<br>курса</button></span>
			</div>
		</div>
		<div class="grid-test col-lg-5 col-md-5 col-sm-5 col-xs-5 h5 text-right txt left">	
			<p>	
				Откуда берутся проекты. 
				Проект, программа, портфель. 
				Типы проектных организаций. 
				Участники проекта.<br> 
				Фазы проекта. 	
			</p>
			<div class="line_1"></div>
			<p>
				WBS. 
				Диаграммы Ганта. 
			</p>
			<div class="line_1"></div>
			<p>
				Оценка задач. 
				Подходы к оценке задач.
			</p>
			
			<div class="line_1"></div>
			<p>
				Проектная документация.
			</p>
			<div class="line_1"></div>
			<p>
				Встречи. 
				Подготовка. 
				Фасилитация. 
				Частые типы встреч (One on one, сбор требований, планирование, ретроспектива).
			</p>
			<div class="line_1"></div>
			<p>
				Разбор ПО для работы.<br> 
				Jira. 
				Trello. 
				Redmine. 
				Confluence.
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
				Разбор основных терминов и понятий.
			</p>
			<div class="line_2"></div>
			<p>
				Этапы разработки. 
				Негибкие (Waterfall). 
				Гибкие.(Scrum, Kanban). 
			</p>
			<div class="line_2"></div>
			<p>
				Какие вопросы задавать. 
				Написание User stories. 
				Создание Walking skeleton.
			</p>
			<div class="line_2"></div>
			<p>
				Работа с рисками.<br>  
				Выявление и оценка рисков. 
				Анализ состояния проекта, который передают. 
			</p>
			<div class="line_2"></div>
			<p>
				Создание плана коммуникаций на проекте. 
				Деловая переписка на проекте: 
				Письма. 
				Чаты. 
				Конференционные звонки.
			</p>
			<div class="line_2"></div>
			<p>
				Работа с командой. 
				Типы личностей. 
				Управление конфликтами.
			</p>
			<div class="line_2"></div>
			<p>
				 Взаимодействие с Sales, Account Manager, Recruiter, HR. 
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
						4 000 грн
					</p>				
				</div>
						
				<div class="grid-test col-lg-7 col-md-7 col-sm-7 col-xs-12">
					<?php echo do_shortcode( '[contact-form-7 id="351" title="Contact form 2"]' ); ?>
				</div>
		</div>
	</div>
</div>
<?php get_footer();?>	