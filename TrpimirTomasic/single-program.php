<?php
    get_header();
?>
    <?php
if ( have_posts() )
{
  while ( have_posts() )
  {
    the_post();
        $sIstaknutaSlika = "";
        $sNaslov = "test";

        $sIstaknutaSlika = "";
        if( get_the_post_thumbnail_url($post->ID) )
        {
          $sIstaknutaSlika = get_the_post_thumbnail_url($post->ID);
        }
        $oProgramVrste = wp_get_post_terms( $post->ID, 'tezina' );
        $oProgramVrsta = "-";
            if(sizeof($oProgramVrste)>0)
                {
                    $oProgramVrsta = $oProgramVrste[0]->name;
                    echo '
                    <div class="program-container">
                        <div class="program-container-slika">
                          <div class="pozadinska_boja"></div>
                          <img src="'.$sIstaknutaSlika.'">
                        </div>
                        <div class="container" style="text-align:center;">
                        <h3>'.$oProgramVrsta.'</h3>
                        '.nl2br($post->post_content).'
                        </div>
                      </div>';
                }

  }
}

get_footer();
?>

