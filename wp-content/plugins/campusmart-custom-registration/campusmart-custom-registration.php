<?php
/*
Plugin Name: CampusMart Custom Registration
Description: Customizes WooCommerce registration for UKZN student/staff email and phone validation.
Version: 1.0
Author: CampusMart Dev
*/

add_action('woocommerce_register_form_start', 'campusmart_add_custom_registration_fields');
function campusmart_add_custom_registration_fields() {
    ?>
    <p class="form-row form-row-first">
        <label for="reg_billing_first_name">First name <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if (!empty($_POST['billing_first_name'])) echo esc_attr($_POST['billing_first_name']); ?>" />
    </p>
    <p class="form-row form-row-last">
        <label for="reg_billing_last_name">Last name <span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if (!empty($_POST['billing_last_name'])) echo esc_attr($_POST['billing_last_name']); ?>" />
    </p>
    <div class="clear"></div>
    <p class="form-row form-row-wide">
        <label for="reg_country_code">Country Code <span class="required">*</span></label>
        <select name="country_code" id="reg_country_code" class="input-select">
            <option value="+27">+27 (South Africa)</option>
            <option value="+1">+1 (USA)</option>
            <option value="+44">+44 (UK)</option>
            <option value="+91">+91 (India)</option>
        </select>
    </p>
    <p class="form-row form-row-wide">
        <label for="reg_phone">Phone Number <span class="required">*</span></label>
        <input type="text" class="input-text" name="phone" id="reg_phone" value="<?php if (!empty($_POST['phone'])) echo esc_attr($_POST['phone']); ?>" />
    </p>
    <?php
}

add_filter('woocommerce_registration_errors', 'campusmart_validate_custom_fields', 10, 3);
function campusmart_validate_custom_fields($errors, $username, $email) {
    if (isset($_POST['billing_first_name']) && empty($_POST['billing_first_name'])) {
        $errors->add('billing_first_name_error', 'First name is required.');
    }

    if (isset($_POST['billing_last_name']) && empty($_POST['billing_last_name'])) {
        $errors->add('billing_last_name_error', 'Last name is required.');
    }

    if (isset($_POST['phone']) && (!is_numeric($_POST['phone']) || strlen($_POST['phone']) < 7)) {
        $errors->add('phone_error', 'Please enter a valid phone number.');
    }

    if (strpos($email, '@stu.ukzn.ac.za') !== false) {
        $prefix = explode('@', $email)[0];
        if (!preg_match('/^2\d{8}$/', $prefix)) {
            $errors->add('email_error', 'Student email must start with 2 and be 9 digits before @.');
        }
    } elseif (strpos($email, '@ukzn.ac.za') === false) {
        $errors->add('email_error', 'Email must be a UKZN staff or student email.');
    }

    return $errors;
}

add_action('woocommerce_created_customer', 'campusmart_save_custom_fields');
function campusmart_save_custom_fields($customer_id) {
    if (isset($_POST['billing_first_name'])) {
        update_user_meta($customer_id, 'billing_first_name', sanitize_text_field($_POST['billing_first_name']));
        update_user_meta($customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']));
    }

    if (isset($_POST['billing_last_name'])) {
        update_user_meta($customer_id, 'billing_last_name', sanitize_text_field($_POST['billing_last_name']));
        update_user_meta($customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']));
    }

    if (isset($_POST['phone'])) {
        update_user_meta($customer_id, 'phone', sanitize_text_field($_POST['phone']));
    }

    if (isset($_POST['country_code'])) {
        update_user_meta($customer_id, 'country_code', sanitize_text_field($_POST['country_code']));
    }
}
