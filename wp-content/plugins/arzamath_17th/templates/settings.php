<div class="wrap">
    <h2>Arzamath_17th</h2>
    <form method="post" action="options.php"> 
        <?php @settings_fields('wp_plugin_template-group'); ?>
        <?php @do_settings_fields('wp_plugin_template-group'); ?>

        <?php do_settings_sections('wp_plugin_template'); ?>

        <?php @submit_button(); ?>
    </form>
</div>