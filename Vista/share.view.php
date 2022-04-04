<?php 
    // pass web-site url
    $site_url  = "https://github.com/BryanCloudDev/BlogDeRecetas";
    // post title
    $site_title  = "Recetas en 5min";
?>

<!-- <a> Tab para el Blog de Recetas -->
<div id="button_share">
    
    <!-- Email Social Media -->
    <a href="mailto:?Subject=<?=$site_title?>&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 <?=$site_url?>">
        <img src="https://cdn-icons-png.flaticon.com/512/732/732200.png" alt="Email share link" />
    </a>
 
    <!-- Facebook Social Media -->
    <a href="http://www.facebook.com/sharer.php?u=<?=$site_url?>" target="_blank">
        <img src="https://spng.pngfind.com/pngs/s/439-4392840_facebook-link-icon-image-dynamic-spectrum-alliance-pink.png" alt="Facebook share link" />
    </a>
     
    <!-- Twitter Social Media -->
    <a href="https://twitter.com/share?url=<?=$site_url?>&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank">
        <img src="https://img.icons8.com/color/344/twitter--v1.png" alt="Twitter share link" />
    </a>

</div>