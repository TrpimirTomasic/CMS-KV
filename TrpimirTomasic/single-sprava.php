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
        $oSpravaVrste = wp_get_post_terms( $post->ID, 'grupa_misica' );
        $oSpravaVrsta = "-";
            if(sizeof($oSpravaVrste)>0)
                {
                    $oSpravaVrsta = $oSpravaVrste[0]->name;
                    echo '
                    <div class="sprava-container">
                        <div class="sprava-container-slika">
                          <div class="pozadinska_boja"></div>
                          <img src="'.$sIstaknutaSlika.'">
                        </div>
                        <div class="container" style="text-align:center;">
                        <h3>'.$oSpravaVrsta.'</h3>
                        '.nl2br($post->post_content).'
                        </div>
                      </div>';
                }

  }
}

get_footer();
?>

