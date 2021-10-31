<?php 
session_start();
require_once 'classes/product.class.php';
$subCategories = Product::getSubCategories();
?>



<!DOCTYPE html>
<html>
<head>
<title>ראשי</title>
<meta name="keywords" content="" />
<?php require_once 'parts/head_tags.php'; ?>
</head>
<body> 
<!--header-->
	<div class="container">
		<?php require_once 'parts/header.php'; ?>
		<div class="page" style="direction: rtl;">
			<h6><a href="index.php">ראשי</a><b>&#9668;</b><span style="color: #4cb1ca;  text-decoration: none;  font-weight: 800;">קטגוריות</span></h6>
		</div>
		<div class="content">

			<div class="col-md-10" style="direction: rtl;">
				<div class="content-bottom">
					<h3 style="padding: 0px; text-align: center; font-size: 34px;    background-color: #f5f5f5;">קטגוריות</h3>
					<div class="bottom-grid">
					
							<div id="content" style="height: 2500px;">
										<br />
										<div style="min-height: 700px;">
										
											<div style="text-align: center;float: right;margin-right: 233px;  margin-bottom: 30px;">
												<h1 class="infoPagesTitle">הורדות</h1>	
											</div>
											
							
							
											<div style="width: 100%; clear: both;">
												<div id="softwares" class="infoPagesTitle" style="float: right;margin-right: 10px;padding: 2px;text-align: center;border-radius: 5px;"> תוכנות</div>
												<div id="drivers" class="infoPagesTitle" style="float: right;margin-right: 10px;padding: 2px;text-align: center;border-radius: 5px;">דרייברים</div>
												<div id="apps" class="infoPagesTitle" style="float: right;margin-right: 10px;padding: 2px;text-align: center;border-radius: 5px;">אפליקציות</div>
												<div id="installationGuid" class="infoPagesTitle" style="float: right;margin-right: 10px;padding: 2px;text-align: center;border-radius: 5px;">מדריכי התקנה</div>	
											</div>
											
											<div id="getContent" style="width: 100%; clear: both;">
											
											<div id="driversContent" style="width: 100%; clear: both; display: none;">
												<div style="padding: 30px;">
													<a href="https://drive.google.com/file/d/0B6ZTaDZJZ1ysLXZJRTNIOXhNNXM/view?usp=sharing" target=" target="_blank">דרייבר לפירמוט כונן Samsung 2.5In M3 למערכת הפעלה Mac OS X</a>
													<br /><br />
													<a href="https://www.migvanhome.co.il/info/20265_Driver_for_Mac_OS.zip" target="_blank">דרייבר Mac OS למפצל USB עם רשת Ugreen דגם 20265</a>
													<br /><br />
                          <a href="https://www.migvanhome.co.il/info/20265_Driver_for_Linux_OS.zip" target="_blank">דרייבר Linux OS למפצל USB עם רשת Ugreen דגם 20265</a>
                         	<br /><br />
                          <a href="https://www.migvanhome.co.il/info/Ugreen-20267-AX88772A-Linux.zip" target="_blank">דרייבר Linux OS למפצל USB עם רשת Ugreen דגם 20264/6/7/6</a>
													<br /><br />
													<a href="https://www.migvanhome.co.il/info/Ugreen-20267-AX88772A-Windows-10.zip" target="_blank">דרייבר Win 10 למפצל USB עם רשת Ugreen דגם 20264/6/7</a>
													<br /><br />
                          <a href="https://www.migvanhome.co.il/info/Driver_for_TL-WA701ND.zip" target="_blank">דרייבר לנקודת גישה TP-Link דגם TL-WA701ND</a>
													<br /><br />
							
												</div>	
											</div>					
											
											<div id="softwereContent" style="width: 100%; clear: both;">
												<div style="padding: 30px;">
													<a href="http://freedownload.co.il/downloads.php?sid=25" target="_blank">תוכנת צריבה Ashampoo burning  להורדה</a>
													<br /><br /> 
													SanDisk Secure Accesess להורדה <a href="http://downloads.sandisk.com/downloads/SanDiskSecureAccessV3_win.exe" target="_blank"> Windows </a> / <a href="http://downloads.sandisk.com/downloads/SanDiskSecureAccessV3_mac.pkg" target="_blank"> Mac OS </a>
													<br /><br />
													תוכנת Kodi v18.1 להורדה למערכת הפעלה <a href="http://mirrors.kodi.tv/releases/windows/win64/kodi-18.1-Leia-x64.exe" target="_blank"> Windows 64bit </a> / <a href="http://mirrors.kodi.tv/releases/osx/x86_64/kodi-18.1-Leia-x86_64.dmg" x86_64target="_blank"> Mac OS </a>
													<br /><br />
												</div>	
											</div>		
											
											<div id="appsContent" style="width: 100%; clear: both;display: none;">
												<div style="padding: 30px;">
													אפליקציית Kodi v16.1 להורדה למערכת הפעלה <a href="https://play.google.com/store/apps/details?id=org.xbmc.kodi" target="_blank"> Android </a>
													<br /><br />
												</div>	
											</div>					
											
											<div id="installationGuidContent" style="width: 100%; clear: both;display: none;">
												<div style="padding: 30px;">
													<a href="https://www.migvanhome.co.il/info/TP-Link.Router.3G.Portable.MR3020.3040.pdf" target="_blank">נתב אלחוטי/סלולארי TP-Link דגם MR3020, MR3040</a>
													<br /><br />
													<a href="https://www.migvanhome.co.il/info/TP-Link.Router.TD-W8960ND.pdf" target="_blank">נתב אלחוטי TP-Link דגם TD-W8960ND</a>
													<br /><br />
													<a href="https://www.migvanhome.co.il/info/TP-Link.Router.TD-W8961.8951ND.pdf" target="_blank">נתב אלחוטי TP-Link דגם TD-W8951/8961ND</a>
													<br /><br />
													<a href="https://www.migvanhome.co.il/info/TP-Link.Router.WD3600.3500.4300.pdf" target="_blank">נתב אלחוטי TP-Link דגם WDR3500/3600, TL-WDR4300</a>
													<br /><br />
													<a href="https://www.migvanhome.co.il/info/TP-Link.Router.Nano.WR702N.pdf" target="_blank">נתב אלחוטי מיני TP-Link דגם WR702N</a>
													<br /><br />
													<a href="https://www.migvanhome.co.il/info/TP-Link.Access.Point.WA701.801.901ND.WA730.830RE.pdf" target="_blank">אקסס פויינט TP-Link דגם WA701/801/901ND, WA730/830RE</a>
													<br /><br />
													<a href="https://www.migvanhome.co.il/info/TP-Link.Wireless.NetworkN.Card.PCI.pdf" target="_blank">כרטיס רשת אלחוטי TP-Link pci דגם WN781/951N, WN881ND, WDR4800</a>
													<br /><br />
													<a href="https://www.migvanhome.co.il/info/TP-Link.Wireless.NetworkN.Card.USB.pdf" target="_blank">כרטיס רשת אלחוטי TP-Link usb דגם WN721/2/3/5N, WN821/2/3N, WDN3200</a>
													<br /><br />
													<a href="https://www.migvanhome.co.il/info/installation_guide_for_MB451_471_491.pdf" target="_blank">מדפסת OKI דגם MB441/451/461/471/491</a>
													<br /><br />
													<a href="https://www.migvanhome.co.il/info/installation_guide_for_OKI_B401_B411_B431.pdf" target="_blank">מדפסת OKI דגם B401/411/431 D/DN</a>
													<br /><br />
													<a href="https://www.migvanhome.co.il/info/installation_guide_for_MC362_MC562.pdf" target="_blank">מדפסת OKI דגם MC362/562</a>
													<br /><br />
													<a href="https://www.migvanhome.co.il/info/installation_guide_for_C301_C321_C511_C531.pdf" target="_blank">מדפסת OKI דגם C301/321/331/511/531</a>
													<br /><br />
													<a href="https://www.migvanhome.co.il/info/OperatingInstructionsForPicunT2.php" target="_blank">מדריך הפעלה לאוזניית בלוטוס Picun דגם T2</a>
													<br /><br />
												</div>
											</div>		
											
											
											</div>
										</div>
									</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>

			<?php require_once 'parts/sidebar.php'; ?>
			<div class="clearfix"> </div>
		</div>
	
		<?php require_once 'parts/footer.php'; ?>
	 </div>
	<script type="text/javascript">

		$(".infoPagesTitle").click(function(){
	
			var id = $(this).attr("id");
	
			$("#softwereContent").hide();
			$("#driversContent").hide();
			$("#installationGuidContent").hide();
			$("#appsContent").hide();
			
			if(id=='softwares'){
				
				$("#softwereContent").show("slow");
				
			}else if(id=='drivers'){
				
				$("#driversContent").show("slow");
				
			}else if(id=='installationGuid'){
				
				$("#installationGuidContent").show("slow");
				
			}else if(id=='apps'){
				
				$("#appsContent").show("slow");
				
			}else{
				
			}

		});
	</script>		
</body>
</html>




