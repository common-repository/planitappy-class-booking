<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://planitappy.com
 * @since      1.0.0
 *
 * @package    Pia_CalendarBooking
 * @subpackage Pia_CalendarBooking/admin/partials
 */ 

$plugins_url = plugins_url();
$logo = 'src="' . plugins_url("img/logo-text-only.png", dirname(__FILE__)) . '"';
$imgFolder = plugins_url("img/", dirname(__FILE__));
$storeCustomURL = get_option("pia_store_url");
echo ("")
?>




<div class="wrap">
	    <div class="updated notice is-dismissible" id="site_url_alert_div" style="width: 50%; display: none ;">
	        <?php echo ("<p>Your Store URL <span id='alert-store_url'></span> has been saved successfully!</p>"); ?>
	    </div>
	
	
	    <img style="display:block; margin-top: 20px;" <?php echo($logo); ?>  ><h1 style="display:block;">PlanItAppy Class Booking via Calendar Settings</h1>
	
	
	    <div class="tab" style="margin-top: 20px;">
			    <button class="tablinks active" id="settingsTabButton" onclick="openCity(event, 'Settings')">Settings</button>
				<button class="tablinks" onclick="openCity(event, 'Instructions')">Instructions</button>
	    </div>
	
	    
	    
		<div id="Settings" class="tabcontent" style="display: block;">
		      	<h3>Settings</h3>
				<form id="cleanup_options"  name="cleanup_options" onsubmit="return ajaxOptionSubmit() ">
					<?php $site_url = get_option("pia_store_url"); ?>
					<?php  settings_fields('pia_site_url'); 
			        	/*do_settings_section($this->plugin_name);*/
					?>
			
			
			        <!-- PIA Store URL -->
			        <fieldset>
			            <p><b>Store URL:</b> Enter the first part of the URL of your store</p>
			            <p>eg: if the URL is<span style="font-style: italic;"> city-gym.planitappy.com</span>, enter "city-gym".</p>
			            <p class="url-block">https://</p><input style="width: 15%;" type="text" class="regular-text url-block" name="pia_store_url" id="storeURLinput" value="<?php if(!empty($site_url)) echo $site_url; ?>"/><p class="url-block">.planitappy.com</p>
			        </fieldset>
			        
			        <button id="submit-button">Save</button>
			        <!-- <?php submit_button('Save', 'primary','submit', TRUE); ?> -->
				</form>
		</div>
		
		
	
	    <div id="Instructions" class="tabcontent" style="display: none;">
		        <h1><b>Instructions:</b></h1>
		
		        <div class="tab" style="margin-top: 20px;">
		            <button class="tablinks2 active" id="findStoreURLTabButton" onclick="secondInstructions(event, 'FindStoreURL')">1: Find Your Store URL</button>
		            <button class="tablinks2" id="calendarEventsButton" onclick="secondInstructions(event, 'calendarEvents')">2: Create Calendar Events</button>
				    <button class="tablinks2" onclick="secondInstructions(event, 'TestURL')">3: Test your Store URL</button>
		            <button class="tablinks2" id="shortcodeButton" onclick="secondInstructions(event, 'shortcode')">4: Copy the Shortcode</button>
		        </div>
		        
		        <div id="FindStoreURL" class="tabcontent2" style="display: block;">
		
		
		            <h2><b>1: Login/Sign up </b></h2>
		            <p>Begin by <a href="https://planitappy.com/classic/Members/signIn" target="_blank">logging into</a> your PlanItAppy account. If you do not have an account, <a href="https://planitappy.com/classic/Members/register" target="_blank">sign up</a> for a free 15 day trial.</p>
		
		
		            <h2 style="margin-top: 60px;"><b>2: Go to your Store Page and copy the URL</b></h2>
		            <p>Your PlanItAppy Store has a unique URL - you'll need this to set up the Booking Form.</p>
		            <p>To get it, log into your admin area, and click either of the links in the green boxes to visit your store:</p>
		            <?php echo('<img src="' . $imgFolder . '/pia-instruction-store-button.png">'); ?> 
		            <br >
		            <p style="padding-top: 30px; padding-bottom: 30px;">Once your store opens in a new tab, copy the part between <i>https://</i> and <i>.planitappy.com</i>, as shown in the green box below:</p>
		            <?php echo('<img src="' . $imgFolder . '/pia-instruction-store-url.png">'); ?> 
		           
		           
		
		
		            <h2 style="margin-top: 60px;"><b>3: Save your Store URL in the plugin:</b></h2>
		            <p style="padding-bottom: 100px;">Now that you have your Store URL, go back to the top of this page, click into "Settings", paste your store URL into the box, and click "Save". Click the "Test your Store URL" tab to ensure you have done this correctly.</p>
		        </div>
		
		        
		        <div id="calendarEvents" class="tabcontent2" style="display: none;">
		
		            <h2 style="margin-top: 20px;"><b>Create your calendar events (classes)</b></h2>
		            <p>Once you have logged in or signed up, you need to create the classes that will appear on your calendar. <br>To do that, go to "Calendar Events" in the top menu.</p>
		            
		            <?php echo('<img src="' . $imgFolder . '/pia-create-calendar-event1.png" style="height:500px">'); ?> 
		            <br >
		            <p style="padding-top: 30px; padding-bottom: 30px;">then click on "Create New Class":</p>
		            <?php echo('<img src="' . $imgFolder . '/pia-create-calendar-event2.png" style="height:500px">'); ?> 
		            
		            <p style="padding-bottom: 100px;">When you have created one or more classes, you will see them listed in the "Test your Store URL" tab.</p>
		        </div>
		        
		        
		        <div id="TestURL" class="tabcontent2" style="display: none;">
			         <p>If you have correctly saved your store URL and created classes, you will see the Calendar appear below, with a list of available classes from which your clients can make bookings.</p>
			         <p>If you don't see it or you feel something has gone wrong, but don't worry - contact <a href="mailto:support@planitappy.com">support@planitappy.com</a> and we'll help you to fix it!</p>
			
			         <h2>Services Booking Form:</h2>
			         <?php  echo (pia_calendar_display()); ?>
			    </div>
		
		
		        <div id="shortcode" class="tabcontent2" style="display: none;">
		            <h2><b>The Shortcode:</b></h2>
		            [pia_calendar]
		            <h2 style="margin-top: 20px;"><b>Copy the Shortcode:</b></h2>
		            <p>The plugin shortcode is a small line of code that you use to display the Calendar. You can place it anywhere on your site - in Posts, Pages, Widgets, even the Footer if you really want! To avoid any errors when pasting it into a Post or Page, make sure to be in the Text editor before pasting it:</p>
		            <?php echo('<img src="' . $imgFolder . '/pia-instruction-text-editor.png">'); ?>		            
		        </div>
	    </div>
</div>
