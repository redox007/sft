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
        $selected_lang = ($this->session->userdata('language'))?$this->session->userdata('language'):2;

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
       $page_data = $this->Custom_model->get_wellness_concept_data();
       $data['page_data'] = $page_data;
       $data['page_footer'] = $this->footer();

       $partials = array(
           'content' => 'wellness_concepts',
           'banner'=>'home_banner',
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
       $partials = array('content' => 'wellness_plus','banner'=>'home_banner','why_travel_with_us'=>'why_travel_with_us','menu'=>'menu');
       $this->template->load('home_template', $partials,$data);
  }

  function best_of_best($wellnes_type=NULL,$best=NULL){
       $wellnes_type = decode_url($wellnes_type);
       $best = decode_url($best);
       $data['wellnes_type']=$wellnes_type;
       $best_of_best = $this->Custom_model->fetch_data(AWARD,
               array(
                   AWARD.'.*',
                   PARTNER.'.id as partner_id',
                   PARTNER.'.partner_name'
                   ),
               array('type'=>$best),
               array(
                   AWARD_PARTNER=>AWARD_PARTNER.'.award_id='.AWARD.'.id',
                   PARTNER=>PARTNER.'.id='.AWARD_PARTNER.'.partner_id'));

        $data['best_of_best'] =$best_of_best;
	//echo '<pre>'; print_r($data);

       $data['page_footer'] = $this->footer();
       $partials = array('content' => 'best_of_best','banner'=>'home_banner','why_travel_with_us'=>'why_travel_with_us','menu'=>'menu');
       $this->template->load('home_template', $partials,$data);
  }
  function wellness_destinations(){
       $continents =$this->Custom_model->fetch_data(CONTINENT,array('*'),array(),array());
       $data['continents'] = $continents;
       $data['page_footer'] = $this->footer();
       $partials = array('content' => 'wellness_destinations','banner'=>'home_banner','why_travel_with_us'=>'why_travel_with_us','menu'=>'menu');
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
                   WELLNESS_PROGRAM_LANG.'.short_description'
                   ),
               array(
                   WELLNESS_PROGRAM.'.wellness_type_id'=>$wellness_type,
                   WELLNESS_PROGRAM.'.id'=>$sft_pro,
                   ),
               array(WELLNESS_PROGRAM_LANG=>WELLNESS_PROGRAM_LANG.'.wellness_program_id='.WELLNESS_PROGRAM.'.id AND '.WELLNESS_PROGRAM_LANG.'.language_id='.$language));


       $data['programs']=$programs;
       $data['page_footer'] = $this->footer();
       $partials = array('content' => 'wellness_programs','banner'=>'home_banner','why_travel_with_us'=>'why_travel_with_us','menu'=>'menu');
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
       $partials = array('content' => 'wellness_programs_day','banner'=>'home_banner','why_travel_with_us'=>'why_travel_with_us','menu'=>'menu');
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
               array('*'),
               array(
                   ITINERARY.'.welness_id'=>$wellness_id,
                   ITINERARY.'.language_id'=>$language_id
               ),
               array());
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
                   WELLNESS_PROGRAM_LANG.'.short_description'
                   ),
               array(
                   WELLNESS_PROGRAM.'.wellness_type_id'=>$wellness_details[0]->type,
                   WELLNESS_PROGRAM.'.id'=>$sft_pro,
                   ),
               array(WELLNESS_PROGRAM_LANG=>WELLNESS_PROGRAM_LANG.'.wellness_program_id='.WELLNESS_PROGRAM.'.id AND '.WELLNESS_PROGRAM_LANG.'.language_id='.$language_id));


       $data['programs']=$wellness_programs;
       //$discover_program = $this->Custom_model->fetch_data();

       $data['page_footer'] = $this->footer();
       $partials = array('content' => 'wellness_program_overview','banner'=>'home_banner','why_travel_with_us'=>'why_travel_with_us','menu'=>'menu');
       $this->template->load('home_template', $partials,$data);

   }

}
