<?php

/***

WordPress Page Template

Drop this entire file into any theme. Keep the name "page-home.php" to overwrite a custom homepage where the page slug is "home". Or rename to overwrite a different page. 

This file loads regular header/footer from your existing theme. It then loads a component from the ACF Engine Tailwind UI integration. 

The process of parsing the Tailwind classes and rebuilding the output is handled using the ACF Engine Tailwind class. 

Change the $component variable to load a different component. 

Most components should render with a similar layout to the original at tailwindui.com. Report common bugs like missing styles during the build on ClickUp. 

***/

?>

<?php get_header(); ?>

<?php

	// Set component template.
	$component = 'marketing/page-examples/pricing-pages/with-comparison-table';
	$template  = ACF_ENGINE_PATH . '/vendor/tailwind/components/tailwindui/' . $component . '.htm';

	/* Parse Tailwind classes and force the rebuild CSS output. */
		$html     = file_get_contents( $template );
		$tw       = new AcfEngine\Core\Tailwind;
		$tw->addClassesFromHtml( $html );
		$tw->build();
	/* End snippet for TW component template parse/rebuild. */

	// Render the component template HTML.
	require_once( $template );

?>

<?php get_footer(); ?>
