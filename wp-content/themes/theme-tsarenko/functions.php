<?php
/**
 * theme-tsarenko functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package theme-tsarenko
 */

if (!function_exists('theme_tsarenko_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function theme_tsarenko_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on theme-tsarenko, use a find and replace
         * to change 'theme-tsarenko' to the name of your theme in all the template files.
         */
        load_theme_textdomain('theme-tsarenko', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'theme-tsarenko'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('theme_tsarenko_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');
    }
endif;
add_action('after_setup_theme', 'theme_tsarenko_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function theme_tsarenko_content_width()
{
    $GLOBALS['content_width'] = apply_filters('theme_tsarenko_content_width', 640);
}

add_action('after_setup_theme', 'theme_tsarenko_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function theme_tsarenko_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'theme-tsarenko'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'theme-tsarenko'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'theme_tsarenko_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function theme_tsarenko_scripts()
{
    wp_enqueue_style('theme-tsarenko-style', get_stylesheet_uri());

    wp_enqueue_script('theme-tsarenko-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

    wp_enqueue_script('theme-tsarenko-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);


    //Register jQuery
    wp_enqueue_script('jquery');

    //Register owl-carousel files
    wp_enqueue_script('OwlCarousel-scripts', get_stylesheet_directory_uri() . '/libs/OwlCarousel/dist/owl.carousel.min.js', array('jquery'), ' ');
    wp_enqueue_style('OwlCarousel', get_template_directory_uri() . '/libs/OwlCarousel/dist/assets/owl.carousel.min.css', array(), ' ');

    //Register flex-slider files
    wp_enqueue_script('flexslider-scripts', get_stylesheet_directory_uri() . '/libs/flexslider/jquery.flexslider.js', array('jquery'), ' ');
    wp_enqueue_style('flexslider', get_template_directory_uri() . '/libs/flexslider/flexslider.css', array(), ' ');

    //Register bootstrap css from CDN
    wp_register_style('bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-css');

    //Register bootstrap js from CDN
    wp_register_script('bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
    wp_enqueue_script('bootstrap-js');

    //Register Font Awesome
    wp_register_script('font-awesome', '//use.fontawesome.com/6eebe0124d.js');
    wp_enqueue_script('font-awesome');


    //Register main.js file
    wp_enqueue_script('main-js-file', get_template_directory_uri() . '/js/main.js');

    //Register main.css file
    $theme_uri = get_template_directory_uri();
    wp_register_style('tsarenko-style', $theme_uri . '/css/main.css', false, '0.1');
    wp_enqueue_style('tsarenko-style');


    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }


}

add_action('wp_enqueue_scripts', 'theme_tsarenko_scripts');


function load_fonts()
{
    wp_register_style('et-googleFonts', 'https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet');
    wp_enqueue_style('et-googleFonts');
}

add_action('wp_print_styles', 'load_fonts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function create_posttype()
{
    //Registering post-type for carousel on front page
    register_post_type('offers',
        array(
            'labels' => array(
                'name' => __('offers'),
                'singular_name' => __('offer'),
                'menu_name' => __('Our offers')
            ),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => true,
            'supports' => array('title', 'editor', 'thumbnail', '')
        )
    );
    register_post_type('works',
        array(
            'labels' => array(
                'name' => __('works'),
                'singular_name' => __('work'),
                'menu_name' => __('Our works')
            ),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => true,
            'supports' => array('title', 'thumbnail')
        )
    );
    register_post_type('clients',
        array(
            'labels' => array(
                'name' => __('clients'),
                'singular_name' => __('client'),
                'menu_name' => __('Our client')
            ),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => true,
            'supports' => array('title', 'thumbnail')
        )
    );
}

add_action('init', 'create_posttype');


if (!function_exists('fix_no_editor_on_posts_page')) {

    /**
     * Add the wp-editor back into WordPress after it was removed in 4.2.2.
     *
     * @param Object $post
     * @return void
     */
    function fix_no_editor_on_posts_page($post)
    {
        if (isset($post) && $post->ID != get_option('page_for_posts')) {
            return;
        }

        remove_action('edit_form_after_title', '_wp_posts_page_notice');
        add_post_type_support('page', 'editor');
    }

    add_action('edit_form_after_title', 'fix_no_editor_on_posts_page', 0);
}


function my_meta_box()
{

    add_meta_box(
        'section', // Идентификатор(id)
        'section-for-content', // Заголовок области с мета-полями(title)
        'show_my_metabox', // Вызов(callback)
        'page', // Где будет отображаться наше поле
        'normal',
        'high');
}

add_action('add_meta_boxes', 'my_meta_box'); // Запускаем функцию

$meta_fields = array(
    array(
        'label' => 'Title first section',
        'desc' => 'Enter the title',
        'id' => 'title-1', // даем идентификатор.
        'type' => 'text'  // Указываем тип поля.
    ),

    array(
        'label' => 'Content first section',
        'desc' => 'Enter the content',
        'id' => 'content-1', // даем идентификатор.
        'type' => 'textarea'  // Указываем тип поля.
    ),
    array(
        'label' => 'Title second section',
        'desc' => 'Enter the title',
        'id' => 'title-2', // даем идентификатор.
        'type' => 'text'  // Указываем тип поля.
    ),

    array(
        'label' => 'Content second section',
        'desc' => 'Enter the content',
        'id' => 'content-2', // даем идентификатор.
        'type' => 'textarea'  // Указываем тип поля.
    ),
    array(
        'label' => 'Title third section',
        'desc' => 'Enter the title',
        'id' => 'title-3', // даем идентификатор.
        'type' => 'text'  // Указываем тип поля.
    ),

    array(
        'label' => 'Content third section',
        'desc' => 'Enter the content',
        'id' => 'content-3', // даем идентификатор.
        'type' => 'textarea'  // Указываем тип поля.
    ),
    array(
        'label' => 'Title fourth section',
        'desc' => 'Enter the title',
        'id' => 'title-4', // даем идентификатор.
        'type' => 'text'  // Указываем тип поля.
    ),

    array(
        'label' => 'Content fourth section',
        'desc' => 'Enter the content',
        'id' => 'content-4', // даем идентификатор.
        'type' => 'textarea'  // Указываем тип поля.
    ),
    array(
        'label' => 'Title footer section',
        'desc' => 'Enter the title',
        'id' => 'title-5', // даем идентификатор.
        'type' => 'text'  // Указываем тип поля.
    ),
    array(
        'label' => 'Title for contacts',
        'desc' => 'Enter the title',
        'id' => 'title-6', // даем идентификатор.
        'type' => 'text'  // Указываем тип поля.
    ),
    array(
        'label' => 'description contacts',
        'desc' => 'Enter the description',
        'id' => 'content-6', // даем идентификатор.
        'type' => 'textarea'  // Указываем тип поля.
    ),


);
// Вызов метаполей
function show_my_metabox()
{
    global $meta_fields; // Обозначим наш массив с полями глобальным
    global $post;  // Глобальный $post для получения id создаваемого/редактируемого поста
// Выводим скрытый input, для верификации. Безопасность прежде всего!
    echo '<input type="hidden" name="custom_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';

    // Начинаем выводить таблицу с полями через цикл
    echo '<table class="form-table">';
    foreach ($meta_fields as $field) {
        // Получаем значение если оно есть для этого поля
        $meta = get_post_meta($post->ID, $field['id'], true);
        // Начинаем выводить таблицу
        echo '<tr> 
                <th><label for="' . $field['id'] . '">' . $field['label'] . '</label></th> 
                <td>';
        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $meta . '" size="30" />
        <br /><span class="description">' . $field['desc'] . '</span>';
                break;
            case 'textarea':
                echo '<textarea name="' . $field['id'] . '" id="' . $field['id'] . '" cols="60" rows="4">' . $meta . '</textarea> 
        <br /><span class="description">' . $field['desc'] . '</span>';
                break;
        }
        echo '</td></tr>';
    }
    echo '</table>';
}


// Пишем функцию для сохранения
function save_my_meta_fields($post_id)
{
    global $meta_fields;  // Массив с нашими полями

    // проверяем наш проверочный код
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    // Проверяем авто-сохранение
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    // Проверяем права доступа
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    // Если все отлично, прогоняем массив через foreach
    foreach ($meta_fields as $field) {
        $old = get_post_meta($post_id, $field['id'], true); // Получаем старые данные (если они есть), для сверки
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {  // Если данные новые
            update_post_meta($post_id, $field['id'], $new); // Обновляем данные
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old); // Если данных нету, удаляем мету.
        }
    } // end foreach
}

add_action('save_post', 'save_my_meta_fields'); // Запускаем функцию сохранения

add_action('customize_register', function ($customizer) {
    $customizer->add_section(
        'contacts',
        array(
            'title' => 'Настройки контактной информации',
            'description' => 'Редактировать контакты',
            'priority' => 11,
        )
    );
    $customizer->add_setting(
        'phone',
        array('default' => 'Номер телефона')
    );
    $customizer->add_control(
        'phone',
        array(
            'label' => 'Введите номер телефона',
            'section' => 'contacts',
            'type' => 'text',
        )
    );
    $customizer->add_setting(
        'adress',
        array('default' => 'adress')
    );
    $customizer->add_control(
        'adress',
        array(
            'label' => ' adress',
            'section' => 'contacts',
            'type' => 'text',
        )
    );

    $customizer->add_setting(
        'map',
        array('default' => 'frame')
    );
    $customizer->add_control(
        'map',
        array(
            'label' => 'map',
            'section' => 'contacts',
            'type' => 'text',
        )
    );


});




function tsarenko_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('sidebar-footer', 'theme-tsarenko'),
        'id' => 'sidebar-footer',
        'description' => esc_html__('Add widgets here.', 'theme-tsarenko'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => esc_html__('sidebar-right', 'theme-tsarenko'),
        'id' => 'sidebar-right',
        'description' => esc_html__('Add widgets here.', 'theme-tsarenko'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));


}

add_action('widgets_init', 'tsarenko_widgets_init');


add_image_size( 'offers-thumb', 133, 133, true );








