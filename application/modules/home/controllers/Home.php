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

        // get home page settings from the admin.
        $home_details = $this->Custom_model->fetch_data(HOME_PAGE_SETTINGS,
            array('*' , HOME_PAGE_SETTINGS_LANG.'.*'),
            array(),
            array(HOME_PAGE_SETTINGS_LANG => HOME_PAGE_SETTINGS_LANG.'.home_page_id='.HOME_PAGE_SETTINGS.'.id  AND '.HOME_PAGE_SETTINGS.'.id =1 AND '. HOME_PAGE_SETTINGS_LANG.'.language_id='.$selected_lang . '|left')
        );

        $data['home_page_data'] = $home_details[0];//echo '<pre>';print_r($data['home_page_details']);die;

        /* get and make them seperated medias for home page. */
        $medias = $data['home_page_data']->library_media.','.$data['home_page_data']->partner_media.','.$data['home_page_data']->ajmj_media ;
        $homepage_medias = $this->Custom_model->fetch_data(TBL_MEDIA, array(TBL_MEDIA.'.id',TBL_MEDIA.'.url',TBL_MEDIA.'.media_name',TBL_MEDIA.'.raw_name'),array(TBL_MEDIA.'.id'=>$medias));

        $data['partner_medias'] = array();
        if($data['home_page_data']->partner_media != ''){
            $partner_medias = explode(',', $data['home_page_data']->partner_media);
            foreach($partner_medias as $media){
                foreach($homepage_medias as $pmedia){
                    if($pmedia->id == $media){
                        $data['partner_medias'][$pmedia->raw_name] = $pmedia->url.'/'.$pmedia->media_name;
                    }
                }
            }
        }

        $data['ajmj_medias'] = array();
        if($data['home_page_data']->ajmj_media != ''){
            $ajmj_medias = explode(',', $data['home_page_data']->ajmj_media);
            foreach($ajmj_medias as $media){
                foreach($homepage_medias as $amedia){ //echo $pmedia->id.'.'.$media;
                    if($amedia->id == $media){
                        $data['ajmj_medias'][] = $amedia->url.'/'.$amedia->media_name;
                    }
                }
            }
        }

        $data['library_medias'] = array();
        if($data['home_page_data']->library_media != '' || $data['home_page_data']->library_videos != ''){
            if($data['home_page_data']->library_media != ''){
                $library_medias = explode(',', $data['home_page_data']->library_media);
                foreach($library_medias as $media){
                    foreach($homepage_medias as $lmedia){
                        if($lmedia->id == $media){
                            $data['library_medias'][] = $lmedia->url.'/'.$lmedia->media_name;
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

        $data['page_footer'] = $this->footer(); //print_r($data['page_footer']);die;

        $partials = array('content' => 'home_content','banner'=>'home_banner');
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

       $partials = array('content' => 'wellness_concepts','banner'=>'home_banner','why_travel_with_us'=>'why_travel_with_us');
       $this->template->load('home_template', $partials,$data);
  }
  function wellness_destinations(){
       $continents =$this->Custom_model->fetch_data(CONTINENT,array('*'),array(),array());
       $data['continents'] = $continents;
       $data['page_footer'] = $this->footer();
       $partials = array('content' => 'wellness_destinations','banner'=>'home_banner','why_travel_with_us'=>'why_travel_with_us');
       $this->template->load('home_template', $partials,$data);
  }
  function wellness_programs(){
       $language =1;
       $programs = $this->Custom_model->fetch_data(WELLNESS_PROGRAM,
               array(
                   WELLNESS_PROGRAM.'.*',
                   WELLNESS_PROGRAM_LANG.'.program_name',
                   WELLNESS_PROGRAM_LANG.'.short_description'
                   ),
               array(WELLNESS_PROGRAM.'.wellness_type_id'=>1),
               array(WELLNESS_PROGRAM_LANG=>WELLNESS_PROGRAM_LANG.'.wellness_program_id='.WELLNESS_PROGRAM.'.id AND '.WELLNESS_PROGRAM_LANG.'.language_id='.$language));


       $data['programs']=$programs;
       $data['page_footer'] = $this->footer();
       $partials = array('content' => 'wellness_programs','banner'=>'home_banner','why_travel_with_us'=>'why_travel_with_us');
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
       $partials = array('content' => 'wellness_programs_day','banner'=>'home_banner','why_travel_with_us'=>'why_travel_with_us');
       $this->template->load('home_template', $partials,$data);
  }

}
