<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://amirandalibi.com
 * @since      1.0.0
 *
 * @package    perception
 * @subpackage perception/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<section class="wrap perception-setting">
  <div class="perception-setting__container">

    <article class="perception-setting__article">
      <h1>Important Notes</h1>
      <hr>
      Please note that <a href="https://cloud.google.com/vision/" target="_blank">Google Cloud Vision API</a> is a commercial service and while it's free for first 1000 units/month but you will be charged for any request after that. See their pricing <a href="https://cloud.google.com/vision/pricing#prices" target="_blank">here</a>.

      To better understanding their pricing table, here are the list of the features we use in this plugin:
      <ul class="perception-setting__bullet">
        <li>Label Detection</li>
        <li>Landmark Detection</li>
        <li>Logo Detection</li>
        <li>Web Detection</li>
      </ul>

      <h3>Set up your project</h3>

      <ul class="perception-setting__number">
        <li>In the Cloud Platform Console, go to the Manage resources page and select or create a new project.</li>
        <a class="perception-setting__button" href="https://console.cloud.google.com/cloud-resource-manager?_ga=2.129090510.-332948699.1509126047&_gac=1.50013202.1509552978.EAIaIQobChMI5dSY1eGd1wIVS7nACh2HWwFvEAAYASAAEgKdJfD_BwE" target="_blank">go to the manage resources page</a>
        <li>Enable billing for your project.</li>
        <a class="perception-setting__button" href="https://support.google.com/cloud/answer/6293499#enable-billing" target="_blank">enable billing</a>
        <li>Enable the Cloud Vision API. Link</li>
        <a class="perception-setting__button" href="https://console.cloud.google.com/flows/enableapi?apiid=vision.googleapis.com&redirect=https://console.cloud.google.com&_ga=2.162694398.-332948699.1509126047&_gac=1.45951760.1509552978.EAIaIQobChMI5dSY1eGd1wIVS7nACh2HWwFvEAAYASAAEgKdJfD_BwE" target="_blank">enable the api</a>
      </ul>
      <h3>Authentication</h3>
      <hr>
      For using this plugin, You need to provide a JSON file which contains your Project ID and Key. By following below steps you can obtain them.
      <ul>
        <li>In Cloud Platform Console, navigate to the <a href="https://console.cloud.google.com/apis/credentials/serviceaccountkey?_ga=2.158502776.-332948699.1509126047&_gac=1.48442258.1509552978.EAIaIQobChMI5dSY1eGd1wIVS7nACh2HWwFvEAAYASAAEgKdJfD_BwE" target="_blank">Create service account key</a> page.</li>
        <li>From the <strong>Service account</strong> dropdown, select <strong>New service account</strong>.</li>
        <img src="<?php echo PLUGIN_ROOT . 'core/admin/img/create-new-service-account.png'; ?>" />
        <li>Input a name into the Service account name form field.</li>
        <li>From the Role dropdown, select Project > Owner.</li>
        <li>Click the Create button. A JSON file that contains your key downloads to your computer.</li>
      </ul>

      Upload the JSON file in the field below. Now you can start using the plugin.

    </article>

    <article class="perception-setting__article--upload">
      <h1>Upload your JSON file</h1>
      <hr>


      <form method="post" action="options.php">
        <?php settings_fields('perception-settings'); ?>
        <?php do_settings_sections('perception-settings'); ?>
        <label>
          <input name="google-vision-json-path" type="text" class="google-vision-api-json" value="<?php echo get_option('google-vision-json-path'); ?>">
          <input name="google-vision-json-id" type="hidden" class="google-vision-api-json-id" value="<?php echo get_option('google-vision-json-id'); ?>">
          <input type="button" value="Upload JSON" class="perception-setting__button upload-api-key">
        </label>
        <?php submit_button(); ?>
      </form>
    </article>
  </div>

</section>
