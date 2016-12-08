<?php

function base_url()
{
    include(__DIR__ . '/config.php');
    return $config['base_url'];
}

function set_value($key, $default = "")
{
	if (!empty($_POST[$key])) {
		return $_POST[$key];
	} else {
		return $default;
	}
}

function redirect($url)
{
    header("Location: " . $url);
}

function isAdmin()
{
    if (!isset($_SESSION['admin'])) {
        redirect(base_url() . 'admin/login'); exit();
    }
}

function setSession($key, $value)
{
    $_SESSION[$key] = $value;
}

function unsetSession($key)
{
    unset($_SESSION[$key]);
}

function flashSession($key)
{
    if (!empty($_SESSION[$key])) {
        $result = $_SESSION[$key];
        unset($_SESSION[$key]);
        return $result;
    } else {
        return null;
    }
}

function getOffset($limit, $page) {
    if (empty($page)) {
        $offset = 0;
    } else {
        $offset = ($page-1) * $limit;
    }

    return $offset;
}

function paginationGenerator($jml='', $perhalaman='' ,$hal='')
{
    // jumlah data yang akan ditampilkan per halaman        
    $dataPerhalaman = $perhalaman;
    $showhalaman = 0;
    $nohalaman = 0;
    // apabila $_GET['halaman'] sudah didefinisikan, gunakan nomor halaman tersebut, 
    // sedangkan apabila belum, nomor halamannya 1.
    if($hal==''){
        $nohalaman = 1;
    }else{
        $nohalaman = $hal;
    }

    $jumData = $jml;

    // menentukan jumlah halaman yang muncul berdasarkan jumlah semua data
    $jumhalaman = ceil($jumData/$dataPerhalaman);

    $output = '<ul class="pagination pull-right">';
    // menampilkan link previous
    if ($nohalaman > 1){

        $params = $_GET;
        $params['page'] = $nohalaman-1;

        $query = http_build_query($params);
        $output .= '<li><a class="round-icon" href="?'.$query.'" data-toggle="tooltip" data-title="Previous Page">&laquo;</a></li>';
    } else {
        $output .= '<li><a class="round-icon" href="#" data-toggle="tooltip" data-title="Previous Page">&laquo;</a></li>';
    }

    
    // memunculkan nomor halaman dan linknya
    for($halaman = 1; $halaman <= $jumhalaman; $halaman++)
    {
        $params = $_GET;
        $params['page'] = $halaman;

        $query = http_build_query($params);
             if ((($halaman >= $nohalaman - 2) && ($halaman <= $nohalaman + 2)) || ($halaman == 1) || ($halaman == $jumhalaman))
             {
                if (($showhalaman == 1) && ($halaman != 2)){  $output .= "<li><a>...</a></li>";}
                if (($showhalaman != ($jumhalaman - 1)) && ($halaman == $jumhalaman)){  $output .= "<li><a>...</a></li>";}
                if ($halaman == $nohalaman){
                    $output .= '<li><a href="" style="text-decoration:underline">'.$halaman.'</a></li>';
                }else{
                    $output .= '<li><a href="?'.$query.'">'.$halaman.'</a></li>';
                }
                $showhalaman = $halaman;
             }
    }



    // menampilkan link next
    if ($nohalaman < $jumhalaman){

        $params = $_GET;
        $params['page'] = $nohalaman+1;

        $query = http_build_query($params);
        $output .= '<li><a class="round-icon" href="?'.($query).'" data-toggle="tooltip" data-title="Next Page">&raquo;</a></li>';
    }


    $output.='</ul>';
    return $output;
}

function toAlphaNumeric($string)
{
    $string = str_replace(" ", "", $string);
    return preg_replace("/[^0-9a-zA-Z.]/m", "", $string);
}

function toSlug($string)
{
    $string = str_replace(" ", "-", strtolower($string));
    return preg_replace("/[^0-9a-zA-Z.-]/m", "", $string);
}

function pdo_debugStrParams($stmt) {
  ob_start();
  $stmt->debugDumpParams();
  $r = ob_get_contents();
  ob_end_clean();
  return $r;
}

function getImageFromHtmlText($html, $tag_id = "", $hiddden = false)
{
    preg_match_all('/<img[^>]+>/i',$html, $result);
    if (!empty($result[0])) {
        $image = $result[0][0];        
    } else {
        $image = "<img src='" . base_url() . "asset/img/no_image.png'>";
    }

    if ($tag_id) {
        $image = str_replace("<img", "<img id='".$tag_id."' ", $image);
    }

    if ($hiddden) {
        $image = str_replace("<img", "<img style='display:none' ", $image);
    }

    return $image;
}


function actualLink()
{
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $clean = explode("?", $actual_link);
    if (!empty($clean[1])) {
        return $clean[0];
    } else {
        return $actual_link;
    }
}
