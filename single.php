<?php
/**
 * The template for displaying all single posts
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package c5connections_Theme
 */

get_header();
?>

    <div id="single-post-template" class="container">

        <main id="primary" class="site-main">

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
					<?php
					if ( is_singular() ) :
						the_title( '<h1 class="entry-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="'
						           . esc_url( get_permalink() )
						           . '" rel="bookmark">',
							'</a></h2>' );
					endif; ?>
					
					<?php
					$post_id   = get_the_ID(); // Replace with your post ID.
					$author_id = get_post_field( 'post_author', $post_id );
					
					echo '<span class="published">Published:&nbsp;'
					     . get_the_date( 'F j, Y',
							$post_id )
					     . '</span>';  // Echo the date of the post. Change the format as needed.
					echo '<span class="author">Author:&nbsp;'
					     . get_the_author_meta( 'display_name',
							$author_id ) . '</span>';  // Echo the author name.
					?>
					
					<?php
					
					if ( 'post' === get_post_type() ) :
						?>
                        <div class="entry-meta">
							<?php
							c5connections_theme_posted_on();
							c5connections_theme_posted_by();
							?>
                        </div><!-- .entry-meta -->
					<?php endif; ?>
                </header><!-- .entry-header -->
				
				<?php c5connections_theme_post_thumbnail(); ?>

                <div id="daily-story-container">
					
					<?php
					// Get the 'intro' field
					$intro = get_field( 'intro' );
					// Output the 'intro' field
					if ( $intro ) {
						echo '<div class="daily-story-text well">' . $intro
						     . '</div>';
					}
					?>
					
					<?php if ( have_rows( 'images' ) ):
						echo '<div class="row justify-content-center daily-stories-images">';
						while ( have_rows( 'images' ) ): the_row();
							$image   = get_sub_field( 'image' );
							$caption = get_sub_field( 'caption' );
							if ( $image ):  // If there is an image
								?>
                                <div class="card col-md-4 daily-story-image">
                                    <div class="image">
                                        <img src="<?php echo esc_url( $image['url'] ); ?>"
                                             alt="<?php echo esc_attr( $image['alt'] ); ?>"/>
										<?php if ( $caption ): ?>  <!-- If there is a caption -->
                                            <p class="caption"><?php echo wp_kses_post( $caption ); ?></p>
										<?php endif; ?>
										<?php if ( have_rows( 'comments' ) ):
											echo '<ul class="comments-list">';
											while ( have_rows( 'comments' ) ): the_row();
												$comment
													= get_sub_field( 'comment' );
												if ( $comment ):  // If there is a comment
													?>
                                                    <li class="comment-item"><?php echo wp_kses_post( $comment ); ?></li>
												<?php
												endif;
											endwhile;
											echo '</ul>';
										endif; ?>
                                    </div>
                                </div>
							<?php
							endif;
						endwhile;
						echo '</div>';
					endif; ?>
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
					
					<?php
					while ( have_posts() ) :
						the_post();
						
						get_template_part( 'template-parts/content',
							get_post_type() );
						
						the_post_navigation(
							array(
								'prev_text' => '<span class="nav-subtitle">'
								               . esc_html__( 'Previous:',
										'c5connections-theme' )
								               . '</span> <span class="nav-title">%title</span>',
								'next_text' => '<span class="nav-subtitle">'
								               . esc_html__( 'Next:',
										'c5connections-theme' )
								               . '</span> <span class="nav-title">%title</span>',
							)
						);
						
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					
					endwhile; // End of the loop.
					?>
                </div>
            </article><!-- #post-<?php the_ID(); ?> -->

        </main><!-- #main -->

    </div>

<?php
get_sidebar();
get_footer();
