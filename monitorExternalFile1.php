	<?php
		/*$sys_stat = trim(file_get_contents("/opt/hpws/apache/cgi-bin/trials/bip/data/TESTING/sys_stat1.txt"));
		if($_GET['date'] == '' && $sys_stat == 'N'){
			echo "<script>window.location.href='eod.php';</script>";
		}*/
		$MasterDecider=explode(".",file_get_contents("/opt/hpws/apache/cgi-bin/trials/bip/data/TESTING/DR_CHECK"));
		switch($MasterDecider[1]){
			case "0":
				$DBdecider='PR';
				$trickleuploadserver="BHAGA";
				break;
			case "176":
				$DBdecider='DR(No Auto Switch)';
				$trickleuploadserver="PALAR";
				break;
			case "189":
				$DBdecider='NR(No Auto Switch)';
				$trickleuploadserver="BRAMHA";
				break;
			default:
				$DBdecider='PR';
				break;
		}
	?>

	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box" style="background-color:#cdc;">
					<!--
										<div class="row" >
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color:#efebe9; border-radius: 6px; font-family: garamond; ">
												
												<br>
												<span style="font-size:60px; ">
													<b>

													<p style="color:#7e57c2; text-align: center;"> 
														CBS ANNUAL CLOSING ACTIVITY IS IN PROGRESS... &nbsp &nbsp &nbsp 
													</p>
													</b>
												</span>
											</div>
											<div>
												<span>
													&nbsp
												</span>
											</div>
										</div>
									-->
						<div class="row">
							<div class="col-md-12" style="position:relative; min-height: 1px; padding-right: 0px; padding-left: 0px;">
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 jobs_btn" data-step=17 data-intro="View Details Main Gateways And Misc Jobs">
									<div class="box box-primary box-solid" id="boxjobs">
										<div class="box-header bg-tcs-active text-center">
										  <h3 class="box-title">Jobs</h3>
										  <!--<a target="_blank" href="gatewayconso.php" style="float:left" class="btn btn-xs btn-success">Gateway Consolidated</a>-->
										  <!--<a target="_blank" href="intermediate_server_fs.php" style="float:left;margin-left:5px;" class="btn btn-xs btn-warning">Intermediate server file status</a>-->
										<span class="jobstimepop" style="float:right;font-size:18px;"><img src="loading-bubbles.svg"> <?php echo $yummy->timeUpdated("gateway.txt_8app",".");?></span>
										</div>
										<div class="box-body table-responsive">
											<table class="table table-bordered table-striped text-center">
											  <thead>
												   <tr>
														<th style="width:110px;">JOB Name</th>
														<th>M</th>
														<th>S1</th>
														<th>S2</th>
														<th>S3</th>
														<th>S4</th>
														<th>S5</th>
														<th>S6</th>
														<th>S7</th>
														<th>S8</th>
														<th>S9</th>
														<th>S10</th>
														<th>S11</th>
                                                                                                                <th>S12</th>
														<?php //echo file_get_contents("server_card.php");?>
												   </tr>
											  </thead>
											  <tbody class="jobsappend">
													<?php $aplnMonior->gateway(); ?>
											  </tbody>
											</table>
											<div >
												<span style="float:right;background-color:white;color:black;cursor:default;" class="btn btn-sm btn-primary legends_btn">
													<!--<span class="na_btn"><i style="color:black" class='fa fa-fw fa-minus'></i>NA</span>-->
													<span class="na_btn"><i style="color:black" class='fa fa-fw fa-minus'></i>NA</span>
													<span class="running_btn"><i style="color:green" class='fa fa-check'></i>OK</span>
													<span class="noUpdating_btn"><i style="color:#f39c12" class='fa fa-fw fa-warning'></i>No Data</span>
													<span class="noencryption_btn"><i style="color:navy" class='fa fa-fw fa-chain-broken'></i>Not Encrypted</span>
													<span class="noTxn_btn"><i style="color:red" class='fa fa-fw fa-ban'></i>NO TXN</span>
													<span class="timeFreezed_btn"><i style="color:red" class='fa fa-fw fa-exclamation'></i>TIMESTAMP FREEZED</span>
													<span class="max_btn"><i style="color:red" class='fa fa-bolt'></i>MAX TCP</span>
													<!--<span class="unable_btn"><i style="color:red" class='fa fa-bell'></i>Unable To Process</span>-->
													<span class="not_btn"><i style="color:red" class='fa fa-close'></i>Not Running</span>
													<span class="app_btn"><i style="color:red" class='fa fa-thumbs-down'></i>App Down</span>
												</span>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 queue_btn" data-step=18 data-intro="View Details of Main Queues and Replica with Buildup And PID Details">
									<div class="box box-primary box-solid">
										<div class="box-header bg-tcs-active text-center">
										
											<h3 class="box-title">Queue Buildup</h3>
											<?php
												/*$tpmtime=file_get_contents("/opt/hpws/apache/cgi-bin/trials/bip/data/TESTING/check_".$crdate.".txt");
												$tpm_starttime=file_get_contents("/opt/hpws/apache/cgi-bin/trials/bip/data/TESTING/start_time_".$crdate.".txt");
												$tpmtimestamp=shell_exec("ls -lrt /opt/hpws/apache/cgi-bin/trials/bip/data/TESTING/check_".$crdate.".txt|awk '{print $6,$7,$8}'");
												$checktpmrunning=file_get_contents("/opt/hpws/apache/cgi-bin/trials/bip/data/TESTING/tpmStatus.txt.".$crdate);
												$tpm_scp_time=shell_exec("cat /opt/hpws/apache/cgi-bin/trials/bip/data/TESTING/tpm_sequence_file_count.txt.".$crdate."|tail -1");
												if ( strpos(trim($checktpmrunning), 'terna' ) == true ) {
													$tpm_running_from = 'PR';
												}
												elseif(strpos(trim($checktpmrunning), 'MIZO' ) == true) {
													$tpm_running_from = 'NR';
												}
												else{
													$tpm_running_from = 'DR';
												}
												$tpm_scp_data=explode("|",$tpm_scp_time);
												$removeColon_tpm_scp_time=str_replace(":","",trim($tpm_scp_data[2]));
												$removedColon_tpm_scp_time=strtotime($removeColon_tpm_scp_time);
												$_tpmTime = $yummy->timeUpdatedTpm("tpmStatus.txt.",".");
												$removeColonTPM = str_replace(":","",trim($_tpmTime));
												$removeColonTimes = strtotime($removeColonTPM);
												$currtimes=strtotime(date("Ymd Hi"));
												$scp_difftimes=$currtimes-$removedColon_tpm_scp_time;
												$difftimes=$currtimes-$removeColonTimes;
												if(intval($scp_difftimes)<=0){
													$FinalScpTime = "<span style='background-color:red;color:white' class='glow' title='TPM Not Updated since last 10 mintues'>".trim($tpm_scp_data[2])."</span>";
												}
												else{
													$FinalScpTime = "<span style='color:#fff'>".trim($tpm_scp_data[2])."</span>";
												}
												if(intval($difftimes)>600){
												$finalTpmTime = "<span style='color:#fff'>".trim($_tpmTime)."</span>";
												}
												else{
												$finalTpmTime = "<span style='color:#fff'>".trim($_tpmTime)."</span>";
												}
												$TPM_timesubstr=substr($tpmtime,0,2);
												$TPM_timesubstr2=substr($tpmtime,2,2);
												$TPM_timestampsubstr=substr($tpmtimestamp,0,2);
												$TPM_timestampsubstr2=substr($tpmtimestamp,2,2);
												$TPM_start_time_hr=substr($tpm_starttime,0,2);
												$TPM_start_time_min=substr($tpm_starttime,2,2);*/
												
												
												$tpmtime=file_get_contents("/opt/hpws/apache/cgi-bin/trials/bip/data/TESTING/check_".$crdate.".txt");
												$tpm_starttime=file_get_contents("/opt/hpws/apache/cgi-bin/trials/bip/data/TESTING/start_time_".$crdate.".txt");
												$tpmtimestamp=shell_exec("ls -lrt /opt/hpws/apache/cgi-bin/trials/bip/data/TESTING/check_".$crdate.".txt|awk '{print $6,$7,$8}'");
												$checktpmrunning=file_get_contents("/opt/hpws/apache/cgi-bin/trials/bip/data/TESTING/tpmStatus.txt");
												$tpm_scp_time=shell_exec("cat /opt/hpws/apache/cgi-bin/trials/bip/data/TESTING/tpm_sequence_file_count.txt.".$crdate."|tail -1");
												$tpm_total_file=explode("\n",file_get_contents("/opt/hpws/apache/cgi-bin/trials/bip/data/TESTING/tpm_sequence_file_count.txt.".$crdate));
												$missingTPMSeq = array();
												$missing_count = 0;
												$tpm_button= " ";
												foreach(array_filter($tpm_total_file) as $key => $value){
													$data=explode("|",trim($tpm_total_file[$key]));
													if (trim($data[0]) == '1'){
														
													}
													else {
														$missing_count=$missing_count+1;
														array_push($missingTPMSeq,$data);
													}
												}
												if($missing_count > 0){
													$tpm_button="<button class='glow' data-toggle='modal' data-target='#tpm_modal' style='background-color:red;color:white'>TPM Alert</button>";
												}
												else{
													$tpm_button= "";
													//$tpm_button="<button class='glow' data-toggle='modal' data-target='#tpm_modal' style='background-color:red;color:white'>TPM Alert</button>";
												}
												array_pop($missingTPMSeq);
												$tpmstatus_check = strpos(trim($checktpmrunning), 'terna');
												if ( strpos(trim($checktpmrunning), 'terna' ) == true ) {
													$tpm_running_from = 'PR';
												}
												elseif(strpos(trim($checktpmrunning), 'MIZO' ) == true) {
													$tpm_running_from = 'NR';
												}
												elseif(strpos(trim($checktpmrunning), 'ARASALAR' ) == true) {
													$tpm_running_from = 'DR';
												}
												else{
													$tpm_running_from = '';
												}
												
												$tpm_scp_data=explode("|",$tpm_scp_time);
												$removeColon_tpm_scp_time=str_replace(":","",trim($tpm_scp_data[2]));
												$removedColon_tpm_scp_time=strtotime($removeColon_tpm_scp_time);
												$_tpmTime = $yummy->timeUpdatedTpm("tpmStatus.txt.",".");
												$removeColonTPM = str_replace(":","",trim($_tpmTime));
												$removeColonTimes = strtotime($removeColonTPM);
												$currtimes=strtotime(date("Ymd Hi"));
												$scp_difftimes=$currtimes-$removedColon_tpm_scp_time;
												$difftimes=$currtimes-$removeColonTimes;
												
												if(intval($scp_difftimes)>3600){
													//$FinalScpTime = "<span style='background-color:red;color:white' class='glow' title='SFTP has not been done since last 1 Hour'>".trim($tpm_scp_data[2])."</span>";
													$FinalScpTime = "<span style='color:#fff'>".trim($tpm_scp_data[2])."</span>";
												}
												else{
													//$FinalScpTime = "<span style='color:#fff'>".trim($tpm_scp_data[2])."</span>";
													$FinalScpTime = "<span style='color:#fff'>".trim($tpm_scp_data[2])."</span>";
												}
												if(intval($difftimes)>600){
													$finalTpmTime = "<span style='background-color:red;color:white' class='glow' title='TPM Not Updated since last 10 mintues'>".trim($_tpmTime)."</span>";
												}
												else{
													$finalTpmTime = "<span style='color:#fff'>".trim($_tpmTime)."</span>";
												}
												$TPM_timesubstr=substr($tpmtime,0,2);
												$TPM_timesubstr2=substr($tpmtime,2,2);
												$TPM_timestampsubstr=substr($tpmtimestamp,0,2);
												$TPM_timestampsubstr2=substr($tpmtimestamp,2,2);
												$TPM_start_time_hr=substr($tpm_starttime,0,2);
												$TPM_start_time_min=substr($tpm_starttime,2,2);
												
											?>
											
													<span style="float:left;font-size:14px;" class="btn btn-xs btn-success">
														<!--a onclick="window.open('TPMmonitorfile.php?date=<?php echo $crdate;?>,'','height=1000, width=1900,scrollbars=yes,resizable=yes');"-->
														<a class="btn btn-sm" style="float:left" onclick="window.open('TPMmonitorfile.php?date=<?php echo $crdate;?>','','height=900, width=1400,scrollbars=yes,resizable=yes' );">
														<?php 
															//echo "TPM : ".$TPM_start_time_hr.":".$TPM_start_time_min."  |  "."Running on : ".$tpm_running_from." | ".$finalTpmTime." | SFTP : ".$FinalScpTime." | Files : ".$tpm_scp_data[0]." ".$tpm_button;  
															//echo "TPM : ".$TPM_start_time_hr.":".$TPM_start_time_min."  |  "."Running on : ".$tpm_running_from." | SFTP : ".$FinalScpTime." | Files : ".$tpm_scp_data[0]." ".$tpm_button;
															echo "TPM Running on : ".$tpm_running_from." | SFTP : ".$FinalScpTime." | Tar Files : ".$tpm_scp_data[0]." ".$tpm_button;
															//echo "TPM : ".$TPM_start_time_hr.":".$TPM_start_time_min."  |  "."Running on : ".$tpm_running_from;
														?>
														</a>
													</span>
											
											<span class="queuetimepop" style="float:right;font-size:18px;"><img src="loading-bubbles.svg">
												<?php echo $yummy->timeUpdated("status_queue_8app.txt.false",".");?>
											</span>
											
											<div class="box-tools pull-right">
											</div>
										</div>
										<div class="panel-body table-responsive hehe">
											<table class="table table-bordered table-striped text-center">
												<thead>
													<tr>
														<th>Queue Name</th>
														<th><a onclick="window.open('queue_buildup_details.php?date=<?php echo $crdate;?>&&flag=pace_buildup_i.txt','','height=1000, width=1900,scrollbars=yes,resizable=yes');">M </a></th>
														<th><a onclick="window.open('queue_buildup_details.php?date=<?php echo $crdate;?>&&flag=pace_buildup_I.txt','','height=1000, width=1900,scrollbars=yes,resizable=yes');">S1 </a></th>
														<th><a onclick="window.open('queue_buildup_details.php?date=<?php echo $crdate;?>&&flag=pace_buildup_a.txt','','height=1000, width=1900,scrollbars=yes,resizable=yes');">S2 </a></th>
														<th><a onclick="window.open('queue_buildup_details.php?date=<?php echo $crdate;?>&&flag=pace_buildup_b.txt','','height=1000, width=1900,scrollbars=yes,resizable=yes');">S3 </a></th>
														<th><a onclick="window.open('queue_buildup_details.php?date=<?php echo $crdate;?>&&flag=pace_buildup_c.txt','','height=1000, width=1900,scrollbars=yes,resizable=yes');">S4 </a></th>
														<th><a onclick="window.open('queue_buildup_details.php?date=<?php echo $crdate;?>&&flag=pace_buildup_d.txt','','height=1000, width=1900,scrollbars=yes,resizable=yes');">S5 </a></th>
														<th><a onclick="window.open('queue_buildup_details.php?date=<?php echo $crdate;?>&&flag=pace_buildup_e.txt','','height=1000, width=1900,scrollbars=yes,resizable=yes');">S6 </a></th>
														<th><a onclick="window.open('queue_buildup_details.php?date=<?php echo $crdate;?>&&flag=pace_buildup_f.txt','','height=1000, width=1900,scrollbars=yes,resizable=yes');">S7 </a></th>
														<th><a onclick="window.open('queue_buildup_details.php?date=<?php echo $crdate;?>&&flag=pace_buildup_g.txt','','height=1000, width=1900,scrollbars=yes,resizable=yes');">S8</a></th>
														<th><a onclick="window.open('queue_buildup_details.php?date=<?php echo $crdate;?>&&flag=pace_buildup_h.txt','','height=1000, width=1900,scrollbars=yes,resizable=yes');">S9</a></th>
														<th><a onclick="window.open('queue_buildup_details.php?date=<?php echo $crdate;?>&&flag=pace_buildup_j.txt','','height=1000, width=1900,scrollbars=yes,resizable=yes');">S10</a></th>
														<th><a onclick="window.open('queue_buildup_details.php?date=<?php echo $crdate;?>&&flag=pace_buildup_k.txt','','height=1000, width=1900,scrollbars=yes,resizable=yes');">S11</a></th>
<th><a onclick="window.open('queue_buildup_details.php?date=<?php echo $crdate;?>&&flag=pace_buildup_m.txt','','height=1000, width=1900,scrollbars=yes,resizable=yes');">S12</a></th>
													</tr>
												</thead>
												<tbody class="queueappend" style="font-size:15px;">
													<?php
														$buildup_flag=file_get_contents("/opt/hpws/apache/cgi-bin/trials/bip/data/TESTING/buildup_flag.txt");
														if($buildup_flag == "0"){
															$aplnMonior->status_queue(); 
														}
														else{
															$aplnMonior->status_queue1();
														}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
							<?php
								$rtgs_slowness_details=$rtgs->rtgs_slowness();
								$rtgs_slowness=explode("|",$rtgs->rtgs_slowness());
								if($rtgs_slowness[1]=="Slow"){
									$rtgs_color="navy";
									$rtgs_comments=$rtgs_slowness[1]."(".$rtgs_slowness[0].")";
								}
								else{
									$rtgs_color="green";
									$rtgs_comments=$rtgs_slowness[1];
								}
							?>

							<div class="row" style="position:relative; min-height: 1px; padding-right: 0px; padding-left: 0px;">
<!--Commenting for CommandCenter-->
								<!--<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 autosys_jobs">-->
<!--Commenting for CommandCenter-->
								<div class="col-md-6 all_rtgs" style="position:relative; min-height: 1px; padding-right: 0px; padding-left: 0px;">
<!--Commenting for CommandCenter-->
									<!--<div class="panel panel-primary">
										<div class="panel-heading bg-tcs-active">
											<span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("SBI_autosys_space_utilization.txt",".");?></span>
											Imp Mountpoints of autosys server(abref/sbibkpnr/repapp1)
										</div>
										<div class="panel-body table-responsive">
											<table class="table table-bordered table-striped">
												<thead>
													<tr>
														<th style="width:110px;" class="text-center">/home</th>
														<th style="width:110px;" class="text-center">/opt</th>
														<th style="width:110px;" class="text-center">/tmp</th>
														<th style="width:110px;" class="text-center">/autosys_ab</th>
														<th style="width:110px;" class="text-center">/autosys db</th>
														<th style="width:110px;" class="text-center">/usr</th>
														<th style="width:110px;" class="text-center">/var</th>
														<th style="width:110px;" class="text-center">/home_autosys</th>
													</tr>
												</thead>
												<tbody>
												<?php
													$yummy->sbi_autosys();
												?>
												</tbody>
											</table>
											<div class="col-md-12">
												<?php $rtgs->nat_sfmq();?>
											</div>
										</div>
									</div>-->
<!--Commenting for CommandCenter-->
<!--Relocation for Command Center-->
						<div class="col-md-12">
									<div class="panel panel-primary">
										<div class="panel-heading bg-tcs-active">
											<span style="float:right;font-size:18px;"><?php echo $yummy->timeUpdated("SBI_autosys_space_utilization.txt",".");?></span>
											MQ Status
										</div>
										<div class="panel-body table-responsive">
											<table class="table table-bordered table-striped">
												<thead>
													<tr>
														<th class="text-center">Server</th>
														<th class="text-center">M</th>
														<th class="text-center">S1</th>
														<th class="text-center">S2</th>
														<th class="text-center">S3</th>
														<th class="text-center">S4</th>
														<th class="text-center">S5</th>
														<th class="text-center">S6</th>
														<th class="text-center">S7</th>
														<th class="text-center">S8</th>
														<th class="text-center">S9</th>
														<th class="text-center">S10</th>
														<th class="text-center">S11</th>
													</tr>
												</thead>
												<tbody>
												<?php
													echo msl::mq_status();
												?>
												</tbody>
											</table>
											<div >
												<span style="float:right;background-color:white;color:black;cursor:default;" class="btn btn-sm btn-primary legends_btn">
													<span class="na_btn"><i style="color:black" class='fa fa-fw fa-minus'></i>NA</span>
													<span class="running_btn"><i style="color:green" class='fa fa-check'></i>OK</span>
													<span class="running_btn"><i style="color:green" class='fa fa-check'></i><b> 2004 (RTGS/NEFT)</b></span>
													<span class="running_btn"><i style="color:green" class='fa fa-check'></i><b> 2005 (IMPS)</b></span>
												</span>
											</div>
										</div>
									</div>
						</div>
<!--Relocation for Command Center-->
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 schl_tran">
									<div class="panel panel-primary">
										<div class="panel-heading bg-tcs-active">
											<th class="text-center" style="color:red;">MISC Transaction Count</th>
											<span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("schl_data",".");?></span>
										</div>
										<div class="panel-body table-responsive">
											<table class="table table-bordered table-striped">
												<thead>
													<tr>
														<th class="text-center">TXN TYPE</th>
														<th class="text-center bg-green-active">PROCESSED</th>
														<th class="text-center bg-aqua-active">WAIT</th>
														<th class="text-center bg-bg-olive-active">UNPROCESSED</th>
														<th class="text-center bg-red-active">MQ ERR</th>
													</tr>
												</thead>
												<tbody>
													<?php $rtgs->schl_transaction();?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!--<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
								 <div class="panel panel-primary">
									<div class="panel-heading bg-tcs-active">
										<b><a onclick="window.open('<?php //echo $hostname;?>/pace/Online_portal/pages/loninv.php','','height=1000, width=1200,scrollbars=yes,resizable=yes' );"
										style="text-decoration:underline;color:#fff;">Size of DCARRLON, DCARRINV, DCARRKEY[Click Here To View Details] </a></b>
										<span style="float:right;font-size:18px;color:white;"><img src="loading-bubbles.svg"><?php //echo timedisplay::timeUpdated("/opt/hpws/apache/cgi-bin/trials/bip/data/TESTING/loninvkey_all.txt","OutDate");?></span>
									</div>
									<div class="panel-body table-responsive">
										<table class="table table-bordered table-striped">
											<thead>
												<tr>
													<th class="text-center">EOD Date</th>
													<th class="text-center" colspan="2">DCARRLON</th>
													<th class="text-center" colspan="2">DCARRINV</th>
													<th class="text-center" colspan="2">DCARRKEY</th>
												</tr>
												<tr>
														<th class="text-center" ></th>
														<th class="text-center" >Bytes</th>
														<th class="text-center" >GB</th>
														<th class="text-center" >Bytes</th>
														<th class="text-center" >GB</th>
														<th class="text-center" >Bytes</th>
														<th class="text-center" >GB</th>
													</tr>
											</thead>
											<tbody>
											<?php
												//echo msl::loninvkey("pop");
											?>
											</tbody>
										</table>
									</div>
								  </div>
								</div>-->
								
							</div>
							<div class="row">
								<div class="col-md-12 all_rtgs" style="position:relative; min-height: 1px; padding-right: 0px; padding-left: 0px;">
<!--Relocation for Command Center-->
									<!--<div class="col-md-3">
										<div class="small-box bg-<?php echo $rtgs_color;?>-active">
											<div class="inner">
											<span style="float:right;font-size:1.125em;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("rtgs.txt",".");?></span>
											<h4><a href="#" data-toggle="modal" data-target="#myModal6" style="color:#fff;">RTGS Incoming </a></h4>
												<div class="table-responsive">
													<table class="table table-bordered table-striped text-center" style="height:75px;">
														<thead>
															<th style="color:black">Time</th>
															<th style="background-color:#de7c7c">Pending</th>
															<th class="bg-aqua-active">Reversal</th>
															<th class="bg-green-active">Processed</th>
															<th style="color:black">UNPR</th>
														</thead>
														<tbody>
															<?php
																$rtgs->rtgss_s(2);
															?>
															<tr>
																<td colspan=5><marquee behavior="alternate" style='font-size:15px;' direction="right"><?php echo "RTGS Is Running ".$rtgs_comments;?></marquee></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>-->

									<!--<div class="col-md-3">
										<div class="small-box bg-green-active">
											<div class="inner">
											<span style="float:right;font-size:1.125em;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("rtgs.txt",".");?></span>
												<h4>RTGS Outgoing</h4>
												<div class="table-responsive">
													<table class="table table-bordered table-striped text-center" style="height:75px;">
														<thead>
															<th style="color:black">Time</th>
															<th style="background-color:#de7c7c">Pending</th>
															<th class="bg-navy-active">Wait</th>
															<th class="bg-aqua-active">Return</th>
															<th class="bg-green-active">Processed</th>
															<th style="color:black">UNPR</th>
														</thead>
														<tbody>
															<?php
																$rtgs->rtgss_s(0);
															?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>-->
<!--Relocation for Command Center-->
<!--Commenting for CommandCenter-->
									<!--<div class="col-md-3">
										<div class="small-box bg-green-active">
											<div class="inner">
											  <h4>RTGS ACK Incoming<span style="float:right;font-size:1.125em;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("rtgs_ack_incoming.txt",".");?></span></h4>
											  <h5>RTGS Message Count <span style="float:right;"><?php $rtgs->rtgss_ack_out(0);	?></span></h5>
												<div class="progress" title="<?php $rtgs->rtgss_ack_out(5);?> Pending" style="height:6px;margin-bottom:20px;">
													<div class="progress-bar" style="width: <?php $rtgs->rtgss_ack_out(5);?>;background-color:red"></div>
												</div>
												<div class="table-responsive" id="readmore1" style="display:none;">
													<table class="table table-bordered table-striped text-center">
														<thead>
															<tr>
																<th colspan="3">Sutlej</th>
																<th colspan="3">Sharda</th>
																<th colspan="3">Girija</th>
																<th colspan="3">Jhelum</th>
																<th colspan="3">Jamuna</th>
															</tr>
															<tr>
																<th class="bg-green-active">Processed</th>
																<th class="bg-red-active">Pending</th>
																<th class="bg-aqua-active">Proc Speed</th>
																<th class="bg-green-active">Processed</th>
																<th class="bg-red-active">Pending</th>
																<th class="bg-aqua-active">Proc Speed</th>
																<th class="bg-green-active">Processed</th>
																<th class="bg-red-active">Pending</th>
																<th class="bg-aqua-active">Proc Speed</th>
																<th class="bg-green-active">Processed</th>
																<th class="bg-red-active">Pending</th>
																<th class="bg-aqua-active">Proc Speed</th>
																<th class="bg-green-active">Processed</th>
																<th class="bg-red-active">Pending</th>
																<th class="bg-aqua-active">Proc Speed</th>
															</tr>
														</thead>
														<tbody>
															<?php
																$rtgs->rtgss_ack_out(2);
															?>
														</tbody>
												  </table>
												</div>
											</div>
											<a class="small-box-footer" id="readButton1" onclick="myFunction2()" style="display:block;">
												Read More <i class="fa fa-arrow-circle-down"></i>
											</a>
											<a class="small-box-footer" id="lessButton1" onclick="myFunction3()" style="display:none;">
												Show Less <i class="fa fa-arrow-circle-up"></i>
											</a>
										</div>
									</div>-->
<!--Commenting for CommandCenter-->
<!--Commenting for CommandCenter-->
									<!--<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 branch_teller_login">
										<div class="box box-primary box-solid">
											<div class="box-header bg-tcs-active">
												<h3 class="box-title"><a onclick="window.open('<?php echo $hostname;?>/cgi-bin/trials/bip/data/TESTING/test_branches.cgi?mldate=<?php echo $crdate; ?>','','height=600, width=900,scrollbars=yes,resizable=yes' );">Application Status</a></h3><span style="float:right;font-size:18px;color:white;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("trn_stat_m.txt",".");?></span>
											</div>
											<div class="panel-body table-responsive">
												<table class="table table-bordered table-striped">
													<thead>
													</thead>
														<tbody>
														<?php
															echo msl::app_stat();
														?>
													</tbody>
												</table>
											</div>
										</div>
									</div>-->
<!--Commenting for CommandCenter-->
									<!--<div class="col-md-3">
										<div class="panel panel-primary">
											<div class="panel-heading bg-red-active">
											   NAT File SFMQ ERROR(STATUS 40)
												<span style="float:right;font-size:1.125em;"><img src="loading-bubbles.svg"><?php //echo timedisplay::timeUpdated("/opt/hpws/apache/cgi-bin/trials/bip/data/TESTING/NAT_utr.txt","OutDate");?></span>
											</div>
											<div class="panel-body table-responsive">
												<table class="table table-bordered table-striped">
													<tbody>

														<?php //$rtgs->nat_sfmq();?>
													</tbody>
												</table>
											</div>
										</div>
									</div>-->
								</div>
							</div>
		<!--Table 1 done aligning till here go up-->
						<div class="row" style="position:relative; min-height: 1px; padding-right: 0px; padding-left: 0px;">
								<div class="col-md-12 all_rtgs" style="position:relative; min-height: 1px; padding-right: 0px; padding-left: 0px;">
									<div class="col-md-6">
										<div class="small-box bg-<?php echo $rtgs_color;?>-active">
											<div class="inner">
											<span style="float:right;font-size:1.125em;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("rtgs.txt",".");?></span>
											<h4><a href="#" data-toggle="modal" data-target="#myModal6" style="color:#fff;">RTGS Incoming </a></h4>
												<div class="table-responsive">
													<table class="table table-bordered table-striped text-center" style="height:75px;">
														<thead>
															<th style="color:black">Time</th>
															<th style="background-color:#de7c7c">Pending</th>
															<th class="bg-aqua-active">Reversal</th>
															<th class="bg-green-active">Processed</th>
															<th style="color:black">UNPR</th>
														</thead>
														<tbody>
															<?php
																$rtgs->rtgss_s(2);
															?>
															<tr>
																<td colspan=5><marquee behavior="alternate" style='font-size:15px;' direction="right"><?php echo "RTGS Is Running ".$rtgs_comments;?></marquee></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>

									<div class="col-md-6">
										<div class="small-box bg-green-active">
											<div class="inner">
											<span style="float:right;font-size:1.125em;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("rtgs.txt",".");?></span>
												<h4>RTGS Outgoing</h4>
												<div class="table-responsive">
													<table class="table table-bordered table-striped text-center" style="height:75px;">
														<thead>
															<th style="color:black">Time</th>
															<th style="background-color:#de7c7c">Pending</th>
															<th class="bg-navy-active">Wait</th>
															<th class="bg-aqua-active">Return</th>
															<th class="bg-green-active">Processed</th>
															<th style="color:black">UNPR</th>
														</thead>
														<tbody>
															<?php
																$rtgs->rtgss_s(0);
															?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12" style="position:relative; min-height: 1px; padding-right: 0px; padding-left: 0px;">
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 high_resource_replica">
										<div class="panel panel-primary">
											<div class="panel-heading bg-tcs-active">
												<a class="btn btn-xs bg-aqua-active" onclick="window.open('long_running.php?date=<?php echo $crdate ;?>','','height=1000, width=1000,scrollbars=yes,resizable=yes');">LR</a><span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("top_8apps.txt",".");?></span>
												High Resources Replicas
											</div>
											<div class="panel-body table-responsive table-autoscroll" style="height:392px;">
												<table class="table table-bordered table-striped text-center">
													<thead>
													<tr>
														<th>Server(Time)</th>
														<th>Replica</th>
														<th>TXN</th>
														<th>PID -- CPU%</th>
													</tr>
													</thead>
													<tbody>
													<?php
														$yummy->sys_utl3();
													?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
										<div class="panel panel-primary">
											<div class="panel-heading bg-tcs-active">
												<span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("topstat_8apps.txt",".");?></span>
												<a href="#"  data-toggle="modal" data-target="#myModal4" style="color:#fff;">System Utilization<span style="float:left;color:white;" class="btn btn-xs btn-info"> Compare </span></a>
											</div>
											<div class="panel-body table-responsive" style="height:392px;">
											<!--<span class="btn btn-primary">Mithi</span>-->
												<table class="table table-bordered table-striped system_util">
													<thead>
														<tr>
															<th class="text-center bg-navy-active">Server</th>
															<th class="text-center">Time</th>
															<th style="background-color:#f7d794">Total Process</th>
															<th class="text-center">Zombies</th>
															<th class="text-center bg-aqua-active">Idle(%)</th>
														</tr>
													</thead>
													<tbody>
														<?php
															$yummy->sys_utl1();
														?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 space_util">
										<div class="panel panel-primary">
											<div class="panel-heading bg-tcs-active">
												<span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("space_8app.txt",".");?></span>
												<a href="#" data-toggle="modal" data-target="#myModal5" style="color:#fff;">Space Utilization(%)<span style="float:left;color:white;" class="btn btn-xs btn-info">Compare</span></a>
											</div>
											<div class="panel-body table-responsive">
												<table class="table table-bordered table-striped">
													<thead>
														<tr>
															<th class="text-center">Server</th>
															<th class="text-center">Data(D)</th>
															<th class="text-center">Spool(D)</th>
															<th class="text-center">Sysout(D)</th>
															<th class="text-center">/Tmp</th>
															<th class="text-center">/home(id)</th>
															<th class="text-center">Sys(C)</th>
															<th class="text-center">Sys(N)</th>
															<th class="text-center">Data(N)</th>
															<th class="text-center">Spool(C)</th>
															<th class="text-center">Ftparea</th>
															<th class="text-center">/Opt</th>
															<th class="text-center">/var</th>
														</tr>
													</thead>
													<tbody>
														<?php
															$yummy->sys_utl2();
														?>
													</tbody>
												</table>
											</div>
									  </div>
									</div>
								</div>
							</div>
							<div class="row">
<!--Commenting for CommandCenter-->
									<!--<div class="col-lg-2 col-md-6 col-sm-6 col-xs-6">
										<div class="panel panel-primary">
											<div class="panel-heading bg-tcs-active">
												<span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("topstat_8apps.txt",".");?></span><span class="btn btn-xs btn-info pull-left" style="cursor:pointer;" onclick="window.open('mithi_mountpoint.php','','height=800, width=600,scrollbars=yes,resizable=yes' );">More</span>Mithi Mountpoint
											</div>
											<div class="panel-body table-responsive">
												<table class="table table-bordered table-striped mithi_mountpoint">
													<thead>
														<th class="text-center">Mountpoint Name</th>
														<th class="text-center bg-aqua-active">Space (%)</th>
													</thead>
													<tbody>
														<?php echo msl::mithi_space();?>
													</tbody>
												</table>
											</div>
										</div>
									</div>-->
<!--Commenting for CommandCenter-->
<!--Commenting for CommandCenter-->									
									<!--<div class="col-lg-4 col-md-6 col-sm-6 col-xs-6">
										<div class="panel panel-primary">
											<div class="panel-heading bg-tcs-active">
												<span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("/opt/hpws/apache/cgi-bin/trials/bip/data/TESTING/space_check_median.txt","OutDate");?></span>
												<a href="#"  data-toggle="modal" data-target="#myModal4" style="color:#fff;">Intermediate Server</a>
											</div>
											<div class="panel-body table-responsive">
												<table class="table table-bordered table-striped intermediate_mountpoint">
													<thead>
														
														<th class="text-center">Mountpoint Name</th>
														<th class="text-center  bg-aqua-active">PR</th>
														<th class="text-center  bg-aqua-active">DR</th>
													</thead>
													<tbody>
														<?php echo msl::intermdiate_server_space();?>
													</tbody>
												</table>
											</div>
										</div>
									</div>-->
<!--Commenting for CommandCenter-->
<!--Commenting for CommandCenter-->
									<!--<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
										<div class="panel panel-primary">
											<div class="panel-heading bg-tcs-active">
												<span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("/opt/hpws/apache/cgi-bin/trials/bip/data/TESTING/dcog_server_space_utilisation_check.log","OutDate");?></span>
												<a href="#"  data-toggle="modal" data-target="#myModal4" style="color:#fff;">DCOG Space Utilization</a>
											</div>
											<div class="panel-body table-responsive">
												<table class="table table-bordered table-striped intermediate_mountpoint">
													<thead>
														<th class="text-center" style="background-color: #9c3c3c;color:white;">Server</th>
														<th class="text-center">Mountpoint Name</th>
														<th class="text-center bg-aqua-active">Space (%)</th>
													</thead>
													<tbody>
														<?php echo msl::dcog_server_space_util();?>
													</tbody>
												</table>
											</div>
										</div>
									</div>-->
<!--Commenting for CommandCenter-->
<!--Relocation for CommandCenter-->
									<!--<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 showerfeed_files">
										<div class="panel panel-primary">
											<div class="panel-heading bg-tcs-active">
												Shower Feed
												<span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("trickle_sf.txt",".");?></span>
											</div>
											<div class="panel-body table-responsive">
												<table class="table table-bordered table-striped">
													<thead>
														<tr>
															<th class="text-center bg-navy" colspan="2">PNS</th>
															<th class="text-center bg-navy" colspan="2">HSL</th>
															<th class="text-center bg-navy" colspan="2">TOTAL</th>
														</tr>
														<tr>
															<th class="text-center bg-green-active" >Proc</th>
															<th class="text-center" style="background-color:#e66767;color:#fff">Pend</th>
															<th class="text-center bg-green-active" >Proc</th>
															<th class="text-center " style="background-color:#e66767;color:#fff" >Pend</th>
															<th class="text-center bg-green-active" >Proc</th>
															<th class="text-center " style="background-color:#e66767;color:#fff" >Pend</th>
														</tr>

													</thead>
													<tbody>
													<?php
															//$trickelfeed->trickle_sharda('trickle_sf');
															$trickelfeed->trickle_sharda('trickle_sf');
															$tellerlogged=shell_exec('cat /opt/hpws/apache/cgi-bin/trials/bip/data/TESTING/vvr_teller_login.txt.'.$crdate.'|grep -w "No of Teller Logged in"');
														?>
														<tr>
														<th colspan='6' onclick="window.open('teller_graph.php','','height=950, width=1000,scrollbars=yes,resizable=yes' );" title="No of Teller Logged in(VVR DB)" class="text-center bg-purple"><i class="fa fa-users"></i> <?php echo $tellerlogged;?></th>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>-->
<!--Relocation for CommandCenter-->
								</div>
							<div class="row">
								<div class="col-md-12 bulk_file_tricklefeed" style="position:relative; min-height: 1px; padding-right: 0px; padding-left: 0px;">
									<!--<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="panel panel-primary" style="font-size:0.960em;">
											<div class="panel-heading bg-tcs-active">
												<span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("Portal_Main_Bulk_File.txt_","");?></span>Bulk File Status<a style="float:left;height:20px;" onclick="window.open('BNT_MASTER.php?date=<?php echo $crdate;?>','','height=900, width=1200,scrollbars=yes,resizable=yes' );"><span style="float:left;color:white;" class="btn btn-xs btn-warning">BNT Records Status (Click To View)</span></a>
											</div>
											<div class="panel-body table-responsive">
												<table class="table table-bordered table-striped"  border="1">
													<thead>
														<tr>
															<th rowspan="3" style="border:2px solid black;">File Type/Server</th>
															<th style="border:2px solid black;"class="text-center" colspan="4">NFT</th>
															<th style="border:2px solid black;"class="text-center" colspan="4">BNE</th>
															<th style="border:2px solid black;"class="text-center" colspan="4">BNT</th>
															<th style="border:2px solid black;"class="text-center" colspan="4">NAT</th>
														</tr>
														<tr>
															<th style="border:2px solid black;" class="text-center bg-green-active" colspan="2">Proc</th>
															<th style="border:2px solid black;background-color:#e66767;color:#fff" class="text-center" colspan="2">Pend</th>
															<th style="border:2px solid black;" class="text-center bg-green-active" colspan="2">Proc</th>
															<th style="border:2px solid black;background-color:#e66767;color:#fff" class="text-center" colspan="2">Pend</th>
															<th style="border:2px solid black;" class="text-center bg-green-active" colspan="2">Proc</th>
															<th style="border:2px solid black;background-color:#e66767;color:#fff" class="text-center" colspan="2">Pend</th>
															<th style="border:2px solid black;" class="text-center bg-green-active" colspan="2">Proc</th>
															<th style="border:2px solid black;background-color:#e66767;color:#fff" class="text-center" colspan="2">Pend</th>
														</tr>
														<tr>
															<!--<th style="border:2px solid black;"></th>
															<th class="text-center" style="border:2px solid black;">Files</th>
															<th class="text-center" style="border:2px solid black;">Rec</th>
															<th class="text-center" style="border:2px solid black;">Files</th>
															<th class="text-center" style="border:2px solid black;">Rec</th>
															<th class="text-center" style="border:2px solid black;">Files</th>
															<th class="text-center" style="border:2px solid black;">Rec</th>
															<th class="text-center" style="border:2px solid black;">Files</th>
															<th class="text-center" style="border:2px solid black;">Rec</th>
															<th class="text-center" style="border:2px solid black;">Files</th>
															<th class="text-center" style="border:2px solid black;">Rec</th>
															<th class="text-center" style="border:2px solid black;">Files</th>
															<th class="text-center" style="border:2px solid black;">Rec</th>
															<th class="text-center" style="border:2px solid black;">Files</th>
															<th class="text-center" style="border:2px solid black;">Rec</th>
															<th class="text-center" style="border:2px solid black;">Files</th>
															<th class="text-center" style="border:2px solid black;">Rec</th>
														  </tr>
													</thead>
													<tbody>
													<?php
														//$trickelfeed->Portal_Main_Bulk_File();
													?>
													</tbody>
												</table>
											</div>
										</div>
									</div>-->
<!--Commenting for CommandCenter-->
									<!--<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
										<div class="panel panel-primary">
											<div class="panel-heading text-center bg-tcs-active">
												CCPC Details of <?php echo $crdate;?>
												<span style="float:right;font-size:18px;"><i class="fa fa-fw fa-clock-o"></i><?php echo shell_exec("ls -lrt /opt/hpws/apache/cgi-bin/trials/bip/data/TESTING/onlyccpc.txt|awk '{print $6,$7,$8}'");?></span>
											</div>
											<div class="panel-body table-responsive" style="height:334px;">
												<table class="table table-bordered table-responsive">
													<thead>
														<tr>
															<th style="border:2px solid black;" class="text-center" rowspan="3">CCPC Code</th>
															<th style="border:2px solid black;" class="text-center" rowspan="3">Name<br><br><i class="fa fa-university"></i><i>No. of CCPC Branches Logged In ( At Present)  - <br> <br><?php echo msl::app_stat_ccpc();?> / 22</i></th>
															<th style="border:2px solid black;" class="text-center" rowspan="3">No. of Tellers Logged</th>
															<th style="border:2px solid black;" class="text-center" colspan="6">Trickle Feed Files</th>
														</tr>
														<tr>
															<th style="border:2px solid black;" class="text-center" colspan="2">SAN</th>
															<th style="border:2px solid black;" class="text-center" colspan="2">CIL</th>
															<th style="border:2px solid black;" class="text-center" colspan="2">OCL</th>
														</tr>
														<tr>
															<th style="border:2px solid black;" class="bg-red text-center" colspan="1">Pen</th>
															<th style="border:2px solid black;" class="bg-green text-center" colspan="1">Proc</th>
															<th style="border:2px solid black;" class="bg-red text-center" colspan="1">Pen</th>
															<th style="border:2px solid black;" class="bg-green text-center" colspan="1">Proc</th>
															<th style="border:2px solid black;" class="bg-red text-center" colspan="1">Pen</th>
															<th style="border:2px solid black;" class="bg-green text-center" colspan="1">Proc</th>
														</tr>
													</thead>
													<tbody>
														<?php
															$trickelfeed->trickle_ccpc();
														?>
													</tbody>
												</table>
											</div>
										</div>
									</div>-->
<!--Commenting for CommandCenter-->
									<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
										<div class="panel panel-primary">
											<div class="panel-heading bg-tcs-active">
												<span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("TRICKLEFEED_MASTER.txt","_"); ?></span>
												<a class="btn btn-sm btn-info" style="float:left" onclick="window.open('trickle_sum.php?date=<?php echo $crdate;?>','','height=900, width=1400,scrollbars=yes,resizable=yes' );">TrickleFeed Summary (Click To View)</a>
												<a href="TrickleFeedNew.php" target="_blank" class="btn btn-danger btn-sm">TRICKLE FEED MASTER TABLE(Click For Details)</a>
											</div>
											<div class="panel-body table-responsive table-autoscroll" style="height:320px;">
												<table class="table table-bordered table-hover dataFetch " id="example">
													<thead>
														<tr>
															<th style="border:2px solid black;" rowspan="2">File Type</th>
															<th style="border:2px solid black;" class="text-center" colspan="2" id="i">APP1</th>
															<th style="border:2px solid black;" class="text-center" colspan="2" id="I">APP2</th>
															<th style="border:2px solid black;" class="text-center" colspan="2" id="a">APP3</th>
															<th style="border:2px solid black;" class="text-center" colspan="2" id="b">APP4</th>
															<th style="border:2px solid black;" class="text-center" colspan="2" id="c">APP5</th>
															<th style="border:2px solid black;" class="text-center" colspan="2" id="d">APP6</th>
															<th style="border:2px solid black;" class="text-center" colspan="2" id="e">APP7</th>
															<th style="border:2px solid black;" class="text-center" colspan="2" id="f">APP8</th>
															<th style="border:2px solid black;" class="text-center" colspan="2" id="g">APP9</th>
															<th style="border:2px solid black;" class="text-center" colspan="2" id="h">APP10</th>
															<th style="border:2px solid black;" class="text-center" colspan="2" id="j">APP11</th>
															<th style="border:2px solid black;" class="text-center" colspan="2" id="k">APP12</th>
														</tr>
														<tr>
															<th style="border:2px solid black;" class="text-center" colspan="1">Proc</th>
															<th style="border:2px solid black;" class="text-center" colspan="1">Pen</th>
															<th style="border:2px solid black;" class="text-center" colspan="1">Proc</th>
															<th style="border:2px solid black;" class="text-center" colspan="1">Pen</th>
															<th style="border:2px solid black;" class="text-center" colspan="1">Proc</th>
															<th style="border:2px solid black;" class="text-center" colspan="1">Pen</th>
															<th style="border:2px solid black;" class="text-center" colspan="1">Proc</th>
															<th style="border:2px solid black;" class="text-center" colspan="1">Pen</th>
															<th style="border:2px solid black;" class="text-center" colspan="1">Proc</th>
															<th style="border:2px solid black;" class="text-center" colspan="1">Pen</th>
															<th style="border:2px solid black;" class="text-center" colspan="1">Proc</th>
															<th style="border:2px solid black;" class="text-center" colspan="1">Pen</th>
															<th style="border:2px solid black;" class="text-center" colspan="1">Proc</th>
															<th style="border:2px solid black;" class="text-center" colspan="1">Pen</th>
															<th style="border:2px solid black;" class="text-center" colspan="1">Proc</th>
															<th style="border:2px solid black;" class="text-center" colspan="1">Pen</th>
															<th style="border:2px solid black;" class="text-center" colspan="1">Proc</th>
															<th style="border:2px solid black;" class="text-center" colspan="1">Pen</th>
															<th style="border:2px solid black;" class="text-center" colspan="1">Proc</th>
															<th style="border:2px solid black;" class="text-center" colspan="1">Pen</th>
															<th style="border:2px solid black;" class="text-center" colspan="1">Proc</th>
															<th style="border:2px solid black;" class="text-center" colspan="1">Pen</th>
															<th style="border:2px solid black;" class="text-center" colspan="1">Proc</th>
															<th style="border:2px solid black;" class="text-center" colspan="1">Pen</th>
														</tr>
													</thead>
													<tbody>
														<?php echo $trickelfeed->Total_trickle_1(); ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
<!--Relocation for CommandCenter-->
									<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 showerfeed_files">
										<div class="panel panel-primary">
											<div class="panel-heading bg-tcs-active">
												Shower Feed
												<span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("trickle_sf.txt",".");?></span>
											</div>
											<div class="panel-body table-responsive">
												<table class="table table-bordered table-striped">
													<thead>
														<tr>
															<th class="text-center bg-navy" colspan="2">PNS</th>
															<th class="text-center bg-navy" colspan="2">HSL</th>
															<th class="text-center bg-navy" colspan="2">TOTAL</th>
														</tr>
														<tr>
															<th class="text-center bg-green-active" >Proc</th>
															<th class="text-center" style="background-color:#e66767;color:#fff">Pend</th>
															<th class="text-center bg-green-active" >Proc</th>
															<th class="text-center " style="background-color:#e66767;color:#fff" >Pend</th>
															<th class="text-center bg-green-active" >Proc</th>
															<th class="text-center " style="background-color:#e66767;color:#fff" >Pend</th>
														</tr>

													</thead>
													<tbody>
													<?php
															//$trickelfeed->trickle_sharda('trickle_sf');
															$trickelfeed->trickle_sharda('trickle_sf');
															$tellerlogged=shell_exec('cat /opt/hpws/apache/cgi-bin/trials/bip/data/TESTING/vvr_teller_login.txt.'.$crdate.'|grep -w "No of Teller Logged in"');
														?>
														<tr>
														<th colspan='6' onclick="window.open('teller_graph.php','','height=950, width=1000,scrollbars=yes,resizable=yes' );" title="No of Teller Logged in(VVR DB)" class="text-center bg-purple"><i class="fa fa-users"></i> <?php echo $tellerlogged;?></th>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>

<!--Relocation for CommandCenter-->
								</div>
							</div>

						<div class="row">
							<div class="col-md-12" style="position:relative; min-height: 1px; padding-right: 0px; padding-left: 0px;">
								<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 bu5_uploads">
									<div class="panel panel-primary">
										<div class="panel-heading bg-tcs-active">
											<th class="text-center" style="color:red;">BATCH-UPLOADS-5 File Time Status</th>
											<span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("bu5_arka.txt",".");?></span>
										</div>
										<div class="panel-body table-responsive">
											<table class="table table-bordered table-striped">
												<thead>
													<tr>
														<th style="border:2px solid black;" class="text-center">File</th>
														<th style="border:2px solid black;" class="text-center">M</th>
														<th style="border:2px solid black;" class="text-center">S1</th>
														<th style="border:2px solid black;" class="text-center">S2</th>
														<th style="border:2px solid black;" class="text-center">S3</th>
														<th style="border:2px solid black;" class="text-center">S4</th>
														<th style="border:2px solid black;" class="text-center">S5</th>
														<th style="border:2px solid black;" class="text-center">S6</th>
														<th style="border:2px solid black;" class="text-center">S7</th>
														<th style="border:2px solid black;" class="text-center">S8</th>
														<th style="border:2px solid black;" class="text-center">SF</th>
													</tr>
												</thead>
												<tbody>
													<?php
														echo msl::but_stat();
														echo msl::but_stat1();
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
<!--Commenting for CommandCenter-->
								<!--<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 cbs_flow">
									<div class="panel panel-primary">
										<div class="panel-heading bg-tcs-active">
									
											<span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo timedisplay::timeUpdated("/opt/hpws/apache/cgi-bin/trials/bip/data/TESTING/currFlow.seq","OutDate");?></span>
											<p> <a title="click here to see CBS FLOW" href="https://10.0.40.8:9090/pace/Online_portal/pages/progressCBS.html" target="_blank">CBS FLOW </a></p>
										</div>
										<div class="panel-body table-responsive" style="">
											<iframe style="border:none;width:100%;height: 11vh;overflow:hidden;" src="progressCBS.html"></iframe>
										</div>
									</div>
								</div>-->
<!--Commenting for CommandCenter-->
<!--Relocation for CommandCenter-->
						<div class="col-md-6">
									<div class="panel panel-primary">
										<div class="panel-heading bg-tcs-active">
											<span style="float:right;font-size:18px;"><?php echo $yummy->timeUpdated("SBI_autosys_space_utilization.txt",".");?></span>
											RTGS Pending Files
										</div>
										<div class="panel-body table-responsive">
											<table class="table table-bordered table-striped">
												<thead>
													<tr>
														<th class="text-center">File</th>
														<th class="text-center">M</th>
														<th class="text-center">S1</th>
														<th class="text-center">S2</th>
														<th class="text-center">S3</th>
														<th class="text-center">S4</th>
														<th class="text-center">S5</th>
														<th class="text-center">S6</th>
														<th class="text-center">S7</th>
														<th class="text-center">S8</th>
														<th class="text-center">S9</th>
														<th class="text-center">S10</th>
														<th class="text-center">S11</th>
														<th class="text-center">S12</th>
													</tr>
												</thead>
												<tbody>
												<?php
													echo msl::rtgs_pending_files();
												?>
												</tbody>
											</table>
										</div>
									</div>
					</div>

<!--Relocation for CommandCenter-->

								<!--<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 bu5_uploads">
									<div class="panel panel-primary">
										<div class="panel-heading bg-tcs-active">
											<th class="text-center" style="color:red;">BATCH-UPLOADS File Time Status</th>
											<span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("bu5_arka.txt",".");?></span>
										</div>
										<div class="panel-body table-responsive">
											<table class="table table-bordered table-striped">
												<thead>
													<tr>
														<th class="text-center">M</th>
														<th class="text-center">S1</th>
														<th class="text-center">S2</th>
														<th class="text-center">S3</th>
														<th class="text-center">S4</th>
														<th class="text-center">S5</th>
														<th class="text-center">S6</th>
														<th class="text-center">S7</th>
														<th class="text-center">S8</th>
														<th class="text-center">S9</th>
														<th class="text-center">S10</th>
														<th class="text-center">S11</th>
													</tr>
												</thead>
												<tbody>
													<?php
														//echo msl::but_stat1();
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>-->
								<!--<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 cbs_flow">
									<div class="panel panel-primary">
										<div class="panel-heading bg-tcs-active">
											<span>CBS FLOW</span>
											<span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo timedisplay::timeUpdated("/opt/hpws/apache/cgi-bin/trials/bip/data/TESTING/currFlow.seq","OutDate");?></span>
										</div>
										<div class="panel-body table-responsive" style="">
											<iframe style="border:none;width:100%;height: 11vh;overflow:hidden;" src="progressCBS.html"></iframe>
										</div>
									</div>
								</div>-->
							</div>
						</div>
					<!-- NR BLOCK STARTS-->

					<?php

					//if($nslookup == '10.189.20.101'&& $DBdecider!='NR(No Auto Switch)' || $nslookup == '10.192.20.101'){ ?>

					<!--<div class="row">
						<div class="col-md-12" style="position:relative; min-height: 1px; padding-right: 0px; padding-left: 0px;">
							<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
								<div class="panel panel-primary">
									<div class="panel-heading bg-tcs-active">
										<span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("queue_buildup_nr_9app.txt",".");?></span>
										NR queue Status<a target="_blank" href="queue_buildup_details1_nr.php" style="float:left" class="btn btn-xs btn-success">NR Queues Consolidated Status</a>
									</div>
									<div class="panel-body table-responsive">
										<table class="table table-bordered table-striped text-center">
											<thead>
											<tr>
												<th>Queues</th>
												<th><a onclick="window.open('nr_queue_buildup_details.php?date=<?php echo $crdate; ?>&&flag=pace_buildup_nr_i.txt','','height=800, width=800,scrollbars=yes,resizable=yes' );" title="10.189.20.101" >HIMALAYA </a></th>
												<th><a onclick="window.open('nr_queue_buildup_details.php?date=<?php echo $crdate; ?>&&flag=pace_buildup_nr_I.txt','','height=800, width=800,scrollbars=yes,resizable=yes' );">SAHYADRI </a></th>
												<th><a onclick="window.open('nr_queue_buildup_details.php?date=<?php echo $crdate; ?>&&flag=pace_buildup_nr_a.txt','','height=800, width=800,scrollbars=yes,resizable=yes' );">SATPURA  </a></th>
												<th><a onclick="window.open('nr_queue_buildup_details.php?date=<?php echo $crdate; ?>&&flag=pace_buildup_nr_b.txt','','height=800, width=800,scrollbars=yes,resizable=yes' );">NILGIRI  </a></th>
												<th><a onclick="window.open('nr_queue_buildup_details.php?date=<?php echo $crdate; ?>&&flag=pace_buildup_nr_c.txt','','height=800, width=800,scrollbars=yes,resizable=yes' );">ARAVALI   </a></th>
												<th><a onclick="window.open('nr_queue_buildup_details.php?date=<?php echo $crdate; ?>&&flag=pace_buildup_nr_d.txt','','height=800, width=800,scrollbars=yes,resizable=yes' );">VINDHYA </a></th>
												<th><a onclick="window.open('nr_queue_buildup_details.php?date=<?php echo $crdate; ?>&&flag=pace_buildup_nr_e.txt','','height=800, width=800,scrollbars=yes,resizable=yes' );">PALANI </a></th>
												<th><a onclick="window.open('nr_queue_buildup_details.php?date=<?php echo $crdate; ?>&&flag=pace_buildup_nr_f.txt','','height=800, width=800,scrollbars=yes,resizable=yes' );">KAILASH   </a></th>
												<th><a onclick="window.open('nr_queue_buildup_details.php?date=<?php echo $crdate; ?>&&flag=pace_buildup_nr_g.txt','','height=800, width=800,scrollbars=yes,resizable=yes' );">MIZO   </a></th>
											</tr>
											</thead>
											<tbody>
												<?php
													$aplnMonior->nr_queue_status();
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!--<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							  <div class="panel panel-primary">
									<div class="panel-heading bg-tcs-active">
										<span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("queuecount_7app.txt","_");?></span>
										<a href="#" data-toggle="modal" data-target="#myModal3" style="color:#fff;">NR Monitoring<span style="float:left;color:white;" class="btn btn-xs btn-danger">Compare</span></a>
									</div>
								  <div class="panel-body table-responsive">
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
												<th class='text-center'>Gateway</th>
												<th class='text-center'>HIMALAYA</th>
												<th class='text-center'>SAHYADRI</th>
												<th class='text-center'>SATPURA</th>
												<th class='text-center'>NILGIRI</th>
												<th class='text-center'>ARAVALI</th>
												<th class='text-center'>VINDHYA</th>
												<th class='text-center'>PALANI</th>
												<th class='text-center'>KAILASH</th>
												<th class='text-center'>MIZO</th>
											</tr>
										</thead>
										<tbody>
										<?php
												echo msl::nr_mon();
											?>
										</tbody>
									</table>
								</div>
							  </div>
							</div>-->
						</div>
					</div>
					<!--<div class="row">
						<div class="col-md-12" style="position:relative; min-height: 1px; padding-right: 0px; padding-left: 0px;">
							<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
								<div class="panel panel-primary">
									<div class="panel-heading bg-tcs-active">
										<span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("top_nr_9apps",".");?></span>
										NR High Resources Consuming Replicas
									</div>
									<div class="panel-body table-responsive" style="height:300px;">
										<table class="table table-bordered table-striped text-center">
											<thead>
												<tr>
													<th>Server(Time)</th>
													<th>Replica</th>
													<th>Last Modified</th>
													<th>PID(% CPU)</th>
												</tr>
											</thead>
											<tbody>
											<?php
												$yummy->nr_sys_utl3();
											?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							  <div class="panel panel-primary">
									<div class="panel-heading bg-tcs-active disabled ">
										<span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("hung_nr_9apps.txt",".");?></span>
										NR Hung Replicas
									</div>
								 <div class="panel-body table-responsive" style="height:300px;">
									<table class="table table-bordered table-striped text-center" >
										<thead>
											<tr>
												<th>Server</th>
												<th>Time</th>
												<th>Replica</th>
												<th>Last Modified</th>
												<th>PID</th>
												<th>Txn</th>
											</tr>
										</thead>
										<tbody>
										<?php
												$yummy->nr_sys_utl4();
										?>
										</tbody>
									</table>
								</div>
							  </div>
							</div>
						</div>
					</div>-->
					<?php //} ?>
					<!-- NR BLOCK ENDS-->

						<!--<div class="row">
							<div class="col-md-3">
							  <!-- small box
							  <div class="small-box bg-tcs-active">
								<div class="inner">
								  <span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("summaryfile_master.txt",".");?></span>
								  <h4>INB Count</h4>
								  <div class="table-responsive">
									  <table class="table table-bordered table-striped text-center">
											<thead>
												<tr>
													<th style="color:blue">Total</th>
													<th style="color:green">Successful</th>
													<th style="color:red">Failure</th>
													<th style="color:#371fa3">Pending</th>

												</tr>
											</thead>
											<tbody>
												<tr>
													<?php $rtgs->inb_offline();?>
												</tr>
											</tbody>
										  </table>
									</div>
								</div>
							  </div>
							</div>

							<div class="col-md-3">
							  <!-- small box
								<div class="small-box bg-navy-active">
									<div class="inner">
										  <span style="float:right;font-size:18px;"><i class="fa fa-fw fa-clock-o"></i><?php echo $yummy->timeUpdated("summaryfile_master.txt",".");?></span>
										  <h4>ATM Count
											<div class="btn-group">
											  <button type="button" class="btn btn-xs btn-danger">ATM / INB Links</button>
											  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="height:20px;">
												<span class="caret" style="margin-top: -10px;"></span>
												<span class="sr-only">Toggle Dropdown</span>
											  </button>
											  <ul class="dropdown-menu">
												<li><a onclick="window.open('<?php echo $hostname;?>/cgi-bin/trials/bip/data/TESTING/atm_inb_summary_6apps.cgi','','height=600, width=600,scrollbars=yes,resizable=yes' );">ATM and INB Summary </a></li>
												<li role="separator" class="divider"></li>
												<li><a onclick="window.open('<?php echo $hostname;?>/cgi-bin/trials/bip/data/TESTING/test_atm_count.cgi','','height=600, width=600,scrollbars=yes,resizable=yes' );">   ATM online offline Summary</a></li>
												<li role="separator" class="divider"></li>
												<li><a onclick="window.open('<?php echo $hostname;?>/cgi-bin/trials/bip/data/multidate_atm.cgi','','height=600, width=600,scrollbars=yes,resizable=yes' );">ATM Errors </a></li>
												<li role="separator" class="divider"></li>
												<li><a onclick="window.open('<?php echo $hostname;?>/cgi-bin/trials/bip/data/TESTING/test_inberr.cgi_new?mldate=<?php echo $crrdate; ?>','','height=600, width=600,scrollbars=yes,resizable=yes' );">INB Errors </a></li>
												<li role="separator" class="divider"></li>
												<li><a onclick="window.open('<?php echo $hostname;?>/cgi-bin/trials/bip/data/TESTING/8APPS/test_inb_start.cgi?mldate=<?php echo $crrdate; ?>','','height=600, width=600,scrollbars=yes,resizable=yes' );">INB RESTART TIME </a></li>
											  </ul>
											</div>
											</h4>
										<div class="table-responsive">
										  <table class="table table-bordered table-striped text-center">
												<thead>
													<tr>
														<th style="color:green">Online</th>
														<th style="color:red">Offline</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<?php $rtgs->atm_online();	?>
													</tr>
												</tbody>
										  </table>
										</div>
									</div>
								</div>
							</div>
							<!-----mismatch addition
							<div class="col-md-3">
							  <div class="small-box bg-navy-active">
								<div class="inner">
								  <span style="float:right;font-size:12px;"><i class="fa fa-fw fa-clock-o"></i><?php echo $yummy->timeUpdated("mismatch.txt",".");?></span>
								  <h4>GECT <i class="fa fa-exchange"></i> NRTG UTR Mismatch</h4>
								  <div class="table-responsive">
									  <table class="table table-bordered table-striped text-center">
										<tbody>
											<?php $rtgs->mismatch();	?>
										</tbody>
									  </table>
									</div>
								</div>
							  </div>
							</div>
							</div>-->


						<!--OCR End boxes start-->
						<div class="row">
							<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 neft_summary">
								<div class="box box-primary box-solid">
									<div class="box-header bg-yellow-active">
										<h3 class="box-title">OCR and NEFT (OUTGOING) / <a onclick="window.open('<?php echo $hostname;?>/cgi-bin/trials/bip/data/TESTING/8APPS/ocr_neft_summary_8apps.cgi','','height=600,width=600,scrollbars=yes,resizable=yes' );">OCR_NEFT Summary </a></h3>
										<button class="bg-yellow-active" onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><span class="glyphicon glyphicon-eye-open"></span></button>
										<span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("ocr_neft_8apps.txt",".");?></span>
									</div>
									<div class="panel-body table-responsive">
										<table class="table table-bordered table-striped text-center">
											<thead>
												<tr>
													<th colspan="1"></th>
													<th colspan="1">SY0500 [ OCR ]</th>
													<th colspan="14">NEFT</th>
												</tr>
												<tr>
													<th >Status</th>
													<th >Table Count</th>
													<th >M</th>
													<th >S1</th>
													<th >S2</th>
													<th >S3</th>
													<th >S4</th>
													<th >S5</th>
													<th >S6</th>
													<th >S7</th>
													<th >S8</th>
													<th >S9</th>
													<th >S10</th>
													<th >S11</th>
													<th >S12</th>
													<th >Total</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$rtgs->ocr_neft_8apps();
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
<!--Commenting for CommandCenter-->
							<!--<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 bhaga_status">
								<div class="box box-primary box-solid">
									<div class="box-header bg-tcs-active">
										<h3 class="box-title"><?php echo $trickleuploadserver;?> Status</h3><span style="float:right;font-size:18px;color:white;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("tf_bhaga.txt",".");?></span>
										<h3 class="box-title">BRAMHA Status</h3><span style="float:right;font-size:18px;color:white;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("tf_bhaga.txt",".");?></span>
                                        <h3 class="box-title"> PALAR STATUS</h3><span style="float:right;font-size:18px;color:white;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("tf_bhaga.txt",".");?></span>
									</div>
									<div class="panel-body table-responsive">
										<table class="table table-bordered table-striped text-center">
											<thead>
												<tr>
													<th style="width:500px;">Name</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
											<?php
												echo msl::bhaga_stat();
											?>
											</tbody>
										</table>
									</div>
								</div>
							</div>-->
<!--Commenting for CommandCenter-->
<!--Relocation for CommandCenter-->
							<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 context_block">
								<div class="panel panel-primary">
									<div class="panel-heading bg-tcs-active"><a title="Burj Khalifa(Q Buildup MRI)" target="_blank" href="IG_heat/buildup_gapplot.php?dqp=ALL&region=online&date=<?php echo date("Y-m-d",strtotime($crdate)); ?>" style="float:left;text-decoration:none;"><i style="color:white;" class="fa fa-rss"></i></a>
										<span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("bncr0004_pace_8app.txt",".");?></span>
										System Context Block
									</div>
									<div class="panel-body table-responsive" style="">
										<table class="table table-bordered table-striped">
											<thead>
												<tr>
													<th>Context Block Fields</th>
													<th>M</th>
													<th>S1</th>
													<th>S2</th>
													<th>S3</th>
													<th>S4</th>
													<th>S5</th>
													<th>S6</th>
													<th>S7</th>
													<th>S8</th>
													<th>S9</th>
													<th>S10</th>
													<th>S11</th>
												</tr>
											</thead>
											<tbody>
											<?php
													$yummy->sys_utl6();
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
<!--Relocation for CommandCenter-->
							<!--<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 bhaga_status">
								<div class="box box-primary box-solid">
									<div class="box-header bg-tcs-active">
										<h3 class="box-title"><?php echo $trickleuploadserver;?> Status</h3><span style="float:right;font-size:18px;color:white;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("tf_bhaga.txt",".");?></span>
									</div>
									<div class="panel-body table-responsive">
										<table class="table table-bordered table-striped text-center">
											<thead>
												<tr>
													<th style="width:500px;">Name</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
											<?php
												//echo msl::bhaga_stat();
											?>
											</tbody>
										</table>
									</div>
								</div>
							</div>-->
							
						</div>
	<!--boxes end bulk start-->
					<div class="row">
<!--Relocation for CommandCenter-->
							<!--<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 context_block">
								<div class="panel panel-primary">
									<div class="panel-heading bg-tcs-active"><a title="Burj Khalifa(Q Buildup MRI)" target="_blank" href="IG_heat/buildup_gapplot.php?dqp=ALL&region=online&date=<?php echo date("Y-m-d",strtotime($crdate)); ?>" style="float:left;text-decoration:none;"><i style="color:white;" class="fa fa-rss"></i></a>
										<span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("bncr0004_pace_8app.txt",".");?></span>
										System Context Block
									</div>
									<div class="panel-body table-responsive" style="">
										<table class="table table-bordered table-striped">
											<thead>
												<tr>
													<th>Context Block Fields</th>
													<th>M</th>
													<th>S1</th>
													<th>S2</th>
													<th>S3</th>
													<th>S4</th>
													<th>S5</th>
													<th>S6</th>
													<th>S7</th>
													<th>S8</th>
												</tr>
											</thead>
											<tbody>
											<?php
													$yummy->sys_utl6();
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>-->
<!--Relocation for CommandCenter-->
						<!--<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
							<div class="panel panel-primary">
								<div class="panel-heading bg-tcs-active"><a title="Burj Khalifa(Q Buildup MRI)" target="_blank" href="IG_heat/buildup_gapplot.php?dqp=ALL&region=online&date=<?php echo date("Y-m-d",strtotime($crdate)); ?>" style="float:left;text-decoration:none;"><i style="color:white;" class="fa fa-rss"></i></a>
									<span style="float:right;font-size:18px;"><i class="fa fa-fw fa-clock-o"></i><?php echo $yummy->timeUpdated("B24_TXN_DT_app1.txt",".");?></span>
									T-TXN/D-TXN Count
								</div>
								<div class="panel-body table-responsive">
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
												<th class="text-center">Name</th>
												<th class="text-center">M</th>
												<th class="text-center">S1</th>
												<th class="text-center">S2</th>
												<th class="text-center">S3</th>
												<th class="text-center">S4</th>
												<th class="text-center">S5</th>
												<th class="text-center">S6</th>
												<th class="text-center">S7</th>
												<th class="text-center">S8</th>
												<th class="text-center">S9</th>
												<th class="text-center">S10</th>
												<th class="text-center">S11</th>
												
											</tr>
										</thead>
										<tbody>
										<?php
											//echo msl::trns_dr_count();
										?>
										</tbody>
									</table>
								</div>
							</div>
						</div>-->
						
					</div>
					<div class="row">
						<!--<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
						  <div class="panel panel-primary">
								<div class="panel-heading bg-tcs-active disabled ">
									<span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("hung_8apps.txt",".");?></span>
									Hung Replicas
								</div>
							 <div class="panel-body table-responsive" style="max-height:200px;">
								<table class="table table-bordered table-striped text-center" >
									<thead>
										<tr>
											<th>Server</th>
											<th>Time</th>
											<th>Replica</th>
											<th>Last Modified</th>
											<th>PID</th>
											<th>Txn</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$yummy->sys_utl4();
										?>
									</tbody>
								</table>
							</div>
						  </div>
						</div>
						<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 clog_failure">
							<div class="panel panel-primary">
								<div class="panel-heading bg-tcs-active">
									AUTOSYS CLOG FAILURE
									<span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("clog_details.txt",".");?></span>
								</div>
								<div class="panel-body table-responsive table-autoscroll" style="max-height: 410px !important;">
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
												<th class="text-center">Job Name</th>
												<th class="text-center">Start Date</th>
												<th class="text-center">End Date</th>
												<th class="text-center">STATUS/EVENT</th>
												<th class="text-center bg-red-active">EXITCODE</th>
											</tr>
										</thead>
										<tbody>
										<?php
												$trickelfeed->clog_details();
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>-->
<!--Commenting for CommandCenter-->
						<!--<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 shared_memory">
							<div class="panel panel-primary">
								<div class="panel-heading bg-tcs-active">
									Shared Memory
									<span style="float:right;font-size:18px;"><img src="loading-bubbles.svg"><?php echo $yummy->timeUpdated("shared_mem.txt",".");?></span>
								</div>
								<div class="panel-body table-responsive" style="max-height:200px;">
									<table class="table table-bordered table-striped" style="overflow-x:auto;">
										<tbody>
										<?php
											$trickelfeed->shared_mem('shared_mem');
										?>
										</tbody>
									</table>
								</div>
							</div>
						</div>-->
<!--Commenting for CommandCenter-->
					</div>
					<div class="row">
<!--Relocation for CommandCenter-->
						<!--<div class="col-md-6">
									<div class="panel panel-primary">
										<div class="panel-heading bg-tcs-active">
											<span style="float:right;font-size:18px;"><?php echo $yummy->timeUpdated("SBI_autosys_space_utilization.txt",".");?></span>
											RTGS Pending Files
										</div>
										<div class="panel-body table-responsive">
											<table class="table table-bordered table-striped">
												<thead>
													<tr>
														<th class="text-center">File</th>
														<th class="text-center">M</th>
														<th class="text-center">S1</th>
														<th class="text-center">S2</th>
														<th class="text-center">S3</th>
														<th class="text-center">S4</th>
														<th class="text-center">S5</th>
														<th class="text-center">S6</th>
														<th class="text-center">S7</th>
														<th class="text-center">S8</th>
														<th class="text-center">S9</th>
														<th class="text-center">S10</th>
														<th class="text-center">S11</th>
													</tr>
												</thead>
												<tbody>
												<?php
													echo msl::rtgs_pending_files();
												?>
												</tbody>
											</table>
										</div>
									</div>
					</div>-->
<!--Relocation for CommandCenter-->
					<!-- All tables End-->
				</div>
			</div>
		</div>
	</div>
</section>
