<?php 
    // pass web-site url
    $site_url  = "https://github.com/BryanCloudDev/BlogDeRecetas";
    // post title
    $site_title  = "Recetas en 5min";
?>

<!-- <a> Tab para el Blog de Recetas -->
<div  id="button_share">
    <!-- Email Social Media -->
    <a style="margin:5px;" href="mailto:?Subject=<?=$site_title?>&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 <?=$site_url?>">
        <img src="https://cdn-icons-png.flaticon.com/512/732/732200.png" alt="Email share link" />
    </a>
    <!-- Facebook Social Media -->
    <a style="margin:5px;" href="http://www.facebook.com/sharer.php?u=<?=$site_url?>" target="_blank">
        <img src="https://www.freepnglogos.com/uploads/facebook-logo-icon/facebook-logo-icon-file-facebook-icon-svg-wikimedia-commons-4.png" alt="Facebook share link" />
    </a>
    <!-- Twitter Social Media -->
    <a style="margin:5px;" href="https://twitter.com/share?url=<?=$site_url?>&amp;text=Recetas%20en%205min&amp;hashtags=RecetasEn5min" target="_blank">
        <img src="https://www.iconpacks.net/icons/2/free-twitter-logo-icon-2429-thumb.png" alt="Twitter share link" />
    </a>
</div>