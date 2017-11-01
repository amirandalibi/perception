# Perception

A Wordpress Plugin which classifies Media Library images by detecting individual objects and faces within images using [Google Cloud Vision API](https://cloud.google.com/vision/).

## Features

Detects broad sets of categories within an image, which range from modes of transportation to animals, popular product logos, popular natural and man-made structures, topical entities like celebrities, or news events.

## Requirements

Wordpress >= 4.7

## Important Notes

Please note that Google Cloud Vision API is a commercial service and while it's free for first 1000 units/month but you will be charged for any request after that. See their pricing [here](https://cloud.google.com/vision/pricing#prices).

To bettter understanding their pricing table, here are the list of the features we use in this plugin:

* Label Detection
* Landmark Detection
* Logo Detection
* Web Detection 


## Before you begin
If you haven't done so already, set up your project and create a Google Cloud Storage bucket, as explained below.

#### Set up your project

1. In the Cloud Platform Console, go to the Manage resources page and select or create a new project. [Link](https://console.cloud.google.com/cloud-resource-manager?_ga=2.235186115.-332948699.1509126047&_gac=1.39977494.1509552978.EAIaIQobChMI5dSY1eGd1wIVS7nACh2HWwFvEAAYASAAEgKdJfD_BwE)
2. Enable billing for your project. [Link](https://support.google.com/cloud/answer/6293499#enable-billing)
3. Enable the Cloud Vision API. [Link](https://console.cloud.google.com/flows/enableapi?apiid=vision.googleapis.com&redirect=https://console.cloud.google.com&_ga=2.235186115.-332948699.1509126047&_gac=1.39977494.1509552978.EAIaIQobChMI5dSY1eGd1wIVS7nACh2HWwFvEAAYASAAEgKdJfD_BwE)

#### Authentication

For using this plugin, You need to provide a JSON file which contains your Project ID and Key. By following below steps you can obtain them.

1. In Cloud Platform Console, navigate to the [Create service account key](https://console.cloud.google.com/apis/credentials/serviceaccountkey) page.
2. From the **Service account** dropdown, select **New service account**.
3. Input a name into the **Service account name** form field.
4. From the **Role** dropdown, select **Project > Owner**.
5. Click the **Create** button. A JSON file that contains your key downloads to your computer.


Keep the **JSON** file on your computer, you will need it during the plugin installation.


## Contributing

Contributions are welcome. Create a pull request to get statred.

## Issues

Please report any issues [here](https://github.com/amirandalibi/Perception/issues).