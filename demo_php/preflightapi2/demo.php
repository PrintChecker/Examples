<?php
  include 'data.php';
  $nhead='"Location: /'.$klient2.'/result.php"';
  $linkkat='<form action="/'.$klient2.'/result.php" method="post" class="card" ENCTYPE="multipart/form-data">';
      if (isset($_POST['checkfile'])){
		  header($nhead);
	  }
	
	 
   ?>
    <!doctype html>
    <html lang="en" dir="ltr">
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
    <script src="/assets/js/require.min.js"></script>
    <script> 
      requirejs.config({
          baseUrl: '.'
      });
    </script>
    <!-- Dashboard Core -->
    <link href="/assets/css/dashboard.css" rel="stylesheet" />
    <script src="/assets/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="/assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="/assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="/assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="/assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="/assets/plugins/input-mask/plugin.js"></script>

<meta name="title" content="PreflightAPI - demo">

<meta name="author" content="JETT Co.">
<meta name="application-name" content="PreflightAPI">
  </head>
  

        <body class=""> 
            <div class="page">
                <div class="page-main">

                        <div class="my-3 my-md-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
									<?php
									echo $linkkat;
									?>
                                        
                                            <div class="card-header">
                                                <h3 class="card-title">Upload file</h3>
                                                <div class="card-options">

                                                </div>
                                            </div>
                                            <?php
						   if (!empty($Preflightstatus)){
                              if ($Preflightstatus=='Error'){
                                                echo '<div class="card-alert alert alert-success mb-0">';
                                                echo '   Preflight result: Success! No errors found';
                                                echo '</div>';
                              }
                              if ($Preflightstatus=='Warning'){
                                                echo '<div class="card-alert alert alert-warning mb-0">';
                                                echo '   Preflight result: Warning. There are some warning messages';
                                                echo '</div>';
                              }
						   }
                              ?>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <!--<div class="col-md-6 col-lg-4">-->
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <?php
									if ($reload==1) {	 
                                             echo '<div class="dimmer active">';
									}
									   ?>
                                                                    <?php

											 if ($reload==1) {	 
                                             echo '<div class="loader"></div>';
                                             }
                                             ?>
                                                                        <div class="dimmer-content">
                                                                            <a href="javascript:void(0)" class="mb-3">
                                             <?php

												  if ($reload==0) {
                                                 echo '<img src="/demo/photos/jakob-owens-224352-500.jpg" alt="Here go preflight preview" class="rounded">';
                                                }
                                                else
                                                {
                                                 echo '<img src="'.$Preview.'" alt="Preflight preview" class="rounded">';
                                                }
                                                ?>
                                             </a>
                                                                        </div>
                                                                        <?php
									if ($reload==1) {	 
                                             echo '</div>'; 
									}
									   ?> 
 
                                                            </div>
                                                        </div>
                                                        <div class="col-6"> 
                                                            <div class="form-group">
                                                                <div class="form-label">File Input</div>
                                                                <div class="custom-file">
																
                                                                    <input type="file" id="file1" class="custom-file-input" name="plik"  accept="image/png, image/jpeg,image/tiff,application/pdf">																	
                                                                    <label type="submit" id="lab1" class="custom-file-label" Text="">Choose file (max filesize 100 MB)</label>
																	<div class="form-label">Product height (milimeters)</div>
																	<input type="text" class="form-control" id="wysokosc" name="wysokosc" placeholder="90"  value="90">
     															<div class="form-label">Product width (milimeters)</div>
																<input type="text" class="form-control" id="szerokosc" name="szerokosc" placeholder="50" value="50">    
																<div class="form-label">Max pages</div>
																<input type="text" class="form-control" id="pages" name="pages" placeholder="50" value="2">    
																<div class="form-label">Bleeds (milimeters)</div>
																<input type="text" class="form-control" id="bleeds" name="bleeds" placeholder="50" value="2">    
																<label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="" >
                            <span class="custom-control-label">Add (parity) page (if needed)</span>
                          </label>		

																
                                                                </div>
                                                                <div class="form-control-plaintext">
																
                                                                    <!--Content-->
                                                                </div>
                                                                <?php
                                          echo '<div class="form-control-plaintext">'.$FramedPDF.'</div>';
                                          echo '<div class="form-control-plaintext">'.$FixedPDF.'</div>';
                                          echo '<div class="form-control-plaintext">'.$Preview.'</div>';
                                          echo '<div class="form-control-plaintext">'.$Filesize.'</div>';
                                          echo '<div class="form-control-plaintext">'.$Preflighteffect.'</div>';
                                          echo '<div class="form-control-plaintext">'.$Preflightstatus.'</div>';
                                          echo '<div class="form-control-plaintext">'.$Page.'</div>';
                                          echo '<div class="form-control-plaintext">'.$Creditscost.'</div>';
                                                                     ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-right">
                                                    <div class="d-flex">
                                                        <a href="javascript:void(0)" class="btn btn-link">Cancel</a>
                                                        
																
                                                                <button id="check1" type="submit" class="btn btn-primary ml-auto" name="checkfile" value="true" disabled>Check file</button>
                                                            </form>
                                                    </div>
                                                </div>
                                               
											   
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
                                                <!--</div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
		


        </body>

    </html>

