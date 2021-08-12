CREATE TABLE `employee_job` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `emp_id` varchar(255) NOT NULL,
  `service_id` varchar(255) NOT NULL,
  `booking_status` varchar(255) NOT NULL DEFAULT '0',
  `booking_id` varchar(255) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `post_jobs_form` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) DEFAULT NULL,
  `job_tittle` varchar(255) DEFAULT NULL,
  `job_description` varchar(255) DEFAULT NULL,
  `job_type` varchar(255) DEFAULT NULL,
  `skills` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `tbl_yourself`;
CREATE TABLE `tbl_yourself` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text,
  `postal_code` varchar(255) DEFAULT NULL,
  `service_values` varchar(255) DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL,
  `apt` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `postal_code1` varchar(255) DEFAULT NULL,
  `what_types_of_jobs_would_you_like_to_see` varchar(255) DEFAULT NULL,
  `work_experience` varchar(255) DEFAULT NULL,
  `what_are_you_applying_as_or_for_you_can_only_pick_one` varchar(255) DEFAULT NULL,
  `what_are_the_areas_would_you_like_to_work_in_as_them_to_select` varchar(255) DEFAULT NULL,
  `most_recent_company` varchar(255) DEFAULT NULL,
  `most_address_company` varchar(255) DEFAULT NULL,
  `salary_wage` varchar(255) DEFAULT NULL,
  `company_from` varchar(255) DEFAULT NULL,
  `company_to` varchar(255) DEFAULT NULL,
  `how_many_years_of_paid_experience_do_you_have` varchar(255) DEFAULT NULL,
  `name_how_many_years_of_paid_experience_do_you_have` varchar(255) DEFAULT NULL,
  `file_how_many_years_of_paid_experience_do_you_have` varchar(255) DEFAULT NULL,
  `relevant_to_applied` varchar(255) DEFAULT NULL,
  `member_certificate` varchar(255) DEFAULT NULL,
  `skills_special` varchar(255) DEFAULT NULL,
  `worked_similar` varchar(255) DEFAULT NULL,
  `what_supplies_do_you_have_check_all_that_apply` varchar(255) DEFAULT NULL,
  `are_you_legally_eligible_to_work_in_the_united_kingdom` varchar(255) DEFAULT NULL,
  `provide_proof_of_photo_id_you_must_choose_at_least_one_from_the` varchar(255) DEFAULT NULL,
  `name_provide_proof_of_photo_id_you_must_choose_at_least_one_from` varchar(255) DEFAULT NULL,
  `file_provide_proof_of_photo_id_you_must_choose_at_least_one_from` varchar(255) DEFAULT NULL,
  `provide_proof_of_right_to_work_in_your_country_you_select_a_mini` varchar(255) DEFAULT NULL,
  `name_provide_proof_of_right_to_work_in_your_country_you_select_a` varchar(255) DEFAULT NULL,
  `file_provide_proof_of_right_to_work_in_your_country_you_select_a` varchar(255) DEFAULT NULL,
  `provide_proof_of_homes_address_must_be_less_than_3_months_old_fr` varchar(255) DEFAULT NULL,
  `name_provide_proof_of_homes_address_must_be_less_than_3_months_o` varchar(255) DEFAULT NULL,
  `file_provide_proof_of_homes_address_must_be_less_than_3_months_o` varchar(255) DEFAULT NULL,
  `for_business_only` varchar(255) DEFAULT NULL,
  `name_for_business_only` varchar(255) DEFAULT NULL,
  `file_for_business_only` varchar(255) DEFAULT NULL,
  `file_please_upload_the_must_current_photo_which_will_be_used_to` varchar(255) DEFAULT NULL,
  `Have_you_ever_been_or_are_you_currently_going_through_any_invest` varchar(255) DEFAULT NULL,
  `have_you_been_dismissed_from_any_employment_or_lost_contract` varchar(255) DEFAULT NULL,
  `do_you_have_any_spent_unspent_convictions_or_cautions_under_the_` varchar(255) DEFAULT NULL,
  `are_you_facing_any_criminal_prosecutions` varchar(255) DEFAULT NULL,
  `if_business_has_any_of_your_director_been_disqualify_as_a_direct` varchar(255) DEFAULT NULL,
  `name_if_business_has_any_of_your_director_been_disqualify_as_a_d` varchar(255) DEFAULT NULL,
  `has_any_of_them_been_made_bankrupt_and_or_insolvency` varchar(255) DEFAULT NULL,
  `name_has_any_of_them_been_made_bankrupt_and_or_insolvency` varchar(255) DEFAULT NULL,
  `scheduling_and_interview` varchar(255) DEFAULT NULL,
  `name_provide1` varchar(255) DEFAULT NULL,
  `phone_provide1` varchar(255) DEFAULT NULL,
  `address_provide1` varchar(255) DEFAULT NULL,
  `email_provide1` varchar(255) DEFAULT NULL,
  `position_company_provide1` varchar(255) DEFAULT NULL,
  `relationship_provide1` varchar(255) DEFAULT NULL,
  `name_provide2` varchar(255) DEFAULT NULL,
  `phone_provide2` varchar(255) DEFAULT NULL,
  `address_provide2` varchar(255) DEFAULT NULL,
  `email_provide2` varchar(255) DEFAULT NULL,
  `position_company_provide2` varchar(255) DEFAULT NULL,
  `relationship_provide2` varchar(255) DEFAULT NULL,
  `please_tell_us_if_you_are_working_full` mediumtext,
  `please_tell_us_your_working_days` mediumtext,
  `please_tell_your_working_ours` mediumtext,
  `t_shirt_preference` varchar(255) DEFAULT NULL,
  `size` mediumtext,
  `how_do_you_plan_on_commuting_to_jobs` mediumtext,
  `status` int(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




ALTER TABLE `book_service` ADD ` category_id` varchar(250) NULL;
ALTER TABLE `book_service` ADD ` emp_id` varchar(250) NULL;
ALTER TABLE `book_service` ADD ` booking_status` varchar(250) NULL;
ALTER TABLE `book_service` ADD ` start_time` varchar(250) NULL;

ALTER TABLE `users` CHANGE `status` `status` INT(1) NOT NULL DEFAULT '2' COMMENT '1-active,2-inactive';
