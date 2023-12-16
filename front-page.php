<?phpget_header();?>    <div id="front-page" class="container">        <main id="primary" class="site-main">						<?php			if ( ! is_user_logged_in() ): ?>                <form name="loginform" id="loginform"                      action="<?php echo esc_url( site_url( 'wp-login.php',					      'login_post' ) ); ?>" method="post">                    <label for="user_login">Username<br>                        <input type="text" name="log" id="user_login"                               class="input" value="" size="20"></label>                    <label for="user_pass">Password<br>                        <input type="password" name="pwd" id="user_pass"                               class="input" value="" size="20"></label>                    <input type="submit" name="wp-submit" id="wp-submit"                           class="button button-primary" value="Log In">                    <input type="hidden" name="redirect_to"                           value="<?php echo $_SERVER['REQUEST_URI']; ?>">                </form>			<?php endif; ?>												<?php			if ( is_user_logged_in() ) {								/**				 * Daily Stories Section				 *				 */								$daily_stories = "Daily Stories";				$daily_story   = htmlspecialchars( $daily_stories,					ENT_QUOTES,					'UTF-8' );				echo '<div class="well text-center">' .				     '<h1>' . $daily_story . '</h1>' .				     '</div>';								$args = array(					'post_type'      => 'dailystories',					'posts_per_page' => 6,					'orderby'        => 'date',					'order'          => 'DESC',				);								echo '<div id="front-page-announcement-grid" class="row justify-content-center">';								$query = new WP_Query( $args );								if ( $query->have_posts() ) {					while ( $query->have_posts() ) {						$query->the_post();						get_template_part( 'template-parts/content',							'frontpage' );					}									} else {										$non_daily_stories = "No Daily Stories at this time.";					$non_daily_story   = htmlspecialchars( $non_daily_stories,						ENT_QUOTES,						'UTF-8' );					echo '<div class="well text-center">' .					     '<h3>' . $non_daily_story . '</h3>' .					     '</div>';				}								// Restores the default post data				wp_reset_postdata();								echo '</div>';												/**				 * Weekly Plan Section				 *				 */								$weekly_plan      = "Weekly Plan";				$safe_weekly_plan = htmlspecialchars( $weekly_plan,					ENT_QUOTES,					'UTF-8' );				echo '<div class="well text-center">' .				     '<h1>' . $safe_weekly_plan . '</h1>' .				     '</div>';								$args = array(					'post_type'      => 'weeklyplan',					'posts_per_page' => 6,					'orderby'        => 'date',					'order'          => 'DESC',				);								echo '<div id="front-page-weeklyplan-grid" class="row justify-content-center">';								$query = new WP_Query( $args );								if ( $query->have_posts() ) {					while ( $query->have_posts() ) {						$query->the_post();						get_template_part( 'template-parts/content',							'frontpage' );					}									} else {										$non_weekly_plan      = "No Weekly Plan posts at this time.";					$safe_non_weekly_plan = htmlspecialchars( $non_weekly_plan,						ENT_QUOTES,						'UTF-8' );					echo '<div class="well text-center">' .					     '<h3>' . $safe_non_weekly_plan . '</h3>' .					     '</div>';				}								// Restores the default post data				wp_reset_postdata();								echo '</div>';    				/**				 * Exploration and Projects				 *				 */								$exploration_projects      = "Exploration and Projects";				$safe_explorations_projects = htmlspecialchars( $exploration_projects,					ENT_QUOTES,					'UTF-8' );				echo '<div class="well text-center">' .				     '<h1>' . $safe_explorations_projects . '</h1>' .				     '</div>';								$args_exploration = array(					'post_type'      => 'exploration',					'posts_per_page' => 6,					'orderby'        => 'date',					'order'          => 'DESC',				);								echo '<div id="front-page-exploration-grid" class="row justify-content-center">';								$query_exploration = new WP_Query( $args_exploration );								if ( $query_exploration->have_posts() ) {					while ( $query_exploration->have_posts() ) {						$query_exploration->the_post();						get_template_part( 'template-parts/content',							'frontpage' );					}									} else {										$non_exploration_projects      = "No Exploration and Projects posts at this time.";					$safe_non_exploration_projects = htmlspecialchars( $non_exploration_projects,						ENT_QUOTES,						'UTF-8' );					echo '<div class="well text-center">' .					     '<h3>' . $safe_non_exploration_projects . '</h3>' .					     '</div>';				}								// Restores the default post data				wp_reset_postdata();								echo '</div>';    				/**				 * News Section				 *				 */								$news_title      = "News";				$safe_news_title = htmlspecialchars( $news_title,					ENT_QUOTES,					'UTF-8' );				echo '<div class="well text-center">' .				     '<h1>' . $safe_news_title . '</h1>' .				     '</div>';								echo '<div id="front-page-post-grid" class="row justify-content-center">';												while ( have_posts() ) :					the_post();										get_template_part( 'template-parts/content', 'frontpage' );										// If comments are open or we have at least one comment, load up the comment template.					//if (comments_open() || get_comments_number()) :					// comments_template();					// endif;								endwhile; // End of the loop.								echo '</div>';			}						?>        </main><!-- #main -->    </div><?phpif ( is_user_logged_in() ) {	get_sidebar();	get_footer();}