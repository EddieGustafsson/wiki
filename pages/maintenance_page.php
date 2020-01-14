<?php 
include '../includes/settings.php';

if($maintenance_mode == false){
    header("location: ".$host."/home");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Site Maintenance – <?php echo $site_title?></title>
        <meta http-equiv="Refresh" content="400">
        <link rel="icon" href="<?php echo $host;?>/assets/images/favicon.ico" type="image/x-icon">
        <style>
            body { 
                text-align: center; padding: 150px; 
            }
            h1 { 
                font-size: 50px; 
            }
            body { 
                font: 20px Helvetica, sans-serif; color: #333; 
            }
            article { 
                display: block; text-align: left; width: 650px; margin: 0 auto; 
            }
            a { 
                color: #dc8100; text-decoration: none; 
            }
            a:hover { 
                color: #333; text-decoration: none; 
            }
        </style>
    </head>
    <body>
        <article>
            <h1>We&rsquo;ll be back soon!</h1>
            <div>
                <p>Sorry for the inconvenience but we&rsquo;re performing some maintenance at the moment. If you need to you can always <a href="mailto:<?php echo $contact_mail?>">contact us</a>, otherwise we&rsquo;ll be back online shortly!</p>
                <p>&mdash; The <?php echo $site_title?> Team</p>
            </div>
        </article>
    </body>
</html>