<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
      <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
      <title>PreflightAPI demo- function Refine.</title>
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
if (isset($_POST['refine'])){   
$units=$_POST['units'];
echo $units;

$maxpages=$_POST['maxpages'];
$lang=$_POST['lang'];

$afile=$_POST['tmpfilename'];
$domain_name=$_POST['domain'];
$unique_id=$_POST['preflightid'];
$contenttype=$_POST['contenttype']; 
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
                           <form action="result.php" method="post" class="card">
                              <div class="card-header">
                                 <h4 class="card-title">PreflightAPI Refine demo</h4> 
                              </div>
                              <div class="card-body"> 
                                 <div class="row"> 
								 <div class="form-control-plaintext">The fields below show all the data you need to enter into the system. All fields are required, the data we already have marked in green. The filename field is our internal operation identifier, it is returned as the result of the analysis in the FixedPDF section. After filling in the fields and clicking "Send data" the refine process will start. In this demo, we are not blocking the fields so as not to unnecessarily obfuscate the code, so you have to watch yourself. The full conversion capabilities of the system are described in the documentation, ICC profiles are closely related to the type of conversion.</div>
                                    <div class="col-xl-4">
                                       <div class="row"> 
                                          <div class="col-md-6 col-xl-12"> 
                                             <div class="mb-3">  
											    <div class="mb-3">
                                                   <label class="form-label required">Filename</label> 
                                                   <!--<input type="text" class="form-control" name="example-required-input" placeholder="Required...">-->
												   <input type="text" class="form-control" name="tmpfilename" id="tmpfilename" style="border-color: #2fb344;" placeholder="Readonly..." value="<?php echo $afile; ?>" readonly="">
												   <small class="form-hint">In this field we use a filename returned by Analyze module. (This is some kind of our internal ID).</small>
                                                </div>
                                                <div class="mb-3">
                                                   <label class="form-label required">Units</label>
                                                   <input type="text" class="form-control" name="units" id="units" style="border-color: #2fb344;" placeholder="Required..." value="<?php echo $units; ?>">
												   <small class="form-hint">Please set: 0 - pt (1/72 inch), 1 - mm.</small>
                                                </div>
                                                <div class="mb-3">
                                                   <label class="form-label required">Add missing page</label>
                                                   <input type="text" class="form-control" name="addpage" id="addpage" placeholder="Required...">
												   <small class="form-hint">We can add parity page if needed(some imposition systems need it).</small>
                                                </div>
                                                <div class="mb-3">
                                                   <label class="form-label required">Maximum pages</label>
                                                   <input type="text" class="form-control" name="maxpages" id="maxpages"  style="border-color: #2fb344;" placeholder="Required..." value="<?php echo $maxpages; ?>">
												   <small class="form-hint">Eg. 1 or 8 We will remove additional pages.</small>
                                                </div>												
                                             </div> 
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-xl-4">
                                       <div class="row">
                                          <div class="col-md-6 col-xl-12">
                                             <div class="mb-3">
                                                <label class="form-label required">Bleeds size</label>
                                                <input type="text" class="form-control" name="bleeds" id="bleeds" placeholder="Required...">
												<small class="form-hint">Bleeds size in mm eg. 2.</small>
                                             </div>
                                             <div class="mb-3">
                                                <label class="form-label required">ICC profile code</label>
                                                <input type="text" class="form-control" name="icc" id="icc" placeholder="Required...">
												<small class="form-hint">We will convert file to selected profile (and PDF standard like PDF/X).Profile list is in documentation (numeric format). For eg. 33 is CoatedFOGRA39 </small>
                                             </div> 
                                             <div class="mb-3">
                                                <label class="form-label required">Language of results message</label>
                                                <input type="text" class="form-control" name="lang" id="lang"  style="border-color: #2fb344;" placeholder="Required..." value="<?php echo $lang; ?>">
												<small class="form-hint">Language of results message, eg: en.</small>
                                             </div>
											  <div class="mb-3">
                                                <label class="form-label required">End user domain</label>
                                                <input type="text" class="form-control" name="domain" id="domain" style="border-color: #2fb344;" placeholder="Required..." value="<?php echo $domain_name; ?>">
												<small class="form-hint">End user damain name eg domain.com.</small>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-xl-4">
                                       <div class="row">
                                          <div class="col-md-6 col-xl-12"> 
                                             <div class="mb-3"> 
                                                <label class="form-label required">External Preflight ID</label>
                                                <input type="text" class="form-control" name="preflightid" id="preflightid" style="border-color: #2fb344;" placeholder="Required..." value="<?php echo $unique_id; ?>">
												<small class="form-hint">External Preflight ID (only numbers).</small>
                                             </div>
                                             <div class="mb-3">
                                                <label class="form-label required">Width</label>
                                                <input type="text" class="form-control" name="width" id="width" placeholder="Required...">
												<small class="form-hint">Target width, without bleeds</small>
                                             </div>
                                             <div class="mb-3">
                                                <label class="form-label required">Height</label>
                                                <input type="text" class="form-control" name="height" id="height" placeholder="Required...">
												<small class="form-hint">Target height, without bleeds.</small>
                                             </div>
											 <div class="mb-3">
                                                <label class="form-label required">Contenttype</label> 
                                                <input type="text" class="form-control" name="contenttype" id="contenttype" style="border-color: #2fb344;" placeholder="Required..." value="<?php echo $contenttype; ?>">
												<small class="form-hint">Eg. application/pdf.</small>
                                             </div> 
                                          </div>
                                       </div> 
                                    </div>
                                 </div>
                              </div>
                              <div class="card-footer text-right">
                                 <div class="d-flex">                                    
                                    <button name="refinestart" type="submit" class="btn btn-primary ml-auto">Send data</button>
                                 </div> 
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
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