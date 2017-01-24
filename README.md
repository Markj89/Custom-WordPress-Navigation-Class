# Custom-WordPress-Navigation-Class

Add Navigation Meta Box

This is a  custom WordPress/Bootstrap 3 navigation function which allows the admin to choose whether it wants a "static" or "fixed" navigation.
The admin will be able choose between either classes provided by Bootstrap. 


Files 
/functions.php
/header.php
/library/custom-functions.php


Support

Since this also uses the bootstrap class and a custom them navigation, be sure to download the wp_bootstrap_navwalker 
GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker


Instructions

1.	Copy the code from the functions.php file and place with it the rest of included files in the Themes Function page.
	Be sure to add upload the custom-functions file before doing so or you will get a Warning/Fatal Error message.

2.	Next copy <?php custom_post_class() ?> from the header.php file to your custom header theme. You can change the name to anything you want,
	just make sure to change it in the custom-functions.php file as well. 

3.	Next you'll should see the meta box under the "Publish" meta and before the "Featured Image" meta box. This can be arranged based on priority.
	The boxes should show ('high', 'low') Default value: 'default'.
  
  ![Alt text](Navigation Selector/img/Screen Shot 2017-01-24 at 4.28.24 PM.png?raw=true "Custom Meta Box")


4. Choose your class for any page

5. Done.
