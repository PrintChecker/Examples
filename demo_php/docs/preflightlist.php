<?php
$array = array();
$array[0][0]= '1';
$array[0][1]='123';
$array[0][2]='org_filename.pdf';
$array[0][3]='2019-05-01 21:00:15';
$array[0][4]='2019-05-01 21:00:25';
$array[0][5]='1';
$array[0][6]='1000';
$array[0][7]='2000';
$array[0][8]='link orginall';
$array[0][9]='link processed';

$array[1][0]= '2';
$array[1][1]='124';
$array[1][2]='org_filename.pdf';
$array[1][3]='2019-05-01 21:00:15';
$array[1][4]='2019-05-01 21:00:25';
$array[1][5]='2';
$array[1][6]='1000';
$array[1][7]='2000';
$array[1][8]='link orginall';
$array[1][9]='link processed';

$array[2][0]= '3';
$array[2][1]='123';
$array[2][2]='org_filename.pdf';
$array[2][3]='2019-05-01 21:00:15';
$array[2][4]='2019-05-01 21:00:25';
$array[2][5]='3';
$array[2][6]='10200';
$array[2][7]='2000';
$array[2][8]='link orginall';
$array[2][9]='link processed';
?> 
            <div class="page-header">
              <h1 class="page-title">
                Latest Preflights
              </h1>
            </div>
            <div class="card">
              <table class="table card-table">
                <tr>
                  <th>Preflight ID</th>
                  <th>Client ID</th>
                  <th>Orginal Filename</th>
                  <th>Starttime</th>
                  <th>Endtime</th> 
                  <th>Result</th>
                  <th>Preflight Credits Cost</th>
                  <th>Hosting Credits Cost</th>
				  <th></th>
                </tr>	
				<?php				
				for ($x = 0; $x <= count($array)-1; $x++) {	
                  echo '<tr>';				
                  echo '<td>'.$array[$x][0].'</td>';
                  echo '<td>'.$array[$x][1].'</td>';
                  echo '<td>'.$array[$x][2].'</td>';
                  echo '<td class="text-green">'.$array[$x][3].'</td>';
                  echo '<td class="text-red">'.$array[$x][4].'</td>';
				  
				  if ($array[$x][5]=='1'){
				  echo '<td><span class="badge badge-danger">Error</span></td>';}
				  else
				  if ($array[$x][5]=='2'){
				  echo '<td><span class="badge badge-warning">Warning</span></td>';}
				  else
				  if ($array[$x][5]=='3'){
				  echo '<td><span class="badge badge-success">Success</span></td>';}			  
                  echo '<td class="text-right">'.$array[$x][6].'</td>';
				  echo '<td class="text-right">'.$array[$x][7].'</td>';
                  echo '<td class="text-center">';
                  echo '          <div class="item-action dropdown">';
                  echo '            <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>';
                  echo '            <div class="dropdown-menu dropdown-menu-right">';
                  echo '              <a href="'.$array[$x][8].'" class="dropdown-item"><i class="dropdown-icon fe fe-tag"></i> Get orginal file </a>';
                  echo '              <a href="'.$array[$x][9].'" class="dropdown-item"><i class="dropdown-icon fe fe-edit-2"></i> Get procesed file </a>';
                  echo '            </div>';
                  echo '          </div>';
                  echo '        </td>';
				    echo '</tr>';
				}
				?>
              </table>
            </div>