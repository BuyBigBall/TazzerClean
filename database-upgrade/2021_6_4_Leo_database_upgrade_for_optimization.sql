ALTER TABLE `admin_access`   
  ADD INDEX (`admin_id`) ,
  ADD INDEX (`module_id`);

ALTER TABLE `admin_commission`   
  ADD INDEX (`admin_id`);

ALTER TABLE `administrators`   
  ADD INDEX (`email`);

ALTER TABLE `app_language_management`   
  ADD INDEX (`page_key`) ,
  ADD INDEX (`lang_key`);

ALTER TABLE `bank_account`   
  ADD INDEX (`user_id`);

ALTER TABLE `book_service`   
  ADD INDEX (`service_id`) ,
  ADD INDEX (`provider_id`) ,
  ADD INDEX (`user_id`);

ALTER TABLE `business_hours`   
  ADD INDEX (`provider_id`);

ALTER TABLE `contact_form_details`   
  ADD INDEX (`email`);

ALTER TABLE `country_table`   
  ADD INDEX (`country_code`) ,
  ADD INDEX (`country_name`);

ALTER TABLE `countrycode`   
  ADD INDEX (`CountryCode`) ,
  ADD INDEX (`CountryName`);

ALTER TABLE `currency`   
  ADD INDEX (`currency_code`);

ALTER TABLE `currency_rate`   
  ADD INDEX (`currency_code`);

ALTER TABLE `device_details`   
  ADD INDEX (`user_id`);

ALTER TABLE `forget_password_det`   
  ADD INDEX (`user_id`) ,
  ADD INDEX (`email`);

ALTER TABLE `language_management`   
  ADD INDEX (`lang_key`);

ALTER TABLE `pages`   
  ADD INDEX (`page_key`);

ALTER TABLE `payments`   
  ADD INDEX (`user_id`) ,
  ADD INDEX (`product_id`) ,
  ADD INDEX (`payer_email`);

ALTER TABLE `paypal_transaction`   
  ADD INDEX (`user_id`) ,
  ADD INDEX (`transaction_id`) ,
  ADD INDEX (`order_id`);

ALTER TABLE `provider_address`   
  ADD INDEX (`provider_id`) ,
  ADD INDEX (`country_id`) ,
  ADD INDEX (`state_id`) ,
  ADD INDEX (`city_id`);

ALTER TABLE `providers`   
  ADD INDEX (`email`) ,
  ADD INDEX (`country_code`) ,
  ADD INDEX (`currency_code`);

ALTER TABLE `rating_review`   
  ADD INDEX (`user_id`) ,
  ADD INDEX (`provider_id`) ,
  ADD INDEX (`service_id`) ,
  ADD INDEX (`booking_id`);

ALTER TABLE `revenue`   
  ADD INDEX (`provider`) ,
  ADD INDEX (`user`);

ALTER TABLE `services`   
  ADD INDEX (`user_id`);

ALTER TABLE `services_image`   
  ADD INDEX (`service_id`);

ALTER TABLE `user_address`   
  ADD INDEX (`user_id`) ,
  ADD INDEX (`country_id`) ,
  ADD INDEX (`state_id`) ,
  ADD INDEX (`city_id`);

ALTER TABLE `users`   
  ADD INDEX (`name`) ,
  ADD INDEX (`email`);

ALTER TABLE `wallet_table`   
  ADD INDEX (`type`) ,
  ADD INDEX (`user_provider_id`);
