<?php 
/* 
Template name: Front Page
*/
get_header('home'); 

	get_template_part( 'sections/sections-slider' );
	get_template_part( 'sections/sections-service' );
	get_template_part( 'sections/sections-about' );
	get_template_part( 'sections/sections-subscribe' );
	get_template_part( 'sections/sections-portfolio' );
	get_template_part( 'sections/sections-blog' );
	get_template_part( 'sections/sections-testimonial' );
	get_template_part( 'sections/sections-contact' );

get_footer('home');
