<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
      <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
      <title>PreflightAPI demo</title>
      <!-- CSS files -->
      <link href="./dist/css/tabler.min.css" rel="stylesheet"/>
      <link href="./dist/css/tabler-flags.min.css" rel="stylesheet"/>
      <link href="./dist/css/tabler-payments.min.css" rel="stylesheet"/>
      <link href="./dist/css/tabler-vendors.min.css" rel="stylesheet"/>
      <link href="./dist/css/demo.min.css" rel="stylesheet"/>
      <style>
         body { display: none; }
      </style>
   </head>
   
     <?php
 if (isset($_POST['submit'])){   
 //variables
 //path parameters 
$units=$_POST['units'];
$maxpages=$_POST['maxpages'];
$lang=$_POST['lang'];

//header parameters
$afile=$_POST['tmpfilename'];
$domain_name=$_POST['domain'];
$unique_id=$_POST['preflightid'];
$contenttype=$_POST['contenttype'];
$DPIlowlimitwarning=$_POST['dpilowlimitwarning'];
$DPIlowlimitfail=$_POST['dpilowlimitfail'];
$fontsizelowlimit=$_POST['fontsizelowlimit']; 

//analyze
// "/Analyze/{units}/{maxpages}/{lang}/"
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://3.125.50.233:80/api/rest/Service/Analyze/'.$units.'/'.$maxpages.'/'.$lang.'/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();
$headers[] = 'Accept: application/json';
$headers[] = 'Awsurl: '.$afile;
$headers[] = 'Domain_name: '.$domain_name;
$headers[] = 'Unique_id: '.$unique_id;
$headers[] = 'Contenttype: '.$contenttype;
$headers[] = 'dpilowlimitwarning: '.$DPIlowlimitwarning;
$headers[] = 'dpilowlimitfail: '.$DPIlowlimitfail;
$headers[] = 'fontsizelowlimit: '.$fontsizelowlimit;
//here You pass your credentials
$headers[] = 'Authorization: Basic XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
 $S_ex=json_decode($result);
 
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch); 
   
$Pages=$S_ex->result[0][1]->data[0][8];  //pages count 

//here some description of fields
//$FramedPDF=$S_ex->result[0][1]->data[$i][0]; - $i is iterator of pages
$FramedPDF=$S_ex->result[0][1]->data[0][0];
$FixedPDF=$S_ex->result[0][1]->data[0][1];									
$Preview=$S_ex->result[0][1]->data[0][2];
$Filesize=$S_ex->result[0][1]->data[0][3];
$Preflighteffect=$S_ex->result[0][1]->data[0][4];
$Preflightstatus=$S_ex->result[0][1]->data[0][5];
$Page=$S_ex->result[0][1]->data[0][6];
$OperationType=$S_ex->result[0][1]->data[0][7]; 
$Pages=$S_ex->result[0][1]->data[0][8];
$PreflightID=$S_ex->result[0][1]->data[0][9];
$Domain=$S_ex->result[0][1]->data[0][10];	
$PreflightInfo=$S_ex->result[0][1]->data[0][11];	
$PreflightWarnings=$S_ex->result[0][1]->data[0][12];	
$PreflightErrors=$S_ex->result[0][1]->data[0][13];	
$CorrectBleedBox=$S_ex->result[0][1]->data[0][14];		
$EmbeddedFonts=$S_ex->result[0][1]->data[0][15];
$NotEmbeddedFonts=$S_ex->result[0][1]->data[0][16];
$LowResImagesList=$S_ex->result[0][1]->data[0][17];
 }
   ?>    
   
   <body class="antialiased">
      <div class="page">
         <div class="content">
            <div class="container-xl">			
               <!-- Page title -->
               <div class="page-header d-print-none">
                  <div class="row align-items-center">
                     <div class="col">
                        <h2 class="page-title">
                           <div class="col-12">
                              <!-- Cards with tabs component -->
                              <div class="card-tabs">
							  
                                 <!-- Cards navigation -->
                                 <ul class="nav nav-tabs">
								 <?php								 
									for ($x = 1; $x <= $Pages; $x++) {
										echo '<li class="nav-item"><a href="#tab-top-'.$x.'" class="nav-link" data-bs-toggle="tab">Page'.$x.'</a></li>';
										}
								 ?>                                    
                                 </ul> 
								 
                                 <div class="tab-content">
                                    <!-- Content of card #1 -->
									<?php
									for ($x = 1; $x <= $Pages; $x++) 										
                                    { $i=$x-1; ?>
                                      <!-- HTML here -->    
									
									<div <?php echo 'id="tab-top-'.$x.'"'; ?> class="card tab-pane <?php if ($x==1){echo ' active';} ?>">
                                      
									<form action="refineinit.php" method="post" class="card">   
									<input id="tmpfilename" name="tmpfilename" type="hidden" value=<?php echo $FixedPDF;?>>
									<input id="domain" name="domain" type="hidden" value=<?php echo $Domain ?>>
									<input id="preflightid" name="preflightid" type="hidden" value=<?php echo $PreflightID ?>>
									<input id="contenttype" name="contenttype" type="hidden" value=<?php echo $contenttype ?>>
									<input id="lang" name="lang" type="hidden" value=<?php echo $lang ?>>
									<input id="maxpages" name="maxpages" type="hidden" value=<?php echo $maxpages ?>>
									<input id="units" name="units" type="hidden" value=<?php echo $units ?>>
									 
									  <div class="card-body">
                                          <div class="card">
                                             <div class="row row-0">
                                                <div class="col">
                                                   <div class="card-body">
                                                      <div class="card-status-top bg-danger"></div>
                                                      <div class="card-header">
                                                         <h3 class="card-title">Analyze result</h3>
                                                      </div>                                                       
                                                      <p>Here we have the results analysis section. Each page of the project is a separate tab. We have the ability to display these results in several ways, the font section, just like the images section, have been separated. The results are divided into three main sections: information, warnings, and errors. In this demo, we do not block the possibility of refine a file with the Error status, but you should block this option on your system. In the next step, we will assign additional data necessary to refine the file</p>
                                                      <div class="list list-row list-hoverable">
                                                         <div class="list-item">
                                                            <div><span class="badge bg-red"></span></div>
                                                            <div class="text-truncate">
                                                               <a href="#" class="text-body d-block">Preflight status</a> 
                                                               <small class="d-block text-muted text-truncate mt-n1"><?php echo $Preflightstatus; ?></small>
                                                            </div>
                                                         </div>
                                                         <div class="list-item">
                                                            <div><span class="badge bg-blue"></span></div>
                                                            <a href="#">
                                                            <span class="avatar">I</span>
                                                            </a>
                                                            <div class="text-truncate">
                                                               <a href="#" class="text-body d-block">Preflight info messages.</a> 															   
                                                               <small class="d-block text-muted text-truncate text-wrap mt-n1"><?php echo str_replace('"','',(str_replace('\"','',$S_ex->result[0][1]->data[$i][11]))); ?></small>
                                                            </div>
                                                         </div>
                                                         <div class="list-item">
                                                            <div><span class="badge bg-yellow"></span></div>
                                                            <a href="#">
                                                            <span class="avatar">W</span>
                                                            </a>
                                                            <div class="text-truncate">
                                                               <a href="#" class="text-body d-block">Preflight warning messages</a>
                                                               <small class="d-block text-muted text-truncate text-wrap mt-n1"><?php echo str_replace('"','',(str_replace('\"','',$S_ex->result[0][1]->data[$i][12]))); ?></small>
                                                            </div>
                                                         </div>
                                                         <div class="list-item">
                                                            <div><span class="badge bg-red"></span></div>
                                                            <a href="#">
                                                            <span class="avatar">E</span>
                                                            </a>
                                                            <div class="text-truncate">
                                                               <a href="#" class="text-body d-block">Preflight error messages</a>
                                                               <small class="d-block text-muted text-truncate text-wrap mt-n1"><?php echo str_replace('"','',(str_replace('\"','',$S_ex->result[0][1]->data[$i][13]))); ?></small>
                                                            </div>
                                                         </div>
                                                         <div class="list-item">
                                                            <div><span class="badge bg-yellow"></span></div>
                                                            <a href="#">
                                                            <span class="avatar">B</span>
                                                            </a>
                                                            <div class="text-truncate">
                                                               <a href="#" class="text-body d-block">Correct BleedBox</a>
                                                               <small class="d-block text-muted text-truncate text-wrap mt-n1"><?php echo $S_ex->result[0][1]->data[$i][14] ?></small> 
                                                            </div>
                                                         </div>
                                                         <div class="list-item">
                                                            <div><span class="badge bg-yellow"></span></div>
                                                            <a href="#">
                                                            <span class="avatar">F</span>
                                                            </a>
                                                            <div class="text-truncate">
															<?php 
															$EmbeddedFonts=str_replace('"[','',$S_ex->result[0][1]->data[$i][15]);
															$EmbeddedFonts=str_replace(']"','',$EmbeddedFonts);														
															?>
                                                               <a href="#" class="text-body d-block">EmbeddedFonts</a>
                                                               <small class="d-block text-muted text-truncate text-wrap mt-n1"><?php echo $EmbeddedFonts; ?></small> 
                                                            </div>
                                                         </div> 
                                                         <div class="list-item">
                                                            <div><span class="badge bg-yellow"></span></div>
                                                            <a href="#">
                                                            <span class="avatar">F</span>
                                                            </a>
                                                            <div class="text-truncate">
															<?php 
															$NotEmbeddedFonts=str_replace('"[','',$S_ex->result[0][1]->data[$i][16]);
															$NotEmbeddedFonts=str_replace(']"','',$NonEmbeddedFonts);														
															?>
                                                               <a href="#" class="text-body d-block">NotEmbeddedFonts</a>
                                                               <small class="d-block text-muted text-truncate text-wrap mt-n1"><?php echo $NotEmbeddedFonts; ?></small> 
                                                            </div>
                                                         </div> 
														 
                                                         <button name="refine" type="submit" class="btn btn-primary w-100">Refine file</button>                                                       
														 
                                                      </div>
                                                   </div>
                                                </div> 
                                             </div>
                                          </div>
                                          <div class="card">
                                             <div class="card-header">
                                                <h3 class="card-title">Low resolution images</h3>
                                             </div>
											 <?php
                                             $text = $S_ex->result[0][1]->data[$i][2];											 
                                             preg_match_all("/\[([^\]]*)\]/", $text, $matches);
											 $imgcount=count($matches[1]);
											 
											 $text1=$S_ex->result[0][1]->data[$i][17]; 
											 
											 preg_match_all("/\[([^\]]*)\]/",$text1 , $matchesfilename); 
											   
											 if ($text<>'[ ]')
											 { 												
											 for ($img = 0; $img <= $imgcount-1; $img++) 										
                                             { ?>                                                                                           
                                             <div class="list list-row list-hoverable"> 
                                                <div class="list-item">
                                                   <a href="#">                                                     
                                                   </a>
                                                   <div class="text-truncate">
                                                      <a href="<?php echo str_replace('"','',($matches[1][$img])); ?>" target="_blank" class="text-body d-block"><?php echo str_replace('"','',($matchesfilename[1][$img])); ?></a>
                                                      <div class="col-4"> 
                                                         <img src="<?php echo str_replace('"','',($matches[1][$img])); ?>" class="w-100 h-100 object-cover" alt="Card side image">
                                                      </div> 
                                                      <small class="d-block text-muted text-truncate text-wrap mt-n1">Low res images was marked by red mask</small>
                                                   </div> 
                                                </div>  
                                             </div>
											 <?php }} ?> 
                                          </div>
                                       </div>
                                    </form>
									</div>	
									<?php } ?>	
									
																	
                                    
                                 </div>
								 
                              </div>
                           </div>
                        </h2>
                     </div>
                  </div>
               </div>
               <!-- Content here -->
            </div>
            <footer class="footer footer-transparent d-print-none">
         <div class="container">
            <div class="row text-center align-items-center flex-row-reverse">
               <div class="col-lg-auto ml-lg-auto">
                  <ul class="list-inline list-inline-dots mb-0">
                     <li class="list-inline-item"><a href="http://preflightapi.net/redoc" class="link-secondary">Documentation</a></li>
                     <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li> 
                     <li class="list-inline-item"><a href="https://github.com/PreflightAPI/Examples" target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
                  </ul>
               </div>
               <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                  <ul class="list-inline list-inline-dots mb-0">
                     <li class="list-inline-item">
                        Copyright © 2020
                        <a href="." class="link-secondary">PreflightAPI</a>.
                        All rights reserved. 
                     </li>
                     <li class="list-inline-item">
                        <a href="./changelog.html" class="link-secondary" rel="noopener">v1.0.0</a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </footer>
         </div>
      </div>
      <!-- Libs JS -->
      <script src="./dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
      <!-- Tabler Core -->
      <script src="./dist/js/tabler.min.js"></script>
      <script>
         document.body.style.display = "block"
      </script>
   </body>
</html>