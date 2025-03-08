</main>
    
    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <?php if (is_active_sidebar('footer-1')) : ?>
                        <?php dynamic_sidebar('footer-1'); ?>
                    <?php else : ?>
                        <h3 class="text-xl font-bold mb-4"><?php bloginfo('name'); ?></h3>
                        <p class="text-gray-400">
                            Empowering handmade sellers with digital marketing expertise.
                        </p>
                    <?php endif; ?>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4"><?php _e('Quick Links', 'makers-momentum'); ?></h4>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container' => false,
                        'menu_class' => 'space-y-2',
                        'link_before' => '<span class="text-gray-400 hover:text-white transition">',
                        'link_after' => '</span>'
                    ));
                    ?>
                </div>
                
                <div>
                    <?php if (is_active_sidebar('footer-2')) : ?>
                        <?php dynamic_sidebar('footer-2'); ?>
                    <?php else : ?>
                        <h4 class="text-lg font-semibold mb-4"><?php _e('Resources', 'makers-momentum'); ?></h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-400 hover:text-white transition"><?php _e('Ebooks', 'makers-momentum'); ?></a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition"><?php _e('Templates', 'makers-momentum'); ?></a></li>
                            <li><a href="#" class="text-gray-400 hover:text-white transition"><?php _e('Online Courses', 'makers-momentum'); ?></a></li>
                        </ul>
                    <?php endif; ?>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4"><?php _e('Connect With Us', 'makers-momentum'); ?></h4>
                    <div class="flex space-x-4">
                        <?php
                        $social_links = array(
                            'facebook' => get_theme_mod('facebook_url', '#'),
                            'twitter' => get_theme_mod('twitter_url', '#'),
                            'instagram' => get_theme_mod('instagram_url', '#'),
                            'linkedin' => get_theme_mod('linkedin_url', '#')
                        );
                        
                        foreach ($social_links as $platform => $url) {
                            echo '<a href="' . esc_url($url) . '" class="text-gray-400 hover:text-white transition">';
                            echo '<i class="fab fa-' . $platform . '"></i>';
                            echo '</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All rights reserved.', 'makers-momentum'); ?></p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
    
    <script>
        // Mobile menu toggle
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            if (mobileMenuButton && mobileMenu) {
                mobileMenuButton.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>
</body>
</html>
