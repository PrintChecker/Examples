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
      if (isset($_POST['refinestart'])){   
      
      //variables
      //path parameters
      $units=$_POST['units'];
      $maxpages=$_POST['maxpages'];
      $bleeds=$_POST['bleeds'];  
      $lang=$_POST['lang'];
      $aprofile=$_POST['icc'];
      $addpage=$_POST['addpage'];
      //$overprint=$_POST['overprint']; 
	  $overprint=0; 
      //header parameters
      $afile=$_POST['tmpfilename'];
      $height=$_POST['height'];
      $width=$_POST['width'];
      $domain_name=$_POST['domain'];
      $unique_id=$_POST['preflightid'];
      $contenttype=$_POST['contenttype'];
       
      //  "/Refine/{units}/{maxpages}/{bleeds}/{lang}/{aprofile}/{addpage}/{overprint}/": {
      //refine
      $ch = curl_init();
      
      curl_setopt($ch, CURLOPT_URL, 'http://3.125.50.233:80/api/rest/Service/Refine/'.$units.'/'.$maxpages.'/'.$bleeds.'/'.$lang.'/'.$aprofile.'/'.$addpage.'/'.$overprint.'/');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POST, 1);
      
      $headers = array();
      $headers[] = 'Accept: application/json';
      $headers[] = 'Awsurl: '.$afile;
      $headers[] = 'Domain_name: '.$domain_name;
      $headers[] = 'Unique_id: '.$unique_id;
      $headers[] = 'Width: '.$width;
      $headers[] = 'Height: '.$height;
      $headers[] = 'Contenttype: '.$contenttype;
	  //here You pass your credentials
      $headers[] = 'Authorization: Basic XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
      $headers[] = 'Content-Type: application/x-www-form-urlencoded';
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      
      $result = curl_exec($ch);
	   $S_ex=json_decode($result);
	  
      if (curl_errno($ch)) { 
         echo 'Error:' . curl_error($ch);
      }
      curl_close($ch);
      
	    
		/* for each page like eg.
		$FixedPDF=$S_ex->result[0][1]->data[$i][1]; // $i - iterator of pages
		*/
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
                              <!-- Cards navigation -->                                 
                              <div class="card-body">
                                 <div class="card">
                                    <div class="row row-0">
                                       <div class="col-5">
                                          <img src="<?php echo  str_replace('"','',$Preview); ?>" class="w-100 object-cover" alt="Card side image">
                                       </div>
                                       <div class="col">
                                          <div class="card-body">
                                             <div class="card-status-top bg-danger"></div>
                                             <div class="card-header">
                                                <h3 class="card-title">Analyze result</h3>
                                             </div>
                                             <p>After refine, we produce several files:
												Fixed file - a file converted according to the criteria established in the previous step.
												Framed file - a file with marked bleed lines, a safe field, etc.
												Preview file - a graphic file to be shown on the page, such a preview of the Framed file
												And optional process messages. We store the produced files on servers for 14 days and then they are irretrievably deleted</p>
                                             <div>
                                                <a href="<?php echo  str_replace('"','',$FixedPDF); ?>" target="_blank" class="btn btn-info w-100" >
                                                Fixed
                                                </a> 
                                             </div>
                                             </br>
                                             <div>
                                                <a href="<?php echo  str_replace('"','',$FramedPDF); ?>" target="_blank" class="btn btn-info w-100">
                                                Framed
                                                </a>
                                             </div>
                                             </br>
                                             <div>
                                                <a href="<?php echo  str_replace('"','',$Preview); ?>" target="_blank" class="btn btn-info w-100">
                                                Preview
                                                </a>
                                             </div>
                                             <div class="list list-row list-hoverable">
                                                <div class="list-item">
                                                   <div><span class="badge bg-blue"></span></div>                                                    
                                                   <div class="text-truncate">
                                                      <a href="#" class="text-body d-block">Preflight status</a> 
                                                      <small class="d-block text-muted text-truncate mt-n1"><?php echo $Preflightstatus; ?></small>
                                                   </div>
                                                </div>
                                                <div class="list-item">
                                                   <div><span class="badge bg-blue"></span></div>                                                   
                                                   <div class="text-truncate">
                                                      <a href="#" class="text-body d-block">Preflight info messages.</a> 
                                                      <small class="d-block text-muted text-truncate text-wrap mt-n1"><?php echo $Preflighteffect; ?></small>
                                                   </div>
                                                </div>
                                                <a href="index.php" class="btn btn-success w-100">
                                                Go to analyze
                                                </a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
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