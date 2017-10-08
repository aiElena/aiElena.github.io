<?php
/**
 * Template Name: Java Template
 **/
?>
<?php get_header();?>

<div class="container">
	<div class="row">
		<div class="grid-test col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			<div class="lamp">
				<span class="h1"><button type="button" class="button_1">Java</button></span>			
				<h1>Java</h1>
				
				<img src="<?php echo get_template_directory_uri(); ?>\img\lamp.png" alt="">	
				<span class="h4"><button type="button" class="button_2">Программа<br>курса</button></span>
			</div>
		</div>
		<div class="grid-test col-lg-5 col-md-5 col-sm-5 col-xs-5 h5 text-right txt left">	
			<p>
				Типы данных, литералы, преобразование между примитивами<br>
				Рассмотрение примеров на живом коде. Обёртки над примитивами.
			</p>
			<div class="line_1"></div>
			<p>
				Основы объектно-ориентированного программирования<br>
				Классы и объекты в Java. Класс Object. Модификаторы доступа<br>
				Наследование, инкапсуляция, полиморфизм. Примеры кода.

			</p>
			<div class="line_1"></div>
			<p>
				 Абстрактные классы и интерфейсы. Javadoc. Generics
			</p>
			
			<div class="line_1"></div>
			<p>
				Коллекции в Java. Enum
			</p>
			<div class="line_1"></div>

			<p>
				Maven и Github.
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
						</div>	
					</div>
				</div>
			</div>
			
		</div>
		<div class="grid-test col-lg-5 col-md-5 col-sm-5 col-xs-5 h5 txt right">
			<p>
				Основные понятия Java. JVM, JRE, JDK<br>
				Компиляция и запуск из консоли Classpath<br>
				Intellij IDE. Установка ПО. Примеры кода 
			</p>
			<div class="line_2"></div>
			<p>
				Операции и операторы, приоритет, типы операндов в Java<br>
				Основные конструкции языка Java. Массивы и строки в Java<br>
				Решение алгоритмических задачек на Java.
			</p>
			<div class="line_2"></div>
			<p>
				Оператор instanceof. Преобразования между классами, массивами<br>
				Перегрузка, перекрытие и сокрытие методов в Java<br>
				Ключевые слова final, static. Класс Class. GC.
			</p>
			<div class="line_2"></div>
			<p>
				Исключения в Java.
			</p>
			<div class="line_2"></div>
			<p>
				Потоки ввода-вывода (IO): cимвольные, байтовые потоки,<br>
				Scanner, Formatter, IO: надстройки<br>
				Сериализация/десериализация в Java.
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
						5 500 грн
					</p>				
				</div>
						
				<div class="grid-test col-lg-7 col-md-7 col-sm-7 col-xs-12">
					<?php echo do_shortcode( '[contact-form-7 id="351" title="Contact form 2"]' ); ?>
				</div>
		</div>
	</div>
</div>

<?php get_footer();?>