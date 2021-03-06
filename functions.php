<?php


/*Задание 1*/

$filter_list = array(
    array(
        'title' => 'Reports',
        'tags'  => 'reports file',
    ),
    array(
        'title' => 'Analytics',
        'tags'  => 'analytics graphs',
    ),
    array(
        'title' => 'Export',
        'tags'  => 'export download',
    ),
    array(
        'title' => 'Storage',
        'tags'  => 'storage',
    ),
);

function show_filter_list($filter_list)
{
    foreach ($filter_list as $list_item) {
        echo "
		    <li class=list-group-item>
			    <span data-filter-tags='{$list_item['tags']}'>{$list_item['title']}</span>
		    </li>
	    ";
    }
}


/*Задание 2*/

$posts_list = array(
    array(
        'header'  => 'Privacy',
        'content' => 'Your privacy is important to us at SmartAdmin and the protection, confidentiality and integrity of your personal data are our prime concerns. We will only use your personal information to administer your account, provide the products and services you have requested from us, and to keep you informed about our products and services (if you have consented to this). We only use your data for the purposes for which it was collected and, where relevant, to meet local legal obligations. We will retain your personal information only for as long as is necessary for the purposes for which the information was collected, or as long as is required pursuant to law.',
    ),
    array(
        'header'  => 'Cookies and other similar technologies',
        'content' => 'We collect certain data through cookies and similar technologies (e.g. web beacons, tags, device identifiers). Cookies are text files placed on your computer to collect standard internet log information and visitor behaviour information. This information is used to track visitor use of the website and to compile statistical reports on website activity. We register your interaction with our services in order to improve our website, content and services. Our use of such technologies and the data collected is described in more detail in our Cookie Policy. You can manage your cookie preferences through your browser settings.',
    ),

);


function show_posts($posts_list)
{
    foreach ($posts_list as $list_item) {
        echo "
	        <h2>{$list_item['header']}</h2>
	        <p class='mb-g'>{$list_item['content']}</p>
	    ";
    }
}


/*Задание 3*/

$breadcrumbs_list = array(
    array(
        'title' => 'Главная',
        'link'  => 'homepage.php',
    ),
    array(
        'title' => 'PHP',
        'link'  => 'php.php',
    ),
    array(
        'title' => 'Функции',
        'link'  => 'functions.php',
    ),
    array(
        'title' => 'implode',
        'link'  => 'implode.php',
    ),

);

function show_breadcrumbs($breadcrumbs_list)
{
    echo '<ol class="breadcrumb page-breadcrumb">';

    foreach ($breadcrumbs_list as $list_item) {
        if ($list_item != end($breadcrumbs_list)) {
            echo "<li class='breadcrumb-item'><a href='{$list_item['link']}'>{$list_item['title']}</a></li>";
            continue;
        }

        echo "<li class='breadcrumb-item'>{$list_item['title']}</li>";
    }

    echo '</ol>';
}


/*Задание 4*/

$content_list = array(
    array(
        'title'         => 'My Tasks',
        'data'          => '130 / 500',
        'class'         => 'progress-bar bg-fusion-400',
        'style'         => 'width: 65%;',
        'aria-valuenow' => '65',
    ),
    array(
        'title'         => 'Transfered',
        'data'          => '440 TB',
        'class'         => 'progress-bar bg-success-500',
        'style'         => 'width: 34%;',
        'aria-valuenow' => '34',
    ),
    array(
        'title'         => 'Bugs Squashed',
        'data'          => '77%',
        'class'         => 'progress-bar bg-info-400',
        'style'         => 'width: 77%;',
        'aria-valuenow' => '77',
    ),
    array(
        'title'         => 'User Testing',
        'data'          => '7 days',
        'class'         => 'progress-bar bg-primary-300',
        'style'         => 'width: 84%;',
        'aria-valuenow' => '184',
    ),
);

function show_content($content_list)
{
    foreach ($content_list as $list_item) {
        echo "
            <div class='d-flex mt-2'>
                {$list_item['title']}
                <span class='d-inline-block ml-auto'>{$list_item['data']}</span>
            </div>
            <div class='progress progress-sm mb-3'>
                <div class='{$list_item['class']}' role='progressbar' style='{$list_item['style']}' aria-valuenow='{$list_item['aria-valuenow']}' aria-valuemin='0' aria-valuemax='100'></div>
            </div>
		";
    }
}


/*Задание 5, 6*/

$users_list = array(
    array(
        'photo'            => 'img/demo/authors/sunny.png',
        'name'             => 'Sunny A.',
        'technology_stack' => 'UI/UX Expert',
        'position'         => 'Lead Author',
        'social_1_name'    => '@myplaneticket',
        'social_1_link'    => 'https://twitter.com/@myplaneticket',
        'social_2_name'    => '',
        'social_2_link'    => 'https://wrapbootstrap.com/user/myorange',
        'is_banned'        => false,
    ),
    array(
        'photo'            => 'img/demo/authors/josh.png',
        'name'             => 'Jos K.',
        'technology_stack' => 'ASP.NET Developer',
        'position'         => 'Partner &amp; Contributor',
        'social_1_name'    => '@atlantez',
        'social_1_link'    => 'https://twitter.com/@atlantez',
        'social_2_name'    => '',
        'social_2_link'    => 'https://wrapbootstrap.com/user/Walapa',
        'is_banned'        => true,
    ),
    array(
        'photo'            => 'img/demo/authors/jovanni.png',
        'name'             => 'Jovanni L.',
        'technology_stack' => 'PHP Developer',
        'position'         => 'Partner &amp; Contributor',
        'social_1_name'    => '@lodev09',
        'social_1_link'    => 'https://twitter.com/@lodev09',
        'social_2_name'    => '',
        'social_2_link'    => 'https://wrapbootstrap.com/user/lodev09',
        'is_banned'        => false,
    ),
    array(
        'photo'            => 'img/demo/authors/roberto.png',
        'name'             => 'Roberto R.',
        'technology_stack' => 'Rails Developer',
        'position'         => 'Partner &amp; Contributor',
        'social_1_name'    => '@sildur',
        'social_1_link'    => 'https://twitter.com/@sildur',
        'social_2_name'    => '',
        'social_2_link'    => 'https://wrapbootstrap.com/user/sildur',
        'is_banned'        => true,
    ),
);


function show_users($users_list)
{
    foreach ($users_list as $list_item) {
        echo "
	        <div class='".($list_item['is_banned'] ? 'banned ' : '')."rounded-pill bg-white shadow-sm p-2 border-faded mr-3 d-flex flex-row align-items-center justify-content-center flex-shrink-0'>
	            <img src='{$list_item['photo']}' alt='Jos K.' class='img-thumbnail img-responsive rounded-circle' style='width:5rem; height: 5rem;'>
	            <div class='ml-2 mr-3'>
	                <h5 class='m-0'>
	                    {$list_item['name']} ({$list_item['technology_stack']})
	                    <small class='m-0 fw-300'>
	                        {$list_item['position']}
	                    </small>
	                </h5>
	                <a href='{$list_item['social_1_name']}' class='text-info fs-sm' target='_blank'>{$list_item['social_1_name']}</a> -
	                <a href='{$list_item['social_2_link']}' class='text-info fs-sm' target='_blank' title='Contact Jos'><i class='fal fa-envelope'></i></a>
	            </div>
	        </div>
    	";
    }
}


/*Задание 7*/

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


function add_users_to_db_from_array($users_list)
{
    foreach ($users_list as $list_item) {
        $link = db_query();
        $user = implode("','", $list_item);

        $sql_query = "INSERT INTO users VALUES (NULL, '$user')";

        mysqli_query($link, $sql_query) or die(mysqli_error($link));
    }
}


function get_users_from_db()
{
    $link      = db_query();
    $sql_query = "SELECT * FROM users";

    $result = mysqli_query($link, $sql_query) or die(mysqli_error($link));

    return $result;
}


function show_users_from_db()
{
    $users_list = get_users_from_db();

    show_users($users_list);
}


/*Задание 8*/

function show_users_table()
{
    $users_list  = get_users_from_db();
    $row_counter = 0;

    foreach ($users_list as $list_item) {
        ++$row_counter;

        $fullname = explode(' ', $list_item['name']);

        $user_first_name = $fullname[1];
        $user_last_name  = $fullname[0];
        $user_nick_name  = $list_item['social_1_name'];
        $user_id         = $list_item['id'];

        echo "
        	    <tr>
                    <th scope='row'>$row_counter</th>
                    <td>$user_last_name</td>
                    <td>$user_first_name</td>
                    <td>$user_nick_name</td>
                    <td>
                        <a href='show.php?id=$user_id' class='btn btn-info'>Редактировать</a>
                        <a href='edit.php?id=$user_id' class='btn btn-warning'>Изменить</a>
                        <a href='delete.php?id=$user_id' class='btn btn-danger'>Удалить</a>
                    </td>
                </tr>
        	";
    }
}

