<?php get_header(); ?>

<!-- Hero Section -->
<section class="pt-24 pb-12 md:pt-32 md:pb-20 bg-gradient-to-br from-indigo-50 to-purple-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6">
                <?php echo get_theme_mod('hero_title', 'Empowering Handmade Sellers Through Digital Marketing'); ?>
            </h1>
            <p class="text-xl md:text-2xl text-gray-600 mb-8">
                <?php echo get_theme_mod('hero_subtitle', 'Transform your handmade business with expert digital marketing strategies, templates, and courses designed specifically for craft sellers.'); ?>
            </p>
            <a href="<?php echo get_theme_mod('hero_button_url', '#services'); ?>" 
               class="inline-block bg-indigo-600 text-white px-8 py-4 rounded-lg text-lg font-semibold hover:bg-indigo-700 transition shadow-lg hover:shadow-xl">
                <?php echo get_theme_mod('hero_button_text', 'Explore Our Resources'); ?>
            </a>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-center mb-16">
            <?php echo get_theme_mod('services_title', 'Our Digital Marketing Solutions'); ?>
        </h2>
        
        <div class="grid md:grid-cols-3 gap-8">
            <?php
            $services = new WP_Query(array(
                'post_type' => 'service',
                'posts_per_page' => 3,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ));

            if ($services->have_posts()) :
                while ($services->have_posts()) : $services->the_post();
                    $icon_class = get_post_meta(get_the_ID(), 'service_icon', true);
            ?>
                <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition">
                    <div class="text-indigo-600 text-4xl mb-4">
                        <i class="<?php echo esc_attr($icon_class); ?>"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4"><?php the_title(); ?></h3>
                    <div class="text-gray-600 mb-6">
                        <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="text-indigo-600 font-semibold hover:text-indigo-700 transition">
                        <?php _e('Learn More', 'makers-momentum'); ?> <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-8">
                <?php echo get_theme_mod('about_title', 'About Us'); ?>
            </h2>
            <div class="text-xl text-gray-600 text-center mb-12">
                <?php echo get_theme_mod('about_content', 'At Maker\'s Momentum Mastery, we\'re passionate about helping handmade sellers succeed in the digital marketplace. Our expertise in digital marketing combined with deep understanding of the handmade industry allows us to provide targeted solutions that work.'); ?>
            </div>
            <div class="grid md:grid-cols-3 gap-8 text-center">
                <?php
                $stats = array(
                    array(
                        'number' => get_theme_mod('stat_1_number', '500+'),
                        'label' => get_theme_mod('stat_1_label', 'Satisfied Clients')
                    ),
                    array(
                        'number' => get_theme_mod('stat_2_number', '50+'),
                        'label' => get_theme_mod('stat_2_label', 'Digital Resources')
                    ),
                    array(
                        'number' => get_theme_mod('stat_3_number', '95%'),
                        'label' => get_theme_mod('stat_3_label', 'Success Rate')
                    )
                );

                foreach ($stats as $stat) :
                ?>
                    <div>
                        <div class="text-4xl font-bold text-indigo-600 mb-2"><?php echo esc_html($stat['number']); ?></div>
                        <div class="text-gray-600"><?php echo esc_html($stat['label']); ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-8">
                <?php echo get_theme_mod('contact_title', 'Get In Touch'); ?>
            </h2>
            <?php echo do_shortcode('[contact-form-7 id="' . get_theme_mod('contact_form_id', '') . '"]'); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
