<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-gray-50'); ?>>
<?php wp_body_open(); ?>

    <!-- Header & Navigation -->
    <header class="bg-white shadow-sm fixed w-full z-50">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    echo '<a href="' . esc_url(home_url('/')) . '" class="text-2xl font-bold text-indigo-600">' . get_bloginfo('name') . '</a>';
                }
                ?>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex space-x-8">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container' => false,
                        'menu_class' => 'flex space-x-8',
                        'items_wrap' => '%3$s',
                        'link_before' => '<span class="text-gray-600 hover:text-indigo-600 transition">',
                        'link_after' => '</span>'
                    ));
                    ?>
                </div>
                
                <!-- Mobile Menu Button -->
                <button class="md:hidden text-gray-600" id="mobile-menu-button">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
            
            <!-- Mobile Navigation -->
            <div class="md:hidden hidden" id="mobile-menu">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => 'div',
                    'container_class' => 'flex flex-col space-y-4 mt-4 pb-4',
                    'menu_class' => '',
                    'link_before' => '<span class="text-gray-600 hover:text-indigo-600 transition">',
                    'link_after' => '</span>'
                ));
                ?>
            </div>
        </nav>
    </header>

    <main>
