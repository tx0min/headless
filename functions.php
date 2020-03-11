<?php
    
    
    // Add support for full and wide align images.
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'align-wide' );
    add_theme_support('editor-styles');
    add_editor_style( 'style-editor.css' );

    add_action("admin_menu", "add_theme_menu_item");
    add_action("admin_init", "headless_display_theme_panel_fields");

    add_image_size( 'square-small', 150, 150, true ); 
    add_image_size( 'square-medium', 350, 350, true ); 
    add_image_size( 'square-big', 500, 500, true ); 
    add_image_size( 'size-featured', 1050, 350, true ); 
    add_image_size( 'size-important', 600, 350, true ); 


    
    function add_theme_menu_item()
    {
        add_submenu_page('options-general.php',"Headless theme", "Headless theme", "manage_options", "headless-theme-panel", "headless_theme_settings_page", null, 99);
    }



    function headless_theme_settings_page()
    {
        ?>
            <div class="wrap">
            <h1>Headless theme</h1>
            <form method="post" action="options.php">
                <?php
                    settings_fields("section");
                    do_settings_sections("theme-options");      
                    submit_button(); 
                ?>          
            </form>
            </div>
        <?php
    }

    function display_redirect_url()
    {
        ?>
            <input type="url" size='80' name="redirect_url" id="redirect_url" value="<?php echo get_option('redirect_url'); ?>" />
        <?php
    }

    function headless_display_theme_panel_fields()
    {
        add_settings_section("section", "All Settings", null, "theme-options");
        add_settings_field("redirect_url", "Redirect URL", "display_redirect_url", "theme-options", "section");
        register_setting("section", "redirect_url");
        
    }