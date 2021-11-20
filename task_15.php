<?php


function db_query()
{
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $name = 'marlin-mini-2';

    $link = mysqli_connect($host, $user, $pass, $name);
    mysqli_query($link, "SET NAMES 'utf8'");

    return $link;
}


function set_images_links () {

    $link = db_query();

    $sql_query = "SELECT * FROM images ORDER BY id DESC LIMIT 3";

    $result = mysqli_query($link, $sql_query) or die(mysqli_error($link));
    foreach ($result as $image) {
        $images_links[] = $image['link'];
    }

    return $images_links;

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>
            Подготовительные задания к курсу
        </title>
        <meta name="description" content="Chartist.html">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
        <link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
        <link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
        <link rel="stylesheet" media="screen, print" href="css/statistics/chartist/chartist.css">
        <link rel="stylesheet" media="screen, print" href="css/miscellaneous/lightgallery/lightgallery.bundle.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-regular.css">
    </head>
    <body class="mod-bg-1 mod-nav-link ">
        <main id="js-page-content" role="main" class="page-content">
            <div class="row">
                <div class="col-md-6">
                    <div id="panel-1" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Задание
                            </h2>
                            <div class="panel-toolbar">
                                <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                            </div>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div class="panel-content">
                                    <div class="form-group">
                                        <form action="task_15_handler.php" method="post" enctype=multipart/form-data>
                                            <div class="form-group">
                                                <label class="form-label" for="simpleinput">Image</label>
                                            <input type="file" id="simpleinput" class="form-control" name="img_input">
                                            </div>
                                            <button class="btn btn-success mt-3">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div id="panel-1" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Загруженные картинки
                            </h2>
                            <div class="panel-toolbar">
                                <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                            </div>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div class="panel-content image-gallery">
                                    <div class="row">

	                                    <?php $images_links = set_images_links(); ?>

	                                    <?php if($images_links) : ?>

		                                    <?php foreach ($images_links as $image_link) : ?>
			                                    <div class="col-md-3 image">
				                                    <img src="<?php echo $image_link; ?>">
			                                    </div>
	                                        <?php endforeach; ?>

	                                    <?php else : ?>

		                                    <div class="col-md-3 image">
			                                    <img src="img/demo/gallery/1.jpg">
		                                    </div>
		                                    <div class="col-md-3 image">
			                                    <img src="img/demo/gallery/2.jpg">
		                                    </div>
		                                    <div class="col-md-3 image">
			                                    <img src="img/demo/gallery/3.jpg">
		                                    </div>

	                                    <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </main>
        

        <script src="js/vendors.bundle.js"></script>
        <script src="js/app.bundle.js"></script>
        <script>
            // default list filter
            initApp.listFilter($('#js_default_list'), $('#js_default_list_filter'));
            // custom response message
            initApp.listFilter($('#js-list-msg'), $('#js-list-msg-filter'));
        </script>
    </body>
</html>
