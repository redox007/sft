//***** wellness concept page procedures *****/

CREATE PROCEDURE `get_wellness_concept_data`()
	LANGUAGE SQL
	NOT DETERMINISTIC
	CONTAINS SQL
	SQL SECURITY DEFINER
	COMMENT ''
BEGIN
SELECT
  sft_wellness_type.*,
  sft_media.url,
  sft_media.media_name,
  sft_media.raw_name,
  sft_media.extension
  FROM sft_wellness_type
LEFT JOIN sft_media ON sft_media.id=sft_wellness_type.wellness_image;

SELECT * FROM continent;

END

//***** end *****/

//***** home page procedures *****/

CREATE PROCEDURE `get_home_page_data`(IN `lang_id` INT)
	LANGUAGE SQL
	NOT DETERMINISTIC
	CONTAINS SQL
	SQL SECURITY DEFINER
	COMMENT ''
BEGIN

SELECT `sft_home_page_settings`.`toor_media`,`sft_home_page_settings`.`ajmj_media`,`sft_home_page_settings`.`library_media`,`sft_home_page_settings`.`library_videos`, `sft_home_page_settings_lang`.*
FROM `sft_home_page_settings`
LEFT JOIN `sft_home_page_settings_lang` ON `sft_home_page_settings_lang`.`home_page_id`=`sft_home_page_settings`.`id` AND
`sft_home_page_settings`.`id` = 1 AND `sft_home_page_settings_lang`.`language_id`=lang_id;

SELECT `sft_wellness_type`.`id`, `sft_wellness_type_lang`.`type_name`, `sft_media`.`id` as `media_id`, `sft_media`.`media_name`, `sft_media`.`extension`, `sft_media`.`raw_name`, `sft_media`.`url`
FROM `sft_wellness_type`
LEFT JOIN `sft_wellness_type_lang` ON `sft_wellness_type_lang`.`wellness_type_id`=`sft_wellness_type`.`id` AND `sft_wellness_type_lang`.`language_id`=lang_id
LEFT JOIN `sft_media` ON `sft_media`.`id`=`sft_wellness_type`.`wellness_image`
ORDER BY `sft_wellness_type`.`id` ASC;

SELECT `sft_partner`.`partner_name`, `sft_partner`.`partner_logo`, `sft_media`.`id` as `media_id`, `sft_media`.`media_name`, `sft_media`.`extension`, `sft_media`.`raw_name`, `sft_media`.`url`
FROM `sft_partner`
LEFT JOIN `sft_media` ON `sft_media`.`id`=`sft_partner`.`partner_logo`
WHERE `sft_partner`.`status` = '1' ORDER BY `sft_partner`.`id` ASC;

END

//***** end *****/