<?php 
	global $c4d_plugin_manager;
	$plus = isset($c4d_plugin_manager['c4d-woo-cgz-icon-plus']) ? $c4d_plugin_manager['c4d-woo-cgz-icon-plus'] : 'fa fa-search-plus';
	$minus = isset($c4d_plugin_manager['c4d-woo-cgz-icon-minus']) ? $c4d_plugin_manager['c4d-woo-cgz-icon-minus'] : 'fa fa-search-minus';
	$buttonList = isset($c4d_plugin_manager['c4d-woo-cgz-layout-list']) ? $c4d_plugin_manager['c4d-woo-cgz-layout-list'] : 'fa fa-list';
	$buttonGrid = isset($c4d_plugin_manager['c4d-woo-cgz-layout-grid']) ? $c4d_plugin_manager['c4d-woo-cgz-layout-grid'] : 'fa fa-th';
?>
<div class="c4d-woo-cgz">
	<span class="zoom-button zoom-out"><i class="<?php echo esc_attr($minus); ?>"></i></span>
	<span class="zoom-button zoom-in"><i class="<?php echo esc_attr($plus); ?>"></i></span>
</div>

<div class="c4d-woo-cgz-layout">
	<span class="layout-button button-list"><i class="<?php echo esc_attr($buttonList); ?>"></i></span>
	<span class="layout-button button-grid active"><i class="<?php echo esc_attr($buttonGrid); ?>"></i></span>
</div>