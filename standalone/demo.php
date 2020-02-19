<?php
  include 'data.php';
  $nhead='"Location: /'.$folder.'/result.php"';
  $linkkat='<form action="/'.$folder.'/result.php" method="post" class="card" ENCTYPE="multipart/form-data">';
      if (isset($_POST['start'])){
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
<body class=""> 
    <div class="page">
        <div class="page-main">
            <div class="my-3 my-md-5">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
							<?php
							//echo $linkkat;
							echo '<form action="/'.$folder.'/result.php" method="post" class="card" ENCTYPE="multipart/form-data">';
							?>
                            <div class="card-header">
                            <h3 class="card-title">Upload file</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">                                                  
                                    <div class="col-6">
                                        <div class="form-group">											
                                        <?php
										echo '<img src="'.$folder.'/img/jakob-owens-224352-500.jpg" alt="Here go preflight preview" class="rounded">';
										?> 
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="form-label">File Input</div>
                                                <div class="custom-file">
													<input type="file" id="file1" class="custom-file-input" name="afile">
                                                    <label type="submit" id="lab1" class="custom-file-label" Text="">Choose file</label>
													<div class="form-label">Product height</div>
													<input type="text" class="form-control" id="height" name="height" placeholder="90"  value="90">
     													<div class="form-label">Product width</div>
														<input type="text" class="form-control" id="width" name="width" placeholder="50" value="50">
														<div class="form-label">Max pages</div>
														<input type="text" class="form-control" id="pages" name="pages" placeholder="50" value="2">    
															<div class="form-label">Bleeds</div>
															<input type="text" class="form-control" id="bleeds" name="bleeds" placeholder="50" value="2">    
															<label class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="" >
																<span class="custom-control-label">Add page (if needed)</span>
															</label>						  
															<div class="form-group">
																<label class="form-label">Preflight Option</label>
																<select name="beast" id="select-beast" class="form-control custom-select">
																	<option value="2">CMYK (Fogra39)</option>
																	<option value="4">CMYK+SPOT (Fogra39)</option>
																</select>
															</div>
															<div class="form-group">
															<label class="form-label">Language</label>
															<select name="lang" id="select-lang" class="form-control custom-select">
																<option value="en">EN</option>
																<option value="pl">PL</option>
															</select>
															</div>
												</div>
                                                <div class="form-control-plaintext"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <div class="d-flex">
                                    <a href="javascript:void(0)" class="btn btn-link">Cancel</a>
                                    <button id="check1" type="submit" class="btn btn-primary ml-auto" name="start" value="true" disabled>Check file</button>
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
</body>
</html>

