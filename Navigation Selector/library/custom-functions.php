<?php
/**
 *
 * Optional Custom Navigation theme.
 * @param post $post the post object
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/save_post
 * @version 0.1
 *
**/

// Create Custom Class
function custom_add_nav_custom_class( $post ) {
    add_meta_box( 'custom_nav_meta_box', __( 'Do you want your navigation fixed or static on your page?', 'custom' ), 'custom_nav_meta_box', 'page', 'normal', 'high' );
    add_meta_box( 'custom_nav_meta_box', __( 'Do you want your navigation fixed or static on your page?', 'custom' ), 'custom_nav_meta_box', 'post', 'normal', 'high' );
}
add_action('add_meta_boxes', 'custom_add_nav_custom_class');

// Add Meta Box
function custom_nav_meta_box( $post ) {
    $values     = get_post_custom( $post->ID );
    $text       = isset( $values['custom_nav_display'] ) ? esc_attr( $values['custom_nav_display'][0] ) : '';
    $selected   = isset( $values['custom_nav_display'] ) ? esc_attr( $values['custom_nav_display'][0] ) : '';
    $check      = isset( $values['custom_nav_display'] ) ? esc_attr( $values['custom_nav_display'][0] ) : '';

    wp_nonce_field( basename(__FILE__), 'custom_nav_nonce' );
    ?>      
    <p>
        <select name="custom_nav_display" id="custom_nav_display">
            <option value="transparent-header" <?php selected( $selected, 'transparent-header' ); ?>> Static </option> <!-- Static navigation -->
            <option value="navbar-inverse navbar-fixed-top" <?php selected( $selected, 'navbar-inverse navbar-fixed-top' ); ?>> Fixed </option> <!-- Fixed navigation -->
        </select>       
    </p>
    <?php
}

add_action( 'save_post', 'custom_nav_custom_class_save', 10, 2 );
function custom_nav_custom_class_save( $post_id ) {

    // Verify meta box nonce
    if ( !isset( $_POST['custom_nav_nonce'] ) || !wp_verify_nonce( $_POST['custom_nav_nonce'], basename( __FILE__ ) ) ) {
        return;
    }
    // Verify save
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
    if ( !current_user_can( 'edit_post' ) ) {
        return;
    }

    if( isset( $_POST['custom_nav_display'] ) )
        update_post_meta( $post_id, 'custom_nav_display', esc_attr( $_POST['custom_nav_display'] ) );
}

function custom_post_class() {
    global $post;
    $post_state = get_the_ID();

    $post_class = get_post_meta( $post_state, 'custom_nav_display', true ); ?>
    <nav class="navbar no-margin-bottom alt-font without-button <?php echo $post_class; ?>" role="navigation">
        <div class="container navigation-menu">
            <div class="row">
                <div class="col-lg-2 col-md-2 navbar-header"> 
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#example-navbar-collapse-1"> 
                        <span class="sr-only">Toggle navigation</span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 
                        <span class="icon-bar"></span> 
                    </button>
					<a class="navbar-brand inner-link" href="<?php echo get_option('home'); ?>"></a>
                </div><!--/ .row -->
                <div class="col-lg-10 col-md-9 col-sm-9 collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php
                    $args = array(
                        'menu'              => 'primary',
                        'theme_location'    => 'primary',
                        'depth'             =>  2,
                        'container'         => 'ul',
                        'container_class'   => 'navbar-collapse',
                        'menu_class'        => 'nav navbar-nav navbar-right',
                    );
                if (has_nav_menu('primary')) {
                    wp_nav_menu($args);
                }
                ?>
                </div><!--/ .col-lg-10 -->
            </div><!--/ .row -->
        </div><!--/ .container -->
    </nav>
<?php
}