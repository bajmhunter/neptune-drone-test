<?php
//Loads configuration from database into global CI config
function load_config()
{
    $CI =& get_instance();

    foreach($CI->Appconfig->get_all()->result() as $app_config)
    {	
        $CI->config->set_item($CI->security->xss_clean($app_config->key), $CI->security->xss_clean($app_config->value));
    }

    // fallback to English if language settings are not correct
    $file_exists = !file_exists('../application/language/' . current_language_code());
    if(current_language_code() == null || current_language() == null || $file_exists)

    {
        $CI->config->set_item('language', 'english');
        $CI->config->set_item('language_code', 'en-GB');
    }

    load_language_files('../vendor/codeigniter/framework/system/language', current_language());
    load_language_files('../application/language', current_language_code());

    
    //Set timezone from config database
    if($CI->config->item('timezone'))
    {
        date_default_timezone_set($CI->config->item('timezone'));
    }
    else
    {
        date_default_timezone_set('Europe/London');
    }

}

/**
 * @param $language
 * @param $CI
 */
function load_language_files($path, $language)
{
    $CI =& get_instance();

    $map = directory_map($path . DIRECTORY_SEPARATOR . $language);

    foreach($map as $file)
	{
        if(!is_array($file) && substr(strrchr($file, '.'), 1) == 'php')
		{
            $CI->lang->load(strtr($file, '', '_lang.php'), $language);
        }
    }
}

/**
 * Locale Settings
 */
function current_language()
{
    return get_instance()->config->item('language');
}

function current_language_code()
{
    return get_instance()->config->item('language_code');
}

?>