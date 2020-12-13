<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
      <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
      <title>PreflightAPI demo- function Analyze.</title>
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
                           <form action="analyze.php" method="post" class="card">						   
                              <div class="card-header">
                                 <h4 class="card-title">PreflightAPI Analyze demo</h4> 
                              </div>
                              <div class="card-body">
                                 <div class="row">
								 <div class="form-control-plaintext">The fields below present all the data you need to provide to the system. All fields are required, although, for example, the EndUser domain field, you can fill in freely.
									In the source code of this demo, the read data section is clearly marked. We assume that you already have graphic design files on your system (or in the cloud). Apart from messages, the system also produces preview files. Links to them are provided in the server's response. We keep files for 14 days, after which they are irretrievably deleted</div>
                                    <div class="col-xl-4">
                                       <div class="row">
                                          <div class="col-md-6 col-xl-12"> 
                                             <div class="mb-3">  
											    <div class="mb-3">
                                                   <label class="form-label required">Link to file</label>
                                                   <input type="text" class="form-control" name="tmpfilename" id="tmpfilename" placeholder="Required...">
												   <small class="form-hint">Eg. http://awebsite.s3.amazonaws.com/preflight/test.pdf</small>
                                                </div>
                                                <div class="mb-3">
                                                   <label class="form-label required">Units</label>
                                                   <input type="text" class="form-control" name="units" placeholder="Required...">
												   <small class="form-hint">Please set: 0 - pt (1/72 inch), 1 - mm.</small>
                                                </div>
                                                <div class="mb-3">
                                                   <label class="form-label required">Max pages</label>
                                                   <input type="text" class="form-control" name="maxpages" placeholder="Required...">
												   <small class="form-hint">Max pages in project. If You don'y need it please set 1000.</small>
                                                </div>
                                                <div class="mb-3">
                                                   <label class="form-label required">Language of results messages</label>
                                                   <input type="text" class="form-control" name="lang" placeholder="Required...">
												   <small class="form-hint">English: en (field for forward use).</small>
                                                </div>												
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-xl-4">
                                       <div class="row">
                                          <div class="col-md-6 col-xl-12">
                                             <div class="mb-3">
                                                <label class="form-label required">Content Type of file</label>
                                                <input type="text" class="form-control" name="contenttype" placeholder="Required...">
												<small class="form-hint">ContentType of file eg. application/pdf or application/png,</small>
                                             </div>
                                             <div class="mb-3">
                                                <label class="form-label required">End User domain name</label>
                                                <input type="text" class="form-control" name="domain" placeholder="Required...">
												<small class="form-hint">Eg. domain.com. Field for identify end user</small>
                                             </div>
                                             <div class="mb-3">
                                                <label class="form-label required">External Preflight ID</label>
                                                <input type="text" class="form-control" name="preflightid" placeholder="Required...">
												<small class="form-hint">Field for Your ID of this process.</small>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-xl-4">
                                       <div class="row">
                                          <div class="col-md-6 col-xl-12">
                                             <div class="mb-3"> 
                                                <label class="form-label required">DPI lower limit warning</label>
                                                <input type="text" class="form-control" name="dpilowlimitwarning" placeholder="Required...">
												<small class="form-hint">If some image got lower DPI we will returnn warning message. (Default: 300)</small>
                                             </div>
                                             <div class="mb-3">
                                                <label class="form-label required">DPI lower limit fail</label>
                                                <input type="text" class="form-control" name="dpilowlimitfail" placeholder="Required...">
												<small class="form-hint">If image DPI is lower returned preflight status will be Error. (Default: 150)</small>
                                             </div>
                                             <div class="mb-3">
                                                <label class="form-label required">Font size lower size limit</label>
                                                <input type="text" class="form-control" name="fontsizelowlimit" placeholder="Required...">
												<small class="form-hint">If font size will be lower we will return warning message.</small>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="card-footer text-right">
                                 <div class="d-flex">
                                    <!--<a href="#" class="btn btn-link">Cancel</a>--> 
                                    <button type="submit" name="submit" class="btn btn-primary ml-auto">Send data</button>
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