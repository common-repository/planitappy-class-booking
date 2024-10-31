(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Thcemes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

})( jQuery );



function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}


function secondInstructions(evt, tab2Name) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent2");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks2");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(tab2Name).style.display = "block";
    evt.currentTarget.className += " active";
}


function ajaxOptionSubmit() {

  
        //jQuery("#submit-button").on("click", function(){console.log("submit is firing") }); 
        //jQuery("#submit-button").on("click", function(){ jQuery.post("options.php", jQuery("#cleanup_options").serialize())});
        console.log("submit is firing");
        jQuery.post("options.php", jQuery("#cleanup_options").serialize());

        var currStoreUrl=jQuery("#storeURLinput").val();
        jQuery("#alert-store_url").text(currStoreUrl);
        console.log(currStoreUrl);
       
        var srcURL = "https://" + currStoreUrl + ".planitappy.com/classic/zBook";
        jQuery("#site_url_alert_div").css("display","block");
        jQuery("#booking-iframe").attr("src",srcURL);
  
        console.log(srcURL);
        return false; 
        


}

