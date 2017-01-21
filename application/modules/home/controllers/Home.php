<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Custom_model');
    }

    /*
     * This function used to footer value dynamically.
    */
    function footer()
    {
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;

        // get home page footer address from the admin.
        $footer_details = $this->Custom_model->fetch_data(BASIC_SETTINGS,
            array(BASIC_SETTINGS.'.site_email', BASIC_SETTINGS.'.site_contact_no' , BASIC_SETTINGS_LANG.'.site_address', BASIC_SETTINGS_LANG.'.footer_desc'),
            array(),
            array(BASIC_SETTINGS_LANG => BASIC_SETTINGS_LANG.'.settings_id='.BASIC_SETTINGS.'.id  AND '.BASIC_SETTINGS.'.id =1 AND '. BASIC_SETTINGS_LANG.'.language_id='.$selected_lang . '|left')
        );

        return $footer_details[0];//echo '<pre>';print_r($footer_details);die;
    }

    /*
     * This function is used to set landing function dynamically.
     * @author : Poorvi Gandhi
     * @since : 11th dec 2016
    */
    function index()
    {
        $data['hide_search']=true;
        $home_page_id = $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):1;
        $data['selected_lang'] = $selected_lang;

        $page_data = $this->Custom_model->get_landing_page($selected_lang);
        $data['home_page_data'] = $page_data[0][0];
        $data['welness_details'] = $page_data[1];
        $data['partner_medias'] = $page_data[2];//echo '<pre>';print_r($data);die;

        /* find library and ajmj media and create media link for home page. */
        $this->load->helper('media_helper');
        $medias = $data['home_page_data']->library_media.','.$data['home_page_data']->ajmj_media ;
        $homepage_medias = $this->Custom_model->fetch_data(TBL_MEDIA, array(TBL_MEDIA.'.id', TBL_MEDIA.'.media_name', TBL_MEDIA.'.extension', TBL_MEDIA.'.raw_name', TBL_MEDIA.'.url'),array(TBL_MEDIA.'.id'=>$medias));

        $data['ajmj_medias'] = array();
        if($data['home_page_data']->ajmj_media != ''){
            foreach($homepage_medias as $amedia){
                if($amedia->id == $data['home_page_data']->ajmj_media){
                    $media1['url'] = $amedia->url;$media1['media_name'] = $amedia->media_name;
                    $media1['raw_name'] = $amedia->raw_name;$media1['extension'] = $amedia->extension;
                    $data['ajmj_medias'] = generate_image_media_url($media1, 'ajmj');
                }
            }
        }//echo '<pre>';print_r($data['ajmj_medias']);die;

        $data['library_medias'] = array();
        if($data['home_page_data']->library_media != '' || $data['home_page_data']->library_videos != ''){
            if($data['home_page_data']->library_media != ''){
                $library_medias = explode(',', $data['home_page_data']->library_media);
                foreach($library_medias as $media){
                    foreach($homepage_medias as $lmedia){
                        if($lmedia->id == $media){
                            $media1['url'] = $lmedia->url;$media1['media_name'] = $lmedia->media_name;
                            $media1['raw_name'] = $lmedia->raw_name;$media1['extension'] = $lmedia->extension;
                            $data['library_medias'][] = generate_image_media_url($media1, 'library');
                        }
                    }
                }
            }
            if($data['home_page_data']->library_videos != ''){
                $library_videos = explode('||', $data['home_page_data']->library_videos);
                foreach($library_videos as $video){
                    $data['library_medias'][] = trim($video);
                }
            }
            //make the library media to randomly
            if(!empty($data['library_medias']) && count($data['library_medias']) > 1){
                $data['library_medias'] = $this->array_random($data['library_medias'], count($data['library_medias']));
            }
        }//echo '<pre>';print_r($data['library_medias']);die;

        $data['page_footer'] = $this->footer();

        $partials = array('content' => 'home_content','banner'=>'home_banner','menu'=>'menu');
        $this->template->load('home_template', $partials, $data);

    }

    /* function which used to make random array element.
     * $arr = array input,
     * $num = return no. of random element for array.
     * @author : Poorvi Gandhi
     */
    function array_random($arr, $num = 1)
    {
        shuffle($arr);

        $r = array();
        for ($i = 0; $i < $num; $i++) {
            $r[] = $arr[$i];
        }
        return $num == 1 ? $r[0] : $r;
    }

  function wellness_concepts(){
       $language_id = 1;
       $page_data = $this->Custom_model->get_wellness_concept_data($language_id);       
       $data['page_data'] = $page_data;
       $data['page_footer'] = $this->footer();

       $partials = array(
           'content' => 'wellness_concepts',
           'banner'=>'wellness_banner',
           'why_travel_with_us'=>'why_travel_with_us',
           'menu'=>'menu');

       $this->template->load('home_template', $partials,$data);
  }

  function wellness_plus($id=NULL){
       $id = decode_url($id);
       $data['id']=$id;
       $chk_program = $this->Custom_model->row_present_check(WELLNESS_TYPE, array('id'=>$id));
       if($chk_program==FALSE){
           redirect('home/wellness_concepts');
       }
       $data['page_footer'] = $this->footer();
       $partials = array('content' => 'wellness_plus','banner'=>'wellness_banner','why_travel_with_us'=>'why_travel_with_us','menu'=>'menu');
       $this->template->load('home_template', $partials,$data);
  }

  function best_of_best($wellnes_type=NULL,$best=NULL){
       $language_id =1;
       $wellnes_type = decode_url($wellnes_type);
       $best = decode_url($best);
       $data['wellnes_type']=$wellnes_type;
       
       $best_of_best = $this->Custom_model->fetch_data(AWARD,
               array(
                   AWARD.'.*',
                   PARTNER.'.id as partner_id',
                   PARTNER.'.partner_name',
                   PARTNER.'.short_description',
                   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name',
                   COUNTRY_LANG.'.country_name'
                   ),
               array(AWARD.'.type'=>$best),
               array(
                   AWARD_PARTNER=>AWARD_PARTNER.'.award_id='.AWARD.'.id',
                   PARTNER=>PARTNER.'.id='.AWARD_PARTNER.'.partner_id',
                   COUNTRY=>COUNTRY.'.id='.PARTNER.'.country_id',
                   COUNTRY_LANG=>COUNTRY_LANG.'.country_id='.COUNTRY.'.id AND '.COUNTRY_LANG.'.language_id='.$language_id,
                   MEDIA=>MEDIA.'.id='.PARTNER.'.media_id'));

        $data['best_of_best'] =$best_of_best;
	//echo '<pre>'; print_r($data);

       $data['page_footer'] = $this->footer();
       $partials = array('content' => 'best_of_best','banner'=>'wellness_banner','why_travel_with_us'=>'why_travel_with_us','menu'=>'menu');
       $this->template->load('home_template', $partials,$data);
  }

  function best_in_region($wellnes_type=NULL,$best=NULL){
	   $language_id =1;
       $wellnes_type = decode_url($wellnes_type);
       $best = decode_url($best);
       $data['wellnes_type']=$wellnes_type;
       $best_in_region = $this->Custom_model->fetch_data(AWARD,
               array(
                   AWARD.'.*',
                   PARTNER.'.id as partner_id',
                   PARTNER.'.partner_name',
                   PARTNER.'.short_description',
                   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name',
                   COUNTRY_LANG.'.country_name'
                   ),
               array(AWARD.'.type'=>$best),
               array(
                   AWARD_PARTNER=>AWARD_PARTNER.'.award_id='.AWARD.'.id',
                   PARTNER=>PARTNER.'.id='.AWARD_PARTNER.'.partner_id',
				   COUNTRY=>COUNTRY.'.id='.PARTNER.'.country_id',
                   COUNTRY_LANG=>COUNTRY_LANG.'.country_id='.COUNTRY.'.id AND '.COUNTRY_LANG.'.language_id='.$language_id,
                   MEDIA=>MEDIA.'.id='.PARTNER.'.media_id'));

        $data['best_in_region'] =$best_in_region;
	//echo '<pre>'; print_r($data);

       $data['page_footer'] = $this->footer();
       $partials = array('content' => 'best_in_region','banner'=>'wellness_banner','why_travel_with_us'=>'why_travel_with_us','menu'=>'menu');
       $this->template->load('home_template', $partials,$data);
  }

  function wellness_destinations(){
       $continents =$this->Custom_model->fetch_data(CONTINENT_LANG,
		   array(
					CONTINENT_LANG.'.continent_id',
					CONTINENT_LANG.'.continent',
					CONTINENT_LANG.'.short_description',
					MEDIA.'.url',
                    MEDIA.'.media_name',
                    MEDIA.'.extension',
                    MEDIA.'.raw_name'),
		   array(),
		   array(MEDIA=>MEDIA.'.id='.CONTINENT_LANG.'.media_id')
	   );
       $data['continents'] = $continents;
       $data['page_footer'] = $this->footer();
       $partials = array('content' => 'wellness_destinations','banner'=>'wellness_banner','why_travel_with_us'=>'why_travel_with_us','menu'=>'menu');
       $this->template->load('home_template', $partials,$data);
  }

  function wellness_programs($wellness_type=NULL,$partner_id=NULL){
       $partner_id = decode_url($partner_id);
       $wellness_type = decode_url($wellness_type);
       $language =1;

       $programs = $this->Custom_model->fetch_data(WELLNESS,array('DISTINCT(program_id) as program_id'),array('partner_id'=>$partner_id),array());
       $sft_pro ="";
       if(!empty($programs)){
           foreach($programs as $pro){
               $sft_pro .=$pro->program_id.',';
           }
       }
       $sft_pro = substr($sft_pro, 0,-1);

       $programs = $this->Custom_model->fetch_data(WELLNESS_PROGRAM,
               array(
                   WELLNESS_PROGRAM.'.*',
                   WELLNESS_PROGRAM_LANG.'.program_name',                   
                   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name',
                   WELLNESS_PROGRAM_LANG.'.short_description'
                   ),
               array(
                   WELLNESS_PROGRAM.'.wellness_type_id'=>$wellness_type,
                   WELLNESS_PROGRAM.'.id'=>$sft_pro,
                   ),
               array(
                   WELLNESS_PROGRAM_LANG=>WELLNESS_PROGRAM_LANG.'.wellness_program_id='.WELLNESS_PROGRAM.'.id AND '.WELLNESS_PROGRAM_LANG.'.language_id='.$language,
                   MEDIA=>MEDIA.'.id='.WELLNESS_PROGRAM_LANG.'.media_id'));


       $data['programs']=$programs;
       $data['page_footer'] = $this->footer();
       $partials = array('content' => 'wellness_programs','banner'=>'partner_banner','why_travel_with_us'=>'why_travel_with_us','menu'=>'menu');
       $this->template->load('home_template', $partials,$data);
  }
   function wellness_programs_day($program_id=NULL){
       $language =1;
       $program_id = decode_url($program_id);
       $chk_program = $this->Custom_model->row_present_check(WELLNESS_PROGRAM, array('id'=>$program_id));
       if($chk_program==FALSE){
           redirect('home/wellness_programs');
       }

       $program_day = $this->Custom_model->fetch_data(WELLNESS,
               array(
                   WELLNESS.'.*',
                   WELLNESS_LANG.'.wellness_name_lang',
                   WELLNESS_LANG.'.short_description',
                   WELLNESS_LANG.'.description',
                   WELLNESS_IMAGE.'.media_id',
                   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name'

                   ),
               array(WELLNESS.'.program_id'=>$program_id),
               array(
                   WELLNESS_LANG=>WELLNESS_LANG.'.welness_id='.WELLNESS.'.id AND '.WELLNESS_LANG.'.language_id='.$language,
                   WELLNESS_IMAGE=>WELLNESS_IMAGE.'.wellness_id='.WELLNESS.'.id AND '.WELLNESS_IMAGE.'.id=(SELECT MAX(id) FROM '.WELLNESS_IMAGE.' WHERE '.WELLNESS_IMAGE.'.wellness_id='.WELLNESS.'.id)|join',
                   MEDIA=>MEDIA.'.id='.WELLNESS_IMAGE.'.media_id'
               ));
       $data['program_day']=$program_day;
       $data['page_footer'] = $this->footer();
       $partials = array('content' => 'wellness_programs_day','banner'=>'partner_banner','why_travel_with_us'=>'why_travel_with_us','menu'=>'menu');
       $this->template->load('home_template', $partials,$data);
  }

   function wellness_program_overview($wellness_id=NULL){
       $language_id =1;
       $wellness_id = decode_url($wellness_id);
       $wellness_details = $this->Custom_model->fetch_data(WELLNESS,
               array('*'),
               array(WELLNESS.'.id'=>$wellness_id),
               array(WELLNESS_LANG=>WELLNESS_LANG.'.welness_id='.WELLNESS.'.id AND '.WELLNESS_LANG.'.language_id='.$language_id));

       $data['wellness_details'] = $wellness_details[0];



       $itinerary = $this->Custom_model->fetch_data(ITINERARY,
               array(
				   ITINERARY.'.*',
				   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name'
				   ),
               array(
                   ITINERARY.'.welness_id'=>$wellness_id,
                   ITINERARY.'.language_id'=>$language_id
               ),
               array(MEDIA=>MEDIA.'.id='.ITINERARY.'.media_id'));
       $data['itinerary'] = $itinerary;


       $programs = $this->Custom_model->fetch_data(WELLNESS,
               array('DISTINCT(program_id) as program_id'),
               array(
                   'partner_id'=>$wellness_details[0]->partner_id,
                   'program_id !='=>$wellness_details[0]->program_id
               ),
               array());
       $sft_pro ="";
       if(!empty($programs)){
           foreach($programs as $pro){
               $sft_pro .=$pro->program_id.',';
           }
       }
       $sft_pro = substr($sft_pro, 0,-1);

       $wellness_programs = $this->Custom_model->fetch_data(WELLNESS_PROGRAM,
               array(
                   WELLNESS_PROGRAM.'.*',
                   WELLNESS_PROGRAM_LANG.'.program_name',
                   WELLNESS_PROGRAM_LANG.'.short_description',
                   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name'
                   ),
               array(
                   WELLNESS_PROGRAM.'.wellness_type_id'=>$wellness_details[0]->type,
                   WELLNESS_PROGRAM.'.id'=>$sft_pro,
                   ),
               array(
                   WELLNESS_PROGRAM_LANG=>WELLNESS_PROGRAM_LANG.'.wellness_program_id='.WELLNESS_PROGRAM.'.id AND '.WELLNESS_PROGRAM_LANG.'.language_id='.$language_id,                   
                   MEDIA=>MEDIA.'.id='.WELLNESS_PROGRAM_LANG.'.media_id'
               ));


       $data['programs']=$wellness_programs;
       //$discover_program = $this->Custom_model->fetch_data();

       $data['page_footer'] = $this->footer();
       $partials = array('content' => 'wellness_program_overview','banner'=>'partner_banner','why_travel_with_us'=>'why_travel_with_us','menu'=>'menu');
       $this->template->load('home_template', $partials,$data);

   }

   function wellness_partners($continent=NULL){
	   $language_id =1;
       $continent = decode_url($continent);
       
       $details = $this->Custom_model->fetch_data(AWARD,array('*'),array('type'=>1,'id'=>$continent));
       if($language_id ==1){
           $data['partner'] = $details[0]->name_in_english;
       }if($language_id ==2){
           $data['partner'] = $details[0]->name_in_vietnamese;
       }
       
       
       //$data['continent'] = $continent;
       $partners = $this->Custom_model->fetch_data(PARTNER,
               array(
                   PARTNER.'.id',
                   PARTNER.'.partner_name',
				   PARTNER.'.short_description',
				   PARTNER.'.wellness_type_id',
				   COUNTRY_LANG.'.country_name',
				   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name'
                   ),
               array('continent_id'=>$continent),
               array(COUNTRY=>COUNTRY.'.id='.PARTNER.'.country_id',
                   COUNTRY_LANG=>COUNTRY_LANG.'.country_id='.COUNTRY.'.id AND '.COUNTRY_LANG.'.language_id='.$language_id,
				   MEDIA=>MEDIA.'.id='.PARTNER.'.media_id')
		);

        $data['partners'] = $partners;
	   //echo '<pre>'; print_r($data); exit;

       $data['page_footer'] = $this->footer();
       $partials = array('content' => 'wellness_partners','banner'=>'wellness_banner','why_travel_with_us'=>'why_travel_with_us','menu'=>'menu');
       $this->template->load('home_template', $partials,$data);
  }
  
  
  function wellness_enquery($partner_id=null){
	   $partner_id = decode_url($partner_id);
       $this->load->library('recaptcha');
	   $this->load->helper('custom_helper');
	   $data['partner_id'] = $partner_id;
	   $data['list_wellness_type'] = get_wellness_type();
	   $data['list_countries'] = get_countries();
       $data['page_footer'] = $this->footer();
       
       if(!empty($partner_id))
			$room_type = $this->Custom_model->fetch_data(ROOM,array('*'),array('partner_id'=>$partner_id),array());
	   else
		   $room_type = array();

       $data['room_type'] = $room_type;
       
       if($this->input->post('insert_enquery')){
          $this->recaptcha->recaptcha_check_answer();
          $start_name =  $this->input->post('start_name');
          $fname =  $this->input->post('fname');
          $lname =  $this->input->post('lname');
          $pnumber =  $this->input->post('pnumber');
          $countryname =  $this->input->post('countryname');
          $email =  $this->input->post('email');
          $adate =  $this->input->post('adate');
          $ddate =  $this->input->post('ddate');
          $nAdult =  $this->input->post('nAdult');
          $nchild =  $this->input->post('nchild');          
          $wellness_type =  $this->input->post('wellness_type');
          $nroom =  $this->input->post('nroom');
          $type_of_room =  $this->input->post('type_of_room');
          $comment =  $this->input->post('comment');
          
          if($fname==""){
              $this->session->set_flashdata('error_message', 'Please enter First name');
              redirect(base_url() . 'home/wellness_enquery');
          }else if($lname ==""){
              $this->session->set_flashdata('error_message', 'Please enter Last name');
              redirect(base_url() . 'home/wellness_enquery');
          }else if($pnumber ==""){
              $this->session->set_flashdata('error_message', 'Please enter Phone Number');
              redirect(base_url() . 'home/wellness_enquery');
          }else if($countryname ==""){
              $this->session->set_flashdata('error_message', 'Please enter Country name');
              redirect(base_url() . 'home/wellness_enquery');
          }else if($adate ==""){
              $this->session->set_flashdata('error_message', 'Please select Arrival Date');
              redirect(base_url() . 'home/wellness_enquery');
          }else if($ddate ==""){
              $this->session->set_flashdata('error_message', 'Please select Departure Date');
              redirect(base_url() . 'home/wellness_enquery');
          }else if($nAdult ==""){
              $this->session->set_flashdata('error_message', 'Please enter number of adult');
              redirect(base_url() . 'home/wellness_enquery');
          }else if($nchild ==""){
              $this->session->set_flashdata('error_message', 'Please enter number of Children');
              redirect(base_url() . 'home/wellness_enquery');
          }else if($wellness_type ==""){
              $this->session->set_flashdata('error_message', 'Please select wellness type');
              redirect(base_url() . 'home/wellness_enquery');
          }else if($nroom ==""){
              $this->session->set_flashdata('error_message', 'Please enter number of room');
              redirect(base_url() . 'home/wellness_enquery');
          }
		  /*else if($type_of_room ==""){
              $this->session->set_flashdata('error_message', 'Please select type of room');
              redirect(base_url() . 'home/wellness_enquery');
          }*/
		  else if(!$this->recaptcha->getIsValid()){
              $this->session->set_flashdata('error_message', 'incorrect captcha');
              redirect(base_url() . 'home/wellness_enquery');
          }else{
              $ins_data['start_name']=$start_name;
              $ins_data['first_name']=$fname;
              $ins_data['last_name']=$lname;
              $ins_data['phone_number']=$pnumber;
              $ins_data['country']=$countryname;
              $ins_data['email']=$email;
              $ins_data['arrival_date']=$adate;
              $ins_data['departure_date']=$ddate;
              $ins_data['no_of_adult']=$nAdult;
              $ins_data['number_of_child']=$nchild;
              $ins_data['wellness_type']=$wellness_type;
              $ins_data['no_of_room']=$nroom;
              $ins_data['type_of_room']=$type_of_room;
              $ins_data['comment']=$comment;
              $ins_data['enquery_date']=  date('Y-m-d');
              
              
              $res= $this->Custom_model->insert_data($ins_data, ENQUERY);
              if($res!=FALSE){
                  $this->session->set_flashdata('success_message', 'Your enquiry has been sent.');
                  redirect(base_url() . 'home/wellness_enquery');
              }else{
                  $this->session->set_flashdata('error_message', 'Please try again');
                  redirect(base_url() . 'home/wellness_enquery');
              }
          }
          
       }
        $data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
       $partials = array('content' => 'wellness_enquery','banner'=>'common_banner','why_travel_with_us'=>'why_travel_with_us','menu'=>'menu');
       $this->template->load('home_template', $partials,$data);
   }

  function ajax_get_image(){
        $room = $this->input->post('room');
       $images = $this->Custom_model->fetch_data(ROOM_IMAGE,
               array(
                   ROOM_IMAGE.'.*',
                   MEDIA.'.url',
                   MEDIA.'.media_name',
                   MEDIA.'.extension',
                   MEDIA.'.raw_name'
                   ),
               array('room_id'=>$room),
               array(MEDIA=>MEDIA.'.id='.ROOM_IMAGE.'.media_id'));
       $data['images'] = $images;
      echo  $this->load->view('ajax_get_image',$data,TRUE);
       
   }

   function download_file($file) {
	    header("Content-Type: application/octet-stream");
		//$file = $file .".pdf";
		header("Content-Disposition: attachment; filename=" . urlencode($file));   
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Description: File Transfer");            
		header("Content-Length: " . filesize('uploads/pdf/'.$file));
		flush(); // this doesn't really matter.
		$fp = fopen('uploads/pdf/'.$file, "r");
		while (!feof($fp))
		{
			echo fread($fp, 65536);
			flush(); // this is essential for large downloads
		} 
		fclose($fp);  
   }
}
