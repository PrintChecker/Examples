 <?php
 include 'data.php';
 $max_filesize = 1024 * 1024 * 100;
if (isset($_POST['again'])) {
	echo "<script type='text/javascript'>window.top.location='demo.php';</script>"; exit;
}
else

if (is_uploaded_file($_FILES['afile']['tmp_name'])) {
    if ($_FILES['afile']['size'] > $max_filesize) {
        echo 'Error! File too big!';
    } else {
        if (isset($_FILES['afile']['type'])) {
            $mime = $_FILES['afile']['type'];
        }
        move_uploaded_file($_FILES['afile']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/' . $temp . '/' . $_FILES['afile']['name']);
        if (function_exists('curl_file_create')) { // php 5.5+
            $file_name_with_full_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $temp . '/' . $_FILES['afile']['name'];
            $cFile                    = curl_file_create($file_name_with_full_path);
        } else {
            $cFile = '@' . realpath($file_name_with_full_path);
        }
        $post = array(
            'extra_info' => '123456',
            'file_contents' => $cFile
        );
        if (isset($_POST['example-checkbox1']) && $_POST['example-checkbox1'] == 'option1') {
            $add = 1;
        } else {
            $add = 0;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://185.170.227.42:3131/api/rest/Service/APreflight2/' . $_POST['height'] . 'x' . $_POST['width'] . '/' . $add . '/' . $_POST['pages'] . '/' . $_POST['bleeds'] . '/' . $_POST['beast'] . '/' . $_POST['lang'] . '/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_TIMEOUT, 360);
        $headers   = array();
        /*$headers[] = 'Authorization: Basic ZjdjYzgyYTJiZjk3MWVhOTMwOGNmZmNlY2RjNjU4Y2E6OTUyZTM2NjQ3ZGQ1Nzc5NThkZDgyMGI5ZjJkZDJjZmM=';*/
        $headers[] = 'Authorization: Basic ' . $key;
        $headers[] = 'Content-Type: ' . $mime;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        $S_ex = json_decode($result);
        curl_close($ch);
        $Preflightstatus = '';
        $przeladowanie   = 1;
        $count           = $S_ex->result[0][1]->data[0][8];
        unlink($file_name_with_full_path);
		
    }
} else {
    echo 'Data transfer error!';
} 

?> 
<!doctype html>
<head>
	<meta charset="utf-8" http-equiv="X-UA-Compatible" content="IE=edge" />
	<base href="/">    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="https://serwer1935090.home.pl/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="https://serwer1935090.home.pl/favicon.ico" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>Preflight API</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="https://serwer1935090.home.pl/assets/js/require.min.js"></script>
    <script> 
      requirejs.config({
          baseUrl: '.'
      });
    </script>
    <!-- Dashboard Core -->
    <link href="https://serwer1935090.home.pl/assets/css/dashboard.css" rel="stylesheet" />
    <script src="https://serwer1935090.home.pl/assets/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="https://serwer1935090.home.pl/assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="https://serwer1935090.home.pl/assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="https://serwer1935090.home.pl/assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="https://serwer1935090.home.pl/assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="https://serwer1935090.home.pl/assets/plugins/input-mask/plugin.js"></script>
	<script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "WebSite",
  "name": "PreflightAPI",
  "url": "https://www.preflightapi.com",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "preflight, api, graphic, projects, checking, dtp, automation, printing, house,preflightapi",
    "query-input": "required name=search_term_string"
  } 
}
</script>
<meta name="title" content="PreflightAPI - an api for DTP preflight">
<meta name="description" content="We offer a preflight tool to set up on Your website (or other tool e.g. desktop application). You choose what You want to check, what to fix and which inefficiencies are problem, warning or error for You. Need to convert color profile? Sure, we can do it in seconds. We provide fully configurable tool because now we know (we've been collecting experience since 2008) that every printing business got own requirements. So in our API You decide - for every single project You can specify other configuration">
<meta name="keywords" content="pre-flight, preflight, DTP, automation, api, checking projects">
<meta name="author" content="JETT Co.">
<meta name="application-name" content="PreflightAPI">
</head>

<html lang="en" dir="ltr">
    <body class=""> 
        <div class="page">
            <div class="page-main">
                <div class="my-3 my-md-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
							 <?php							 
							 echo '<form action="/'.$folder.'/result.php" method="post" class="card" ENCTYPE="multipart/form-data">';
							 ?>                            
                            <div class="card-header">
                                <h3 class="card-title">Peflight effect</h3>
                                <div class="card-options">
                                </div>
                            </div>
                            <?php
							if (!empty($Preflightstatus)){
                            if ($Preflightstatus=='Success'){
                                echo '<div class="card-alert alert alert-success mb-0">';
                                echo '   Preflight result: Success! No errors found';
                                echo '</div>';
                              } 
                            if ($Preflightstatus=='Warnings'){
                                echo '<div class="card-alert alert alert-success mb-0">';
                                echo '   Preflight zakończony - sprawdź wyniki';
                                echo '</div>';
                              }
						   }
                            ?>
                            <div class="card-body">
							<?php
							for ($i = 0; $i <= $count-1; $i++) {
							    $FramedPDF=$S_ex->result[0][1]->data[$i][0];
								$FixedPDF=$S_ex->result[0][1]->data[$i][1];
								$Preview=$S_ex->result[0][1]->data[$i][2];
								$Filesize=$S_ex->result[0][1]->data[$i][3];
								$Preflighteffect=$S_ex->result[0][1]->data[$i][4];
								$Preflightstatus=$S_ex->result[0][1]->data[$i][5];
								$Page=$S_ex->result[0][1]->data[$i][6];
								$Creditscost=$S_ex->result[0][1]->data[$i][7]; 
			
                                echo '<div class="row">                                                       ';
                                echo '<div class="col-6">';
                                echo '<div class="form-group">';
                                echo '<div class="dimmer-content">';
                                echo '<a href="javascript:void(0)" class="mb-3">';
                                echo '<img src="'.$Preview.'" alt="Preflight preview" class="rounded" style="max-width: 500px; width: 100%; height: auto;">';
                                echo ' </a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="col-6">';
                                echo '<div class="form-group">';
                                echo '<label class="form-label">Preflight result</label>';
                                echo '<div class="form-control-plaintext">';                                  
                                echo '</div>';
                                $asize= $Filesize/1024/1024;    
                                $asize=round($asize, 2);												  
                                echo '<div class="form-control-plaintext"><a href="'.$FramedPDF.'">Framed PDF Link </a></div>';
                                echo '<div class="form-control-plaintext"><a href="'.$FixedPDF.'">Fixed PDF Link </a></div>';
                                echo '<div class="form-control-plaintext"><a href="'.$Preview.'">Preview Link </a></div>';
                                echo '<div class="form-control-plaintext">File size: '.$asize.' MB</div>';
                                echo '<div class="form-control-plaintext">'.$Preflighteffect.'</div>';
                                echo '<div class="form-control-plaintext">Preflight status: '.$Preflightstatus.'</div>';
                                echo '<div class="form-control-plaintext">Page: '.$Page.'</div>';
                                echo '<div class="form-control-plaintext">Cost: '.$Creditscost.' credits</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
							}
							?>											   
                            </div> 
                            <div class="card-footer text-right">
                                <div class="d-flex">
                                    <a href="javascript:void(0)" class="btn btn-link">Cancel</a>                                                      
							        <button id="check1" type="submit" class="btn btn-primary ml-auto" name="again" value="true" >Try again</button>
                                
                                </div>
                            </div>
                            </form>                   
											   
<script>
    require(['c3', 'jquery'], function(c3, $) {
        $(document).ready(
            function() {

                $('#file1').change(function() {
                    var path = $(this).val();
                    if (path != '' && path != null) {
                        var q = path.substring(path.lastIndexOf('\\') + 1);
                        $('#lab1').html(q);
                        $('#check1').attr('disabled', false);
                    }
                })
            });
    })
</script>
<script>
    require(['jquery', 'selectize'], function($, selectize) {
        $(document).ready(function() {
            $('#input-tags').selectize({
                delimiter: ',',
                persist: false,
                create: function(input) {
                    return {
                        value: input,
                        text: input
                    }
                }
            });

            $('#select-beast').selectize({});

            $('#select-users').selectize({
                render: {
                    option: function(data, escape) {
                        return '<div>' +
                            '<span class="image"><img src="' + data.image + '" alt=""></span>' +
                            '<span class="title">' + escape(data.text) + '</span>' +
                            '</div>';
                    },
                    item: function(data, escape) {
                        return '<div>' +
                            '<span class="image"><img src="' + data.image + '" alt=""></span>' +
                            escape(data.text) +
                            '</div>';
                    }
                }
            });

            $('#select-countries').selectize({
                render: {
                    option: function(data, escape) {
                        return '<div>' +
                            '<span class="image"><img src="' + data.image + '" alt=""></span>' +
                            '<span class="title">' + escape(data.text) + '</span>' +
                            '</div>';
                    },
                    item: function(data, escape) {
                        return '<div>' +
                            '<span class="image"><img src="' + data.image + '" alt=""></span>' +
                            escape(data.text) +
                            '</div>';
                    }
                }
            });
        });
    });
</script>
                         
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>	
    </body>
</html>



