<?php 
$awpbusinesspress_page_header_disabled = get_theme_mod('awpbusinesspress_page_header_disabled', true);
$awpbusinesspress_page_header_background_color = get_theme_mod('awpbusinesspress_page_header_background_color');
?>
<?php if($awpbusinesspress_page_header_disabled == true): ?>
<section class="theme-page-header-area">
	<?php if($awpbusinesspress_page_header_background_color != null): ?>
		<div class="overlay" style="background-color: <?php echo esc_attr($awpbusinesspress_page_header_background_color); ?>;"></div>
    <?php else: ?>
        <div class="overlay"></div>
	<?php endif; ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 content-center">
				
			</div>
		</div>
	</div>
</section>
<!-- Theme Page Header Area -->		
<?php endif; ?>