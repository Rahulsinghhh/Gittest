
<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>
<link href="https://fonts.googleapis.com/css?family=Heebo:500,800,900|Lato:400,400i,700" rel="stylesheet">
<style>
body{
  -webkit-font-smoothing: antialiased;
}
</style>
<div id="page">
  <?php include 'header.tpl.php';?>
  <?php if($page['header']) : ?>
    <div id="header-block">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <?php print render($page['header']); ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

    <div id="banner-complaint" class="banner">
    <div class="container">
        <h1>Making a Complaint</h1>
    </div>
  </div><!-- banner -->

  <section class="complaint">
    <div class="container">
      <div class="make-complaint">
		
		<h3>Do you have a question, concern or complaint about a health care worker or service? </h3>
		<h4>Are you unsure what your health rights and responsibilities are?</h4>
		<div class="full-col m-top-50 d-view">
			<div class="halfcol">
				<div class="personicon">
					<img src="/sites/all/themes/nexus/images/person-icon.png" alt="" />
				</div>
				<div class="col-bg">
					<?php

					 $page_content=$page['content']['system_main']['nodes']['1114']['body']['#object'];
           $how_to_complaint=$page_content->field_how_to_make_a_complaint['und'][0]['value'];
					 echo $how_to_complaint;

           
					?> 
				</div>
				<div class="col-bg1">
					<p>They are a free, fair and confidential service and all health care complaints are taken seriously and treated respectfully.</p>
				</div>
			</div><!---/.halfcol-->
			<div class="halfcol mar-top-100">
				<div class="personicon">
					<img src="/sites/all/themes/nexus/images/qstn-icon.png" alt="" />
				</div>
				<div class="col-bg2">
					<p>Please visit our <a href="/faq#complaint"> FAQ </a> page for more information on:</p>
					<?php

					      $page_content=$page['content']['system_main']['nodes']['1114']['body']['#object'];
                $main_content=$page_content->body;
                $page_title=$page_content->title;
                $main_content_data=$page_content->body['und'][0]['value'];
					     echo $main_content_data;

               $page_content_english=$page['content']['system_main']['nodes']['6']['body']['#object'];
              $national_code = new EntityFieldQuery();
              $national_code->entityCondition('entity_type', 'node')
                               ->entityCondition('bundle', 'national_code')
                               ->propertyCondition('status', NODE_PUBLISHED);
                             
              $result_national = $national_code->execute();
              if(isset($result_national['node']))
              {
                $result_national = node_load_multiple(array_keys($result_national['node']));
              }
              foreach($result_national as &$national_data)
              {
                $easy_english_documnt=$national_data->field_easy_english_document['und'][0]['filename'];
              }
  
					?> 
				</div>
				<div class="col-bg3 mar-top-60">
				    <a href="/sites/default/files/<?php echo $easy_english_documnt ?>" class="download-code-1" target="_blank">
					<div class="personicon1">
						<img src="/sites/all/themes/nexus/images/icon-1.png" alt="" />
					</div>
					<h4>DOWNLOAD THE EASY ENGLISH VERSION</h4>
					</a>
				</div>
			</div><!---/.halfcol-->
		</div>
		
		<div class="full-col m-view">
			<div class="halfcol mar-top-60 mar-b-80">
				<div class="personicon">
					<img src="/sites/all/themes/nexus/images/qstn-icon.png" alt="" />
				</div>
				<div class="col-bg2">
					<p>Please visit our FAQ page for more information on:</p>
					<?php

					 $page_content=$page['content']['system_main']['nodes']['1114']['body']['#object'];
           $main_content=$page_content->body;
           $page_title=$page_content->title;
           $main_content_data=$page_content->body['und'][0]['value'];
					 echo $main_content_data;

              $page_content_english=$page['content']['system_main']['nodes']['6']['body']['#object'];
              $national_code = new EntityFieldQuery();
              $national_code->entityCondition('entity_type', 'node')
                               ->entityCondition('bundle', 'national_code')
                               ->propertyCondition('status', NODE_PUBLISHED);
                             
              $result_national = $national_code->execute();
              if(isset($result_national['node']))
              {
                $result_national = node_load_multiple(array_keys($result_national['node']));
              }
              foreach($result_national as &$national_data)
              {
                $easy_english_documnt=$national_data->field_easy_english_document['und'][0]['filename'];
              }
					?> 
                      
          
				</div>
				<div class="col-bg3 mar-top-60">
				   <a href="/sites/default/files/<?php echo $easy_english_documnt ?>" class="download-code-1" target="_blank">
					<div class="personicon1">
						<img src="/sites/all/themes/nexus/images/icon-1.png" alt="" />
					</div>
					<h4>Download the Easy English version</h4>
					</a>
				</div>
			</div>
			<div class="halfcol">
				<div class="personicon">
					<img src="/sites/all/themes/nexus/images/person-icon.png" alt="" />
				</div>
				<div class="col-bg">
					<?php

					 $page_content=$page['content']['system_main']['nodes']['1114']['body']['#object'];
           $how_to_complaint=$page_content->field_how_to_make_a_complaint['und'][0]['value'];
					 echo $how_to_complaint;
					 
					?> 
				</div>
				<div class="col-bg1">
					<p>They are a free, fair and confidential service and all health care complaints are taken seriously and treated respectfully.</p>
				</div>
			</div><!---/.halfcol-->
		</div>
      </div>
      </div>
	  
	  <div class="container mar-top-25 cont">
      <h5 class="question-heading">SELECT STATE OR TERRITORY</h5>
	  <div class="accordion-show"><a href="javascript:;" show="1" class="show-all">Show All</a></div>
      <div class="dekstopview">
      
      <div class="question-step-2">
        <?php
           
          $page_content=$page['content']['system_main']['nodes']['1114']['body']['#object'];
          $state_desctiption=$page_content->field_state_details;
          $interpreting_service_nt_phone=$page_content->field_interpreting_nt_phone['und'][0]['value'];
          $field_interpreting_tis_phone=$page_content->field_interpreting_tis_phone['und'][0]['value'];
         
          $complain_detils="";
          if(count($state_desctiption['und'])>0){

              foreach ($state_desctiption['und'] as &$value1) 
              {
                 
                $field_state_name_used= $value1['field_state_name_used']['und'][0]['value'];
                $field_complain_number= $value1['field_complain_number']['und'][0]['value'];
                $field_home_location= $value1['field_home_location']['und'][0]['value'];
                $field_globe_location= $value1['field_globe_location']['und'][0]['value'];
                $field_email= $value1['field_email']['und'][0]['value'];
                $field_phone_number= $value1['field_phone_number']['und'][0]['value'];
                $field_fax_number= $value1['field_fax_number']['und'][0]['value'];
                $fax_style='';

                if($field_fax_number=='0000 000 000'){
               
                  $fax_style='display:none';

                }else if($field_fax_number==''){

                  $fax_style='display:none'; 

                }else{

                  $fax_style='display:block';  
                }
        				$stateColor='';
        				$stateImage='';
                $titleColor='';
                $stateColor1="";
        				if($field_state_name_used=='act'){
        					
        					  $stateColor="#0dacb4";
                    $stateColor1="#0dacb5";
        				    $stateImage='act.png';
                   
        					
        				}else if($field_state_name_used=='vic'){

        					  $stateColor="#114f6d";
                    $stateColor1="#114f6e";
        				    $stateImage='vic.png';
        					 
        				}else if($field_state_name_used=='qld'){
        					
        					  $stateColor='#5dc1ed';
                    $stateColor1='#5dc1ee';
        				    $stateImage='qld.png';
        					
        				}else if($field_state_name_used=='tas'){
        					
        					 $stateColor='#fa6401';
                   $stateColor1="#fa6400";
        				   $stateImage='tas.png';
        					
        				}else if($field_state_name_used=='sa'){
        					
        					  $stateColor='#0dacb4';
                    $stateColor1="#0dacb5";
        				    $stateImage='sa.png';
        					  
        				}else if($field_state_name_used=='wa'){
        					
        					 $stateColor='#5dc1ed';
                   $stateColor1="#5dc1ee";
        				   $stateImage='wa.png';
        					
        				}else if($field_state_name_used=='nsw'){
        					
        					  $stateColor='#5dc1ed';
                    $stateColor1="#5dc1ee";
        				    $stateImage='nsw.png';
        					  
        				}else if($field_state_name_used=='nt'){
        					
        					$stateColor='#114f6d';
                  $stateColor1="#114f6e";
        				  $stateImage='nt.png';
        					
        				}else if($field_state_name_used=='ts'){
        					
        					$stateColor1='#fa6400';
        					
        				}
				        
                if($field_state_name_used=='ts'){

                    $complain_detils.='<div style="background:'.$stateColor1.'" class="complaint-col-3 active"></img><h5 style="text-align:center">'.$field_complain_number.'</h5> <div class="aqua complaint-hover"> <h5 style="color:'.$stateColor1.'">'.$field_complain_number.'</h5> <ul> <li><a href="#" class="c-icon-home">'.$field_home_location.'</a></li><li class="state_link" state_link_name="http://'.$field_globe_location.'"><a style="color:#357ae8" href="javascript:;" target="_blank" class="c-icon-relay-service">'.$field_globe_location.'</a></li><li><a href="#" class="c-icon-phone">'.$field_interpreting_tis_phone.'</a></li> <li><a href="#" class="c-icon-phone">'.$field_email.'</a></li> <li><a href="#" class="c-icon-phone">'.$field_phone_number.'</a></li><li><a href="#" class="c-icon-phone">'.$interpreting_service_nt_phone.'</a></li> <li><a href="#" class="c-icon-phone">'.$field_fax_number.'</a></li> </ul><a href="#" class="close-btn"><img src="/sites/all/themes/nexus/images/c-icon-close.png" alt="Close" /></a> </div> </div>'; 

                }else{

                    if($field_state_name_used=='act'){
                      
                        $complain_detils.='<div style="background:'.$stateColor1.'" class="complaint-col-3 active_data"><span><img src="/sites/all/themes/nexus/images/'.$stateImage.'" alt=""></span> <h5>'.$field_state_name_used.'</h5> <div class="aqua complaint-hover"> <h5 style="color:'.$stateColor1.'">'.$field_complain_number.'</h5> <ul> <li><a href="#" class="c-icon-home">'.$field_home_location.'</a></li> <li class="state_link" state_link_name="http://'.$field_globe_location.'"><a style="color:#357ae8" href="javascript:;" target="_blank" class="c-icon-globe">'.$field_globe_location.'</a></li> <li><a href="#" class="c-icon-mail">'.$field_email.'</a></li> <li><a href="#" class="c-icon-phone">'.$field_phone_number.'</a></li> <li style="'.$fax_style.'"><a href="#" class="c-phone"><span class="ph-tty">TTY</span>'.$field_fax_number.'</a></li> </ul> <a href="#" class="close-btn"><img src="/sites/all/themes/nexus/images/c-icon-close.png" alt="Close" /></a> </div> </div>';

                    }else{

                        $complain_detils.='<div style="background:'.$stateColor1.'" class="complaint-col-3 active_data"><span><img src="/sites/all/themes/nexus/images/'.$stateImage.'" alt=""></span> <h5>'.$field_state_name_used.'</h5> <div class="aqua complaint-hover"> <h5 style="color:'.$stateColor1.'">'.$field_complain_number.' '.'('.$field_state_name_used.')</h5> <ul> <li><a href="#" class="c-icon-home">'.$field_home_location.'</a></li> <li class="state_link" state_link_name="http://'.$field_globe_location.'"><a style="color:#357ae8" href="javascript:;" target="_blank" class="c-icon-globe">'.$field_globe_location.'</a></li> <li><a href="#" class="c-icon-mail">'.$field_email.'</a></li> <li><a href="#" class="c-icon-phone">'.$field_phone_number.'</a></li> <li style="'.$fax_style.'"><a href="#" class="c-phone"><span class="ph-tty">TTY</span>'.$field_fax_number.'</a></li> </ul> <a href="#" class="close-btn"><img src="/sites/all/themes/nexus/images/c-icon-close.png" alt="Close" /></a> </div> </div>';
                    }
                   
                }
              

              }    
          }
           
            echo $complain_detils;
        ?> 
  
      </div>
      </div><!---/.dekstopview-->
	  <div class="mobileview">
        <div class="accordion-show"><a href="#" class="show-all">Show all</a></div>
			 <div class="accordion-table">
          
       <!-- get the data from db for mobile view -->
        <?php
           
          $page_content=$page['content']['system_main']['nodes']['1114']['body']['#object'];
          $state_desctiption=$page_content->field_state_details;
           $interpreting_service_nt_phone=$page_content->field_interpreting_nt_phone['und'][0]['value'];
           $field_interpreting_tis_phone=$page_content->field_interpreting_tis_phone['und'][0]['value'];
          $mobile_complain="";
          if(count($state_desctiption['und'])>0){

              foreach ($state_desctiption['und'] as &$value_mobile) 
              {
                 
                $field_state_name_used= $value_mobile['field_state_name_used']['und'][0]['value'];
                $field_complain_number= $value_mobile['field_complain_number']['und'][0]['value'];
                $field_home_location= $value_mobile['field_home_location']['und'][0]['value'];
                $field_globe_location= $value_mobile['field_globe_location']['und'][0]['value'];
                $field_email= $value_mobile['field_email']['und'][0]['value'];
                $field_phone_number= $value_mobile['field_phone_number']['und'][0]['value'];
                $field_fax_number= $value_mobile['field_fax_number']['und'][0]['value'];
                $stateClass='';
                $stateImage='';
                $titleColor='';
                if($field_state_name_used=='act'){
                  
                    $stateClass='actbg';
                    $stateImage='act.png';
                    $titleColor='#0dacb5';
                  
                }else if($field_state_name_used=='vic'){
                    $stateClass='vicbg';
                    $stateImage='vic.png';
                    $titleColor='#114f6e';
                }else if($field_state_name_used=='qld'){
                  
                    $stateClass='qldbg';
                    $stateImage='qld.png';
                    $titleColor='#5dc1ee';
                }else if($field_state_name_used=='tas'){
                  
                    $stateClass='tasbg';
                    $stateImage='tas.png';
                    $titleColor='#fa6400';
                }else if($field_state_name_used=='sa'){
                  
                    $stateClass='sabg';
                    $stateImage='sa.png';
                    $titleColor='#0dacb5';
                }else if($field_state_name_used=='wa'){
                  
                    $stateClass='wabg';
                    $stateImage='wa.png';
                    $titleColor='#5dc1ee';
                }else if($field_state_name_used=='nsw'){
                  
                    $stateClass='nswbg';
                    $stateImage='nsw.png';
                    $titleColor='#5dc1ee';
                }else if($field_state_name_used=='nt'){
                  
                    $stateClass='ntbg';
                    $stateImage='nt.png';
                    $titleColor='#114f6e'; 
                }else if($field_state_name_used=='ts'){
                  
                  $stateClass='tsbg';
                  $titleColor='#fa6400'; 
                }
                 
                    if($field_state_name_used=='ts'){

                         $mobile_complain.='<div class="orders-data '.$stateClass.'"><span class="make-col-1">Interpreting Services</span><span class="make-col-2"></span></div><div class="data-content"><div class="data-row"><h5 style="color:'.$titleColor.'">'.$field_complain_number.'</h5><ul> <li><a href="#" class="c-icon-home">'.$field_home_location.'</a></li> <li class="state_link" state_link_name="http://'.$field_globe_location.'"><a style="color:#357ae8" href="#" class="c-icon-relay-service">'.$field_globe_location.'</a></li><li><a href="#" class="c-icon-phone">'.$field_interpreting_tis_phone.'</a></li><li><a href="#" class="c-icon-phone">'.$field_email.'</a></li><li><a href="#" class="c-icon-phone">'.$field_phone_number.'</a></li><li><a href="#" class="c-icon-phone">'.$interpreting_service_nt_phone.'</a></li> <li><a href="#" class="c-icon-phone">'.$field_fax_number.'</a></li></ul></div></div>';
                    }else{
                         
                        if($field_state_name_used=='act'){

                           $mobile_complain.='<div class="orders-data '.$stateClass.'"><span class="make-col-1">'.$field_state_name_used.'</span><span class="make-col-2"></span></div><div class="data-content"><div class="data-row"><h5 style="color:'.$titleColor.'">'.$field_complain_number.'</h5><ul> <li><a href="#" class="c-icon-home">'.$field_home_location.'</a></li> <li><a href="#" class="c-icon-globe">'.$field_globe_location.'</a></li><li class="state_link" state_link_name="http://'.$field_globe_location.'"><a style="color:#357ae8" href="#" class="c-icon-mail">'.$field_email.'</a></li> <li><a href="#" class="c-phone"><span class="ph-tty">TTY</span>'.$field_phone_number.'</a></li> <li><a href="#" class="c-icon-fax">'.$field_fax_number.'</a></li></ul></div></div>';
                        }else{

                            $mobile_complain.='<div class="orders-data '.$stateClass.'"><span class="make-col-1">'.$field_state_name_used.'</span><span class="make-col-2"></span></div><div class="data-content"><div class="data-row"><h5 style="color:'.$titleColor.'">'.$field_complain_number.' '.'('.$field_state_name_used.')</h5><ul> <li><a href="#" class="c-icon-home">'.$field_home_location.'</a></li> <li><a href="#" class="c-icon-globe">'.$field_globe_location.'</a></li><li class="state_link" state_link_name="http://'.$field_globe_location.'"><a style="color:#357ae8" href="#" class="c-icon-mail">'.$field_email.'</a></li> <li><a href="#" class="c-phone"><span class="ph-tty">TTY</span>'.$field_phone_number.'</a></li> <li><a href="#" class="c-icon-fax">'.$field_fax_number.'</a></li></ul></div></div>';
                        } 
                         
                    }
                   

                }
              

            }
            echo $mobile_complain;
        ?>    
        
	  </div>
    </div>
  </section>
  
  <section class="complaint-contact">
    <div class="container">
      <p>Can’t find what you’re looking for? <span><a href="#dialog" class="complaint-popup">Contact us</a></span>.</p>
    </div>
  </section>
  
  <div id="dialog" style="position:fixed !important;top:0px !important;left:0px;width:100% !important;">
    <div class="popup complaint-block">
      <h2>having trouble?</h2>
      <div class="content">
        <p>If you're having trouble with this website, please contact us by filling in the form below</p>
        
        <form class="c-form" id="contact_form" action="" method="post">
          <div class="row">
            <div class="left-col">
              <label for="first">First Name</label>
              <input id="first_name" type="text" title="First"/>
            </div>
            <div class="right-col">
              <label for="surname">Surname</label>
              <input id="surname" type="text" title="Surname"/>
            </div>
          </div>
          <div class="row">
            <div class="left-col">
              <label for="email id">Email</label>
              <input id="email" type="email" title="Email" />
            </div>
            <div class="right-col">
              <label for="phone">Phone</label>
                <input id="phone_number" type="tel" title="Phone" />
            </div>
          </div>
          <div class="row">
              <label for="comments">Comments</label>
              <textarea id="comments_message" title="Comments" ></textarea>
          </div>
          <div class="row popup_btn_submit">
              <input  type="button" id="contact_data" value="Submit" />
          </div>
        </form>
      </div>
      <div class="close_complaintbox">
         <span class="close_popup_compliant">&times;</span>
      </div>
    </div>
  </div>
  <?php include 'footer.tpl.php';?>
  </div>
</div>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
   (function ($, Drupal) {
    $("#contact_data").on('click',function(evnt){
   
      evnt.preventDefault();
      var name=$('#first_name').val();
      if(name==''){
      
        alert("Please Fill First Name.");
        return false;     
      }

      var surname=$('#surname').val();
      if(surname==''){
      
        alert("Please fill surname.");
        return false;     
      }
  
      var mobNum = $('#phone_number').val();
       /*var filter = /^\d*(?:\.\d{1,2})?$/;
       if (filter.test(mobNum)) 
       {
            if(mobNum.length!=10){
               alert('Please put 10  digit mobile number');
                return false;
             } 
         }else {
              alert('Please enter a valid mobile number');
              return false;
         } */
    
      
        var email_address=$('#email').val();
         if($.trim(email_address).length == 0){

            alert('Please enter valid email address');
            return false;
         }
        else{
      
      var filterEmail = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (filterEmail.test(email_address)){
        //return true;
        }
      else {
         alert('Please enter valid email address');
              evnt.preventDefault();
         return false;
      }
      }
    
    var message=$('#comments_message').val();
    
    if(message==''){
       alert('Please write in comments field');
       return false;
    }
        $.post("/node/64", {firstname: name,surname:surname,mobNum:mobNum,email_address:email_address,message:message},
        function(msg){
      
           $('#contact_form')[0].reset();
           alert("Sent your message sucessfully.");
           $(".popup").dialog('close');
          
        });
   

 });  

$('.show-all').on('click',function(evt){

  var gettext=$(this).text();
  var geAtrValue=$(this).attr('show');
 
  if(geAtrValue=='1'){

    $('.active_data').addClass('active');
    $(this).attr('show','0');
  }else{

     $('.active_data').removeClass('active');
     $(this).attr('show','1');
  }
});

$('.state_link').on('click',function(){

    var link_name=$(this).attr('state_link_name');
    window.open(link_name, '_blank');
});

})(jQuery, Drupal); 

</script>