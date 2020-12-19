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
        $oTrenerVrste = wp_get_post_terms( $post->ID, 'tip' );
        $oTrenerVrsta = "-";
            if(sizeof($oTrenerVrste)>0)
                {
                    $oTrenerVrsta = $oTrenerVrste[0]->name;
                    echo '
                    <div class="trener-container">
                        <div class="trener-container-slika">
                          <div class="pozadinska_boja"></div>
                          <img src="'.$sIstaknutaSlika.'">
                        </div>
                        <div class="container" style="text-align:center;">
                        <h3>'.$oTrenerVrsta.'</h3>
                        '.nl2br($post->post_content).'
                        </div>
                      </div>';
                }

  }
}

get_footer();
?>

