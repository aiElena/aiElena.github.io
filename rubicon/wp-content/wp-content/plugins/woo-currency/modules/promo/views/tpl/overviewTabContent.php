<section>
	<div class="woobewoo-item woobewoo-panel">
		<div id="containerWrapper">
			<div class="supsistic-half-side-box woobewoo-border-right">
				<h3><?php _e('FAQ and Documentation', WCU_LANG_CODE)?></h3>
				<div class="faq-list">
					<?php if(!empty($this->faqList)) { ?>
						<?php foreach($this->faqList as $title => $desc) { ?>
							<div class="faq-title">
								 <i class="fa fa-info-circle"></i>
								 <?php echo $title;?>
								 <div class="description" style="display: none;"><?php echo $desc;?></div>
							</div>
						<?php }?>
					<?php } else {?>
						<?php _e('There is no main FAQs for now', WCU_LANG_CODE)?>
					<?php }?>
					<div style="clear: both;"></div>
					<a target="_blank" class="button button-primary button-hero" href="<?php echo $this->mainLink?>#faq" style="float: right;height:35px;">
						<i class="fa fa-info-circle"></i>
						<?php _e('Check all FAQs', WCU_LANG_CODE)?>
					</a>
					<div style="clear: both;"></div>
				</div>
				<?php /*<div class="video">
					<h3><?php _e('Video Tutorial', WCU_LANG_CODE)?></h3>
					<iframe type="text/html"
							width="80%"
							height="240px"
							src="https://www.youtube.com/embed/v8h2k3vvpdM"
							frameborder="0">
					</iframe>
				</div>*/?>
				<div class="server-settings">
					<h3><?php _e('Server Settings', WCU_LANG_CODE)?></h3>
					<ul class="settings-list">
						<?php foreach($this->serverSettings as $title => $element) {?>
							<li class="settings-line">
								<div class="settings-title"><?php echo $title?>:</div>
								<span><?php echo $element['value']?></span>
							</li>
						<?php }?>
					</ul>
				</div>
			</div>
			<div class="supsistic-half-side-box" style="padding-left: 20px;">
				<?php if($this->news) {?>
					<div class="woobewoo-overview-news">
						<h3><?php _e('News', WCU_LANG_CODE)?></h3>
						<div class="woobewoo-overview-news-content">
							<?php echo $this->news?>
						</div>
						<a href="<?php echo $this->mainLink?>" class="button button-primary button-hero" style="float: right; margin-top: 10px;height:35px;">
							<i class="fa fa-info-circle"></i>
							<?php _e('All news and info', WCU_LANG_CODE)?>
						</a>
						<div style="clear: both;"></div>
					</div>
				<?php }?>
				<div class="overview-contact-form">
					<h3><?php _e('Contact form', WCU_LANG_CODE)?></h3>
					<form id="form-settings">
						<table class="contact-form-table">
							<?php foreach($this->contactFields as $fName => $fData) { ?>
								<?php
									$htmlType = $fData['html'];
									$id = 'contact_form_'. $fName;
									$htmlParams = array('attrs' => 'id="'. $id. '"');
									if(isset($fData['placeholder']))
										$htmlParams['placeholder'] = $fData['placeholder'];
									if(isset($fData['options']))
										$htmlParams['options'] = $fData['options'];
									if(isset($fData['def']))
										$htmlParams['value'] = $fData['def'];
									if(isset($fData['valid']) && in_array('notEmpty', $fData['valid']))
										$htmlParams['required'] = true;
								?>
							<tr>
								<th scope="row">
									<label for="<?php echo $id?>"><?php echo $fData['label']?></label>
								</th>
								<td>
									<?php echo htmlWcu::$htmlType($fName, $htmlParams)?>
								</td>
							</tr>
							<?php }?>
							<tr>
								<th scope="row" colspan="2">
									<?php echo htmlWcu::hidden('mod', array('value' => 'promo'))?>
									<?php echo htmlWcu::hidden('action', array('value' => 'sendContact'))?>
									<button class="button button-primary button-hero" style="float: right; margin: 10px 0;height:35px;">
										<i class="fa fa-upload"></i>
										<?php _e('Send email', WCU_LANG_CODE)?>
									</button>
									<div style="clear: both;"></div>
								</th>
							</tr>
						</table>
					</form>
					<div id="form-settings-send-msg" style="display: none;">
						<i class="fa fa-envelope-o"></i>
						<?php _e('Your email was sent, we will try to respond to your as soon as possible. Thank you for support!', WCU_LANG_CODE)?>
					</div>
				</div>
			</div>
			<div style="clear: both;"></div>
		</div>
	</div>
</section>