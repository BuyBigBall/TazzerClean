<?php
define('ProPayPal', 0);
if(ProPayPal){
	define("PayPalClientId", "*********************");
	define("PayPalSecret", "*********************");
	define("PayPalBaseUrl", "https://api.paypal.com/v1/");
	define("PayPalENV", "production");
} else {
	define("PayPalClientId", "ARRiN8MYWLHAcwIIt228Nv_Pzg0bdgSLF7PpC1-rHKHhgwRuWD6A9SC9oHlaqsLwXCopx4rYPahSeS3n");
	define("PayPalSecret", "EFYbXZRpL1fNzCU5bd_arfLYeBvKqgH1szw8zK5JYCuyNQ4Nin2No6Goua8oCU11lPDOgxcu_wwlupGj");
	define("PayPalBaseUrl", "https://api.sandbox.paypal.com/v1/");
}
?>